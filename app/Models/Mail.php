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
        'mail_origin',
        'regarding',
        'mail_date',
        'mail_category',
        'mail_type',
        'mail_nature'
    ];

    protected $dates = ['deleted_at'];
}
