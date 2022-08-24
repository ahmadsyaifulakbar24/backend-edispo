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
            'date_type' => ['nullable', 'in:created_at,agenda_date,date'],
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
        $search = $request->search;
        
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

        if($search) {
            $agenda->where(function($query) use ($search) {
                $query->where('mail_number', 'like', '%'.$search.'%')
                        ->orWhere('regarding', 'like', '%'.$search.'%')
                        ->orWhere('origin', 'like', '%'.$search.'%');
            });
        }

        $result = $agenda->orderBy('created_at', 'desc')->paginate($limit);
        return ResponseFormatter::success(AgendaResource::collection($result)->response()->getData(true), 'success get agenda data');
    }

    public function total_information(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'exists:users,id']
        ]);

        $agenda = Agenda::select(
            DB::raw("COUNT(IF(disposition = 1, disposition, null)) as disposition"),
            DB::raw("COUNT(IF(disposition = 0, disposition, null)) as no_disposition"),
        )->where('user_id', $request->user_id)->first();
        return ResponseFormatter::success($agenda, 'success get total infomation agenda data');
    }

    public function show(Agenda $agenda)
    {
        return ResponseFormatter::success(new AgendaDetailResource($agenda), 'success get agenda data');
    }
}
