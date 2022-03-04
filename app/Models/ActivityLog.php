<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use Uuids, HasFactory;
    protected $table = 'activity_logs';
    protected $fillable = [
        'user_id',
        'type',
        'incoming_disposition_id',
        'mail_id',
        'agenda_id',
        'log'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function mail()
    {
        return $this->belongsTo(Mail::class, 'mail_id');
    }

    public function disposition_assigment()
    {
        return $this->hasMany(DispositionAssigment::class, 'activity_log_id');
    }
}
