<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="BEM FT UNWAHAS - Kabinet CAKRA AKSATA">
    <meta name="keywords" content="BEM FT, Kabinet CAKRA AKSATA, Universitas Wahid Hasyim, Fakultas Teknik, Organisasi Mahasiswa, bem ft unwahas, fakultas teknik unwahas, teknik unwahas, Teknik Unwahas, Informatika unwahas, Kimia Unwahas, Mesin Unwahas">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BEM FT UNWAHAS - Kabinet CAKRA AKSATA</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="icon" href="/assets/BEMFT.png">
</head>
<body class="bg-white text-gray-900" style="font-family: 'Poppins', 'Montserrat', Arial, sans-serif;">
    <!-- Navbar -->
    <x-navbar.navbar />

    <!-- Hero Section -->
    <section id="home" class="relative py-40 flex flex-col items-center text-center overflow-hidden">
        <!-- Background image -->
        <div class="absolute inset-0 w-full h-full">
            <img src="/assets/bg-new.png" alt="Background" class="w-full h-full object-cover object-center">
            <!-- Gradient transparan putih di atas -->
            <div class="absolute inset-0 pointer-events-none" style="background: linear-gradient(to bottom, rgba(255,255,255,0.8) 0%, rgba(255,255,255,0.5) 70%, rgba(255,255,255,0) 95%);"></div>
        </div>
        <div class="relative z-10 flex flex-col items-center text-center mt-[-40px] animate-fadein">
            <img src="/assets/MAIN-LOGO.png" alt="BEM FT Logo" class="mx-auto mb-4 animate-fadein-logo" style="max-width:220px;width:100%;height:auto;aspect-ratio:16/9;object-fit:contain;">
            <h1 class="text-3xl md:text-5xl font-extrabold mb-2 animate-fadein-text">BEM FT UNWAHAS</h1>
            <h2 class="text-xl md:text-2xl font-bold mb-4 animate-fadein-text">Kabinet CAKRA AKSATA</h2>
        </div>
        <style>
        @keyframes fadein {
            0% { opacity: 0; transform: translateY(40px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .animate-fadein { animation: fadein 1s cubic-bezier(.4,0,.2,1) 0.1s both; }
        .animate-fadein-logo { animation: fadein 1.2s cubic-bezier(.4,0,.2,1) 0.2s both; }
        .animate-fadein-text { animation: fadein 1.4s cubic-bezier(.4,0,.2,1) 0.3s both; }
        .animate-fadein-btn { animation: fadein 1.6s cubic-bezier(.4,0,.2,1) 0.4s both; }
        </style>
    </section>

    <!-- Profil Section -->
    <section id="profil" class="py-16 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
                <div class="flex justify-center">
                    <img src="/assets/Main_foto.png" alt="profil" class="w-full max-w-md md:max-w-xl lg:max-w-2xl rounded-2xl object-cover scroll-fadein">
                </div>
                <div>
                    <div class="bg-white rounded-2xl shadow-xl p-8 relative scroll-fadein">
                        <!-- Quote decoration -->
                        <div class="absolute top-4 left-4 text-blue-100 text-7xl font-serif leading-none">“</div>
                        <h2 class="text-2xl md:text-3xl font-bold mb-6 text-blue-700 text-center md:text-left relative z-10 scroll-fadein">
                            Profil BEM FT UNWAHAS
                        </h2>
                        <div class="relative scroll-fadein">
                            <p class="text-gray-700 leading-relaxed mb-6 text-lg italic pl-8 relative z-10 scroll-fadein">
                                <span class="text-blue-600 font-medium">BEM FT UNWAHAS</span> adalah organisasi mahasiswa di Fakultas Teknik Universitas Wahid Hasyim yang berperan sebagai wadah aspirasi, pengembangan potensi, dan pelaksana program-program kemahasiswaan.
                            </p>
                            <!-- Closing quote -->
                            <div class="absolute bottom-0 right-4 text-blue-100 text-7xl font-serif leading-none scroll-fadein">”</div>
                        </div>
                        <ul class="list-disc pl-6 text-gray-700 space-y-2 border-t border-gray-100 pt-4 scroll-fadein">
                            <li class="pl-2 scroll-fadein"><span class="font-semibold text-blue-700">Visi:</span> Mewujudkan mahasiswa teknik yang aktif, kreatif, dan berintegritas.</li>
                            <li class="pl-2 scroll-fadein"><span class="font-semibold text-blue-700">Misi:</span> Meningkatkan kualitas organisasi, memperluas jaringan, dan mengoptimalkan peran mahasiswa dalam pengabdian masyarakat.</li>
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
            transition: opacity 1s cubic-bezier(.4,0,.2,1), transform 1s cubic-bezier(.4,0,.2,1);
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

    <!-- About Section -->
    <x-about.about />
    
    <!-- Event Section -->
    <x-event.event :events="$events" />

    <!-- Blog Section -->
   <x-blog.blog :blogs="$blogs" />

    <!-- Contact Section -->
    <section id="contact" class="py-16 bg-blue-50">
        <div class="max-w-4xl mx-auto px-4">
            <h2 class="text-2xl md:text-3xl font-bold mb-4 text-blue-700">Kontak Kami</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <p class="text-gray-700 mb-2">Alamat:</p>
                    <p class="text-gray-900 font-semibold mb-4">Fakultas Teknik, Universitas Wahid Hasyim<br>Jl. Menoreh Tengah X/22, Sampangan, Semarang</p>
                    <p class="text-gray-700 mb-2">Email:</p>
                    <p class="text-gray-900 font-semibold mb-4">bemft@unwahas.ac.id</p>
                    <p class="text-gray-700 mb-2">Instagram:</p>
                    <p class="text-gray-900 font-semibold">@bemftunwahas</p>
                </div>
                <form class="bg-white rounded-lg shadow p-6 flex flex-col gap-4">
                    <input type="text" placeholder="Nama" class="border border-gray-300 rounded px-3 py-2 focus:outline-blue-500">
                    <input type="email" placeholder="Email" class="border border-gray-300 rounded px-3 py-2 focus:outline-blue-500">
                    <textarea placeholder="Pesan" rows="4" class="border border-gray-300 rounded px-3 py-2 focus:outline-blue-500"></textarea>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Kirim Pesan</button>
                </form>
            </div>
        </div>
    </section>

    <x-footer.footer />

</body>
</html>
