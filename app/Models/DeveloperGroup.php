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
        'academic_year',
        'website',
        'image',
    ];

    protected $casts = [
        'name' => 'string',
        'description' => 'string',
        'company' => 'string',
        'academic_year' => 'string',
        'website' => 'string',
        'image' => 'string',
    ];
}
