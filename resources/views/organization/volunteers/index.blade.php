@extends('layouts.organization')

@section('title', 'Daftar Relawan')

@section('content')
<div class="py-12">
    <div class="max-w-5xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-xl font-bold mb-4">Relawan untuk Event: {{ $event->title }}</h1>

        @if($volunteers->count())
            <table class="w-full text-sm text-left text-gray-600">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                    <tr>
                        <th class="py-2 px-4">Nama</th>
                        <th class="py-2 px-4">Email</th>
                        <th class="py-2 px-4">No Telepon</th>
                        <th class="py-2 px-4">Tanggal Daftar</th>
                        <th class="py-2 px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($volunteers as $volunteer)
                        <tr class="border-b">
                            {{-- ditambahin el --}}
                            <td class="py-2 px-4">{{ $volunteer->participantProfile->user->name }}</td>
                            <td class="py-2 px-4">{{ $volunteer->participantProfile->user->email }}</td>
                            <td class="py-2 px-4">{{ $volunteer->participantProfile->phone_number ?? '-' }}</td>
                            <td class="py-2 px-4">{{ $volunteer->created_at->format('d M Y') }}</td>
                            <td class="py-2 px-4">
                                <a href="{{ route('organization.volunteers.show', [$event->id, $volunteer->id]) }}" class="text-blue-600 hover:underline text-sm">
                                    Lihat
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-gray-500">Belum ada relawan yang mendaftar.</p>
        @endif

        <div class="mt-6">
            <a href="{{ route('organization.events.index') }}" class="text-sm text-indigo-500 hover:underline">&larr; Kembali ke Event</a>
        </div>
    </div>
</div>
@endsection
