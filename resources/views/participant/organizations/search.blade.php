@extends('layouts.participant')

@section('title', 'Dashboard Partisipan')

@section('content')
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('participant.organizations.search') }}" method="GET">
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Cari Nama Organisasi') }}</label>
                            <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <div class="mb-4">
                            <label for="location" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Lokasi (Kota/Provinsi)') }}</label>
                            <input type="text" name="location" id="location" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ __('Telusuri') }}</button>
                    </form>

                    <div class="mt-6">
                        @if (isset($organizations))
                            <h3 class="text-lg font-semibold mb-4">{{ __('Hasil Pencarian') }}</h3>
                            {{-- dd(gettype($organizations)); --}}
                            @if ($organizations instanceof \Illuminate\Pagination\LengthAwarePaginator && $organizations->count() > 0)
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                    @foreach ($organizations as $organization)
                                        <div class="bg-white shadow-sm rounded-lg overflow-hidden">
                                            <div class="p-4">
                                                @if ($organization->logo_path)
                                                    <img src="{{ $organization->logo_path }}" alt="{{ $organization->name }}" class="w-20 h-20 object-cover rounded-full mx-auto">
                                                @endif
                                                <h4 class="text-center font-semibold mt-2">{{ $organization->name }}</h4>
                                                <p class="text-center text-gray-600 text-sm">{{ $organization->city }}, {{ $organization->province }}</p>
                                                {{-- Anda perlu menghitung total event dan partisipan untuk organisasi ini --}}
                                                {{-- <p class="text-center text-gray-500 text-xs mt-1">Total Event: {{ $organization->volunteer_activities->count() }}</p>
                                                <p class="text-center text-gray-500 text-xs">Total Partisipan: {{ $organization->volunteer_activities->flatMap->applications->count() }}</p> --}}
                                                <div class="mt-2 text-center">
                                                    <a href="{{ route('participant.organizations.show', $organization->id) }}" class="inline-block bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline text-xs">{{ __('Lihat Detail') }}</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="mt-4">
                                    {{ $organizations->links() }}
                                </div>
                            @else
                                <p>{{ __('Tidak ada organisasi yang ditemukan dengan kriteria tersebut.') }}</p>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
