-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2023 at 02:53 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mockup_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `posisi_lamaran` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `golongan_darah` varchar(3) NOT NULL,
  `status` varchar(50) NOT NULL,
  `alamat_ktp` text NOT NULL,
  `alamat_tinggal` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_tlp` varchar(16) NOT NULL,
  `orang_terdekat` varchar(255) NOT NULL,
  `skill` text NOT NULL,
  `bersedia_ditempatkan` varchar(10) NOT NULL,
  `penghasilan_harapan` varchar(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`id`, `user_id`, `posisi_lamaran`, `nama`, `no_ktp`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `golongan_darah`, `status`, `alamat_ktp`, `alamat_tinggal`, `email`, `no_tlp`, `orang_terdekat`, `skill`, `bersedia_ditempatkan`, `penghasilan_harapan`, `created_at`, `updated_at`) VALUES
(16, 1, 'WEB PROGRAMMER', 'TIARA INSANSANI 1', '32165432165454', 'BEKASI', '1996-09-09', 'PEREMPUAN', 'ISLAM', 'A', 'BELUM MENIKAH', 'BEKASI UTARA', 'BEKASI UTARA', 'TIARAINSANSANI@GMAIL.COM', '098465464', 'IBU', 'PJP', 'ya', '20000000', '2023-03-09 15:22:07', '2023-03-09 18:29:31'),
(20, 6, 'Mobile PROGRAMMER', 'TIARA INSANSANI 0010', '012421542', 'BEKASI', '1996-09-09', 'PEREMPUAN', 'ISLAM', 'O', 'BELUM MENIKAH', 'BEKASI', 'BEKASI', 'TIARAINSANSANI+0010@GMAIL.COM', '0812451141111', 'IBU', 'android, ios', 'ya', '20000000', '2023-03-09 18:43:34', '2023-03-09 18:44:40');

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1);

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` int(11) NOT NULL,
  `biodata_id` int(11) NOT NULL,
  `jenjang` varchar(10) NOT NULL,
  `nama_institusi` varchar(255) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `tahun_lulus` varchar(10) NOT NULL,
  `ipk` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendidikan`
--

INSERT INTO `pendidikan` (`id`, `biodata_id`, `jenjang`, `nama_institusi`, `jurusan`, `tahun_lulus`, `ipk`, `created_at`, `updated_at`) VALUES
(6, 16, 'S1', 'KALBIS', 'INFORMATIKA', '2018', 3.62, '2023-03-09 15:22:07', '2023-03-09 22:22:07'),
(10, 20, 'S1', 'KALBIS INSTITUTE', 'INFORMATIKA', '2018', 3.62, '2023-03-09 18:43:34', '2023-03-10 01:43:34');

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pekerjaan`
--

