<?php
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/events', [HomeController::class, 'events'])->name('event.index');
Route::get('/event-details/{id}', [HomeController::class, 'eventDetails'])->name('event.show');
Route::get('/about',[HomeController::class, 'about'])->name('about');
Route::get('/team', [TeamController::class, 'team'])->name('team');


Route::get('/profile', [ProfileController::class, 'index' ])->name('profile.index');

Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery.index');
Route::get('/gallery/{id}', [HomeController::class, 'galleryDetails'])->name('gallery.show');

Route::get('/test-image', function () {
    // Skontroluj, či súbor existuje, alebo použi konkrétnu cestu k obrázku
    $imagePath = Storage::disk('public')->path('gallery_images/test.png');

    if (!file_exists($imagePath)) {
        return 'Image not found!';
    }

    // Skús zmenšiť a uložiť obrázok
    $resizedImage = Image::make($imagePath)->resize(800, 800, function ($constraint) {
        $constraint->aspectRatio();
        $constraint->upsize();
    })->encode();

    Storage::disk('public')->put('gallery_images/test_resized.png', (string) $resizedImage);

    return 'Image resized and saved as test_resized.png';
});