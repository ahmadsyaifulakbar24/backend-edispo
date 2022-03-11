<?php

namespace App\Http\Controllers\API\Mail;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Mail\MailDetailResource;
use App\Http\Resources\Mail\MailResource;
use App\Models\Mail;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GetMailController extends Controller
{
    public function get (Request $request)
    {
        $request->validate([
            'mail_category' => ['required', 'in:incoming_mail,official_memo'],
            'disposition' => ['nullable', 'in:0,1'],
            'from_date' => ['nullable', 'date', 'before_or_equal:'. Carbon::now()->format('Y-m-d')],
            'until_date' => ['nullable', 'date', 'after_or_equal:' .$request->from_date, 'before_or_equal:'. Carbon::now()->format('Y-m-d')],
            'search' => ['nullable', 'string'],
            'limit' => ['nullable', 'integer']
        ]);
        $limit = $request->input('limit', 10);
        $mail = Mail::where('mail_category', $request->mail_category);

        $user = $request->user();
        $user_id = ($user->role == 'assistant') ? $user->user_group()->first()->parent_id : $user->id;
        $mail->where('user_id', $user_id);
        
        if($request->disposition) {
            $mail->where('disposition', $request->disposition);
        }

        if($request->from_date) {
            $mail->where('created_at', '>=', $request->from_date);
        }

        if($request->until_date) {
            $mail->where('created_at', '<=', $request->until_date);
        }

        if($request->search) {
            $mail->where('mail_number', 'like', '%'.$request->search.'%');
        }
        $result = $mail->orderBy('created_at', 'desc')->paginate($limit);
        return ResponseFormatter::success(MailResource::collection($result)->response()->getData(true), 'success get mail data');
    }

    public function show(Mail $mail)
    {
        return ResponseFormatter::success(new MailDetailResource($mail), 'success get email data');
    }
}
