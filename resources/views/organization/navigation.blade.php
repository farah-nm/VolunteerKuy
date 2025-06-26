<nav class="bg-white shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <!-- Logo dan Judul -->
        <div class="flex items-center space-x-3">
            <img src="{{ asset('logo.png') }}" alt="Logo" class="w-10 h-10">
            <span class="font-bold text-xl text-blue-600">VolunteerKuy</span>
        </div>

        <!-- Menu Navigasi -->
        <div class="flex space-x-8 text-gray-700 font-medium">
            <a href="{{ route('organization.dashboard') }}" class="hover:text-blue-600">Dashboard</a>
            <a href="{{ route('organization.events.index') }}" class="hover:text-blue-600">Manajemen Event</a>
        </div>

        <!-- Dropdown Profil pakai Alpine -->
        <div class="relative" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
            <button class="flex items-center space-x-1 focus:outline-none">
                <span class="text-gray-800 font-semibold">{{ Auth::user()->name }}</span>
                <svg class="w-4 h-4 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path d="M19 9l-7 7-7-7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </button>

            <!-- Menu Dropdown -->
            <div
                x-show="open"
                x-transition
                class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-md z-50"
                @mouseenter="open = true" @mouseleave="open = false"
            >
                <a href="{{ route('organization.profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profil</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                </form>
            </div>
        </div>
    </div>
</nav>
