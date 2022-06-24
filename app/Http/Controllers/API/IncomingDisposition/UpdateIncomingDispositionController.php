<?php

namespace App\Http\Controllers\API\IncomingDisposition;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\IncomingDisposition\IncomingDispositionDetailResource;
use App\Models\IncomingDisposition;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class UpdateIncomingDispositionController extends Controller
{
    public function __invoke(Request $request, IncomingDisposition $incoming_disposition)
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

        // update data
        $input = $request->all();
        $incoming_disposition->update($input);

        // update instruction
        foreach ($request->instruction as $instruction) {
            $instructions[] = [
                'id' => Str::uuid()->toString(),
                'instruction_id' => $instruction['instruction_id']
            ];
        }
        $incoming_disposition->incoming_disposition_instruction()->sync($instructions);

        // create log
        $user = $request->user();
        $user_id = ($user->role == 'assistant') ? $user->user_group()->first()->parent_id : $user->id;
        $incoming_disposition->activity_log()->create([
            'user_id' => $user_id,
            'type' => 'incoming_disposition',
            'log' => 'update_incoming_disposition',
        ]);

        return ResponseFormatter::success(new IncomingDispositionDetailResource($incoming_disposition), 'success update incoming disposition data');
    }
}
