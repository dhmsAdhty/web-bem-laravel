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
        $filename = 'Pendaftar_' . str_replace(' ', '_', $event->title) . '.pdf';
        return $pdf->download($filename);
    }
}
