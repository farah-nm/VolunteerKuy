@extends('layouts.participant')

@section('title', 'Dashboard Partisipan')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- Informasi Profil Organisasi --}}
                    <div class="flex items-start">
                        @if ($organizationProfile->logo_path)
                            <img src="{{ $organizationProfile->logo_path }}" alt="{{ $organizationProfile->name }}" class="w-32 h-32 object-cover rounded-full mr-4">
                        @endif
                        <div>
                            <h3 class="text-xl font-semibold">{{ $organizationProfile->name }}</h3>
                            <p class="text-gray-600">{{ $organizationProfile->city }}, {{ $organizationProfile->province }}</p>
                            <p class="text-gray-600">{{ __('Berdiri sejak:') }} {{ $organizationProfile->founded_date ? \Carbon\Carbon::parse($organizationProfile->founded_date)->format('d M Y') : '-' }}</p>
                            <p class="mt-2">{{ $organizationProfile->description }}</p>
                            <p class="text-gray-500 text-sm mt-2">
                                @if ($organizationProfile->website_url) <a href="{{ $organizationProfile->website_url }}" target="_blank" class="mr-2 hover:underline">Website</a> @endif
                                @if ($organizationProfile->instagram_url) <a href="{{ $organizationProfile->instagram_url }}" target="_blank" class="mr-2 hover:underline">Instagram</a> @endif
                                @if ($organizationProfile->facebook_url) <a href="{{ $organizationProfile->facebook_url }}" target="_blank" class="mr-2 hover:underline">Facebook</a> @endif
                                @if ($organizationProfile->phone_number) <span class="mr-2">Telp: {{ $organizationProfile->phone_number }}</span> @endif
                            </p>
                        </div>
                    </div>

                    <div class="mt-6">
                        <h4 class="text-lg font-semibold mb-2">{{ __('Daftar Event') }}</h4>
                        @if ($organizationProfile->volunteerActivities->count() > 0)
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                @foreach ($organizationProfile->volunteerActivities as $event)
                                    <div class="bg-white shadow-sm rounded-lg overflow-hidden">
                                        @if ($event->banner_image_path)
                                            <img src="{{ $event->banner_image_path }}" alt="{{ $event->title }}" class="w-full h-48 object-cover">
                                        @endif
                                        <div class="p-4">
                                            <h5 class="font-semibold">{{ $event->title }}</h5>
                                            <p class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($event->start_date)->format('d M Y') }} - {{ \Carbon\Carbon::parse($event->end_date)->format('d M Y') }}</p>
                                            <p class="text-sm text-gray-600 mt-1 truncate">{{ $event->location_city }}, {{ $event->location_province }}</p>
                                            <div class="mt-2 text-center">
                                                <a href="{{ route('participant.events.show', $event->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline text-xs">{{ __('Lihat Detail') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p>{{ __('Belum ada event yang dibuat oleh organisasi ini.') }}</p>
                        @endif
                    </div>

                    <div class="mt-6">
                        <h4 class="text-lg font-semibold mb-2">{{ __('Kesan dan Pesan Relawan') }}</h4>
                        {{-- Implementasi untuk menampilkan kesan dan pesan relawan --}}
                        <p>{{ __('Belum ada kesan dan pesan dari relawan.') }}</p>
                    </div>

                    <div class="mt-6">
                        <h4 class="text-lg font-semibold mb-2">{{ __('Relawan yang Pernah Berpartisipasi') }}</h4>
                        @if ($participants->count() > 0)
                            <ul class="list-disc list-inside">
                                @foreach ($participants as $participant)
                                    <li>{{ $participant->name }} ({{ $participant->email }})</li>
                                @endforeach
                            </ul>
                        @else
                            <p>{{ __('Belum ada relawan yang berpartisipasi di event organisasi ini.') }}</p>
                        @endif
                    </div>

                    <div class="mt-6">
                    <a href="{{ route('participant.organizations.report.create', $organizationProfile->id) }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ __('Laporkan Organisasi') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
