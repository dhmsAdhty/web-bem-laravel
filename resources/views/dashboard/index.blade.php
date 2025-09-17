@extends('layouts.dashboard')

@section('content')
<div class="p-6 bg-white rounded-xl shadow-md">
  <h1 class="text-2xl font-bold">Dashboard BEM</h1>
  <p class="mt-2 text-gray-600">Selamat datang di panel admin BEM 🚀</p>

  <!-- Grid Pie Chart -->
  <div class="mt-8 grid grid-cols-1 md:grid-cols-2 gap-2 items-start">
    <div>
      <h2 class="text-lg font-semibold mb-4">Anggota per Departemen</h2>
      <ul id="departemenLegend" class="space-y-2 text-sm"></ul>
    </div>
    <div class="w-full max-w-[150px] md:max-w-[200px] lg:max-w-[230px] mx-auto">
      <canvas id="departemenChart" class="w-full h-auto"></canvas>
    </div>
  </div>

  <!-- Carousel Berita -->
  <div class="mt-12">
    <h2 class="text-xl font-bold mb-4">Berita Terbaru</h2>
    <div class="relative">
      <div id="beritaCarousel" class="flex gap-6 overflow-x-auto scroll-smooth snap-x snap-mandatory pb-4">
        @foreach($berita as $item)
          <div class="flex-none w-72 md:w-80 bg-white rounded-lg shadow hover:shadow-lg transition snap-start">
            <img src="{{ $item->thumbnail ? asset('storage/'.$item->thumbnail) : 'https://via.placeholder.com/300x150' }}"
                 alt="{{ $item->title }}"
                 class="w-full h-40 object-cover rounded-t-lg">
            <div class="p-4">
              <h3 class="font-semibold text-gray-800 truncate">{{ $item->title }}</h3>
              <p class="text-sm text-gray-500 mt-1">
                {{ $item->published_at ? $item->published_at->format('d M Y') : now()->format('d M Y') }}
              </p>
            </div>
          </div>
        @endforeach
      </div>
      <button onclick="scrollCarousel('beritaCarousel', -1)"
              class="absolute left-2 top-1/2 -translate-y-1/2 bg-white shadow rounded-full p-2 md:p-3 hover:bg-gray-100">
        ◀
      </button>
      <button onclick="scrollCarousel('beritaCarousel', 1)"
              class="absolute right-2 top-1/2 -translate-y-1/2 bg-white shadow rounded-full p-2 md:p-3 hover:bg-gray-100">
        ▶
      </button>
    </div>
  </div>

  <!-- Carousel Event -->
  <div class="mt-12">
    <h2 class="text-xl font-bold mb-4">Event Tersedia</h2>
    <div class="relative">
      <div id="eventCarousel" class="flex gap-6 overflow-x-auto scroll-smooth snap-x snap-mandatory pb-4">
        @foreach($events as $event)
          <div class="flex-none w-72 md:w-80 bg-white rounded-lg shadow hover:shadow-lg transition snap-start">
            <img src="{{ $event->banner ? asset('storage/'.$event->banner) : 'https://via.placeholder.com/300x150' }}"
                 alt="{{ $event->title }}"
                 class="w-full h-40 object-cover rounded-t-lg">
            <div class="p-4">
              <h3 class="font-semibold text-gray-800 truncate">{{ $event->title }}</h3>
              <p class="text-sm text-gray-500 mt-1">
                {{ $event->start_date->format('d M') }} - {{ $event->end_date->format('d M Y') }}
              </p>
              <p class="text-sm text-gray-600 truncate">{{ $event->location }}</p>
            </div>
          </div>
        @endforeach
      </div>
      <button onclick="scrollCarousel('eventCarousel', -1)"
              class="absolute left-2 top-1/2 -translate-y-1/2 bg-white shadow rounded-full p-2 md:p-3 hover:bg-gray-100">
        ◀
      </button>
      <button onclick="scrollCarousel('eventCarousel', 1)"
              class="absolute right-2 top-1/2 -translate-y-1/2 bg-white shadow rounded-full p-2 md:p-3 hover:bg-gray-100">
        ▶
      </button>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // === PIE CHART ===
  const departemenData = @json(($departemenData ?? collect())->toArray());
  const labels = Object.keys(departemenData);
  const values = Object.values(departemenData);

  const colors = ['#8b5cf6','#3b82f6','#06b6d4','#10b981','#f59e0b',
                  '#ef4444','#f472b6','#14b8a6','#84cc16','#f97316'];

  new Chart(document.getElementById('departemenChart'), {
    type: 'doughnut',
    data: {
      labels,
      datasets: [{ data: values, backgroundColor: colors.slice(0, labels.length), borderWidth:2, borderColor:'#fff'}]
    },
    options: { cutout:'60%', plugins:{legend:{display:false}}, responsive:true, maintainAspectRatio:true }
  });

  const legendContainer = document.getElementById('departemenLegend');
  labels.forEach((label, i) => {
    const li = document.createElement('li');
    li.className = "flex items-center space-x-2";
    li.innerHTML = `<span class="inline-block w-3 h-3 rounded" style="background-color:${colors[i]}"></span>
                    <span>${label} – ${values[i]}</span>`;
    legendContainer.appendChild(li);
  });

  // === CAROUSEL SCROLL ===
  function scrollCarousel(id, direction) {
    const carousel = document.getElementById(id);
    const card = carousel.querySelector('.flex-none');
    if (!card) return;
    const scrollAmount = card.offsetWidth + 24; // card width + gap
    carousel.scrollBy({ left: direction * scrollAmount, behavior: 'smooth' });
  }
</script>
@endpush
