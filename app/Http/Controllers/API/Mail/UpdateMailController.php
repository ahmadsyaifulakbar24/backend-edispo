<?php

namespace App\Http\Controllers\API\Mail;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Mail\MailDetailResource;
use App\Models\Mail;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UpdateMailController extends Controller
{
    public function update(Request $request, Mail $mail)
    {
        $request->validate([
            'mail_number' => ['required', 'string'],
            'mail_origin' => [
                Rule::requiredIf($mail->mail_category != 'st_menteri'), 
                'string'
            ],
            'regarding' => ['required', 'string'],
            'mail_date' => ['required', 'date'],
            'date_received' => ['required', 'date'],
            'mail_category_code' => [
                Rule::requiredIf($mail->mail_category == 'incoming_mail'),
                'in:A,W,S'
            ],
            'mail_type_id' => [
                Rule::requiredIf($mail->mail_category == 'official_memo'),
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
            'summary' => ['required', 'string']
        ]);

        $input['mail_number'] = $request->mail_number;
        $input['mail_origin'] = $request->mail_origin;
        $input['regarding'] = $request->regarding;
        $input['mail_date'] = $request->mail_date;
        $input['date_received'] = $request->date_received;
        $input['mail_type_id'] = $request->mail_type_id;
        $input['mail_nature_id'] = $request->mail_nature_id;
        $input['summary'] = $request->summary;
        if($mail->mail_category == 'st_menteri') {
            $input['mail_origin'] = NULL;
        }
        if($mail->mail_category == 'incoming_mail') {
            $input['mail_category_code'] = $request->mail_category_code;
        }
        $mail->update($input);

        // update log
        $user = $request->user();
        $user_id = ($user->role == 'assistant') ? $user->user_group()->first()->parent_id : $user->id;
        $mail->activity_log()->create([
            'type' => 'mail',
            'user_id' => $user_id,
            'log' => 'update_mail',
        ]);

        return ResponseFormatter::success(new MailDetailResource($mail), 'success update mail data');
    }
}
