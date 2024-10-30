<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Gallery extends Model
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
        static::saving(function ($gallery) {
            // Resize the main image if it exists
            if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
                $gallery->image = self::resizeImage($gallery->image);
            }

            // Resize each image in the gallery_images array if they exist
            if ($gallery->gallery_images) {
                $galleryImages = $gallery->gallery_images;
                foreach ($galleryImages as &$image) {
                    if (Storage::disk('public')->exists($image)) {
                        $image = self::resizeImage($image); // Resize and update the image path
                    }
                }
                $gallery->gallery_images = $galleryImages;
            }
        });
    }

    // Resize an image to 300x300 without preserving the aspect ratio
    protected static function resizeImage($imagePath)
    {
        try {
            // Path to the image
            $fullImagePath = Storage::disk('public')->path($imagePath);

            // Open the original image using GD
            $sourceImage = imagecreatefromstring(file_get_contents($fullImagePath));
            if ($sourceImage === false) {
                return $imagePath; // Return the original path if opening fails
            }

            // Set fixed dimensions to 300x300 pixels
            $newWidth = 300;
            $newHeight = 300;

            // Create a new blank image with 300x300 dimensions
            $resizedImage = imagecreatetruecolor($newWidth, $newHeight);

            // Resize the original image to the new dimensions without preserving aspect ratio
            imagecopyresampled($resizedImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, imagesx($sourceImage), imagesy($sourceImage));

            // Overwrite the original image with the resized version
            imagejpeg($resizedImage, $fullImagePath, 90);

            // Free up memory
            imagedestroy($sourceImage);
            imagedestroy($resizedImage);

            return $imagePath; // Return the updated image path
        } catch (\Exception $e) {
            return $imagePath; // Return the original path if resizing fails
        }
    }

    // Serialize gallery_images array to JSON before saving to the database
    public function setGalleryImagesAttribute($value)
    {
        $this->attributes['gallery_images'] = json_encode($value);
    }

    // Deserialize gallery_images JSON to an array when retrieving from the database
    public function getGalleryImagesAttribute($value)
    {
        return json_decode($value, true);
    }
}
