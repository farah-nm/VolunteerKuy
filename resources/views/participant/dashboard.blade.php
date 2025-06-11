@extends('layouts.participant')

@section('title', 'Dashboard Partisipan')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Selamat datang di Dashboard Partisipan, {{ Auth::user()->name }}!
                </div>
            </div>
            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-lg font-semibold">Lihat Event</h3>
                        <p class="mt-2">Jelajahi berbagai event volunteer yang tersedia.</p>
                        <a href="{{ route('participant.events.index') }}" class="inline-block mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Lihat Event</a>
                    </div>
                </div>
                {{-- <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-lg font-semibold">Daftar Relawan</h3>
                        <p class="mt-2">Daftar sebagai relawan untuk event yang Anda minati.</p>
                        <a href="{{ route('participant.volunteer-registrations.create') }}" class="inline-block mt-4 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Daftar Relawan</a>
                    </div>
                </div> --}}
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-lg font-semibold">Donasi</h3>
                        <p class="mt-2">Berikan donasi Anda untuk mendukung kegiatan volunteer.</p>
                        <a href="{{ route('participant.donations.create') }}" class="inline-block mt-4 bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Berikan Donasi</a>
                        <a href="{{ route('participant.donations.index') }}" class="inline-block mt-2 text-indigo-600 hover:text-indigo-900 text-sm">Riwayat Donasi</a>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-lg font-semibold">Kirim Laporan</h3>
                        <p class="mt-2">Kirim laporan kegiatan volunteer yang telah Anda ikuti.</p>
                        <a href="{{ route('participant.reports.create') }}" class="inline-block mt-4 bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Buat Laporan</a>
                        <a href="{{ route('participant.reports.index') }}" class="inline-block mt-2 text-yellow-600 hover:text-yellow-900 text-sm">Lihat Laporan Saya</a>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-lg font-semibold">Profil Akun</h3>
                        <p class="mt-2">Lihat dan ubah informasi akun Anda.</p>
                        <a href="{{ route('participant.profile.edit') }}" class="inline-block mt-4 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Edit Profil</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
