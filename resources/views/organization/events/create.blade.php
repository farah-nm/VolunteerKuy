@extends('layouts.organization')

@section('title', 'Tambah Event Baru')

@section('content')
    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-xl font-semibold mb-4">Tambah Event Baru</h2>
                    <form action="{{ route('organization.events.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @include('organization.events.partials._form')
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white font-bold rounded-md focus:outline-none focus:shadow-outline">
                                Tambah Event
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
