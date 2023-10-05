-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Okt 2023 pada 06.56
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vote`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_vote`
--

CREATE TABLE `hasil_vote` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `kandidat_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hasil_vote`
--

INSERT INTO `hasil_vote` (`id`, `user_id`, `kandidat_id`, `created_at`) VALUES
(16, 5, 24, '2023-10-04 23:55:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kandidat`
--

CREATE TABLE `kandidat` (
  `id` int(11) NOT NULL,
  `foto` text NOT NULL,
  `ketua` varchar(255) NOT NULL,
  `wakil` varchar(255) NOT NULL,
  `wakil2` varchar(255) NOT NULL,
  `visimisi` text NOT NULL,
  `periode_id` int(11) NOT NULL,
  `suara` int(11) NOT NULL,
  `status2` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kandidat`
--

INSERT INTO `kandidat` (`id`, `foto`, `ketua`, `wakil`, `wakil2`, `visimisi`, `periode_id`, `suara`, `status2`, `created_at`, `updated_at`, `deleted_at`) VALUES
(18, 'o2.jpg', '5', '10', '84', 'Tetap Semangat', 7, 0, NULL, '2023-04-21 10:36:09', '2023-10-04 22:54:58', NULL),
(24, 'tess.jpg', '84', '5', '10', 'Halo\r\n', 6, 1, NULL, '2023-09-26 21:16:13', '2023-10-04 22:53:13', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `nama_level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'Super Admin'),
(2, 'Admin'),
(3, 'Guru'),
(4, 'Siswa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `foto`, `username`, `password`, `level`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'tidaktahu.png', 'Super Admin', '827ccb0eea8a706c4c34a16891f84e7b', 1, NULL, '2023-10-03 22:54:07', NULL),
(3, 'tidaktahu.png', 'Admin', '827ccb0eea8a706c4c34a16891f84e7b', 2, '2023-04-01 03:22:17', '2023-05-03 01:43:32', NULL),
(5, 'tidaktahu.png', 'Siswa', '827ccb0eea8a706c4c34a16891f84e7b', 4, '2023-04-03 01:12:07', '2023-05-05 22:08:31', NULL),
(8, 'tidaktahu.png', 'Guru', '827ccb0eea8a706c4c34a16891f84e7b', 3, '2023-04-05 02:01:18', '2023-05-03 01:43:52', NULL),
(10, 'tidaktahu.png', 'PSJ', '8277e0910d750195b448797616e091ad', 4, '2023-04-05 02:06:13', '2023-04-05 02:06:13', NULL),
(81, 'tidaktahu.png', 'a', '0cc175b9c0f1b6a831c399e269772661', 1, '2023-05-05 09:21:13', '2023-05-05 09:21:13', NULL),
(82, 'tidaktahu.png', 'b', '92eb5ffee6ae2fec3ad71c777531578f', 2, '2023-05-05 09:21:13', '2023-05-05 09:21:13', NULL),
(84, 'tidaktahu.png', 'Sis', '827ccb0eea8a706c4c34a16891f84e7b', 4, '2023-05-05 09:21:13', '2023-05-05 09:23:02', NULL),
(88, 'tidaktahu.png', 'Darrell', '827ccb0eea8a706c4c34a16891f84e7b', 1, '2023-05-05 22:36:41', '2023-05-05 22:36:41', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `vote`
--

CREATE TABLE `vote` (
  `id` int(11) NOT NULL,
  `periode` varchar(255) NOT NULL,
  `p_mulai` datetime NOT NULL,
  `p_selesai` datetime NOT NULL,
  `status` enum('Aktif','Tidak-Aktif') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `vote`
--

INSERT INTO `vote` (`id`, `periode`, `p_mulai`, `p_selesai`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, '2025', '2023-09-26 12:00:00', '2023-10-31 12:00:00', 'Aktif', '2023-09-26 23:29:02', '2023-10-04 22:52:46', NULL),
(7, '2024', '2023-10-04 12:00:00', '2023-10-04 12:00:00', 'Tidak-Aktif', '2023-10-04 22:54:44', '2023-10-04 22:55:16', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `hasil_vote`
--
ALTER TABLE `hasil_vote`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kandidat`
--
ALTER TABLE `kandidat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `hasil_vote`
--
ALTER TABLE `hasil_vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `kandidat`
--
ALTER TABLE `kandidat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT untuk tabel `vote`
--
ALTER TABLE `vote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
