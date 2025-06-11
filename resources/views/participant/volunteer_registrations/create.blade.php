<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Sebagai Relawan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('participant.volunteer-registrations.store') }}">
                        @csrf

                        <input type="hidden" name="event_id" value="{{ $event->id }}">

                        <div class="mb-4">
                            <label for="event_name" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Nama Event') }}</label>
                            <input type="text" id="event_name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $event->title ?? '' }}" readonly>
                        </div>

                        <div class="mb-4">
                            <label for="motivation" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Motivasi (Opsional)') }}</label>
                            <textarea id="motivation" name="motivation" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('motivation') }}</textarea>
                            @error('motivation')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-between">
                            <a href="{{ route('participant.events.show', $event->id ?? '') }}" class="inline-block align-baseline font-semibold text-sm text-blue-500 hover:text-blue-800">{{ __('Kembali ke Detail Event') }}</a>
                            <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ __('Daftar') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
