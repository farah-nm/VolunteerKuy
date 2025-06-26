@extends('layouts.organization')

@section('title', 'Tambah Event Baru')

@section('content')
    {{-- @include('organization.navigation') --}}

    <div class="max-w-7xl mx-auto px-6 py-8">
        <h1 class="text-2xl font-bold mb-4">Tambah Event Baru</h1>

        <div class="bg-white rounded-xl shadow p-6">
            <form action="{{ route('organization.events.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @include('organization.events.partials._form')
                </div>

                <div class="flex justify-end mt-6">
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700 transition">
                        Tambah Event
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
