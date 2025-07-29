<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventRegistrationController extends Controller
{
    public function store(Request $request, $eventId)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'university' => 'nullable|string|max:255',
            'notes' => 'nullable|string|max:500',
            'phone' => 'required|string|max:20',
        ]);

        // Create a new registration
        $registration = new \App\Models\EventRegistration();
        $registration->event_id = $eventId;
        $registration->name = $request->input('name');
        $registration->email = $request->input('email');
        $registration->university = $request->input('university');
        $registration->notes = $request->input('notes');
        $registration->phone = $request->input('phone');
        $registration->save();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Registration successful!');
        
    }
    
    public function create($eventId)
    {
        $event = \App\Models\Event::findOrFail($eventId);
        $allEvents = \App\Models\Event::orderByDesc('start_date')->get();
        return view('event.registration', compact('event', 'allEvents'));
    }
}