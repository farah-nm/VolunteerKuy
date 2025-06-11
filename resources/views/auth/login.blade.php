@extends('layouts.app')

@section('content')
    <!-- Background Gradient biru muda -->
    <div class="min-h-screen bg-gradient-to-r from-blue-200 via-blue-300 to-blue-400 flex items-center justify-center px-4">

        <!-- Card Login -->
        <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-10">

            <!-- Logo -->
            <div class="flex justify-center mb-8">
                <img src="{{ asset('logo.png') }}" alt="Logo" class="h-16">
            </div>

            <!-- Heading -->
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold text-gray-800">Welcome Back!</h2>
                <p class="text-sm text-gray-500 mt-2">Silakan login untuk melanjutkan.</p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-4 text-sm text-green-600">
                    {{ session('status') }}
                </div>
            @endif

            <!-- Form -->
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input id="email" name="email" type="email" required autofocus
                        class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-400 focus:border-blue-400 sm:text-sm"
                        value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input id="password" name="password" type="password" required autocomplete="current-password"
                        class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:ring-blue-400 focus:border-blue-400 sm:text-sm">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember & Forgot -->
                <div class="flex items-center justify-between text-sm">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" name="remember" type="checkbox"
                            class="rounded border-gray-300 text-blue-500 shadow-sm focus:ring-blue-400">
                        <span class="ml-2 text-gray-600">Remember me</span>
                    </label>
                    @if (Route::has('password.request'))
                        <a class="text-blue-500 hover:text-blue-800 hover:underline" href="{{ route('password.request') }}">
                            Forgot password?
                        </a>
                    @endif
                </div>

                <!-- Sign In Button -->
                <div>
                    <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-600 text-white py-3 text-lg font-semibold rounded-lg transition duration-150 cursor-pointer">
                        Sign in
                    </button>
                </div>

                <!-- Link Back to Home Page -->
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
