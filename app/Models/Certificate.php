<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    /** @use HasFactory<\Database\Factories\CertificateFactory> */
    use HasFactory;

    protected $fillable = [
        'event_id',
        'user_id',
        'certificate_template_id',
        'issued_at',
    ];


    public function event()
    {
        return $this->belongsTo(Events::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function certificateTemplate()
    {
        return $this->belongsTo(CertificateTemplate::class);
    }
}
