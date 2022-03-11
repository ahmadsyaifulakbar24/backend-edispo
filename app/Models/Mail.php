<?php

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mail extends Model
{
    use Uuids, HasFactory;
    
    protected $table = 'mails';

    protected $fillable = [
        'user_id',
        'agenda_number',
        'mail_number',
        'mail_origin',
        'regarding',
        'mail_date',
        'date_received',
        'mail_category',
        'mail_type_id',
        'mail_nature_id',
        'mail_security_id',
        'summary',
        'disposition',
    ];

    protected $dates = ['deleted_at'];

    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }
    public function file_manager () 
    {
        return $this->hasMany(FileManager::class, 'mail_id');
    }

    public function mail_disposition()
    {
        return $this->hasMany(MailDisposition::class, 'mail_id');
    }

    public function mail_security()
    {
        return $this->belongsTo(Param::class, 'mail_security_id');
    }

    public function user ()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function mail_nature ()
    {
        return $this->belongsTo(Param::class, 'mail_nature_id');
    }

    public function mail_type ()
    {
        return $this->belongsTo(Param::class, 'mail_type_id');
    }

    public function activity_log()
    {
        return $this->hasMany(ActivityLog::class, 'mail_id');
    }
}
