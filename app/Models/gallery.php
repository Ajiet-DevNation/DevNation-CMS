<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

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
        static::saved(function ($gallery) {
            try {
                // Spracovanie náhľadového obrázka
                if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
                    self::resizeImage($gallery->image);
                }

                // Spracovanie obrázkov v galérii (v poli gallery_images)
                if ($gallery->gallery_images) {
                    $galleryImages = $gallery->gallery_images; // priame priradenie bez json_decode
                    foreach ($galleryImages as $image) {
                        if (Storage::disk('public')->exists($image)) {
                            self::resizeImage($image);
                        }
                    }
                }

            } catch (\Exception $e) {
                Log::error("Zlyhalo zmenšenie obrázkov v galérii: " . $e->getMessage());
            }
        });
    }

    // Funkcia na úpravu veľkosti obrázka
    protected static function resizeImage($imagePath)
    {
        try {
            // Cesta k obrázku
            $fullImagePath = Storage::disk('public')->path($imagePath);

            // Otvorenie pôvodného obrázka pomocou GD
            $sourceImage = imagecreatefromstring(file_get_contents($fullImagePath));
            if ($sourceImage === false) {
                Log::error("Nepodarilo sa otvoriť obrázok: {$fullImagePath}");
                return;
            }

            // Získanie pôvodných rozmerov
            $width = imagesx($sourceImage);
            $height = imagesy($sourceImage);

            // Výpočet nových rozmerov so zachovaním pomeru strán
            $newWidth = 800;
            $newHeight = 800;
            if ($width > $height) {
                $newHeight = (int)(($height / $width) * $newWidth);
            } else {
                $newWidth = (int)(($width / $height) * $newHeight);
            }

            // Vytvorenie nového obrázka s novými rozmermi
            $resizedImage = imagecreatetruecolor($newWidth, $newHeight);
            imagecopyresampled($resizedImage, $sourceImage, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

            // Prepísanie pôvodného obrázka novou verziou so zmenšenými rozmermi
            imagejpeg($resizedImage, $fullImagePath, 90);

            // Uvoľnenie pamäte
            imagedestroy($sourceImage);
            imagedestroy($resizedImage);

            Log::info("Obrázok bol úspešne zmenšený a uložený na pôvodné miesto: {$fullImagePath}");
        } catch (\Exception $e) {
            Log::error("Zlyhalo zmenšenie obrázka: " . $e->getMessage());
        }
    }

    // Serializuje pole na JSON pred uložením do databázy
    public function setGalleryImagesAttribute($value)
    {
        $this->attributes['gallery_images'] = json_encode($value);
    }

    // Deserializuje JSON na pole pri načítaní z databázy
    public function getGalleryImagesAttribute($value)
    {
        return json_decode($value, true);
    }
}
