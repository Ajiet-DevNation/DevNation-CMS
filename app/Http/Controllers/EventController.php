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
}
