<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        return view('home.index');
    }

    public function about()
    {
        return view('about.index');
    }

    public function contact()
    {
        return view('contact.index');
    }

    public function gallery()
    {
        return view('gallery.index');
    }

    public function galleryDetails($id)
    {
        return view('gallery.show');
    }

    public function events()
    {
        $upcomingEvents = Events::where('start_date', '>=', date('Y-m-d'))->get();
        $pastEvents = Events::where('start_date', '<', date('Y-m-d'))->get();
        
        return view('events.index',['upcomingEvents' => $upcomingEvents, 'pastEvents' => $pastEvents]);
    }

    public function eventDetails($id)
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
        return view('events.show', ['event' => $event, 'relatedEvents' => $relatedEvents]);
    }
}
