<section id="profil" class="py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            <div class="flex justify-center">
                <img src="/assets/Main_foto.png" alt="profil"
                    class="w-full max-w-md md:max-w-xl lg:max-w-2xl rounded-2xl object-cover scroll-fadein">
            </div>
            <div>
                <div class="bg-white rounded-2xl shadow-xl p-8 relative scroll-fadein">
                    <!-- Quote decoration -->
                    <div class="absolute top-4 left-4 text-blue-100 text-7xl font-serif leading-none">“</div>
                    <h2
                        class="text-2xl md:text-3xl font-bold mb-6 text-blue-700 text-center md:text-left relative z-10 scroll-fadein">
                        Profil BEM FT UNWAHAS
                    </h2>
                    <div class="relative scroll-fadein">
                        <p class="text-gray-700 leading-relaxed mb-6 text-lg italic pl-8 relative z-10 scroll-fadein">
                            <span class="text-blue-600 font-medium">BEM FT UNWAHAS</span> adalah organisasi
                            mahasiswa di Fakultas Teknik Universitas Wahid Hasyim yang berperan sebagai wadah
                            aspirasi, pengembangan potensi, dan pelaksana program-program kemahasiswaan.
                        </p>
                        <!-- Closing quote -->
                        <div
                            class="absolute bottom-0 right-4 text-blue-100 text-7xl font-serif leading-none scroll-fadein">
                            ”</div>
                    </div>
                    <ul class="list-disc pl-6 text-gray-700 space-y-2 border-t border-gray-100 pt-4 scroll-fadein">
                        <li class="pl-2 scroll-fadein"><span class="font-semibold text-blue-700">Visi:</span>
                            Mewujudkan mahasiswa teknik yang aktif, kreatif, dan berintegritas.</li>
                        <li class="pl-2 scroll-fadein"><span class="font-semibold text-blue-700">Misi:</span>
                            Meningkatkan kualitas organisasi, memperluas jaringan, dan mengoptimalkan peran
                            mahasiswa dalam pengabdian masyarakat.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <style>
        .scroll-fadein {
            opacity: 0;
            transform: translateY(40px);
        }

        .scroll-fadein.visible {
            opacity: 1;
            transform: translateY(0);
            transition: opacity 1s cubic-bezier(.4, 0, .2, 1), transform 1s cubic-bezier(.4, 0, .2, 1);
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var fadeEls = document.querySelectorAll('.scroll-fadein');
            var observer = new IntersectionObserver(function(entries) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.2 });
            fadeEls.forEach(function(el) { observer.observe(el); });
        });
    </script>
</section>