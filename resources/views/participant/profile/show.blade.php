@extends('layouts.participant')

@section('title', 'Dashboard Partisipan')

@section('content')
    <div class="py-12 bg-gray-50">
        <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">

                {{-- Header Profil --}}
                <div class="flex items-center space-x-6 mb-6">
                    <img src="{{ auth()->user()->participantProfile->profile_picture_path
                        ? asset('storage/' . auth()->user()->participantProfile->profile_picture_path)
                        : asset('default-avatar.png') }}"
                        alt="Foto Profil"
                        class="w-24 h-24 rounded-full object-cover shadow-md">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">
                            {{ auth()->user()->participantProfile->full_name ?? auth()->user()->name }}
                        </h2>
                        <p class="text-gray-500">{{ __('Tergabung sejak:') }} {{ auth()->user()->created_at->format('d M Y') }}</p>
                        <p class="text-gray-500">{{ __('Domisili:') }} {{ auth()->user()->participantProfile->city ?? '-' }}</p>
                    </div>
                </div>

                {{-- Aktivitas --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- Riwayat Volunteer --}}
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <h3 class="text-lg font-semibold mb-2">{{ __('Riwayat Volunteer') }}</h3>
                        @if ($volunteerRegistrations->count() > 0)
                            <ul class="space-y-1 text-sm text-gray-700">
                                @foreach ($volunteerRegistrations as $registration)
                                    <li class="border-b pb-1">
                                        <span class="font-medium">{{ $registration->volunteerActivity->title }}</span> <br>
                                        <span>{{ $registration->application_date->format('d M Y') }}</span> -
                                        <span class="text-gray-600">Status: {{ ucfirst($registration->status) }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-sm text-gray-500">{{ __('Belum ada riwayat pendaftaran volunteer.') }}</p>
                        @endif
                    </div>

                    {{-- Riwayat Donasi --}}
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <h3 class="text-lg font-semibold mb-2">{{ __('Riwayat Donasi') }}</h3>
                        @if ($donations->count() > 0)
                            <ul class="space-y-1 text-sm text-gray-700">
                                @foreach ($donations as $donation)
                                    <li class="border-b pb-1">
                                        Rp {{ number_format($donation->amount) }}
                                        ({{ $donation->created_at->format('d M Y') }})
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-sm text-gray-500">{{ __('Belum ada riwayat donasi.') }}</p>
                        @endif
                    </div>

                    {{-- Riwayat Laporan --}}
                    <div class="bg-gray-100 p-4 rounded-lg col-span-1 md:col-span-2">
                        <h3 class="text-lg font-semibold mb-2">{{ __('Riwayat Laporan') }}</h3>
                        @if ($reports->count() > 0)
                            <ul class="space-y-1 text-sm text-gray-700">
                                @foreach ($reports as $report)
                                    <li class="border-b pb-1">
                                        <span class="font-medium">{{ $report->title }}</span>
                                        @if ($report->submitted_at)
                                            ({{ $report->submitted_at->format('d M Y') }})
                                        @else
                                            (Tanggal tidak tersedia)
                                        @endif
                                        - <span class="text-gray-600">Status: {{ ucfirst($report->status) }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-sm text-gray-500">{{ __('Belum ada riwayat laporan.') }}</p>
                        @endif
                    </div>

                </div>

                {{-- Tombol Edit --}}
                <div class="mt-6 text-right">
                    <a href="{{ route('participant.profile.edit') }}"
                       class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold py-2 px-4 rounded shadow">
                        {{ __('Edit Profil') }}
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
