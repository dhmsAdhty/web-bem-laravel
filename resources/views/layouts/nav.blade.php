<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="BEM FT UNWAHAS - Kabinet CAKRA AKSATA">
    <meta name="keywords" content="BEM FT, Kabinet CAKRA AKSATA, Universitas Wahid Hasyim, Fakultas Teknik, Organisasi Mahasiswa, bem ft unwahas, fakultas teknik unwahas, teknik unwahas, Teknik Unwahas, Informatika unwahas, Kimia Unwahas, Mesin Unwahas">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BEM FT UNWAHAS - Kabinet CAKRA AKSATA</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="icon" href="/assets/BEMFT.png">
</head>
<body class="bg-white text-gray-900 font-poppins">
    @section('navbar')
        <x-navbar.navbar />
    @show
        <div class="container">
                @yield('content')
        </div>
    @section('footer')
        <x-footer.footer />
    @show

     

</body>
</html>
