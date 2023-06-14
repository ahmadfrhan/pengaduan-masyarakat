-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Mar 2023 pada 09.07
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pengaduan_masyarakat_farhan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_farhan`
--

CREATE TABLE `log_farhan` (
  `id_log` int(11) NOT NULL,
  `id_pengaduan` int(11) NOT NULL,
  `tgl_pengaduan` datetime NOT NULL,
  `nik` varchar(13) NOT NULL,
  `isi_pengaduan` text NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakat_farhan`
--

CREATE TABLE `masyarakat_farhan` (
  `nik_farhan` char(16) NOT NULL,
  `nama_farhan` varchar(35) NOT NULL,
  `username_farhan` varchar(25) NOT NULL,
  `password_farhan` varchar(32) NOT NULL,
  `telp_farhan` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `masyarakat_farhan`
--

INSERT INTO `masyarakat_farhan` (`nik_farhan`, `nama_farhan`, `username_farhan`, `password_farhan`, `telp_farhan`) VALUES
('32772114', 'Brad Pitt', 'masyarakat', '321', '08976'),
('3277734242', 'Ryan Gosling', 'masyarakat', '123', '083399923131'),
('32777772777', 'Chris Martin', 'warga', '123', '0833333333'),
('327777732131', 'John Cena', 'warga2', '123', '08933331211');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan_farhan`
--

CREATE TABLE `pengaduan_farhan` (
  `id_pengaduan_farhan` int(11) NOT NULL,
  `tgl_pengaduan_farhan` date NOT NULL,
  `nik_farhan` char(16) NOT NULL,
  `isi_laporan_farhan` text NOT NULL,
  `foto_farhan` varchar(255) NOT NULL,
  `status_farhan` enum('0','proses','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengaduan_farhan`
--

INSERT INTO `pengaduan_farhan` (`id_pengaduan_farhan`, `tgl_pengaduan_farhan`, `nik_farhan`, `isi_laporan_farhan`, `foto_farhan`, `status_farhan`) VALUES
(1, '2023-02-22', '32772114', 'Pak ada yang hilang helm', 'helm.png', 'selesai'),
(2, '2023-02-23', '3277734242', 'Pak ada ular di pot bunga', 'cobra.png', 'selesai'),
(3, '2023-02-23', '32772114', 'wwwwww', 'hero.png', 'selesai'),
(5, '2023-02-23', '3277734242', 'Assalamu\'alaikum pak, ada yang demo harga telur di depan gang saya.', 'hero.png', 'selesai'),
(7, '2023-02-23', '3277734242', 'OOOOOOOOOOOOOOOOOOOOOOOOOOOOO', 'helm.png', 'selesai'),
(8, '2023-03-02', '3277734242', 'WWWWWWWWWWWWWWWWWWWWWWWWWW', 'hero_admin2.png', 'selesai'),
(9, '2023-03-02', '3277734242', 'aada', 'adad', 'selesai'),
(10, '2023-03-04', '3277734242', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'bg-masyarakat.png', 'selesai'),
(11, '2023-03-04', '3277734242', 'HAAAAAAAAAAA', 'bg3_waifu2x_art_noise3_scale.png', 'proses');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas_farhan`
--

CREATE TABLE `petugas_farhan` (
  `id_petugas_farhan` int(11) NOT NULL,
  `nama_petugas_farhan` varchar(35) NOT NULL,
  `username_petugas_farhan` varchar(25) NOT NULL,
  `password_petugas_farhan` varchar(32) NOT NULL,
  `telp_petugas_farhan` varchar(13) NOT NULL,
  `level_farhan` enum('Admin','Petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `petugas_farhan`
--

INSERT INTO `petugas_farhan` (`id_petugas_farhan`, `nama_petugas_farhan`, `username_petugas_farhan`, `password_petugas_farhan`, `telp_petugas_farhan`, `level_farhan`) VALUES
(1, 'Lionel Messi', 'petugas', '123', '0831232312', 'Petugas'),
(2, 'Mark Zuckerberg', 'admin', 'admin', '08312333211', 'Admin'),
(5, 'Ahmad Farhan', 'farhan', '123', '09888000099', 'Admin'),
(6, 'Ryan Gosling', 'petugas2', '123', '0999988872', 'Petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggapan_farhan`
--

CREATE TABLE `tanggapan_farhan` (
  `id_tanggapan_farhan` int(11) NOT NULL,
  `id_pengaduan_farhan` int(11) NOT NULL,
  `tgl_tanggapan_farhan` date NOT NULL,
  `tanggapan_farhan` text NOT NULL,
  `id_petugas_farhan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tanggapan_farhan`
--

INSERT INTO `tanggapan_farhan` (`id_tanggapan_farhan`, `id_pengaduan_farhan`, `tgl_tanggapan_farhan`, `tanggapan_farhan`, `id_petugas_farhan`) VALUES
(25, 2, '2023-03-02', 'OKKK', 2),
(26, 3, '2023-03-02', 'OKEEEE OTW', 2),
(27, 5, '2023-03-02', 'okeee selesai', 2),
(28, 8, '2023-03-02', 'adasafa', 2),
(29, 7, '2023-03-02', '', 2),
(30, 9, '2023-03-02', '', 2),
(31, 10, '2023-03-04', 'OTIWIIIIIII', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `log_farhan`
--
ALTER TABLE `log_farhan`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeks untuk tabel `masyarakat_farhan`
--
ALTER TABLE `masyarakat_farhan`
  ADD PRIMARY KEY (`nik_farhan`);

--
-- Indeks untuk tabel `pengaduan_farhan`
--
ALTER TABLE `pengaduan_farhan`
  ADD PRIMARY KEY (`id_pengaduan_farhan`),
  ADD KEY `nik_adella` (`nik_farhan`);

--
-- Indeks untuk tabel `petugas_farhan`
--
ALTER TABLE `petugas_farhan`
  ADD PRIMARY KEY (`id_petugas_farhan`);

--
-- Indeks untuk tabel `tanggapan_farhan`
--
ALTER TABLE `tanggapan_farhan`
  ADD PRIMARY KEY (`id_tanggapan_farhan`),
  ADD KEY `id_pengaduan_adella` (`id_pengaduan_farhan`),
  ADD KEY `id_petugas_adella` (`id_petugas_farhan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `log_farhan`
--
ALTER TABLE `log_farhan`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengaduan_farhan`
--
ALTER TABLE `pengaduan_farhan`
  MODIFY `id_pengaduan_farhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `petugas_farhan`
--
ALTER TABLE `petugas_farhan`
  MODIFY `id_petugas_farhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tanggapan_farhan`
--
ALTER TABLE `tanggapan_farhan`
  MODIFY `id_tanggapan_farhan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pengaduan_farhan`
--
ALTER TABLE `pengaduan_farhan`
  ADD CONSTRAINT `pengaduan_farhan_ibfk_1` FOREIGN KEY (`nik_farhan`) REFERENCES `masyarakat_farhan` (`nik_farhan`);

--
-- Ketidakleluasaan untuk tabel `tanggapan_farhan`
--
ALTER TABLE `tanggapan_farhan`
  ADD CONSTRAINT `tanggapan_farhan_ibfk_1` FOREIGN KEY (`id_pengaduan_farhan`) REFERENCES `pengaduan_farhan` (`id_pengaduan_farhan`),
  ADD CONSTRAINT `tanggapan_farhan_ibfk_2` FOREIGN KEY (`id_petugas_farhan`) REFERENCES `petugas_farhan` (`id_petugas_farhan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
