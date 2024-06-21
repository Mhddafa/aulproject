-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2024 at 09:51 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `midacollection`
--

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` int(11) NOT NULL,
  `nama_pengguna` varchar(40) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `kuantiti` int(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id` int(11) NOT NULL,
  `email_pengirim` varchar(40) NOT NULL,
  `pesan_pengirim` text NOT NULL,
  `nama_pengirim` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id`, `email_pengirim`, `pesan_pengirim`, `nama_pengirim`) VALUES
(9, 'muhamaddafa@upnvj.ac.id', 'Saya sudah membeli dimsum topping cumi dan ayam 3 dan dimsum mozarellanya 3', 'Muhamad Dafa'),
(10, 'muhamaddafa@upnvj.ac.id', 'saya sudah membeli 3 paket dimsum topping ayamcumi dan dimsum topping mozarella', 'Muhamad Dafa');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `nohp_pengguna` varchar(14) NOT NULL,
  `alamat_pengguna` text NOT NULL,
  `sandi_pengguna` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama_pengguna`, `nohp_pengguna`, `alamat_pengguna`, `sandi_pengguna`) VALUES
(12, 'admin', '085882424513', 'Jl. Hj Dilun RT 06/07 No.05 Ulujami Jakarta Selatan', '777107067c0e7d6101b7e9025e18f625'),
(13, 'admin2', '085882424513', 'Jl. Hj Dilun RT 06/07 No.05 Ulujami Jakarta Selatan', '777107067c0e7d6101b7e9025e18f625'),
(14, 'Ocik', '081278561423', 'jl hj dilun rt 013/005 , Ulujami , Jakarta Selatan , 12250', '580420dcf9b59633fce4041c58645d9a');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(40) NOT NULL,
  `deskripsi_produk` varchar(125) NOT NULL,
  `harga_produk` int(125) NOT NULL,
  `url_gambar_produk` varchar(50) NOT NULL,
  `stock` int(150) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `deskripsi_produk`, `harga_produk`, `url_gambar_produk`, `stock`) VALUES
(4, 'Shumai Cumi', 'Dimsum dengan topping cumi & ayam.', 62000, 'images/shumaicumi.jpg', 18),
(5, 'Shumai Mozarella', 'Dimsum dengan topping mozarella.', 62000, 'images/mozarella.png', 18),
(6, 'Tofu Roll', 'Dimsum Tahu Gulung', 62000, 'images/tofuroll.jpg', 18);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_produk` varchar(11) NOT NULL,
  `kuantiti` varchar(150) NOT NULL,
  `nama_pengguna` varchar(40) NOT NULL,
  `url_bukti_pembayaran` varchar(50) NOT NULL,
  `tujuan` varchar(80) NOT NULL,
  `ongkir` int(50) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `Status` varchar(50) CHARACTER SET utf32 COLLATE utf32_general_ci DEFAULT 'unprocessed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_produk`, `kuantiti`, `nama_pengguna`, `url_bukti_pembayaran`, `tujuan`, `ongkir`, `alamat`, `Status`) VALUES
(17, '[4,5]', '[3,3]', 'admin', 'images/1701067831admin.png', 'jakarta', 10000, 'JL HJ DILUN RT 06/07 , ULUJAMI , JAKARTA SELATAN', 'selesai'),
(18, '[4,5]', '[3,3]', 'admin2', 'images/1701182353admin2.png', 'jakarta', 10000, 'JL. ULUJAMI RAYA RT 006/007 no 05 , ULUJAMI JAKARTA SELATAN 12250', 'belum diproses'),
(19, '[4,5,6]', '[1,1,1]', 'Ocik', 'images/1704548522Ocik.png', 'jakarta', 10000, 'JL HJ DILUN RT 013/005 , ULUJAMI , JAKARTA SELATAN 12250', 'belum diproses'),
(20, '[6,5,4]', '[1,1,1]', 'Ocik', 'images/1704550131Ocik.png', 'jakarta', 10000, 'jl hj dilun rt 013/005, Ulujami , Jakarta Selatan, 12250', 'belum diproses');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
