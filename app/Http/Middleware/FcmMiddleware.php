<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;
use Response;
use App\Helpers\Constant;
use App\Models\FcmToken;
use Auth;
use App\Helpers\ResponseFormatter;

class FcmMiddleware
{
    public function handle($request, Closure $next, ...$guard){
        $user = $request->user();
        if(!empty($user)){
            $userId = $user->id;
            $token = $user->token();
            $oauthId = $token->id;
            $revoke = $token->revoked;

            FcmToken::revokeByUser($userId);
    
            if($revoke){
                FcmToken::revokeByOauthId($oauthId);
            }
        } else {
            $header = $request->header();
            $authString = $header['authorization'];
            $token = str_replace(Constant::$authType." ", "", $authString);
            // return response()->json(["test"]);
            FcmToken::revokeByOauthToken($token[0]);

            return ResponseFormatter::error(null, "Unauthenticated.", 401);
        }


    
        return $next($request);
    }
}