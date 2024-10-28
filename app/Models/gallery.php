<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class Gallery extends Model
{
    /** @use HasFactory<\Database\Factories\GalleryFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
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
    protected static function booted()
    {
        static::saved(function ($gallery) {
            // Skontrolujeme, či existuje nahratý obrázok
            if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
                // Načíta sa obrázok a zmení sa jeho veľkosť
                $imagePath = Storage::disk('public')->path($gallery->image);
                $resizedImage = Image::make($imagePath)->resize(800, 800, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->encode();

                // Prepisujeme obrázok zmenšenou verziou
                Storage::disk('public')->put($gallery->image, (string) $resizedImage);
            }
        });
    }
}
