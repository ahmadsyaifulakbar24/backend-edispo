<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use Uuids, HasFactory;

    protected $table = 'agendas';
    protected $fillable = [
        'user_id',
        'agenda_number',
        'origin',
        'regarding',
        'date',
        'location',
        'description',
    ];
}
