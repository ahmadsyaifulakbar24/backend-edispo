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
            'mail_origin' => ['required', 'string'],
            'regarding' => ['required', 'string'],
            'mail_date' => ['required', 'date'],
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
        $input['mail_type_id'] = $request->mail_type_id;
        $input['mail_nature_id'] = $request->mail_nature_id;
        $input['summary'] = $request->summary;

        $mail->update($input);

        // update log
        $user = $request->user();
        $user_id = ($user->role == 'assistent') ? $user->parent_id : $user->id;
        $mail->activity_log()->create([
            'user_id' => $user_id,
            'log' => 'update_mail',
        ]);

        return ResponseFormatter::success(new MailDetailResource($mail), 'success update mail data');
    }
}
