<?php

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class MailDisposition extends Model
{
    use Uuids, HasFactory;
    protected $table = 'mail_dispositions';
    protected $fillable = [
        'type',
        'mail_id',
        'incoming_disposition_id',
        'agenda_id',        
        'sender_id',
        'description',
        'confirmation',
    ];

    public function getCreatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function getUpdatedAtAttribute($date) {
        return Carbon::parse($date)->format('Y-m-d H:i:s');
    }

    public function mail ()
    {
        return $this->belongsTo(Mail::class, 'mail_id');
    }

    public function incoming_disposition()
    {
        return $this->belongsTo(IncomingDisposition::class, 'incoming_disposition_id');
    }

    public function agenda()
    {
        return $this->belongsTo(Agenda::class, 'agenda_id');
    }

    public function disposition_instruction()
    {
        return $this->hasMany(DispositionInstruction::class, 'mail_disposition_id');
    }

    public function disposition_assignment()
    {
        return $this->hasMany(DispositionAssignment::class, 'mail_disposition_id');
    }
}
