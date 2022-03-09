<?php

namespace App\Http\Controllers\API\MailDisposition;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\DispositionAssigment\DispositionAssigmentResource;
use App\Http\Resources\MailDisposition\MailDispositionResource;
use App\Models\MailDisposition;
use App\Models\VwDispositionAssigmentDetail;
use Illuminate\Http\Request;

class GetMailDispositionController extends Controller
{
    public function show (MailDisposition $mail_disposition) {
        return ResponseFormatter::success(new MailDispositionResource($mail_disposition), 'success get mail disposition  data');
    }

    public function out_disposition (Request $request) {
        $request->validate([
            'search' => ['nullable','string'],
            'limit' => ['nullable', 'integer'],
        ]);
        $limit = $request->input('limit', 10);
        $disposition_assigment =  VwDispositionAssigmentDetail::where('sender_id', $request->user()->id);
        if($request->search) {
            $disposition_assigment->where('mail_number', 'like', '%'.$request->search.'%');
        }
        $result = $disposition_assigment->orderBy('created_at', 'desc')->paginate($limit);
        return ResponseFormatter::success(DispositionAssigmentResource::collection($result)->response()->getData(), 'success get mail disposition data');
    }
}
