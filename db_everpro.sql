-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2025 at 04:17 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_everpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad_accounts`
--

CREATE TABLE `ad_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `platform_id` int(10) UNSIGNED NOT NULL,
  `account_id` varchar(255) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `status` enum('active','inactive','problem') NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ad_accounts`
--

INSERT INTO `ad_accounts` (`id`, `user_id`, `platform_id`, `account_id`, `account_name`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'fb-123456789', 'Akun Iklan Farez', 'active', '2025-08-28 06:49:15', '2025-08-28 06:49:15'),
(2, 1, 2, 'google-987654', 'Akun Iklan Google Farez', 'active', '2025-08-28 06:49:15', '2025-08-28 06:49:15');

-- --------------------------------------------------------

--
-- Table structure for table `ad_campaigns`
--

CREATE TABLE `ad_campaigns` (
  `id` int(10) UNSIGNED NOT NULL,
  `account_id` int(10) UNSIGNED NOT NULL,
  `campaign_id` varchar(255) NOT NULL,
  `campaign_name` varchar(255) NOT NULL,
  `spend` decimal(10,2) NOT NULL DEFAULT 0.00,
  `conversions` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `status` enum('running','paused','finished','problem') NOT NULL DEFAULT 'running',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ad_campaigns`
--

INSERT INTO `ad_campaigns` (`id`, `account_id`, `campaign_id`, `campaign_name`, `spend`, `conversions`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'camp-001', 'Kampanye Penjualan Musim Panas', 1500000.00, 250, 'running', '2025-08-28 06:49:15', '2025-08-28 06:49:15'),
(2, 1, 'camp-002', 'Iklan Promosi Diskon', 500000.00, 120, 'finished', '2025-08-28 06:49:15', '2025-08-28 06:49:15'),
(3, 1, 'camp-003', 'Iklan Bermasalah', 250000.00, 30, 'problem', '2025-08-28 06:49:15', '2025-08-28 06:49:15');

-- --------------------------------------------------------

--
-- Table structure for table `ad_platforms`
--

CREATE TABLE `ad_platforms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ad_platforms`
--

INSERT INTO `ad_platforms` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Facebook Ads', 'Platform iklan Meta untuk Facebook dan Instagram.', '2025-08-28 06:49:15', '2025-08-28 06:49:15'),
(2, 'Google Ads', 'Platform iklan Google untuk penelusuran, YouTube, dll.', '2025-08-28 06:49:15', '2025-08-28 06:49:15');

-- --------------------------------------------------------

--
-- Table structure for table `ad_reviews`
--

CREATE TABLE `ad_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ad_account_id` bigint(20) UNSIGNED DEFAULT NULL,
  `campaign_name` varchar(255) NOT NULL,
  `creative_image` varchar(255) NOT NULL,
  `creative_text` text DEFAULT NULL,
  `status` enum('pending','approved','rejected') NOT NULL DEFAULT 'pending',
  `notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-farez@gmail.com|127.0.0.1', 'i:1;', 1756382646),
('laravel-cache-farez@gmail.com|127.0.0.1:timer', 'i:1756382646;', 1756382646),
('laravel-cache-farezeverpro@gmail.com|127.0.0.1', 'i:1;', 1756382678),
('laravel-cache-farezeverpro@gmail.com|127.0.0.1:timer', 'i:1756382678;', 1756382678),
('laravel-cache-farezkiputra@gmail.com|127.0.0.1', 'i:1;', 1756436440),
('laravel-cache-farezkiputra@gmail.com|127.0.0.1:timer', 'i:1756436440;', 1756436440);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `iklans`
--

CREATE TABLE `iklans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `aktif` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `iklans`
--

