-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2025 at 01:48 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;
/*!40101 SET NAMES utf8mb4 */
;
--
-- Database: `inovasi_db`
--

-- --------------------------------------------------------
--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `donor_name` varchar(255) NOT NULL,
  `donor_email` varchar(255) NOT NULL,
  `tracking_code` varchar(255) NOT NULL,
  `amount` decimal(15, 2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending',
  `distribution_proof` text DEFAULT NULL,
  `distributed_at` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (
    `id`,
    `program_id`,
    `user_id`,
    `donor_name`,
    `donor_email`,
    `tracking_code`,
    `amount`,
    `status`,
    `distribution_proof`,
    `distributed_at`,
    `created_at`,
    `updated_at`
  )
VALUES (
    1,
    1,
    1,
    'Donatur Dermawan',
    'user@demo.com',
    'TRX-999',
    1000000.00,
    'distributed',
    'Foto serah terima bantuan logistik #Batch1',
    '2025-12-06',
    '2025-12-04 05:20:11',
    NULL
  ),
  (
    2,
    5,
    1,
    'Donatur Dermawan',
    'user@demo.com',
    'TRX-888',
    500000.00,
    'verified',
    NULL,
    NULL,
    '2025-12-09 05:20:11',
    NULL
  ),
  (
    3,
    4,
    1,
    'Donatur Dermawan',
    'user@demo.com',
    'TRX-777',
    200000.00,
    'pending',
    NULL,
    NULL,
    '2025-12-11 04:20:11',
    NULL
  ),
  (
    4,
    1,
    NULL,
    'Hamba Allah',
    'guest1@mail.com',
    'TRX-001',
    50000.00,
    'verified',
    NULL,
    NULL,
    '2025-12-11 05:10:11',
    NULL
  ),
  (
    5,
    1,
    NULL,
    'PT. Sinar Jaya Abadi',
    'csr@sinarjaya.com',
    'TRX-CORP',
    25000000.00,
    'distributed',
    'Berita Acara Serah Terima CSR No. 402/CSR/2024',
    '2025-12-10',
    '2025-12-08 05:20:11',
    NULL
  ),
  (
    6,
    5,
    NULL,
    'Siti Aminah',
    'siti@mail.com',
    'TRX-SITI',
    150000.00,
    'verified',
    NULL,
    NULL,
    '2025-12-11 00:20:11',
    NULL
  ),
  (
    7,
    5,
    NULL,
    'Budi & Keluarga',
    'budi@mail.com',
    'TRX-BUDI',
    1000000.00,
    'distributed',
    'Dokumentasi Pemasangan Pipa RW 05',
    '2025-12-01',
    '2025-11-29 05:20:11',
    NULL
  ),
  (
    8,
    4,
    NULL,
    'Hamba Allah',
    'anon@mail.com',
    'TRX-ANON',
    10000000.00,
    'verified',
    NULL,
    NULL,
    '2025-12-11 02:20:11',
    NULL
  ),
  (
    9,
    1,
    NULL,
    'Komunitas Sepeda JKT',
    'community@mail.com',
    'TRX-COM',
    3500000.00,
    'verified',
    NULL,
    NULL,
    '2025-12-10 05:20:11',
    NULL
  );
-- --------------------------------------------------------
--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `fund_allocations`
--

CREATE TABLE `fund_allocations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_id` bigint(20) UNSIGNED NOT NULL,
  `allocation_name` varchar(255) NOT NULL,
  `amount` decimal(15, 2) NOT NULL,
  `percentage` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
--
-- Dumping data for table `fund_allocations`
--

INSERT INTO `fund_allocations` (
    `id`,
    `program_id`,
    `allocation_name`,
    `amount`,
    `percentage`,
    `created_at`,
    `updated_at`
  )
VALUES (
    1,
    1,
    'Logistik & Pangan',
    400000000.00,
    '80%',
    '2025-12-11 05:20:11',
    NULL
  ),
  (
    2,
    1,
    'Operasional Lapangan',
    50000000.00,
    '10%',
    '2025-12-11 05:20:11',
    NULL
  ),
  (
    3,
    1,
    'Obat-obatan',
    50000000.00,
    '10%',
    '2025-12-11 05:20:11',
    NULL
  );
-- --------------------------------------------------------
--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `legal_documents`
--

CREATE TABLE `legal_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `document_name` varchar(255) NOT NULL,
  `file_url` varchar(255) NOT NULL,
  `verified_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
--
-- Dumping data for table `legal_documents`
--

INSERT INTO `legal_documents` (
    `id`,
    `document_name`,
    `file_url`,
    `verified_date`,
    `created_at`,
    `updated_at`
  )
VALUES (
    1,
    'SK KEMENKUMHAM',
    '#',
    '2025-12-11',
    '2025-12-11 05:20:11',
    NULL
  ),
  (
    2,
    'Audit WTP 2024',
    '#',
    '2025-12-11',
    '2025-12-11 05:20:11',
    NULL
  );
-- --------------------------------------------------------
--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (1, '0001_01_01_000000_create_users_table', 1),
  (2, '0001_01_01_000001_create_cache_table', 1),
  (3, '0001_01_01_000002_create_jobs_table', 1),
  (4, '2025_12_11_101813_create_programs_table', 1),
  (5, '2025_12_11_101814_create_donations_table', 1),
  (
    6,
    '2025_12_11_101814_create_program_updates_table',
    1
  ),
  (
    7,
    '2025_12_11_101815_create_fund_allocations_table',
    1
  ),
  (
    8,
    '2025_12_11_101815_create_subscriptions_table',
    1
  ),
  (
    9,
    '2025_12_11_101815_create_team_members_table',
    1
  ),
  (
    10,
    '2025_12_11_101816_create_legal_documents_table',
    1
  ),
  (11, '2025_12_11_101816_create_partners_table', 1),
  (
    12,
    '2025_12_11_113256_add_image_to_programs_table',
    1
  );
-- --------------------------------------------------------
--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo_url` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (
    `id`,
    `name`,
    `logo_url`,
    `type`,
    `created_at`,
    `updated_at`
  )
VALUES (
    1,
    'Bank Syariah Indonesia',
    'bsi.png',
    'Mitra Bank',
    '2025-12-11 05:20:11',
    NULL
  ),
  (
    2,
    'Kitabisa.com',
    'kitabisa.png',
    'Mitra Platform',
    '2025-12-11 05:20:11',
    NULL
  ),
  (
    3,
    'Baznas',
    'baznas.png',
    'Mitra Strategis',
    '2025-12-11 05:20:11',
    NULL
  );
-- --------------------------------------------------------
--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category` varchar(255) NOT NULL,
  `target_amount` decimal(15, 2) NOT NULL,
  `collected_amount` decimal(15, 2) NOT NULL DEFAULT 0.00,
  `impact_formula` varchar(255) NOT NULL,
  `deadline` date NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `thumbnail` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (
    `id`,
    `title`,
    `description`,
    `image`,
    `category`,
    `target_amount`,
    `collected_amount`,
    `impact_formula`,
    `deadline`,
    `is_active`,
    `thumbnail`,
    `created_at`,
    `updated_at`
  )
VALUES (
    1,
    'Pembangunan Sumur Air Bersih Darurat',
    'Aksi tanggap cepat membangun sumur bor di desa yang mengalami krisis air parah di Nusa Tenggara Timur. Setiap donasi menyelamatkan nyawa dan menjadi pahala jariyah.',
    'https://images.unsplash.com/photo-1579308104868-6b27e1f46f04?w=800&q=80',
    'Darurat',
    20000000.00,
    17500000.00,
    'Rp 100.000 = 1 Meter Pipa Air',
    '2025-12-26',
    1,
    NULL,
    '2025-12-11 05:20:11',
    NULL
  ),
  (
    2,
    'Bantuan Makanan Darurat – Lombok',
    'Menyediakan paket makanan segera untuk keluarga yang terkena dampak bencana di Lombok.',
    'https://images.unsplash.com/photo-1559027615-cd4628902d4a?w=800&q=80',
    'Darurat',
    50000000.00,
    25630000.00,
    'Rp 100.000 = 1 Paket Makanan',
    '2025-12-31',
    1,
    NULL,
    '2025-12-10 05:20:11',
    NULL
  ),
  (
    3,
    'Layanan Kesehatan untuk Pengungsi',
    'Mendukung kebutuhan kesehatan bagi keluarga yang mengungsi. Menyediakan obat-obatan, konsultasi, dan layanan kesehatan dasar.',
    'https://images.unsplash.com/photo-1584820927498-cfe5211fd8bf?w=800&q=80',
    'Normal',
    30000000.00,
    12485000.00,
    'Rp 50.000 = 1x Konsultasi Medis',
    '2026-01-15',
    1,
    NULL,
    '2025-12-09 05:20:11',
    NULL
  ),
  (
    4,
    'Dukungan Pendidikan Anak',
    'Membantu mendanai perlengkapan sekolah dan program belajar untuk anak-anak kurang mampu.',
    'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=800&q=80',
    'Mendesak',
    15000000.00,
    8210000.00,
    'Rp 200.000 = SPP 1 Bulan',
    '2025-12-21',
    1,
    NULL,
    '2025-12-08 05:20:11',
    NULL
  ),
  (
    5,
    'Akses Air Bersih di Kenya',
    'Menyediakan sumber daya dan infrastruktur air untuk komunitas yang kekurangan akses air bersih. Membangun sumur dan sistem filtrasi air.',
    'https://images.unsplash.com/photo-1541544181051-e46607bc22a4?w=800&q=80',
    'Normal',
    60000000.00,
    35720000.00,
    'Rp 100.000 = 1 Meter Pipa Air',
    '2026-03-11',
    1,
    NULL,
    '2025-12-07 05:20:11',
    NULL
  ),
  (
    6,
    'Program Penampungan Pemulihan Bencana',
    'Membangun tempat penampungan sementara bagi keluarga yang mengungsi akibat bencana alam. Menyediakan perumahan aman dan kebutuhan hidup esensial.',
    'https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?w=800&q=80',
    'Darurat',
    25000000.00,
    19180000.00,
    'Rp 500.000 = Material Penampungan',
    '2025-12-16',
    1,
    NULL,
    '2025-12-06 05:20:11',
    NULL
  ),
  (
    7,
    'Inisiatif Gizi Komunitas',
    'Membantu mendanai program pencegahan malnutrisi di komunitas yang kurang terlayani. Menyediakan makanan bergizi dan edukasi kesehatan.',
    'https://images.unsplash.com/photo-1488521787991-ed7bbaae773c?w=800&q=80',
    'Normal',
    25000000.00,
    3399000.00,
    'Rp 25.000 = 1 Porsi Makanan Sehat',
    '2026-01-25',
    1,
    NULL,
    '2025-12-05 05:20:11',
    NULL
  ),
  (
    8,
    'Dukungan Pendidikan Pedesaan',
    'Mendirikan pusat pembelajaran dan menyediakan sumber daya edukasi untuk anak-anak di daerah pedesaan terpencil.',
    'https://images.unsplash.com/photo-1497633762265-9d179a990aa6?w=800&q=80',
    'Mendesak',
    40000000.00,
    15200000.00,
    'Rp 500.000 = 1 Meja Belajar',
    '2025-12-31',
    1,
    NULL,
    '2025-12-04 05:20:11',
    NULL
  ),
  (
    9,
    'Dana Medis Darurat',
    'Dana tanggap cepat medis untuk komunitas yang terkena bencana dan keadaan darurat. Menyediakan perawatan medis dan suplai segera.',
    'https://images.unsplash.com/photo-1576091160550-2173dba999ef?w=800&q=80',
    'Darurat',
    35000000.00,
    22450000.00,
    'Rp 100.000 = 1 Kotak Obat P3K',
    '2025-12-23',
    1,
    NULL,
    '2025-12-03 05:20:11',
    NULL
  ),
  (
    10,
    'Perlengkapan Sekolah untuk Anak',
    'Menyediakan perlengkapan sekolah esensial termasuk tas, buku catatan, pulpen, dan buku pelajaran untuk siswa kurang mampu.',
    'https://images.unsplash.com/photo-1544027993-37dbfe43562a?w=800&q=80',
    'Mendesak',
    12000000.00,
    7800000.00,
    'Rp 150.000 = 1 Set Alat Sekolah',
    '2026-02-09',
    1,
    NULL,
    '2025-12-02 05:20:11',
    NULL
  );
-- --------------------------------------------------------
--
-- Table structure for table `program_updates`
--

CREATE TABLE `program_updates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `program_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `image_before` varchar(255) DEFAULT NULL,
  `image_after` varchar(255) DEFAULT NULL,
  `video_url` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
--
-- Dumping data for table `program_updates`
--

INSERT INTO `program_updates` (
    `id`,
    `program_id`,
    `title`,
    `content`,
    `image_before`,
    `image_after`,
    `video_url`,
    `latitude`,
    `longitude`,
    `created_at`,
    `updated_at`
  )
VALUES (
    1,
    5,
    'Air Sudah Mengalir!',
    'Alhamdulillah, pengeboran sedalam 60 meter berhasil mengeluarkan air bersih yang melimpah. Warga kini tidak perlu berjalan 5km lagi.',
    'https://via.placeholder.com/400x300/550000/FFFFFF?text=Tanah+Kering',
    'https://via.placeholder.com/400x300/005500/FFFFFF?text=Air+Mengalir',
    NULL,
    NULL,
    NULL,
    '2025-12-11 05:20:11',
    NULL
  );
-- --------------------------------------------------------
--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `program_id` bigint(20) UNSIGNED NOT NULL,
  `notify_updates` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
-- --------------------------------------------------------
--
-- Table structure for table `team_members`
--

CREATE TABLE `team_members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `photo_url` varchar(255) DEFAULT NULL,
  `linkedin_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
--
-- Dumping data for table `team_members`
--

INSERT INTO `team_members` (
    `id`,
    `name`,
    `position`,
    `photo_url`,
    `linkedin_url`,
    `created_at`,
    `updated_at`
  )
VALUES (
    1,
    'Ann Abigail Halim',
    '2702260943',
    NULL,
    NULL,
    '2025-12-11 05:20:11',
    NULL
  ),
  (
    2,
    'Britney Angeline Soeseno',
    '2702333586',
    NULL,
    NULL,
    '2025-12-11 05:20:11',
    NULL
  ),
  (
    3,
    'Carmenita Angelica',
    '2702268864',
    NULL,
    NULL,
    '2025-12-11 05:20:11',
    NULL
  ),
  (
    4,
    'Nadya Angelie Lislie',
    '2702321680',
    NULL,
    NULL,
    '2025-12-11 05:20:11',
    NULL
  );
-- --------------------------------------------------------
--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'donor',
  `avatar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (
    `id`,
    `name`,
    `email`,
    `password`,
    `role`,
    `avatar`,
    `created_at`,
    `updated_at`
  )
VALUES (
    1,
    'Donatur Dermawan',
    'user@demo.com',
    '$2y$12$riVcYFNYiup7OZ8DRFM0tOwgIqFiMnmjGVkj5.1ejMBOgPTRPkoTm',
    'donor',
    NULL,
    '2025-12-11 05:20:11',
    NULL
  ),
  (
    2,
    'CARMENITA ANGELICA',
    'carmenitaang26@gmail.com',
    '$2y$12$Bvku6xQCDF7BKePGhHPkPOQ82z8CKrNbFw063CPcSmN9Vt3Q4ikdu',
    'donor',
    NULL,
    '2025-12-11 05:36:24',
    '2025-12-11 05:36:24'
  );
--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
ADD PRIMARY KEY (`key`);
--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
ADD PRIMARY KEY (`key`);
--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `donations_tracking_code_unique` (`tracking_code`),
  ADD KEY `donations_program_id_foreign` (`program_id`),
  ADD KEY `donations_user_id_foreign` (`user_id`);
--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);
--
-- Indexes for table `fund_allocations`
--
ALTER TABLE `fund_allocations`
ADD PRIMARY KEY (`id`),
  ADD KEY `fund_allocations_program_id_foreign` (`program_id`);
--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);
--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
ADD PRIMARY KEY (`id`);
--
-- Indexes for table `legal_documents`
--
ALTER TABLE `legal_documents`
ADD PRIMARY KEY (`id`);
--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
ADD PRIMARY KEY (`id`);
--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
ADD PRIMARY KEY (`id`);
--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
ADD PRIMARY KEY (`id`);
--
-- Indexes for table `program_updates`
--
ALTER TABLE `program_updates`
ADD PRIMARY KEY (`id`),
  ADD KEY `program_updates_program_id_foreign` (`program_id`);
--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
ADD PRIMARY KEY (`id`),
  ADD KEY `subscriptions_user_id_foreign` (`user_id`),
  ADD KEY `subscriptions_program_id_foreign` (`program_id`);
--
-- Indexes for table `team_members`
--
ALTER TABLE `team_members`
ADD PRIMARY KEY (`id`);
--
-- Indexes for table `users`
--
ALTER TABLE `users`
ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 10;
--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fund_allocations`
--
ALTER TABLE `fund_allocations`
MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 4;
--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `legal_documents`
--
ALTER TABLE `legal_documents`
MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 3;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 13;
--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 4;
--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 11;
--
-- AUTO_INCREMENT for table `program_updates`
--
ALTER TABLE `program_updates`
MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 2;
--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `team_members`
--
ALTER TABLE `team_members`
MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
ADD CONSTRAINT `donations_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `donations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
--
-- Constraints for table `fund_allocations`
--
ALTER TABLE `fund_allocations`
ADD CONSTRAINT `fund_allocations_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE;
--
-- Constraints for table `program_updates`
--
ALTER TABLE `program_updates`
ADD CONSTRAINT `program_updates_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE;
--
-- Constraints for table `subscriptions`
--
ALTER TABLE `subscriptions`
ADD CONSTRAINT `subscriptions_program_id_foreign` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;