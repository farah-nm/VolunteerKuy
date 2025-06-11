@extends('layouts.app')

@section('content')
    {{-- Navbar custom (bukan dari layout) --}}
    <nav class="bg-white shadow" id="navbar">
        <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
            <div class="flex items-center space-x-2">
                <img src="{{ asset('logo.png') }}" alt="Logo" class="w-8 h-8">
                <span class="font-bold text-xl text-gray-800">VolunteerKuy</span>
            </div>
            <div class="space-x-6">
                <a href="#hero" class="text-gray-700 hover:text-blue-500">Beranda</a>
                <a href="#aksi" class="text-gray-700 hover:text-blue-500">Tentang</a>
                <a href="#kontak" class="text-gray-700 hover:text-blue-500">Kontak</a>
                <a href="{{ route('login') }}" class="bg-black text-white px-4 py-2 rounded hover:bg-gray-800">Login</a>
            </div>
        </div>
    </nav>

    {{-- Hero --}}
    <section id="hero" class="bg-gray-50 py-20 text-center">
        <h1 class="text-4xl sm:text-5xl font-extrabold text-gray-800 mb-4">
            Temukan, Daftar, Berkontribusi<br>Semua Bisa di <span class="text-blue-500">VolunteerKuy</span>
        </h1>
        <p class="text-lg text-gray-600">
            Karena Setiap Tangan yang Membantu, Layak Mendapat Tempat untuk Berkarya
        </p>
        <div class="mt-8 flex justify-center space-x-4">
            <a href="{{ route('register.participant') }}"
               class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded">
               Registrasi Partisipan
            </a>
            <a href="{{ route('register.organization') }}"
               class="bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-6 rounded">
               Registrasi Organisasi
            </a>
        </div>
    </section>

    {{-- Aksi Terbaru --}}
    <section id="aksi" class="py-10 bg-gradient-to-r from-cyan-400 to-blue-500">
        <div class="max-w-6xl mx-auto text-white px-4">
            <h2 class="text-xl font-semibold mb-6">🔥 Aksi Relawan Terbaru, Yuk Gabung Sekarang!</h2>
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                @for ($i = 0; $i < 6; $i++)
                    <div class="bg-white h-24 rounded-lg shadow-md"></div>
                @endfor
            </div>
        </div>
    </section>

    {{-- Kenapa Harus VolunteerKuy --}}
    <section class="py-14 bg-white text-center">
        <h2 class="text-2xl font-bold mb-8 text-gray-800">Kenapa Harus VolunteerKuy?</h2>
        <div class="max-w-xl mx-auto space-y-4 text-left text-gray-700">
            <p>✅ Mudah Cari & Daftar Event Volunteer</p>
            <p>✅ Sistem Pendaftaran Relawan yang Cepat & Terstruktur</p>
            <p>✅ Donasi Lebih Aman & Terbuka</p>
            <p>✅ Jangkauan Lebih Luas</p>
        </div>
    </section>

    {{-- CTA --}}
    <section class="py-12 bg-gradient-to-r from-cyan-400 to-blue-500 text-white text-center">
        <h2 class="text-2xl sm:text-3xl font-bold mb-4">
            Ayo mulai kontribusi kamu hari ini bersama VolunteerKuy
        </h2>
        {{-- <a href="{{ route('register.participant') }}"
           class="bg-black hover:bg-gray-800 px-6 py-3 rounded-lg text-white font-semibold">
            Gabung Sekarang
        </a> --}}
    </section>

    {{-- Footer --}}
    <footer id="kontak" class="bg-white shadow mt-10 py-8">
        <div class="max-w-7xl mx-auto px-4 text-center space-y-4">
            <h3 class="text-lg font-bold text-gray-800">Kontak Kami</h3>
            <div class="flex justify-center space-x-6 text-gray-600">
                <a href="mailto:volunteerkuy@gmail.com" class="flex items-center space-x-2">
                    <img src="{{ asset('gmail.jpeg') }}" alt="Email" class="w-5 h-5">
                    <span>volunteerkuy@gmail.com</span>
                </a>
                <a href="https://instagram.com/volunteerkuy.id" target="_blank" class="flex items-center space-x-2">
                    <img src="{{ asset('instagram.jpeg') }}" alt="Instagram" class="w-5 h-5">
                    <span>@volunteerkuy.id</span>
                </a>
                <a href="https://tiktok.com/@volunteerkuy" target="_blank" class="flex items-center space-x-2">
                    <img src="{{ asset('tiktok.jpeg') }}" alt="TikTok" class="w-5 h-5">
                    <span>@volunteerkuy</span>
                </a>
            </div>
            <div class="text-sm text-gray-500 mt-2">© 2025 VolunteerKuy. All rights reserved.</div>
        </div>
    </footer>
@endsection
