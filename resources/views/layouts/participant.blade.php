<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'VolunteerKuy – Partisipan')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

    {{-- ########## NAVBAR ########## --}}
    <nav class="bg-white shadow-sm">
        <div class="max-w-7xl mx-auto flex items-center justify-between px-8 py-4">

            {{-- Logo + menu kiri --}}
            <div class="flex items-center space-x-10">
                <a href="{{ route('participant.dashboard') }}">
                    <img src="{{ asset('logo.png') }}" alt="Logo" class="h-9 w-9 rounded-full object-cover">
                </a>

                <a href="{{ route('participant.dashboard') }}"
                   class="text-gray-800 font-semibold hover:text-blue-600">
                    Dashboard
                </a>

                <a href="{{ route('participant.events.index') }}"
                   class="text-gray-600 hover:text-blue-600">
                    Event Volunteer
                </a>

                <a href="{{ route('participant.organizations.search') }}"
                   class="text-gray-600 hover:text-blue-600">
                    Cari Organisasi
                </a>
            </div>

            {{-- Dropdown nama user kanan --}}
            <div class="relative" x-data="{ open: false }">
                <button @click="open = !open" class="flex items-center space-x-1 text-gray-700 font-medium focus:outline-none">
                    <span>{{ Auth::user()->name }}</span>
                    <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                    </svg>
                </button>

                {{-- Dropdown menu --}}
                <div x-show="open" @click.away="open = false"
                     x-transition
                     class="absolute right-0 mt-2 w-48 bg-white border rounded shadow-md z-50">
                    <a href="{{ route('participant.profile.show') }}"
                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                        Profil
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                                class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            Logout
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </nav>
    {{-- ########## END NAVBAR ########## --}}

    {{-- Konten halaman --}}
    <main class="py-12">
        <div class="max-w-7xl mx-auto px-6">
            @yield('content')
        </div>
    </main>

</body>
</html>
