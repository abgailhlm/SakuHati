<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // === DATA PROGRAM (10 Program Lengkap) ===
        $programsData = [
            // 1. Pembangunan Sumur Air Bersih Darurat (Urgent)
            [
                'title' => 'Pembangunan Sumur Air Bersih Darurat',
                'description' => 'Aksi tanggap cepat membangun sumur bor di desa yang mengalami krisis air parah di Nusa Tenggara Timur. Setiap donasi menyelamatkan nyawa dan menjadi pahala jariyah.',
                'image' => 'https://images.unsplash.com/photo-1743222270396-703376b47d58?q=80&w=1470',
                'category' => 'Darurat',
                'target_amount' => 20000000,
                'collected_amount' => 17500000,
                'impact_formula' => 'Rp 100.000 = 1 Meter Pipa Air',
                'deadline' => now()->addDays(15),
                'created_at' => now(),
            ],
            // 2. Bantuan Makanan Darurat – Lombok
            [
                'title' => 'Bantuan Makanan Darurat – Lombok',
                'description' => 'Menyediakan paket makanan segera untuk keluarga yang terkena dampak bencana di Lombok.',
                'image' => 'https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=800&q=80',
                'category' => 'Darurat',
                'target_amount' => 50000000,
                'collected_amount' => 25630000,
                'impact_formula' => 'Rp 100.000 = 1 Paket Makanan',
                'deadline' => now()->addDays(20),
                'created_at' => now()->subDays(1),
            ],
            // 3. Layanan Kesehatan untuk Pengungsi
            [
                'title' => 'Layanan Kesehatan untuk Pengungsi',
                'description' => 'Mendukung kebutuhan kesehatan bagi keluarga yang mengungsi. Menyediakan obat-obatan, konsultasi, dan layanan kesehatan dasar.',
                'image' => 'https://images.unsplash.com/photo-1584820927498-cfe5211fd8bf?w=800&q=80',
                'category' => 'Normal',
                'target_amount' => 30000000,
                'collected_amount' => 12485000,
                'impact_formula' => 'Rp 50.000 = 1x Konsultasi Medis',
                'deadline' => now()->addDays(35),
                'created_at' => now()->subDays(2),
            ],
            // 4. Dukungan Pendidikan Anak
            [
                'title' => "Dukungan Pendidikan Anak",
                'description' => 'Membantu mendanai perlengkapan sekolah dan program belajar untuk anak-anak kurang mampu.',
                'image' => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=800&q=80',
                'category' => 'Mendesak',
                'target_amount' => 15000000,
                'collected_amount' => 8210000,
                'impact_formula' => 'Rp 200.000 = SPP 1 Bulan',
                'deadline' => now()->addDays(10),
                'created_at' => now()->subDays(3),
            ],
            // 5. Akses Air Bersih di Kenya
            [
                'title' => 'Akses Air Bersih di Kenya',
                'description' => 'Menyediakan sumber daya dan infrastruktur air untuk komunitas yang kekurangan akses air bersih. Membangun sumur dan sistem filtrasi air.',
                'image' => 'https://images.unsplash.com/photo-1541544181051-e46607bc22a4?w=800&q=80',
                'category' => 'Normal',
                'target_amount' => 60000000,
                'collected_amount' => 35720000,
                'impact_formula' => 'Rp 100.000 = 1 Meter Pipa Air',
                'deadline' => now()->addDays(90),
                'created_at' => now()->subDays(4),
            ],
            // 6. Program Penampungan Pemulihan Bencana
            [
                'title' => 'Program Penampungan Pemulihan Bencana',
                'description' => 'Membangun tempat penampungan sementara bagi keluarga yang mengungsi akibat bencana alam. Menyediakan perumahan aman dan kebutuhan hidup esensial.',
                'image' => 'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?w=800&q=80',
                'category' => 'Darurat',
                'target_amount' => 25000000,
                'collected_amount' => 19180000,
                'impact_formula' => 'Rp 500.000 = Material Penampungan',
                'deadline' => now()->addDays(5),
                'created_at' => now()->subDays(5),
            ],
            // 7. Inisiatif Gizi Komunitas
            [
                'title' => 'Inisiatif Gizi Komunitas',
                'description' => 'Membantu mendanai program pencegahan malnutrisi di komunitas yang kurang terlayani. Menyediakan makanan bergizi dan edukasi kesehatan.',
                'image' => 'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?w=800&q=80',
                'category' => 'Normal',
                'target_amount' => 25000000,
                'collected_amount' => 3399000,
                'impact_formula' => 'Rp 25.000 = 1 Porsi Makanan Sehat',
                'deadline' => now()->addDays(45),
                'created_at' => now()->subDays(6),
            ],
            // 8. Dukungan Pendidikan Pedesaan
            [
                'title' => 'Dukungan Pendidikan Pedesaan',
                'description' => 'Mendirikan pusat pembelajaran dan menyediakan sumber daya edukasi untuk anak-anak di daerah pedesaan terpencil.',
                'image' => 'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?w=800&q=80',
                'category' => 'Mendesak',
                'target_amount' => 40000000,
                'collected_amount' => 15200000,
                'impact_formula' => 'Rp 500.000 = 1 Meja Belajar',
                'deadline' => now()->addDays(20),
                'created_at' => now()->subDays(7),
            ],
            // 9. Dana Medis Darurat
            [
                'title' => 'Dana Medis Darurat',
                'description' => 'Dana tanggap cepat medis untuk komunitas yang terkena bencana dan keadaan darurat. Menyediakan perawatan medis dan suplai segera.',
                'image' => 'https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=800&q=80',
                'category' => 'Darurat',
                'target_amount' => 35000000,
                'collected_amount' => 22450000,
                'impact_formula' => 'Rp 100.000 = 1 Kotak Obat P3K',
                'deadline' => now()->addDays(12),
                'created_at' => now()->subDays(8),
            ],
            // 10. Perlengkapan Sekolah untuk Anak
            [
                'title' => 'Perlengkapan Sekolah untuk Anak',
                'description' => 'Menyediakan perlengkapan sekolah esensial termasuk tas, buku catatan, pulpen, dan buku pelajaran untuk siswa kurang mampu.',
                'image' => 'https://images.unsplash.com/photo-1544027993-37dbfe43562a?w=800&q=80',
                'category' => 'Mendesak',
                'target_amount' => 12000000,
                'collected_amount' => 7800000,
                'impact_formula' => 'Rp 150.000 = 1 Set Alat Sekolah',
                'deadline' => now()->addDays(60),
                'created_at' => now()->subDays(9),
            ],
        ];


        // 1. DATA USER LOGIN
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $user = DB::table('users')->insertGetId([
            'name' => 'Donatur Dermawan',
            'email' => 'user@demo.com',
            'password' => Hash::make('password'), // Kata Sandi: password
            'role' => 'donor',
            'created_at' => now(),
        ]);

        // 2. DATA PROGRAM DONASI
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('programs')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Memasukkan 10 Program dan mendapatkan ID-nya
        $programIds = [];
        foreach ($programsData as $data) {
            $programIds[] = DB::table('programs')->insertGetId($data);
        }

        // Definisikan prog1, prog2, prog3
        $prog1 = $programIds[0]; // Pembangunan Sumur Darurat (Index 0)
        $prog2 = $programIds[4]; // Akses Air Bersih di Kenya (Index 4)
        $prog3 = $programIds[3]; // Dukungan Pendidikan Anak (Index 3)

        // 3. DATA DONASI
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('donations')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('donations')->insert([
            // --- DONASI MILIK USER YANG LOGIN ---
            [
                'program_id' => $prog1,
                'user_id' => $user,
                'donor_name' => 'Donatur Dermawan',
                'donor_email' => 'user@demo.com',
                'tracking_code' => 'TRX-999',
                'amount' => 1000000,
                'status' => 'distributed', // Terdistribusi
                'distribution_proof' => 'Foto serah terima bantuan logistik #Batch1',
                'distributed_at' => now()->subDays(5),
                'created_at' => now()->subDays(7)
            ],
            [
                'program_id' => $prog2,
                'user_id' => $user,
                'donor_name' => 'Donatur Dermawan',
                'donor_email' => 'user@demo.com',
                'tracking_code' => 'TRX-888',
                'amount' => 500000,
                'status' => 'verified', // Terverifikasi
                'distribution_proof' => null,
                'distributed_at' => null,
                'created_at' => now()->subDays(2)
            ],
            [
                'program_id' => $prog3,
                'user_id' => $user,
                'donor_name' => 'Donatur Dermawan',
                'donor_email' => 'user@demo.com',
                'tracking_code' => 'TRX-777',
                'amount' => 200000,
                'status' => 'pending', // Menunggu Pembayaran
                'distribution_proof' => null,
                'distributed_at' => null,
                'created_at' => now()->subHours(1)
            ],

            // --- DONASI ORANG LAIN ---
            [
                'program_id' => $prog1,
                'user_id' => null,
                'donor_name' => 'Hamba Allah',
                'donor_email' => 'guest1@mail.com',
                'tracking_code' => 'TRX-001',
                'amount' => 50000,
                'status' => 'verified',
                'distribution_proof' => null,
                'distributed_at' => null,
                'created_at' => now()->subMinutes(10)
            ],
            [
                'program_id' => $prog1,
                'user_id' => null,
                'donor_name' => 'PT. Sinar Jaya Abadi',
                'donor_email' => 'csr@sinarjaya.com',
                'tracking_code' => 'TRX-CORP',
                'amount' => 25000000,
                'status' => 'distributed',
                'distribution_proof' => 'Berita Acara Serah Terima CSR No. 402/CSR/2024',
                'distributed_at' => now()->subDays(1),
                'created_at' => now()->subDays(3)
            ],
            [
                'program_id' => $prog2,
                'user_id' => null,
                'donor_name' => 'Siti Aminah',
                'donor_email' => 'siti@mail.com',
                'tracking_code' => 'TRX-SITI',
                'amount' => 150000,
                'status' => 'verified',
                'distribution_proof' => null,
                'distributed_at' => null,
                'created_at' => now()->subHours(5)
            ],
            [
                'program_id' => $prog2,
                'user_id' => null,
                'donor_name' => 'Budi & Keluarga',
                'donor_email' => 'budi@mail.com',
                'tracking_code' => 'TRX-BUDI',
                'amount' => 1000000,
                'status' => 'distributed',
                'distribution_proof' => 'Dokumentasi Pemasangan Pipa RW 05',
                'distributed_at' => now()->subDays(10),
                'created_at' => now()->subDays(12)
            ],
            [
                'program_id' => $prog3,
                'user_id' => null,
                'donor_name' => 'Hamba Allah',
                'donor_email' => 'anon@mail.com',
                'tracking_code' => 'TRX-ANON',
                'amount' => 10000000,
                'status' => 'verified',
                'distribution_proof' => null,
                'distributed_at' => null,
                'created_at' => now()->subHours(3)
            ],
            [
                'program_id' => $prog1,
                'user_id' => null,
                'donor_name' => 'Komunitas Sepeda JKT',
                'donor_email' => 'community@mail.com',
                'tracking_code' => 'TRX-COM',
                'amount' => 3500000,
                'status' => 'verified',
                'distribution_proof' => null,
                'distributed_at' => null,
                'created_at' => now()->subDays(1)
            ],
        ]);

        // 4. DATA ALOKASI DANA
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('fund_allocations')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('fund_allocations')->insert([
            ['program_id' => $prog1, 'allocation_name' => 'Logistik & Pangan', 'amount' => 400000000, 'percentage' => '80%', 'created_at' => now()],
            ['program_id' => $prog1, 'allocation_name' => 'Operasional Lapangan', 'amount' => 50000000, 'percentage' => '10%', 'created_at' => now()],
            ['program_id' => $prog1, 'allocation_name' => 'Obat-obatan', 'amount' => 50000000, 'percentage' => '10%', 'created_at' => now()],
        ]);

        // 5. UPDATE CERITA (STORYTELLING)
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('program_updates')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('program_updates')->insert([
            'program_id' => $prog2,
            'title' => 'Air Sudah Mengalir!',
            'content' => 'Alhamdulillah, pengeboran sedalam 60 meter berhasil mengeluarkan air bersih yang melimpah. Warga kini tidak perlu berjalan 5km lagi.',
            'image_before' => 'https://via.placeholder.com/400x300/550000/FFFFFF?text=Tanah+Kering',
            'image_after' => 'https://via.placeholder.com/400x300/005500/FFFFFF?text=Air+Mengalir',
            'created_at' => now(),
        ]);

        // 6. DATA TIM
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('team_members')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('team_members')->insert([
            ['name' => 'Ann Abigail Halim', 'position' => '2702260943', 'created_at' => now()],
            ['name' => 'Britney Angeline Soeseno', 'position' => '2702333586', 'created_at' => now()],
            ['name' => 'Carmenita Angelica', 'position' => '2702268864', 'created_at' => now()],
            ['name' => 'Nadya Angelie Lislie', 'position' => '2702321680', 'created_at' => now()],
        ]);

        // 7. DATA MITRA
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('partners')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('partners')->insert([
            ['name' => 'Bank Syariah Indonesia', 'logo_url' => 'bsi.png', 'type' => 'Mitra Bank', 'created_at' => now()],
            ['name' => 'Kitabisa.com', 'logo_url' => 'kitabisa.png', 'type' => 'Mitra Platform', 'created_at' => now()],
            ['name' => 'Baznas', 'logo_url' => 'baznas.png', 'type' => 'Mitra Strategis', 'created_at' => now()],
        ]);

        // 8. DATA LEGALITAS
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('legal_documents')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        DB::table('legal_documents')->insert([
            ['document_name' => 'SK KEMENKUMHAM', 'file_url' => '#', 'verified_date' => now(), 'created_at' => now()],
            ['document_name' => 'Audit WTP 2024', 'file_url' => '#', 'verified_date' => now(), 'created_at' => now()],
        ]);
    }
}
