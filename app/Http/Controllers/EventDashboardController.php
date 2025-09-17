<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventDashboardController extends Controller
{
    public function index()
    {
        $events = Event::orderByDesc('start_date')->get();
        return view('dashboard.events.index', compact('events'));
    }

    public function create()
    {
        return view('dashboard.events.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'banner' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('banner')) {
            $validated['banner'] = $request->file('banner')->store('event_banners', 'public');
        }

        Event::create($validated);

        return redirect()->route('dashboard.events.index')->with('success', 'Event berhasil ditambahkan.');
    }

    public function edit(Event $event)
    {
        return view('dashboard.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'banner' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('banner')) {
            $validated['banner'] = $request->file('banner')->store('event_banners', 'public');
        }

        $event->update($validated);

        return redirect()->route('dashboard.events.index')->with('success', 'Event berhasil diperbarui.');
    }

    public function destroy(Event $event)
    {
        if ($event->banner && file_exists(storage_path('app/public/'.$event->banner))) {
            unlink(storage_path('app/public/'.$event->banner));
        }

        $event->delete();

        return redirect()->route('dashboard.events.index')->with('success', 'Event berhasil dihapus.');
    }
}
