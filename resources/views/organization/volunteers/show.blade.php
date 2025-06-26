@extends('layouts.organization')

@section('title', 'Detail Relawan')

@section('content')
<div class="py-12">
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">

        <h2 class="text-xl font-bold mb-4">Detail Relawan</h2>

        <div class="mb-4">
            <strong>Nama:</strong> {{ $volunteer->participantProfile->user->name }}
        </div>

        <div class="mb-4">
            <strong>Email:</strong> {{ $volunteer->participantProfile->user->email }}
        </div>

        <div class="mb-4">
            <strong>No. Telepon:</strong> {{ $volunteer->participantProfile->phone_number ?? '-' }}
        </div>

        <div class="mb-4">
            <strong>Tanggal Mendaftar:</strong> {{ \Carbon\Carbon::parse($volunteer->created_at)->format('d M Y H:i') }}
        </div>

        <div class="mb-4">
            <strong>Alasan Tertarik Bergabung:</strong>
            <p class="text-gray-700 mt-1">{{ $volunteer->reason ?? 'Tidak diisi' }}</p>
        </div>

        <div class="mt-6">
            <a href="{{ route('organization.volunteers.index', $event->id) }}" class="text-indigo-600 hover:underline">&larr; Kembali ke daftar relawan</a>
        </div>

    </div>
</div>
@endsection
