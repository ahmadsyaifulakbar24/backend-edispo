<?php

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DispositionAssignment extends Model
{
    use Uuids, HasFactory;
    protected $table = 'disposition_assignments';
    protected $fillable = [
        'mail_disposition_id',
        'receiver_id',
        'position_name',
        'read',
        'activity_log_id'
    ];

    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function receiver ()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}
