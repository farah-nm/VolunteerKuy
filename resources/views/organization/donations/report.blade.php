@extends('layouts.organization')

@section('title', 'Upload Laporan Donasi')

@section('content')
<div class="py-12">
    <div class="max-w-xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-xl font-bold mb-4">Upload Laporan Penggunaan Donasi</h1>

        <form action="{{ route('organization.donations.report.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="event_id" class="block text-sm font-medium text-gray-700">Pilih Event</label>
                <select name="event_id" id="event_id" class="w-full border-gray-300 rounded mt-1">
                    @foreach($events as $event)
                        <option value="{{ $event->id }}">{{ $event->title }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="report_file" class="block text-sm font-medium text-gray-700">Unggah Laporan (.pdf, .docx)</label>
                <input type="file" name="report_file" id="report_file" class="mt-1 w-full border-gray-300 rounded" accept=".pdf,.docx">
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                    Upload
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
