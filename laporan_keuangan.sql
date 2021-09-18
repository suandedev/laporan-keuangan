-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Sep 2021 pada 07.08
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laporan_keuangan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cetak_laporan`
--

CREATE TABLE `cetak_laporan` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_jual` int(11) NOT NULL,
  `total_modal` int(11) NOT NULL,
  `laba` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `date_modify` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cetak_laporan`
--

INSERT INTO `cetak_laporan` (`id`, `id_produk`, `jumlah`, `total_jual`, `total_modal`, `laba`, `date_created`, `date_modify`) VALUES
(108, 46, 15, 45000, 30000, 15000, 1631682426, 1631682426);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan`
--

CREATE TABLE `laporan` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_jual` int(11) NOT NULL,
  `total_modal` int(11) NOT NULL,
  `laba` int(11) NOT NULL,
  `date_created` int(11) NOT NULL,
  `date_modify` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `laporan`
--

INSERT INTO `laporan` (`id`, `id_produk`, `jumlah`, `total_jual`, `total_modal`, `laba`, `date_created`, `date_modify`) VALUES
(52, 33, 3, 6000, 3000, 3000, 1631107595, 1631107595);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `harga_modal` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `date_created` int(11) NOT NULL,
  `date_modify` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id`, `nama`, `harga_jual`, `harga_modal`, `deskripsi`, `gambar`, `date_created`, `date_modify`) VALUES
(45, 'pensil', 2000, 1500, 'pensil 2b', '193-1936884_ecommerce-websites-ecommerce-icon-hd-png-download-removebg-preview.png', 1631679303, 1631679303),
(46, 'pulpen', 3000, 2000, 'baru', '193-1936884_ecommerce-websites-ecommerce-icon-hd-png-download.png', 1631682389, 1631682389);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `username`, `password`) VALUES
(1, 'admin', 'bumdesbaliagung123@gmail.com', 'admin', '$2y$10$KKT017SA4RG5E.pjdQCaFOwaRFONOS46WjNRPuO5lQL6Ul9c37fk2'),
(4, 'komang', 'bumdesbaliagung123@gmail.com', 'komang', '$2y$10$xeqrmcqkiMQRDBNAo6TEIeN/1BKtr6k1KxmjVYYvJFGol/HaO0AfS');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cetak_laporan`
--
ALTER TABLE `cetak_laporan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indeks untuk tabel `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cetak_laporan`
--
ALTER TABLE `cetak_laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT untuk tabel `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
