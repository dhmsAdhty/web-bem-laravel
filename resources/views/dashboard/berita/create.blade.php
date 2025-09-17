@extends('layouts.dashboard')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md max-w-2xl mx-auto">
    <h1 class="text-xl font-bold mb-4">Tambah Berita</h1>

    {{-- Tambah enctype untuk upload file --}}
    <form action="{{ route('dashboard.berita.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block font-medium mb-1">Judul</label>
            <input type="text" name="judul" class="w-full border rounded p-2" required>
        </div>

        <div class="mb-4">
            <label class="block font-medium mb-1">Konten</label>
            <textarea name="konten" rows="6" class="w-full border rounded p-2" required></textarea>
        </div>

        {{-- Upload Gambar --}}
        <div class="mb-4">
            <label class="block font-medium mb-1">Gambar</label>
            <input type="file" name="thumbnail" class="w-full border rounded p-2">
        </div>

        {{-- Tanggal Publish --}}
        <div class="mb-4">
            <label class="block font-medium mb-1">Tanggal Publish</label>
            <input type="datetime-local" name="published_at" class="w-full border rounded p-2">
        </div>

        <div class="flex justify-end">
            <a href="{{ route('dashboard.berita.index') }}" class="px-4 py-2 bg-gray-200 rounded mr-2">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