CREATE TABLE `riwayat_pekerjaan` (
  `id` int(11) NOT NULL,
  `biodata_id` int(11) NOT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `posisi_terakhir` varchar(255) NOT NULL,
  `pendapatan_terakhir` varchar(15) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat_pekerjaan`
--

INSERT INTO `riwayat_pekerjaan` (`id`, `biodata_id`, `nama_perusahaan`, `posisi_terakhir`, `pendapatan_terakhir`, `tahun`, `created_at`, `updated_at`) VALUES
(7, 16, 'SEATECH 12', 'PROGRAMMER', '9000000', '2022', '2023-03-09 15:22:07', '2023-03-09 15:22:07'),
(8, 16, 'SEATECH 21', 'ANALYS', '15000000', '2023', '2023-03-09 15:22:07', '2023-03-09 15:22:07'),
(13, 20, 'NESCAFE', 'PROGRAMMER', '5000000', '2021', '2023-03-09 18:43:34', '2023-03-09 18:43:34'),
(14, 20, 'KAYU PUTIH', 'PROJECT MANAGER', '16000000', '2023', '2023-03-09 18:43:34', '2023-03-09 18:43:34');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat_pelatihan`
--

CREATE TABLE `riwayat_pelatihan` (
  `id` int(11) NOT NULL,
  `biodata_id` int(11) NOT NULL,
  `nama_pelatihan` varchar(255) NOT NULL,
  `sertifikat` varchar(10) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat_pelatihan`
--

INSERT INTO `riwayat_pelatihan` (`id`, `biodata_id`, `nama_pelatihan`, `sertifikat`, `tahun`, `created_at`, `updated_at`) VALUES
(7, 16, 'AAAAAA', 'ya', '2021', '2023-03-09 15:22:07', '2023-03-09 15:22:07'),
(8, 16, 'BBBBBBBBB', 'ya', '2022', '2023-03-09 15:22:07', '2023-03-09 15:22:07'),
(13, 20, 'SEMINAR 1', 'ya', '2021', '2023-03-09 18:43:34', '2023-03-09 18:43:34'),
(14, 20, 'SEMINAR 2', 'ya', '2023', '2023-03-09 18:43:34', '2023-03-09 18:43:34');

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
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Tiara', 'tiarainsansani@gmail.com', NULL, '$2y$10$baiKK2qjibpD23B1XB0E5epn7hAD4vBHgQmUvgW0JHc2tr/gjYncq', 'user', NULL, '2023-03-09 11:18:10', '2023-03-09 11:18:10'),
(2, 'tiara 0001', 'tiarainsansani+0001@gmail.com', NULL, '$2y$10$UiYX10De.0Yl.PyX9am59uLFluDniu/pR/aQICxoWa2S8ihLRk.iS', 'user', NULL, '2023-03-09 16:18:39', '2023-03-09 16:18:39'),
(3, 'tiara 0002', 'tiarainsansani+0002@gmail.com', NULL, '$2y$10$KgJ2WZ861GYPwbAdjImVvuTVqoDeIyG1R9VbsiBVH27u0K5HFYpfy', 'user', NULL, '2023-03-09 18:00:35', '2023-03-09 18:00:35'),
(4, 'admin', 'admin@gmail.com', NULL, '$2y$10$baiKK2qjibpD23B1XB0E5epn7hAD4vBHgQmUvgW0JHc2tr/gjYncq', 'admin', NULL, NULL, NULL),
(5, 'Tiara 0005', 'tiarainsansani+0005@gmail.com', NULL, '$2y$10$98eCeIhLXfVeoy4sznDpG.enCmeqWn7vb0NKLox2AxiVb7.Yp/AJG', 'user', NULL, '2023-03-09 18:34:19', '2023-03-09 18:34:19'),
(6, 'TIARA 0010', 'TIARAINSANSANI+0010@GMAIL.COM', NULL, '$2y$10$iRnxjewF09OLQAWLEeOgJ.AoYIEOS6hzvOAZJVj3BBPp217scDlZe', 'user', NULL, '2023-03-09 18:41:14', '2023-03-09 18:41:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pendidikan` (`biodata_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `riwayat_pekerjaan`
--
ALTER TABLE `riwayat_pekerjaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pekerjaan` (`biodata_id`);

--
-- Indexes for table `riwayat_pelatihan`
--
ALTER TABLE `riwayat_pelatihan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pelatihan` (`biodata_id`);

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
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `riwayat_pekerjaan`
--
ALTER TABLE `riwayat_pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `riwayat_pelatihan`
--
ALTER TABLE `riwayat_pelatihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD CONSTRAINT `fk_pendidikan` FOREIGN KEY (`biodata_id`) REFERENCES `biodata` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_pekerjaan`
--
ALTER TABLE `riwayat_pekerjaan`
  ADD CONSTRAINT `fk_pekerjaan` FOREIGN KEY (`biodata_id`) REFERENCES `biodata` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `riwayat_pelatihan`
--
ALTER TABLE `riwayat_pelatihan`
  ADD CONSTRAINT `fk_pelatihan` FOREIGN KEY (`biodata_id`) REFERENCES `biodata` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
