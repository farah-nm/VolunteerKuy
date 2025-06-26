@extends('layouts.participant')

@section('title', 'Dashboard Participant')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Daftar Event Volunteer</h1>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse ($events as $event)
            <div class="bg-white border rounded-lg shadow-sm overflow-hidden hover:shadow-md transition">
                {{-- Banner --}}
                <img src="{{ $event->banner_image_path ?? asset('images/default-banner.jpg') }}"
                     alt="{{ $event->title }}" class="w-full h-40 object-cover">

                {{-- Isi kartu --}}
                <div class="p-4">
                    <h2 class="font-semibold">{{ $event->title }}</h2>
                    <p class="text-xs text-gray-500 mb-1">
                        {{ $event->organizationProfile->name ?? '-' }}
                    </p>

                    <p class="text-xs text-gray-500 flex items-center gap-1">
                        📅 {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y') }}
                        – {{ \Carbon\Carbon::parse($event->end_date)->format('d M Y') }}
                    </p>
                    <p class="text-xs text-gray-500">
                        📍 {{ $event->location_city }}, {{ $event->location_province }}
                    </p>
                </div>
            </div>
        @empty
            <p class="text-gray-500">Belum ada event volunteer.</p>
        @endforelse
    </div>

    {{-- Tombol ke halaman semua event --}}
    {{-- <div class="mt-6 text-right">
        <a href="{{ route('participant.events.index') }}"
           class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            Lihat Semua Event →
        </a>
    </div> --}}
@endsection
