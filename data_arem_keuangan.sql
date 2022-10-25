-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 26, 2022 at 09:03 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_arem_keuangan`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `activities_id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `stakeholder_id` int(11) NOT NULL,
  `activities_desc` varchar(250) NOT NULL,
  `parent_activities_id` int(11) DEFAULT NULL,
  `goal_id` int(11) DEFAULT NULL,
  `activities_desc_pre` varchar(250) DEFAULT NULL,
  `post_date` date NOT NULL,
  `update_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`activities_id`, `id_user`, `project_id`, `stakeholder_id`, `activities_desc`, `parent_activities_id`, `goal_id`, `activities_desc_pre`, `post_date`, `update_date`) VALUES
(1, 3, 2, 1, 'Pemasukan data spp', 0, 14, NULL, '2021-11-28', '2021-11-28 21:41:06'),
(2, 3, 2, 1, 'Pengeditan data spp', 0, 14, NULL, '2021-11-28', '2021-11-28 21:41:28'),
(3, 3, 2, 1, 'Penghapusan data spp', 0, 14, NULL, '2021-11-28', '2021-11-28 21:41:37'),
(4, 3, 2, 1, 'Verifikasi data spp yang telah dimasukan', 0, 15, NULL, '2021-11-28', '2021-11-28 21:41:47'),
(5, 3, 2, 1, 'Verifikasi pengeditan data', 0, 15, NULL, '2021-11-28', '2021-11-28 21:41:57'),
(6, 3, 2, 1, 'Verifikasi penghapusan data', 0, 15, NULL, '2021-11-28', '2021-11-28 21:42:06'),
(7, 3, 2, 1, 'Pemasukan data subsidi silang', 0, 16, NULL, '2021-11-28', '2021-11-28 21:42:15'),
(8, 3, 2, 1, 'Pengeditan data subsidi silang', 0, 16, NULL, '2021-11-28', '2021-11-28 21:42:22'),
(9, 3, 2, 1, 'Penghapusan data subsidi silang', 0, 16, NULL, '2021-11-28', '2021-11-28 21:42:29'),
(10, 3, 2, 1, 'Verifikasi data subsidi silang yang telah dimasukan', 0, 17, NULL, '2021-11-28', '2021-11-28 21:42:38'),
(11, 3, 2, 1, 'Verifikasi pengeditan data subsidi silang', 0, 17, NULL, '2021-11-28', '2021-11-28 21:42:44'),
(12, 3, 2, 1, 'Verifikasi penghapusan data subsidi silang', 0, 17, NULL, '2021-11-28', '2021-11-28 21:42:50'),
(13, 3, 2, 1, 'Pendataan jenis transaksi', 0, 20, NULL, '2021-11-28', '2021-11-28 21:43:38'),
(14, 3, 2, 1, 'Pemasukanan data transaksi keuangan', 0, 18, NULL, '2021-11-28', '2021-11-28 21:43:48'),
(15, 3, 2, 1, 'Pengubahan data transaksi keuangan', 0, 18, NULL, '2021-11-28', '2021-11-28 21:44:00'),
(16, 3, 2, 1, 'Penghapusan data transaksi keuangan', 0, 18, NULL, '2021-11-28', '2021-11-28 21:44:08'),
(17, 3, 2, 1, 'Verifikasi data transaksi keuangan yang telah dimasukan', 0, 19, NULL, '2021-11-28', '2021-11-28 21:44:17'),
(18, 3, 2, 1, 'Verifikasi pengeditan data transaksi keuangan', 0, 19, NULL, '2021-11-28', '2021-11-28 21:44:25'),
(19, 3, 2, 1, 'Verifikasi penghapusan data transaksi keuangan', 0, 19, NULL, '2021-11-28', '2021-11-28 21:44:34'),
(20, 3, 2, 1, 'Merekam setiap aktifitas pada data', 0, 23, NULL, '2021-11-28', '2021-11-28 21:44:46'),
(21, 3, 2, 1, 'Pemasukan data golongan siswa', 0, 25, NULL, '2021-11-28', '2021-11-28 21:45:04'),
(22, 3, 2, 1, 'Pengeditan data golongan siswa', 0, 25, NULL, '2021-11-28', '2021-11-28 21:45:10'),
(23, 3, 2, 1, 'Penghapusan data golongan siswa', 0, 25, NULL, '2021-11-28', '2021-11-28 21:45:17'),
(24, 3, 2, 1, 'Pemasukan data kelas', 0, 26, NULL, '2021-11-28', '2021-11-28 21:45:25'),
(25, 3, 2, 1, 'Penghapusan data kelas', 0, 25, NULL, '2021-11-28', '2021-11-28 21:45:31'),
(26, 3, 2, 1, 'Penghapusan data kelas', 0, 26, NULL, '2021-11-28', '2021-11-28 21:46:31'),
(27, 3, 2, 1, 'Pengeditan data kelas', 0, 26, NULL, '2021-11-28', '2021-11-28 21:46:41'),
(28, 3, 2, 1, 'Pemasukan data siswa', 0, 27, NULL, '2021-11-28', '2021-11-28 21:46:52'),
(29, 3, 2, 1, 'Pengeditan data siswa', 0, 27, NULL, '2021-11-28', '2021-11-28 21:46:58'),
(30, 3, 2, 1, 'Penghapusan data siswa', 0, 27, NULL, '2021-11-28', '2021-11-28 21:47:06'),
(31, 3, 2, 1, 'Pemasukan data pengguna beserta hak akses', 0, 22, NULL, '2021-11-28', '2021-11-28 21:47:23'),
(32, 3, 2, 1, 'Pengubahan data pengguna', 0, 22, NULL, '2021-11-28', '2021-11-28 21:47:31'),
(33, 3, 2, 1, 'Penghapusan data pengguna', 0, 22, NULL, '2021-11-28', '2021-11-28 21:47:37'),
(34, 3, 2, 1, 'Informasi rekap pembayaran SPP setiap bulan', 0, 30, NULL, '2021-11-28', '2021-11-28 21:47:48'),
(35, 3, 2, 1, 'Informasi pembayaran spp per siswa', 0, 30, NULL, '2021-11-28', '2021-11-28 21:47:55'),
(36, 3, 2, 1, 'Informasi siswa yang belum membayar spp bulan tertentu', 0, 30, NULL, '2021-11-28', '2021-11-28 21:48:04'),
(37, 3, 2, 1, 'Informasi rekap penerimaan uang spp per bulan', 0, 30, NULL, '2021-11-28', '2021-11-28 21:48:11'),
(38, 3, 2, 1, 'Informasi transaksi penerimaan uang per periode', 0, 31, NULL, '2021-11-28', '2021-11-28 21:48:20'),
(39, 3, 2, 1, 'Informasi transaksi pengeluaran per periode', 0, 31, NULL, '2021-11-28', '2021-11-28 21:48:26'),
(40, 3, 2, 1, 'Informasi rekap pemasukan perbulan', 0, 31, NULL, '2021-11-28', '2021-11-28 21:48:34'),
(41, 3, 2, 1, 'Informasi rekap pengeluaran per bulan', 0, 31, NULL, '2021-11-28', '2021-11-28 21:48:41'),
(42, 3, 2, 1, 'Informasi arus penerimaan dan pengeluaran periode tertentu', 0, 31, NULL, '2021-11-28', '2021-11-28 21:48:48'),
(43, 3, 2, 1, 'Informasi log setiap transaksi', 0, 24, NULL, '2021-11-28', '2021-11-28 21:48:55'),
(44, 3, 2, 1, 'Informasi log setiap pengguna', 0, 24, NULL, '2021-11-28', '2021-11-28 21:49:04'),
(45, 3, 2, 1, 'Informasi log setiap pengguna per periode', 0, 24, NULL, '2021-11-28', '2021-11-28 21:49:12'),
(48, 3, 2, 1, 'coba act', 29, 0, NULL, '2022-09-22', '2022-09-22 14:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `activities_goal`
--

CREATE TABLE `activities_goal` (
  `id` int(5) NOT NULL,
  `activities_name` varchar(250) NOT NULL,
  `goal_id` int(5) NOT NULL,
  `post_date` date NOT NULL,
  `update_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `activities_resources`
