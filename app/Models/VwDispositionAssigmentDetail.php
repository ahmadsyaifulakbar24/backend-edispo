<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VwDispositionAssigmentDetail extends Model
{
    use HasFactory;

    protected $table = 'vw_disposition_assigment_Detail';


    public function mail()
    {
        return $this->belongsTo(Mail::class, 'mail_id');
    }

    public function mail_security()
    {
        return $this->belongsTo(Param::class, 'mail_security_id');
    }

    public function mail_disposition()
    {
        return $this->belongsTo(MailDisposition::class, 'mail_disposition_id');
    }

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}
