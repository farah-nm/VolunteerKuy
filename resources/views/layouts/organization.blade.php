<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'OrganisasiKu')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex">

    <!-- Sidebar Kiri -->
    <aside class="w-64 bg-sky-500 text-white min-h-screen p-6">
        <div class="text-2xl font-bold mb-8">OrganisasiKu</div>
        <nav class="flex flex-col space-y-4 text-sm">
            <a href="{{ route('organization.dashboard') }}" class="{{ request()->routeIs('organization.dashboard') ? 'underline font-semibold' : 'hover:underline' }}">
                Dashboard
            </a>
            <a href="{{ route('organization.events.index') }}" class="{{ request()->routeIs('organization.events.*') ? 'underline font-semibold' : 'hover:underline' }}">
                Event
            </a>
            <a href="{{ route('organization.volunteers.index') }}" class="{{ request()->routeIs('organization.volunteers.*') ? 'underline font-semibold' : 'hover:underline' }}">
                Relawan
            </a>
            <a href="{{ route('organization.donations.index') }}" class="{{ request()->routeIs('organization.donations.*') ? 'underline font-semibold' : 'hover:underline' }}">
                Donasi
            </a>
            <a href="{{ route('organization.profile.edit') }}" class="{{ request()->routeIs('organization.profile.edit') ? 'underline font-semibold' : 'hover:underline' }}">
                Profil
            </a>
            <form method="POST" action="{{ route('logout') }}" class="mt-6">
                @csrf
                <button class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm w-full">Logout</button>
            </form>
        </nav>
    </aside>

    <!-- Konten Utama -->
    <main class="flex-1 p-8">
        @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

</body>
</html>
