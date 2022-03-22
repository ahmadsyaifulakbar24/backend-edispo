<?php

namespace App\Http\Controllers\API\MailDisposition;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\MailDisposition\MailDispositionResource;
use App\Models\MailDisposition;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetMailDispositionController extends Controller
{
    public function show (MailDisposition $mail_disposition) {
        return ResponseFormatter::success(new MailDispositionResource($mail_disposition), 'success get mail disposition  data');
    }

    public function out_disposition (Request $request) {
        $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'from_date' => ['nullable', 'date', 'before_or_equal:'. Carbon::now()->format('Y-m-d')],
            'until_date' => ['nullable', 'date', 'after_or_equal:' .$request->from_date, 'before_or_equal:'. Carbon::now()->format('Y-m-d')],
            'limit' => ['nullable', 'integer'],
        ]);
        $limit = $request->input('limit', 10);
        $mail_disposition = MailDisposition::where('sender_id', $request->user_id);

        if($request->from_date) {
            $mail_disposition->where(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"), '>=', $request->from_date);
        }

        if($request->until_date) {
            $mail_disposition->where(DB::raw("DATE_FORMAT(created_at, '%Y-%m-%d')"), '<=', $request->until_date);
        }
        
        $result = $mail_disposition->orderBy('created_at', 'desc')->paginate($limit);
        return ResponseFormatter::success(MailDispositionResource::collection($result)->response()->getData(), 'success get mail disposition data');
    }
}
