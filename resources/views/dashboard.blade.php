@extends('layouts.participant')

@section('title', 'Dashboard Partisipan')

@section('content')
<div class="py-12 px-4 sm:px-6 lg:px-8">
    <h1 class="text-2xl font-bold mb-6">Daftar Event Volunteer</h1>

    {{-- GRID KARTU EVENT --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        @forelse (\$events as \$event)
            <div class="bg-white shadow rounded-lg overflow-hidden">
                {{-- Banner --}}
                @if (\$event->banner_image_path)
                    <img src="{{ \$event->banner_image_path }}" alt="{{ \$event->title }}"
                         class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center text-gray-500 text-sm">
                        Tidak ada gambar
                    </div>
                @endif

                {{-- Isi kartu --}}
                <div class="p-4">
                    <h2 class="font-semibold leading-tight">{{ \$event->title }}</h2>
                    <p class="text-xs text-gray-500 mb-1">
                        {{ \$event->organizationProfile->name ?? '-' }}
                    </p>

                    <p class="text-xs text-gray-500">
                        🗓 {{ \Carbon\Carbon::parse(\$event->start_date)->format('d M Y') }}
                        – {{ \Carbon\Carbon::parse(\$event->end_date)->format('d M Y') }}
                    </p>
                    <p class="text-xs text-gray-500 mb-4">
                        📍 {{ \$event->location_city }}, {{ \$event->location_province }}
                    </p>

                    <a href="{{ route('participant.events.show', \$event->id) }}"
                       class="text-blue-600 hover:underline text-sm font-medium">
                        Lihat detail →
                    </a>
                </div>
            </div>
        @empty
            <p class="text-gray-500">Belum ada event volunteer.</p>
        @endforelse
    </div>
</div>
@endsection
