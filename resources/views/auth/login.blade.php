@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-xl shadow-lg border border-gray-100">
        <div class="text-center">

            {{-- IKON DIUBAH KE WARNA SAKU PRIMARY --}}
            <div class="bg-teal-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 text-saku-primary text-2xl">
                <i class="fas fa-sign-in-alt"></i>
            </div>

            <h2 class="mt-2 text-3xl font-extrabold text-gray-900">Selamat Datang Kembali</h2>
            <p class="mt-2 text-sm text-gray-600">
                Belum punya akun? <a href="{{ route('register') }}" class="font-medium text-saku-primary hover:text-saku-dark font-bold">Daftar disini</a>
            </p>
        </div>

        {{-- MENAMBAH PENANGANAN PESAN INFO (Untuk redirect dari halaman Lacak Donasi) --}}
        @if (session('info'))
        <div class="bg-yellow-100 border-l-4 border-yellow-500 text-yellow-700 p-4 rounded text-sm mb-4">
            <p>{{ session('info') }}</p>
        </div>
        @endif

        @if ($errors->any())
        {{-- WARNA ERROR DIUBAH KE HATI RED --}}
        <div class="bg-red-50 border-l-4 border-hati-red text-red-700 p-4 rounded text-sm mb-4">
            <p class="font-bold">Oops!</p>
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form class="mt-8 space-y-6" action="{{ route('login') }}" method="POST">
            @csrf
            <div class="rounded-md shadow-sm -space-y-px">
                <div class="mb-4">
                    <label for="email" class="sr-only">Alamat Email</label>
                    <input id="email" name="email" type="email" required
                        class="appearance-none rounded-lg relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 
                                  focus:outline-none focus:ring-saku-primary focus:border-saku-primary focus:z-10 sm:text-sm"
                        placeholder="Alamat Email">
                </div>
                <div>
                    <label for="password" class="sr-only">Password</label>
                    <input id="password" name="password" type="password" required
                        class="appearance-none rounded-lg relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900 
                                  focus:outline-none focus:ring-saku-primary focus:border-saku-primary focus:z-10 sm:text-sm"
                        placeholder="Password">
                </div>
            </div>

            <div>
                {{-- TOMBOL DIUBAH KE SAKU PRIMARY --}}
                <button type="submit"
                    class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-medium rounded-lg text-white 
                               bg-saku-primary hover:bg-saku-dark focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-saku-primary 
                               shadow-lg transition duration-300">
                    <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                        <i class="fas fa-lock"></i>
                    </span>
                    Masuk Sekarang
                </button>
            </div>
        </form>
    </div>
</div>
@endsection