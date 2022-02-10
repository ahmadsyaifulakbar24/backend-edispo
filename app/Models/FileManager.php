<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileManager extends Model
{
    use Uuids, HasFactory;
    protected $table = 'file_managers';
    protected $fillable = [
        'mail_id',
        'path',
        'file_name'
    ];
}
