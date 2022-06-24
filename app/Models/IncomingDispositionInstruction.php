<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomingDispositionInstruction extends Model
{
    use Uuids, HasFactory;

    protected $table = 'incoming_disposition_instructions';
    protected $fillable = [
        'incoming_disposition_id',
        'instruction_id',
    ];

    public $timestamps = false;

    public function incoming_disposition()
    {
        return $this->belongsTo(IncomingDisposition::class, 'incoming_disposition_id');
    }

    public function instruction()
    {
        return $this->belongsTo(Param::class, 'instruction_id');
    }
}
