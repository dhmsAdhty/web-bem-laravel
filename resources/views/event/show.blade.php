@extends('layouts.nav')

@section('content')
@php use Carbon\Carbon; @endphp

<section class="py-16 bg-gradient-to-br from-blue-50 to-white min-h-screen">
    <div class="max-w-3xl mx-auto px-4">
        <h2 class="text-3xl md:text-4xl font-bold text-blue-800 mb-8 text-center">Detail Event</h2>
        <div class="bg-white rounded-xl shadow-lg hover:shadow-2xl transition-all duration-300 p-6 flex flex-col">
            @if($event->banner)
                <img src="{{ asset('storage/' . $event->banner) }}" alt="{{ $event->title }}" class="h-40 w-full object-cover rounded mb-4">
            @endif
            <h3 class="text-xl font-semibold text-blue-700 mb-2">{{ $event->title }}</h3>
            <div class="flex items-center text-sm text-gray-500 mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                <span>{{ Carbon::parse($event->start_date)->translatedFormat('d F Y H:i') }}
                    @if($event->end_date && $event->end_date != $event->start_date)
                        - {{ Carbon::parse($event->end_date)->translatedFormat('d F Y H:i') }}
                    @endif
                </span>
            </div>
            <div class="text-gray-700 mb-2">
                <span class="font-medium">Lokasi:</span> {{ $event->location ?? '-' }}
            </div>
            <p class="text-gray-600 flex-1 mb-4">{{ $event->description }}</p>
            <a href="{{ route('event.register', $event->id) }}" class="inline-block mt-auto bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-700 transition">Daftar Event</a>
        </div>
        <div class="mt-8 text-center">
            <a href="/" class="text-blue-600 hover:underline">Kembali ke Beranda</a>
        </div>
    </div>
</section>
@endsection
