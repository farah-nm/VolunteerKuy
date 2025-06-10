@extends('layouts.organization')

@section('title', 'Edit Profil Organisasi')

@section('content')
    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-xl font-semibold mb-4">Edit Profil Organisasi</h2>
                    @if (session('success'))
                        <div class="bg-green-200 text-green-800 p-3 rounded-md mb-4">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form action="{{ route('organization.profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama Organisasi</label>
                            <input type="text" id="name" name="name" value="{{ $organizationProfile->name ?? old('name') }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('name')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi</label>
                            <textarea id="description" name="description" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $organizationProfile->description ?? old('description') }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Alamat</label>
                            <textarea id="address" name="address" rows="3" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $organizationProfile->address ?? old('address') }}</textarea>
                            @error('address')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="city" class="block text-gray-700 text-sm font-bold mb-2">Kota</label>
                            <input type="text" id="city" name="city" value="{{ $organizationProfile->city ?? old('city') }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('city')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="province" class="block text-gray-700 text-sm font-bold mb-2">Provinsi</label>
                            <input type="text" id="province" name="province" value="{{ $organizationProfile->province ?? old('province') }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('province')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="postal_code" class="block text-gray-700 text-sm font-bold mb-2">Kode Pos (Opsional)</label>
                            <input type="text" id="postal_code" name="postal_code" value="{{ $organizationProfile->postal_code ?? old('postal_code') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('postal_code')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="phone_number" class="block text-gray-700 text-sm font-bold mb-2">Nomor Telepon (Opsional)</label>
                            <input type="tel" id="phone_number" name="phone_number" value="{{ $organizationProfile->phone_number ?? old('phone_number') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('phone_number')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="website_url" class="block text-gray-700 text-sm font-bold mb-2">Website (Opsional)</label>
                            <input type="url" id="website_url" name="website_url" value="{{ $organizationProfile->website_url ?? old('website_url') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('website_url')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="mb-4">
                            <label for="logo" class="block text-gray-700 text-sm font-bold mb-2">Logo (Opsional)</label>
                            <input type="file" id="logo" name="logo" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            @error('logo')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                            @if ($organizationProfile->logo_path)
                                <img src="{{ $organizationProfile->logo_path }}" alt="Current Logo" class="mt-2 rounded-md" style="max-width: 200px;">
                            @endif
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update Profil</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
