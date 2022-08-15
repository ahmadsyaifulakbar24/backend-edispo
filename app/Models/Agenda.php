<?php

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use Uuids, HasFactory;

    protected $table = 'agendas';
    protected $fillable = [
        'user_id',
        'agenda_number',
        'mail_number',
        'origin',
        'regarding',
        'agenda_date',
        'date_received',
        'date',
        'location',
        'description',
        'disposition'
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

    public function file_manager()
    {
        return $this->hasMany(FileManager::class, 'agenda_id');
    }
}
