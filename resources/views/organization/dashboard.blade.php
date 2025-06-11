@extends('layouts.organization')

@section('title', 'Dashboard Organisasi')

@section('content')
    <h1 class="text-2xl font-bold mb-6">
        Selamat datang, {{ optional(Auth::user()->organizationProfile)->name ?? Auth::user()->name }}!
    </h1>

    <div class="mb-8">
        <h2 class="text-xl font-semibold text-gray-800">Event Terbaru</h2>
        <p class="text-sm text-gray-500">Berikut adalah daftar event yang sedang berlangsung atau akan datang.</p>
    </div>

    {{-- Tampilan list event --}}
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($events as $event)
            <div class="bg-white p-5 rounded-lg shadow hover:shadow-md transition">
                <h3 class="text-lg font-bold text-blue-700">{{ $event->title }}</h3>

                {{-- Cegah error format() jika date null --}}
                @if ($event->start_date && $event->end_date)
                    <p class="text-sm text-gray-600">
                        {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y') }} –
                        {{ \Carbon\Carbon::parse($event->end_date)->format('d M Y') }}
                    </p>
                @else
                    <p class="text-sm text-gray-600">Tanggal belum tersedia</p>
                @endif

                <p class="mt-2 text-gray-700 text-sm line-clamp-3">
                    {{ Str::limit($event->description, 100) }}
                </p>

                <a href="{{ route('organization.events.show', $event) }}" class="inline-block mt-3 text-blue-600 text-sm hover:underline">
                    Lihat Detail
                </a>
            </div>
        @endforeach
    </div>
@endsection