--

CREATE TABLE `activities_resources` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `activities_id` int(11) NOT NULL,
  `actor` varchar(250) NOT NULL,
  `resources` varchar(250) NOT NULL,
  `post_date` date NOT NULL,
  `update_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `goal`
--

CREATE TABLE `goal` (
  `goal_id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `stakeholder_id` int(11) NOT NULL,
  `goal_desc` varchar(250) NOT NULL,
  `parent_goal_id` int(11) DEFAULT NULL,
  `parent_goal_desc` varchar(250) DEFAULT NULL,
  `goal_type` varchar(10) NOT NULL,
  `goal_desc_pre` varchar(250) DEFAULT NULL,
  `post_date` date NOT NULL,
  `update_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `goal`
--

INSERT INTO `goal` (`goal_id`, `id_user`, `project_id`, `stakeholder_id`, `goal_desc`, `parent_goal_id`, `parent_goal_desc`, `goal_type`, `goal_desc_pre`, `post_date`, `update_date`) VALUES
(1, 3, 2, 1, 'Mempermudah pengolahan data keuangan sekolah dan meningkatkan akurasi proses perhitungan keuangan sekolah', 0, NULL, 'hard', NULL, '2021-11-28', '2021-11-28 21:31:36'),
(2, 3, 2, 1, 'Menghindari kesalahan pemasukan data 	', 1, NULL, 'hard', NULL, '2021-11-28', '2021-11-28 21:31:51'),
(3, 3, 2, 1, 'Meningkatkan kontrol data keuangan', 1, NULL, 'hard', NULL, '2021-11-28', '2021-11-28 21:31:57'),
(4, 3, 2, 1, 'Menghindari kehilangan data', 1, NULL, 'hard', NULL, '2021-11-28', '2021-11-28 21:32:07'),
(5, 3, 2, 1, 'Menghindari kesalahan pemasukan data', 0, NULL, 'hard', NULL, '2021-11-28', '2021-11-28 21:32:12'),
(6, 3, 2, 1, 'Mengatasi kesalahan pemasukan data bulanan', 5, NULL, 'hard', NULL, '2021-11-28', '2021-11-28 21:32:20'),
(7, 3, 2, 1, 'Mengatasi kesalahan pemasukan data subsidi silang', 5, NULL, 'hard', NULL, '2021-11-28', '2021-11-28 21:32:26'),
(8, 3, 2, 1, 'Mengatasi kesalahan post data dari periose waktu tertentu', 5, NULL, 'hard', NULL, '2021-11-28', '2021-11-28 21:32:32'),
(9, 3, 2, 1, 'Mengatasi kesalhan nominal data', 5, NULL, 'hard', NULL, '2021-11-28', '2021-11-28 21:32:38'),
(10, 3, 2, 1, 'Meningkatkan kontrol data keuangan', 0, NULL, 'hard', NULL, '2021-11-28', '2021-11-28 21:32:44'),
(11, 3, 2, 1, 'Memastikan update nominal dilakukan sesuai prosedur yang berlaku', 10, NULL, 'hard', NULL, '2021-11-28', '2021-11-28 21:32:51'),
(12, 3, 2, 1, 'Menghindari kehilangan data	', 0, NULL, 'hard', NULL, '2021-11-28', '2021-11-28 21:32:55'),
(13, 3, 2, 1, 'Memastikan berkas atau dokumen terekam lengkap', 12, NULL, 'hard', NULL, '2021-11-28', '2021-11-28 21:33:02'),
(14, 3, 2, 1, 'Pendataan pembayaran SPP', 6, NULL, 'hard', NULL, '2021-11-28', '2021-11-28 21:34:29'),
(15, 3, 2, 1, 'Verifikasi pembayaran SPP', 6, NULL, 'hard', NULL, '2021-11-28', '2021-11-28 21:34:34'),
(16, 3, 2, 1, 'Pendataan subsidi silang', 7, NULL, 'hard', NULL, '2021-11-28', '2021-11-28 21:34:40'),
(17, 3, 2, 1, 'Verifikasi data subsidi silang', 7, NULL, 'hard', NULL, '2021-11-28', '2021-11-28 21:34:47'),
(18, 3, 2, 1, 'Pendataan transaksi keuangan', 8, NULL, 'hard', NULL, '2021-11-28', '2021-11-28 21:34:55'),
(19, 3, 2, 1, 'Verifikasi data transaksi keuangan', 8, NULL, 'hard', NULL, '2021-11-28', '2021-11-28 21:35:02'),
(20, 3, 2, 1, 'Pendataan transaksi keuangan', 9, NULL, 'hard', NULL, '2021-11-28', '2021-11-28 21:35:10'),
(21, 3, 2, 1, 'Verifikasi data transkasi keuangan', 9, NULL, 'hard', NULL, '2021-11-28', '2021-11-28 21:35:15'),
(22, 3, 2, 1, 'Pendataan pengguna sistem', 11, NULL, 'hard', NULL, '2021-11-28', '2021-11-28 21:35:32'),
(23, 3, 2, 1, 'Menyimpan log setiap transaksi', 11, NULL, 'hard', NULL, '2021-11-28', '2021-11-28 21:35:43'),
(24, 3, 2, 1, 'Informasi log transaksi', 11, NULL, 'hard', NULL, '2021-11-28', '2021-11-28 21:35:54'),
(25, 3, 2, 1, 'Pendataan golongan siswa', 13, NULL, 'hard', NULL, '2021-11-28', '2021-11-28 21:36:08'),
(26, 3, 2, 1, 'Pendataan kelas	', 13, NULL, 'hard', NULL, '2021-11-28', '2021-11-28 21:36:14'),
(27, 3, 2, 1, 'Pendataan  siswa	', 13, NULL, 'hard', NULL, '2021-11-28', '2021-11-28 21:36:20'),
(28, 3, 2, 1, 'Pendataan SPP	', 13, NULL, 'hard', NULL, '2021-11-28', '2021-11-28 21:36:26'),
(29, 3, 2, 1, 'Pendataan transaksi keuangan', 13, NULL, 'hard', NULL, '2021-11-28', '2021-11-28 21:36:34'),
(30, 3, 2, 1, 'Informasi pembayaran SPP siswa', 13, NULL, 'hard', NULL, '2021-11-28', '2021-11-28 21:36:39'),
(31, 3, 2, 1, 'Informasi transaksi keuangan', 13, NULL, 'hard', NULL, '2021-11-28', '2021-11-28 21:36:45'),
(58, 3, 43, 1, 'Goal Coba', 0, NULL, 'soft', NULL, '2022-09-22', '2022-09-22 14:58:05'),
(59, 3, 43, 1, 'coba goal', 58, NULL, 'soft', NULL, '2022-09-22', '2022-09-22 14:58:05');

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `stakeholder_id` int(11) NOT NULL,
  `post_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `id_user`, `project_id`, `stakeholder_id`, `post_date`) VALUES
