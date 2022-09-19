<?php

namespace App\Http\Controllers\API\Auth;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Models\{User, FcmToken};
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Constant;


class LoginController extends Controller
{
    public function __invoke(Request $request)
    {
        // validasi form input
        $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required']
        ]);
        try {
            // Mengecek credential login
            if(!Auth::attempt(['username' => $request->username, 'password' => $request->password, 'active' => 1])) {
                return ResponseFormatter::error([
                    'message' => 'Unauthorized'
                ], 'Authentication Failed', 422);
            }

            // Jika Hash atau password tidak sesuai
            $user = User::where('username', $request->username)->first();
            if(!Hash::check($request->password, $user->password)) {
                throw new \Exception('Invalid Credentials');
            }

             // Jika berhasil maka loginkan
            $tokenResult = $user->createToken('authToken');
            $tokenValue = $tokenResult->accessToken;
            $tokenData = $tokenResult->token;

            if($request->has('fcm_token') && !empty($request->fcm_token)){
                $date = date("Y-m-d H:i:s");
                // save fcm_token
                $fcmData = [
                    'oauth_id'    => $tokenData->id,
                    'oauth_token' => $tokenValue,
                    'token'       => $request->fcm_token,
                    'user_id'     => $user->id,
                    'status'      => 1, // 1=aktif
                    'created_at'  => $date,
                    'updated_at'  => $date,
                ];
                FcmToken::create($fcmData);
            }

            return ResponseFormatter::success([
                'access_token' => $tokenValue,
                'token_type' => Constant::$authType,
                'user' => new UserResource($user)
            ], 'Authenticated');

        } catch (Exception $e) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $e->getMessage(),
            ], 'Authentication failed', 500);
        }
    }
}
