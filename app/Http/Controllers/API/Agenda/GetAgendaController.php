<?php

namespace App\Http\Controllers\API\Agenda;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Agenda\AgendaDetailResource;
use App\Http\Resources\Agenda\AgendaResource;
use App\Models\Agenda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class GetAgendaController extends Controller
{
    public function get(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'disposition' => ['nullable', 'in:yes,no'],
            'date_type' => ['nullable', 'in:created_at,agenda_date'],
            'from_date' => [
                Rule::requiredIf(!empty($request->date_type)), 
                'date'
            ],
            'until_date' => [
                Rule::requiredIf(!empty($request->date_type)), 
                'date'
            ],
            'limit' => ['nullable', 'integer'],
            'search' => ['nullable', 'string']
        ]);

        $limit = $request->input('limit', 10);
        
        $agenda = Agenda::where('user_id', $request->user_id);
        
        if($request->disposition) {
            if($request->disposition == 'yes') {
                $req_disposition = 1;
            } else if($request->disposition == 'no') {
                $req_disposition = 0;
            }
            $agenda->where('disposition', $req_disposition);
        }
        
        if($request->date_type) {
            if($request->from_date) {
                $agenda->where(DB::raw("DATE_FORMAT(".$request->date_type.", '%Y-%m-%d')"), '>=', $request->from_date);
            }
    
            if($request->until_date) {
                $agenda->where(DB::raw("DATE_FORMAT(".$request->date_type.", '%Y-%m-%d')"), '<=', $request->until_date);
            }
        }

        if($request->search) {
            $agenda->where('mail_number', 'like', '%'.$request->search.'%')
                    ->orWhere('regarding', 'like', '%'.$request->search.'%')
                    ->orWhere('origin', 'like', '%'.$request->search.'%');
        }

        $result = $agenda->orderBy('agenda_date', 'asc')->paginate($limit);
        return ResponseFormatter::success(AgendaResource::collection($result)->response()->getData(true), 'success get agenda data');
    }

    public function show(Agenda $agenda)
    {
        return ResponseFormatter::success(new AgendaDetailResource($agenda), 'success get agenda data');
    }
}
