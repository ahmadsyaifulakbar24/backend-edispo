<?php

namespace App\Http\Controllers\API\Mail;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Mail\MailDetailResource;
use App\Http\Resources\Mail\MailResource;
use App\Models\Mail;
use App\Models\User;
use Illuminate\Http\Request;

class GetMailController extends Controller
{
    public function get (Request $request)
    {
        $request->validate([
            'mail_category' => ['required', 'in:incoming_mail,official_memo'],
            'search' => ['nullable', 'string'],
            'limit' => ['nullable', 'integer']
        ]);
        $limit = $request->input('limit', 10);
        $mail = Mail::where('mail_category', $request->mail_category);

        $user = $request->user();
        $user_id = ($user->role == 'assistant') ? $user->parent_id : $user->id;
        $mail->where('user_id', $user_id);
        
        if($request->search) {
            $mail->where('mail_number', 'like', '%'.$request->search.'%');
        }
        $result = $mail->paginate($limit);
        return ResponseFormatter::success(MailResource::collection($result)->response()->getData(true), 'success get mail data');
    }

    public function show(Mail $mail)
    {
        return ResponseFormatter::success(new MailDetailResource($mail), 'success get email data');
    }
}
