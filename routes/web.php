<?php
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Mail\EventRegistrationMail;
use Illuminate\Support\Facades\Mail;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/events', [HomeController::class, 'events'])->name('event.index');
Route::get('/event-details/{id}', [HomeController::class, 'eventDetails'])->name('event.show');
Route::get('/about',[HomeController::class, 'about'])->name('about');


Route::get('/profile', [ProfileController::class, 'index' ])->name('profile.index');

Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery.index');
Route::get('/gallery/{id}', [HomeController::class, 'galleryDetails'])->name('gallery.show');

//
Route::get('/test-email', function () {
    $eventName = 'Test Event';
    $userName = 'Test User';
    $userEmail = 'kyzekova.lenka@gmail.com'; // Zadajte tu svoj e-mail

    // Pošlite e-mail
    Mail::to($userEmail)->send(new EventRegistrationMail($eventName, $userName));

    return 'The e-mail has been sent!';
});