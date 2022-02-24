<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DispositionAssigment extends Model
{
    use Uuids, HasFactory;
    protected $table = 'disposition_assigments';
    protected $fillable = [
        'mail_disposition_id',
        'sender_id',
        'receiver_id',
        'read',
        'activity_log_id'
    ];

    public function sender ()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver ()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}
