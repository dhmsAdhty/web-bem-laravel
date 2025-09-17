@extends('layouts.dashboard')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6">
  <h1 class="text-xl font-bold mb-4">Tambah Event</h1>

  <form action="{{ route('dashboard.events.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf

    <div>
      <label class="block font-medium">Judul</label>
      <input type="text" name="title" class="w-full border rounded p-2" required>
    </div>

    <div>
      <label class="block font-medium">Deskripsi</label>
      <textarea name="description" class="w-full border rounded p-2" required></textarea>
    </div>

    <div>
      <label class="block font-medium">Lokasi</label>
      <input type="text" name="location" class="w-full border rounded p-2" required>
    </div>

    <div class="grid grid-cols-2 gap-4">
      <div>
        <label class="block font-medium">Tanggal Mulai</label>
        <input type="date" name="start_date" class="w-full border rounded p-2" required>
      </div>
      <div>
        <label class="block font-medium">Tanggal Selesai</label>
        <input type="date" name="end_date" class="w-full border rounded p-2" required>
      </div>
    </div>

    <div>
      <label class="block font-medium">Banner</label>
      <input type="file" name="banner" class="w-full border rounded p-2">
    </div>

    <button class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
  </form>
</div>
@endsection
