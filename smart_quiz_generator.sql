-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Bulan Mei 2026 pada 19.00
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart_quiz_generator`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `aktivitas`
--

CREATE TABLE `aktivitas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `aktivitas` varchar(255) NOT NULL,
  `waktu` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `aktivitas`
--

INSERT INTO `aktivitas` (`id`, `icon`, `aktivitas`, `waktu`, `created_at`, `updated_at`) VALUES
(1, '👤', 'Mahasiswa Baru Terdaftar', '15:55', '2026-05-28 08:55:29', '2026-05-28 08:55:29'),
(2, '📄', 'Materi Baru Diupload', '15:55', '2026-05-28 08:55:29', '2026-05-28 08:55:29'),
(3, '📝', 'Kuis Baru Dibuat', '15:55', '2026-05-28 08:55:29', '2026-05-28 08:55:29'),
(4, '📚', 'Hasil Kuis Diperbarui', '15:55', '2026-05-28 08:55:29', '2026-05-28 08:55:29'),
(5, '👤', 'Mahasiswa Baru Terdaftar', '15:55', '2026-05-28 08:55:33', '2026-05-28 08:55:33'),
(6, '📄', 'Materi Baru Diupload', '15:55', '2026-05-28 08:55:33', '2026-05-28 08:55:33'),
(7, '📝', 'Kuis Baru Dibuat', '15:55', '2026-05-28 08:55:33', '2026-05-28 08:55:33'),
(8, '📚', 'Hasil Kuis Diperbarui', '15:55', '2026-05-28 08:55:33', '2026-05-28 08:55:33'),
(9, '👤', 'Mahasiswa Baru Terdaftar', '15:57', '2026-05-28 08:57:00', '2026-05-28 08:57:00'),
(10, '📄', 'Materi Baru Diupload', '15:57', '2026-05-28 08:57:00', '2026-05-28 08:57:00'),
(11, '📝', 'Kuis Baru Dibuat', '15:57', '2026-05-28 08:57:00', '2026-05-28 08:57:00'),
(12, '📚', 'Hasil Kuis Diperbarui', '15:57', '2026-05-28 08:57:00', '2026-05-28 08:57:00'),
(13, '👤', 'Mahasiswa Baru Terdaftar', '15:57', '2026-05-28 08:57:57', '2026-05-28 08:57:57'),
(14, '📄', 'Materi Baru Diupload', '15:57', '2026-05-28 08:57:57', '2026-05-28 08:57:57'),
(15, '📝', 'Kuis Baru Dibuat', '15:57', '2026-05-28 08:57:57', '2026-05-28 08:57:57'),
(16, '📚', 'Hasil Kuis Diperbarui', '15:57', '2026-05-28 08:57:57', '2026-05-28 08:57:57'),
(17, '👤', 'Mahasiswa Baru Terdaftar', '15:58', '2026-05-28 08:58:21', '2026-05-28 08:58:21'),
(18, '📄', 'Materi Baru Diupload', '15:58', '2026-05-28 08:58:21', '2026-05-28 08:58:21'),
(19, '📝', 'Kuis Baru Dibuat', '15:58', '2026-05-28 08:58:21', '2026-05-28 08:58:21'),
(20, '📚', 'Hasil Kuis Diperbarui', '15:58', '2026-05-28 08:58:21', '2026-05-28 08:58:21'),
(21, '👤', 'Mahasiswa Baru Terdaftar', '16:00', '2026-05-28 09:00:12', '2026-05-28 09:00:12'),
(22, '📄', 'Materi Baru Diupload', '16:00', '2026-05-28 09:00:12', '2026-05-28 09:00:12'),
(23, '📝', 'Kuis Baru Dibuat', '16:00', '2026-05-28 09:00:12', '2026-05-28 09:00:12'),
(24, '📚', 'Hasil Kuis Diperbarui', '16:00', '2026-05-28 09:00:12', '2026-05-28 09:00:12'),
(25, '👤', 'Mahasiswa Baru Terdaftar', '16:00', '2026-05-28 09:00:19', '2026-05-28 09:00:19'),
(26, '📄', 'Materi Baru Diupload', '16:00', '2026-05-28 09:00:19', '2026-05-28 09:00:19'),
(27, '📝', 'Kuis Baru Dibuat', '16:00', '2026-05-28 09:00:19', '2026-05-28 09:00:19'),
(28, '📚', 'Hasil Kuis Diperbarui', '16:00', '2026-05-28 09:00:19', '2026-05-28 09:00:19'),
(29, '👤', 'Mahasiswa Baru Terdaftar', '16:00', '2026-05-28 09:00:23', '2026-05-28 09:00:23'),
(30, '📄', 'Materi Baru Diupload', '16:00', '2026-05-28 09:00:23', '2026-05-28 09:00:23'),
(31, '📝', 'Kuis Baru Dibuat', '16:00', '2026-05-28 09:00:23', '2026-05-28 09:00:23'),
(32, '📚', 'Hasil Kuis Diperbarui', '16:00', '2026-05-28 09:00:23', '2026-05-28 09:00:23'),
(33, '👤', 'Mahasiswa Baru Terdaftar', '16:01', '2026-05-28 09:01:12', '2026-05-28 09:01:12'),
(34, '📄', 'Materi Baru Diupload', '16:01', '2026-05-28 09:01:12', '2026-05-28 09:01:12'),
(35, '📝', 'Kuis Baru Dibuat', '16:01', '2026-05-28 09:01:12', '2026-05-28 09:01:12'),
(36, '📚', 'Hasil Kuis Diperbarui', '16:01', '2026-05-28 09:01:12', '2026-05-28 09:01:12'),
(37, '👤', 'Mahasiswa Baru Terdaftar', '16:03', '2026-05-28 09:03:08', '2026-05-28 09:03:08'),
(38, '📄', 'Materi Baru Diupload', '16:03', '2026-05-28 09:03:08', '2026-05-28 09:03:08'),
(39, '📝', 'Kuis Baru Dibuat', '16:03', '2026-05-28 09:03:08', '2026-05-28 09:03:08'),
(40, '📚', 'Hasil Kuis Diperbarui', '16:03', '2026-05-28 09:03:08', '2026-05-28 09:03:08'),
(41, '👥', 'User Baru Ditambahkan', '17:04', '2026-05-28 10:04:01', '2026-05-28 10:04:01'),
(42, '👥', 'User Baru Ditambahkan', '17:05', '2026-05-28 10:05:19', '2026-05-28 10:05:19'),
(43, '👥', 'User Baru Ditambahkan', '17:09', '2026-05-28 10:09:17', '2026-05-28 10:09:17'),
(44, '📝', 'Kuis Baru Ditambahkan', '11:46', '2026-05-29 04:46:53', '2026-05-29 04:46:53'),
(45, '📝', 'Kuis Baru Ditambahkan', '05:11', '2026-05-29 22:11:03', '2026-05-29 22:11:03'),
(46, '📝', 'Kuis Baru Ditambahkan', '10:34', '2026-05-30 03:34:31', '2026-05-30 03:34:31'),
(47, '📝', 'Kuis Baru Ditambahkan', '10:37', '2026-05-30 03:37:52', '2026-05-30 03:37:52'),
(48, '📝', 'Kuis Baru Ditambahkan', '10:43', '2026-05-30 03:43:30', '2026-05-30 03:43:30'),
(49, '📝', 'Kuis Baru Ditambahkan', '10:44', '2026-05-30 03:44:20', '2026-05-30 03:44:20'),
(50, '📝', 'Kuis Baru Ditambahkan', '10:48', '2026-05-30 03:48:02', '2026-05-30 03:48:02'),
(51, '📝', 'Kuis Baru Ditambahkan', '10:48', '2026-05-30 03:48:18', '2026-05-30 03:48:18'),
(52, '📝', 'Kuis Baru Ditambahkan', '10:48', '2026-05-30 03:48:32', '2026-05-30 03:48:32'),
(53, '📝', 'Kuis Baru Ditambahkan', '13:24', '2026-05-30 06:24:19', '2026-05-30 06:24:19'),
(54, '📝', 'Kuis Baru Ditambahkan', '16:37', '2026-05-30 09:37:24', '2026-05-30 09:37:24'),
(55, '📝', 'Kuis Baru Ditambahkan', '16:41', '2026-05-30 09:41:09', '2026-05-30 09:41:09'),
(56, '📝', 'Kuis Baru Ditambahkan', '16:42', '2026-05-30 09:42:51', '2026-05-30 09:42:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-ardha7@gmail.com|127.0.0.1', 'i:1;', 1780159077),
('laravel-cache-ardha7@gmail.com|127.0.0.1:timer', 'i:1780159077;', 1780159077);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `hasil_kuis`
--

