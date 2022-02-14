<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mail extends Model
{
    use Uuids, HasFactory, SoftDeletes;
    
    protected $table = 'mails';

    protected $fillable = [
        'user_id',
        'agenda_number',
        'mail_number',
        'mail_origin',
        'regarding',
        'mail_date',
        'mail_category',
        'mail_type_id',
        'mail_nature_id',
        'summary'
    ];

    protected $dates = ['deleted_at'];

    public function file_manager () 
    {
        return $this->hasMany(FileManager::class, 'mail_id');
    }

    public function mail_disposition()
    {
        return $this->hasMany(MailDisposition::class, 'mail_id');
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
