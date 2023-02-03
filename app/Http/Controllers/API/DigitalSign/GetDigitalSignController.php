<?php

namespace App\Http\Controllers\API\DigitalSign;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\DigitalSign\DigitalSignResource;
use App\Models\DigitalSign;
use Illuminate\Http\Request;

class GetDigitalSignController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'exists:users,id'],
            'search' => ['nullable', 'string'],
            'limit' => ['nullable', 'integer'],
        ]);

        $search = $request->search;
        $limit = $request->input('limit', 10);

        $digital_sign = DigitalSign::where('user_id', $request->user_id)
        ->when($search, function($aquery, $search) {
            $aquery->where(function($sub_query) use ($search) {
                $sub_query->where('mail_number', 'like', '%'.$search.'%')
                    ->orWhere('purpose', 'like', '%'.$search.'%');
            });
        })->paginate($limit);

        return ResponseFormatter::success(DigitalSignResource::collection($digital_sign)->response()->getData(true), 'success get digital sign data');
    }

    public function show(DigitalSign $digital_sign)
    {
        return ResponseFormatter::success(new DigitalSignResource($digital_sign), 'success show detail digital sign data');
    }
}
