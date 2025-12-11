@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white rounded-xl shadow-sm border border-gray-100 p-6 mt-8">
    <h1 class="text-xl font-bold mb-4">Ganti Kata Sandi</h1>

    @if(session('success'))
        <div class="mb-4 text-sm text-green-700 bg-green-100 px-4 py-2 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('password.update') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Password Lama</label>
            <input type="password" name="current_password"
                   class="w-full border rounded-lg px-3 py-2 text-sm">
            @error('current_password')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Password Baru</label>
            <input type="password" name="password"
                   class="w-full border rounded-lg px-3 py-2 text-sm">
            @error('password')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password Baru</label>
            <input type="password" name="password_confirmation"
                   class="w-full border rounded-lg px-3 py-2 text-sm">
        </div>

        <div class="flex justify-end items-center gap-4 mt-6">
            <a href="{{ route('dashboard') }}" 
            class="text-sm text-gray-500 hover:text-gray-700 transition">
                Batal
            </a>

            <button type="submit"
                    class="px-4 py-2 rounded-lg bg-saku-primary text-white text-sm font-semibold">
                Simpan Password
            </button>
        </div>
    </form>
</div>
@endsection
