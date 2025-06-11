@extends('layouts.organization')

@section('title', 'Manajemen Donasi')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-xl font-semibold mb-4">Daftar Donasi</h2>
                    @if (session('success'))
                        <div class="bg-green-200 text-green-800 p-3 rounded-md mb-4">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Donatur</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Event</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jumlah</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Metode Pembayaran</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($donations as $donation)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $donation->participantProfile->full_name ?? 'Tidak Diketahui' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $donation->volunteerActivity->title ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">Rp {{ number_format($donation->amount, 2) }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $donation->payment_method }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ ucfirst($donation->status) }}</td>
                                </tr>
                            @empty
                                <tr><td class="px-6 py-4 whitespace-nowrap text-center" colspan="5">Belum ada donasi.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $donations->links() }}
                    <div class="mt-4">
                        <a href="{{ route('organization.donations.report.create') }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Tambah Laporan Dana Donasi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
