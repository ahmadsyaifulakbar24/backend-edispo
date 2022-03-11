<?php

namespace App\Http\Controllers\API\MailDisposition;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\MailDisposition\MailDispositionResource;
use App\Models\MailDisposition;
use Illuminate\Http\Request;

class GetMailDispositionController extends Controller
{
    public function show (MailDisposition $mail_disposition) {
        return ResponseFormatter::success(new MailDispositionResource($mail_disposition), 'success get mail disposition  data');
    }

    public function out_disposition (Request $request) {
        $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'search' => ['nullable','string'],
            'limit' => ['nullable', 'integer'],
        ]);
        $limit = $request->input('limit', 10);
        $mail_disposition = MailDisposition::where('sender_id', $request->user_id);
        $result = $mail_disposition->orderBy('created_at', 'desc')->paginate($limit);
        return ResponseFormatter::success(MailDispositionResource::collection($result)->response()->getData(), 'success get mail disposition data');
    }
}
