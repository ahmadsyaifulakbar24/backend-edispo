<?php

namespace App\Http\Controllers\API\Agenda;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Agenda\AgendaDetailResource;
use App\Models\Agenda;
use Illuminate\Http\Request;

class UpdateAgendaController extends Controller
{
    public function __invoke(Request $request, Agenda $agenda)
    {
        $request->validate([
            'origin' => ['required', 'string'],
            'regarding' => ['required', 'string'],
            'agenda_date' => ['required', 'date'],
            'date_received' => ['required', 'date'],
            'date' => ['required', 'date_format:Y/m/d H:i:s'],
            'location' => ['required', 'string'],
            'description' => ['required', 'string'],
        ]);   
        
        $input = $request->all();
        $agenda->update($input);

        return ResponseFormatter::success(new AgendaDetailResource($agenda), 'success update agenda data');
    }
}
