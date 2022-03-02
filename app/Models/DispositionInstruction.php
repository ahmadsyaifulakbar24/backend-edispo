<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DispositionInstruction extends Model
{
    use Uuids, HasFactory;
    protected $table = 'disposition_instructions';
    protected $fillable = [
        'mail_disposition_id',
        'instruction_id'
    ];

    public function instruction()
    {
        return $this->belongsTo(Param::class, 'instruction_id');
    }
}
