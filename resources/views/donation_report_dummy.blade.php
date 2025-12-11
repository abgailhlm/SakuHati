@extends('layouts.app')
@section('content')

<div class="bg-gray-50 min-h-screen py-20 text-center">
    <div class="container mx-auto px-6 max-w-2xl">
        <div class="bg-white p-10 rounded-2xl shadow-lg border border-saku-primary/20">
            <i class="fas fa-file-pdf text-6xl text-saku-primary mb-4"></i>
            <h1 class="text-3xl font-bold text-gray-800 mb-3">Laporan Dokumen (Simulasi)</h1>
            <p class="text-gray-600 mb-6">Dokumen ini akan menampilkan rincian penyaluran dana yang terperinci untuk program atau dokumen legalitas yang Anda pilih.</p>

            {{-- Menggunakan route('track') karena ini adalah laporan donasi/legalitas --}}
            <a href="{{ route('track') }}" class="inline-block bg-hati-red text-white px-6 py-3 rounded-xl font-bold hover:bg-red-700 transition">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Pelacakan
            </a>
        </div>
    </div>
</div>

@endsection