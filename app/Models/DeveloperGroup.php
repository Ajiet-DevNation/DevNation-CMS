<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeveloperGroup extends Model
{
    /** @use HasFactory<\Database\Factories\DeveloperGroupFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'company',
        'website',
        'image',
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'company' => 'string',
        'website' => 'string',
        'image' => 'string',
        'start_date' => 'date',
        'end_date' => 'date',
    ];
}
