@extends('layouts.organization')

@section('title', 'Dashboard Organisasi')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Selamat datang di Dashboard Organisasi, {{ optional(Auth::user()->organizationProfile)->name ?? Auth::user()->name }}!
                </div>
            </div>
            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-lg font-semibold">Manajemen Event</h3>
                        <p class="mt-2">Kelola semua event volunteer Anda di sini.</p>
                        <a href="{{ route('organization.events.index') }}" class="inline-block mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Lihat Event</a>
                        <a href="{{ route('organization.events.create') }}" class="inline-block mt-2 text-blue-600 hover:text-blue-900 text-sm">Tambah Event Baru</a>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-lg font-semibold">Manajemen Relawan</h3>
                        <p class="mt-2">Lihat daftar relawan yang mendaftar untuk event Anda.</p>
                        <a href="{{ route('organization.volunteers.index') }}" class="inline-block mt-4 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Lihat Relawan</a>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-lg font-semibold">Manajemen Donasi</h3>
                        <p class="mt-2">Pantau donasi dan buat laporan dana.</p>
                        <a href="{{ route('organization.donations.index') }}" class="inline-block mt-4 bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Lihat Donasi</a>
                        <a href="{{ route('organization.donations.report.create') }}" class="inline-block mt-2 text-indigo-600 hover:text-indigo-900 text-sm">Buat Laporan Donasi</a>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-lg font-semibold">Profil Organisasi</h3>
                        <p class="mt-2">Lihat dan ubah informasi profil organisasi Anda.</p>
                        @if (Auth::user()->organizationProfile)
                            <a href="{{ route('organization.profile.edit', Auth::user()->organizationProfile->id) }}" class="inline-block mt-4 bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Edit Profil</a>
                        @else
                            <a href="{{ route('organization.profile.edit') }}" class="inline-block mt-4 bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Edit Profil</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
