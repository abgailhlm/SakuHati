@extends('layouts.app')
@section('content')

<div class="bg-gray-50 min-h-screen py-10 flex items-center justify-center">
    <div class="container mx-auto px-6 max-w-4xl">

        <div class="text-center mb-10">
            <h1 class="text-3xl font-extrabold text-gray-900 mb-2">Pelacakan Donasi & Transparansi</h1>
            <p class="text-gray-500">Pantau perjalanan donasi Anda dari dompet hingga ke tangan penerima manfaat.</p>
        </div>

        @if (session('info'))
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 mb-6 rounded-lg shadow-md" role="alert">
            <p class="font-bold"><i class="fas fa-exclamation-triangle mr-2"></i> Perhatian!</p>
            <p>{{ session('info') }}</p>
        </div>
        @endif

        <div class="bg-white rounded-2xl shadow-xl p-8 mb-10 border border-teal-100 relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-saku-primary to-saku-dark"></div>

            <form action="{{ route('track') }}" method="GET" class="flex flex-col md:flex-row gap-4">
                <div class="flex-grow">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Kode Pelacakan Donasi</label>
                    <input type="text" name="code" value="{{ $code ?? '' }}" placeholder="Contoh: TRX-999"
                        class="w-full px-5 py-4 rounded-xl border border-gray-300 focus:outline-none focus:ring-4 focus:ring-teal-100 text-lg font-mono text-gray-700 uppercase" required>
                    <p class="text-xs text-gray-400 mt-2"><i class="fas fa-info-circle"></i> Kode pelacakan dikirim ke email Anda setelah donasi berhasil.</p>
                </div>
                <div class="flex items-end">
                    <button type="submit" class="w-full md:w-auto bg-saku-primary hover:bg-saku-dark text-white font-bold px-8 py-4 rounded-xl text-lg transition shadow-lg hover:shadow-teal-200">
                        <i class="fas fa-search mr-2"></i> Lacak Sekarang
                    </button>
                </div>
            </form>
        </div>

        @if(request()->has('code'))
        @if($data)
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden animate-fade-in-up">
            <div class="bg-green-50 p-4 border-b border-green-100 flex justify-between items-center">
                <div class="flex items-center gap-2 text-green-700 font-bold">
                    <i class="fas fa-check-circle text-xl"></i> Data Donasi Ditemukan
                </div>
                <span class="bg-white border border-green-200 text-green-700 px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wide">
                    {{ $data->status }}
                </span>
            </div>

            <div class="p-8 grid md:grid-cols-2 gap-8">
                <div>
                    <h3 class="text-gray-500 text-sm font-bold uppercase mb-1">Program Donasi</h3>
                    <p class="text-lg font-bold text-gray-800 mb-4">{{ $data->program_title }}</p>

                    <h3 class="text-gray-500 text-sm font-bold uppercase mb-1">Jumlah Donasi</h3>
                    <p class="text-lg font-bold text-saku-primary mb-4">Rp {{ number_format($data->amount) }}</p>

                    <h3 class="text-gray-500 text-sm font-bold uppercase mb-1">Tanggal Transaksi</h3>
                    <p class="text-gray-800 font-medium">{{ \Carbon\Carbon::parse($data->created_at)->format('d F Y, H:i') }} WIB</p>
                </div>

                @if($data->status == 'distributed')
                <div class="bg-teal-50 rounded-xl p-6 border border-teal-100">
                    <h4 class="font-bold text-saku-dark mb-3 flex items-center gap-2">
                        <i class="fas fa-camera"></i> Bukti Penyaluran Lapangan
                    </h4>
                    <div class="bg-white p-4 rounded-lg border border-teal-100 shadow-sm">
                        <p class="text-gray-600 italic text-sm mb-3">"{{ $data->distribution_proof }}"</p>
                        <div class="w-full h-32 bg-gray-200 rounded flex items-center justify-center text-gray-400 text-sm">
                            [Foto Dokumentasi Asli]
                        </div>
                        <a href="{{ route('donation.report') }}" class="mt-3 text-saku-primary text-xs font-bold hover:underline block text-right">Lihat Laporan Lengkap &rarr;</a>
                    </div>
                </div>
                @else
                <div class="bg-yellow-50 rounded-xl p-6 border border-yellow-100 flex flex-col justify-center text-center">
                    <i class="fas fa-clock text-4xl text-yellow-400 mb-3"></i>
                    <h4 class="font-bold text-yellow-800">Sedang Dalam Proses</h4>
                    <p class="text-sm text-yellow-700 mt-2">Dana Anda sudah kami terima dan sedang dalam tahap verifikasi/persiapan penyaluran.</p>
                </div>
                @endif
            </div>
        </div>
        @else
        <div class="bg-red-50 border-l-4 border-hati-red p-6 rounded-r-xl shadow-sm text-center">
            <i class="fas fa-exclamation-circle text-4xl text-hati-red mb-3"></i>
            <h3 class="text-red-800 font-bold text-lg">Kode Tidak Ditemukan</h3>
            <p class="text-red-600 text-sm">Mohon periksa kembali kode pelacakan Anda (Contoh: TRX-999). Pastikan huruf besar/kecil sesuai.</p>
        </div>
        @endif
        @endif

    </div>
</div>
@endsection