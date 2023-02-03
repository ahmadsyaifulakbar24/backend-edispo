<?php

namespace App\Models;

use App\Traits\Uuids;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class DigitalSign extends Model
{
    use HasFactory, Uuids;

    protected $table = 'digital_signs';
    protected $fillable = [
        'user_id',
        'mail_number',
        'purpose',
        'regarding',
        'sign_date',
        'file',
        'valid',
    ];

    protected $appends = [
        'file_url'
    ];

    public function createdAt(): Attribute
    {
        return new Attribute(
            get: fn ($value) => Carbon::parse($value)->format('Y-m-d H:i:s'),
        );
    }

    public function updatedAt(): Attribute
    {
        return new Attribute(
            get: fn ($value) => Carbon::parse($value)->format('Y-m-d H:i:s'),
        );
    }

    public function fileUrl(): Attribute
    {
        return new Attribute(
            get: fn ($value, $attributes) => url('') . Storage::url($attributes['file']),
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
