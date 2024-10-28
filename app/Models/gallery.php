<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log; // na logovanie chýb

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
                if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
                    $imagePath = Storage::disk('public')->path($gallery->image);
                    $resizedImagePath = Storage::disk('public')->path('resized_' . $gallery->image);

                    // Otvorenie pôvodného obrázka pomocou GD
                    $sourceImage = imagecreatefromstring(file_get_contents($imagePath));
                    if ($sourceImage === false) {
                        Log::error("Nepodarilo sa otvoriť obrázok: {$imagePath}");
                        return; // Ukončí sa, ak nie je možné načítať obrázok
                    }

                    // Získanie pôvodných rozmerov
                    $width = imagesx($sourceImage);
                    $height = imagesy($sourceImage);

                    // Výpočet nových rozmerov
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

                    // Uloženie zmenšeného obrázka vo formáte JPEG s kvalitou 90
                    imagejpeg($resizedImage, $resizedImagePath, 90);

                    // Nahradenie pôvodného obrázka novou verziou
                    Storage::disk('public')->put($gallery->image, file_get_contents($resizedImagePath));

                    // Uvoľnenie pamäte
                    imagedestroy($sourceImage);
                    imagedestroy($resizedImage);

                    // Odstránenie dočasného súboru, ak existuje
                    if (file_exists($resizedImagePath)) {
                        unlink($resizedImagePath);
                    }
                }
            } catch (\Exception $e) {
                Log::error("Zlyhalo zmenšenie obrázka: " . $e->getMessage());
            }
        });
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
