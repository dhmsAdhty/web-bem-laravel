@extends('layouts.dashboard')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
  <h1 class="text-xl font-bold mb-4">Edit Event</h1>

  <form action="{{ route('dashboard.events.update', $event) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf @method('PUT')

    <div>
      <label class="block font-medium">Judul</label>
      <input type="text" name="title" value="{{ $event->title }}" class="w-full border rounded p-2" required>
    </div>

    <div>
      <label class="block font-medium">Deskripsi</label>
      <textarea name="description" class="w-full border rounded p-2" required>{{ $event->description }}</textarea>
    </div>

    <div>
      <label class="block font-medium">Lokasi</label>
      <input type="text" name="location" value="{{ $event->location }}" class="w-full border rounded p-2" required>
    </div>

    <div class="grid grid-cols-2 gap-4">
      <div>
        <label class="block font-medium">Tanggal Mulai</label>
        <input type="date" name="start_date" value="{{ $event->start_date }}" class="w-full border rounded p-2" required>
      </div>
      <div>
        <label class="block font-medium">Tanggal Selesai</label>
        <input type="date" name="end_date" value="{{ $event->end_date }}" class="w-full border rounded p-2" required>
      </div>
    </div>

    <div>
      <label class="block font-medium">Banner</label>
      <input type="file" name="banner" class="w-full border rounded p-2">
      @if($event->banner)
        <img src="{{ asset('storage/'.$event->banner) }}" class="h-20 mt-2">
      @endif
    </div>

    <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
  </form>
</div>
@endsection