CREATE TABLE `hasil_kuis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_mahasiswa` varchar(255) NOT NULL,
  `kuis_id` bigint(20) UNSIGNED NOT NULL,
  `mata_kuliah` varchar(255) NOT NULL,
  `jumlah_benar` int(11) NOT NULL DEFAULT 0,
  `jumlah_salah` int(11) NOT NULL DEFAULT 0,
  `nilai` int(11) NOT NULL DEFAULT 0,
  `status` enum('lulus','tidak_lulus') NOT NULL DEFAULT 'tidak_lulus',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `hasil_kuis`
--

INSERT INTO `hasil_kuis` (`id`, `user_id`, `nama_mahasiswa`, `kuis_id`, `mata_kuliah`, `jumlah_benar`, `jumlah_salah`, `nilai`, `status`, `created_at`, `updated_at`) VALUES
(5, 22, 'Ardha', 12, 'Pemograman Dasar', 0, 7, 0, 'tidak_lulus', '2026-05-29 23:42:33', '2026-05-29 23:42:33'),
(6, 22, 'Ardha', 12, 'Pemograman Dasar', 7, 0, 70, 'lulus', '2026-05-29 23:43:29', '2026-05-29 23:43:29'),
(7, 22, 'Ardha', 18, 'Basis Data 2', 4, 16, 40, 'tidak_lulus', '2026-05-30 03:53:35', '2026-05-30 03:53:35'),
(8, 46, 'ardha3', 25, 'Basis Data 4', 5, 15, 50, 'tidak_lulus', '2026-05-30 06:27:21', '2026-05-30 06:27:21'),
(9, 48, 'ardha10', 25, 'Basis Data 4', 3, 17, 30, 'tidak_lulus', '2026-05-30 09:46:53', '2026-05-30 09:46:53'),
(10, 49, 'Sarah Asmiati', 29, 'Asah Otak', 1, 9, 10, 'tidak_lulus', '2026-05-30 09:51:53', '2026-05-30 09:51:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
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
-- Struktur dari tabel `job_batches`
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
-- Struktur dari tabel `kuis`
--

CREATE TABLE `kuis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul_kuis` varchar(255) NOT NULL,
  `dosen` varchar(255) NOT NULL,
  `jumlah_soal` int(11) NOT NULL,
  `tingkat_kesulitan` enum('mudah','sedang','sulit') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file_pdf` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kuis`
--

INSERT INTO `kuis` (`id`, `judul_kuis`, `dosen`, `jumlah_soal`, `tingkat_kesulitan`, `created_at`, `updated_at`, `file_pdf`) VALUES
(24, 'Basis Data 3', 'Ardha', 10, 'sedang', '2026-05-30 06:19:23', '2026-05-30 06:19:23', 'kuis/1dmYOkKQ3kZVvcGh1ehG4I8hbtvV4uQQWKRHDzLn.pdf'),
(25, 'Basis Data 4', 'ardha2', 10, 'sulit', '2026-05-30 06:24:19', '2026-05-30 06:24:19', 'kuis/dOe1gSqr67xOb3FqLQOLv8hDMgnh1egmN6RFU5zp.pdf'),
(28, 'Basis Data 5', 'ardha4', 10, 'sulit', '2026-05-30 09:42:51', '2026-05-30 09:42:51', 'kuis/yRINgwpIFXUbpRY0xoP8SW6H0zpUeHZci3c3oACd.pdf'),
(29, 'Asah Otak', 'Sarah Asmiati', 10, 'sedang', '2026-05-30 09:50:23', '2026-05-30 09:50:23', 'kuis/KFh59oKLqvkxP1ax8SkkJh49bHg3l0VMlBZiu2mI.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `materis`
--

CREATE TABLE `materis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `dosen` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `ukuran_file` varchar(255) NOT NULL,
  `file_pdf` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `materis`
--

INSERT INTO `materis` (`id`, `judul`, `kategori`, `dosen`, `semester`, `ukuran_file`, `file_pdf`, `created_at`, `updated_at`) VALUES
(4, 'asdasda', 'asdasda', 'sdads', 'Semester 2', '1164.24 KB', 'materi/DMxA80GGnRL5Su6dKKJBiLkDVhqkcYh0PheZTDaS.pdf', '2026-05-28 06:48:16', '2026-05-28 06:48:16'),
(5, 'asdasd', 'dsaasdas', 'sadad', 'Semester 2', '1164.24 KB', 'materi/DTpcTxDYA4D9bhx7C8gRMDvx57Qh7d75IMj1bNja.pdf', '2026-05-29 05:11:00', '2026-05-29 05:11:00'),
(9, 'Pemograman Dasar', 'Informatika', 'Dosen ini', 'Semester 3', '1164.24 KB', 'materi/LYLXwXf3fYI7WyjmJXi5qQzQkTN9i8n6O3EICstm.pdf', '2026-05-29 23:02:46', '2026-05-29 23:02:46'),
(10, 'Basis Data', 'Informatika', 'Budi', 'Semester 5', '15609.52 KB', 'materi/Z5iZwFpFjLLyCRRe4fDcQ73LKk4DHfGhXyM7IDyQ.pdf', '2026-05-30 03:00:01', '2026-05-30 03:00:01'),
(11, 'Basis Data', 'Informatika', 'Dosen ini', 'Semester 7', '1338.65 KB', 'materi/48XT84RsixzKtJZ9LZM92AMbjZR1KFbad1rvEOzJ.pdf', '2026-05-30 03:49:05', '2026-05-30 03:49:05'),
(13, 'Basis Data', 'Sistem Informasi', 'Gunawan', 'Semester 5', '1338.65 KB', 'materi/8ja2WijBNfozlPYISESp95RAZNHDVdoTRW7d0oZt.pdf', '2026-05-30 05:51:52', '2026-05-30 05:51:52'),
(14, 'Basis Data 3', 'Informatika', 'Ardha', 'Semester 6', '1338.65 KB', 'materi/BlDtFQwxO7MHQQ8oVNoPHDANwgQ65xCzPl0ibqnV.pdf', '2026-05-30 06:18:47', '2026-05-30 06:18:47'),
(15, 'Basis Data', 'Informatika', 'ardha2', 'Semester 4', '1338.65 KB', 'materi/qwG3PM340w6TPxs86eDyM8t8Su2c5kqm5W6kLjhZ.pdf', '2026-05-30 06:25:25', '2026-05-30 06:25:25'),
(16, 'Basis Data 5', 'Informatika', 'ardha4', 'Semester 3', '1338.65 KB', 'materi/VUeViwz9Kx70IGFV64l0iMhQScsH0BAk7g3WzkjF.pdf', '2026-05-30 09:43:25', '2026-05-30 09:43:25'),
(17, 'Basis Data 6', 'Informatika', 'Sarah Asmiati', 'Semester 8', '1338.65 KB', 'materi/GxIq2HqsZy0XF2UBqv6qfplvVhxM15QYjR1sVGCX.pdf', '2026-05-30 09:49:42', '2026-05-30 09:49:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2026_05_27_112942_create_materis_table', 1),
(4, '2026_05_27_112948_create_kuis_table', 1),
(5, '2026_05_27_120437_create_users_table', 1),
(6, '2026_05_27_173551_add_status_to_users_table', 1),
(7, '2026_05_28_064918_create_soals_table', 1),
(8, '2026_05_28_155204_create_aktivitas_table', 2),
(9, '2026_05_29_145215_create_hasil_kuis_table', 3),
(10, '2026_05_29_150245_create_hasil_kuis_table', 4),
(11, '2026_05_29_163415_add_nama_mahasiswa_to_hasil_kuis_table', 5),
(12, '2026_05_30_045729_add_matkul_to_soals_table', 6);

-- --------------------------------------------------------

--
-- Struktur dari tabel `soals`
--

CREATE TABLE `soals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kuis_id` bigint(20) UNSIGNED NOT NULL,
  `matkul` varchar(255) DEFAULT NULL,
  `pertanyaan` text NOT NULL,
  `pilihan_a` text NOT NULL,
  `pilihan_b` text NOT NULL,
  `pilihan_c` text NOT NULL,
  `pilihan_d` text NOT NULL,
  `jawaban_benar` varchar(255) NOT NULL,
  `kesulitan` enum('mudah','sedang','sulit') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `soals`
--

INSERT INTO `soals` (`id`, `kuis_id`, `matkul`, `pertanyaan`, `pilihan_a`, `pilihan_b`, `pilihan_c`, `pilihan_d`, `jawaban_benar`, `kesulitan`, `created_at`, `updated_at`) VALUES
(271, 24, 'Basis Data 3', 'Manakah penjelasan yang paling tepat?', 'Format sama \n5 Fleksibelitas Setiap adanya kebutuhan \nbaru, maka diperlukan \npembuatan program baru \nTerdapat fasilitas query \nsehingga memungkinkan \ndengan adanya kebutuhan \nbaru maka dapat saja tidak \nperlu melakukan pembuatan \nprogram baru untuk query atau \nlaporan \n6 Kelebihan a.', 'Misalnya pada sistem database akademik, yang menjadi \nentity adalah mahasiswa, dosen, mata kuliah, dan lain-lain.', 'Dengan model relasi ini, data terorganisir dengan baik sehingga \ndapat dengan mudah dilakukan manipulasi data dan menghasilkan sebuah informasi \nyang baik.', 'Sistem database terdistribusi homogen yaitu \nmenggunakan perangkat lunak DBMS yang sama dari beberapa server.', 'A', 'sulit', '2026-05-30 06:22:39', '2026-05-30 06:22:39'),
(272, 24, 'Basis Data 3', 'Apa fungsi utama dari pembahasan berikut?', 'Dalam beberapa tahun terakhir, terdapat model data baru yaitu model data \nberorientasi objek.', 'Walaupun disimpan secara bersama-\nsama dan saling terhubung, kumpulan data tersebut tersimpan tanpa saling tumpang \ntindih satu sama lain atau tidak terjadi kerangkapan data.', '6 \nRelational Model \n \nPada Gambar 1.6 tabel PART atau SUKU CADANG berelasi dengan tabel DELIVERY \ndan tabel SUPPLIER.', 'Karakter (character) \nMerupakan bagian terkecil dalam database, dapat berupa karakter numerik \n(angka 0 s.d 9), huruf (A – Z, a – z) ataupun karakter-karakter khusus, seperti *, \n&.', 'C', 'mudah', '2026-05-30 06:22:39', '2026-05-30 06:22:39'),
(273, 24, 'Basis Data 3', 'Apa fungsi utama dari pembahasan berikut?', 'Basis Data \n \n10) Koleksi data yang terpadu yang saling berkaitan yang dirancang untuk memenuhi \nkebutuhan informasi suatu dunia usaha disebut ....', 'Klasifikasi Berdasarkan Model Data \nBeberapa model data adalah model data relasi atau sering disebut DBMS, model \ndata hierarki, dan model data jaringan.', 'Klasifikasi Berdasarkan Sistem Distribusi \nAda empat sistem distribusi utama dalam klasifikasi basis data ini diantaranya \nsistem terpusat dimana basis data disimpan dalam sebuah server terpusat dan digunakan \noleh beberapa sistem lainnya.', 'Dengan demikian, kebutuhan \nakan informasi selain dari informasi rutin dapat terpenuhi.', 'C', 'sedang', '2026-05-30 06:22:39', '2026-05-30 06:22:39'),
(274, 24, 'Basis Data 3', 'Manakah penjelasan yang paling tepat?', 'Administrator basis data atau  DBA (Database Administrator) adalah orang yang \nbertanggungjawab terhadap pengelolaan basis data.', 'Sistem informasi merupakan kombinasi dari beberapa teknologi informasi dengan \naktivitas pengguna untuk dapat memenuhi kebutuhan sebuah organisasi.', 'MSIM4206  Modul 01 1.21  \n \nTahun 1971 First Generation – Hierarchical Model \nDBMS generasi pertama yaitu model hirarki (hierarchical model).', 'Seperti yang telah dipelajari sebelumnya, bahwa basis data adalah sekumpulan \nfile atau tabel yang saling berhubungan antara satu dengan yang lainnya.', 'C', 'sedang', '2026-05-30 06:22:39', '2026-05-30 06:22:39'),
(275, 24, 'Basis Data 3', 'Manakah pernyataan yang termasuk pembahasan dalam materi?', 'Bacalah rangkuman yang disediakan untuk memberikan ringkasan tentang esensi \nbasis data, konsep sistem basis data dan DBMS.', 'Intergritas data mengacu pada validitas dan \nkonsistensi dari data yang disimpan.', 'Semua Jawaban Benar \n \n8) Hasil pengolahan data yang telah diolah sedemikian rupa sehingga memiliki \nmakna tertentu bagi pengguna adalah ....', 'Sebagai contoh akan menampilkan data pasien dari tabel PASIEN \nmaka contoh SQL-nya adalah: \n \nSELECT * FROM PASIEN; \n \n7.', 'A', 'sedang', '2026-05-30 06:22:39', '2026-05-30 06:22:39'),
(276, 24, 'Basis Data 3', 'Apa yang dimaksud dengan konsep berikut berdasarkan materi?', 'Lapisan ini menjabarkan data apa \n(what) saja yang sesungguhnya disimpan pada basis data dan juga menjabarkan \nhubungan-hubungan antar data secara keseluruhan.', 'Hal ini disebabkan proses pencarian harus mencari lembaran–lembaran yang ada pada \ndokumen tersebut dan dapat menyebabkan waktu pencarian yang kurang efisien.', 'Apabila mencapai tingkat penguasaan 80% atau lebih, Anda dapat meneruskan \ndengan Kegiatan Belajar 2.', 'data dalam basis data dapat berkembang dengan mudah baik volume maupun \nstrukturnya.', 'A', 'sedang', '2026-05-30 06:22:39', '2026-05-30 06:22:39'),
(277, 24, 'Basis Data 3', 'Berdasarkan materi, konsep yang tepat adalah?', 'Level ya ng berada di tengah yang menyediakan mapping dan \nmenghubungkan external views dan internal model \nC.', 'Database systems: A practical approach to design, \nimplementation, and management (6th ed.).', 'Sistem database terdistribusi homogen yaitu \nmenggunakan perangkat lunak DBMS yang sama dari beberapa server.', 'TINGKATAN DATA DALAM DATABASE RELASI \n \nDalam suatu sistem database relasi, data yang tersimpan dalam DBMS \nmempunyai tingkatan-tingkatannya, sebagaimana tampak dalam Gambar 1.3 berikut.', 'C', 'sulit', '2026-05-30 06:22:39', '2026-05-30 06:22:39'),
(278, 24, 'Basis Data 3', 'Pernyataan manakah yang sesuai dengan isi materi?', 'Misal record entity mahasiswa \nadalah kumpulan data value dari field nomor telepon genggam, nama, jurusan, \ndan alamat per-barisnya.', 'Hal ini mengurangi \nkerangkapan data dan mengurangi biaya untuk tempat penyimpanan.', 'Sistem informasi merupakan kombinasi dari beberapa teknologi informasi dengan \naktivitas pengguna untuk dapat memenuhi kebutuhan sebuah organisasi.', 'P  \n \n  1.4   Basis Data dan Sistem Basis Data \n \n \nBasis Data  \n \nKegiatan \nBelajar \n1 \n \nada tahun 60-an, perkembangan tempat penyimpanan data masih dilakukan \nsecara manual dan belum dikenal apa yang dinamakan basis data.', 'B', 'sedang', '2026-05-30 06:22:39', '2026-05-30 06:22:39'),
(279, 24, 'Basis Data 3', 'Dari pilihan berikut, mana yang paling sesuai dengan materi?', 'Computer science education: Applying \ncognitive load theory to the redesign of a vonventional database systems course.', 'Namun, tidak semua bentuk penyimpanan data \nyang disimpan secara elektronik dikatakan basis data karena ketika menyimpan \ndokumen di dalam sebuah harddisk, harddisk tersebut dapat berisi data file teks dari \nprogram pengolahan kata, spreadsheet, dan lainnya.', 'Objek tersebut direkam dalam \nbentuk angka, huruf, simbol, teks, gambar, bunyi, atau kombinasinya.', 'Himpunan kelompok data yang saling berhubunga n dan terorganisasi dengan \nbaik agar kelak dapat dimanfaatkan kembali dengan cepat dan mudah.', 'C', 'mudah', '2026-05-30 06:22:39', '2026-05-30 06:22:39'),
(280, 24, 'Basis Data 3', 'Berdasarkan materi, konsep yang tepat adalah?', 'Constrains \nadalah aturan-aturan di dalam tabel basis data yang dapat mencegah penghapusan atau \nperubahan data dari suatu tabel karena data dalam tabel tersebut mempunyai keterkaitan \ndengan data pada tabel lain.', 'DBMS (database management system), merupakan perangkat lunak (software) \nyang digunakan untuk menentukan bagaimana data tersebut dapat terorganisasi, \ntersimpan, diubah serta diambil kembali.', 'Basis dapat diartikan sebagai markas atau gudang  atau tempat bersarang atau  \ntempat berkumpul.', 'data disimpan sedemikian rupa sehingga proses penambahan, pengambilan, dan \nmodifikasi data dapat dilakukan dengan mudah dan terkontrol.', 'B', 'sedang', '2026-05-30 06:22:39', '2026-05-30 06:22:39'),
(281, 25, 'Basis Data 4', 'Apa tujuan utama dari pembahasan berikut?', 'TINGKATAN DATA DALAM DATABASE RELASI \n \nDalam suatu sistem database relasi, data yang tersimpan dalam DBMS \nmempunyai tingkatan-tingkatannya, sebagaimana tampak dalam Gambar 1.3 berikut.', 'Informasi sangat berguna bagi setiap orang atau \norganisasi untuk mengambil suatu putusan.', 'Sumber : Fathansyah (2015), diolah penulis \nGambar 1.1  \nLemari Berkas \nP MSIM4206  Modul 01 1.5  \n \n \nSumber: Fathansyah (2015), diolah penulis \n \nGambar 1.2  \nBasis Data Magnetik \n \nDari gambar tersebut, terlihat perbedaan antara basis data dan lemari arsip di \nmana setiap rak dalam lemari tersebut dapat menyimpan dokumen-dokumen manual \nyang terdiri dari lembaran-lembaran kertas.', 'Klasifikasi Berdasarkan Model Data \nBeberapa model data adalah model data relasi atau sering disebut DBMS, model \ndata hierarki, dan model data jaringan.', 'D', 'sulit', '2026-05-30 06:24:34', '2026-05-30 06:24:34'),
(282, 25, 'Basis Data 4', 'Manakah pernyataan yang termasuk pembahasan dalam materi?', 'Model jaringan basis data tersebut distandarisasi oleh Conference \non Data System Language (CODASYL).', 'Sistem : Sebuah tatanan (keterpaduan) yang terdiri atas sejumlah \nkomponen fungsional yang saling berhubungan dan secara \nbersama-sama bertujuan untuk memenuhi suatu proses \ntertentu.', 'Model hirarki ini \nmerupakan kumpulan record yang dihubungkan satu sama lain berdasarkan pointer \nberbentuk pohon.', 'Informasi : Data atau fakta yang telah diolah menjadi suatu bentuk yang \nmempunyai arti dan bermanfaat untuk membantu seseorang \ndalam mengambil putusan.', 'A', 'sulit', '2026-05-30 06:24:34', '2026-05-30 06:24:34'),
(283, 25, 'Basis Data 4', 'Apa yang dimaksud dengan konsep berikut berdasarkan materi?', 'File/Tabel : Merupakan sekumpulan record sejenis secara relasi yang \ntersimpan dalam media penyimpan sekunder.', 'Pemrogram aplikasi adalah orang yang membuat program aplikasi menggunakan \nbasis data dan bahasa pemograman.', 'Program aplikasinya telah dibuat oleh pemrogram aplikasi \nsehingga pengguna aplikasi tinggal mengoperasikannya saja.', 'MSIM4206  Modul 01 1.25  \n \nPada level fisik, pegawai dapat dijabarkan sebagai blok data yang terletak pada \nlokasi berurutan (satuan byte).', 'B', 'mudah', '2026-05-30 06:24:34', '2026-05-30 06:24:34'),
(284, 25, 'Basis Data 4', 'Manakah penjelasan yang paling tepat?', 'Tidak ada jawaban yang benar \n \n4) Memberikan batasan -batasan dalam pengakses an data, misalnya dengan \nmmberikan password dan pemberian hak akses bagi pemakai disebut dengan ….', 'Database \n \n2) Perangkat Lunak ( software) yang digunakan untuk mengelola kumpulan atau \nkoleksi data, di mana data tersebut diorganisasikan atau disusun ke dalam suatu \nmodel data disebut ....', 'Layanan Pelanggan (customer care): untuk perusahaan yang berhubungan \ndengan banyak pelanggan (bank, konsultan, dan lain-lain) \n \n2.', 'DBMS ini bisa berupa sistem basis data pengguna tunggal, yang mendukung satu \npengguna dalam satu waktu, atau sistem basis data multi pengguna, yang mendukung \nbanyak pengguna secara bersamaan.', 'C', 'sedang', '2026-05-30 06:24:34', '2026-05-30 06:24:34'),
(285, 25, 'Basis Data 4', 'Manakah pernyataan yang paling benar berdasarkan materi?', 'Penghapusan data identik dengan \npenghapusan sebuah lembaran arsip di sebuah kotak arsip yang ada di sebuah \nbasis data.', 'Keamanan basis data dapat melindungi basis data \ndari pengguna yang tidak memiliki otorisasi.', 'Sistem informasi merupakan kombinasi dari beberapa teknologi informasi dengan \naktivitas pengguna untuk dapat memenuhi kebutuhan sebuah organisasi.', 'Sebagai contoh \nSistem Informasi Perpustakaan, Sistem Informasi Akademis, Sistem Informasi \nPenggajian, Dan Sistem Informasi Persediaan.', 'A', 'sulit', '2026-05-30 06:24:34', '2026-05-30 06:24:34'),
(286, 25, 'Basis Data 4', 'Dari pilihan berikut, mana yang paling sesuai dengan materi?', 'Format sama \n5 Fleksibelitas Setiap adanya kebutuhan \nbaru, maka diperlukan \npembuatan program baru \nTerdapat fasilitas query \nsehingga memungkinkan \ndengan adanya kebutuhan \nbaru maka dapat saja tidak \nperlu melakukan pembuatan \nprogram baru untuk query atau \nlaporan \n6 Kelebihan a.', 'Hardware, Operating System, Database, DBMS, User, Appplication \nSystem \n \n \n \n \n  \n \n  1.32   Basis Data dan Sistem Basis Data \n \n \nCocokkanlah jawaban Anda deng an Kunci Jawaban  Tes Formatif 2  yang \nterdapat di bagian akhir modul ini.', 'Operasi-operasi \nbasis data yang telah dijelaskan diatas akan dipelajari secara rinci pada pembahasan di \nModul 5 tentang Structured Query Language (SQL) dan Modul 6 tentang Praktikum \nSQL.', 'Pada awal tahun tersebut,  Charles \nBachman membuat sebuah desain DBMS pertama yang disebut dengan penyimpanan \ndata terintegrasi.', 'A', 'mudah', '2026-05-30 06:24:34', '2026-05-30 06:24:34'),
(287, 25, 'Basis Data 4', 'Berdasarkan materi, konsep yang tepat adalah?', 'Beberapa penjelasan tentang keterkaitan \nantara basis data dan sistem informasi adalah sebagai berikut: \n1.', 'Yang ditekankan dalam basis data adalah pengaturan, pemilahan, \npengelompokan, dan pengorganisasian data yang disimpan sesuai dengan fungsinya.', 'File/Tabel : Merupakan sekumpulan record sejenis secara relasi yang \ntersimpan dalam media penyimpan sekunder.', 'Pada umumnya, perancangan sistem didasarkan \npada kebutuhan individual pemakai, bukan berdasarkan kebutuhan sejumlah pemakai.', 'B', 'sulit', '2026-05-30 06:24:34', '2026-05-30 06:24:34'),
(288, 25, 'Basis Data 4', 'Manakah pernyataan yang paling benar berdasarkan materi?', 'Sejarah Database Management System (DBMS): \n \nTahun 1960 Network Database \nSejarah sebuah basis data diawali tahun 1960.', 'Sebagai contoh misalnya sebelum \npengguna mendapatkan data yang diinginkan, pengguna harus melakukan login terlebih \ndahulu, sehingga data lebih aman.', 'Klasifikasi Berdasarkan Sistem Distribusi \nAda empat sistem distribusi utama dalam klasifikasi basis data ini diantaranya \nsistem terpusat dimana basis data disimpan dalam sebuah server terpusat dan digunakan \noleh beberapa sistem lainnya.', 'Model jaringan basis data tersebut distandarisasi oleh Conference \non Data System Language (CODASYL).', 'B', 'sedang', '2026-05-30 06:24:34', '2026-05-30 06:24:34'),
(289, 25, 'Basis Data 4', 'Konsep berikut dalam materi menjelaskan tentang apa?', 'Field atau Attribute \nMerupakan bagian dari record yang menunjukkan suatu item data yang sejenis, \nmisalnya field nama, field NIM, dan lain sebagainya.', 'Model ini merupakan sistem manajemen basis data dimana informasi \ndirepresentasikan dalam bentuk objek seperti yang digunakan dalam pemrograman \nberorientasi objek.', 'Sebagai contoh data pasien dengan PasienID=1 \nakan diubah alamatnya dari Jalan Pondok Cabe menjadi Jl Pondok Cabe maka  \nSQL nya adalah: \n \nUPDATE PASIEN \nSET Address = \'Jl Pondok Cabe\' \nWHERE PasienID=1; \n \n8.', 'PENGERTIAN SISTEM BASIS DATA DAN KOMPONEN SISTEM \nBASIS DATA \n \nBerbeda dengan Basis Data (database), sistem basis data dapat diartikan sebagai \nsuatu sistem yang di dalamnya terdiri dari koleksi data atau suatu kumpulan data yang \nsaling berhubungan dan memungkinkan berbagai program untuk mengakses dan \nmemanipulasi data tersebut.', 'D', 'sulit', '2026-05-30 06:24:34', '2026-05-30 06:24:34'),
(290, 25, 'Basis Data 4', 'Berdasarkan materi, konsep yang tepat adalah?', 'Record atau Tupple \nTuple/Record adalah kumpulan data value dari attribute yang berkaitan sehingga \ndapat menjelaskan sebuah entity secara lengkap.', 'Nasabah pun akan dapat \nmelihat posisi terakhir saldonya melalui channel-channel tersebut.', 'Pembuatan tabel \nbaru identik dengan penambahan  kotak arsip baru ke sebuah lemari arsip yang \ntelah ada.', 'Kehadiran basis data juga dapat meningkatkan kinerja dan \ndaya saing sebuah organisasi.', 'D', 'sulit', '2026-05-30 06:24:34', '2026-05-30 06:24:34'),
(291, 25, 'Basis Data 4', 'Berdasarkan materi, konsep yang tepat adalah?', 'Intergritas data mengacu pada validitas dan \nkonsistensi dari data yang disimpan.', 'Sistem : Sebuah tatanan (keterpaduan) yang terdiri atas sejumlah \nkomponen fungsional yang saling berhubungan dan secara \nbersama-sama bertujuan untuk memenuhi suatu proses \ntertentu.', 'Pemrogram aplikasi adalah orang yang membuat program aplikasi menggunakan \nbasis data dan bahasa pemograman.', 'Misal akan dihapus tabel PASIEN dalam basis data  \nRUMAHSAKIT maka contoh perintah SQL dalam penghapusan tabel adalah:  \n \nDROP TABLE PASIEN; \n \n5.', 'A', 'sedang', '2026-05-30 06:24:36', '2026-05-30 06:24:36'),
(292, 25, 'Basis Data 4', 'Pernyataan manakah yang sesuai dengan isi materi?', 'MSIM4206  Modul 01 1.21  \n \nTahun 1971 First Generation – Hierarchical Model \nDBMS generasi pertama yaitu model hirarki (hierarchical model).', 'P  \n \n  1.4   Basis Data dan Sistem Basis Data \n \n \nBasis Data  \n \nKegiatan \nBelajar \n1 \n \nada tahun 60-an, perkembangan tempat penyimpanan data masih dilakukan \nsecara manual dan belum dikenal apa yang dinamakan basis data.', 'Basis data dapat memilah data utama atau master, \ntransaksi, data history hingga data kedaluwarsa.', 'Program aplikasinya telah dibuat oleh pemrogram aplikasi \nsehingga pengguna aplikasi tinggal mengoperasikannya saja.', 'B', 'mudah', '2026-05-30 06:24:36', '2026-05-30 06:24:36'),
(293, 25, 'Basis Data 4', 'Manakah pernyataan yang termasuk pembahasan dalam materi?', 'Dengan memanfaatkan pengkodean  atau pembentukan \nrelasi antar data, penerapan aturan atau batasan tipe data dapat diterapkan dalam \nbasis data yang berguna untuk menentukan keakurata n saat input data atau \npenyimpanan data.', 'Hemat penyimpanan data \n3 Ketergantungan \nData \nDefinisi file terdapat pada \nprogram sehingga sulit untuk \nmengubah struktur file \nDefinisi file tidak terdapat \npada DBMS \n4 Format  Berbeda-beda format, baik \nnama file, tipe data, panjang \ndata ataupun dengan desimal \natau tidak.', '1.8   Basis Data dan Sistem Basis Data \n \n \nDari definisi tersebut dapat disimpulkan bahwa pengertian basis data adalah \nkoleksi terpadu dari data yang saling berkaitan dan dirancang untuk memenuhi \nkebutuhan informasi suatu organisasi.', 'Karakter (character) \nMerupakan bagian terkecil dalam database, dapat berupa karakter numerik \n(angka 0 s.d 9), huruf (A – Z, a – z) ataupun karakter-karakter khusus, seperti *, \n&.', 'A', 'sulit', '2026-05-30 06:24:36', '2026-05-30 06:24:36'),
(294, 25, 'Basis Data 4', 'Konsep berikut dalam materi menjelaskan tentang apa?', 'Kemudian yang terakhir sistem \ndatabase terdistribusi heterogen yaitu server yang berbeda mungkin menggunakan \nperangkat lunak DBMS yang berbeda, tetapi ada perangkat lunak umum tambahan \nuntuk mendukung pertukaran data di antara server tersebut.', 'Sistem basis data dapat di artikan suatu sistem yang didalamnya terdiri dari \nkoleksi data atau dari suatu kumpulan data yang saling berhubungan dan \nmemungkinkan berbagai program untuk mangakses dan memanipulasi data tersebut.', 'Menjelaskan definisi basis data, tujuan basis data, manfaat basis data, kelebihan \ndan kekurangan basis data, operasi pada basis data, dan penerapan basis data \n2.', 'Beberapa penjelasan tentang keterkaitan \nantara basis data dan sistem informasi adalah sebagai berikut: \n1.', 'A', 'mudah', '2026-05-30 06:24:36', '2026-05-30 06:24:36'),
(295, 25, 'Basis Data 4', 'Pernyataan manakah yang sesuai dengan isi materi?', 'Tidak ada jawaban yang benar \n \n4) Memberikan batasan -batasan dalam pengakses an data, misalnya dengan \nmmberikan password dan pemberian hak akses bagi pemakai disebut dengan ….', 'Sebagai contoh akan menampilkan data pasien dari tabel PASIEN \nmaka contoh SQL-nya adalah: \n \nSELECT * FROM PASIEN; \n \n7.', 'Apabila mencapai tingkat penguasaan 80%  atau lebih, Anda dapat menerusk an \ndengan modul selanjutnya.', 'Database \n \n2) Perangkat Lunak ( software) yang digunakan untuk mengelola kumpulan atau \nkoleksi data, di mana data tersebut diorganisasikan atau disusun ke dalam suatu \nmodel data disebut ....', 'B', 'sedang', '2026-05-30 06:24:36', '2026-05-30 06:24:36'),
(296, 25, 'Basis Data 4', 'Manakah pernyataan yang termasuk pembahasan dalam materi?', 'Menjelaskan pengertian sistem basis data dan komponen basis data, konsep \nDBMS, abstraksi data, dan struktur sistem basis data secara keseluruhan.', 'data dapat digunakan oleh pemakai yang berbeda -beda atau beberapa program \naplikasi tanpa perlu mengubah basis data.', 'Sistem informasi merupakan kombinasi teratur dari manusia, hardware, \nsoftware, jaringan komunikasi, dan sumber daya data, yang mengumpulkan, \nmengubah, dan menyebarkan informasi dalam sebuah organisasi.', 'Klasifikasi Berdasarkan Sistem Distribusi \nAda empat sistem distribusi utama dalam klasifikasi basis data ini diantaranya \nsistem terpusat dimana basis data disimpan dalam sebuah server terpusat dan digunakan \noleh beberapa sistem lainnya.', 'D', 'sedang', '2026-05-30 06:24:36', '2026-05-30 06:24:36'),
(297, 25, 'Basis Data 4', 'Manakah penjelasan yang paling tepat?', 'Jika nasabah akan melakukan transfer ke \nberbagai rekening melalui teller, ATM, internet banking , dan mobile \nbanking, di mana channel-channel tersebut akan memasukkan data \ntransaksi itu dan menyimpannya dalam basis data.', 'Bacalah rangkuman yang disediakan untuk memberikan ringkasan tentang esensi \nbasis data, konsep sistem basis data dan DBMS.', '2) Diskusikanlah hasil jawaban Anda dengan teman sejawat dengan memahami \nterlebih dahulu materi mengenai traditional file base system serta materi \nmengenai database management system.', 'data dapat digunakan oleh pemakai yang berbeda -beda atau beberapa program \naplikasi tanpa perlu mengubah basis data.', 'A', 'sulit', '2026-05-30 06:24:36', '2026-05-30 06:24:36'),
(298, 25, 'Basis Data 4', 'Pernyataan manakah yang sesuai dengan isi materi?', 'Menjelaskan definisi basis data, tujuan basis data, manfaat basis data, kelebihan \ndan kekurangan basis data, operasi pada basis data, dan penerapan basis data \n2.', 'Sistem manajemen basis data berorientasi objek (OODBMS) \nmenggabungkan kemampuan basis data dengan kemampuan bahasa pemrograman \nberorientasi objek.', 'Sistem : Sebuah tatanan (keterpaduan) yang terdiri atas sejumlah \nkomponen fungsional yang saling berhubungan dan secara \nbersama-sama bertujuan untuk memenuhi suatu proses \ntertentu.', 'Database systems: A practical approach \nto design, implementation and management (3rd edition).', 'D', 'sulit', '2026-05-30 06:24:36', '2026-05-30 06:24:36'),
(299, 25, 'Basis Data 4', 'Berdasarkan materi, konsep yang tepat adalah?', 'Penghapusan tabel \nidentik dengan penghapusan  kotak arsip lama yang ada di sebuah lemari arsip  \nbesrta isinya jika ada .', 'Sistem informasi merupakan kombinasi dari beberapa teknologi informasi dengan \naktivitas pengguna untuk dapat memenuhi kebutuhan sebuah organisasi.', 'Pada lapisan konseptual, masing-masing record \ndijabarkan dengan definisi tipe data.', 'Integritas biasanya diekspresikan dal am \nbatasan ( constraints) yang merupakan aturan yang konsisten dan tidak dapat \ndilanggar.', 'C', 'sulit', '2026-05-30 06:24:36', '2026-05-30 06:24:36'),
(300, 25, 'Basis Data 4', 'Konsep berikut dalam materi menjelaskan tentang apa?', 'Nasabah pun akan dapat \nmelihat posisi terakhir saldonya melalui channel-channel tersebut.', 'Data yang dikenal oleh setiap pengguna bisa berbeda-beda dan barangkali \nhanya mencakup sebagian dari basis data.', 'Pengguna basis data \ndapat memperoleh informasi selain dari informasi rutin yang dikelolanya karena \nsemua data lain berada dalam basis data yang sama.', 'data dapat digunakan oleh pemakai yang berbeda -beda atau beberapa program \naplikasi tanpa perlu mengubah basis data.', 'C', 'sulit', '2026-05-30 06:24:36', '2026-05-30 06:24:36'),
(301, 28, 'Basis Data 5', 'Apa fungsi utama dari pembahasan berikut?', 'Data dapat diartikan sebagai representasi fakta dunia nyata yang mewakili suatu \nobjek seperti manusia (pegawai, siswa, pembeli, dan pelanggan), barang, hewan, \nperistiwa, konsep, keadaan, dan sebagainya.', 'Sistem biner merupakan dasar yang dapat digunakan untuk \nkomunikasi antara manusia dan mesin (komputer) yang \nmerupakan serangkaian komponen elektronik dan hanya \ndapat membedakan dua macam keadaan, yaitu ada tegangan \ndan tidak ada tegangan yang masuk kerangkaian tersebut.', 'Sistem basis data dapat di artikan suatu sistem yang didalamnya terdiri dari \nkoleksi data atau dari suatu kumpulan data yang saling berhubungan dan \nmemungkinkan berbagai program untuk mangakses dan memanipulasi data tersebut.', 'Salah satunya dengan \nmenggunakan Data Manipulation Languages (DML) yang termasuk ke dalam \nStructured Query Language (SQL).', 'D', 'sulit', '2026-05-30 09:42:59', '2026-05-30 09:42:59'),
(302, 28, 'Basis Data 5', 'Berdasarkan materi, konsep yang tepat adalah?', 'Masing–masing table/file di dalam basis data \ntersebut berfungsi untuk menampung atau menyimpan data dimana data-data tersebut \nsaling berhubungan dengan satu dengan yang lain.', 'Kemudian, gunakan rumus \nberikut untuk mengetahui tingkat penguasaan Anda terhadap materi Kegiatan Belajar 1.', 'Untuk meningkatkan efesiensi dan menunjang operasional perusahaan dalam mengelola \nsistem informasi, digunakanlah basis data.', 'Biayanya dapat menjadi sangat mahal karena menyangkut biaya -biaya untuk \npembelian sekaligus perawatan hardware dan software.', 'B', 'sedang', '2026-05-30 09:42:59', '2026-05-30 09:42:59'),
(303, 28, 'Basis Data 5', 'Apa fungsi utama dari pembahasan berikut?', 'Klasifikasi Berdasarkan Sistem Distribusi \nAda empat sistem distribusi utama dalam klasifikasi basis data ini diantaranya \nsistem terpusat dimana basis data disimpan dalam sebuah server terpusat dan digunakan \noleh beberapa sistem lainnya.', 'Data dapat dipakai secara bersama-sama \noleh beberapa program aplikasi saat bersamaan.', '1.16   Basis Data dan Sistem Basis Data \n \n \n \n \nPilihlah satu jawaban yang paling tepat!', 'Generasi ini merupakan sebuah respon terkait dengan berkembangnya bahasa \npemograman berorientasi objek, atribut, dan metode.', 'A', 'sedang', '2026-05-30 09:42:59', '2026-05-30 09:42:59'),
(304, 28, 'Basis Data 5', 'Manakah penjelasan yang paling tepat?', 'Sebagai contoh akan menampilkan data pasien dari tabel PASIEN \nmaka contoh SQL-nya adalah: \n \nSELECT * FROM PASIEN; \n \n7.', 'Daftar Isi   \n \nModul 01  1.1 \nBasis Data dan Sistem Basis Data  \n \n \nKegiatan Belajar 1 \nBasis Data   \n \n1.4 \nLatihan 1.15 \nRangkuman 1.15 \nTes Formatif 1 \n \n1.16 \nKegiatan Belajar 2 \nKonsep Sistem Basis Data                    \ndan DBMS \n   \n1.19 \nLatihan 1.29 \nRangkuman 1.29 \nTes Formatif 2 \n \n1.30 \nKunci Jawaban Tes Formatif   1.33  \nGlosarium 1.34 \nDaftar Pustaka 1.35 MSIM4206  Modul 01 1.3  \n \n \nada modul ini akan dibahas tentang definisi basis data, tujuan basis data, manfaat \nbasis data, kelebihan dan kekurangan pemakaian basis data, operasi pada basis \ndata, penerapan basis data, pengertian sistem basis data, komponen sistem basis \ndata, konsep DBMS, abstraksi data, dan struktur sistem basis data secara keseluruhan.', 'Tidak ada sistem informasi yang bisa dibuat atau \ndijalankan tanpa adanya basis data.', 'Berikut adalah beberapa alasan mengapa sebuah organisasi atau perusahaan \nmemerlukan sebuah basis data, diantaranya: \n \n1.', 'B', 'sedang', '2026-05-30 09:42:59', '2026-05-30 09:42:59'),
(305, 28, 'Basis Data 5', 'Apa fungsi utama dari pembahasan berikut?', 'Jika masih di bawah 80%, Anda harus mengulangi \nmateri Kegiatan Belajar 1, terutama bagian yang belum dikuasai.', 'Basis Data \n \n10) Koleksi data yang terpadu yang saling berkaitan yang dirancang untuk memenuhi \nkebutuhan informasi suatu dunia usaha disebut ....', 'Model hirarki ini \nmerupakan kumpulan record yang dihubungkan satu sama lain berdasarkan pointer \nberbentuk pohon.', 'Operasi-operasi \nbasis data yang telah dijelaskan diatas akan dipelajari secara rinci pada pembahasan di \nModul 5 tentang Structured Query Language (SQL) dan Modul 6 tentang Praktikum \nSQL.', 'D', 'mudah', '2026-05-30 09:42:59', '2026-05-30 09:42:59'),
(307, 28, 'Basis Data 5', 'Manakah pernyataan yang paling benar berdasarkan materi?', 'Sistem \n \n \n  \n \n  1.18   Basis Data dan Sistem Basis Data \n \n \nCocokkanlah jawaban Anda dengan Kunci Jawaban Tes Formatif 1 yang terdapat \ndi bagian akhir modul ini.', 'DBMS (database management system), merupakan perangkat lunak (software) \nyang digunakan untuk menentukan bagaimana data tersebut dapat terorganisasi, \ntersimpan, diubah serta diambil kembali.', 'Gambar 1.7 berikut ilustrasi \nkemiripan antara Relational Model dan Object Model.', 'Maka contoh SQL penambahan data tersebut ke dalam \nsebuah tabel PASIEN adalah: \n \nINSERT INTO PASIEN (PasienID, LastName, FirstName, \nAddress, City) \nVALUES (1, ‘Suryadi’, ‘And ri’, ‘Jalan Pondok Cabe’, \n‘Tangerang Selatan’ ); \n MSIM4206  Modul 01 1.13  \n \n6.', 'D', 'mudah', '2026-05-30 09:42:59', '2026-05-30 09:42:59'),
(308, 28, 'Basis Data 5', 'Dari pilihan berikut, mana yang paling sesuai dengan materi?', 'Pengambilan data dari basis data \nidentik dengan pencarian lembaran arsip pada sebuah kotak arsip  dari sebuah \nbasis data.', 'Tujuan utama dalam pengolahan data sebuah basis \ndata adalah agar kita dapat memperoleh atau menemukan kembali data yang kita cari \ndengan mudah dan cepat.', 'Selain itu, \ndiperlukan pula biaya untuk pelatihan staf dalam menggunakan sistem yang baru \nini serta tambahan biaya untuk mempekerjakan staf khusus seperti DBA, d an \nlain-lain.', 'Akan tetapi, untuk sistem \nyang besar dan serius, aspek keamanan menjadi hal yang penting un tuk \nditerapkan.', 'A', 'sulit', '2026-05-30 09:42:59', '2026-05-30 09:42:59'),
(309, 28, 'Basis Data 5', 'Dari pilihan berikut, mana yang paling sesuai dengan materi?', 'Yang ditekankan dalam basis data adalah pengaturan, pemilahan, \npengelompokan, dan pengorganisasian data yang disimpan sesuai dengan fungsinya.', 'Masing–masing table/file di dalam basis data \ntersebut berfungsi untuk menampung atau menyimpan data dimana data-data tersebut \nsaling berhubungan dengan satu dengan yang lain.', 'Table/Entity \nEntity merupakan sesuatu yang dapat diidentifikasi dari suatu sistem database, \nbisa berupa objek, orang, tempat, kejadian, atau konsep yang informasinya akan \ndisimpan di database.', 'Jadi, tidak semua pengguna basis data membutuhkan seluruh informasi yang \nterdapat dalam basis data tersebut.', 'C', 'mudah', '2026-05-30 09:42:59', '2026-05-30 09:42:59'),
(310, 28, 'Basis Data 5', 'Manakah pernyataan yang paling benar berdasarkan materi?', 'Namun, tidak semua bentuk penyimpanan data \nyang disimpan secara elektronik dikatakan basis data karena ketika menyimpan \ndokumen di dalam sebuah harddisk, harddisk tersebut dapat berisi data file teks dari \nprogram pengolahan kata, spreadsheet, dan lainnya.', 'Column \n \n \nMSIM4206  Modul 01 1.17  \n \n6) Dalam operasi-operasi basis data terdapat perintah yang dapat mengambil data \ndari basis data.', 'Traditional File Base System \nSistem pemrosesan traditional file base system ini sekelompok rekaman disimpan \npada sejumlah berkas secara terpisah.', 'PENGERTIAN SISTEM BASIS DATA DAN KOMPONEN SISTEM \nBASIS DATA \n \nBerbeda dengan Basis Data (database), sistem basis data dapat diartikan sebagai \nsuatu sistem yang di dalamnya terdiri dari koleksi data atau suatu kumpulan data yang \nsaling berhubungan dan memungkinkan berbagai program untuk mengakses dan \nmemanipulasi data tersebut.', 'C', 'mudah', '2026-05-30 09:42:59', '2026-05-30 09:42:59'),
(311, 29, 'Asah Otak', 'Berdasarkan materi, konsep yang tepat adalah?', 'Lapisan ini menjabarkan data apa \n(what) saja yang sesungguhnya disimpan pada basis data dan juga menjabarkan \nhubungan-hubungan antar data secara keseluruhan.', 'Model ini merupakan sistem manajemen basis data dimana informasi \ndirepresentasikan dalam bentuk objek seperti yang digunakan dalam pemrograman \nberorientasi objek.', 'Sistem informasi merupakan kombinasi dari beberapa teknologi informasi dengan \naktivitas pengguna untuk dapat memenuhi kebutuhan sebuah organisasi.', 'Sistem : Sebuah tatanan (keterpaduan) yang terdiri atas sejumlah \nkomponen fungsional yang saling berhubungan dan secara \nbersama-sama bertujuan untuk memenuhi suatu proses \ntertentu.', 'C', 'sedang', '2026-05-30 09:50:35', '2026-05-30 09:50:35'),
(312, 29, 'Asah Otak', 'Apa fungsi utama dari pembahasan berikut?', 'TINGKATAN DATA DALAM DATABASE RELASI \n \nDalam suatu sistem database relasi, data yang tersimpan dalam DBMS \nmempunyai tingkatan-tingkatannya, sebagaimana tampak dalam Gambar 1.3 berikut.', 'Salah satu definisi yang cukup lengkap dan baik tentang istilah basis data \nadalah yang diberikan oleh James Martin (1975) dalam buku Sistem Basis Data (Edhy \nSutanta, 2004, h.', 'Informasi sangat berguna bagi setiap orang atau \norganisasi untuk mengambil suatu putusan.', 'PENGERTIAN SISTEM BASIS DATA DAN KOMPONEN SISTEM \nBASIS DATA \n \nBerbeda dengan Basis Data (database), sistem basis data dapat diartikan sebagai \nsuatu sistem yang di dalamnya terdiri dari koleksi data atau suatu kumpulan data yang \nsaling berhubungan dan memungkinkan berbagai program untuk mengakses dan \nmemanipulasi data tersebut.', 'C', 'sedang', '2026-05-30 09:50:35', '2026-05-30 09:50:35'),
(313, 29, 'Asah Otak', 'Dari pilihan berikut, mana yang paling sesuai dengan materi?', 'Data yang dikenal oleh setiap pengguna bisa berbeda-beda dan barangkali \nhanya mencakup sebagian dari basis data.', 'Constrains \nadalah aturan-aturan di dalam tabel basis data yang dapat mencegah penghapusan atau \nperubahan data dari suatu tabel karena data dalam tabel tersebut mempunyai keterkaitan \ndengan data pada tabel lain.', 'Model data yang paling sering digunakan saat \nini adalah model data relasional atau DBMS.', 'Himpunan kelompok data yang saling berhubunga n dan terorganisasi dengan \nbaik agar kelak dapat dimanfaatkan kembali dengan cepat dan mudah.', 'A', 'mudah', '2026-05-30 09:50:35', '2026-05-30 09:50:35'),
(314, 29, 'Asah Otak', 'Berdasarkan materi, konsep yang tepat adalah?', 'Sebagai contoh \nSistem Informasi Perpustakaan, Sistem Informasi Akademis, Sistem Informasi \nPenggajian, Dan Sistem Informasi Persediaan.', 'data dapat digunakan oleh pemakai yang berbeda -beda atau beberapa program \naplikasi tanpa perlu mengubah basis data.', 'Yang ditekankan dalam basis data adalah pengaturan, pemilahan, \npengelompokan, dan pengorganisasian data yang disimpan sesuai dengan fungsinya.', 'DBMS (database management system), merupakan perangkat lunak (software) \nyang digunakan untuk menentukan bagaimana data tersebut dapat terorganisasi, \ntersimpan, diubah serta diambil kembali.', 'B', 'sulit', '2026-05-30 09:50:35', '2026-05-30 09:50:35'),
(315, 29, 'Asah Otak', 'Manakah pernyataan yang termasuk pembahasan dalam materi?', 'Gambar 1.5  \nHierarchical Model \n \nTahun 1976 Second Generation – Relational Model \nPada tahun 1976 generasi kedua dari DBMS yaitu dengan penerapan model relasi \n(relational model).', 'Objek tersebut direkam dalam \nbentuk angka, huruf, simbol, teks, gambar, bunyi, atau kombinasinya.', 'Atau informasi adalah \npengetahuan yang didapatkan dari belajar, pengalaman, atau \ninstruksi.', 'SISTEM INFORMASI, APLIKASI DAN DBMS \n \nDalam kehidupan sehari-hari, sering ditemui sistem informasi dan aplikasi.', 'C', 'sulit', '2026-05-30 09:50:35', '2026-05-30 09:50:35'),
(316, 29, 'Asah Otak', 'Manakah pernyataan yang paling benar berdasarkan materi?', 'ABSTRAKSI DATA \n \nDBMS memiliki tujuan untuk menyediakan interface kepada pengguna.', '17) sebagai berikut: \n \n“A database may be defined as a collection of interrelated data stored together \nwithout harmful or unnecessary redundancy to serve one or more application in \nan optimal fashion; the data are stored so that they are independent of programs \nits used the data;  a common and  controlled approach its used in adding new \ndata and in modifying and retrieving exiting data whithin the database”.', 'Klasifikasi Berdasarkan Sistem Distribusi \nAda empat sistem distribusi utama dalam klasifikasi basis data ini diantaranya \nsistem terpusat dimana basis data disimpan dalam sebuah server terpusat dan digunakan \noleh beberapa sistem lainnya.', 'Sistem informasi merupakan kombinasi teratur dari manusia, hardware, \nsoftware, jaringan komunikasi, dan sumber daya data, yang mengumpulkan, \nmengubah, dan menyebarkan informasi dalam sebuah organisasi.', 'D', 'sedang', '2026-05-30 09:50:35', '2026-05-30 09:50:35'),
(317, 29, 'Asah Otak', 'Dari pilihan berikut, mana yang paling sesuai dengan materi?', 'Basis data dapat menentukan \nbatasan-batasan pengaksesan data, misalnya dengan memberikan password dan \npemberian hak akses bagi pemakai (misal nya untuk hak akses dalam proses  \nupdate, delete, insert, maupun select).', 'MSIM4206  Modul 01 1.19  \n \nKonsep Sistem Basis Data \ndan DBMS  \n \nKegiatan \nBelajar \n2 \n \nada Kegiatan Belajar 2 ini akan membahas konsep sistem basis data dan DBMS.', 'Klasifikasi Berdasarkan Model Data \nBeberapa model data adalah model data relasi atau sering disebut DBMS, model \ndata hierarki, dan model data jaringan.', 'Beberapa manfaat basis data adalah dapat menunjang akurasi, efisiensi, dan kecepatan \noperasi dan sebagai komponen sistem informasi dalam organisasi atau perusahaan.', 'B', 'sulit', '2026-05-30 09:50:35', '2026-05-30 09:50:35'),
(318, 29, 'Asah Otak', 'Pernyataan manakah yang sesuai dengan isi materi?', 'Misal akan dihapus tabel PASIEN dalam basis data  \nRUMAHSAKIT maka contoh perintah SQL dalam penghapusan tabel adalah:  \n \nDROP TABLE PASIEN; \n \n5.', 'Seperti yang dapat dilihat pada Gambar 1.8 berikut ini: \n \n \n \nGambar 1.8  \nSistem Informasi, Aplikasi dan DBMS \n \n \n \n  1.26   Basis Data dan Sistem Basis Data \n \n \nPada gambar (A) merupakan gambaran dari sistem informasi di mana beberapa \naktivitas pengguna sedang mengakses sebuah DBMS menggunakan kombinasi dari \nbeberapa teknologi.', 'Sebagai komponen sistem informasi dalam organisasi atau perusahaan antara \nlain: \na.', 'Jika masih di bawah 80%, Anda harus meng ulangi \nmateri Kegiatan Belajar 2, terutama bagian yang belum dikuasai.', 'D', 'mudah', '2026-05-30 09:50:35', '2026-05-30 09:50:35'),
(319, 29, 'Asah Otak', 'Apa fungsi utama dari pembahasan berikut?', 'Kemudian yang terakhir sistem \ndatabase terdistribusi heterogen yaitu server yang berbeda mungkin menggunakan \nperangkat lunak DBMS yang berbeda, tetapi ada perangkat lunak umum tambahan \nuntuk mendukung pertukaran data di antara server tersebut.', 'DBMS : Database Management System merupakan perangkat lunak \nyang menangani semua pengaksesan ke database.', 'Pengguna ini dapat dikategorikan menjadi pengguna akhir atau \nend user, pemrogram aplikasi dan administrator basis data atau DBA (Database \nAdministrator).', 'Program aplikasinya telah dibuat oleh pemrogram aplikasi \nsehingga pengguna aplikasi tinggal mengoperasikannya saja.', 'B', 'mudah', '2026-05-30 09:50:35', '2026-05-30 09:50:35'),
(320, 29, 'Asah Otak', 'Dari pilihan berikut, mana yang paling sesuai dengan materi?', 'Sebagai contoh akan menampilkan data pasien dari tabel PASIEN \nmaka contoh SQL-nya adalah: \n \nSELECT * FROM PASIEN; \n \n7.', 'Desain DBMS tersebut berbentuk sebuah model jaringan basis data \n(network database).', 'Apabila mencapai tingkat penguasaan 80%  atau lebih, Anda dapat menerusk an \ndengan modul selanjutnya.', 'Menjelaskan definisi basis data, tujuan basis data, manfaat basis data, kelebihan \ndan kekurangan basis data, operasi pada basis data, dan penerapan basis data \n2.', 'B', 'sedang', '2026-05-30 09:50:35', '2026-05-30 09:50:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','dosen','mahasiswa') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`, `status`) VALUES
(40, 'fred2', 'fred123@gmail.com', NULL, '$2y$12$C2XgVTh/cbGQXBptFC6bNudzRlY2vPA5gQC9E7MnXW3sBZE475Ooy', 'mahasiswa', NULL, '2026-05-30 05:41:39', '2026-05-30 05:48:15', 'aktif'),
(42, 'ardha2', 'ardhadosen@gmail.com', NULL, '$2y$12$whNc/FbG8PBNoeAeEJNqXue57Wfy76.sZ6VCdTLy5eETt8QwqdfBK', 'dosen', NULL, '2026-05-30 06:15:45', '2026-05-30 06:17:43', 'aktif'),
(43, 'ardhafillah2', 'ardhamahasiswa@gmail.com', NULL, '$2y$12$WD8yjxjrEi5sprKf4wc84.cpduJe7kXXaMT9TJ/xHnklAXA.6ka/.', 'mahasiswa', NULL, '2026-05-30 06:16:09', '2026-05-30 06:17:52', 'aktif'),
(44, 'ardhafillah', 'ardha@gmail.com', NULL, '$2y$12$5bbgwCxs9xg9kUq1kC.DienE5vjqzp13oEGSANHDF5dXkUEaC2eNu', 'admin', NULL, '2026-05-30 06:20:32', '2026-05-30 06:20:32', NULL),
(45, 'ardha2', 'ardha2@gmail.com', NULL, '$2y$12$S7W2VJyYrHHy3tKzzOrYU.prMSRvtbNFOPfhzmBN8kvANO0yGWqFm', 'dosen', NULL, '2026-05-30 06:23:52', '2026-05-30 06:23:52', NULL),
(46, 'ardha3', 'ardha3@gmail.com', NULL, '$2y$12$6eIHbRQ/oXs29Iczp.gIhu.6Z/kip7BTnATYkPy82nQXL8vfea.xq', 'mahasiswa', NULL, '2026-05-30 06:26:27', '2026-05-30 06:26:27', NULL),
(47, 'ardha4', 'ardha8@gmail.com', NULL, '$2y$12$Q9Oq9Asyae56Ieu.i4miEeAx2.cezQ1ee8eXQSEI4nOB9WExcnKiy', 'dosen', NULL, '2026-05-30 09:36:51', '2026-05-30 09:36:51', NULL),
(48, 'ardha10', 'ardha10@gmail.com', NULL, '$2y$12$Q.nfcf2jK4GfST0/xj3.0u1qLpnHb/BWjtIsV5oFWWvr6UYAIUyL.', 'mahasiswa', NULL, '2026-05-30 09:45:24', '2026-05-30 09:45:24', NULL),
(49, 'Sarah Asmiati', 'sarah@gmail.com', NULL, '$2y$12$teYP/gEC5DKVlKWUdFMPHuKG8LOIKIZZ9Y6nzCyfqV6KbYxi4mJRy', 'mahasiswa', NULL, '2026-05-30 09:48:30', '2026-05-30 09:48:30', 'aktif'),
(50, 'Ardhafillah', 'a@gmail.com', NULL, '$2y$12$bk1XFnuQmilsXDp4YHKoeuNIBN68PujfXsYWLyZp6r0CAIltQDWAy', 'dosen', NULL, '2026-05-30 09:48:44', '2026-05-30 09:48:59', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `aktivitas`
--
ALTER TABLE `aktivitas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `hasil_kuis`
--
ALTER TABLE `hasil_kuis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kuis`
--
ALTER TABLE `kuis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `materis`
--
ALTER TABLE `materis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `soals`
--
ALTER TABLE `soals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `soals_kuis_id_foreign` (`kuis_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `aktivitas`
--
ALTER TABLE `aktivitas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hasil_kuis`
--
ALTER TABLE `hasil_kuis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kuis`
--
ALTER TABLE `kuis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `materis`
--
ALTER TABLE `materis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `soals`
--
ALTER TABLE `soals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `soals`
--
ALTER TABLE `soals`
  ADD CONSTRAINT `soals_kuis_id_foreign` FOREIGN KEY (`kuis_id`) REFERENCES `kuis` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
