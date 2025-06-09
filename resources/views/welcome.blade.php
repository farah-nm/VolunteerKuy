@extends('layouts.app')

@section('content')
    <div class="bg-gray-100 py-20">
        <div class="max-w-7xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h1 class="text-5xl font-bold text-gray-800 mb-4">Selamat Datang di Sistem Manajemen Volunteer</h1>
            <p class="text-lg text-gray-600 mb-8">Platform untuk menghubungkan organisasi dengan relawan dan partisipan.</p>
            <div class="flex justify-center space-x-4">
                <a href="{{ route('login') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-6 rounded focus:outline-none focus:shadow-outline">Login</a>
                @guest
                    <a href="{{ route('register.organization') }}" class="inline-block bg-green-500 hover:bg-green-700 text-white font-bold py-3 px-6 rounded focus:outline-none focus:shadow-outline">Registrasi Organisasi</a>
                    <a href="{{ route('register.participant') }}" class="inline-block bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-3 px-6 rounded focus:outline-none focus:shadow-outline">Registrasi Partisipan</a>
                @endguest
            </div>
            <div class="mt-10">
                <h2 class="text-3xl font-semibold text-gray-700 mb-4">Akses Berdasarkan Peran</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-blue-500 mb-2">Admin</h3>
                        <p class="text-gray-600">Akses penuh ke manajemen laporan dan akun pengguna.</p>
                        <p class="mt-2 text-sm text-gray-500">Silakan login menggunakan tombol di atas.</p>
                    </div>
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-green-500 mb-2">Organisasi</h3>
                        <p class="text-gray-600">Kelola event, rekrut relawan, dan pantau donasi.</p>
                        <p class="mt-2 text-sm text-gray-500">Registrasi atau login melalui tombol di atas.</p>
                    </div>
                    <div class="bg-white shadow-md rounded-lg p-6">
                        <h3 class="text-xl font-semibold text-indigo-500 mb-2">Partisipan</h3>
                        <p class="text-gray-600">Daftar sebagai relawan, berdonasi, dan kirim laporan.</p>
                        <p class="mt-2 text-sm text-gray-500">Registrasi atau login melalui tombol di atas.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
