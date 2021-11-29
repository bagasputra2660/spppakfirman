-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jul 2020 pada 17.11
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spp`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `nisn` int(11) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `bulan_dibayar` varchar(15) NOT NULL,
  `id_spp` int(11) NOT NULL,
  `keterangan` varchar(5) DEFAULT NULL,
  `id_petugas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `nisn`, `tgl_bayar`, `bulan_dibayar`, `id_spp`, `keterangan`, `id_petugas`) VALUES
(13, 124124, '2020-04-10', 'Januari', 7, 'Lunas', 2),
(14, 124124, '2020-04-10', 'Februari', 7, 'Lunas', 2),
(15, 124124, '2020-04-10', 'Maret', 7, 'Lunas', 2),
(16, 124124, '2020-04-10', 'April', 7, 'Lunas', 2),
(17, 124124, '2020-04-10', 'Mei', 7, 'Lunas', 2),
(18, 124124, '0000-00-00', 'Juni', 7, NULL, NULL),
(19, 124124, '0000-00-00', 'Juli', 7, NULL, NULL),
(20, 124124, '0000-00-00', 'Agustus', 7, '', 0),
(21, 124124, '0000-00-00', 'September', 7, '', 0),
(22, 124124, '0000-00-00', 'Oktober', 7, '', 0),
(23, 124124, '0000-00-00', 'November', 7, '', 0),
(24, 124124, '0000-00-00', 'Desember', 7, '', 0),
(25, 125125, '0000-00-00', 'Januari', 7, NULL, NULL),
(26, 125125, '0000-00-00', 'Februari', 7, '', 0),
(27, 125125, '0000-00-00', 'Maret', 7, '', 0),
(28, 125125, '0000-00-00', 'April', 7, '', 0),
(29, 125125, '0000-00-00', 'Mei', 7, '', 0),
(30, 125125, '0000-00-00', 'Juni', 7, '', 0),
(31, 125125, '0000-00-00', 'Juli', 7, '', 0),
(32, 125125, '0000-00-00', 'Agustus', 7, '', 0),
(33, 125125, '0000-00-00', 'September', 7, '', 0),
(34, 125125, '0000-00-00', 'Oktober', 7, '', 0),
(35, 125125, '0000-00-00', 'November', 7, '', 0),
(36, 125125, '0000-00-00', 'Desember', 7, '', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_petugas`
--

CREATE TABLE `tb_petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nama_petugas` varchar(100) NOT NULL,
  `level` enum('Admin','Petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_petugas`
--

INSERT INTO `tb_petugas` (`id_petugas`, `username`, `password`, `nama_petugas`, `level`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Plajari Kode', 'Admin'),
(2, 'yanto', '87c8a128091054f836a14b544959d7f5df651b09', 'Yanto', 'Petugas'),
(4, 'agus', '0525885565bb6a150db63f19bf42f11bd2db4702', 'Agus Salim', 'Petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nisn` int(11) NOT NULL,
  `nis` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `id_spp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`nisn`, `nis`, `nama_lengkap`, `kelas`, `id_spp`) VALUES
(124124, 124, 'Roberto', 'X', 7),
(125125, 125, 'Stepen', 'X', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_spp`
--

CREATE TABLE `tb_spp` (
  `id_spp` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `nominal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_spp`
--

INSERT INTO `tb_spp` (`id_spp`, `tahun`, `nominal`) VALUES
(5, 2020, 160000),
(6, 2021, 175000),
(7, 2019, 145000);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `nisn` (`nisn`);

--
-- Indeks untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nisn`);

--
-- Indeks untuk tabel `tb_spp`
--
ALTER TABLE `tb_spp`
  ADD PRIMARY KEY (`id_spp`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `tb_petugas`
--
ALTER TABLE `tb_petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_spp`
--
ALTER TABLE `tb_spp`
  MODIFY `id_spp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
