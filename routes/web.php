<?php
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Mail\EventRegistrationMail;
use App\Notifications\EventNotification;
use Illuminate\Support\Facades\Mail;
use App\Models\Events;
use App\Models\User;
use Illuminate\Support\Facades\Notification;

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/events', [HomeController::class, 'events'])->name('event.index');
Route::get('/event-details/{id}', [HomeController::class, 'eventDetails'])->name('event.show');
Route::post('/events/{event}/register', [EventController::class, 'register'])->name('events.register');
Route::get('/about',[HomeController::class, 'about'])->name('about');


Route::get('/profile', [ProfileController::class, 'index' ])->name('profile.index');

Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery.index');
Route::get('/gallery/{id}', [HomeController::class, 'galleryDetails'])->name('gallery.show');

Route::get('/test-notification', function () {
    $eventId = 2; // ID event
    $userId = 1; // ID user

    $event = Events::find($eventId);
    $user = User::find($userId);

    if ($event && $user) {
        //Instance of notification
        $notification = new EventNotification($event);

        // Sending notification to user
        Notification::send($user, $notification);
            return 'The notification has been sent!';
    } 
    else {
        return 'Event or User not found!';
    }  
});