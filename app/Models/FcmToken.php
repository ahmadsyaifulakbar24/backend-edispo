<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class FcmToken extends Model
{
    protected $table = 'fcm_token';
    protected $fillable = [
        'oauth_id',
        'oauth_token',
        'token',
        'user_id',
        'status',
        'created_at',
        'updated_at',
    ];

    static function revokeByUser($userId){
        \DB::statement("
        UPDATE fcm_token f 
        JOIN oauth_access_tokens t ON f.oauth_id COLLATE utf8mb4_general_ci = t.id 
        SET 
        f.status = ? 
        WHERE 
        t.user_id = ? AND revoked = ? AND f.status = ?", [0, $userId, 1, 1]);
    }
    static function revokeByOauthId($oauthId){
        \DB::statement("
        UPDATE fcm_token 
        SET 
        status = ? 
        WHERE 
        oauth_id = ? AND status = ?", [0, $oauthId, 1]);
    }
    static function revokeByOauthToken($token){
        \DB::update("
        UPDATE fcm_token 
        SET 
        status = ? 
        WHERE 
        oauth_token = ? AND status = ?", [0, $token, 1]);
    }
}