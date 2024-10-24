<?php

namespace App\Http\Controllers;

use App\Models\DeveloperGroup;
use App\Models\Events;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function home()
    {
        $upcomingEvents = Events::where('start_date', '>=', date('Y-m-d'))->get();
        // dd($upcomingEvents);
        $teamMember = User::get();
        // dd($teamMember);
        $developerGroups = DeveloperGroup::all();
        // dd($developerGroups);
        return view('home.index', ['upcomingEvents' => $upcomingEvents,'teamMember'=> $teamMember, 'developerGroups' => $developerGroups]);
    }

    public function about()
    {
        $coreMembers = User::where('is_core_member', true)->with('socialAccounts')->get();
        return view('about.index', ['coreMembers' => $coreMembers]);
    }

    public function contact()
    {
        return view('contact.index');
    }

    public function gallery()
    {
        $galleries = Gallery::all();
        
        return view('gallery.index', ['galleries'=>$galleries]);
    }

    public function galleryDetails($id)
    {
        $gallery = Gallery::find($id);

        if (!$gallery) {
            abort(404);
        }
        return view('gallery.show', ['gallery'=>$gallery]);
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
