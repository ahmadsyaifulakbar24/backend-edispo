<?php

namespace App\Http\Controllers\API\IncomingDisposition;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\IncomingDisposition\IncomingDispositionDetailResource;
use App\Http\Resources\IncomingDisposition\IncomingDispositionResource;
use App\Models\IncomingDisposition;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GetIncomingDispositionController extends Controller
{
    public function get(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'disposition' => ['nullable', 'boolean', 'in:0,1'],
            'from_date' => ['nullable', 'date', 'before_or_equal:'. Carbon::now()->format('Y-m-d')],
            'until_date' => ['nullable', 'date', 'after_or_equal:' .$request->from_date, 'before_or_equal:'. Carbon::now()->format('Y-m-d')],
            'search' => ['nullable', 'string'],
            'limit' => ['nullable', 'integer']
        ]);
        $limit = $request->input('limit', 10);
        $incoming_disposition = IncomingDisposition::where('user_id', $request->user_id);

        if($request->disposition == 0 || $request->disposition == 1) {
            $incoming_disposition->where('disposition', $request->disposition);
        }

        if($request->from_date) {
            $incoming_disposition->where('created_at', '>=', $request->from_date);
        }

        if($request->until_date) {
            $incoming_disposition->where('created_at', '<=', $request->until_date);
        }

        if($request->search) {
            $incoming_disposition->where('mail_number', 'like', '%'.$request->search.'%');
        }

        $result = $incoming_disposition->orderBy('created_at', 'desc')->paginate($limit);
        return ResponseFormatter::success(IncomingDispositionResource::collection($result)->response()->getData(true), 'success get incoming disposition data');
    }

    public function show(IncomingDisposition $incoming_disposition)
    {
        return ResponseFormatter::success(new IncomingDispositionDetailResource($incoming_disposition));
    }
}
