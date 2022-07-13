<?php

namespace App\Http\Controllers\API\Notification;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;

class NotificationController extends Controller
{
    public function get_all(Request $request)
    {
        $user = User::find($request->user()->id);
        return ResponseFormatter::success($user->unreadNotifications, 'success get notification data');
    }

    public function count_unread(Request $request) {
        $user = User::find($request->user()->id);
        return ResponseFormatter::success($user->unreadNotifications()->count(), 'success get count notification data');
    }

    public function read(Request $request, $notification_id)
    {
        $user = User::find($request->user()->id);
        $notification = $user->notifications()->where('id', $notification_id)->first();
        $notification->update([ 'read_at' => now()]);
        return ResponseFormatter::success($notification, 'success mark as read notification');
    }
}