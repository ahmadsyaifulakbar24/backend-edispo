<?php

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Uuids, HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'nip',
        'gender',
        'phone_number',
        'position',
        'position_name',
        'role',
        'photo',
        'active',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = ['deleted_at'];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    protected $appends = [
        'photo_url'
    ];

    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function user_group () 
    {
        return $this->hasMany(UserGroup::class, 'user_id');
    }

    public function getPhotoUrlAttribute()
    {
        return !empty($this->attributes['photo']) ? url('') . Storage::url($this->attributes['photo']) : null;
    }

    public function routeNotificationForFcm()
    {
        $data = FcmToken::where('user_id', $this->id)->where('status', 1)->select('token')->get();
        if($data->count() > 0){
            $token = [];
            foreach ($data as $k => $v) {
                $token[] = $v->token;
            }
            return $token;
        }
        return "";
        // return $this->getDeviceTokens();
        // return $this->hasMany(FcmToken::class, 'user_id')->select('token as fcm_token');
        // $data = $this->hasMany(FcmToken::class, 'user_id')->select('token');
        // dd($this->id);
        // dd($data->count());
        // if($data->count() > 0){
        //     $token = [];
        //     foreach ($data as $k => $v) {
        //         dd($v);
        //         $token[] = $v->token;
        //     }
        //     dd($token);
        //     return $token;
        // }
        // return "";
        // return $this->fcm_token;
        // return 'fjshowj7S0mkk_ihH13P7C:APA91bG526z7ic91JEoT_VN6rCnPyAmcySxcAfcqNzrilzkTLdJQMkBol92nYDXoRYljDetUc67GLPCSsFR7EX3_36eTHQVGhwzvmo-RvnF_tZHvpdkmtghaTzGR2HJ1UXNKumiEz03O';
    }
}
