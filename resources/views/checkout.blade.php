@extends('layouts.app')
@section('content')
    <div class="bg-gray-50 min-h-screen py-10">
        <div class="container mx-auto px-6 max-w-xl">

            <h1 class="text-3xl font-bold text-gray-800 mb-6">Langkah Donasi Cepat</h1>

            @if (session('error'))
                <div class="p-4 mb-4 text-sm text-hati-red bg-red-100 rounded-lg" role="alert">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white p-8 rounded-2xl shadow-xl border border-saku-primary/20">
                <h2 class="text-xl font-bold mb-4 text-saku-primary"><i class="fas fa-hand-holding-heart mr-2"></i> Donasi
                    untuk:</h2>
                <p class="text-2xl font-extrabold text-gray-900 mb-6">{{ $program->title }}</p>

                <form action="{{ route('process.donation', $program->id) }}" method="POST">
                    @csrf

                    <div class="mb-6">
                        <label for="amount" class="block text-sm font-medium text-gray-700 mb-2">Masukkan Jumlah Donasi
                            (Min. Rp 10.000)</label>
                        <div class="relative rounded-md shadow-sm">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 sm:text-sm">Rp</span>
                            </div>
                            <input type="number" name="amount" id="amount"
                                class="focus:ring-saku-primary focus:border-saku-primary block w-full pl-12 pr-4 sm:text-sm border-gray-300 rounded-lg p-3"
                                placeholder="100000" min="10000" required>
                        </div>
                        @error('amount')
                            <p class="mt-2 text-sm text-hati-red">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-3 mb-6">
                        <h3 class="font-bold text-gray-800">Pilih Nominal Cepat:</h3>
                        <div class="grid grid-cols-3 gap-3">
                            @foreach ([50000, 100000, 250000, 500000, 1000000, 5000000] as $preset)
                                <button type="button"
                                    onclick="document.getElementById('amount').value = {{ $preset }}"
                                    class="bg-teal-50 text-saku-dark font-semibold py-2 rounded-lg border border-teal-100 hover:bg-teal-100 transition text-sm">
                                    Rp {{ number_format($preset, 0, ',', '.') }}
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-700 mb-3">
                            Pilih Metode Pembayaran
                        </label>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">

                            {{-- QRIS --}}
                            <label
                                class="flex items-center gap-3 border rounded-lg px-4 py-3 cursor-pointer hover:border-saku-primary transition shadow-sm bg-white">
                                <input type="radio" name="payment_method" value="qris" required
                                    class="text-saku-primary">
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-qrcode text-saku-primary text-lg"></i>
                                    <span class="font-medium text-gray-800">QRIS</span>
                                </div>
                            </label>

                            {{-- Bank Transfer --}}
                            <label
                                class="flex items-center gap-3 border rounded-lg px-4 py-3 cursor-pointer hover:border-saku-primary transition shadow-sm bg-white">
                                <input type="radio" name="payment_method" value="bank_transfer" class="text-saku-primary">
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-university text-blue-600 text-lg"></i>
                                    <span class="font-medium text-gray-800">Transfer Bank</span>
                                </div>
                            </label>

                            {{-- E-wallet --}}
                            <label
                                class="flex items-center gap-3 border rounded-lg px-4 py-3 cursor-pointer hover:border-saku-primary transition shadow-sm bg-white">
                                <input type="radio" name="payment_method" value="e_wallet" class="text-saku-primary">
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-wallet text-green-600 text-lg"></i>
                                    <span class="font-medium text-gray-800">E-Wallet</span>
                                </div>
                            </label>

                            {{-- Card --}}
                            <label
                                class="flex items-center gap-3 border rounded-lg px-4 py-3 cursor-pointer hover:border-saku-primary transition shadow-sm bg-white">
                                <input type="radio" name="payment_method" value="card" class="text-saku-primary">
                                <div class="flex items-center gap-2">
                                    <i class="fas fa-credit-card text-yellow-600 text-lg"></i>
                                    <span class="font-medium text-gray-800">Kartu Debit/Kredit</span>
                                </div>
                            </label>

                        </div>

                        @error('payment_method')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mt-8">
                        <button type="submit"
                            class="w-full bg-hati-red text-white py-3 rounded-xl font-bold text-lg hover:bg-red-700 transition shadow-lg shadow-red-200">
                            Bayar Sekarang & Donasi
                        </button>
                        <p class="text-xs text-gray-500 mt-3 text-center">Anda akan diarahkan ke halaman pembayaran virtual
                            (simulasi).</p>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
