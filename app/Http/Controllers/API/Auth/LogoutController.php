<?php

namespace App\Http\Controllers\API\Auth;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FcmToken;

class LogoutController extends Controller
{
    public function __invoke(Request $request)
    {
        $token = $request->user()->token();
        $oauthId = $token->id;
        FcmToken::where("oauth_id", $oauthId)->update(["status" => '0']);
        $revoke = $token->revoke();
        return ResponseFormatter::success($revoke, 'Token Revoked');
    }
}
