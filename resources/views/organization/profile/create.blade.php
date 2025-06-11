@extends('layouts.organization')

@section('title', 'Buat Profil Organisasi')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Buat Profil Organisasi</h1>

    <form method="POST" action="{{ route('organization.profile.store') }}">
        @csrf

        <div class="mb-4">
            <label class="block mb-2">Nama Organisasi</label>
            <input type="text" name="name" class="w-full border p-2" required>
        </div>

        <!-- Tambahkan field lain sesuai kebutuhan -->

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Simpan</button>
    </form>
@endsection
