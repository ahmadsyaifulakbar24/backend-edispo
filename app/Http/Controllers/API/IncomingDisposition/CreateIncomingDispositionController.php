<?php

namespace App\Http\Controllers\API\IncomingDisposition;

use App\Helpers\FileHelpers;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\IncomingDisposition\IncomingDispositionDetailResource;
use App\Models\IncomingDisposition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class CreateIncomingDispositionController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'mail_number' => ['required', 'string'],
            'mail_origin' => ['required', 'string'],
            'regarding' => ['required', 'string'],
            'mail_date' => ['required', 'date'],
            'date_received' => ['required', 'date'],
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

            // disposition detail
            'description' => ['required', 'string'],
            'instruction' => ['required', 'array'],
            'instruction.*.instruction_id' => [
                'required', 
                Rule::exists('params', 'id')->where(function($query) {
                    return $query->where('category', 'instruction');
                })
            ],
        ]);

        $input = $request->all();
        $user = $request->user();
        $user_id = ($user->role == 'assistant') ? $user->user_group()->first()->parent_id : $user->id;
        $input['user_id'] = $user_id;

        $input['agenda_number'] = $this->max_agenda_number($user_id);
        $incoming_disposition = IncomingDisposition::create($input);

        // upload file
        foreach($request->addition as $addition) {
            $file_name = $addition['file']->getClientOriginalName();
            $path = FileHelpers::upload_file('additional', $addition['file']);
            $files[] = [
                'type' => 'incoming disposition',
                'path' => $path,
                'file_name' => $file_name
            ];
        }
        $incoming_disposition->file_manager()->createMany($files);

        // create instruction 
        foreach ($request->instruction as $instruction) {
            $instructions[] = [
                'id' => Str::uuid()->toString(),
                'instruction_id' => $instruction['instruction_id']
            ];
        }
        $incoming_disposition->incoming_disposition_instruction()->sync($instructions);

        // create log
        $incoming_disposition->activity_log()->create([
            'user_id' => $user_id,
            'type' => 'incoming_disposition',
            'log' => 'upload_incoming_disposition',
        ]);

        return ResponseFormatter::success(new IncomingDispositionDetailResource($incoming_disposition), 'success get incoming disposition data');
    }

    protected function max_agenda_number($user_id)
    {
        $max = IncomingDisposition::select(DB::raw("if(MAX(agenda_number) IS NULL, 0, MAX(agenda_number)) as max"))->where('user_id', $user_id)->first();
        return $max['max'] + 1;
    }
}
