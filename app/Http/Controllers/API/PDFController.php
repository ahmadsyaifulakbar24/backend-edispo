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

class PDFController extends Controller
{
    function __construct(){
        $this->bulan = [1=>'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
        $this->hari = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
    }

    function index(Request $request, $id){
        $mailDisposition = $this->mail_disposition($id);
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

        $filename = "disposisi";
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
        // return $pdf->stream($fileName . '.pdf', array("Attachment" => false));
        return $pdf->download($fileName . '.pdf');
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
        if(!empty($mail_disposition)) {
            return ResponseFormatter::error([
                'message' => 'data not foud'
            ], 'error get mail disposition data', 422);
        }
        return new MailDispositionResource($mail_disposition);
    }
}