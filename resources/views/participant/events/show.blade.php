@extends('layouts.participant')

@section('title', 'Detail Event')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-6">Detail Event</h1>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        {{-- ========= KARTU KIRI ========= --}}
        <div class="lg:col-span-2 bg-white rounded-lg shadow-md p-6">
            <img src="{{ $event->banner_image_path ?? asset('images/default-banner.jpg') }}"
                 alt="{{ $event->title }}"
                 class="w-full h-64 object-cover rounded-md mb-4">

            {{-- nama organisasi --}}
            <div class="flex items-center gap-2 mb-4">
                <img src="{{ $event->organizationProfile->logo_path ?? asset('images/default-logo.png') }}"
                     class="w-10 h-10 rounded-full object-cover" alt="Logo">
                <div>
                    <h2 class="text-lg font-semibold">
                        {{ $event->organizationProfile->name ?? 'Organisasi' }}
                    </h2>
                    <p class="text-xs text-gray-500">Volunteer’s Group</p>
                </div>
            </div>

            {{-- Deskripsi --}}
            <div class="mb-4">
                <h3 class="font-semibold">Deskripsi</h3>
                <p class="text-sm text-gray-700">{{ $event->description }}</p>
            </div>

            {{-- Persyaratan --}}
            <div class="mb-4">
                <h3 class="font-semibold">Persyaratan</h3>
                @if ($event->requirements)
                    <p class="text-sm text-gray-700 whitespace-pre-line">{{ $event->requirements }}</p>
                @else
                    <p class="text-sm text-gray-500">Tidak ada persyaratan khusus.</p>
                @endif
            </div>

            {{-- Kuota --}}
            @isset($event->slots_available)
                <p class="text-sm font-medium">
                    Kuota Tersedia: {{ $event->slots_available }} orang
                </p>
            @endisset
        </div>

        {{-- ========= KARTU KANAN ========= --}}
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-xl font-semibold mb-4">{{ $event->title }}</h2>

            <div class="text-sm text-gray-700 mb-4 space-y-1">
                <p>📅 <strong>Periode Event</strong><br>
                   Dimulai: {{ $event->start_date->format('d M Y') }}<br>
                   Berakhir: {{ $event->end_date->format('d M Y') }}
                </p>
                <p>📍 <strong>Lokasi:</strong><br>
                   {{ $event->location_city }}, {{ $event->location_province }}
                </p>
                <p>⏳ <strong>Deadline Pendaftaran:</strong><br>
                   {{ $event->registration_deadline->format('d M Y') }}
                </p>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex flex-col gap-3">
                <a href="{{ route('participant.volunteer-registrations.create', ['event' => $event->id]) }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white text-center font-semibold py-2 px-4 rounded">
                    Jadi Relawan
                </a>

                <a href="{{ route('participant.donations.create') }}"
                   class="bg-white border border-blue-600 text-blue-600 hover:bg-blue-50 text-center font-semibold py-2 px-4 rounded">
                    Donasi Sekarang
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