(15, 10, 2, 1, '2022-09-21'),
(17, 3, 43, 1, '2022-09-22');

-- --------------------------------------------------------

--
-- Table structure for table `procedure`
--

CREATE TABLE `procedure` (
  `procedure_id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `stakeholder_id` int(11) NOT NULL,
  `procedure_desc` varchar(250) NOT NULL,
  `activities_id` int(11) NOT NULL,
  `actor` varchar(250) NOT NULL,
  `resources` varchar(250) DEFAULT NULL,
  `procedure_desc_pre` varchar(250) DEFAULT NULL,
  `post_date` date NOT NULL,
  `update_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `procedure`
--

INSERT INTO `procedure` (`procedure_id`, `id_user`, `project_id`, `stakeholder_id`, `procedure_desc`, `activities_id`, `actor`, `resources`, `procedure_desc_pre`, `post_date`, `update_date`) VALUES
(1, 3, 2, 1, 'Pemasukan data jenis transaksi	', 13, 'staf keuangan', NULL, NULL, '2021-11-28', '2021-11-28 21:56:04'),
(2, 3, 2, 1, 'Pengubahan data jenis transaksi', 13, 'staf keuangan', NULL, NULL, '2021-11-28', '2021-11-28 21:56:24'),
(3, 3, 2, 1, 'Penghapusan data jenis transaksi', 13, 'staf keuangan', NULL, NULL, '2021-11-28', '2021-11-28 21:56:41'),
(4, 3, 2, 1, 'Pemasukan data transaksi penerimaan', 14, 'staf keuangan', NULL, NULL, '2021-11-28', '2021-11-28 21:57:07'),
(5, 3, 2, 1, 'Pemasukan data transaksi pengeluaran', 14, 'staf keuangan', NULL, NULL, '2021-11-28', '2021-11-28 21:57:27'),
(6, 3, 2, 1, 'Pengubahan data transaksi penerimaan', 15, 'staf keuangan', NULL, NULL, '2021-11-28', '2021-11-28 21:57:49'),
(7, 3, 2, 1, 'Pengubahan data transaksi pengeluaran', 15, 'staf keuangan', NULL, NULL, '2021-11-28', '2021-11-28 21:58:14'),
(8, 3, 2, 1, 'penghapus data transaksi penerimaan', 16, 'staf keuangan', NULL, NULL, '2021-11-28', '2021-11-28 21:58:33'),
(9, 3, 2, 1, 'Penghapusan data transaksi pengeluaran', 16, 'staf keuangan', NULL, NULL, '2021-11-28', '2021-11-28 21:58:51'),
(10, 3, 2, 1, 'Verifikasi Pemasukan data transaksi penerimaan', 17, 'staf verifikasi', NULL, NULL, '2021-11-28', '2021-11-28 21:59:04'),
(11, 3, 2, 1, 'Verifikasi Pemasukan data transaksi pengeluaran', 17, 'staf verifikasi', NULL, NULL, '2021-11-28', '2021-11-28 21:59:13'),
(12, 3, 2, 1, 'Verifikasi Pengubahan data transaksi penerimaan', 18, 'staf verifikasi', NULL, NULL, '2021-11-28', '2021-11-28 21:59:31'),
(13, 3, 2, 1, 'Verifikasi Pengubahan data transaksi pengeluaran', 18, 'staf verifikasi', NULL, NULL, '2021-11-28', '2021-11-28 21:59:42'),
(14, 3, 2, 1, 'Verifikasi penghapus data transaksi penerimaan', 19, 'staf verifikasi', NULL, NULL, '2021-11-28', '2021-11-28 21:59:54'),
(15, 3, 2, 1, 'Verifikasi Penghapusan data transaksi pengeluaran', 19, 'staf verifikasi', NULL, NULL, '2021-11-28', '2021-11-28 22:00:04'),
(16, 3, 2, 1, 'Simpan data spp', 1, 'staf keuangan', NULL, NULL, '2021-11-28', '2021-11-28 22:00:49'),
(17, 3, 2, 1, 'Edit data spp', 2, 'staf keuangan', NULL, NULL, '2021-11-28', '2021-11-28 22:01:04'),
(18, 3, 2, 1, 'Hapus data spp', 3, 'staf keuangan', NULL, NULL, '2021-11-28', '2021-11-28 22:01:19'),
(19, 3, 2, 1, 'Simpan verifikasi simpan spp', 4, 'staf verifikasi', NULL, NULL, '2021-11-28', '2021-11-28 22:01:32'),
(20, 3, 2, 1, 'Simpan Verifikasi edit spp', 5, 'staf verifikasi', NULL, NULL, '2021-11-28', '2021-11-28 22:01:47'),
(21, 3, 2, 1, 'Simpan Verifikasi hapus spp', 6, 'staf verifikasi', NULL, NULL, '2021-11-28', '2021-11-28 22:01:58'),
(22, 3, 2, 1, 'Simpan data subsidi silang', 7, 'staf keuangan', NULL, NULL, '2021-11-28', '2021-11-28 22:02:19'),
(23, 3, 2, 1, 'Edit data subsidi silang', 8, 'staf keuangan', NULL, NULL, '2021-11-28', '2021-11-28 22:02:36'),
(24, 3, 2, 1, 'Hapus data subsidi silang', 9, 'staf keuangan', NULL, NULL, '2021-11-28', '2021-11-28 22:02:54'),
(25, 3, 2, 1, 'Simpan Verifikasi simpan subsidi silang', 10, 'staf verifikasi', NULL, NULL, '2021-11-28', '2021-11-28 22:03:09'),
(26, 3, 2, 1, 'Simpan Verifikasi edit subsidi silang', 11, 'staf verifikasi', NULL, NULL, '2021-11-28', '2021-11-28 22:03:23'),
(27, 3, 2, 1, 'Simpan Verifikasi hapus subsidi silang', 12, 'staf verifikasi', NULL, NULL, '2021-11-28', '2021-11-28 22:03:36'),
(28, 3, 2, 1, 'Menyimpan aktifitas pada data', 20, '', NULL, NULL, '2021-11-28', '2021-11-28 22:03:57'),
(29, 3, 2, 1, 'Simpan data golongan siswa', 21, 'staf keuangan', NULL, NULL, '2021-11-28', '2021-11-28 22:04:15'),
(30, 3, 2, 1, 'Edit data golongan siswa', 22, 'staf keuangan', NULL, NULL, '2021-11-28', '2021-11-28 22:04:32'),
(31, 3, 2, 1, 'Hapus data golongan siswa', 23, 'staf keuangan', NULL, NULL, '2021-11-28', '2021-11-28 22:04:51'),
(32, 3, 2, 1, 'Simpan data kelas	', 24, 'staf TU', NULL, NULL, '2021-11-28', '2021-11-28 22:05:07'),
(33, 3, 2, 1, 'Edit data kelas', 25, 'staf TU', NULL, NULL, '2021-11-28', '2021-11-28 22:05:24'),
(34, 3, 2, 1, 'Hapus data kelas', 27, 'staf TU', NULL, NULL, '2021-11-28', '2021-11-28 22:05:58'),
(35, 3, 2, 1, 'Simpan data siswa', 28, 'staf TU', NULL, NULL, '2021-11-28', '2021-11-28 22:06:15'),
(36, 3, 2, 1, 'Edit data siswa', 29, 'staf TU', NULL, NULL, '2021-11-28', '2021-11-28 22:06:34'),
(37, 3, 2, 1, 'Hapus data siswa', 30, 'staf TU', NULL, NULL, '2021-11-28', '2021-11-28 22:06:50'),
(38, 3, 2, 1, 'Simpan data pengguna beserta hak akses', 31, 'admin sistem', NULL, NULL, '2021-11-28', '2021-11-28 22:07:07'),
(39, 3, 2, 1, 'Edit data pengguna', 32, 'admin sistem', NULL, NULL, '2021-11-28', '2021-11-28 22:07:24'),
(40, 3, 2, 1, 'Hapus data pengguna', 33, 'admin sistem', NULL, NULL, '2021-11-28', '2021-11-28 22:07:38'),
(41, 3, 2, 1, 'Tampil rekap pembayaran SPP setiap bulan', 34, 'staf keuangan', NULL, NULL, '2021-11-28', '2021-11-28 22:07:51'),
(42, 3, 2, 1, 'Tampil pembayaran spp per siswa', 35, 'staf keuangan', NULL, NULL, '2021-11-28', '2021-11-28 22:08:01'),
(43, 3, 2, 1, 'Tampil siswa yang belum membayar spp bulan tertentu', 36, 'staf keuangan', NULL, NULL, '2021-11-28', '2021-11-28 22:08:10'),
(44, 3, 2, 1, 'Tampil rekap penerimaan uang spp per bulan', 37, 'staf keuangan', NULL, NULL, '2021-11-28', '2021-11-28 22:08:23'),
(45, 3, 2, 1, 'Tampil transaksi penerimaan uang per periode', 38, 'staf keuangan', NULL, NULL, '2021-11-28', '2021-11-28 22:08:34'),
(46, 3, 2, 1, 'Tampil transaksi pengeluaran per periode', 39, 'staf keuangan', NULL, NULL, '2021-11-28', '2021-11-28 22:08:49'),
(47, 3, 2, 1, 'Tampil rekap pemasukan perbulan', 40, 'staf keuangan', NULL, NULL, '2021-11-28', '2021-11-28 22:08:59'),
(48, 3, 2, 1, 'Tampil rekap pengeluaran per bulan', 41, 'staf keuangan', NULL, NULL, '2021-11-28', '2021-11-28 22:09:12'),
(49, 3, 2, 1, 'Tampil arus penerimaan dan pengeluaran periode tertentu', 42, 'staf keuangan', NULL, NULL, '2021-11-28', '2021-11-28 22:09:23'),
(50, 3, 2, 1, 'Tampil log setiap transaksi', 43, 'staf keuangan', NULL, NULL, '2021-11-28', '2021-11-28 22:09:32'),
(51, 3, 2, 1, 'Tampil log setiap pengguna', 44, 'admin sistem', NULL, NULL, '2021-11-28', '2021-11-28 22:09:47'),
(52, 3, 2, 1, 'Tampil log setiap pengguna per periode', 45, 'admin sistem', NULL, NULL, '2021-11-28', '2021-11-28 22:09:58');

-- --------------------------------------------------------

--
-- Table structure for table `procedure_detail`
--

CREATE TABLE `procedure_detail` (
  `id` int(11) NOT NULL,
  `procedure_detail_id` varchar(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `procedure_id` int(11) NOT NULL,
  `procedure_detail_no` varchar(11) NOT NULL,
  `procedure_detail_desc` varchar(250) NOT NULL,
  `pre_condition` varchar(250) NOT NULL,
  `post_condition` varchar(250) NOT NULL,
  `formula` varchar(250) NOT NULL,
  `actor` varchar(250) NOT NULL,
  `resources` varchar(250) NOT NULL,
  `procedure_detail_desc_pre` varchar(250) DEFAULT NULL,
  `pre_condition_pre` varchar(250) DEFAULT NULL,
  `post_condition_pre` varchar(250) DEFAULT NULL,
  `post_date` date NOT NULL,
  `update_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `procedure_detail`
--

INSERT INTO `procedure_detail` (`id`, `procedure_detail_id`, `id_user`, `procedure_id`, `procedure_detail_no`, `procedure_detail_desc`, `pre_condition`, `post_condition`, `formula`, `actor`, `resources`, `procedure_detail_desc_pre`, `pre_condition_pre`, `post_condition_pre`, `post_date`, `update_date`) VALUES
(1, '16-1', 3, 16, '1', 'Login sistem', 'mengakses sistem', 'mengisi username dan password', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-28', '2021-11-28 22:19:07'),
(2, '16-2', 3, 16, '2', 'Pilih fitur data spp', 'mengisi username dan password', 'Melihat tampilan data spp', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-28', '2021-11-28 22:19:25'),
(3, '16-3', 3, 16, '3', 'Masukkan data spp', 'Melihat tampilan data spp', 'Memasukkan data spp', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-28', '2021-11-28 22:19:40'),
(4, '16-4', 3, 16, '4', 'Sistem Simpan data spp', 'Memasukkan data spp', 'Sistem telah menyimpan data spp', '', 'Sistem', '', NULL, NULL, NULL, '2021-11-28', '2021-11-28 22:19:53'),
(5, '17-1', 3, 17, '1', 'Login sistem', 'mengakses sistem', 'mengisi username dan password', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-28', '2021-11-28 22:20:09'),
(6, '17-2', 3, 17, '2', 'Pilih fitur edit data spp', 'mengisi username dan password', 'Melihat tampilan data spp', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-28', '2021-11-28 22:20:28'),
(7, '17-3', 3, 17, '3', 'Input data spp	', 'Melihat tampilan data spp', 'Input data spp yang ingin diubah', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-28', '2021-11-28 22:20:43'),
(8, '17-4', 3, 17, '4', 'Sistem menyimpan data spp terbaru', 'Input data spp yang ingin diubah', 'Data spp telah di edit ', '', 'Sistem', '', NULL, NULL, NULL, '2021-11-28', '2021-11-28 22:20:57'),
(9, '18-1', 3, 18, '1', 'Login sistem', 'mengakses sistem', 'mengisi username dan password', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-28', '2021-11-28 22:21:13'),
(10, '18-2', 3, 18, '2', 'Pilih fitur hapus data spp', 'mengisi username dan password', 'Melihat tampilan data spp', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-28', '2021-11-28 22:21:27'),
(11, '18-3', 3, 18, '3', 'Memilih data spp  yang akan dihapus ', 'Melihat tampilan data spp', 'Menghapus data spp', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-28', '2021-11-28 22:21:47'),
(12, '18-4', 3, 18, '4', 'Sistem menghapus data spp', 'Menghapus data spp', 'Data spp telah di yang dinginkan telah dihapus', '', 'Sistem', '', NULL, NULL, NULL, '2021-11-28', '2021-11-28 22:22:02'),
(13, '19-1', 3, 19, '1', 'Login sistem	', 'Login sistem	', 'mengisi username dan password', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-28', '2021-11-28 22:22:17'),
(14, '19-2', 3, 19, '2', 'Pilih fitur verifikasi simpan spp', 'Pilih fitur verifikasi simpan spp', 'Memilih fitur verifikasi simpan spp', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-28', '2021-11-28 22:22:38'),
(15, '19-3', 3, 19, '3', 'verifikasi simpan spp', 'Memilih verifikasi simpan spp', 'Menverifikasi simpan spp', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-28', '2021-11-28 22:22:51'),
(16, '19-4', 3, 19, '4', 'Sistem Simpan data spp ', 'Menverifikasi simpan spp', 'Sistem telah verifikasi simpan spp ', '', 'Sistem', '', NULL, NULL, NULL, '2021-11-28', '2021-11-28 22:23:04'),
(17, '20-1', 3, 20, '1', 'Login sistem', 'mengakses sistem', 'mengisi username dan password', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-28', '2021-11-28 22:23:29'),
(18, '20-2', 3, 20, '2', 'Pilih fitur Verifikasi edit spp', 'mengisi username dan password', 'Memilih fitur verifikasi edit spp', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-28', '2021-11-28 22:23:41'),
(19, '20-3', 3, 20, '3', 'Verifikasi edit spp', 'Memilih fitur verifikasi edit spp', 'Menverifikasi edit spp', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-28', '2021-11-28 22:23:54'),
(20, '20-4', 3, 20, '4', 'Sistem telah Verifikasi edit spp terbaru', 'Menverifikasi edit spp', 'Sistem telah verifikasi edit spp', '', 'Sistem', '', NULL, NULL, NULL, '2021-11-28', '2021-11-28 22:24:08'),
(21, '21-1', 3, 21, '1', 'Login sistem', 'mengakses sistem', 'mengisi username dan password', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-28', '2021-11-28 22:24:24'),
(22, '21-2', 3, 21, '2', 'Pilih fitur Verifikasi hapus spp', 'mengisi username dan password', 'Memilih fitur verifikasi hapus spp', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-28', '2021-11-28 22:24:39'),
(23, '21-3', 3, 21, '3', 'Verifikasi hapus spp', 'Memilih fitur verifikasi hapus spp', 'Menverifikasi hapus spp', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-28', '2021-11-28 22:24:53'),
(24, '21-4', 3, 21, '4', 'Sistem telah Verifikasi hapus spp spp terbaru', 'Menverifikasi hapus spp', 'Sistem telah verifikasi hapus spp', '', 'Sistem', '', NULL, NULL, NULL, '2021-11-28', '2021-11-28 22:25:06'),
(25, '22-1', 3, 22, '1', 'Login sistem', 'mengakses sistem', 'mengisi username dan password', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:23:57'),
(26, '22-2', 3, 22, '2', 'Pilih fitur data subsidi silang', 'mengisi username dan password', 'Melihat data subsidi silang', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:24:18'),
(27, '22-3', 3, 22, '3', 'Masukkan data subsidi silang', 'Melihat data subsidi silang', 'Masukkan data subsidi silang', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:24:35'),
(28, '22-4', 3, 22, '4', 'Sistem Simpan data subsidi silang', 'Masukkan data subsidi silang', 'Sistem telah Masukkan data subsidi silang', '', 'Sistem', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:24:50'),
(29, '23-1', 3, 23, '1', 'Login sistem', 'mengakses sistem', 'mengisi username dan password', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:25:13'),
(30, '23-2', 3, 23, '2', 'Pilih fitur edit data subsidi silang', 'mengisi username dan password', 'Melihat tampilan data subsidi silang', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:25:28'),
(31, '23-3', 3, 23, '3', 'Input data subsidi silang', 'Melihat tampilan data subsidi silang', 'Input data subsidi silang yang ingin diubah', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:25:46'),
(32, '23-4', 3, 23, '4', 'Sistem menyimpan data subsidi silang terbaru', 'Input data subsidi silang yang ingin diubah', 'data subsidi silang telah di edit ', '', 'Sistem', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:26:00'),
(33, '24-1', 3, 24, '1', 'Login sistem', 'mengakses sistem', 'mengisi username dan password', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:26:19'),
(34, '24-2', 3, 24, '2', 'Pilih fitur hapus data subsidi silang', 'mengisi username dan password', 'Melihat tampilan data subsidi silang', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:26:34'),
(35, '24-3', 3, 24, '3', 'Memilih data subsidi silang akan dihapus ', 'Melihat tampilan data subsidi silang', 'Menghapus data subsidi silang', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:26:49'),
(36, '24-4', 3, 24, '4', 'Sistem menghapus data subsidi silang', 'Menghapus data subsidi silang', 'data subsidi silang telah di yang dinginkan telah dihapus', '', 'Sistem', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:27:05'),
(37, '25-1', 3, 25, '1', 'Login sistem	', 'mengakses sistem', 'mengisi username dan password', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:27:23'),
(38, '25-2', 3, 25, '2', 'Pilih fitur verifikasi simpan subsidi silang', 'mengisi username dan password', 'Memilih fitur verifikasi Verifikasi simpan subsidi silang', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:27:42'),
(39, '25-3', 3, 25, '3', 'verifikasi Verifikasi simpan subsidi silang', 'Memilih fitur verifikasi Verifikasi simpan subsidi silang', 'Menverifikasi subsidi silang', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:27:57'),
(40, '25-4', 3, 25, '4', 'Sistem Simpan Verifikasi simpan subsidi silang', 'Menverifikasi subsidi silang', 'Sistem telah verifikasi simpan subsidi silang', '', 'Sistem', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:28:16'),
(41, '26-1', 3, 26, '1', 'Login sistem 	', 'mengakses sistem', 'mengisi username dan password', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:28:42'),
(42, '26-2', 3, 26, '2', 'Pilih fitur Verifikasi edit subsidi silang', 'mengisi username dan password', 'Memilih fitur verifikasi edit subsidi silang', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:29:07'),
(43, '26-3', 3, 26, '3', 'Verifikasi edit subsidi silang', 'Memilih fitur verifikasi edit subsidi silang', 'Menverifikasi edit subsidi silang', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:29:20'),
(44, '26-4', 3, 26, '4', 'Sistem telah Verifikasi edit subsidi silang terbaru', 'Menverifikasi edit subsidi silang', 'Sistem telah verifikasi subsidi silang ', '', 'Sistem', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:29:38'),
(45, '27-1', 3, 27, '1', 'Login sistem', 'mengakses sistem', 'mengisi username dan password', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:29:59'),
(46, '27-2', 3, 27, '2', 'Pilih fitur Verifikasi hapus subsidi silang', 'mengisi username dan password', 'Memilih fitur verifikasi hapus subsidi silang', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:30:13'),
(47, '27-3', 3, 27, '3', 'Verifikasi hapus subsidi silang', 'Memilih fitur verifikasi hapus subsidi silang', 'Menverifikasi hapus subsidi silang', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:30:25'),
(48, '27-4', 3, 27, '4', 'Sistem telah Verifikasi hapus subsidi silang terbaru', 'Menverifikasi hapus subsidi silang', 'Sistem telah verifikasi hapus subsidi silang', '', 'Sistem', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:30:38'),
(49, '28-1', 3, 28, '1', 'Login sistem', 'mengakses sistem', 'mengisi username dan password', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:30:56'),
(50, '28-2', 3, 28, '2', 'Pilih fitur aktifitas pada data', 'mengisi username dan password', 'Melihat tampilan data', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:31:10'),
(51, '28-3', 3, 28, '3', 'Masukkan aktifitas pada data', 'Melihat tampilan data', 'Memasukkan aktifitas pada data', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:31:23'),
(52, '28-4', 3, 28, '4', 'Sistem Simpan aktifitas pada data', 'Memasukkan aktifitas pada data', 'Sistem telah Simpan aktifitas pada data ', '', 'Sistem', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:31:35'),
(53, '29-1', 3, 29, '1', 'Login sistem', 'mengakses sistem', 'mengisi username dan password', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:31:50'),
(54, '29-2', 3, 29, '2', 'Pilih fitur golongan siswa', 'mengisi username dan password', 'Melihat data golongan siswa', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:32:05'),
(55, '29-3', 3, 29, '3', 'Masukkan data golongan siswa', 'Melihat data golongan siswa', 'Masukkan data golongan siswa', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:32:18'),
(56, '29-4', 3, 29, '4', 'Sistem Simpan data golongan siswa', 'Masukkan data golongan siswa', 'Sistem telah simpan Masukkan data golongan siswa', '', 'Sistem', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:32:30'),
(57, '30-1', 3, 30, '1', 'Login sistem', 'mengakses sistem', 'mengisi username dan password', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:32:50'),
(58, '30-2', 3, 30, '2', 'Pilih fitur edit data golongan siswa', 'mengisi username dan password', 'Melihat tampilan data golongan siswa', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:33:06'),
(59, '30-3', 3, 30, '3', 'Input data golongan siswa', 'Melihat tampilan data golongan siswa', 'Input data golongan siswa yang ingin diubah', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:33:25'),
(60, '30-4', 3, 30, '4', 'Sistem menyimpan data golongan siswa terbaru', 'Input data golongan siswa yang ingin diubah', 'data golongan siswa telah di edit ', '', 'Sistem', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:33:41'),
(61, '31-1', 3, 31, '1', 'Login sistem', 'mengakses sistem', 'mengisi username dan password', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:33:55'),
(62, '31-2', 3, 31, '2', 'Pilih fitur hapus data golongan siswa', 'mengisi username dan password', 'Melihat tampilan data golongan siswa', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:34:08'),
(63, '31-3', 3, 31, '3', 'Memilih data golongan siswa akan dihapus  ', 'Melihat tampilan data golongan siswa', 'Menghapus data golongan siswa', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:34:23'),
(64, '31-4', 3, 31, '4', 'Sistem menghapus data golongan siswa', 'Menghapus data golongan siswa', 'data golongan siswa telah di yang dinginkan telah dihapus', '', 'Sistem', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:34:38'),
(65, '32-1', 3, 32, '1', 'Login sistem', 'mengakses sistem', 'mengisi username dan password', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:34:54'),
(66, '32-2', 3, 32, '2', 'Pilih fitur data kelas', 'mengisi username dan password', 'Melihat data kelas', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:35:10'),
(67, '32-3', 3, 32, '3', 'Masukkan data kelas', 'Melihat data kelas', 'Masukkan data kelas', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:35:27'),
(68, '32-4', 3, 32, '4', 'Sistem Simpan data kelas', 'Masukkan data kelas', 'Sistem telah simpan Masukkan data kelas', '', 'Sistem', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:35:41'),
(69, '33-1', 3, 33, '1', 'Login sistem', 'mengakses sistem', 'mengisi username dan password', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:35:58'),
(70, '33-2', 3, 33, '2', 'Pilih fitur edit data kelas', 'mengisi username dan password', 'Melihat tampilan data kelas', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:36:14'),
(71, '33-3', 3, 33, '3', 'Input data kelas', 'Melihat tampilan data kelas', 'Input data kelas yang ingin diubah', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:36:27'),
(72, '33-4', 3, 33, '4', 'Sistem menyimpan data kelas terbaru', 'Input data kelas yang ingin diubah', 'data kelas telah di edit ', '', 'Sistem', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:36:41'),
(73, '34-1', 3, 34, '1', 'Login sistem', 'mengakses sistem', 'mengisi username dan password', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:36:56'),
(74, '34-2', 3, 34, '2', 'Pilih fitur hapus data kelas', 'mengisi username dan password', 'Melihat tampilan data kelas', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:37:09'),
(75, '34-3', 3, 34, '3', 'Memilih data kelas akan dihapus   ', 'Melihat tampilan data kelas', 'Menghapus data kelas', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:37:23'),
(76, '34-4', 3, 34, '4', 'Sistem menghapus data kelas', 'Menghapus data kelas', 'data kelas telah di yang dinginkan telah dihapus', '', 'Sistem', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:37:38'),
(77, '35-1', 3, 35, '1', 'Login sistem', 'mengakses sistem', 'mengisi username dan password', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:38:35'),
(78, '35-2', 3, 35, '2', 'Pilih fitur data siswa', 'mengisi username dan password', 'Melihat data siswa', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:38:49'),
(79, '35-3', 3, 35, '3', 'Masukkan data siswa', 'Melihat data siswa', 'Masukkan data siswa', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:39:03'),
(80, '35-4', 3, 35, '4', 'Sistem Simpan data siswa', 'Masukkan data siswa', 'Sistem telah simpan Masukkan data siswa', '', 'Sistem', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:39:22'),
(81, '36-1', 3, 36, '1', 'Login sistem', 'mengakses sistem', 'mengisi username dan password', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:39:39'),
(82, '36-2', 3, 36, '2', 'Pilih fitur edit data siswa', 'mengisi username dan password', 'Melihat tampilan data siswa', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:39:53'),
(83, '36-3', 3, 36, '3', 'Input data siswa	', 'Melihat tampilan data siswa', 'Input data siswa yang ingin diubah', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:40:07'),
(84, '36-4', 3, 36, '4', 'Sistem menyimpan data siswa terbaru ', 'Input data siswa yang ingin diubah', 'data siswa telah di edit ', '', 'Sistem', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:40:21'),
(85, '37-1', 3, 37, '1', 'Login sistem', 'mengakses sistem', 'mengisi username dan password', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:40:40'),
(86, '37-2', 3, 37, '2', 'Pilih fitur hapus data siswa', 'mengisi username dan password', 'Melihat tampilan data siswa', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:40:52'),
(87, '37-3', 3, 37, '3', 'Memilih data siswa akan dihapus   ', 'Melihat tampilan data siswa', 'Menghapus data siswa', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:41:03'),
(88, '37-4', 3, 37, '4', 'Sistem menghapus data siswa', 'Menghapus data siswa', 'data siswa telah di yang dinginkan telah dihapus', '', 'Sistem', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:41:15'),
(89, '38-1', 3, 38, '1', 'Login sistem', 'mengakses sistem', 'mengisi username dan password', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:41:33'),
(90, '38-2', 3, 38, '2', 'Pilih fitur data pengguna beserta hak akses', 'mengisi username dan password', 'Melihat data pengguna beserta hak akses', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:41:49'),
(91, '38-3', 3, 38, '3', 'Masukkan data pengguna beserta hak akses ', 'Melihat data pengguna beserta hak akses', 'Masukkan data pengguna beserta hak akses', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:42:02'),
(92, '38-4', 3, 38, '4', 'Sistem Simpan data pengguna beserta hak akses', 'Masukkan data pengguna beserta hak akses', 'Sistem telah simpan data pengguna beserta hak akses', '', 'Sistem', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:42:14'),
(93, '39-1', 3, 39, '1', 'Login sistem', 'mengakses sistem', 'mengisi username dan password', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:42:33'),
(94, '39-2', 3, 39, '2', 'Pilih fitur edit data pengguna', 'mengisi username dan password', 'Melihat tampilan data pengguna', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:42:49'),
(95, '39-3', 3, 39, '3', 'Input data pengguna', 'Melihat tampilan data pengguna', 'Input data pengguna yang ingin diubah', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:43:01'),
(96, '39-4', 3, 39, '4', 'Sistem menyimpan data pengguna terbaru  ', 'Input data pengguna yang ingin diubah', 'Input data pengguna yang ingin diubah', '', 'Sistem', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:43:13'),
(97, '40-1', 3, 40, '1', 'Login sistem', 'mengakses sistem', 'mengisi username dan password', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:43:29'),
(98, '40-2', 3, 40, '2', 'Pilih fitur hapus data pengguna', 'mengisi username dan password', 'Melihat tampilan data pengguna', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:43:42'),
(99, '40-3', 3, 40, '3', 'Memilih data pengguna akan dihapus   ', 'Melihat tampilan data pengguna', 'Menghapus data pengguna', '', 'Admin', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:43:53'),
(100, '40-4', 3, 40, '4', 'Sistem menghapus data pengguna', 'Menghapus data pengguna', 'data pengguna telah di yang dinginkan telah dihapus', '', 'Sistem', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:44:05'),
(101, '41-1', 3, 41, '1', 'Login sistem', 'mengakses sistem', 'mengisi username dan password', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:44:19'),
(102, '41-2', 3, 41, '2', 'Tampilan rekap pembayaran SPP ', 'mengisi username dan password', 'Melihat tampilan rekap pembayaran spp', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:44:33'),
(103, '41-3', 3, 41, '3', 'Pilih fitur rekap pembayaran SPP setiap bulan', 'Pilih fitur rekap pembayaran SPP setiap bulan', 'Memilih fitur rekap pembayaran SPP setiap bulan', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:44:46'),
(104, '41-4', 3, 41, '4', 'Sistem menampilkan informasi rekap pembayaran SPP setiap bulan', 'Memilih fitur rekap pembayaran SPP setiap bulan', 'Sistem menampilkan informasi rekap pembayaran SPP setiap bulan', '', 'Sistem', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:45:00'),
(105, '42-1', 3, 42, '1', 'Login sistem', 'mengakses sistem', 'mengisi username dan password', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:45:18'),
(106, '42-2', 3, 42, '2', 'Tampilan pembayaran spp per siswa', 'mengisi username dan password', 'Melihat tampilan rekap pembayaran spp', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:45:31'),
(107, '42-3', 3, 42, '3', 'Pilih fitur pembayaran spp per siswa', 'Melihat tampilan rekap pembayaran spp ', 'Memilih fitur rekap pembayaran SPP spp per siswa', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:45:45'),
(108, '42-4', 3, 42, '4', 'Sistem menampilkan informasi pembayaran spp per siswa', 'Memilih fitur rekap pembayaran SPP spp per siswa', 'Sistem menampilkan informasi rekap pembayaran SPP spp per siswa', '', 'Sistem', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:45:57'),
(109, '43-1', 3, 43, '1', 'Login sistem 	', 'mengakses sistem', 'mengisi username dan password', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:46:12'),
(110, '43-2', 3, 43, '2', 'Tampilan siswa yang belum membayar spp', 'mengisi username dan password', 'Melihat tampilan rekap pembayaran spp', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:46:24'),
(111, '43-3', 3, 43, '3', 'Pilih fitur belum membayar spp bulan tertentu', 'Melihat tampilan rekap pembayaran spp ', 'Memilih fitur siswa yang belum membayar spp bulan tertentu', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:46:36'),
(112, '43-4', 3, 43, '4', 'Sistem menampilkan informasi siswa yang belum membayar spp bulan tertentu', 'Memilih fitur siswa yang belum membayar spp bulan tertentu', 'Sistem menampilkan informasi siswa yang belum membayar spp bulan tertentu', '', 'Sistem', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:46:49'),
(113, '44-1', 3, 44, '1', 'Login sistem', 'mengakses sistem', 'mengisi username dan password', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:47:15'),
(114, '44-2', 3, 44, '2', 'Tampilan uang spp per bulan', 'mengisi username dan password', 'Melihat tampilan uang spp per bulan', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:47:28'),
(115, '44-3', 3, 44, '3', 'Pilih fitur rekap penerimaan uang spp per bulan', 'Pilih fitur rekap penerimaan uang spp per bulan', 'Memilih fitur rekap penerimaan uang spp per bulan', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:47:40'),
(116, '44-4', 3, 44, '4', 'Sistem menampilkan informasi rekap penerimaan uang spp per bulan', 'Memilih fitur rekap penerimaan uang spp per bulan', 'Sistem menampilkan informasi rekap penerimaan uang spp per bulan', '', 'Sistem', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:48:00'),
(117, '45-1', 3, 45, '1', 'Login sistem', 'mengakses sistem', 'mengisi username dan password', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:48:17'),
(118, '45-2', 3, 45, '2', 'Tampilan transaksi penerimaan uang', 'mengisi username dan password', 'Melihat tampilan transaksi penerimaan uang', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:48:29'),
(119, '45-3', 3, 45, '3', 'Pilih fitur transaksi penerimaan uang per periode', 'Melihat tampilan transaksi penerimaan uang', 'Memilih fitur transaksi penerimaan uang per periode', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:48:40'),
(120, '45-4', 3, 45, '4', 'Sistem menampilkan informasi transaksi penerimaan uang per periode', 'Memilih fitur transaksi penerimaan uang per periode', 'Sistem menampilkan informasi transaksi penerimaan uang per periode', '', 'Sistem', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:48:50'),
(121, '46-1', 3, 46, '1', 'Login sistem', 'mengakses sistem', 'mengisi username dan password', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:49:10'),
(122, '46-2', 3, 46, '2', 'Tampilan transaksi pengeluaran', 'mengisi username dan password', 'Melihat transaksi pengeluaran', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:49:22'),
(123, '46-3', 3, 46, '3', 'Pilih fitur transaksi pengeluaran per periode', 'Melihat tampilan transaksi pengeluaran', 'Memilih fitur transaksi pengeluaran per periode', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:49:34'),
(124, '46-4', 3, 46, '4', 'Sistem menampilkan informasi transaksi pengeluaran per periode', 'Memilih fitur transaksi pengeluaran per periode', 'Sistem menampilkan informasi transaksi pengeluaran per periode', '', 'Sistem', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:49:45'),
(125, '47-1', 3, 47, '1', 'Login sistem', 'mengakses sistem', 'mengisi username dan password', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:49:58'),
(126, '47-2', 3, 47, '2', 'Tampilan rekap pemasukan', 'mengisi username dan password', 'Melihat rekap pemasukan', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:50:10'),
(127, '47-3', 3, 47, '3', 'Pilih fitur rekap pemasukan perbulan', 'Melihat tampilan rekap pemasukan', 'Memilih fitur rekap pemasukan perbulan', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:50:25'),
(128, '47-4', 3, 47, '4', 'Sistem menampilkan informasi rekap pemasukan perbulan', 'Memilih fitur rekap pemasukan perbulan', 'Sistem menampilkan informasi rekap pemasukan perbulan', '', 'Sistem', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:50:44'),
(129, '48-1', 3, 48, '1', 'Login sistem', 'mengakses sistem', 'mengisi username dan password', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:51:02'),
(130, '48-2', 3, 48, '2', 'Tampilan rekap pengeluaran', 'mengisi username dan password', 'Melihat rekap pengeluaran', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:51:14'),
(131, '48-3', 3, 48, '3', 'Pilih fitur rekap pengeluaran per bulan', 'Melihat tampilan rekap pengeluaran', 'Memilih fitur rekap pengeluaran per bulan', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:51:26'),
(132, '48-4', 3, 48, '4', 'Sistem menampilkan informasi rekap pengeluaran per bulan', 'Memilih fitur rekap pengeluaran per bulan', 'Sistem menampilkan informasi rekap pengeluaran per bulan', '', 'Sistem', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:51:38'),
(133, '49-1', 3, 49, '1', 'Login sistem', 'mengakses sistem', 'mengisi username dan password', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:51:55'),
(134, '49-2', 3, 49, '2', 'Tampilan arus penerimaan dan pengeluaran', 'mengisi username dan password', 'Melihat tampilan arus penerimaan dan pengeluaran', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:52:06'),
(135, '49-3', 3, 49, '3', 'Pilih fitur arus penerimaan dan pengeluaran periode tertentu', 'Melihat tampilan arus penerimaan dan pengeluaran', 'Memilih fitur arus penerimaan dan pengeluaran', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:52:18'),
(136, '49-4', 3, 49, '4', 'Sistem menampilkan informasi arus penerimaan dan pengeluaran periode tertentu', 'Memilih fitur arus penerimaan dan pengeluaran', 'Sistem menampilkan informasi arus penerimaan dan pengeluaran', '', 'Sistem', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:52:33'),
(137, '50-1', 3, 50, '1', 'Login sistem', 'mengakses sistem', 'mengisi username dan password', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:52:47'),
(138, '50-2', 3, 50, '2', 'Tampilan log ', 'mengisi username dan password', 'Melihat tampilan log', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:52:59'),
(139, '50-3', 3, 50, '3', 'Pilih fitur log setiap transaksi', 'Melihat tampilan log', 'Memilih fitur log setiap transaksi', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:53:11'),
(140, '50-4', 3, 50, '4', 'Sistem menampilkan informasi log setiap transaksi', 'Memilih fitur log setiap transaksi', 'Sistem menampilkan informasi log setiap transaksi', '', 'Sistem', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:53:22'),
(141, '51-1', 3, 51, '1', 'Login sistem', 'mengakses sistem', 'mengisi username dan password', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:54:03'),
(142, '51-2', 3, 51, '2', 'Tampilan log 	', 'mengisi username dan password', 'Melihat tampilan log', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:54:15'),
(143, '51-3', 3, 51, '3', 'Pilih fitur log setiap pengguna', 'Melihat tampilan log', 'Memilih fitur log setiap pengguna', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:54:30'),
(144, '51-4', 3, 51, '4', 'Sistem menampilkan informasi log setiap pengguna', 'Memilih fitur log setiap pengguna', 'Sistem menampilkan informasi log setiap pengguna', '', 'Sistem', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:54:42'),
(145, '52-1', 3, 52, '1', 'Login sistem 	', 'mengakses sistem', 'mengisi username dan password', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:54:56'),
(146, '52-2', 3, 52, '2', 'Tampilan log ', 'mengisi username dan password', 'Melihat tampilan log', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:55:11'),
(147, '52-3', 3, 52, '3', 'Pilih fitur log setiap pengguna per periode', 'Melihat tampilan log', 'Memilih fitur log setiap pengguna per periode', '', 'staf keuangan', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:55:22'),
(148, '52-4', 3, 52, '4', 'Sistem menampilkan informasi setiap pengguna per periode', 'Memilih fitur log setiap pengguna per periode', 'Sistem menampilkan informasi log setiap pengguna per periode', '', 'Sistem', '', NULL, NULL, NULL, '2021-11-29', '2021-11-29 07:55:33');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_desc` text NOT NULL,
  `post_date` date NOT NULL,
  `update_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `id_user`, `project_name`, `project_desc`, `post_date`, `update_date`) VALUES
(1, 3, 'HRD', 'Sistem informasi HRD', '2021-08-16', '2021-08-16 09:09:15'),
(2, 3, 'Sistem Informasi Keuangan Sekolah Siswa.  Studi kasus : TK dan SD penabur Purworejo', 'Sistem mencakup informasi keuangan sekolah terkait pembayaran SPP siswa', '2021-11-28', '2021-11-28 21:31:10'),
(43, 3, 'Abc', 'Sistem Informasi dadu', '2022-09-22', '2022-09-22 14:55:22'),
(44, 3, 'efd', 'SIA', '2022-09-22', '2022-09-22 14:55:22');

-- --------------------------------------------------------

--
-- Table structure for table `project_stakeholder`
--

CREATE TABLE `project_stakeholder` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `stakeholder_id` int(11) NOT NULL,
  `stakeholder_role` varchar(50) NOT NULL,
  `post_date` date NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project_stakeholder`
--

INSERT INTO `project_stakeholder` (`id`, `id_user`, `project_id`, `stakeholder_id`, `stakeholder_role`, `post_date`, `update_date`) VALUES
(1, 10, 1, 1, 'User', '2022-08-26', '2022-08-26 02:51:59');

-- --------------------------------------------------------

--
-- Table structure for table `requirements_data`
--

CREATE TABLE `requirements_data` (
  `id` int(11) NOT NULL,
  `predicate` varchar(250) NOT NULL,
  `term1` varchar(150) NOT NULL,
  `term2` varchar(250) NOT NULL,
  `kode_term1` varchar(11) NOT NULL,
  `kode_term2` varchar(11) NOT NULL,
  `relasi` varchar(250) DEFAULT NULL,
  `keterangan` varchar(250) NOT NULL,
  `post_date` date NOT NULL,
  `update_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stakeholder`
--

CREATE TABLE `stakeholder` (
  `stakeholder_id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `stakeholder_name` varchar(255) NOT NULL,
  `stakeholder_type` varchar(100) NOT NULL,
  `stakeholder_competence` text NOT NULL,
  `project_id` int(11) DEFAULT NULL,
  `post_date` date NOT NULL,
  `update_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stakeholder`
--

INSERT INTO `stakeholder` (`stakeholder_id`, `id_user`, `stakeholder_name`, `stakeholder_type`, `stakeholder_competence`, `project_id`, `post_date`, `update_date`) VALUES
(1, 3, 'Analis/Argo', 'Analis', 'Analis/ developer application', NULL, '2021-11-28', '2021-11-28 14:30:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama_user`, `email`, `username`, `password`, `akses_level`, `tanggal_update`) VALUES
(1, 'rosa', '', 'rosadelima', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '2020-10-08 14:38:04'),
(3, 'user1', '', 'user1', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Admin', '2022-09-20 06:32:13'),
(6, 'sigit', 'stevensingging@gmail.com', 'sigit', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '2022-08-25 06:53:29'),
(10, 'paijo', 'paijo@gmail.com', 'paijo', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Admin', '2022-09-22 08:08:05'),
(11, 'Irwan', 'irwan@gmail.com', 'Irwan', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 'Analis', '2022-09-22 08:10:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`activities_id`);

--
-- Indexes for table `activities_goal`
--
ALTER TABLE `activities_goal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activities_resources`
--
ALTER TABLE `activities_resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `goal`
--
ALTER TABLE `goal`
  ADD PRIMARY KEY (`goal_id`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `procedure`
--
ALTER TABLE `procedure`
  ADD PRIMARY KEY (`procedure_id`);

--
-- Indexes for table `procedure_detail`
--
ALTER TABLE `procedure_detail`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `procedure_detail_id` (`procedure_detail_id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `project_stakeholder`
--
ALTER TABLE `project_stakeholder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requirements_data`
--
ALTER TABLE `requirements_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stakeholder`
--
ALTER TABLE `stakeholder`
  ADD PRIMARY KEY (`stakeholder_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `activities_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `activities_goal`
--
ALTER TABLE `activities_goal`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `activities_resources`
--
ALTER TABLE `activities_resources`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `goal`
--
ALTER TABLE `goal`
  MODIFY `goal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `procedure`
--
ALTER TABLE `procedure`
  MODIFY `procedure_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `procedure_detail`
--
ALTER TABLE `procedure_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `project_stakeholder`
--
ALTER TABLE `project_stakeholder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `requirements_data`
--
ALTER TABLE `requirements_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stakeholder`
--
ALTER TABLE `stakeholder`
  MODIFY `stakeholder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
