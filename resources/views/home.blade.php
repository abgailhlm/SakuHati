@extends('layouts.app')
@section('content')

<div class="bg-gradient-to-br from-saku-primary to-teal-800 text-white py-20 text-center relative overflow-hidden">
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden opacity-10 pointer-events-none">
        <i class="fas fa-hand-holding-heart text-9xl absolute -top-10 -left-10 text-teal-400"></i>
        <i class="fas fa-globe-asia text-9xl absolute bottom-10 right-10 text-hati-red"></i>
    </div>

    <div class="container mx-auto relative z-10 px-6">
        <h1 class="text-4xl md:text-5xl font-extrabold mb-4">Transparansi untuk Kebaikan Nyata</h1>
        <p class="text-teal-100 text-lg mb-12 max-w-2xl mx-auto">Platform donasi terpercaya dengan laporan real-time, melacak donasi, dan bukti penyaluran langsung dari lapangan.</p>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">

            <a href="{{ route('track') }}" class="group block p-6 bg-white/10 backdrop-blur-md rounded-2xl border border-white/20 hover:bg-white/20 hover:scale-105 transition transform cursor-pointer shadow-lg">
                <h3 class="text-3xl font-bold text-teal-300 group-hover:text-white transition">Rp {{ number_format($stats['total_donasi'] / 1000000, 0) }} Jt+</h3>
                <p class="text-sm font-medium text-teal-100 mt-1 flex justify-center items-center gap-2">
                    Donasi Terkumpul <i class="fas fa-search-dollar opacity-0 group-hover:opacity-100 transition"></i>
                </p>
            </a>

            <a href="#program-list" class="group block p-6 bg-white/10 backdrop-blur-md rounded-2xl border border-white/20 hover:bg-white/20 hover:scale-105 transition transform cursor-pointer shadow-lg">
                <h3 class="text-3xl font-bold text-green-300 group-hover:text-white transition">{{ $stats['program_aktif'] }}</h3>
                <p class="text-sm font-medium text-teal-100 mt-1 flex justify-center items-center gap-2">
                    Program Aktif <i class="fas fa-chevron-down opacity-0 group-hover:opacity-100 transition"></i>
                </p>
            </a>

            <a href="{{ route('about') }}" class="group block p-6 bg-white/10 backdrop-blur-md rounded-2xl border border-white/20 hover:bg-white/20 hover:scale-105 transition transform cursor-pointer shadow-lg">
                <h3 class="text-3xl font-bold text-hati-red group-hover:text-white transition">{{ number_format($stats['penerima_manfaat']) }}</h3>
                <p class="text-sm font-medium text-teal-100 mt-1 flex justify-center items-center gap-2">
                    Penerima Manfaat <i class="fas fa-smile-beam opacity-0 group-hover:opacity-100 transition"></i>
                </p>
            </a>

            <a href="{{ route('register') }}" class="group block p-6 bg-white/10 backdrop-blur-md rounded-2xl border border-white/20 hover:bg-white/20 hover:scale-105 transition transform cursor-pointer shadow-lg">
                <h3 class="text-3xl font-bold text-cyan-300 group-hover:text-white transition">{{ number_format($stats['donatur']) }}</h3>
                <p class="text-sm font-medium text-teal-100 mt-1 flex justify-center items-center gap-2">
                    Orang Baik <i class="fas fa-user-plus opacity-0 group-hover:opacity-100 transition"></i>
                </p>
            </a>

        </div>
    </div>
</div>

<div class="bg-white border-b shadow-sm py-4 relative z-20">
    <div class="container mx-auto flex flex-wrap justify-center gap-6 md:gap-12 text-gray-500 text-xs md:text-sm font-bold uppercase tracking-wider">
        <span class="flex items-center gap-2 hover:text-saku-primary transition cursor-default"><i class="fas fa-check-circle text-saku-primary"></i> Izin Kemensos</span>
        <span class="flex items-center gap-2 hover:text-saku-primary transition cursor-default"><i class="fas fa-shield-alt text-saku-primary"></i> Audit WTP</span>
        <span class="flex items-center gap-2 hover:text-saku-primary transition cursor-default"><i class="fas fa-lock text-saku-primary"></i> SSL Terjamin</span>
        <span class="flex items-center gap-2 hover:text-saku-primary transition cursor-default"><i class="fas fa-award text-saku-primary"></i> ISO 27001</span>
    </div>
</div>

<div class="bg-gray-50 py-10 border-b">
    <div class="container mx-auto px-6 text-center">
        <p class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-6">Didukung Oleh Mitra Terpercaya</p>
        <div class="flex flex-wrap justify-center items-center gap-8 md:gap-16 opacity-60 grayscale hover:grayscale-0 transition duration-500">
            @foreach($partners as $p)
            <div class="flex flex-col items-center group cursor-pointer hover:scale-110 transition">
                <div class="w-16 h-16 flex items-center justify-center bg-white rounded-full shadow-sm mb-2 group-hover:shadow-md transition border border-gray-100">
                    <i class="fas fa-handshake text-2xl text-gray-600 group-hover:text-saku-primary"></i>
                </div>
                <span class="font-bold text-sm text-gray-600">{{ $p->name }}</span>
            </div>
            @endforeach

            <div class="flex flex-col items-center hover:scale-110 transition cursor-pointer"><i class="fas fa-university text-3xl mb-2 text-gray-400 hover:text-saku-dark"></i><span class="font-bold text-sm text-gray-500">Bank BSI</span></div>
            <div class="flex flex-col items-center hover:scale-110 transition cursor-pointer"><i class="fas fa-building text-3xl mb-2 text-gray-400 hover:text-hati-red"></i><span class="font-bold text-sm text-gray-500">Pertamina</span></div>
        </div>
    </div>
