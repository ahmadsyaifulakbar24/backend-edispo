<?php

namespace App\Http\Controllers\API\MailDisposition;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\MailDisposition\MailDispositionResource;
use App\Models\ActivityLog;
use App\Models\Agenda;
use App\Models\IncomingDisposition;
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
                Rule::requiredIf($request->type == 'agenda'),
                'exists:agendas,id'
            ],
            'description' => ['required', 'string'],
            'confirmation' => [
                Rule::requiredIf($request->type == 'agenda'),
                'in:hadir,diwakili,didampingi'
            ],

            // assignments
            'assignments' => [
                Rule::requiredIf(!empty($request->confirmation)),
                'array'
            ],
            'assignments.*.position_name' => ['required_with:assignments', 'string'],
            'assignments.*.receiver_id' => [
                'nullable', 
                Rule::exists('user_groups', 'user_id')->where(function($query) use ($request) {
                    return $query->where('parent_id', $request->user()->id);
                })
            ],

            // instruction
            'instruction' => [
                Rule::requiredIf($request->type != 'agenda'),
                'array'
            ],
            'instruction.*.instruction_id' => [
                'required', 
                Rule::exists('params', 'id')->where(function($query) {
                    return $query->where('category', 'instruction');
                })
            ],
        ]);

        $input = $request->except([
            'mail_id',
            'incoming_disposition_id',
            'agenda_id',
            'confirmation'
        ]);

        if($request->type == 'mail') {
            $mail = Mail::find($request->mail_id);
            $mail->update(['disposition' => 1]);
            $input['mail_id'] = $request->mail_id;
            $input_log['mail_id'] = $request->mail_id;
        } else if($request->type == 'incoming_disposition') {
            $incoming_disposition = IncomingDisposition::find($request->incoming_disposition_id);
            $incoming_disposition->update(['disposition' => 1]);
            $input['incoming_disposition_id'] = $request->incoming_disposition_id;
            $input_log['incoming_disposition_id'] = $request->incoming_disposition_id;
        } else if($request->type == 'agenda') {
            Agenda::find($request->agenda_id)->update(['disposition' => 1]);
            $input['agenda_id'] = $request->agenda_id;
            $input['confirmation'] = $request->confirmation;
            $input_log['agenda_id'] = $request->agenda_id;
        }
        $input['sender_id'] = $request->user()->id;
        $mail_disposition = MailDisposition::create($input);
        
        // update log
        $user = $request->user();
        $input_log['user_id'] = $user->id;
        $input_log['log'] = 'disposition_'.$request->type;
        $input_log['type'] = $request->type;
        $log = ActivityLog::create($input_log);
        
        if($request->confirmation != 'hadir') {
            foreach($request->assignments as $assignment) {
                $assignments[] = [
                    'activity_log_id' => $log->id,
                    'receiver_id' => !empty($assignment['receiver_id']) ? $assignment['receiver_id'] : null,
                    'position_name' => $assignment['position_name'],
                    'read' => 0,
                ];
            }
            $mail_disposition->disposition_assignment()->createMany($assignments);
        }
        if($request->type != 'agenda') {
            $mail_disposition->disposition_instruction()->createMany($request->instruction);
        }
        return ResponseFormatter::success(new MailDispositionResource($mail_disposition), 'success create mail disposition data');
    }
}
