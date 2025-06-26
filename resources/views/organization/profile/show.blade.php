@extends('layouts.organization')

@section('title', 'Profil Organisasi')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto px-4">
        <h1 class="text-2xl font-bold mb-6">Profil Organisasi</h1>

        <div class="flex justify-end mb-4">
            <a href="{{ route('organization.profile.edit') }}"
               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                Edit Profil
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            {{-- KONTEN KIRI --}}
            <div class="md:col-span-2 bg-white p-6 rounded shadow">
                <div class="flex items-start gap-4">
                    @if($organization->logo_path)
                        <img src="{{ $organization->logo_path }}" class="w-20 h-20 rounded-full object-cover" alt="Logo">
                    @endif
                    <div>
                        <h2 class="text-xl font-semibold">{{ $organization->name }}</h2>
                        <p class="text-sm text-gray-500">{{ $organization->city }}, {{ $organization->province }}</p>
                    </div>
                </div>

                <div class="mt-4">
                    <p class="text-gray-700">{{ $organization->description }}</p>
                </div>

                {{-- Kategori --}}
                <div class="mt-4 flex gap-2">
                    @foreach ($organization->categories ?? [] as $category)
                        <span class="px-2 py-1 bg-gray-200 text-sm rounded">{{ $category }}</span>
                    @endforeach
                </div>

                {{-- Statistik --}}
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mt-6 text-sm text-gray-600">
                    <div>
                        <div class="text-gray-800 font-semibold">Jumlah Relawan</div>
                        <div>{{ $volunteers->count() }}</div>
                    </div>
                    <div>
                        <div class="text-gray-800 font-semibold">Jumlah Kegiatan</div>
                        <div>{{ $organization->volunteerActivities->count() }}</div>
                    </div>
                    <div>
                        <div class="text-gray-800 font-semibold">Tanggal Berdiri</div>
                        <div>{{ $organization->founded_at ? \Carbon\Carbon::parse($organization->founded_at)->format('d M Y') : '-' }}</div>
                    </div>
                    <div>
                        <div class="text-gray-800 font-semibold">Website</div>
                        <div>
                            @if ($organization->website_url)
                                <a href="{{ $organization->website_url }}" class="text-indigo-500 underline" target="_blank">
                                    {{ $organization->website_url }}
                                </a>
                            @else
                                <span>-</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            {{-- KONTEN KANAN: Daftar Relawan --}}
            <div class="bg-white p-4 rounded shadow">
                <h3 class="font-semibold text-gray-800 mb-4">Daftar Relawan</h3>
                <ul class="space-y-3">
                    @forelse($volunteers->take(6) as $volunteer)
                        <li class="flex items-center gap-3">
                            <img src="{{ asset('default-avatar.png') }}" class="w-8 h-8 rounded-full" alt="Avatar">
                            <span>{{ $volunteer->name }}</span>
                        </li>
                    @empty
                        <li class="text-gray-500">Belum ada relawan yang terdaftar.</li>
                    @endforelse
                </ul>
            </div>
        </div>

        {{-- Daftar Kegiatan --}}
        <div class="bg-white mt-8 p-6 rounded shadow">
            <h3 class="text-lg font-semibold mb-4">Daftar Kegiatan</h3>
            <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @forelse($organization->volunteerActivities as $activity)
                    <li class="border p-4 rounded shadow-sm">
                        <h4 class="font-bold">{{ $activity->title }}</h4>
                        <p class="text-sm text-gray-500">
                            Tanggal: {{ \Carbon\Carbon::parse($activity->start_date)->format('d M Y') }}
                        </p>
                        <a href="{{ route('organization.events.show', $activity->id) }}"
                           class="text-indigo-500 text-sm mt-2 inline-block">Lihat Detail</a>
                    </li>
                @empty
                    <li class="text-gray-500">Belum ada kegiatan.</li>
                @endforelse
            </ul>
        </div>

        {{-- Kesan & Pesan Relawan (opsional) --}}
        {{-- @isset($feedbacks)
            @if($feedbacks->count())
            <div class="bg-white mt-8 p-6 rounded shadow">
                <h3 class="text-lg font-semibold mb-4">Kesan dan Pesan Relawan</h3>
                <div class="space-y-4">
                    @foreach($feedbacks as $feedback)
                        <div class="p-4 bg-gray-50 border rounded">
                            <p class="italic text-gray-700">"{{ $feedback->message }}"</p>
                            <p class="text-right text-sm text-gray-500">— {{ $feedback->user->name }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
            @endif
        @endisset --}}
    </div>
</div>
@endsection
