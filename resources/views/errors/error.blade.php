@extends('layouts.nav')

@section('content')
<section class="py-16 bg-red-50 min-h-screen flex items-center justify-center">
    <div class="max-w-lg mx-auto bg-white rounded-lg shadow-lg p-8 text-center">
        <div class="flex justify-center mb-6">
            <svg width="120" height="120" viewBox="0 0 120 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                <circle cx="60" cy="60" r="60" fill="#F87171" fill-opacity="0.15" />
                <path d="M60 35v30" stroke="#EF4444" stroke-width="6" stroke-linecap="round" />
                <circle cx="60" cy="80" r="5" fill="#EF4444" />
            </svg>
        </div>
        <h1 class="text-4xl font-bold text-red-600 mb-4">
            {{ $code ?? 'Error' }}
        </h1>
        <p class="text-lg text-gray-700 mb-6">
            {{ $message ?? 'Terjadi kesalahan pada sistem. Silakan coba lagi nanti.' }}
        </p>
        <a href="{{ route('home') }}"
            class="inline-block px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Kembali ke
            Beranda</a>
    </div>
</section>
@endsection