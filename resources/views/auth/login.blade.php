@extends('layouts.auth')

@section('content')
<div class="h-screen flex items-center justify-center overflow-hidden">
    <!-- Background -->
    <div class="absolute inset-0">
        <img src="{{ asset('assets/1.jpg') }}" 
             alt="Background" 
             class="w-full h-full object-cover object-bottom">
             <div class="absolute inset-0 bg-white/30"></div>
    </div>

    <!-- Card Login -->
    <div class="relative z-10 w-full max-w-md bg-white/20 backdrop-blur-md rounded-2xl shadow-lg shadow-gray-500/50 p-8">
        <!-- Judul -->
        <div class="flex justify-center mb-2">
        <img src="{{ asset('assets/aksati.png') }}" 
         alt="Login BEM" 
         class="h-17 w-auto">
</div>
        <p class="text-sm text-gray-600 mb-6">
            Masuk dengan akun yang sudah terdaftar
        </p>

        <!-- Pesan error -->
        @if ($errors->any())
            <div class="mb-4 p-3 rounded-lg bg-red-100 text-red-600 text-sm">
                {{ $errors->first() }}
            </div>
        @endif

        <!-- Form login -->
        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}"
                       class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                       required autofocus>
            </div>

            <!-- Password -->
            <div>
                <div class="flex items-center justify-between">
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <a href="" class="text-sm text-blue-600 hover:underline">
                        Lupa password?
                    </a>
                </div>
                <input id="password" type="password" name="password"
                       class="mt-1 block w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                       required>
            </div>

            <!-- Remember me -->
            <div class="flex items-center justify-between">
                <div class="flex items-center">
                    <input type="checkbox" name="remember" id="remember"
                           class="h-4 w-4 text-blue-600 border-gray-300 rounded">
                    <label for="remember" class="ml-2 block text-sm text-gray-900">
                        Remember me
                    </label>
                </div>
                <!-- Tombol Tambah Admin -->
                <a href=""
                   class="text-sm font-medium text-blue-600 hover:underline">
                    Tambah Admin
                </a>
            </div>

            <!-- Submit -->
            <button type="submit"
                class="w-full bg-blue-600 text-white py-2.5 rounded-lg hover:bg-blue-700 transition font-medium">
                Login
            </button>
        </form>
    </div>
</div>
@endsection
