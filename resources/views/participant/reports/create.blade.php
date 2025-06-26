@extends('layouts.participant')

@section('title', 'Dashboard Partisipan')

@section('content')
    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{ route('participant.organizations.report.store', ['organization' => $organization->id])}}" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <x-input-label for="title" :value="__('Judul Laporan')" />
                            <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" required autofocus />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="reason" :value="__('Alasan Melaporkan')" />
                            <textarea id="reason" name="reason" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
                            <x-input-error :messages="$errors->get('reason')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="supporting_evidence" :value="__('Bukti Pendukung (Opsional)')" />
                            <input type="file" id="supporting_evidence" name="supporting_evidence" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <x-input-error :messages="$errors->get('supporting_evidence')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Kirim Laporan') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
