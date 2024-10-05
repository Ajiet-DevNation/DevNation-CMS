<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class gallery extends Model
{
    /** @use HasFactory<\Database\Factories\GalleryFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
        'event_id',
        'meta_description',
        'meta_keywords',
        'meta_title',
        'gallery_images',
        'is_published',
    ];

    public function event()
    {
        return $this->belongsTo(Events::class);
    }

    protected $casts = [
        'gallery_images' => 'array',
        'is_published' => 'boolean',
    ];
}
