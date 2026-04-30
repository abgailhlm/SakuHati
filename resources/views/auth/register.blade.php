@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-xl shadow-lg border border-gray-100">
        <div class="text-center">
            <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 text-green-600 text-2xl">
                <i class="fas fa-user-plus"></i>
            </div>
            <h2 class="mt-2 text-3xl font-extrabold text-gray-900">Buat Akun Baru</h2>
            <p class="mt-2 text-sm text-gray-600">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500 font-bold">Login disini</a>
            </p>
        </div>

        <form class="mt-8 space-y-4" action="{{ route('register') }}" method="POST">
            @csrf

            {{-- NAME --}}
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Nama Lengkap</label>
                <input 
                    name="name"
                    type="text"
                    value="{{ old('name') }}"
                    class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 
                    @error('name') border-red-500 focus:ring-red-500 @else border-gray-300 focus:ring-blue-500 @enderror"
                    placeholder="Nama Anda">

                @error('name')
                    <small class="text-red-600">{{ $message }}</small>
                @enderror
            </div>

            {{-- EMAIL --}}
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Alamat Email</label>
                <input 
                    name="email"
                    type="email"
                    value="{{ old('email') }}"
                    class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 
                    @error('email') border-red-500 focus:ring-red-500 @else border-gray-300 focus:ring-blue-500 @enderror"
                    placeholder="email@contoh.com">

                @error('email')
                    <small class="text-red-600">{{ $message }}</small>
                @enderror
            </div>

            {{-- PASSWORD --}}
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Password</label>
                <input 
                    name="password"
                    type="password"
                    class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 
                    @error('password') border-red-500 focus:ring-red-500 @else border-gray-300 focus:ring-blue-500 @enderror"
                    placeholder="Minimal 8 karakter, huruf besar, kecil, angka & simbol">

                @error('password')
                    <small class="text-red-600">{{ $message }}</small>
                @enderror
            </div>

            {{-- PASSWORD CONFIRMATION --}}
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Konfirmasi Password</label>
                <input 
                    name="password_confirmation"
                    type="password"
                    class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 border-gray-300 focus:ring-blue-500"
                    placeholder="Ketik ulang password">
            </div>

            <button type="submit"
                class="w-full py-3 px-4 border border-transparent text-sm font-bold rounded-lg text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 shadow-lg transition duration-300 mt-6">
                Daftar & Bergabung
            </button>
        </form>
    </div>
</div>
@endsection