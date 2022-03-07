-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jun 2021 pada 05.41
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `checkin`
--

CREATE TABLE `checkin` (
  `id` int(11) NOT NULL,
  `tgl_checkin` datetime NOT NULL,
  `id_receptionist` int(11) NOT NULL,
  `id_pesan` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `id_makanan` int(11) NOT NULL,
  `biaya` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `checkin`
--

INSERT INTO `checkin` (`id`, `tgl_checkin`, `id_receptionist`, `id_pesan`, `id_kamar`, `id_makanan`, `biaya`, `status`) VALUES
(7, '2021-05-13 09:47:03', 1, 5, 17, 9, '660543', 'N'),
(8, '2021-05-13 09:47:29', 10, 5, 17, 9, '66', 'Y'),
(9, '2021-05-13 09:48:20', 4, 5, 17, 9, '77', 'Y'),
(10, '2021-05-19 13:27:05', 1, 5, 17, 9, '530000', 'N'),
(11, '2021-05-19 13:27:42', 3, 5, 18, 9, '310000', 'N'),
(12, '2021-05-20 11:59:08', 1, 5, 23, 9, '5', 'N'),
(13, '2021-05-20 12:16:19', 1, 5, 18, 9, '88', 'N'),
(14, '2021-05-20 14:00:34', 1, 5, 18, 9, '700000', 'N'),
(15, '2021-05-20 20:11:39', 1, 10, 27, 13, '425000', 'N'),
(16, '2021-05-21 18:12:03', 1, 0, 27, 13, '100000', 'N'),
(17, '2021-05-21 18:15:24', 1, 0, 23, 9, '55664', 'N'),
(18, '2021-05-21 18:29:52', 1, 0, 17, 9, '1', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `id_checkin` int(11) NOT NULL,
  `tgl_checkout` datetime NOT NULL,
  `total_bayar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `checkout`
--

INSERT INTO `checkout` (`id`, `id_checkin`, `tgl_checkout`, `total_bayar`) VALUES
(3, 9, '2021-05-17 20:27:08', '400000'),
(4, 13, '2021-05-20 12:51:54', '88'),
(5, 12, '2021-05-20 15:49:37', '5'),
(6, 10, '2021-05-20 15:51:36', '530000'),
(7, 14, '2021-05-20 15:51:46', '700000'),
(8, 11, '2021-05-20 15:52:16', '3100000'),
(9, 13, '2021-05-20 20:11:57', '88'),
(10, 15, '2021-05-20 20:12:20', '425000'),
(11, 17, '2021-05-21 18:15:34', '55664'),
(12, 16, '2021-05-21 18:15:47', '900000'),
(13, 18, '2021-05-21 18:30:09', '-2'),
(14, 7, '2021-05-27 10:34:25', '660543');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_kamar`
--

CREATE TABLE `jenis_kamar` (
  `id` int(11) NOT NULL,
  `jenis_kamar` varchar(50) NOT NULL,
  `fasilitas` varchar(250) NOT NULL,
  `harga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_kamar`
--

INSERT INTO `jenis_kamar` (`id`, `jenis_kamar`, `fasilitas`, `harga`) VALUES
(15, 'Reguler', '2 ranjang tidur, 1 tv 24 inc', '300000'),
(18, 'Bisnis', 'lengkap', '400000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_makanan`
--

CREATE TABLE `jenis_makanan` (
  `id` int(11) NOT NULL,
  `jenis_makanan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jenis_makanan`
--

INSERT INTO `jenis_makanan` (`id`, `jenis_makanan`) VALUES
(6, 'Rice'),
(9, 'Vegetable');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id` int(11) NOT NULL,
  `nama_kamar` varchar(50) NOT NULL,
  `id_jenis_kamar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id`, `nama_kamar`, `id_jenis_kamar`) VALUES
(17, 'Melati 01', 15),
(18, 'Melati 02', 15),
(23, 'Melati 03', 15),
(27, 'Sakura 01', 18);

-- --------------------------------------------------------

--
-- Struktur dari tabel `makanan`
--

CREATE TABLE `makanan` (
  `id` int(11) NOT NULL,
  `id_jenis_makanan` int(11) NOT NULL,
  `makanan` varchar(100) NOT NULL,
  `harga` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `makanan`
--

INSERT INTO `makanan` (`id`, `id_jenis_makanan`, `makanan`, `harga`) VALUES
(7, 2, 'Gado - Gado', '10000'),
(9, 6, 'Nasi Goreng Telur Dadar', '12000'),
(13, 9, 'Salad Buah', '25000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `id_tamu` int(11) NOT NULL,
  `jml_kamar` varchar(30) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id`, `tgl_pesan`, `id_tamu`, `jml_kamar`, `status`) VALUES
(5, '2021-05-09 22:18:11', 1, '2 (Mawar dan Tulip)', 'N'),
(9, '2021-05-19 13:12:04', 1, '2 (Mawar dan Tulip)', 'N'),
(10, '2021-05-28 20:03:17', 1, '5', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `receptionist`
--

CREATE TABLE `receptionist` (
  `id` int(11) NOT NULL,
  `nama_receptionist` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `no_hp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `receptionist`
--

INSERT INTO `receptionist` (`id`, `nama_receptionist`, `jenis_kelamin`, `no_hp`) VALUES
(1, 'T. Rizaldi Fadli', 'Laki-Laki', '085371161621'),
(3, 'Sofyan Karim', 'Laki-Laki', '0853xxx'),
(7, 'Angeli Dwi Pratiwi', 'Perempuan', '08123456789');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tamu`
--

CREATE TABLE `tamu` (
  `id` int(11) NOT NULL,
  `nama_tamu` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tamu`
--

INSERT INTO `tamu` (`id`, `nama_tamu`, `jenis_kelamin`, `no_hp`, `alamat`) VALUES
(1, 'Siska Karim', 'Perempuan', '0853xxx', 'langsa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `id_receptionist` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `role_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `id_receptionist`, `username`, `password`, `role_id`) VALUES
(2, 1, 't_rizaldi', 'rizaldi01', 2),
(3, 3, 'sofyan', 'karim', 2),
(4, 3, 'karim', 'sofyan', 1),
(9, 7, 'angel', 'angel', 2),
(10, 7, 'dwiAngel', 'dwiAngel', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `checkin`
--
ALTER TABLE `checkin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_checkin` (`id_checkin`);

--
-- Indeks untuk tabel `jenis_kamar`
--
ALTER TABLE `jenis_kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jenis_makanan`
--
ALTER TABLE `jenis_makanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `receptionist`
--
ALTER TABLE `receptionist`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `checkin`
--
ALTER TABLE `checkin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `jenis_kamar`
--
ALTER TABLE `jenis_kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `jenis_makanan`
--
ALTER TABLE `jenis_makanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `makanan`
--
ALTER TABLE `makanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `receptionist`
--
ALTER TABLE `receptionist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tamu`
--
ALTER TABLE `tamu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `checkout`
--
ALTER TABLE `checkout`
  ADD CONSTRAINT `checkout_ibfk_1` FOREIGN KEY (`id_checkin`) REFERENCES `checkin` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
