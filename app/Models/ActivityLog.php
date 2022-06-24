<?php

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
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

    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function mail()
    {
        return $this->belongsTo(Mail::class, 'mail_id');
    }

    public function disposition_assignment()
    {
        return $this->hasMany(DispositionAssignment::class, 'activity_log_id');
    }
}
