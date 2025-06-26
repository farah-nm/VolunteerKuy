@extends('layouts.organization')

@section('title', 'Detail Event')

@section('content')
<div class="py-8 px-6">
    {{-- Judul & tombol kembali di kiri --}}
    <div class="mb-4">
        <h1 class="text-2xl font-bold inline-block align-middle">Detail Event</h1>
        <a href="{{ route('organization.events.index') }}"
           class="ml-4 text-sm bg-blue-100 text-blue-700 font-semibold py-1 px-3 rounded hover:bg-blue-200 transition inline-block align-middle">
           Kembali
        </a>
    </div>

    {{-- Card konten di tengah --}}
    <div class="flex justify-center">
        <div class="bg-white rounded-lg shadow p-6 w-full max-w-3xl">
            {{-- Gambar --}}
            @if ($event->banner_image_path)
                <img src="{{ $event->banner_image_path }}"
                     alt="Banner Event"
                     class="w-full h-48 object-cover rounded mb-4">
            @endif

            {{-- Informasi Event --}}
            <h2 class="text-xl font-bold mb-3">{{ $event->title }}</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-x-8 gap-y-2">
                <p><span class="font-semibold">Deskripsi:</span> {{ $event->description }}</p>
                <p><span class="font-semibold">Alamat:</span> {{ $event->location_address }}</p>
                <p><span class="font-semibold">Kota:</span> {{ $event->location_city }}</p>
                <p><span class="font-semibold">Provinsi:</span> {{ $event->location_province }}</p>
                <p><span class="font-semibold">Tanggal Mulai:</span> {{ \Carbon\Carbon::parse($event->start_date)->format('d-m-Y H:i') }}</p>
                <p><span class="font-semibold">Tanggal Berakhir:</span> {{ \Carbon\Carbon::parse($event->end_date)->format('d-m-Y H:i') }}</p>
                <p><span class="font-semibold">Deadline Pendaftaran:</span> {{ \Carbon\Carbon::parse($event->registration_deadline)->format('d-m-Y H:i') }}</p>
                <p><span class="font-semibold">Kuota:</span> {{ $event->quota }}</p>
                <p><span class="font-semibold">Kontak Email:</span> {{ $event->contact_email }}</p>
                <p><span class="font-semibold">Kontak Telepon:</span> {{ $event->contact_phone ?? '-' }}</p>
            </div>

            {{-- Tombol Aksi --}}
            <div class="mt-6 flex flex-col sm:flex-row gap-4">
                <a href="{{ route('organization.volunteers.index', $event->id) }}"
                   class="flex-1 text-center bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
                    Lihat Relawan
                </a>
                <a href="{{ route('organization.events.donations.show', $event->id) }}"
                   class="flex-1 text-center bg-green-500 hover:bg-green-600 text-white font-semibold py-2 px-4 rounded">
                    Lihat Donasi
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
