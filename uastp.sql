-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2026 at 01:26 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uastp`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-eudora27@example.com|127.0.0.1', 'i:1;', 1781491449),
('laravel-cache-eudora27@example.com|127.0.0.1:timer', 'i:1781491449;', 1781491449);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint UNSIGNED NOT NULL,
  `id_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` bigint UNSIGNED DEFAULT NULL,
  `tanggal` date NOT NULL,
  `nama_admin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategori_pengeluaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal` decimal(15,2) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `id_transaksi`, `id_user`, `tanggal`, `nama_admin`, `kategori_pengeluaran`, `nominal`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'EXP-000001', NULL, '2026-06-06', 'Joyce', 'Pembelian Stok', 30800.00, 'telur 16 + mika 2', '2026-06-06 12:01:40', '2026-06-06 12:01:40'),
(2, 'EXP-000002', 1, '2026-06-11', 'Joyce', 'Pembelian Stok', 20000.00, 'beras', '2026-06-09 04:13:21', '2026-06-09 04:13:21'),
(3, 'EXP-000003', 5, '2026-06-12', 'Joyce', 'Perlengkapan & Marketing', 10000.00, 'Bizdi Expo', '2026-06-09 04:20:29', '2026-06-09 04:20:29'),
(4, 'EXP-000004', 1, '2026-06-14', 'Ratna', 'Perlengkapan & Marketing', 258600.00, 'baju 4', '2026-06-16 12:51:15', '2026-06-16 12:51:15');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `incomes`
--

CREATE TABLE `incomes` (
  `id` bigint UNSIGNED NOT NULL,
  `id_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` bigint UNSIGNED DEFAULT NULL,
  `tanggal` date NOT NULL,
  `nama_pelanggan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produk` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kuantitas` int DEFAULT '1',
  `harga` decimal(15,2) NOT NULL DEFAULT '0.00',
  `nominal` decimal(15,2) NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `incomes`
--

INSERT INTO `incomes` (`id`, `id_transaksi`, `id_user`, `tanggal`, `nama_pelanggan`, `produk`, `kuantitas`, `harga`, `nominal`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'INC-000001', NULL, '2026-05-23', 'Expo Bandara Adis', 'Minyak Goreng 2L', 3, 47000.00, 141000.00, '2 + 1', '2026-06-07 15:11:52', '2026-06-07 15:11:52'),
(2, 'INC-000002', 1, '2026-05-27', 'Expo Bandara Adis', 'Minyak Goreng 1L', 1, 23000.00, 23000.00, NULL, '2026-06-09 04:18:38', '2026-06-09 04:18:38'),
(3, 'INC-000003', 5, '2026-06-14', 'Papa Ratna', 'Minyak Goreng 2L', 2, 46000.00, 92000.00, 'expo cfd', '2026-06-14 19:54:57', '2026-06-14 19:54:57'),
(4, 'INC-000004', 5, '2026-06-14', 'Dera', 'Minyak Goreng 2L', 2, 46000.00, 92000.00, 'cfd', '2026-06-14 19:57:38', '2026-06-14 19:57:38');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_05_19_073224_add_role_to_users_table', 1),
(5, '2026_05_20_080000_create_incomes_table', 1),
(6, '2026_05_20_080001_create_expenses_table', 1),
(7, '2026_05_23_000000_add_income_fields_to_incomes_table', 1),
(8, '2026_06_08_000001_rename_kuantiti_to_kuantitas_in_incomes_table', 2),
(9, '2026_06_09_000000_add_user_id_to_incomes_and_expenses_table', 3),
(10, '2026_06_09_000001_rename_kategori_to_produk_in_incomes_table', 4),
(11, '2026_06_15_000000_rename_transaction_and_user_columns', 5),
(12, '2026_06_17_update_id_transaksi_format', 6);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('lFnMnJv3KokCtTylIjHuAdnbjb5XhGgs5drurYLw', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiIwQUtCcFgxYTByYjR1VExnNnF3Z3ZwYUE0MzAxWVFwa2ZmT1QwZ05XIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9pbmNvbWUiLCJyb3V0ZSI6ImluY29tZS5pbmRleCJ9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxfQ==', 1781639867),
('nv9FFqT4IjPbUDxvtTgYQ4B32iJNsRfPxGk6H7QI', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJ5MWJ0VVBxSzE0QWZOWEdXUU5pUFR2QXhKbU43TkQxcjN0QXhTTlVkIiwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjEsIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwXC9leHBlbnNlcyIsInJvdXRlIjoiZXhwZW5zZXMuaW5kZXgifX0=', 1781659549);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin@gmail.com', 'admin', NULL, '$2y$12$d3uHd5QvSAkbTIVjFeRLmumm8OBjd2M3lG1uAVfQfR1eCvp0kyIfK', NULL, '2026-06-06 11:20:21', '2026-06-06 11:20:21'),
(2, 'User Biasa', 'user@email.com', 'user', NULL, '$2y$12$d5FPGBns4gW0F8z8QK.oteDdhEqRCceOGmdYHwS2W1e4nFrc6/g3m', NULL, '2026-06-06 11:20:21', '2026-06-06 11:20:21'),
(3, 'Prof. Keenan Haag', 'znader@example.org', 'admin', '2026-06-06 11:20:23', '$2y$12$mv5rqLfjo5Hkj2jqvRa1s.emNXBSxjDNefUO4D6lLF2C0UrfBsiMy', 'OGSpR1oGkb', '2026-06-06 11:20:24', '2026-06-06 11:20:24'),
(4, 'Brain Nitzsche Sr.', 'ezemlak@example.com', 'admin', '2026-06-06 11:20:24', '$2y$12$mv5rqLfjo5Hkj2jqvRa1s.emNXBSxjDNefUO4D6lLF2C0UrfBsiMy', 'dZVM6RiQY8', '2026-06-06 11:20:24', '2026-06-06 11:20:24'),
(5, 'Mr. Porter Purdy MD', 'deja08@example.com', 'admin', '2026-06-06 11:20:24', '$2y$12$mv5rqLfjo5Hkj2jqvRa1s.emNXBSxjDNefUO4D6lLF2C0UrfBsiMy', 'IEUhX3MPeJ', '2026-06-06 11:20:24', '2026-06-06 11:20:24'),
(6, 'Selmer Bergstrom', 'chauncey86@example.net', 'admin', '2026-06-06 11:20:24', '$2y$12$mv5rqLfjo5Hkj2jqvRa1s.emNXBSxjDNefUO4D6lLF2C0UrfBsiMy', 'cCNIvs3Rtf', '2026-06-06 11:20:24', '2026-06-06 11:20:24'),
(7, 'Corene Strosin', 'caitlyn58@example.net', 'admin', '2026-06-06 11:20:24', '$2y$12$mv5rqLfjo5Hkj2jqvRa1s.emNXBSxjDNefUO4D6lLF2C0UrfBsiMy', 'rfLsx6Hewk', '2026-06-06 11:20:24', '2026-06-06 11:20:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `expenses_transaction_id_unique` (`id_transaksi`),
  ADD KEY `expenses_id_user_foreign` (`id_user`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  ADD KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`);

--
-- Indexes for table `incomes`
--
ALTER TABLE `incomes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `incomes_transaction_id_unique` (`id_transaksi`),
  ADD KEY `incomes_id_user_foreign` (`id_user`);

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
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `incomes`
--
ALTER TABLE `incomes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `expenses`
--
ALTER TABLE `expenses`
  ADD CONSTRAINT `expenses_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `incomes`
--
ALTER TABLE `incomes`
  ADD CONSTRAINT `incomes_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
