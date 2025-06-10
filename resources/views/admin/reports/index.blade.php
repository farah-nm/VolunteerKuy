@extends('layouts.admin')

@section('title', 'Manajemen Laporan')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-xl font-semibold mb-4">Daftar Laporan</h2>
                    @if (session('success'))
                        <div class="bg-green-200 text-green-800 p-3 rounded-md mb-4">
                            {{ session('success') }}
                        </div>
                    @endif
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Pelapor</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($reports as $report)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $report->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $report->title }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $report->participantProfile->full_name ?? 'Tidak Diketahui' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if ($report->status === 'pending')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                                        @elseif ($report->status === 'processed')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Diproses</span>
                                        @elseif ($report->status === 'resolved')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Selesai</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('admin.reports.edit', $report->id) }}" class="text-indigo-600 hover:text-indigo-900">Ubah Status</a>
                                    </td>
                                </tr>
                            @empty
                                <tr><td class="px-6 py-4 whitespace-nowrap text-center" colspan="5">Tidak ada laporan.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $reports->links() }} </div>
            </div>
        </div>
    </div>
@endsection
