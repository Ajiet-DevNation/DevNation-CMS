<?php

namespace App\Http\Controllers;

use App\Models\EventRegisteraion;
use Illuminate\Http\Request;
use App\Models\Events;
use App\Notifications\EventNotification;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        $eventsList = Events::all();

        $upcomingEvents = Events::where('start_date', '>=', date('Y-m-d'))->get();
        $pastEvents = Events::where('start_date', '<', date('Y-m-d'))->get();
        return view('pages.events', ['upcomingEvents' => $upcomingEvents, 'pastEvents' => $pastEvents]);
    }

    public function details($id)
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


    public function registerEvent(Request $request, $eventId)
    {
       // dd($eventId);
        $event = Events::find($eventId);

        if (!$event) {
            return redirect()->back()->with('error', 'Event not found.');
        }

        if (Auth::check()) {
            // dd('User is logged in');
            $existingRegistration = EventRegisteraion::where('user_id', Auth::id())->where('event_id', $eventId)->first();

            if ($existingRegistration) {
                return redirect()->back()->with('error', 'You are already registered for this event.');
            }

            $registration = EventRegisteraion::create([
                'user_id' => Auth::id(),
                'event_id' => $eventId,
                'status' => 'pending',
                'attended' => false,
            ]);

            // dd($registration->status);
            
            $registration->user->notify(new EventNotification($event, $registration));

            return redirect()->back()->with('success', 'You have successfully registered for the event.');
        }
    }
}
