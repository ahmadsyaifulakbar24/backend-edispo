<?php

namespace App\Http\Controllers\API\IncomingDisposition;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\IncomingDisposition\IncomingDispositionDetailResource;
use App\Http\Resources\IncomingDisposition\IncomingDispositionResource;
use App\Models\IncomingDisposition;
use Illuminate\Http\Request;

class GetIncomingDispositionController extends Controller
{
    public function get(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'search' => ['nullable', 'string'],
            'limit' => ['nullable', 'integer']
        ]);
        $limit = $request->input('limit', 10);
        $incoming_disposition = IncomingDisposition::where('user_id', $request->user_id);

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
