<?php

namespace App\Http\Controllers\API\ActivityLog;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\ActivityLog\ActivityLogDetailResource;
use App\Http\Resources\ActivityLog\ActivityLogResource;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ActivityLogController extends Controller
{
    public function get(Request $request)
    {
        $request->validate([
            'mail_id' => ['required', 'exists:mails,id'],
        ]);

        $activity_log = ActivityLog::where('mail_id', $request->mail_id)->orderby('created_at', 'asc')->get();
        return ResponseFormatter::success(ActivityLogResource::collection($activity_log), 'success get activity log data');
    }
    
    public function show(ActivityLog $activity_log)
    {
        return ResponseFormatter::success(new ActivityLogDetailResource($activity_log), 'success get activity log detail data');
    }
}
