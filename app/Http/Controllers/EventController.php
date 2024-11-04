<?php

namespace App\Http\Controllers;

use App\Models\EventRegisteraion;
use Illuminate\Http\Request;
use App\Models\Events;
use App\Notifications\EventNotification;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
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

    public function markAttendance($eventID, $userID, Request $request)
    {
        dd('called baba');
        $event = Events::find($eventID);

        if (!$event) {
            return redirect()->back()->with('error', 'Event not found.');
        }

        $registration = EventRegisteraion::where('user_id', $userID)->where('event_id', $eventID)->first();

        if ($registration) {

            $registration->attended = true;
            $registration->status = 'success';
            $registration->save();

            return redirect()->back()->with('success', 'Attendance marked successfully.');
        } else {
            return redirect()->back()->with('error', 'You are not registered for this event.');
        }

    }

    public function takeAttendance($eventID, $userID){
        
        $event = Events::find($eventID);
        if (!$event) {
            return redirect()->back()->with('error', 'Event not found.');
        }
        $registration = EventRegisteraion::where('user_id', $userID)->where('event_id', $eventID)->first();

        if ($registration) {
            return view('events.attendance.take-attendance', ['event' => $event, 'registration' => $registration]);
        } else {
            return redirect()->back()->with('error', 'You are not registered for this event.');
        }
    }
}
