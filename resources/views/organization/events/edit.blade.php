@extends('layouts.organization')

@section('title', 'Edit Event')

@section('content')
    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-xl font-semibold mb-4">Edit Event</h2>
                    <form action="{{ route('organization.events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        @include('organization.events.partials._form', ['event' => $event])
                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-500 hover:bg-green-700 text-white font-bold rounded-md focus:outline-none focus:shadow-outline">
                                Update Event
                            </button>
                            <a href="{{ route('organization.events.index') }}" class="inline-block ml-2 align-baseline font-semibold text-sm text-blue-500 hover:text-blue-800">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
