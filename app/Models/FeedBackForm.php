<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeedBackForm extends Model
{
    /** @use HasFactory<\Database\Factories\FeedBackFormFactory> */
    use HasFactory;

    protected $fillable = ['event_id', 'form_link', 'quiz_link', 'feedback_active', 'quiz_active'] ;

    protected $casts = [
        'feedback_active' => 'boolean',
        'quiz_active' => 'boolean',
    ];

    public function event()
    {
        return $this->belongsTo(Events::class);
    }

}
