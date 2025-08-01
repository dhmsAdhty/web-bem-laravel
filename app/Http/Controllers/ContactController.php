<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'contact-name' => 'required|string|max:100',
            'contact-email' => 'required|email|max:100',
            'contact-message' => 'required|string|max:2000',
        ]);

        try {
            Mail::raw(
                "Pesan dari: " . $validated['contact-name'] . "\nEmail: " . $validated['contact-email'] . "\n\n" . $validated['contact-message'],
                function ($message) {
                    $message->to('bemft@unwahas.ac.id')
                            ->subject('Pesan dari Form Kontak Website BEM FT UNWAHAS');
                }
            );
            return back()->with('success', 'Pesan Anda berhasil dikirim.');
        } catch (\Exception $e) {
            Log::error('Gagal kirim email kontak: ' . $e->getMessage());
            return back()->with('error', 'Gagal mengirim pesan. Silakan coba lagi nanti.');
        }
    }
}