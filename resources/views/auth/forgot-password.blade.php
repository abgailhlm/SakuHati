@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-xl shadow-lg border border-gray-100">
        
        <div class="text-center">
            <div class="bg-teal-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 text-saku-primary text-2xl">
                <i class="fas fa-key"></i>
            </div>

            <h2 class="mt-2 text-3xl font-extrabold text-gray-900">
                Lupa Password
            </h2>
            <p class="mt-2 text-sm text-gray-600">
                Masukkan email akun kamu untuk reset password
            </p>
        </div>

        @if ($errors->any())
        <div class="bg-red-50 border-l-4 border-hati-red text-red-700 p-4 rounded text-sm">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form class="mt-6 space-y-6" method="POST" action="{{ route('password.process') }}">
            @csrf

            <div>
                <label for="email" class="sr-only">Email</label>
                <input id="email" name="email" type="email" required
                    class="appearance-none rounded-lg relative block w-full px-3 py-3 border border-gray-300 placeholder-gray-500 text-gray-900
                           focus:outline-none focus:ring-saku-primary focus:border-saku-primary sm:text-sm"
                    placeholder="Alamat Email">
            </div>

            <div>
                <button type="submit"
                    class="w-full flex justify-center py-3 px-4 text-sm font-medium rounded-lg text-white
                           bg-saku-primary hover:bg-saku-dark transition duration-300 shadow-lg">
                    Lanjutkan
                </button>
            </div>
        </form>

        <div class="text-center">
            <a href="{{ route('login') }}"
               class="text-sm font-medium text-saku-primary hover:text-saku-dark">
                ← Kembali ke login
            </a>
        </div>

    </div>
</div>
@endsection