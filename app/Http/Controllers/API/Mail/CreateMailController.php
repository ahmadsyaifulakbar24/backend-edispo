<?php

namespace App\Http\Controllers\API\Mail;

use App\Helpers\FileHelpers;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Mail\MailDetailResource;
use App\Models\Mail;
use App\Models\User;
use App\Notifications\AddNewMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CreateMailController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'mail_category' => ['required', 'in:incoming_mail,official_memo,tembusan,st_menteri'],
            'mail_number' => ['required', 'string'],
            'mail_origin' => [
                Rule::requiredIf($request->mail_category != 'st_menteri'), 
                'string'
            ],
            'regarding' => ['required', 'string'],
            'mail_date' => ['required', 'date'],
            'date_received' => ['required', 'date'],
            'mail_category_code' => [
                Rule::requiredIf($request->mail_category == 'incoming_mail'),
                'in:A,W,S'
            ],
            'mail_type_id' => [
                Rule::requiredIf($request->mail_category == 'official_memo'),
                Rule::exists('params', 'id')->where(function($query) {
                    $query->where('category', 'mail_type');
                })
            ],
            'mail_nature_id' => [
                'required',
                Rule::exists('params', 'id')->where(function($query) {
                    $query->where('category', 'mail_nature');
                })
            ],
            'mail_security_id' => [
                'required',
                Rule::exists('params', 'id')->where(function($query) {
                    return $query->where('category', 'mail_security');
                })
            ],
            'summary' => ['required', 'string'],
            'addition' => ['required', 'array'],
            'addition.*.file' => ['required', 'file'],
        ]);

        $input = $request->all();
        $user = $request->user();
        $user_id = ($user->role == 'assistant') ? $user->user_group()->first()->parent_id : $user->id;
        $input['user_id'] = $user_id;
        
        $input['agenda_number'] = $this->max_agenda_number($user_id);
        if($request->mail_category == 'incoming_mail') {
            $input['mail_category_code'] = $request->mail_category_code;
        } elseif($request->mail_category == 'official_memo') {
            $input['mail_category_code'] = 'ND';
        } elseif($request->mail_category == 'tembusan') {
            $input['mail_category_code'] = 'T';
        } elseif($request->mail_category == 'st_menteri') {
            $input['mail_origin'] = NULL;
            $input['mail_category_code'] = 'STM';
        }
        $mail = Mail::create($input);

        foreach($request->addition as $addition) {
            $file_name = $addition['file']->getClientOriginalName();
            $path = FileHelpers::upload_file('additional', $addition['file']);
            $files[] = [
                'type' => 'mail',
                'path' => $path,
                'file_name' => $file_name
            ];
        }

        $mail->file_manager()->createMany($files);

        // create log
        $mail->activity_log()->create([
            'user_id' => $user->id,
            'log' => 'upload_mail',
            'type' => 'mail',
        ]);

        // sent notification
        if($user->role == 'assistant') {
            $parent = User::find($user->user_group()->first()->parent_id);
            $parent->notify(new AddNewMail($mail, $user, $parent));
        }
        return ResponseFormatter::success(new MailDetailResource($mail), 'success create mail data');
    }

    protected function max_agenda_number($user_id)
    {
        $max = Mail::select(DB::raw("if(MAX(agenda_number) IS NULL, 0, MAX(agenda_number)) as max"))->where('user_id', $user_id)->first();
        return $max['max'] + 1;
    }
}
