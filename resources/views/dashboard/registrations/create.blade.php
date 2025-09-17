@extends('layouts.dashboard')

@section('content')
<div class="p-6 max-w-lg">
    <h2 class="text-2xl font-bold mb-4">Tambah Pendaftaran</h2>

    <form action="{{ route('dashboard.registrations.store') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label>Event</label>
            <select name="event_id" class="w-full border p-2 rounded" required>
                <option value="">-- Pilih Event --</option>
                @foreach($events as $event)
                    <option value="{{ $event->id }}">{{ $event->title }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label>Nama</label>
            <input type="text" name="name" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label>Email</label>
            <input type="email" name="email" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label>Universitas</label>
            <input type="text" name="university" class="w-full border p-2 rounded">
        </div>

        <div>
            <label>No HP</label>
            <input type="text" name="phone" class="w-full border p-2 rounded">
        </div>

        <div>
            <label>Catatan</label>
            <textarea name="notes" class="w-full border p-2 rounded"></textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Simpan</button>
    </form>
</div>
@endsection
