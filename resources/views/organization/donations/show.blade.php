@extends('layouts.organization')

@section('title', 'Donasi Event')

@section('content')
<div class="py-12">
    <div class="max-w-5xl mx-auto bg-white p-6 rounded shadow">

        <h1 class="text-xl font-bold mb-4">Donasi untuk Event: {{ $volunteerActivity->title }}</h1>

        @if($donations->count())
            <table class="w-full text-sm text-left text-gray-600">
                <thead class="text-xs text-gray-700 uppercase bg-gray-100">
                    <tr>
                        <th class="py-2 px-4">Nama</th>
                        <th class="py-2 px-4">Email</th>
                        <th class="py-2 px-4">Nominal</th>
                        <th class="py-2 px-4">Metode</th>
                        <th class="py-2 px-4">Tanggal</th>
                        <th class="py-2 px-4">Catatan</th>
                        <th class="py-2 px-4">Bukti</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($donations as $donation)
                        <tr class="border-b">
                            <td class="py-2 px-4">{{ $donation->user->name ?? '-' }}</td>
                            <td class="py-2 px-4">{{ $donation->user->email ?? '-' }}</td>
                            <td class="py-2 px-4">Rp{{ number_format($donation->amount, 0, ',', '.') }}</td>
                            <td class="py-2 px-4">{{ ucfirst($donation->method) }}</td>
                            <td class="py-2 px-4">{{ $donation->created_at->format('d M Y') }}</td>
                            <td class="py-2 px-4">{{ $donation->note ?? '-' }}</td>
                            <td class="py-2 px-4">
                                @if($donation->proof_path)
                                    <a href="{{ asset('storage/' . $donation->proof_path) }}" target="_blank" class="text-indigo-500 hover:underline">Lihat</a>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-gray-500">Belum ada donasi yang masuk untuk event ini.</p>
        @endif

        <div class="mt-6">
            <a href="{{ route('organization.events.show', $volunteerActivity->id) }}" class="text-sm text-indigo-500 hover:underline">&larr; Kembali ke Detail Event</a>
        </div>
    </div>
</div>
@endsection
