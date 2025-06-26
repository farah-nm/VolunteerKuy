<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'OrganisasiKu')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">

    {{-- Panggil navbar dari folder organization --}}
    @include('organization.navigation')

    <main class="flex-1 p-8">
        {{-- @if(session('success'))
            <div class="bg-green-100 border border-green-300 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif --}}

        @yield('content')
    </main>

</body>
</html>
