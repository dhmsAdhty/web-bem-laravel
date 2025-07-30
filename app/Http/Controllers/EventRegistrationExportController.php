<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class EventRegistrationExportController extends Controller
{
    public function export($eventId)
    {
        $event = Event::with('registrations')->findOrFail($eventId);
        $registrations = $event->registrations;
        $pdf = Pdf::loadView('exports.event-registrations', [
            'event' => $event,
            'registrations' => $registrations,
        ]);
        $safeTitle = preg_replace('/[^a-zA-Z0-9-_]/', '', str_replace(' ', '_', $event->title));
        $filename = 'Pendaftar_' . $safeTitle . '.pdf';
        return $pdf->download($filename);
    }
}