<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeamController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/events', [HomeController::class, 'events'])->name('event.index');
Route::get('/event-details/{id}', [HomeController::class, 'eventDetails'])->name('event.show');
Route::get('/about',[HomeController::class, 'about'])->name('about');
Route::get('/team', [TeamController::class, 'team'])->name('team');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate'])->name('user.authenticate')->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/register', [AuthController::class, 'showRegister'])->name('user.showRegister')->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->name('user.register')->middleware('guest');

Route::get('/profile', [ProfileController::class, 'index' ])->name('profile.index')->middleware('auth');
Route::post('/profile', [ProfileController::class, 'update' ])->name('profile.update')->middleware('auth');

Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery.index');
Route::get('/gallery/{id}', [HomeController::class, 'galleryDetails'])->name('gallery.show');

Route::post('/events/{id}/register', [EventController::class, 'registerEvent'])->name('events.register')->middleware('auth');

Route::get('/events/{event}/attendance/{user}', [EventController::class, 'takeAttendance'])->name('attendance.take')->middleware('auth');
Route::post('/events/{event}/attendance/{user}', [EventController::class, 'markAttendance'])->name('attendance.mark')->middleware('auth');