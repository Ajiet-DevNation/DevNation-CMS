<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/events', function () {
    return view('pages.events');
})->name('events');

Route::get('/contact', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/profile',function(){
    return view('pages.profile');
})->name('profile');

