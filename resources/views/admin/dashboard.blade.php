@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <!-- Selamat Datang -->
    <div class="bg-white p-6 rounded-lg shadow text-gray-700 mb-6">
        <p>Selamat datang, {{ Auth::user()->name }}! Anda berhasil login sebagai admin.</p>
    </div>

    <!-- Statistik -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Total Akun -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Total Akun</h3>
            <p class="text-3xl font-bold text-blue-600">{{ $totalAccounts }}</p>
        </div>

        <!-- Total Laporan -->
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-lg font-semibold text-gray-700 mb-2">Total Laporan</h3>
            <p class="text-3xl font-bold text-blue-600">{{ $totalReports }}</p>
        </div>
    </div>
@endsection
