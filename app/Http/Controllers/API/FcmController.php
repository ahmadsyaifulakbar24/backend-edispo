<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FcmToken;

class FcmController extends Controller
{
    function index(Request $request){
        $user = $request->user();
        $userId = $user->id;
        $token = $user->token();
        $oauthId = $token->id;
        $newToken = $request->token;
        if( !empty( $newToken ) ){
            $update = FcmToken::where("user_id", $userId)->where("oauth_id", $oauthId)->update(["token" => $newToken]);
            return ResponseFormatter::success(null, 'success update token fcm');
        }

        return ResponseFormatter::error(null, 'authentication or token not found', 404);
    }
}