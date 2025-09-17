@extends('layouts.dashboard')

@section('content')
<div class="p-6 max-w-lg">
    <h2 class="text-2xl font-bold mb-4">Detail Pendaftaran</h2>

    <p><strong>Event:</strong> {{ $registration->event->title ?? '-' }}</p>
    <p><strong>Nama:</strong> {{ $registration->name }}</p>
    <p><strong>Email:</strong> {{ $registration->email }}</p>
    <p><strong>Universitas:</strong> {{ $registration->university }}</p>
    <p><strong>No HP:</strong> {{ $registration->phone }}</p>
    <p><strong>Catatan:</strong> {{ $registration->notes }}</p>
    <p><strong>Tanggal Daftar:</strong> {{ $registration->created_at->format('d M Y H:i') }}</p>

    <a href="{{ route('dashboard.registrations.index') }}" class="text-blue-600 mt-4 inline-block">Kembali</a>
</div>
@endsection
