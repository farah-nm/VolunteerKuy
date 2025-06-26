@extends('layouts.participant')

@section('title', 'Dashboard Partisipan')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">{{ __('Laporan Kegiatan Volunteer Anda') }}</h3>
                    <p class="mb-4"><a href="{{ route('participant.reports.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ __('Buat Laporan Baru') }}</a></p>
                    @if ($reports->count() > 0)
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Judul') }}</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Tanggal Kirim') }}</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Status') }}</th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">View</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($reports as $report)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $report->title }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $report->submitted_at }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ ucfirst($report->status) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ route('participant.reports.show', $report->id) }}" class="text-indigo-600 hover:text-indigo-900">{{ __('Lihat') }}</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-4">
                            {{ $reports->links() }}
                        </div>
                    @else
                        <p>{{ __('Anda belum mengirim laporan kegiatan.') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
