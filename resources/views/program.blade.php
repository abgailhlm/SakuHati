@extends('layouts.app')
{{-- Memastikan facade Auth tersedia untuk cek login --}}
@php use Illuminate\Support\Facades\Auth; @endphp

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>

<div class="bg-gray-50 min-h-screen py-10">
    <div class="container mx-auto px-6">
        <div class="mb-6 text-sm text-gray-500">
            <a href="{{ route('home') }}" class="hover:text-saku-primary">Beranda</a> <i class="fas fa-chevron-right mx-2 text-xs"></i>
            <span class="font-bold text-gray-800">Detail Program</span>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="md:col-span-2">
                <div class="bg-white rounded-2xl shadow-sm p-8 mb-8">
                    <h1 class="text-3xl font-bold text-gray-900 mb-4">{{ $program->title }}</h1>

                    {{-- Info deadline & kategori --}}
                    <div class="flex items-center gap-4 mb-4 text-sm text-gray-500">
                        <span><i class="far fa-clock"></i> Tenggat Waktu: {{ \Carbon\Carbon::parse($program->deadline)->format('d M Y') }}</span>
                        <span class="px-3 py-1 rounded-full text-xs font-bold text-white shadow-sm {{ $program->category == 'Darurat' ? 'bg-hati-red' : ($program->category == 'Mendesak' ? 'bg-orange-500' : 'bg-saku-primary') }}">
                            {{ $program->category }}
                        </span>
                    </div>

                    {{-- Lokasi singkat di dekat judul (opsional) --}}
                    @if (!empty($program->destination_location))
                    <div class="mb-4 text-sm text-gray-600 flex items-center gap-2">
                        <i class="fas fa-map-marker-alt text-saku-primary"></i>
                        <span>Lokasi penyaluran: <span class="font-semibold">{{ $program->destination_location }}</span></span>
                    </div>
                    @endif

                    @if(isset($program->image))
                    <div class="mb-6 rounded-xl overflow-hidden shadow-md">
                        <img src="{{ $program->image }}" alt="{{ $program->title }}" class="w-full h-80 object-cover">
                    </div>
                    @endif

                    <p class="text-gray-700 leading-relaxed text-lg">{{ $program->description }}</p>
                </div>

                {{-- Pembaruan Lapangan --}}
                <div class="bg-white rounded-2xl shadow-sm p-8">
                    <h3 class="font-bold text-xl border-b pb-4 mb-6 flex items-center gap-2">
                        <i class="fas fa-bullhorn text-saku-primary"></i> Pembaruan Lapangan (Kisah Nyata)
                    </h3>

                    @if($updates->isEmpty())
                    <div class="text-center py-10 text-gray-400 bg-gray-50 rounded-xl">
                        <i class="far fa-newspaper text-4xl mb-3"></i>
                        <p>Belum ada pembaruan cerita dari lapangan.</p>
                    </div>
                    @else
                    <div class="space-y-8">
                        @foreach($updates as $upd)
                        <div class="relative pl-8 border-l-2 border-teal-200 pb-8 last:pb-0">
                            <div class="absolute -left-[9px] top-0 w-4 h-4 rounded-full bg-saku-primary border-2 border-white shadow"></div>

                            <span class="text-xs text-gray-400 font-bold mb-1 block">{{ \Carbon\Carbon::parse($upd->created_at)->format('d F Y') }}</span>
                            <h4 class="font-bold text-lg mb-2">{{ $upd->title }}</h4>
                            <p class="text-gray-600 mb-4">{{ $upd->content }}</p>

                            <div class="grid grid-cols-2 gap-4">
                                <div class="group">
                                    <div class="relative overflow-hidden rounded-lg">
                                        <img src="{{ $upd->image_before }}" class="w-full h-40 object-cover group-hover:scale-105 transition duration-500" onerror="this.src='https://via.placeholder.com/400x300?text=Foto+Awal'">
                                        <span class="absolute top-2 left-2 bg-black/70 text-white text-xs px-2 py-1 rounded">SEBELUM</span>
                                    </div>
                                </div>
                                <div class="group">
                                    <div class="relative overflow-hidden rounded-lg">
                                        <img src="{{ $upd->image_after }}" class="w-full h-40 object-cover group-hover:scale-105 transition duration-500" onerror="this.src='https://via.placeholder.com/400x300?text=Foto+Akhir'">
                                        <span class="absolute top-2 left-2 bg-saku-primary text-white text-xs px-2 py-1 rounded">SETELAH</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>

                {{-- Lokasi Penyaluran + Google Maps --}}
                <div class="mt-8 bg-white rounded-2xl shadow-sm p-8">
                    <h3 class="font-bold text-lg mb-4 flex items-center gap-2">
                        <i class="fas fa-map-marked-alt text-saku-primary"></i>
                        <span>Lokasi Penyaluran</span>
                    </h3>

                    @if (!empty($program->destination_location))
                    <p class="text-sm text-gray-600 mb-3 flex items-center gap-2">
                        <i class="fas fa-map-marker-alt text-saku-primary"></i>
                        <span>{{ $program->destination_location }}</span>
                    </p>

                    <div class="rounded-2xl overflow-hidden shadow-lg h-64 md:h-80 border border-gray-200">
                        <iframe width="100%" height="100%" style="border:0;" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade"
                            src="https://www.google.com/maps?q={{ urlencode($program->destination_location) }}&output=embed">
                        </iframe>
                    </div>
                    @else
                    <div class="bg-gray-100 rounded-xl h-40 flex flex-col items-center justify-center text-gray-400">
                        <i class="fas fa-map-marker-alt text-3xl mb-2"></i>
                        <p class="font-semibold text-sm">Lokasi penyaluran belum diatur.</p>
                    </div>
                    @endif
                </div>
            </div>

            {{-- Sidebar kanan --}}
            <div class="md:col-span-1">
                <div class="bg-white shadow-lg rounded-2xl p-6 sticky top-24 border border-teal-50">
                    <div class="mb-6">
                        <p class="text-sm text-gray-500 font-bold uppercase">Dana Terkumpul</p>
                        <p class="text-4xl font-extrabold text-saku-primary my-1">Rp {{ number_format($program->collected_amount) }}</p>
                        <p class="text-xs text-gray-400">dari target Rp {{ number_format($program->target_amount) }}</p>

                        <div class="w-full bg-gray-100 rounded-full h-2 mt-3">
                            <div class="bg-saku-primary h-2 rounded-full" style="width: {{ min(($program->collected_amount / $program->target_amount) * 100, 100) }}%"></div>
                        </div>
                    </div>

                    {{-- Autentikasi --}}
                    @guest
                    <a href="{{ route('login') }}" class="w-full block text-center bg-gradient-to-r from-hati-red to-red-600 text-white font-bold py-4 rounded-xl shadow-lg hover:shadow-red-200 hover:-translate-y-1 transition duration-300 mb-3">
                        DONASI SEKARANG <i class="fas fa-arrow-right ml-1"></i>
                    </a>

                    <a href="{{ route('login') }}" class="w-full block border-2 border-teal-100 text-saku-primary bg-teal-50 font-bold py-3 rounded-xl hover:bg-teal-100 hover:border-teal-200 transition flex items-center justify-center gap-2">
                        <i class="fas fa-bell"></i> Ingatkan Saya (Donasi)
                    </a>
                    @endguest

                    @auth
                    <a href="{{ route('checkout', $program->id) }}" class="w-full block text-center bg-gradient-to-r from-hati-red to-red-600 text-white font-bold py-4 rounded-xl shadow-lg hover:shadow-red-200 hover:-translate-y-1 transition duration-300 mb-3">
                        DONASI SEKARANG <i class="fas fa-arrow-right ml-1"></i>
                    </a>

                    <form action="{{ route('subscribe', $program->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="w-full border-2 border-teal-100 text-saku-primary bg-teal-50 font-bold py-3 rounded-xl hover:bg-teal-100 hover:border-teal-200 transition flex items-center justify-center gap-2">
                            <i class="fas fa-bell"></i> Ingatkan Saya (Donasi)
                        </button>
                    </form>
                    @endauth

                    @if(session('success'))
                    <div class="mt-4 p-3 bg-green-100 text-green-700 rounded-lg text-sm border border-green-200 flex items-start gap-2">
                        <i class="fas fa-check-circle mt-1"></i>
                        <span>{{ session('success') }}</span>
                    </div>
                    @endif
                    @if(session('info'))
                    <div class="mt-4 p-3 bg-teal-100 text-teal-700 rounded-lg text-sm border border-teal-200 flex items-start gap-2">
                        <i class="fas fa-info-circle mt-1"></i>
                        <span>{{ session('info') }}</span>
                    </div>
                    @endif

                    <div class="mt-8 pt-8 border-t">
                        <h4 class="font-bold text-gray-800 mb-4 text-sm text-center">Rencana Alokasi Dana</h4>
                        <div class="relative h-48">
                            <canvas id="allocationChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Script untuk Chart.js (Warna Chart disesuaikan)
    const ctx = document.getElementById('allocationChart');
    // Pastikan variabel $allocations dilewatkan dari controller sebagai array [{ allocation_name, percentage }, ...]
    const dataAlloc = @json($allocations ?? []);

    // Default data jika kosong
    let labels = dataAlloc.length ? dataAlloc.map(d => d.allocation_name) : ['Program Utama', 'Operasional', 'Administrasi'];
    // Jika data tidak ada, gunakan persentase default
    let values = dataAlloc.length ? dataAlloc.map(d => parseFloat(d.percentage)) : [80, 15, 5];

    if (ctx) {
        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    data: values,
                    // Warna diubah ke palet Saku Hati
                    backgroundColor: ['#14b8a6', '#0f766e', '#ef4444', '#f59e0b'],
                    borderWidth: 0,
                    hoverOffset: 4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            boxWidth: 10,
                            font: {
                                size: 10
                            }
                        }
                    }
                }
            }
        });
    }
</script>
@endsection