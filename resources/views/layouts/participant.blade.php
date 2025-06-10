<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'VolunteerKuy - Partisipan')</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>

    @vite(['resources/js/app.js'])
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        <nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex">
                        <div class="shrink-0 flex items-center">
                            <a href="{{ route('participant.dashboard') }}">
                                <svg viewBox="0 0 316 316" class="block h-9 w-auto fill-current text-gray-800"><path d="M88.2 202.9l15.7-18.1c1-1.1 2.8-1.1 3.8 0l15.7 18.1c1 1.2 2.8 1.2 3.8 0l15.7-18.1c1-1.1 2.8-1.1 3.8 0l15.7 18.1c1 1.2 2.8 1.2 3.8 0l15.7-18.1c1-1.1 2.8-1.1 3.8 0l15.7 18.1c1 1.2 2.8 1.2 3.8 0l15.7-18.1c1-1.1 2.8-1.1 3.8 0l15.7 18.1c1 1.2 2.8 1.2 3.8 0l15.7-18.1c1-1.1 2.8-1.1 3.8 0l15.7 18.1c1 1.2 2.8 1.2 3.8 0L227.8 113c-1-1.1-2.8-1.1-3.8 0l-15.7 18.1c-1 1.2-2.8 1.2-3.8 0l-15.7-18.1c-1-1.1-2.8-1.1-3.8 0l-15.7 18.1c-1 1.2-2.8 1.2-3.8 0l-15.7-18.1c-1-1.1-2.8-1.1-3.8 0l-15.7 18.1c-1 1.2-2.8 1.2-3.8 0l-15.7-18.1c-1-1.1-2.8-1.1-3.8 0l-15.7 18.1c-1 1.2-2.8 1.2-3.8 0L88.2 202.9zM157.9 13.9c-7.1 0-13.4 4.1-15.7 10.4L88.2 83c-2.3 6.3-7.4 10.4-13.4 10.4H31.6c-10 0-15.7-13.9-10.4-24.2L147.5 13.9c2.3-6.3 7.4-10.4 13.4-10.4 10 0 15.7 13.9 10.4 24.2L41.9 69.2c2.3 6.3 7.4 10.4 13.4 10.4h67.1c10 0 15.7 13.9 10.4 24.2L168.2 13.9c-2.3-6.3-7.4-10.4-13.4-10.4zM284.4 302.1c7.1 0 13.4-4.1 15.7-10.4l54-58.7c2.3-6.3 7.4-10.4 13.4-10.4h56.6c10 0 15.7 13.9 10.4 24.2l-54 58.7c-2.3 6.3-7.4 10.4-13.4 10.4h-56.6c-10 0-15.7-13.9-10.4-24.2l54-58.7c2.3 6.3 7.4 10.4 13.4 10.4h67.1c10 0 15.7 13.9 10.4 24.2l-54 58.7c-2.3 6.3-7.4 10.4-13.4 10.4h-67.1c-10 0-15.7-13.9-10.4-24.2l54-58.7c2.3 6.3 7.4 10.4 13.4 10.4H284.4z"/></svg>
                            </a>
                        </div>

                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                            <a href="{{ route('participant.dashboard') }}" class="inline-flex items-center px-1 pt-2.5 border-b-2 border-indigo-400 text-sm font-medium leading-5 text-gray-900 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out">
                                {{ __('Dashboard') }}
                            </a>
                            <a href="{{ route('participant.events.index') }}" class="inline-flex items-center px-1 pt-2.5 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                {{ __('Event Volunteer') }}
                            </a>
                            <a href="{{ route('participant.donations.index') }}" class="inline-flex items-center px-1 pt-2.5 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                {{ __('Donasi') }}
                            </a>
                            <a href="{{ route('participant.reports.index') }}" class="inline-flex items-center px-1 pt-2.5 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                {{ __('Laporan Saya') }}
                            </a>
                        </div>
                    </div>

                    <div class="hidden sm:flex sm:items-center sm:ml-6">
                        <div class="ml-3 relative">
                            <x-dropdown align="right" width="48">
                                <x-slot name="trigger">
                                    <span class="inline-flex rounded-md">
                                        <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                            {{ Auth::user()->name }}

                                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </span>
                                </x-slot>

                                <x-slot name="content">
                                    <x-dropdown-link href="{{ route('participant.profile.edit') }}">
                                        {{ __('Edit Profil') }}
                                    </x-dropdown-link>

                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link href="{{ route('logout') }}"
                                                             onclick="event.preventDefault();
                                                                         this.closest('form').submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    </div>

                    <div class="-mr-2 flex items-center sm:hidden">
                        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link href="{{ route('participant.dashboard') }}" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="{{ route('participant.events.index') }}" :active="request()->routeIs('events.index')">
                        {{ __('Event Volunteer') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="{{ route('participant.donations.index') }}" :active="request()->routeIs('donations.index')">
                        {{ __('Donasi') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link href="{{ route('participant.reports.index') }}" :active="request()->routeIs('reports.index')">
                        {{ __('Laporan Saya') }}
                    </x-responsive-nav-link>
                </div>

                <div class="pt-4 pb-1 border-t border-gray-200">
                    <div class="px-4">
                        <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                    </div>

                    <div class="mt-3 space-y-1">
                        <x-responsive-nav-link href="{{ route('participant.profile.edit') }}">
                            {{ __('Edit Profil') }}
                        </x-responsive-nav-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-responsive-nav-link href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-responsive-nav-link>
                        </form>
                    </div>
                </div>
            </div>
        </nav>

        <main>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>
</html>
