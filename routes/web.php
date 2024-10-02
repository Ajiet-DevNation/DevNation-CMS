<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/events', function () {
    return view('pages.events');
})->name('events');

Route::get('/contacts', function () {
    return view('pages.contact');
})->name('contact');

