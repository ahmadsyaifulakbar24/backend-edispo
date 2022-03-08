<?php

namespace App\Http\Controllers\API\Report;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\IncomingDisposition;
use App\Models\Mail;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function get_total_data(Request $request)
    {
        $request->validate([
            'user_id' => ['required', 'exists:users,id']
        ]);

        $result = [
            'total_mail' => Mail::where([['mail_category', 'incoming_mail'], ['user_id', $request->user_id]])->count(),
            'total_official_memo' => Mail::where([['mail_category', 'official_memo'], ['user_id', $request->user_id]])->count(),
            'total_incoming_disposition' => IncomingDisposition::where('user_id', $request->user_id)->count(),
            'total_agenda' => Agenda::where('user_id', $request->user_id)->count(),
        ];

        return ResponseFormatter::success($result, 'success get report total data');
    }
}
