-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2021 at 08:19 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imk_tubes`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2021_11_22_084747_sells', 2),
(8, '2021_11_22_091242_rents', 3),
(9, '2021_11_24_073549_create_rent_orders_table', 4),
(10, '2021_11_24_075012_create_sell_orders_table', 5),
(11, '2021_11_27_092836_create_carts_table', 6),
(12, '2021_11_27_100733_create_cart_sells_table', 7),
(13, '2021_11_27_100746_create_cart_rents_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rents`
--

CREATE TABLE `rents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(10) NOT NULL,
  `ukuran` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warna` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(10) NOT NULL,
  `gambar` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rents`
--

INSERT INTO `rents` (`id`, `nama`, `stok`, `ukuran`, `warna`, `harga`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Baju panjang', 4, 'S M', 'pink', 150000, 'baju2.jpeg', '2021-11-23 02:23:42', '2021-11-26 06:21:15'),
(3, 'Kaos Polos', 20, 'S M L XL', 'putih, hitam', 45000, 'kaos oblong 1.jpeg', '2021-11-25 07:40:54', '2021-11-25 07:40:54'),
(4, 'Kaos Polos 3/4', 30, 'S\r\nM\r\nL\r\nXL', 'kombinasi', 75000, 'kaos oblong lengan 3 per 4.jpeg', '2021-11-25 07:42:15', '2021-11-25 07:42:15'),
(5, 'Kaos Polos Lengan Panjang', 30, 'S M L XL', 'hitam, light blue, merah, abu abu, kuning', 50000, 'kaos oblong lengan panjang.jpeg', '2021-11-25 07:48:39', '2021-11-25 07:48:39'),
(6, 'Celana Pendek', 0, 'M L XL', 'abu-abu, hitam, moka, hijau', 45000, 'celana pendek.jpeg', '2021-11-25 07:49:40', '2021-11-26 06:24:57'),
(7, 'Celana Panjang Bahan Katun', 10, 'L XL', 'hitam', 80000, 'celana panjang katun.jpeg', '2021-11-25 07:50:12', '2021-11-25 07:50:12'),
(8, 'Celana Jeans Pria', 20, 'M L XL XXL', 'hitam, biru, abu abu', 120000, 'celana jeans pria.jpeg', '2021-11-25 07:50:57', '2021-11-26 07:27:48'),
(9, 'Dress Lengan Pendek', 2, 'M L', 'silver', 300000, 'Dara_1.jpg', '2021-11-25 08:11:14', '2021-11-25 08:11:14'),
(10, 'Dress ibu dan anak', 1, 'free size', 'gold', 550000, 'Dara_2.jpg', '2021-11-25 08:12:02', '2021-11-25 08:12:02'),
(11, 'Nancy Top', 4, 'S M L XL', 'tercotta, navy, mustard, black', 139000, 'Dara_9.jpg', '2021-11-25 08:16:18', '2021-11-26 07:28:06'),
(12, 'Kemeja Batik Lengan Panjang', 5, 'S M L', 'hitam', 250000, 'download (12).jpg', '2021-11-25 08:21:23', '2021-11-25 08:21:23'),
(13, 'Dress Batik Wanita', 0, 'S M L', 'pink', 250000, 'evercloth_evercloth_-_dress_batik_wanita_-_dress_batik_-_batik_modern_-_dress_wanita_-_batik_-_lexy_standar_full01_fdaxut4f.jpg', '2021-11-25 08:21:49', '2021-11-25 08:21:49'),
(14, 'Rok Polos', 3, 'S M L XL', 'krim, cokelat, hitam', 150000, 'no_brand_rok_plisket_premium_full01_mq1z7q2q.jpg', '2021-11-25 08:23:12', '2021-11-26 10:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `rent_orders`
--

CREATE TABLE `rent_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rent_id` bigint(20) UNSIGNED NOT NULL,
  `banyak` int(10) NOT NULL,
  `harga` int(10) NOT NULL,
  `transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_pesanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_konfirmasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_bayar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rent_orders`
--

INSERT INTO `rent_orders` (`id`, `user_id`, `rent_id`, `banyak`, `harga`, `transaksi`, `jenis_pesanan`, `status_konfirmasi`, `status_bayar`, `status_kirim`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 1, 150000, 'cash', 'jemput', '1', '1', '1', '2021-11-25 14:36:04', '2021-11-26 06:22:12'),
(2, 6, 6, 3, 135000, 'cash', 'jemput', '2', '1', '0', '2021-11-26 13:23:25', '2021-11-26 06:25:12'),
(3, 3, 8, 2, 240000, 'cash', 'antar', '2', '0', '0', '2021-11-26 14:26:57', '2021-11-26 07:27:48'),
(4, 3, 11, 2, 278000, 'transfer', 'antar', '2', '1', '0', '2021-11-26 14:27:24', '2021-11-26 07:28:06'),
(5, 6, 14, 2, 300000, 'transfer', 'antar', '1', '0', '0', '2021-11-26 15:00:49', '2021-11-26 10:32:19'),
(6, 6, 12, 3, 750000, 'cash', 'jemput', '0', '0', '0', '2021-11-26 15:01:32', '2021-11-26 15:01:32'),
(7, 6, 12, 3, 750000, 'cash', 'jemput', '0', '0', '0', '2021-11-26 15:01:33', '2021-11-26 15:01:33'),
(8, 6, 12, 1, 250000, 'cash', 'jemput', '0', '0', '0', '2021-11-26 15:21:52', '2021-11-26 15:21:52'),
(9, 7, 12, 3, 750000, 'e-wallet', 'pengiriman', '0', '0', '0', '2021-11-29 09:02:10', '2021-11-29 09:02:10'),
(10, 3, 3, 2, 90000, 'cash', 'jemput', '0', '0', '0', '2021-12-01 05:48:26', '2021-12-01 05:48:26');

-- --------------------------------------------------------

--
-- Table structure for table `sells`
--

CREATE TABLE `sells` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(10) NOT NULL,
  `ukuran` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warna` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(10) NOT NULL,
  `gambar` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sells`
--

INSERT INTO `sells` (`id`, `nama`, `stok`, `ukuran`, `warna`, `harga`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'baju panjang', 7, 'S, M', 'cokelat', 100000, 'baju3.jpeg', '2021-11-23 01:55:36', '2021-12-01 05:37:40'),
(4, 'Kaos NASA Retro Tee', 5, 'S M L XL', 'hitam, putih', 65000, 'Kaos_Nasa.jpg', '2021-11-25 07:56:26', '2021-11-25 07:56:26'),
(5, 'Kaos Lengan Panjang Rogue', 69, 'S M L', 'hitam, putih', 125000, 'Rogue_Longsleeve.jpg', '2021-11-25 07:57:21', '2021-11-25 07:57:21'),
(6, 'Hoodie Kuning', 12, 'S M L XL', 'kuning', 235000, 'Hoodie_Yellow.jpg', '2021-11-25 07:58:05', '2021-11-26 06:06:27'),
(7, 'Rompi Epidemic', 6, 'M L XL', 'hitam', 110000, 'Epidemic_Vest.jpg', '2021-11-25 07:59:06', '2021-11-25 07:59:06'),
(8, 'Baju Secret Original', 0, 'L', 'hitam', 899000, 'Secret_Jersey.png', '2021-11-25 07:59:55', '2021-11-26 10:31:40'),
(9, 'Kilma Cullote', 7, 'Allsize', 'putih, hitam, biru', 179000, 'Dara_5.jpg', '2021-11-25 08:08:12', '2021-11-25 08:08:12'),
(10, 'Savva skirt', 9, 'Allsize', 'blue, khaki, soft pink, green', 169000, 'Dara_4.jpg', '2021-11-25 08:09:09', '2021-11-25 08:09:09'),
(11, 'Alya shirt', 0, 'S M L', 'pink, choco, blue emerald, navy, black', 179000, 'Dara_8.jpg', '2021-11-25 08:10:10', '2021-11-25 08:10:10'),
(12, 'Dress Lengan Panjang', 5, 'M L', 'peach, white', 620000, 'Dara_3.jpg', '2021-11-25 08:12:50', '2021-11-25 08:12:50'),
(13, 'Talen Dress', 10, 'S M L XL', 'lilac, pink rose, white, tosca, mustard', 219000, 'Dara_6.jpg', '2021-11-25 08:13:40', '2021-11-25 08:13:40'),
(14, 'Irsa Tunic', 8, 'S M L XL', 'olive, peach, dark blue, choco, yellow', 149000, 'Dara_7.jpg', '2021-11-25 08:15:34', '2021-11-25 08:15:34'),
(15, 'Baggy pants jeans pria/wanita', 5, 'S M L XL 2XL', 'black, light blue', 165000, '1.jpg', '2021-11-25 08:17:38', '2021-11-25 08:17:38'),
(16, 'Regular Endrock Jeans Pria', 4, 'M L XL', 'light blue', 199000, '2.jpg', '2021-11-25 08:18:09', '2021-11-25 08:18:09'),
(17, 'Jeans Kulot Oversize Pria', 7, 'M L', 'grey, light', 144000, '3.jpg', '2021-11-25 08:18:45', '2021-11-25 08:18:45'),
(18, 'Celana Kain Pria', 2, 'S M L XL', 'brown, black, light grey', 111000, '4.jpg', '2021-11-25 08:19:27', '2021-11-25 08:19:27'),
(19, 'Kemeja Lengan Panjang Kotak Kotak', 0, 'S M L XL', 'hitam', 150000, 'images (3).jpg', '2021-11-25 08:20:54', '2021-11-25 08:20:54'),
(20, 'Kaos', 5, 'S M L', 'hitam', 10000, 'kaos oblong 1.jpeg', '2021-12-01 04:41:21', '2021-12-01 04:41:21');

-- --------------------------------------------------------

--
-- Table structure for table `sell_orders`
--

CREATE TABLE `sell_orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `sell_id` bigint(20) UNSIGNED NOT NULL,
  `banyak` int(10) NOT NULL,
  `harga` int(10) NOT NULL,
  `transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_pesanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_konfirmasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_bayar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_kirim` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sell_orders`
--

INSERT INTO `sell_orders` (`id`, `user_id`, `sell_id`, `banyak`, `harga`, `transaksi`, `jenis_pesanan`, `status_konfirmasi`, `status_bayar`, `status_kirim`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 1, 100000, 'cash', 'antar', '2', '0', '0', '2021-11-25 12:26:18', '2021-11-25 23:30:05'),
(2, 3, 1, 1, 100000, 'transfer', 'jemput', '1', '1', '1', '2021-11-25 12:28:02', '2021-11-26 01:59:12'),
(3, 3, 1, 2, 200000, 'cash', 'antar', '2', '0', '0', '2021-11-25 12:29:42', '2021-11-26 07:21:41'),
(4, 3, 1, 5, 500000, 'cash', 'antar', '2', '1', '0', '2021-11-25 12:35:09', '2021-11-26 07:23:54'),
(5, 3, 1, 2, 200000, 'cash', 'antar', '1', '1', '1', '2021-11-25 12:36:50', '2021-11-30 21:43:58'),
(6, 3, 1, 2, 200000, 'cash', 'antar', '0', '0', '0', '2021-11-25 12:36:50', '2021-11-25 12:36:50'),
(7, 3, 4, 2, 130000, 'cash', 'antar', '0', '0', '0', '2021-11-25 12:38:30', '2021-11-25 12:38:30'),
(8, 3, 4, 3, 195000, 'cash', 'antar', '0', '0', '0', '2021-11-25 12:39:20', '2021-11-25 12:39:20'),
(9, 3, 5, 1, 125000, 'cash', 'antar', '0', '0', '0', '2021-11-25 12:44:02', '2021-11-25 12:44:02'),
(10, 3, 6, 1, 235000, 'cash', 'antar', '1', '1', '1', '2021-11-25 13:03:58', '2021-11-26 06:07:09'),
(11, 3, 4, 1, 65000, 'cash', 'pengiriman', '0', '0', '0', '2021-11-25 13:10:12', '2021-11-25 13:10:12'),
(12, 3, 5, 2, 250000, 'transfer', 'antar', '0', '0', '0', '2021-11-25 13:11:28', '2021-11-25 13:11:28'),
(13, 3, 5, 1, 125000, 'e-wallet', 'antar', '0', '0', '0', '2021-11-25 13:13:26', '2021-11-25 13:13:26'),
(14, 3, 5, 1, 125000, 'cash', 'antar', '0', '0', '0', '2021-11-25 13:16:05', '2021-11-25 13:16:05'),
(15, 6, 8, 1, 899000, 'cash', 'jemput', '1', '0', '0', '2021-11-25 14:36:39', '2021-11-26 10:31:40'),
(16, 6, 5, 2, 250000, 'transfer', 'antar', '2', '0', '0', '0000-00-00 00:00:00', '2021-11-26 00:39:42'),
(17, 3, 5, 1, 125000, 'e-wallet', 'pengiriman', '0', '0', '0', '2021-11-26 14:12:11', '2021-11-26 14:12:11'),
(18, 6, 19, 1, 150000, 'cash', 'antar', '0', '0', '0', '2021-11-26 14:50:02', '2021-11-26 14:50:02'),
(19, 6, 18, 1, 111000, 'cash', 'pengiriman', '0', '0', '0', '2021-11-26 14:53:48', '2021-11-26 14:53:48'),
(20, 6, 17, 3, 432000, 'transfer', 'antar', '0', '0', '0', '2021-11-26 14:54:53', '2021-11-26 14:54:53'),
(21, 6, 7, 1, 110000, 'cash', 'antar', '0', '0', '0', '2021-11-26 17:56:42', '2021-11-26 17:56:42'),
(22, 7, 18, 1, 111000, 'cash', 'antar', '0', '0', '0', '2021-11-29 09:01:58', '2021-11-29 09:01:58'),
(23, 3, 20, 1, 10000, 'cash', 'antar', '0', '0', '0', '2021-12-01 04:46:09', '2021-12-01 04:46:09'),
(24, 7, 20, 3, 30000, 'transfer', 'jemput', '0', '0', '0', '2021-12-01 06:00:23', '2021-12-01 06:00:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `alamat`, `no_hp`, `role`, `created_at`, `updated_at`) VALUES
(3, 'Felix Kurnia Salim', 'felixkurnia7@gmail.com', NULL, '$2y$10$1X/QGkrLnLvHZFvvDe.6KePZtPjfc8PB4twFI4voa.S4QgwiUjTUq', NULL, 'Medan Denai', '082164551919', 'admin', '2021-11-15 07:55:54', '2021-12-19 06:50:53'),
(4, 'Felix', 'felixlim@gmail.com', NULL, '$2y$10$4GrB9Y1WStC92S2GFm0c9.xMDJhJkimctraF2b4cqxz9JhYain6ra', NULL, 'Medan Denai', '081234567890', 'user', '2021-11-16 00:45:33', '2021-11-24 09:39:14'),
(6, 'Felix Kurnia', 'felix.kurnia@gmail.com', NULL, '$2y$10$1Vzutrw1oJV3Jed8o5H89em/B6egE82nD5FKw1zUt2zT8JhqZNdNG', NULL, 'Medan Johor', '081234567890', 'user', '2021-11-24 03:35:02', '2021-12-01 04:38:44'),
(7, 'Felix', 'limfelix45@gmail.com', NULL, '$2y$10$M3UwdHg9IObc1VRYiWD7bOuq94LBsSkevIZYo6Y.TYbIqUndqlTEG', '7OdYMwGPPpC69eiSd1pBt58Lnn28QhcUOHkxoi2Zxo0CdG9VJnQyaaZmTPWm', 'Medan Denai', '081234567890', 'user', '2021-11-29 01:47:14', '2021-11-30 21:35:53'),
(8, 'admin', 'admin@gmail.com', NULL, '$2y$10$tNiMgrlqF8/MEy.eCexxYeVLbkWnAVZfBJ080teZWIY0SKxJlaM6C', NULL, 'Medan Denai', '082164551919', 'admin', '2021-12-18 23:41:04', '2021-12-18 23:41:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `rents`
--
ALTER TABLE `rents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rent_orders`
--
ALTER TABLE `rent_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rent_orders_user_id_foreign` (`user_id`),
  ADD KEY `rent_orders_rent_id_foreign` (`rent_id`);

--
-- Indexes for table `sells`
--
ALTER TABLE `sells`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sell_orders`
--
ALTER TABLE `sell_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sell_orders_user_id_foreign` (`user_id`),
  ADD KEY `sell_orders_sell_id_foreign` (`sell_id`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rents`
--
ALTER TABLE `rents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `rent_orders`
--
ALTER TABLE `rent_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sells`
--
ALTER TABLE `sells`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sell_orders`
--
ALTER TABLE `sell_orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rent_orders`
--
ALTER TABLE `rent_orders`
  ADD CONSTRAINT `rent_orders_rent_id_foreign` FOREIGN KEY (`rent_id`) REFERENCES `rents` (`id`),
  ADD CONSTRAINT `rent_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sell_orders`
--
ALTER TABLE `sell_orders`
  ADD CONSTRAINT `sell_orders_sell_id_foreign` FOREIGN KEY (`sell_id`) REFERENCES `sells` (`id`),
  ADD CONSTRAINT `sell_orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
