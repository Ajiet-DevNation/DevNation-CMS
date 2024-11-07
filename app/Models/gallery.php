<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class gallery extends Model
{
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

    protected static function booted()
    {
        // static::saving(function ($gallery) {
        //     if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
        //         $gallery->image = self::resizeImage($gallery->image);
        //     }

        //     if ($gallery->gallery_images) {
        //         $galleryImages = $gallery->gallery_images;
        //         foreach ($galleryImages as &$image) {
        //             if (Storage::disk('public')->exists($image)) {
        //                 $image = self::resizeImage($image);
        //             }
        //         }
        //         $gallery->gallery_images = $galleryImages;
        //     }
        // });

        // // Pridajme metódu na mazanie súborov pri vymazaní galérie
        // static::deleting(function ($gallery) {
        //     if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
        //         Storage::disk('public')->delete($gallery->image);
        //     }

        //     if ($gallery->gallery_images) {
        //         foreach ($gallery->gallery_images as $image) {
        //             if (Storage::disk('public')->exists($image)) {
        //                 Storage::disk('public')->delete($image);
        //             }
        //         }
        //     }
        // });
    }

    protected static function resizeImage($imagePath)
    {
        try {
            $fullImagePath = Storage::disk('public')->path($imagePath);
            $sourceImage = imagecreatefromstring(file_get_contents($fullImagePath));
            if ($sourceImage === false) {
                return $imagePath;
            }

            $newWidth = 300;
            $newHeight = 300;
            $resizedImage = imagecreatetruecolor($newWidth, $newHeight);
            imagecopyresampled($resizedImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, imagesx($sourceImage), imagesy($sourceImage));

            imagejpeg($resizedImage, $fullImagePath, 90);
            imagedestroy($sourceImage);
            imagedestroy($resizedImage);

            return $imagePath;
        } catch (\Exception $e) {
            return $imagePath;
        }
    }

    public function setGalleryImagesAttribute($value)
    {
        $this->attributes['gallery_images'] = json_encode($value);
    }

    public function getGalleryImagesAttribute($value)
    {
        return json_decode($value, true);
    }
}
