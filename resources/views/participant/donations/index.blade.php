<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Riwayat Donasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">{{ __('Riwayat Donasi Anda') }}</h3>
                    @if ($donations->count() > 0)
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Tanggal') }}</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Jumlah') }}</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Kepada') }}</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Metode') }}</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">{{ __('Catatan') }}</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($donations as $donation)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $donation->donation_date }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">Rp {{ number_format($donation->amount) }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $donation->organizationProfile->name ?? '-' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $donation->payment_method ?? '-' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $donation->notes ?? '-' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="mt-4">
                            {{ $donations->links() }}
                        </div>
                    @else
                        <p>{{ __('Anda belum melakukan donasi.') }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
