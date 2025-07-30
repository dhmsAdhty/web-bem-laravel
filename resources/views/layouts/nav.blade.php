<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="BEM FT UNWAHAS - Kabinet CAKRA AKSATA">
    <meta name="keywords"
        content="BEM FT, Kabinet CAKRA AKSATA, Universitas Wahid Hasyim, Fakultas Teknik, Organisasi Mahasiswa, bem ft unwahas, fakultas teknik unwahas, teknik unwahas, Teknik Unwahas, Informatika unwahas, Kimia Unwahas, Mesin Unwahas">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BEM FT UNWAHAS - Kabinet CAKRA AKSATA</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="icon" href="/assets/BEMFT.png">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                once: true,
                duration: 600,
                easing: 'ease-out-quad',
            });
        });
    </script>
</head>

<body class="bg-white text-gray-900 overflow-x-hidden" style="font-family: 'Poppins', Arial, sans-serif;">
    {{-- Navbar Section --}}
    @section('navbar')
    <x-navbar.navbar />
    @show

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer Section --}}
    @section('footer')
    <x-footer.footer />
    @show
</body>

</html>