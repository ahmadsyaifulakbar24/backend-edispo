<?php

namespace App\Http\Controllers\API\MailDisposition;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\DispositionAssigment\DispositionAssigmentResource;
use App\Models\VwDispositionAssigmentDetail;
use Illuminate\Http\Request;

class GetMailDispositionController extends Controller
{
    public function incoming_disposition (Request $request)
    {
        $request->validate([
            'receiver_id' => ['required', 'exists:users,id'],
            'search' => ['nullable','string'],
            'limit' => ['nullable', 'integer'],
        ]);
        $limit = $request->input('limit', 10);
        $disposition_assigment =  VwDispositionAssigmentDetail::where('receiver_id', $request->receiver_id);
        if($request->search) {
            $disposition_assigment->where('mail_number', 'like', '%'.$request->search.'%');
        }

        $result = $disposition_assigment->paginate($limit);
        return ResponseFormatter::success(DispositionAssigmentResource::collection($result)->response()->getData(), 'success get mail disposition data');
    }

    public function out_disposition (Request $request) {
        $request->validate([
            'sender_id' => ['required', 'exists:users,id'],
            'search' => ['nullable','string'],
            'limit' => ['nullable', 'integer'],
        ]);
        $limit = $request->input('limit', 10);
        $disposition_assigment =  VwDispositionAssigmentDetail::where('sender_id', $request->sender_id);
        if($request->search) {
            $disposition_assigment->where('mail_number', 'like', '%'.$request->search.'%');
        }
        $result = $disposition_assigment->paginate($limit);
        return ResponseFormatter::success(DispositionAssigmentResource::collection($result)->response()->getData(), 'success get mail disposition data');
    }
}
