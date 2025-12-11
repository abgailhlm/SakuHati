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
                Sudah punya akun? <a href="{{ route('login') }}" class="font-medium text-blue-600 hover:text-blue-500 font-bold">Login disini</a>
            </p>
        </div>

        @if ($errors->any())
        <div class="bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded text-sm mb-4">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form class="mt-8 space-y-4" action="{{ route('register') }}" method="POST">
            @csrf
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Nama Lengkap</label>
                <input name="name" type="text" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Nama Anda">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Alamat Email</label>
                <input name="email" type="email" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="email@contoh.com">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Password</label>
                <input name="password" type="password" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Minimal 6 karakter">
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-1">Konfirmasi Password</label>
                <input name="password_confirmation" type="password" required class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Ketik ulang password">
            </div>

            <button type="submit" class="w-full py-3 px-4 border border-transparent text-sm font-bold rounded-lg text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 shadow-lg transition duration-300 mt-6">
                Daftar & Bergabung
            </button>
        </form>
    </div>
</div>
@endsection