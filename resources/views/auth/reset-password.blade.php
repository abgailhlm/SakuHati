@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8 bg-white p-8 rounded-xl shadow-lg border border-gray-100">

        <div class="text-center">
            <div class="bg-teal-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 text-saku-primary text-2xl">
                <i class="fas fa-unlock-alt"></i>
            </div>

            <h2 class="mt-2 text-3xl font-extrabold text-gray-900">
                Reset Password
            </h2>
            <p class="mt-2 text-sm text-gray-600">
                Buat password baru untuk akun kamu
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

        <form class="mt-6 space-y-6" method="POST" action="{{ route('password.update', $user->id) }}">
            @csrf

            <div>
                <input type="password" name="password" required
                    class="appearance-none rounded-lg block w-full px-3 py-3 border border-gray-300 placeholder-gray-500
                           focus:outline-none focus:ring-saku-primary focus:border-saku-primary sm:text-sm"
                    placeholder="Password Baru">
            </div>

            <div>
                <input type="password" name="password_confirmation" required
                    class="appearance-none rounded-lg block w-full px-3 py-3 border border-gray-300 placeholder-gray-500
                           focus:outline-none focus:ring-saku-primary focus:border-saku-primary sm:text-sm"
                    placeholder="Konfirmasi Password">
            </div>

            <button type="submit"
                class="w-full flex justify-center py-3 px-4 text-sm font-medium rounded-lg text-white
                       bg-saku-primary hover:bg-saku-dark transition duration-300 shadow-lg">
                Simpan Password
            </button>
        </form>

    </div>
</div>
@endsection