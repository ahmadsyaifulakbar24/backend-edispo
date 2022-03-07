<?php

namespace App\Http\Controllers\API\MailDisposition;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\MailDisposition\MailDispositionResource;
use App\Models\ActivityLog;
use App\Models\Mail;
use App\Models\MailDisposition;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CreateMailDispositionController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            // mail disposition
            'type' => ['required', 'in:incoming_disposition,mail,agenda'],
            'mail_id' => [
                Rule::requiredIf($request->type == 'mail'),
                'exists:mails,id'
            ],
            'incoming_disposition_id' => [
                Rule::requiredIf($request->type == 'incoming_disposition'),
                'exists:incoming_dispositions,id'
            ],
            'agenda_id' => [
                // Rule::requiredIf($request->type == 'agenda'),
                'exists:agendas,id'
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

        // $mail = Mail::find($request->mail_id);

        $input = $request->except([
            'mail_id',
            'incoming_disposition_id',
            'agenda_id'
        ]);

        if($request->type == 'mail') {
            $input['mail_id'] = $request->mail_id;
            $input_log['mail_id'] = $request->mail_id;
        } else if($request->type == 'incoming_disposition') {
            $input['incoming_disposition_id'] = $request->incoming_disposition_id;
            $input_log['incoming_disposition_id'] = $request->incoming_disposition_id;
        } else if($request->type == 'agenda') {
            $input['agenda_id'] = $request->agenda_id;
            $input_log['agenda_id'] = $request->agenda_id;
        }
        $mail_disposition = MailDisposition::create($input);

        // update log
        $user = $request->user();
        $user_id = ($user->role == 'assistant') ? $user->user_group()->first()->parent_id : $user->id;
        $input_log['user_id'] = $user_id;
        $input_log['log'] = 'disposition_'.$request->type;
        $input_log['type'] = $request->type;
        $log = ActivityLog::create($input_log);


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
