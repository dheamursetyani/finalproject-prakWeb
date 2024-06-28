-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jun 2024 pada 04.58
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
-- Database: `zoya_store (2)`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(45) NOT NULL,
  `jenis_barang` varchar(45) NOT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `jenis_barang`, `harga`) VALUES
(11, 'baju batik', 'Baju', 13000),
(22, 'Kulot happy', 'Celana', 50000),
(34, 'Pashmina ruwet', 'Hijab', 33000),
(35, 'Kimmy Blouse', 'Baju', 80000),
(36, 'Girly Blouse', 'Baju', 85000),
(37, 'Vest Outer', 'Baju', 87000),
(38, 'Nana Flanel', 'Baju', 75000),
(39, 'Pinky Oneset', 'Baju', 120000),
(40, 'Pashmina Shawl', 'Hijab', 50000),
(41, 'Soft Cotton', 'Hijab', 25000),
(42, 'Pashmina Crinkle', 'Hijab', 30000),
(43, 'Skinny Jeans', 'Celana', 120000),
(44, 'Boyfriend Jeans', 'Celana', 125000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskon`
--

CREATE TABLE `diskon` (
  `id_event` int(11) NOT NULL,
  `potongan_harga` varchar(10) NOT NULL,
  `expired_time` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `diskon`
--

INSERT INTO `diskon` (`id_event`, `potongan_harga`, `expired_time`) VALUES
(57, '5%', '2022-11-25'),
(58, '7%', '2022-11-10'),
(59, '20%', '19-11-2023');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `username` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `id_cust` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`username`, `nama`, `password`, `status`, `id_cust`) VALUES
('admin', 'cek Admin', 'admin', 'Admin', 0),
('member', 'halo member', 'member', 'Member', 100);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_cust` int(11) NOT NULL,
  `nama_cust` varchar(45) NOT NULL,
  `alamat_cust` varchar(255) NOT NULL,
  `no_telp` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel ``
--

INSERT INTO `pelanggan` (`id_cust`, `nama_cust`, `alamat_cust`, `no_telp`) VALUES
(100, 'Laura', 'Solo', 88993214),
(101, 'Ferina', 'Solo', 854327890),
(102, 'Clarinta', 'Klaten', 2147483647),
(103, 'Yefaya', 'Klaten', 879455371),
(104, 'Rendry', 'Boyolali', 821390756),
(105, 'Darion', 'Solo', 2147483647),
(106, 'Gabrian', 'Klaten', 851623478),
(107, 'Vivian', 'Solo', 856732490),
(108, 'Erdan', 'Semarang', 2147483647),
(109, 'Mariana', 'Solo', 2147483647),
(110, 'Ravian', 'Klaten', 2147483647);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(45) NOT NULL,
  `jenis_barang` varchar(45) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_barang`, `nama_barang`, `jenis_barang`, `harga`) VALUES
(11, 'baju batik', 'Baju', 12000),
(35, 'Kimmy Blouse', 'Baju', 80000),
(36, 'Girly Blouse', 'Baju', 85000),
(37, 'Vest Outer', 'Baju', 87000),
(38, 'Nana Flanel', 'Baju', 75000),
(44, 'Boyfriend Jeans', 'Celana', 125000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_cust` int(11) NOT NULL,
  `tanggal_transaksi` varchar(20) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `status_transaksi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_cust`, `tanggal_transaksi`, `total_harga`, `status_transaksi`) VALUES
(80, 101, '2022-10-12', 150000, 'berhasil'),
(81, 102, '2022-10-13', 95000, 'berhasil'),
(82, 103, '2022-10-14', 185000, 'berhasil'),
(83, 104, '2022-10-15', 100000, 'berhasil'),
(84, 105, '2022-10-16', 200000, 'berhasil'),
(85, 106, '2022-10-17', 165000, 'berhasil'),
(86, 107, '2022-10-18', 85000, 'berhasil'),
(87, 108, '2022-10-19', 130000, 'berhasil'),
(88, 109, '2022-10-20', 140000, 'berhasil'),
(89, 110, '2022-10-21', 155000, 'berhasil');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id_event`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_cust`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD UNIQUE KEY `id_cust` (`id_cust`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
