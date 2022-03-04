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
        'main_number',
        'mail_origin',
        'regarding',
        'mail_date',
        'date_receive',
        'mail_nature_id',
        'mail_security_id',
        'summary',
        'description'
    ];
}
