@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Selamat datang di Dashboard Admin, {{ Auth::user()->name }}!
                </div>
            </div>
            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-lg font-semibold">Manajemen Laporan</h3>
                        <p class="mt-2">Kelola laporan dari partisipan di sini.</p>
                        <a href="{{ route('admin.reports.index') }}" class="inline-block mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Lihat Laporan</a>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-lg font-semibold">Manajemen Akun</h3>
                        <p class="mt-2">Lihat dan ubah status akun pengguna.</p>
                        <a href="{{ route('admin.accounts.index') }}" class="inline-block mt-4 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Lihat Akun</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
