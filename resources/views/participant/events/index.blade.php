@extends('layouts.participant')

@section('title', 'Dashboard Partisipan')

@section('content')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">{{ __('Daftar Event Volunteer') }}</h3>
                    @if ($events->count() > 0)
                        <ul class="space-y-4">
                            @foreach ($events as $event)
                                <li>
                                    <a href="{{ route('participant.events.show', $event->id) }}" class="block hover:bg-gray-100 p-4 rounded-md">
                                        <h4 class="text-xl font-semibold">{{ $event->title }}</h4>
                                        <p class="text-gray-600">{{ \Illuminate\Support\Str::limit($event->description, 100) }}</p>
                                        <p class="text-sm text-gray-500 mt-2">{{ __('Mulai:') }} {{ $event->start_date }}</p>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                        <div class="mt-4">
                            {{ $events->links() }}
                        </div>
                    @else
                        <p>{{ __('Tidak ada event volunteer yang tersedia saat ini.') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection
