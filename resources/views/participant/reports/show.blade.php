@extends('layouts.participant')

@section('title', 'Dashboard Partisipan')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">{{ __('Judul Laporan:') }} {{ $report->title }}</h3>
                    <p class="mb-4"><span class="font-semibold">{{ __('Deskripsi:') }}</span> {{ $report->description }}</p>
                    <p><span class="font-semibold">{{ __('Status:') }}</span> {{ ucfirst($report->status) }}</p>
                    <p><span class="font-semibold">{{ __('Dikirim pada:') }}</span> {{ $report->submitted_at }}</p>

                    <div class="mt-4">
                        <a href="{{ route('participant.reports.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ __('Kembali ke Daftar Laporan') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
