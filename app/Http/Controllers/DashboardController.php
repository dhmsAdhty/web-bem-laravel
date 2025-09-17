<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\BlogPost; // Pastikan model Berita benar atau gunakan BlogPost jika nama model Anda BlogPost
use App\Models\Event;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $departemenData = Member::select('departemen')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('departemen')
            ->pluck('total', 'departemen'); // ['BPH'=>3,'PSDM'=>2]

        // Debug sementara: cek isi variabel
        if ($departemenData->isEmpty()) {
            \Log::info('DepartemenData kosong!');
        } else {
            \Log::info($departemenData);
        }

        // Ambil berita terbaru
        $berita = BlogPost::latest()->take(5)->get();

        $events = Event::orderByDesc('start_date')->take(10)->get();

        // Kirimkan keduanya ke view
        return view('dashboard.index', compact('departemenData', 'berita', 'events'));
    }
}
