<?php
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/events', [EventController::class,"index"])->name('events');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/event-details/{id}', [EventController::class,"details"])->name('event');

Route::get('/profile',function(){
    return view('pages.profile');
})->name('profile');

Route::get('gallery', function () {
    return view('pages.gallery');
})->name('gallery');