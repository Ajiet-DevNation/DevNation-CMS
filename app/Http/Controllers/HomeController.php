<?php

namespace App\Http\Controllers;

use App\Models\Ambassadors;
use App\Models\DeveloperGroup;
use App\Models\Events;
use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EventRegisteraion;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        $upcomingEvents = Events::where('start_date', '>=', date('Y-m-d'))->get();
        // dd($upcomingEvents);
        $teamMember = User::limit(20)->get();
        // dd($teamMember);
        $developerGroups = DeveloperGroup::all();
        // dd($developerGroups);

        $ambassadors = Ambassadors::with('user')->with('developerGroup')->get();

        return view('home.index', ['upcomingEvents' => $upcomingEvents,'teamMember'=> $teamMember, 'developerGroups' => $developerGroups, 'ambassadors' => $ambassadors]);
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
        $user = Auth::user();
        $registeredEvents = !Auth::check() ? [] : EventRegisteraion::where('user_id', $user->id)->get()->pluck('event_id')->toArray();
        return view('events.index',['upcomingEvents' => $upcomingEvents, 'pastEvents' => $pastEvents, 'registeredEvents' => $registeredEvents]);
    }

    public function eventDetails($id)
    {
        $event = Events::find($id);
        if (!$event) {
            abort(404);
        }
        $relatedEvents = Events::where('start_date', '>=', date('Y-m-d'))
        ->where('id', '!=', $id)  // Exclude the current event
        ->orWhere('name', 'like', "%{$event->name}%")  // Fetch events with similar name
        ->distinct()  // Remove duplicates
        ->inRandomOrder()  // Sort by random order
        ->get()
        ->take(3);
        $registered = Auth::check() ? EventRegisteraion::where('user_id', Auth::id())->where('event_id', $id)->exists() : false;
        $registeredEvents = Auth::check() ? EventRegisteraion::where('user_id', Auth::id())->get()->pluck('event_id')->toArray() : [] ;
        return view('events.show', ['event' => $event, 'relatedEvents' => $relatedEvents, 'registered' => $registered, 'registeredEvents' => $registeredEvents]);
    }
}
