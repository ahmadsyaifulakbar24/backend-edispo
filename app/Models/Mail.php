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
        'mail_type',
        'mail_nature'
    ];

    protected $hidden = [
        'agenda_number'
    ];

    protected $dates = ['deleted_at'];

    public function file_manager () 
    {
        return $this->hasMany(FileManager::class, 'mail_id');
    }
}
