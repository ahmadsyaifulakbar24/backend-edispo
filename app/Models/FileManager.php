<?php

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class FileManager extends Model
{
    use Uuids, HasFactory;
    protected $table = 'file_managers';
    protected $fillable = [
        'mail_id',
        'path',
        'file_name'
    ];
    
    protected $appends = [
        'path_url'
    ];

    public function getPathUrlAttribute()
    {
        return url('') . Storage::url($this->attributes['path']);
    }
    
    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }
}
