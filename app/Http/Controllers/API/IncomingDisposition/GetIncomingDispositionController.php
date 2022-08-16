<?php

namespace App\Http\Controllers\API\IncomingDisposition;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\IncomingDisposition\IncomingDispositionDetailResource;
use App\Http\Resources\IncomingDisposition\IncomingDispositionResource;
use App\Models\IncomingDisposition;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetIncomingDispositionController extends Controller
{
    public function get(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'disposition' => ['nullable', 'in:yes,no'],
            'from_date' => ['nullable', 'date', 'before_or_equal:'. Carbon::now()->format('Y-m-d')],
            'until_date' => ['nullable', 'date', 'after_or_equal:' .$request->from_date, 'before_or_equal:'. Carbon::now()->format('Y-m-d')],
            'search' => ['nullable', 'string'],
            'limit' => ['nullable', 'integer']
        ]);
        $limit = $request->input('limit', 10);
        $incoming_disposition = IncomingDisposition::where('user_id', $request->user_id);
        $search = $request->search;

        if($request->disposition) {
            if($request->disposition == 'yes') {
                $req_disposition = 1;
            } else if($request->disposition == 'no') {
                $req_disposition = 0;
            }
            $incoming_disposition->where('disposition', $req_disposition);
        }

        if($request->from_date) {
            $incoming_disposition->where(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"), '>=', $request->from_date);
        }

        if($request->until_date) {
            $incoming_disposition->where(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"), '<=', $request->until_date);
        }

        if($search) {
            $incoming_disposition->where(function($query) use ($search) {
                $query->where('mail_number', 'like', '%'.$search.'%')
                                    ->orWhere('regarding', 'like', '%'.$search.'%')
                                    ->orWhere('mail_origin', 'like', '%'.$search.'%');
            });
        }

        $result = $incoming_disposition->orderBy('created_at', 'desc')->paginate($limit);
        return ResponseFormatter::success(IncomingDispositionResource::collection($result)->response()->getData(true), 'success get incoming disposition data');
    }

    public function total_information(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'exists:users,id']
        ]);

        $incoming_disposition = IncomingDisposition::select(
            DB::raw("COUNT(IF(disposition = 1, disposition, null)) as disposition"),
            DB::raw("COUNT(IF(disposition = 0, disposition, null)) as no_disposition"),
        )->where('user_id', $request->user_id)->first();
        return ResponseFormatter::success($incoming_disposition, 'success get total infomation incoming disposition data');
    }

    public function show(IncomingDisposition $incoming_disposition)
    {
        return ResponseFormatter::success(new IncomingDispositionDetailResource($incoming_disposition));
    }
}