</div>

<div id="program-list" class="container mx-auto px-6 py-16 scroll-mt-24">

    <div class="max-w-3xl mx-auto text-center mb-12">
        <h2 class="text-3xl font-bold text-gray-800 mb-2">Program Pilihan</h2>
        <p class="text-gray-500 mb-8">Salurkan bantuanmu ke program yang paling mendesak.</p>

        <form action="{{ route('home') }}#program-list" method="GET" class="relative group z-10">
            <div class="relative transition-all transform group-hover:-translate-y-1">
                <input type="text" name="search" value="{{ request('search') }}"
                    placeholder="Cari program... (Contoh: Beasiswa, Banjir, Sumur)"
                    class="w-full px-6 py-4 rounded-full border-2 border-gray-200 focus:border-saku-primary focus:outline-none shadow-sm text-gray-700 pl-14 transition-all focus:shadow-lg focus:ring-4 focus:ring-teal-100">

                <i class="fas fa-search absolute left-5 top-1/2 transform -translate-y-1/2 text-gray-400 text-xl group-focus-within:text-saku-primary transition"></i>

                <button type="submit" class="absolute right-2 top-2 bottom-2 bg-saku-primary text-white px-6 rounded-full font-bold hover:bg-saku-dark transition shadow-md hover:shadow-lg">
                    Cari
                </button>
            </div>
        </form>

        @if(request('search'))
        <div class="mt-4 animate-fade-in-up">
            <span class="text-gray-500 text-sm bg-gray-100 px-3 py-1 rounded-full">
                Hasil pencarian: <strong>"{{ request('search') }}"</strong>
            </span>
            <a href="{{ route('home') }}#program-list" class="ml-2 text-hati-red text-sm font-bold hover:underline hover:text-red-700 transition">
                <i class="fas fa-times-circle"></i> Atur Ulang
            </a>
        </div>
        @endif
    </div>

    @if($programs->isEmpty())
    <div class="text-center py-16 bg-gray-50 rounded-3xl border-2 border-dashed border-gray-300 animate-pulse">
        <div class="w-24 h-24 bg-gray-200 rounded-full flex items-center justify-center mx-auto mb-6 text-gray-400 text-4xl">
            <i class="fas fa-search-minus"></i>
        </div>
        <h3 class="text-2xl font-bold text-gray-700 mb-2">Program Tidak Ditemukan</h3>
        <p class="text-gray-500 mb-6">Maaf, tidak ada program yang cocok dengan kata kunci <strong>"{{ request('search') }}"</strong>.</p>
        <a href="{{ route('home') }}#program-list" class="inline-flex items-center bg-white border border-gray-300 text-gray-700 px-6 py-3 rounded-full font-bold hover:bg-gray-100 hover:border-gray-400 transition shadow-sm">
            <i class="fas fa-arrow-left mr-2"></i> Lihat Semua Program
        </a>
    </div>
    @else
    <div class="grid md:grid-cols-3 gap-8">
        @foreach($programs as $prog)
        @php $pct = ($prog->collected_amount / $prog->target_amount) * 100; @endphp
        <div class="bg-white rounded-2xl shadow-lg hover:shadow-2xl transition duration-300 overflow-hidden flex flex-col h-full border border-gray-100 transform hover:-translate-y-2 group">

            <div class="h-48 relative overflow-hidden">
                <img src="{{ $prog->image }}"
                    alt="{{ $prog->title }}"
                    class="w-full h-full object-cover group-hover:scale-110 transition duration-500 bg-gray-100"
                    onerror="this.onerror=null;this.src='https://via.placeholder.com/600x400.png?text=SakuHati+Image';">

                <div class="absolute top-4 right-4">
                    <span class="px-3 py-1 rounded-full text-xs font-bold text-white shadow-sm
                            {{ $prog->category == 'Darurat' ? 'bg-hati-red animate-pulse' : 'bg-saku-primary' }}">
                        {{ $prog->category }}
                    </span>
                </div>
            </div>

            <div class="p-6 flex-grow flex flex-col">
                <h3 class="font-bold text-xl text-gray-800 mb-2 leading-tight hover:text-saku-primary transition">{{ $prog->title }}</h3>

                <div class="mb-4">
                    <span class="inline-block bg-teal-50 text-teal-700 text-xs px-2 py-1 rounded border border-teal-100 font-medium">
                        <i class="fas fa-bolt mr-1"></i> {{ $prog->impact_formula }}
                    </span>
                </div>

                <div class="mt-auto">
                    <div class="flex justify-between text-xs font-bold text-gray-500 mb-1">
                        <span class="text-saku-primary">Rp {{ number_format($prog->collected_amount) }}</span>
                        <span>{{ number_format($pct, 0) }}%</span>
                    </div>
                    <div class="w-full bg-gray-100 rounded-full h-2.5 mb-4">
                        <div class="bg-saku-primary h-2.5 rounded-full transition-all duration-1000" style="width: {{ min($pct, 100) }}%"></div>
                    </div>

                    <a href="{{ route('program', $prog->id) }}" class="block w-full text-center bg-saku-primary text-white py-3 rounded-xl font-bold hover:bg-saku-dark transition shadow-lg shadow-teal-200 active:scale-95 active:shadow-none">
                        Detail & Donasi
                    </a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endif
</div>
@endsection