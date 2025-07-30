<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; // Tambahkan ini untuk logging
use Exception; // Tambahkan ini untuk menangkap semua jenis error

class EventRegistrationController extends Controller
{
    public function store(Request $request, $eventId)
    {
        // Validasi data tetap di luar try...catch
        // Jika validasi gagal, Laravel akan otomatis redirect kembali dengan pesan error validasi.
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|email:rfc,dns',
            'university' => 'nullable|string|max:255',
            'phone' => 'required|string|max:20',
        ]);

        try {
            // -- Mulai proses yang mungkin gagal --

            $event = Event::findOrFail($eventId);

            $registration = new EventRegistration();
            $registration->event_id = $eventId;
            $registration->name = $request->input('name');
            $registration->email = $request->input('email');
            $registration->university = $request->input('university');
            $registration->phone = $request->input('phone');
            $registration->save(); // Titik rawan error, misal database down

            // Jika semua berhasil, siapkan data sukses
            $successData = [
                'eventName' => $event->title,
            ];

            // Redirect dengan pesan sukses
            return redirect()->back()->with('success', $successData);

        } catch (Exception $e) {
            // -- Blok ini akan berjalan JIKA TERJADI ERROR di dalam blok 'try' --

            // 1. Catat errornya agar developer bisa memeriksanya nanti
            Log::error('Gagal mendaftarkan event: ' . $e->getMessage());

            // 2. Redirect kembali ke form dengan pesan error yang ramah untuk pengguna
            return redirect()->back()
                ->with('error', 'Maaf, terjadi kesalahan saat memproses pendaftaran Anda. Silakan coba lagi.')
                ->withInput(); // withInput() untuk mengisi kembali form dengan data yang sudah diinput pengguna
        }
    }
    
    public function create($eventId)
    {
        $event = Event::findOrFail($eventId);
        $allEvents = Event::orderByDesc('start_date')->get();
        return view('event.registration', compact('event', 'allEvents'));
    }
}