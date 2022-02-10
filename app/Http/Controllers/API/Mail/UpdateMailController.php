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
            'mail_type' => [
                Rule::requiredIf($mail->mail_category == 'official_memo'),
                Rule::exists('params', 'id')->where(function($query) {
                    $query->where('category', 'mail_type');
                })
            ],
            'mail_nature' => [
                'required',
                Rule::exists('params', 'id')->where(function($query) {
                    $query->where('category', 'mail_nature');
                })
            ],
        ]);

        $input['mail_number'] = $request->mail_number;
        $input['mail_origin'] = $request->mail_origin;
        $input['regarding'] = $request->regarding;
        $input['mail_date'] = $request->mail_date;
        $input['mail_type'] = $request->mail_type;
        $input['mail_nature'] = $request->mail_nature;

        $mail->update($input);
        return ResponseFormatter::success(new MailDetailResource($mail), 'success update mail data');
    }
}
