@extends('layouts.dashboard')

@section('content')
<div class="p-6">
  <h2 class="text-2xl font-bold mb-6 text-[#154D71]">Daftar Berita</h2>

  <a href="{{ route('dashboard.berita.create') }}" 
     class="inline-block bg-[#154D71] text-white px-4 py-2 rounded-xl hover:bg-[#1e6091] shadow">
    + Tambah Berita
  </a>

  <div class="mt-8 overflow-x-auto rounded-xl shadow border border-gray-200">
    <table class="min-w-full text-sm">
      <thead class="bg-gray-50 text-gray-600 uppercase tracking-wider text-xs">
        <tr>
          <th class="p-3 text-left">Gambar</th>
          <th class="p-3 text-left">Judul</th>
          <th class="p-3 text-left">Tanggal Publish</th>
          <th class="p-3 text-left">Aksi</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-100">
        @forelse($berita as $item)
          <tr class="hover:bg-gray-50 transition">
            {{-- Thumbnail --}}
            <td class="p-3">
              @if($item->thumbnail)
                <img src="{{ asset('storage/' . $item->thumbnail) }}" 
                     alt="Thumbnail" 
                     class="h-12 w-12 object-cover rounded border">
              @else
                <span class="text-gray-400">-</span>
              @endif
            </td>

            {{-- Judul --}}
            <td class="p-3 font-medium text-gray-900">{{ $item->title }}</td>

            {{-- Tanggal Publish --}}
            <td class="p-3 text-gray-600">
              {{ $item->published_at ? $item->published_at->format('d M Y H:i') : '-' }}
            </td>

            {{-- Aksi --}}
            <td class="p-3 flex items-center gap-2">
              <!-- Edit -->
              <a href="{{ route('dashboard.berita.edit', $item->id) }}"
                 class="p-2 rounded-full bg-green-50 hover:bg-green-100 text-green-600"
                 title="Edit">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                     stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                  <path stroke-linecap="round" stroke-linejoin="round" 
                        d="M16.862 4.487l1.651 1.651a2.121 2.121 0 010 3L9.845 17.805l-4.487.996.996-4.487 
                           8.668-8.668a2.121 2.121 0 013 0z" />
                </svg>
              </a>

              <!-- Hapus -->
              <form action="{{ route('dashboard.berita.destroy', $item->id) }}"
                    method="POST"
                    onsubmit="return confirm('Yakin hapus berita ini?')"
                    class="inline">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="p-2 rounded-full bg-red-50 hover:bg-red-100 text-red-600"
                        title="Hapus">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                       stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" 
                          d="M6 18L18 6M6 6l12 12" />
                  </svg>
                </button>
              </form>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="4" class="p-6 text-center text-gray-500">Belum ada berita</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
