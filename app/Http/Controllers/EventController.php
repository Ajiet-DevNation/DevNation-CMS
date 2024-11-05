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
        $event = Events::find($eventID);
        if (!$event) {
            return redirect()->back()->with('error', 'Event not found.');
        }

        $registration = EventRegisteraion::where('user_id', $userID)->where('event_id', $eventID)->first();

        $attendanceCode = $event->attendence_code;
        $userRequestAttendanceCode = $request->attendence_code;

        // dd($registration);
        // case 1: user has already attended
        if ($registration->attended) {
            dd('You have already marked your attendance.');
            return redirect()->back()->with('error', 'You have already marked your attendance.');
        }

        // case 2: user has not attended and provided correct attendance code

        // dd($attendanceCode, $userRequestAttendanceCode);

        if ($attendanceCode == $userRequestAttendanceCode) {
            // dd('Attendance marked successfully.');
            // dd($registration->attended);
            $registration->attended = true;
            // $registration->user->notify(new EventNotification($event, $registration));
            $registration->save();
            return redirect()->back()->with('success', 'Attendance marked successfully.');
        } else {
            dd('Attendance code is incorrect.');
            return redirect()->back()->with('error', 'You are not registered for this event.');
        }
    }

    public function takeAttendance($eventID, $userID)
    {

        $event = Events::find($eventID);
        if (!$event) {
            return redirect()->back()->with('error', 'Event not found.');
        }
        $registration = EventRegisteraion::where('user_id', $userID)->where('event_id', $eventID)->first();

        // dd($registration->user_id);
        if ($registration) {
            return view('events.attendance.take-attendance', ['event' => $event, 'registration' => $registration, 'user_id' => $registration->user_id]);
        } else {
            return redirect()->back()->with('error', 'You are not registered for this event.');
        }
    }
}
