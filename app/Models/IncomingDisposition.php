<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IncomingDisposition extends Model
{
    use Uuids, HasFactory;

    protected $table = 'incoming_dispositions';
    protected $fillable = [
        'user_id',
        'agenda_number',
        'mail_number',
        'mail_origin',
        'regarding',
        'mail_date',
        'date_received',
        'mail_nature_id',
        'mail_security_id',
        'summary',
        'description'
    ];

    public function file_manager () 
    {
        return $this->hasMany(FileManager::class, 'incoming_disposition_id');
    }    

    public function mail_disposition()
    {
        return $this->hasMany(MailDisposition::class, 'incoming_disposition_id');
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
        return $this->hasMany(ActivityLog::class, 'incoming_disposition_id');
    }

    public function incoming_disposition_instruction()
    {
        return $this->belongsToMany(Param::class, 'incoming_disposition_instructions', 'id_id', 'instruction_id')->withPivot('id');
    }

    public function incoming_dispo_instruc_many() 
    {
        return $this->hasMany(IncomingDispositionInstruction::class, 'id_id');
    }
}