INSERT INTO `iklans` (`id`, `judul`, `gambar`, `link`, `deskripsi`, `aktif`, `created_at`, `updated_at`) VALUES
(1, 'EVERPRO', 'XUUCRqfR3nHBCSm4zywa1220l73rPjCJuiE5qkKz.png', 'https://customer.everpro.id/home?timelineIndex=2', NULL, 1, '2025-09-01 18:03:23', '2025-09-01 18:03:23'),
(2, 'EVERPROS02', 'rMjHUqEF6OY0hcmMcDrGoEoPxVarix1lqy8pMJg5.png', 'https://customer.everpro.id/home?timelineIndex=2', NULL, 1, '2025-09-01 18:05:31', '2025-09-01 18:05:31'),
(3, 'EVERPROS03', 'fmrQa2IrBhLENHFBBOvXfk5H6jsErPx2EiNrSYHI.jpg', 'https://customer.everpro.id/home?timelineIndex=2', NULL, 1, '2025-09-01 18:07:46', '2025-09-01 18:07:46');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_09_02_004918_create_iklans_table', 2),
(5, '2025_09_03_005048_create_ad_reviews_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('lHD2Ppo5JZPNP4vdLQz0mRdIBWMspQQVnRqBvVw2', 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiWFFnRWlrenlkMUxxSHI5SHZKcENMSmRaNkpwbmM4Sk83TlNoblJMcyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzU6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZHMvcGxhdGZvcm1zIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6ODt9', 1756865718),
('Om4fRu83Vg81rOWTL6TUqUyWbYRRjYm6tgNMKHC3', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiYWJjeWdTUzM1eTFjM3pLNnBKRGxhQzEwYTd3NXVhRWlpVDNHU1ZiQiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9pa2xhbi9jcmVhdGUiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTo1O30=', 1756800972),
('VVAoUJ8f3H8kwg8L20U8QWxm9aRlbeKVJCsYFj89', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiY1JabHJMNVFRaTgwS1VScWViRzR4aXB0cnVuUGFUeDRwSHRlaUp0RCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9pa2xhbiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjU7fQ==', 1756819867);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('client','admin') NOT NULL DEFAULT 'client',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Farez', 'farez@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uhe.vJg.q', 'client', '2025-08-28 06:49:15', '2025-08-28 06:49:15'),
(4, 'Farez', 'farezkayzi@gmail.com', '$2y$12$4jXfAsgkNLp2BsUhmf3w9uGVfVxtwZrHQniYY2uGUGEWldhwu2GdO', 'client', '2025-08-28 06:58:34', '2025-08-28 06:58:34'),
(5, 'Admin Utama', 'admin2@everpro.com', '$2y$12$34Z3fsX8aBXdid5/djDc/e2l1R7zqA9UrFzVS1L9vLoanzGgsxDm.', 'admin', '2025-08-28 06:58:34', '2025-08-28 06:58:34'),
(6, 'farez', 'farezeverpro@gmail.com', '$2y$12$8zA4b4h6cMmVnNVx7hvlBOWs6RD5.OON/Wi.GvJsrBq7TMMzmjqZ6', 'client', '2025-08-28 00:09:52', '2025-08-28 00:09:52'),
(7, 'farezkiputra', 'farezpls@gmail.com', '$2y$12$qptid73hcL2Gc1I4HWkEkuhK3VXm8WCQO6FT4.rJLIkcimYlA62fm', 'client', '2025-08-28 05:04:55', '2025-08-28 05:04:55'),
(8, 'diengcyber', 'diengcyber@gmail.com', '$2y$12$ZcZNhSS/GawkifUpDtZoduH7zHZBt.WrlgXJlpKnoybghFGAFJYgO', 'client', '2025-08-28 20:00:30', '2025-08-28 20:00:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad_accounts`
--
ALTER TABLE `ad_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `platform_id` (`platform_id`,`account_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `ad_campaigns`
--
ALTER TABLE `ad_campaigns`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_id` (`account_id`,`campaign_id`);

--
-- Indexes for table `ad_platforms`
--
ALTER TABLE `ad_platforms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `ad_reviews`
--
ALTER TABLE `ad_reviews`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `iklans`
--
ALTER TABLE `iklans`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ad_accounts`
--
ALTER TABLE `ad_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ad_campaigns`
--
ALTER TABLE `ad_campaigns`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ad_platforms`
--
ALTER TABLE `ad_platforms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ad_reviews`
--
ALTER TABLE `ad_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `iklans`
--
ALTER TABLE `iklans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ad_accounts`
--
ALTER TABLE `ad_accounts`
  ADD CONSTRAINT `ad_accounts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ad_accounts_ibfk_2` FOREIGN KEY (`platform_id`) REFERENCES `ad_platforms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ad_campaigns`
--
ALTER TABLE `ad_campaigns`
  ADD CONSTRAINT `ad_campaigns_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `ad_accounts` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
