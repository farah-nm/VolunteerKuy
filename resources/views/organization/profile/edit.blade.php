@extends('layouts.organization')

@section('title', 'Edit Profil Organisasi')

@section('content')
<div class="py-12">
    <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-6">Edit Profil Organisasi</h2>

            @if (session('success'))
                <div class="bg-green-200 text-green-800 p-3 rounded-md mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('organization.profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Kolom Kiri --}}
                    <div>
                        {{-- Nama Organisasi --}}
                        <label for="name" class="block text-sm font-bold mb-1">Nama Organisasi</label>
                        <input type="text" id="name" name="name"
                            value="{{ $organizationProfile->name ?? old('name') }}"
                            required
                            class="w-full px-3 py-2 border border-gray-300 bg-white rounded-md focus:outline-none focus:ring focus:border-blue-300">
                        @error('name') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror

                        {{-- Deskripsi --}}
                        <label for="description" class="block mt-4 text-sm font-bold mb-1">Deskripsi</label>
                        <textarea id="description" name="description" rows="4"
                            class="w-full px-3 py-2 border border-gray-300 bg-white rounded-md focus:outline-none focus:ring focus:border-blue-300">{{ $organizationProfile->description ?? old('description') }}</textarea>
                        @error('description') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror

                        {{-- Website --}}
                        <label for="website_url" class="block mt-4 text-sm font-bold mb-1">Website (Opsional)</label>
                        <input type="url" id="website_url" name="website_url"
                            value="{{ $organizationProfile->website_url ?? old('website_url') }}"
                            class="w-full px-3 py-2 border border-gray-300 bg-white rounded-md focus:outline-none focus:ring focus:border-blue-300">
                        @error('website_url') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                    </div>

                    {{-- Kolom Kanan --}}
                    <div>
                        {{-- Kota --}}
                        <label for="city" class="block text-sm font-bold mb-1">Kota</label>
                        <input type="text" id="city" name="city"
                            value="{{ $organizationProfile->city ?? old('city') }}"
                            required
                            class="w-full px-3 py-2 border border-gray-300 bg-white rounded-md focus:outline-none focus:ring focus:border-blue-300">
                        @error('city') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror

                        {{-- Provinsi --}}
                        <label for="province" class="block mt-4 text-sm font-bold mb-1">Provinsi</label>
                        <input type="text" id="province" name="province"
                            value="{{ $organizationProfile->province ?? old('province') }}"
                            required
                            class="w-full px-3 py-2 border border-gray-300 bg-white rounded-md focus:outline-none focus:ring focus:border-blue-300">
                        @error('province') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror

                        {{-- Kode Pos --}}
                        <label for="postal_code" class="block mt-4 text-sm font-bold mb-1">Kode Pos (Opsional)</label>
                        <input type="text" id="postal_code" name="postal_code"
                            value="{{ $organizationProfile->postal_code ?? old('postal_code') }}"
                            class="w-full px-3 py-2 border border-gray-300 bg-white rounded-md focus:outline-none focus:ring focus:border-blue-300">
                        @error('postal_code') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror

                        {{-- Nomor Telepon --}}
                        <label for="phone_number" class="block mt-4 text-sm font-bold mb-1">No. Telepon (Opsional)</label>
                        <input type="tel" id="phone_number" name="phone_number"
                            value="{{ $organizationProfile->phone_number ?? old('phone_number') }}"
                            class="w-full px-3 py-2 border border-gray-300 bg-white rounded-md focus:outline-none focus:ring focus:border-blue-300">
                        @error('phone_number') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror
                    </div>
                </div>

                {{-- Logo Upload --}}
                <div class="mt-6">
                    <label for="logo" class="block text-sm font-bold mb-1">Logo (Opsional)</label>
                    <input type="file" id="logo" name="logo"
                        class="w-full px-3 py-2 border border-gray-300 bg-white rounded-md focus:outline-none focus:ring focus:border-blue-300">
                    @error('logo') <p class="text-red-500 text-xs italic">{{ $message }}</p> @enderror

                    @if ($organizationProfile->logo_path)
                        <img src="{{ $organizationProfile->logo_path }}" alt="Logo Saat Ini"
                            class="mt-3 rounded-md" style="max-width: 150px;">
                    @endif
                </div>

                <div class="flex justify-end mt-6">
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded focus:outline-none">
                        Simpan Perubahan
                    </button>
                </div>

                <div class="mb-4 mt-4">
                    <a href="{{ route('organization.profile.show') }}"
                    class="text-blue-600 hover:underline font-semibold">
                    &larr; Kembali ke Profil
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
