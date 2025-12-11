<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saku Hati - Transparansi untuk Kebaikan Nyata</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'saku-primary': '#14b8a6', // Teal (Warna Saku)
                        'saku-dark': '#0f766e', // Teal Gelap (Hover)
                        'hati-red': '#ef4444', // Merah (Warna Hati)
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap');
    </style>
</head>

<body class="bg-gray-50 text-gray-800 flex flex-col min-h-screen font-sans">

    <nav class="bg-white shadow-sm sticky top-0 z-50 border-b border-gray-100">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">

            <a href="{{ route('home') }}" class="flex items-center gap-3 hover:opacity-90 transition">
                <img src="/images/logo-saku-hati.png" alt="Logo Saku Hati" class="h-10 w-auto">
            </a>

            <div class="hidden md:flex items-center space-x-8 font-medium text-sm text-gray-600">
                <a href="{{ route('home') }}" class="hover:text-saku-primary transition {{ request()->routeIs('home') ? 'text-saku-primary font-bold' : '' }}">Beranda</a>
                <a href="{{ route('track') }}" class="hover:text-saku-primary transition {{ request()->routeIs('track') ? 'text-saku-primary font-bold' : '' }}">Lacak Donasi</a>
                <a href="{{ route('about') }}" class="hover:text-saku-primary transition {{ request()->routeIs('about') ? 'text-saku-primary font-bold' : '' }}">Tentang Kami</a>

                @auth
                {{-- TAMPIL JIKA PENGGUNA SUDAH MASUK --}}
                <div class="flex items-center gap-4 pl-4 border-l border-gray-200">

                    {{-- Tautan Utama ke Dashboard --}}
                    <a href="{{ route('dashboard') ?? '#' }}" class="flex items-center gap-2 text-saku-primary font-bold hover:bg-teal-50 px-3 py-2 rounded-lg transition">
                        <div class="w-8 h-8 bg-teal-100 rounded-full flex items-center justify-center text-saku-primary">
                            <i class="fas fa-user"></i>
                        </div>
                        <span>{{ Auth::user()->name }}</span>
                    </a>

                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-red-500 hover:text-red-700 font-bold text-sm flex items-center gap-1 transition">
                            <i class="fas fa-sign-out-alt"></i> Keluar
                        </button>
                    </form>
                </div>
                @else
                {{-- TAMPIL JIKA PENGGUNA BELUM MASUK --}}
                <div class="flex items-center gap-2 ml-4 pl-4 border-l border-gray-200">
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-saku-primary font-bold px-4 py-2 transition">Masuk</a>
                    <a href="{{ route('register') }}" class="bg-saku-primary text-white px-6 py-2.5 rounded-full hover:bg-saku-dark transition shadow-md shadow-teal-500/20 font-bold">
                        Daftar
                    </a>
                </div>
                @endauth
            </div>

            <div class="md:hidden text-gray-500 text-xl cursor-pointer hover:text-saku-primary">
                <i class="fas fa-bars"></i>
            </div>
        </div>
    </nav>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-teal-900 text-white py-12 mt-auto border-t border-teal-800">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-4 gap-8 mb-8">

                <div class="col-span-1 md:col-span-2 space-y-4">
                    <p class="text-teal-200 text-sm leading-relaxed max-w-sm">
                        Platform crowdfunding paling transparan di Indonesia. Kami menjamin setiap rupiah donasi Anda tersalurkan dengan bukti nyata dan laporan akuntabel.
                    </p>
                </div>

                <div>
                    <h4 class="font-bold mb-4 text-white uppercase tracking-wider text-xs">Menu Pintas</h4>
                    <ul class="text-sm text-teal-200 space-y-2">
                        <li><a href="{{ route('home') }}" class="hover:text-saku-primary transition">Program Donasi</a></li>
                        <li><a href="{{ route('track') }}" class="hover:text-saku-primary transition">Cek Status Donasi</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-saku-primary transition">Laporan Audit</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold mb-4 text-white uppercase tracking-wider text-xs">Hubungi Kami</h4>
                    <p class="text-sm text-teal-200 mb-3 flex items-center gap-3">
                        <i class="fas fa-envelope text-saku-primary"></i>
                        <a href="mailto:help@sakuhati.org" class="hover:text-white transition">help@sakuhati.org</a>
                    </p>
                    <p class="text-sm text-teal-200 flex items-center gap-3">
                        <i class="fas fa-phone text-hati-red"></i>
                        <span>+62 812-3456-7890</span>
                    </p>
                </div>
            </div>

            <div class="border-t border-teal-800 pt-8 text-center text-sm text-teal-200">
                <a href="{{ route('home') }}" class="inline-flex items-center justify-center">
                    <img src="/images/logo-saku-hati-dark.png" alt="Logo Saku Hati"
                        class="h-8 w-auto">
                </a>
                <p class="mt-4">Hak Cipta © 2025 Saku Hati. Semua Hak Dilindungi.</p>
            </div>
        </div>
    </footer>

</body>

</html>