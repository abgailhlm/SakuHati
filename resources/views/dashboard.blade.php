@extends('layouts.app')
@section('content')

<div class="bg-gray-50 min-h-screen py-10">
    <div class="container mx-auto px-6">

        {{-- START: Session Success Message (from fix-bug) --}}
        @if(session('success'))
        <div class="mb-6 text-sm text-green-700 bg-green-100 px-4 py-3 rounded-lg border border-green-200 shadow-sm">
            {{ session('success') }}
        </div>
        @endif
        {{-- END: Session Success Message --}}

        <div class="bg-gradient-to-r from-saku-primary to-saku-dark rounded-2xl p-8 text-white shadow-xl mb-10 flex flex-col md:flex-row justify-between items-center gap-6">
            <div>
                <div class="flex items-center gap-4 mb-2">
                    <div class="bg-white/20 p-3 rounded-full">
                        <i class="fas fa-user text-2xl"></i>
                    </div>
                    <div>
                        {{-- Asumsi Auth::user()->name sudah diambil di Controller --}}
                        <h1 class="text-2xl font-bold">Halo, {{ Auth::user()->name ?? 'Donatur Dermawan' }}!</h1>
                        <p class="text-teal-100 text-sm">Member sejak 2024</p>
                    </div>
                </div>
            </div>

            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-6 border border-white/20 text-center min-w-[200px]">
                <span class="block text-5xl font-extrabold mb-1 text-yellow-300">{{ number_format($impact_count) }}</span>
                <span class="text-sm font-medium uppercase tracking-wider text-teal-100">Dampak (Orang)</span>
            </div>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">

            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-6 border-b flex justify-between items-center">
                        <h3 class="font-bold text-gray-800 text-lg"><i class="fas fa-history text-saku-primary mr-2"></i> Riwayat Donasi</h3>
                        <button class="text-sm text-saku-primary hover:underline">Unduh Semua Sertifikat</button>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm text-gray-600">
                            <thead class="bg-gray-50 text-gray-700 font-bold uppercase text-xs">
                                <tr>
                                    <th class="p-4">Program</th>
                                    <th class="p-4">Jumlah</th>
                                    <th class="p-4 text-center">Status</th>
                                    <th class="p-4 text-center">Lacak</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y">
                                @foreach($donations as $d)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="p-4 font-medium text-gray-800">{{ $d->title }}</td>
                                    <td class="p-4 font-bold text-gray-600">Rp {{ number_format($d->amount) }}</td>
                                    <td class="p-4 text-center">
                                        <span class="px-2 py-1 rounded-full text-xs font-bold 
                                            {{ $d->status == 'distributed' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                            {{ ucfirst($d->status) }}
                                        </span>
                                    </td>
                                    <td class="p-4 text-center">
                                        <a href="{{ route('track', ['code' => $d->tracking_code]) }}" class="text-saku-dark hover:text-saku-primary font-mono text-xs border border-teal-200 bg-teal-50 px-2 py-1 rounded">
                                            {{ $d->tracking_code }}
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        @if($donations->isEmpty())
                        <div class="p-8 text-center text-gray-400">
                            <i class="fas fa-box-open text-4xl mb-3"></i>
                            <p>Belum ada riwayat donasi.</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

            <div class="lg:col-span-1 space-y-8">

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="p-4 bg-teal-50 border-b border-teal-100 flex items-center gap-2">
                        <i class="fas fa-heart text-hati-red animate-pulse"></i>
                        <h3 class="font-bold text-saku-dark">Program Favorit (Langganan)</h3>
                    </div>

                    <div class="p-4">
                        @if($subscriptions->isEmpty())
                        <div class="text-center py-6 text-gray-500">
                            <p class="text-sm mb-2">Anda belum berlangganan pembaruan.</p>
                            <a href="{{ route('home') }}" class="text-saku-primary text-sm font-bold hover:underline">Cari Program</a>
                        </div>
                        @else
                        <ul class="space-y-3">
                            @foreach($subscriptions as $sub)
                            <li class="flex items-center justify-between p-3 border rounded-lg hover:bg-gray-50 transition group">
                                <span class="text-sm font-bold text-gray-700 line-clamp-1 w-2/3">{{ $sub->title }}</span>
                                <a href="{{ route('program', $sub->id) }}" class="text-xs bg-teal-100 text-saku-primary px-3 py-1 rounded-full font-bold group-hover:bg-saku-primary group-hover:text-white transition">
                                    Lihat
                                </a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6">
                    <h3 class="font-bold text-gray-800 mb-4">Pengaturan Akun</h3>

                    {{-- START: Account Settings Links (from fix-bug, using proper routes) --}}
                    <ul class="space-y-2 text-sm text-gray-600">
                        {{-- Edit Profil --}}
                        <li>
                            <a href="{{ route('profile.edit') }}"
                                class="flex items-center gap-2 hover:text-saku-primary">
                                <i class="fas fa-user-edit w-5"></i> Edit Profil
                            </a>
                        </li>

                        {{-- Ganti Kata Sandi --}}
                        <li>
                            <a href="{{ route('password.change') }}"
                                class="flex items-center gap-2 hover:text-saku-primary">
                                <i class="fas fa-lock w-5"></i> Ganti Kata Sandi
                            </a>
                        </li>

                        {{-- Logout --}}
                        <li class="mt-4 border-t pt-4">
                            <form action="{{ route('logout') }}" method="POST" class="flex items-center gap-2">
                                @csrf
                                <button type="submit" class="flex items-center gap-2 text-hati-red hover:text-hati-red">
                                    <i class="fas fa-sign-out-alt w-5"></i> Keluar
                                </button>
                            </form>
                        </li>
                    </ul>
                    {{-- END: Account Settings Links --}}
                </div>
            </div>
        </div>

    </div>
</div>
@endsection