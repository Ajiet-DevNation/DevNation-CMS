<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'event_type',
        'location',
        'banner',
        'poster',
        'speaker',
        'speaker_mail',
        'status',
        'is_featured',
        'requires_registration',
        'max_attendees',
        'has_certificate',
        'notify_attendees',
        'notify_attendance',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'is_featured' => 'boolean',
        'requires_registration' => 'boolean',
        'has_certificate' => 'boolean',
        'notify_attendees' => 'boolean',
        'notify_attendance' => 'boolean',
    ];

    public function eventRegistrations()
    {
        return $this->hasMany(EventRegisteraion::class);
    }
}
