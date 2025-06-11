<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $event->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">{{ __('Detail Event') }}</h3>
                    <p class="mb-2"><span class="font-semibold">{{ __('Deskripsi:') }}</span> {{ $event->description }}</p>
                    <p class="mb-2"><span class="font-semibold">{{ __('Lokasi:') }}</span> {{ $event->location_address }}, {{ $event->location_city }}, {{ $event->location_province }}</p>
                    <p class="mb-2"><span class="font-semibold">{{ __('Mulai:') }}</span> {{ $event->start_date }}</p>
                    <p class="mb-2"><span class="font-semibold">{{ __('Berakhir:') }}</span> {{ $event->end_date }}</p>
                    @if ($event->slots_available !== null)
                        <p class="mb-2"><span class="font-semibold">{{ __('Slot Tersedia:') }}</span> {{ $event->slots_available }}</p>
                    @endif
                    <p class="mb-2"><span class="font-semibold">{{ __('Batas Akhir Pendaftaran:') }}</span> {{ $event->registration_deadline }}</p>
                    <p class="mb-2"><span class="font-semibold">{{ __('Kontak:') }}</span> {{ $event->contact_email }} @if($event->contact_phone) ({{ $event->contact_phone }}) @endif</p>

                    <div class="mt-4">
                        <a href="{{ route('participant.events.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ __('Kembali ke Daftar Event') }}</a>
                        <a href="{{ route('participant.volunteer-registrations.create', ['event' => $event->id]) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-2">{{ __('Daftar Sebagai Relawan') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
