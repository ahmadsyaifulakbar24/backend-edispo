<?php

namespace App\Http\Controllers\API\Agenda;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Agenda\AgendaDetailResource;
use App\Models\Agenda;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CreateAgendaController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'mail_number' => ['required', 'string'],
            'origin' => ['required', 'string'],
            'regarding' => ['required', 'string'],
            'agenda_date' => ['required', 'date'],
            'date_received' => ['required', 'date'],
            'date' => ['required', 'date_format:Y/m/d H:i:s'],
            'location' => ['required', 'string'],
            'description' => ['required', 'string'],
        ]);   
        
        $input = $request->all();
        $user = User::find($request->user()->id);
        $user_id = ($user->role == 'assistant') ? $user->user_group()->first()->parent_id : $user->id;
        $input['user_id'] = $user_id;
        $input['agenda_number'] = $this->max_agenda_number($user->id);

        $agenda = Agenda::create($input);
        return ResponseFormatter::success(new AgendaDetailResource($agenda), 'success create agenda data');
    }

    protected function max_agenda_number($user_id)
    {
        $max = Agenda::select(DB::raw("if(MAX(agenda_number) IS NULL, 0, MAX(agenda_number)) as max"))->where('user_id', $user_id)->first();
        return $max['max'] + 1;
    }
}
