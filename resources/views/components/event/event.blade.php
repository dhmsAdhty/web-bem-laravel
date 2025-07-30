<section id="event" class="py-16 bg-gradient-to-b from-blue-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12" data-aos="fade-down">
            <h2
                class="text-3xl md:text-4xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-cyan-500 mb-4">
                Event Terbaru</h2>
            <div class="w-20 h-1 bg-gradient-to-r from-blue-400 to-cyan-300 mx-auto"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($events as $event)
            <div class="group relative overflow-hidden rounded-2xl shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2"
                data-aos="zoom-in-up" data-aos-delay="{{ $loop->index * 100 }}">
                <!-- Gradient overlay -->
                <div
                    class="absolute inset-0 bg-gradient-to-t from-blue-900/70 to-blue-500/30 opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-10">
                </div>

                <!-- Event image -->
                <img alt="{{ $event->title }}"
                    src="{{ $event->banner ? asset('storage/' . $event->banner) : 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?auto=format&fit=crop&w=800&q=80' }}"
                    class="h-60 w-full object-cover transition-transform duration-700 group-hover:scale-110" />

                <!-- Event content -->
                <div
                    class="absolute bottom-0 left-0 right-0 p-6 text-white opacity-100 group-hover:opacity-0 transition-opacity duration-300 z-20">
                    <h3 class="font-bold text-xl mb-1 drop-shadow-md">{{ $event->title }}</h3>
                    <p class="flex items-center text-blue-100 drop-shadow-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        {{ \Carbon\Carbon::parse($event->start_date)->translatedFormat('d F Y H:i') }}
                    </p>
                </div>

                <!-- Hover content -->
                <div
                    class="absolute inset-0 flex flex-col justify-end p-6 opacity-0 group-hover:opacity-100 transition-opacity duration-500 z-20">
                    <h3 class="font-bold text-xl text-white mb-2">{{ $event->title }}</h3>
                    <p class="text-blue-100 mb-4">{{ Str::limit($event->description, 100) }}</p>
                    <div class="flex space-x-3">

                        <a href="/event"
                            class="flex-1 text-center bg-cyan-500 text-white px-4 py-2 rounded-lg font-medium hover:bg-cyan-600 transition-all duration-300 transform hover:scale-105">
                            Cek Event
                        </a>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12" data-aos="fade-up">
                <div class="inline-block p-6 bg-white rounded-xl shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-blue-400 mb-4" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <h3 class="text-xl font-medium text-gray-700 mb-2">Belum ada event yang tersedia</h3>
                    <p class="text-gray-500">Nantikan event-event menarik dari kami</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- AOS Animation Script -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
    AOS.init({
    duration: 800,
    once: true,
    easing: 'ease-out-quad'
  });
</script>