@extends('layouts.app')
@section('content')

<div class="bg-white min-h-screen py-20 flex items-center justify-center">
    <div class="container mx-auto px-6 max-w-xl text-center">

        <div class="p-10 bg-white rounded-2xl shadow-2xl border border-green-100">
            <div class="w-24 h-24 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-check-circle text-5xl"></i>
            </div>

            <h1 class="text-3xl font-extrabold text-green-700 mb-3">Donasi Berhasil!</h1>

            @if(session('success'))
            <p class="text-lg text-gray-700 mb-6">{{ session('success') }}</p>
            @endif

            <p class="text-sm text-gray-500 mb-8">Kode Pelacakan Anda: <span class="font-mono font-bold text-saku-primary">{{ request('code') }}</span></p>

            <a href="{{ route('dashboard') }}" class="inline-block bg-saku-primary text-white px-6 py-3 rounded-xl font-bold hover:bg-saku-dark transition shadow-md">
                <i class="fas fa-tachometer-alt mr-2"></i> Lihat Dasbor Saya
            </a>

            <a href="{{ route('home') }}" class="inline-block text-saku-primary border border-saku-primary px-6 py-3 rounded-xl font-bold hover:bg-teal-50 transition ml-3">
                Kembali ke Beranda
            </a>
        </div>

    </div>
</div>
@endsection