@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto bg-white rounded-xl shadow-sm border border-gray-100 p-6 mt-8">
    <h1 class="text-xl font-bold mb-4">Edit Profil</h1>

    @if(session('success'))
        <div class="mb-4 text-sm text-green-700 bg-green-100 px-4 py-2 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('profile.update') }}" method="POST" class="space-y-4">
        @csrf

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
            <input type="text" name="name"
                   value="{{ old('name', $user->name) }}"
                   class="w-full border rounded-lg px-3 py-2 text-sm">
            @error('name')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input type="email" name="email"
                   value="{{ old('email', $user->email) }}"
                   class="w-full border rounded-lg px-3 py-2 text-sm">
            @error('email')
                <p class="text-xs text-red-600 mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end items-center gap-4 mt-6">
            <a href="{{ route('dashboard') }}" 
                class="px-3 py-2 rounded-lg text-sm text-gray-600 hover:bg-gray-100 transition">
                Batal
            </a>

            <button type="submit"
                    class="px-4 py-2 rounded-lg bg-saku-primary text-white text-sm font-semibold">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
@endsection
