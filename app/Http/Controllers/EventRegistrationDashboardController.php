<?php

namespace App\Http\Controllers;

use App\Models\EventRegistration;
use App\Models\Event;
use Illuminate\Http\Request;

class EventRegistrationDashboardController extends Controller
{
    public function index()
    {
        // Ambil semua pendaftaran beserta event-nya
        $registrations = EventRegistration::with('event')->latest()->get();

        // Kelompokkan berdasarkan judul event
        $grouped = $registrations->groupBy(function ($item) {
            return $item->event->title ?? 'Tanpa Event';
        });

        return view('dashboard.registrations.index', compact('grouped'));
    }

    public function create()
    {
        $events = Event::orderBy('title')->get();
        return view('dashboard.registrations.create', compact('events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_id'   => 'required|exists:events,id',
            'name'       => 'required|string|max:255',
            'email'      => 'required|email',
            'university' => 'nullable|string|max:255',
            'phone'      => 'nullable|string|max:20',
            'notes'      => 'nullable|string',
        ]);

        EventRegistration::create($request->all());

        return redirect()->route('dashboard.registrations.index')
                         ->with('success', 'Pendaftaran berhasil ditambahkan.');
    }

    public function show($id)
    {
        $registration = EventRegistration::with('event')->findOrFail($id);
        return view('dashboard.registrations.show', compact('registration'));
    }

    public function destroy($id)
    {
        $registration = EventRegistration::findOrFail($id);
        $registration->delete();

        return redirect()->route('dashboard.registrations.index')
                         ->with('success', 'Pendaftaran berhasil dihapus.');
    }
}
