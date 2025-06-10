@extends('layouts.organization')

@section('title', 'Detail Event')

@section('content')
    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-xl font-semibold mb-4">{{ $event->title }}</h2>
                    <p class="mb-2"><span class="font-semibold">Deskripsi:</span> {{ $event->description }}</p>
                    <p class="mb-2"><span class="font-semibold">Lokasi:</span> {{ $event->location_address }}, {{ $event->location_city }}, {{ $event->location_province }}</p>
                    <p class="mb-2"><span class="font-semibold">Mulai:</span> {{ $event->start_date }}</p>
                    <p class="mb-2"><span class="font-semibold">Berakhir:</span> {{ $event->end_date }}</p>
                    <p class="mb-2"><span class="font-semibold">Deadline Pendaftaran:</span> {{ $event->registration_deadline }}</p>
                    <p class="mb-2"><span class="font-semibold">Kontak Email:</span> {{ $event->contact_email }}</p>
                    <p class="mb-2"><span class="font-semibold">Kontak Telepon:</span> {{ $event->contact_phone ?? '-' }}</p>
                    @if ($event->banner_image_path)
                        <img src="{{ $event->banner_image_path }}" alt="Banner Event" class="mt-4 rounded-md">
                    @endif
                    <div class="mt-4">
                        <a href="{{ route('organization.events.edit', $event->id) }}" class="inline-block bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Edit Event</a>
                        <a href="{{ route('organization.events.index') }}" class="inline-block ml-2 align-baseline font-semibold text-sm text-blue-500 hover:text-blue-800">Kembali ke Daftar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
