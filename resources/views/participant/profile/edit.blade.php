@extends('layouts.participant')

@section('title', 'Edit Profil Partisipan')

@section('content')
    <div class="py-12 bg-gray-50">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-6">

                <h2 class="text-2xl font-bold text-gray-800 mb-6">Edit Profil</h2>

                {{-- Error Message --}}
                @if ($errors->any())
                    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded text-sm text-red-700">
                        <ul class="list-disc list-inside space-y-1">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('participant.profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Username --}}
                        <div>
                            <x-input-label for="name" :value="__('Username')" />
                            <x-text-input id="name" type="text" name="name" class="mt-1 block w-full"
                                value="{{ old('name', auth()->user()->name) }}" required />
                        </div>

                        {{-- Email --}}
                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" type="email" name="email" class="mt-1 block w-full"
                                value="{{ old('email', auth()->user()->email) }}" required />
                        </div>

                        {{-- Full Name --}}
                        <div>
                            <x-input-label for="full_name" :value="__('Nama Lengkap')" />
                            <x-text-input id="full_name" type="text" name="full_name" class="mt-1 block w-full"
                                value="{{ old('full_name', $participantProfile->full_name ?? '') }}" required />
                        </div>

                        {{-- Tanggal Lahir --}}
                        <div>
                            <x-input-label for="date_of_birth" :value="__('Tanggal Lahir')" />
                            <x-text-input id="date_of_birth" type="date" name="date_of_birth" class="mt-1 block w-full"
                                value="{{ old('date_of_birth', $participantProfile->date_of_birth ?? '') }}" />
                        </div>

                        {{-- Gender --}}
                        <div>
                            <x-input-label for="gender" :value="__('Jenis Kelamin')" />
                            <select id="gender" name="gender" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                                <option value="">-- Pilih --</option>
                                <option value="male" {{ old('gender', $participantProfile->gender ?? '') == 'male' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="female" {{ old('gender', $participantProfile->gender ?? '') == 'female' ? 'selected' : '' }}>Perempuan</option>
                                <option value="other" {{ old('gender', $participantProfile->gender ?? '') == 'other' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                        </div>

                        {{-- No HP --}}
                        <div>
                            <x-input-label for="phone_number" :value="__('No. HP')" />
                            <x-text-input id="phone_number" type="text" name="phone_number" class="mt-1 block w-full"
                                value="{{ old('phone_number', $participantProfile->phone_number ?? '') }}" />
                        </div>

                        {{-- Kota --}}
                        <div>
                            <x-input-label for="city" :value="__('Kota')" />
                            <x-text-input id="city" type="text" name="city" class="mt-1 block w-full"
                                value="{{ old('city', $participantProfile->city ?? '') }}" />
                        </div>

                        {{-- Provinsi --}}
                        <div>
                            <x-input-label for="province" :value="__('Provinsi')" />
                            <x-text-input id="province" type="text" name="province" class="mt-1 block w-full"
                                value="{{ old('province', $participantProfile->province ?? '') }}" />
                        </div>
                    </div>

                    {{-- Alamat --}}
                    <div class="mt-6">
                        <x-input-label for="address" :value="__('Alamat')" />
                        <textarea id="address" name="address" rows="3"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('address', $participantProfile->address ?? '') }}</textarea>
                    </div>

                    {{-- Upload Foto --}}
                    <div class="mt-6">
                        <x-input-label for="profile_picture_path" :value="__('Foto Profil')" />
                        <input type="file" name="profile_picture_path" id="profile_picture_path"
                               class="block w-full mt-1 border border-gray-300 rounded-md" accept="image/*">

                        @if (!empty($participantProfile->profile_picture_path))
                            <img src="{{ asset('storage/' . $participantProfile->profile_picture_path) }}"
                                 class="mt-4 w-24 h-24 rounded-full object-cover shadow" alt="Foto Saat Ini">
                        @endif
                    </div>

                    {{-- Tombol Simpan --}}
                    <div class="mt-6 flex justify-end">
                        <x-primary-button class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold py-2 px-4 rounded shadow">{{ __('Simpan') }}</x-primary-button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
