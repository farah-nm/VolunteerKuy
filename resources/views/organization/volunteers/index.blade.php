@extends('layouts.organization')

@section('title', 'Manajemen Relawan')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-xl font-semibold mb-4">Daftar Relawan yang Mendaftar</h2>
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Relawan</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Event</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal Daftar</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($applications as $application)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $application->participantProfile->full_name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $application->volunteerActivity->title }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ $application->application_date }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">{{ ucfirst($application->status) }}</td>
                                </tr>
                            @empty
                                <tr><td class="px-6 py-4 whitespace-nowrap text-center" colspan="4">Belum ada relawan yang mendaftar.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $applications->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
