<?php
namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::orderByDesc('start_date')->get();
        return view('event.show', compact('events'));
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('event.show', compact('event'));
    }
}
