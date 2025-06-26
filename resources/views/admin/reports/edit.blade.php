@extends('layouts.admin')

@section('title', 'Ubah Status Laporan')

@section('content')
    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-xl font-semibold mb-4">Ubah Status Laporan</h2>
                    <form action="{{ route('admin.reports.update', $report->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Judul Laporan</label>
                            <input type="text" id="title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $report->title }}" readonly>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Deskripsi Laporan</label>
                            <textarea id="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" rows="5" readonly>{{ $report->description }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="supporting_evidence" class="block text-gray-700 text-sm font-bold mb-2">Bukti Pendukung</label>
                            @if ($report->supporting_evidence_path)
                                <p><a href="{{ $report->supporting_evidence_path }}" target="_blank">Lihat Bukti Pendukung</a></p>
                            @elseif ($report->supporting_evidence)
                                <p>{{ $report->supporting_evidence }}</p>
                            @else
                                <p>Tidak ada bukti pendukung.</p>
                            @endif
                        </div>

                        <div class="mb-4">
                            <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                            <select name="status" id="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="pending" {{ $report->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="processed" {{ $report->status === 'processed' ? 'selected' : '' }}>Diproses</option>
                                <option value="resolved" {{ $report->status === 'resolved' ? 'selected' : '' }}>Selesai</option>
                                <option value="rejected" {{ $report->status === 'rejected' ? 'selected' : '' }}>Ditolak</option>
                            </select>
                        </div>

                        <div class="flex items-center justify-between">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Simpan Perubahan</button>
                            <a href="{{ route('admin.reports.index') }}" class="inline-block align-baseline font-semibold text-sm text-blue-500 hover:text-blue-800">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
