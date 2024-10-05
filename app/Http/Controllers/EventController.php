<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;

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
}
