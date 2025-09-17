@extends('layouts.dashboard')

@section('content')
<div class="bg-white shadow-md rounded-lg p-6 w-full max-w-2xl mx-auto">
  <h1 class="text-xl font-bold mb-4">Tambah Anggota</h1>

  <form action="{{ route('dashboard.anggota.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf

    {{-- Nama --}}
    <div>
      <label for="name" class="block text-sm font-medium">Nama</label>
      <input type="text" id="name" name="name" value="{{ old('name') }}"
             class="mt-1 w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500 @error('name') border-red-500 @enderror" 
             required>
      @error('name')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    {{-- NIM --}}
    <div>
      <label for="nim" class="block text-sm font-medium">NIM</label>
      <input type="text" id="nim" name="nim" value="{{ old('nim') }}"
             class="mt-1 w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500 @error('nim') border-red-500 @enderror" 
             required>
      @error('nim')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    {{-- Program Studi --}}
    <div>
      <label for="prodi" class="block text-sm font-medium">Program Studi</label>
      <select id="prodi" name="prodi"
              class="mt-1 w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500 @error('prodi') border-red-500 @enderror" 
              required>
        <option value="">-- Pilih Prodi --</option>
        <option value="Teknik Informatika" {{ old('prodi') == 'Teknik Informatika' ? 'selected' : '' }}>Teknik Informatika</option>
        <option value="Teknik Kimia" {{ old('prodi') == 'Teknik Kimia' ? 'selected' : '' }}>Teknik Kimia</option>
        <option value="Teknik Mesin" {{ old('prodi') == 'Teknik Mesin' ? 'selected' : '' }}>Teknik Mesin</option>
      </select>
      @error('prodi')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    {{-- Jabatan --}}
    <div>
      <label for="jabatan" class="block text-sm font-medium">Jabatan</label>
      <select id="jabatan" name="jabatan"
              class="mt-1 w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500 @error('jabatan') border-red-500 @enderror" 
              required>
        <option value="">-- Pilih Jabatan --</option>
        <option value="Ketua Departemen" {{ old('jabatan') == 'Ketua Departemen' ? 'selected' : '' }}>Ketua Departemen</option>
        <option value="Anggota" {{ old('jabatan') == 'Anggota' ? 'selected' : '' }}>Anggota</option>
      </select>
      @error('jabatan')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    {{-- Departemen --}}
    <div>
      <label for="departemen" class="block text-sm font-medium">Departemen</label>
      <select id="departemen" name="departemen"
              class="mt-1 w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500 @error('departemen') border-red-500 @enderror" 
              required>
        <option value="">-- Pilih Departemen --</option>
        <option value="BPH" {{ old('departemen') == 'BPH' ? 'selected' : '' }}>BPH</option>
        <option value="PSDM" {{ old('departemen') == 'PSDM' ? 'selected' : '' }}>PSDM</option>
        <option value="KOMINFO" {{ old('departemen') == 'KOMINFO' ? 'selected' : '' }}>KOMINFO</option>
        <option value="KWU" {{ old('departemen') == 'KWU' ? 'selected' : '' }}>KWU</option>
        <option value="Internal & Eksternal" {{ old('departemen') == 'Internal & Eksternal' ? 'selected' : '' }}>Internal & Eksternal</option>
        <option value="MIKAT" {{ old('departemen') == 'MIKAT' ? 'selected' : '' }}>MIKAT</option>
        <option value="KASTRAT" {{ old('departemen') == 'KASTRAT' ? 'selected' : '' }}>KASTRAT</option>
      </select>
      @error('departemen')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    {{-- Foto --}}
    <div>
      <label for="foto" class="block text-sm font-medium">Foto</label>
      <input type="file" id="foto" name="foto"
             class="mt-1 w-full border rounded px-3 py-2 focus:ring-2 focus:ring-blue-500 @error('foto') border-red-500 @enderror" 
             accept="image/*">
      @error('foto')
        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
      @enderror
    </div>

    {{-- Tombol --}}
    <div class="flex justify-end space-x-2">
      <a href="{{ route('dashboard.anggota.index') }}" 
         class="px-4 py-2 rounded bg-gray-200 hover:bg-gray-300">Batal</a>
      <button type="submit" 
              class="px-4 py-2 rounded bg-blue-600 text-white hover:bg-blue-700">Simpan</button>
    </div>
  </form>
</div>
@endsection
