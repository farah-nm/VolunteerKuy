@extends('layouts.participant')

@section('title', 'Form Pendaftaran Relawan')

@section('content')
{{-- <div class="max-w-7xl mx-auto mt-10 grid grid-cols-1 lg:grid-cols-3 gap-6"> --}}
<div class="flex justify-center mt-10 px-4">
    {{-- ========== FORM ========== --}}
{{--
    <div class="lg:col-span-2 bg-white p-8 rounded-lg shadow">
        <h2 class="text-xl font-bold mb-6">Form Pendaftaran Relawan</h2> --}}
    <div class="w-full max-w-2xl bg-white p-8 rounded-lg shadow">
        <a href="{{ route('participant.events.show', ['event' => $event->id]) }}"
            class="inline-flex items-center text-sm text-blue-600 hover:underline mb-4">
            ← Kembali
        </a>

        <h2 class="text-xl font-bold mb-6 text-center">Form Pendaftaran Relawan</h2>

        <form method="POST"
              action="{{ route('participant.volunteer-registrations.store') }}">
            @csrf
            <input type="hidden" name="event_id" value="{{ $event->id }}">

            {{-- Nama / Email / Telepon (readonly) --}}
            {{-- <x-display-field label="Nama Lengkap" :value="auth()->user()->name"/>
            <x-display-field label="Email"        :value="auth()->user()->email"/>
            <x-display-field label="Nomor Telepon"
                             :value="auth()->user()->participantProfile->phone ?? '-'"/> --}}
            {{-- ditambahin el --}}
            {{-- Nama Lengkap --}}
            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1">Nama Lengkap</label>
                <input type="text" value="{{ auth()->user()->name }}" readonly
                    class="w-full border border-gray-300 rounded-md p-2 bg-gray-100">
            </div>
            {{-- Email --}}
            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1">Email</label>
                <input type="text" value="{{ auth()->user()->email }}" readonly
                    class="w-full border border-gray-300 rounded-md p-2 bg-gray-100">
                </div>
            {{-- Nomor Telepon --}}
            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1">Nomor Telepon</label>
                <input type="text"
                value="{{ auth()->user()->participantProfile->phone ?? '-' }}" readonly
                class="w-full border border-gray-300 rounded-md p-2 bg-gray-100">
            </div>
            {{-- nyoba baru ditambahin el, ini yang bisa di otak atik isinya--}}
            {{-- Nama Lengkap --}}
            {{-- <div class="mb-4">
                <label class="block text-sm font-semibold mb-1">Nama Lengkap</label>
                <input type="text" name="name" value="{{ auth()->user()->name }}"
                class="w-full border border-gray-300 rounded-md p-2">
            </div> --}}

            {{-- Email --}}
            {{-- <div class="mb-4">
                <label class="block text-sm font-semibold mb-1">Email</label>
                <input type="email" name="email" value="{{ auth()->user()->email }}"
                class="w-full border border-gray-300 rounded-md p-2">
            </div> --}}

            {{-- Nomor Telepon --}}
            {{-- <div class="mb-4">
                <label class="block text-sm font-semibold mb-1">Nomor Telepon</label>
                <input type="text" name="phone" value="{{ auth()->user()->participantProfile->phone ?? '' }}"
                class="w-full border border-gray-300 rounded-md p-2">
            </div> --}}

            {{-- Motivasi --}}
            {{-- <div class="mb-4">
                <label class="block text-sm font-semibold mb-1" for="motivation">
                    * Alasan Anda tertarik bergabung
                </label>
                <textarea id="motivation" name="motivation" rows="3" required
                          class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-400">{{ old('motivation') }}</textarea>
            </div> --}}
            {{-- ditambahin el --}}
            <div class="mb-4">
                <label class="block text-sm font-semibold mb-1" for="motivation">
                    * Alasan Anda tertarik bergabung
                </label>
                <textarea id="motivation" name="motivation" rows="3" required
                class="w-full border border-gray-300 rounded-md p-2 focus:ring-blue-400">{{ old('motivation') }}</textarea>
            </div>

            {{-- Persetujuan --}}
            <div class="mb-6">
                <label class="inline-flex items-center">
                    <input type="checkbox" required class="mr-2">
                    <span class="text-sm">Saya bersedia mengikuti ketentuan yang berlaku.</span>
                </label>
            </div>

            <button type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded">
                Kirim Formulir Pendaftaran
            </button>
        </form>
    </div>

    {{-- ========== RINGKASAN EVENT ========== --}}
    {{-- ditambahin el --}}
    {{-- <div class="bg-white p-6 rounded-lg shadow space-y-4">
        <img src="{{ $event->banner_image_path ?? asset('images/default-banner.jpg') }}"
             alt="{{ $event->title }}" class="w-full h-40 object-cover rounded-md">

        <h3 class="text-lg font-semibold">{{ $event->title }}</h3>

        <x-event-summary :event="$event"/>
    </div> --}}
</div>
@endsection
