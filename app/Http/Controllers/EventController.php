<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\EventRegisteraion;
use App\Notifications\EventNotification;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class EventController extends Controller
{
    function index()
    {
        $eventsList = Events::all();
        $upcomingEvents = Events::where('start_date', '>=', date('Y-m-d'))->get();
        $pastEvents = Events::where('start_date', '<', date('Y-m-d'))->get();
        return view('pages.events', ['upcomingEvents' => $upcomingEvents, 'pastEvents' => $pastEvents]);
    }

    function details($id)
    {
        $event = Events::find($id);
        $relatedEvents = Events::where('start_date', '>=', date('Y-m-d'))
        ->where('id', '!=', $id)  // Exclude the current event
        ->orWhere('name', 'like', "%{$event->name}%")  // Fetch events with similar name
        ->distinct()  // Remove duplicates
        ->inRandomOrder()  // Sort by random order
        ->get()
        ->take(3);

        if (!$event) {
            abort(404);
        }
        return view('pages.event-details', ['event' => $event, 'relatedEvents' => $relatedEvents]);
    }

    // Registration of user to event
    public function register(Request $request, $eventId)
    {
        $user = User::find(2);
        //$user = Auth::user(); // get user, change it once authentication works
        $event = Events::find($eventId);


        // Check if event end user exists
        if (!$event || !$user) {
            return redirect()->back()->with('error', 'Invalid registration attempt.');
        }

        // Creating Registration
        $registration = EventRegisteraion::create([
            'user_id' => $user->id,
            'event_id' => $event->id,
            'status' => 'pending', 
            'attended' => false, 
        ]);

        // Sent notification to user
        $user->notify(new EventNotification($event));

        // Redirect user to see event details
        return redirect()->route('event.show', $eventId)->with('success', 'You have successfully registered for the event!');
    }


}
