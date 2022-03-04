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
    ];

    public function mail ()
    {
        return $this->belongsTo(Mail::class, 'mail_id');
    }

    public function disposition_instruction()
    {
        return $this->hasMany(DispositionInstruction::class, 'mail_disposition_id');
    }

    public function disposition_assigment()
    {
        return $this->hasMany(DispositionAssigment::class, 'mail_disposition_id');
    }
}
