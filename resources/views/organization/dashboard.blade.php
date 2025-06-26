@extends('layouts.organization')

@section('content')

    <div class="max-w-7xl mx-auto px-6 py-8">
        <h1 class="text-2xl font-bold mb-1">Selamat Datang, {{ Auth::user()->name }}!</h1>
        <p class="text-gray-600 mb-6">Ayo mulai buat event baru, pantau partisipasi, dan sebarkan dampak positif bersama!</p>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($events as $event)
                <div class="bg-white rounded-xl shadow hover:shadow-md transition duration-200 overflow-hidden">
                    <img src="{{ $event->banner_image_path ?? asset('default.jpg') }}" alt="Event Image" class="w-full h-40 object-cover">


                    <div class="p-4">
                        <h3 class="text-lg font-semibold">{{ $event->title }}</h3>
                        <p class="text-sm text-gray-500 mb-2">{{ $event->organizer_name }}</p>
                        <div class="flex items-center text-sm text-gray-600 space-x-2 mb-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span>{{ \Carbon\Carbon::parse($event->start_date)->format('d M Y') }} - {{ \Carbon\Carbon::parse($event->end_date)->format('d M Y') }}</span>
                        </div>
                        <div class="flex items-center text-sm text-gray-600 space-x-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path d="M17.657 16.657L13.414 12l4.243-4.243M6.343 7.757L10.586 12l-4.243 4.243" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <span>
                                {{ $event->location_address ?? '-' }},
                                {{ $event->location_city ?? '-' }},
                                {{ $event->location_province ?? '-' }}
                            </span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
