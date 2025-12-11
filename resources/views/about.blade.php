@extends('layouts.app')
@section('content')

<div class="bg-gray-900 text-white py-16 text-center bg-gradient-to-r from-saku-dark to-gray-900">
    <h1 class="text-4xl font-bold mb-2">Tentang Kami</h1>
    <p class="text-gray-400">Transparansi, Akuntabilitas, dan Kepercayaan adalah pilar kami.</p>
</div>

<div class="container mx-auto px-6 py-12">

    <div class="mb-16">
        <h2 class="text-2xl font-bold text-center mb-10 text-gray-800">Legalitas & Sertifikasi Resmi</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-2 gap-8 max-w-4xl mx-auto">
            @foreach($legals as $l)
            <div class="bg-white p-6 rounded-xl shadow-md border-l-4 border-saku-primary flex items-start gap-4 hover:shadow-lg transition">
                <div class="bg-teal-50 p-3 rounded-full text-saku-primary">
                    <i class="fas fa-file-contract text-2xl"></i>
                </div>
                <div>
                    <h3 class="font-bold text-lg text-gray-800">{{ $l->document_name }}</h3>
                    <p class="text-sm text-gray-500 mb-2">Terverifikasi pada: {{ \Carbon\Carbon::parse($l->verified_date)->format('d M Y') }}</p>
                    {{-- TAUTAN DIUBAH KE DUMMY REPORT --}}
                    <a href="{{ route('donation.report') }}" class="text-saku-primary text-sm font-bold hover:underline flex items-center gap-1">
                        <i class="fas fa-download"></i> Unduh Dokumen
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="border-t pt-16">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-bold text-gray-800">Tim Di Balik Layar</h2>
            <p class="text-gray-500 mt-2">Para profesional yang mendedikasikan diri untuk kemanusiaan.</p>
        </div>

        <div class="grid md:grid-cols-4 gap-8">
            {{-- Menggunakan data tim dari controller --}}
            @forelse($teams as $team)
            <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition duration-300 p-8 text-center border border-gray-100 group">
                <div class="w-28 h-28 mx-auto mb-6 relative">
                    <div class="w-full h-full rounded-full bg-gradient-to-tr from-teal-100 to-teal-200 flex items-center justify-center text-saku-primary text-4xl overflow-hidden">
                        @if(isset($team->photo_url) && $team->photo_url)
                        <img src="{{ $team->photo_url }}" alt="Foto {{ $team->name }}" class="w-full h-full object-cover">
                        @else
                        {{-- Inisial Nama untuk placeholder jika foto tidak ada --}}
                        <span class="text-xl font-extrabold">{{ strtoupper(substr($team->name, 0, 1)) }}</span>
                        @endif
                    </div>
                    {{-- DIV LINKEDIN DIHAPUS --}}
                </div>

                <h3 class="font-bold text-lg text-gray-900 mb-1 group-hover:text-saku-primary transition">{{ $team->name }}</h3>
                <p class="text-xs font-bold text-saku-primary uppercase tracking-wide mb-4">{{ $team->position }}</p>
            </div>
            @empty
            {{-- Menampilkan Tim default jika data kosong (menggunakan NIM sebagai position) --}}
            @php
            $defaultTeams = [
            ['name' => 'Ann Abigail Halim', 'position' => 'NIM'],
            ['name' => 'Britney Angeline Soeseno', 'position' => 'NIM'],
            ['name' => 'Carmenita Angelica', 'position' => '2702268864'],
            ['name' => 'Nadya Angelie Lislie', 'position' => 'NIM'],
            ];
            @endphp

            @foreach($defaultTeams as $team)
            <div class="bg-white rounded-2xl shadow-sm hover:shadow-xl transition duration-300 p-8 text-center border border-gray-100 group">
                <div class="w-28 h-28 mx-auto mb-6 relative">
                    <div class="w-full h-full rounded-full bg-gradient-to-tr from-teal-100 to-teal-200 flex items-center justify-center text-saku-primary text-4xl overflow-hidden">
                        <span class="text-xl font-extrabold">{{ strtoupper(substr($team['name'], 0, 1)) }}</span>
                    </div>
                    {{-- DIV LINKEDIN DIHAPUS --}}
                </div>
                <h3 class="font-bold text-lg text-gray-900 mb-1 group-hover:text-saku-primary transition">{{ $team['name'] }}</h3>
                <p class="text-xs font-bold text-saku-primary uppercase tracking-wide mb-4">{{ $team['position'] }}</p>
            </div>
            @endforeach
            @endforelse
        </div>
    </div>

</div>
@endsection