<?php

namespace App\Http\Controllers\API\MailDisposition;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\MailDisposition\MailDispositionResource;
use App\Models\Mail;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CreateMailDispositionController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            // mail disposition
            'mail_id' => ['required', 'exists:mails,id'],
            'mail_security_id' => [
                'required',
                Rule::exists('params', 'id')->where(function($query) {
                    return $query->where('category', 'mail_security');
                })
            ],
            'description' => ['required', 'string'],

            // assigments
            'assigments' => ['required', 'array'],
            'assigments.*.receiver_id' => [
                'required', 
                Rule::exists('user_groups', 'user_id')->where(function($query) use ($request) {
                    return $query->where('parent_id', $request->user()->id);
                })
            ],

            // instruction
            'instruction' => ['required', 'array'],
            'instruction.*.instruction_id' => [
                'required', 
                Rule::exists('params', 'id')->where(function($query) {
                    return $query->where('category', 'instruction');
                })
            ],
        ]);

        $mail = Mail::find($request->mail_id);

        $input = $request->all();
        $mail_disposition = $mail->mail_disposition()->create($input);

        // update log
        $user = $request->user();
        $user_id = ($user->role == 'assistant') ? $user->user_group()->first()->parent_id : $user->id;
        $log = $mail->activity_log()->create([
            'user_id' => $user_id,
            'log' => 'disposition_mail',
        ]);

        foreach($request->assigments as $assigment) {
            $assigments[] = [
                'sender_id' => $request->user()->id,
                'activity_log_id' => $log->id,
                'receiver_id' => $assigment['receiver_id'],
                'read' => 0,
            ];
        }

        $mail_disposition->disposition_assigment()->createMany($assigments);
        $mail_disposition->disposition_instruction()->createMany($request->instruction);

        return ResponseFormatter::success(new MailDispositionResource($mail_disposition), 'success create mail disposition data');
    }
}
