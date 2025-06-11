@extends('layouts.app')

@section('content')
    <div class="min-h-screen bg-gradient-to-r from-blue-200 via-blue-300 to-blue-400 flex items-center justify-center px-4">

        <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-10">

            <!-- Logo -->
            <div class="flex justify-center mb-8">
                <img src="{{ asset('logo.png') }}" alt="Logo" class="h-16">
            </div>

            <!-- Heading -->
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-800">Daftar Organisasi</h2>
                <p class="text-sm text-gray-500 mt-2">Silakan isi data berikut untuk membuat akun organisasi.</p>
            </div>

            <form method="POST" action="{{ route('register.organization') }}" class="space-y-6">
                @csrf

                <!-- Nama Organisasi -->
                <div>
                    <label for="organization_name" class="block text-sm font-medium text-gray-700">Nama Organisasi</label>
                    <input id="organization_name" name="organization_name" type="text" required autofocus
                        class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-400 focus:border-blue-400 sm:text-sm"
                        value="{{ old('organization_name') }}">
                    @error('organization_name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" name="email" type="email" required
                        class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-400 focus:border-blue-400 sm:text-sm"
                        value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" name="password" type="password" required
                        class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-400 focus:border-blue-400 sm:text-sm">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Konfirmasi Password -->
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" required
                        class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-400 focus:border-blue-400 sm:text-sm">
                    @error('password_confirmation')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tombol Register -->
                <div>
                    <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white py-3 text-lg font-semibold rounded-lg transition duration-150 cursor-pointer">
                        Register Organisasi
                    </button>
                </div>

                <!-- Kembali ke Home -->
                <div class="mt-6 text-center">
                    <a href="{{ url('/') }}"
                       class="text-blue-600 hover:text-blue-800 font-semibold text-sm hover:underline transition">
                        &larr; Kembali ke Home Page
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection


