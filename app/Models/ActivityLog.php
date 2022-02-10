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
        'mail_id',
        'log'
    ];
}
