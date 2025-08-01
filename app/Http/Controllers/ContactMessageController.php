<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    /**
     * Menyimpan pesan kontak baru dari form.
     */
    public function store(Request $request)
    {
        // 1. Validasi input dari form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:10',
        ]);

        // 2. Simpan data ke database
        ContactMessage::create($validatedData);

        // 3. Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Pesan Anda telah berhasil dikirim! Terima kasih telah menghubungi kami.');
    }
}