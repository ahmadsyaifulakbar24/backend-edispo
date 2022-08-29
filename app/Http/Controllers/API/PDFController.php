<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UserGroup;
use App\Models\Param;
use App\Models\User;
use App\Models\MailDisposition;
use App\Http\Resources\Param\ParamResource;
use App\Http\Resources\User\UserGroupResource;
use App\Http\Resources\MailDisposition\MailDispositionResource;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use View;
use App;
use Carbon\Carbon;
use Webklex\PDFMerger\Facades\PDFMergerFacade as PDFMerger;

class PDFController extends Controller
{
    function __construct(){
        $this->bulan = [1=>'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $this->hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    }

    function index(Request $request, $id){
        $mailDisposition = $this->mail_disposition($id);
        if(empty($mailDisposition)) {
            return ResponseFormatter::error([
                'message' => 'data not foud'
            ], 'error get mail disposition data', 404);
        }
        $_path = 'assets/thumbnail_.jpg';
        $path = public_path() . '/' . $_path;
        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);

        $logo = 'data:image/' . $type . ';base64,' . base64_encode($data);
        $data = [
            'img' => $logo,
            'user_disposition' => $this->user_disposition($request),
            'param' => [
                'instruction' => $this->param($request, 'instruction'),
                'security' => $this->param($request, 'mail_security'),
                // 'type' => $this->param($request, 'mail_type'),
                'nature' => $this->param($request, 'mail_nature'),
            ],
            'data' => $mailDisposition,
            'date' => [
                'month' => $this->bulan,
                'day' => $this->hari,
            ],
        ];

        $fileName = "disposisi";
        if($mailDisposition != null){
            if($mailDisposition != null && $mailDisposition->mail != null)
                $fileName = sprintf("%04d", $mailDisposition->mail->agenda_number) . "-" . $mailDisposition->mail->mail_category_code;
            elseif($mailDisposition != null && $mailDisposition->incoming_disposition != null)
                $fileName = sprintf("%04d", $mailDisposition->incoming_disposition->agenda_number) . "-D";
            elseif($mailDisposition != null && $mailDisposition->agenda != null)
                $fileName = sprintf("%04d", $mailDisposition->agenda->agenda_number) . "-UND";
        }

        $html = View::make('pdf', $data)->render();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($html);
        $current = Carbon::now()->format('ymdHis');
        $disposition_file_name = 'disposition/'.$current.'.pdf';
        Storage::disk('public')->put($disposition_file_name, $pdf->output());
        $file_path1 = Storage::url($disposition_file_name);
        
        // $pdf->download()->getOriginalContent();
        $fileName . '.pdf';

        $mail_disposition = MailDisposition::find($id);
        if(!empty($mail_disposition->mail_id)) {
            $file_path2 = Storage::url($mail_disposition->mail->file_manager->first()->path);
        }  else if(!empty($mail_disposition->agenda_id)) {
            $file_path2 = Storage::url($mail_disposition->agenda->file_manager->first()->path);
        } else if(!empty($mail_disposition->incoming_disposition_id)){
            $file_path2 = Storage::url($mail_disposition->incoming_disposition->file_manager->first()->path);
        }
        // merge pdf
        $pdfmerger = PDFMerger::init();
        $file1 = public_path($file_path1);
        $file2 = public_path($file_path2);
        
        $pdfmerger->addPDF($file1, 'all');
        $pdfmerger->addPDF($file2, 'all');

        $pdfmerger->merge();
        $download_path = public_path('disposition_download/'.$fileName);
        $pdfmerger->save($download_path);
        Storage::disk('public')->delete($disposition_file_name);
        return response()->download($download_path);
    }

    private function user_disposition(Request $request){
        $user = $request->user();
        // $user = User::find('869cfbc4-105e-4c58-8b46-98d138968a94');
        $user_id = ($user->role == 'assistant') ? $user->user_group()->first()->parent_id : $user->id;
        $user_group = UserGroup::userDetail()->where('parent_id', $user_id)->orderBy('order', 'asc')->get();
        return UserGroupResource::collection($user_group);
    }

    private function param(Request $request, $category){
        $request->validate([
            'id' => [
                'nullable',
                Rule::exists('params', 'id')->where(function($query) use ($category) {
                    return $query->where('category', $category);
                })
            ]
        ]);

        // echo $request->id.'<br/>';
        // if($request->id){
        //     $param = Param::find($request->id);
        //     return $param;
        //     // return new ParamResource($param);
        // } else {
        // }
        $param = Param::where('category', $category)->get();
        return ParamResource::collection($param);
        // return $param;
    }

    private function mail_disposition($id){
        $mail_disposition = MailDisposition::find($id);
        return $mail_disposition ? new MailDispositionResource($mail_disposition) : null;
    }
}