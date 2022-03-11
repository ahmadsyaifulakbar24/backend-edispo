<?php

namespace App\Http\Controllers\API\Agenda;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Agenda\AgendaDetailResource;
use App\Http\Resources\Agenda\AgendaResource;
use App\Models\Agenda;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GetAgendaController extends Controller
{
    public function get(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'disposition' => ['nullable', 'in:0,1'],
            'from_date' => ['nullable', 'date', 'before_or_equal:'. Carbon::now()->format('Y-m-d')],
            'until_date' => ['nullable', 'date', 'after_or_equal:' .$request->from_date, 'before_or_equal:'. Carbon::now()->format('Y-m-d')],
            'limit' => ['nullable', 'integer'],
            'search' => ['nullable', 'string']
        ]);

        $limit = $request->input('limit', 10);
        
        $agenda = Agenda::where('user_id', $request->user_id);

        if($request->disposition) {
            $agenda->where('disposition', $request->disposition);
        }

        if($request->from_date) {
            $agenda->where('created_at', '>=', $request->from_date);
        }

        if($request->until_date) {
            $agenda->where('created_at', '<=', $request->until_date);
        }

        if($request->search) {
            $agenda->where('regarding', 'like', '%' . $request->search . '%');
        }

        $result = $agenda->orderBy('created_at', 'desc')->paginate($limit);
        return ResponseFormatter::success(AgendaResource::collection($result)->response()->getData(true), 'success get agenda data');
    }

    public function show(Agenda $agenda)
    {
        return ResponseFormatter::success(new AgendaDetailResource($agenda), 'success get agenda data');
    }
}
