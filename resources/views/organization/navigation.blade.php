<!-- layouts/organization.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title') | OrganisasiKu</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-blue-700 text-white px-6 py-8 space-y-6">
        <h1 class="text-2xl font-bold">OrganisasiKu</h1>

        <nav class="space-y-2">
            <a href="{{ route('organization.dashboard') }}" class="block py-2 px-3 rounded hover:bg-blue-600">Dashboard</a>
            <a href="{{ route('organization.events.index') }}" class="block py-2 px-3 rounded hover:bg-blue-600">Manajemen Event</a>
            <a href="{{ route('organization.volunteers.index') }}" class="block py-2 px-3 rounded hover:bg-blue-600">Manajemen Relawan</a>
            <a href="{{ route('organization.donations.index') }}" class="block py-2 px-3 rounded hover:bg-blue-600">Manajemen Donasi</a>
            <a href="{{ route('organization.profile') }}" class="block py-2 px-3 rounded hover:bg-blue-600">Profil Organisasi</a>
        </nav>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full mt-6 bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded">
                Logout
            </button>
        </form>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8">
        <h2 class="text-xl font-semibold mb-4">Selamat datang, {{ Auth::user()->name }}!</h2>
        @yield('content')
    </main>
</body>
</html>
