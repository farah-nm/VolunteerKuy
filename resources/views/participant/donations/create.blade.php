@extends('layouts.participant')

@section('title', 'Dashboard Partisipan')

@section('content')
    <div class="py-12">
        <div class="max-w-md mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('participant.donations.store') }}" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="volunteer_activity_id" value="{{ $event->id }}">


                        {{-- Pilih Organisasi atau Event --}}
                        {{-- <div class="mb-4">
                            <label for="organization_profile_id" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Donasi Kepada (Opsional)') }}</label>
                            <select id="organization_profile_id" name="organization_profile_id" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"> --}}
                        {{-- <option value="">{{ __('Pilih Organisasi') }}</option> --}}
                        {{-- Loop melalui daftar organisasi jika diperlukan --}}
                        {{-- </select> --}}
                        {{-- </div> --}}

                        {{-- Nominal Donasi --}}
                        <div class="mb-4">
                            <label for="amount" class="block text-gray-700 font-semibold mb-1">Nominal Donasi</label>
                            <input type="number" name="amount" id="amount" min="10000"
                                class="w-full border border-gray-300 rounded-md p-2" placeholder="Rp 10.000" required>
                            <p class="text-xs text-gray-500 mt-1">Min. donasi sebesar 10.000</p>
                            @error('amount')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Metode Pembayaran --}}
                        <div class="mb-4">
                            <label for="payment_method" class="block text-gray-700 font-semibold mb-1">Metode
                                Pembayaran</label>
                            <input type="text" name="payment_method" id="payment_method" value="QRIS" readonly
                                class="w-full border border-gray-300 rounded-md p-2 bg-gray-100 text-gray-700">
                        </div>

                        {{-- QR Code --}}
                        <div class="mb-4 flex justify-center">
                            <div>
                                <label class="block text-gray-700 font-semibold mb-1 text-center">QR Code</label>
                                <div id="qrcode" class="mx-auto"></div>
                            </div>
                        </div>

                        {{-- Deskripsi --}}
                        <div class="mb-4">
                            <label for="notes" class="block text-gray-700 font-semibold mb-1">Deskripsi</label>
                            <textarea name="notes" id="notes" rows="3" placeholder="Tulis catatan disini"
                                class="w-full border border-gray-300 rounded-md p-2"></textarea>
                            @error('notes')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Upload Bukti Pembayaran --}}
                        <div class="mb-4">
                            <label for="proof" class="block text-gray-700 font-semibold mb-1">Upload Bukti
                                Pembayaran</label>
                            <input type="file" name="proof" id="proof"
                                class="w-full border border-gray-300 rounded-md p-2 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:bg-blue-50 file:text-blue-700"
                                accept=".jpg,.jpeg,.png,.pdf" required>
                            @error('proof')
                                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex items-center justify-end">
                            <button type="submit"
                                class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">{{ __('Donasi') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/qrcodejs/qrcode.min.js"></script>
<script>
    const amountInput = document.getElementById('amount');
    const qrCodeContainer = document.getElementById('qrcode');
    let qr;

    amountInput.addEventListener('input', function () {
        const value = this.value;

        // Hapus QR lama
        qrCodeContainer.innerHTML = '';

        if (value >= 10000) {
            const qrText = `Donasi yang akan dilakukan sebesar Rp ${parseInt(value).toLocaleString('id-ID')}`;
            qr = new QRCode(qrCodeContainer, {
                text: qrText,
                width: 128,
                height: 128,
                colorDark : "#000000",
                colorLight : "#ffffff",
                correctLevel : QRCode.CorrectLevel.H
            });
        }
    });
</script>


@endsection
