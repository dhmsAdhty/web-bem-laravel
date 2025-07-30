<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $blogs = \App\Models\BlogPost::where('is_published', true)
            ->orderByDesc('published_at')
            ->take(6)
            ->get();
        $events = Event::orderByDesc('start_date')->take(3)->get();
        return view('welcome', compact('blogs', 'events'));
    }

    public function eventsIndex()
    {
        $events = Event::orderByDesc('start_date')->get();
        return view('event.show', compact('events'));
    }

    public function eventShow($id)
    {
        // Validasi id harus integer
        if (!is_numeric($id) || intval($id) != $id) {
            abort(404);
        }
        $event = Event::findOrFail($id);
        return view('event.show', compact('event'));
    }
}