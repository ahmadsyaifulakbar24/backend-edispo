<?php

namespace App\Http\Controllers\API\Agenda;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Agenda;
use Illuminate\Http\Request;

class DeleteAgendaController extends Controller
{
    public function __invoke(Agenda $agenda)
    {
        $agenda->delete();
        return ResponseFormatter::success(null, 'success delete agenda data');
    }
}
