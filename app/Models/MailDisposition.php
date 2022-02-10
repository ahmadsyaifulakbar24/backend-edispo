<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MailDisposition extends Model
{
    use Uuids, HasFactory;
    protected $table = 'mail_dispositions';
    protected $fillable = [
        'mail_id',
        'description',
        'mail_security_id',
    ];
}
