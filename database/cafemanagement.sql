-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2019 at 02:13 AM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafemanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_daftar_pesanan`
--

CREATE TABLE `tb_daftar_pesanan` (
  `id_dPesanan` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `pemesanan_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_daftar_pesanan`
--

INSERT INTO `tb_daftar_pesanan` (`id_dPesanan`, `pesanan_id`, `pemesanan_id`, `status`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 3, 1, 1),
(4, 4, 2, 0),
(5, 5, 2, 0),
(6, 6, 2, 0),
(7, 7, 2, 1),
(8, 8, 2, 0),
(9, 9, 3, 1),
(10, 10, 3, 0),
(11, 11, 3, 1),
(12, 12, 3, 1),
(13, 13, 3, 1),
(14, 14, 4, 1),
(15, 15, 4, 0),
(16, 16, 5, 1),
(17, 17, 5, 0),
(18, 18, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id_menu` int(11) NOT NULL,
  `menu` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id_menu`, `menu`, `harga`) VALUES
(1, 'Nasi Goreng', 15000),
(2, 'Nasi Ayam Katsu', 18000),
(3, 'Es Teh Manis', 4000),
(4, 'Paket Ayam Bakar', 15000),
(5, 'Paket Ayam Sambal Ijo', 15000),
(6, 'Udang Crispy + Nasi', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pelayan`
--

CREATE TABLE `tb_pelayan` (
  `id_pelayan` int(11) NOT NULL,
  `pelayan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pelayan`
--

INSERT INTO `tb_pelayan` (`id_pelayan`, `pelayan`) VALUES
(1, 'Budi Setiawan'),
(2, 'Michael Ucup'),
(3, 'Ucup Setiabudi'),
(4, 'Udin Sarudin'),
(5, 'Yosa Saputra'),
(6, 'Alan Suryajana');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemesanan`
--

CREATE TABLE `tb_pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `nama_pemesan` varchar(100) NOT NULL,
  `jumlah_pesanan` int(11) NOT NULL,
  `pelayan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pemesanan`
--

INSERT INTO `tb_pemesanan` (`id_pemesanan`, `nama_pemesan`, `jumlah_pesanan`, `pelayan_id`) VALUES
(1, 'Budi Binomo', 3, 1),
(2, 'Ikhsan Alifian', 5, 1),
(3, 'Naufal Bahri', 5, 4),
(4, 'Naufal Bahri', 2, 6),
(5, 'Hanif Weka', 3, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan_pemesan`
--

CREATE TABLE `tb_pesanan_pemesan` (
  `id_pesanan` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `pemesanan_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pesanan_pemesan`
--

INSERT INTO `tb_pesanan_pemesan` (`id_pesanan`, `menu_id`, `pemesanan_id`, `quantity`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 2),
(3, 3, 1, 3),
(4, 1, 2, 1),
(5, 2, 2, 2),
(6, 3, 2, 3),
(7, 4, 2, 4),
(8, 5, 2, 5),
(9, 1, 3, 1),
(10, 2, 3, 2),
(11, 3, 3, 3),
(12, 4, 3, 4),
(13, 5, 3, 5),
(14, 2, 4, 2),
(15, 6, 4, 3),
(16, 2, 5, 3),
(17, 1, 5, 2),
(18, 4, 5, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_daftar_pesanan`
--
ALTER TABLE `tb_daftar_pesanan`
  ADD PRIMARY KEY (`id_dPesanan`);

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `tb_pelayan`
--
ALTER TABLE `tb_pelayan`
  ADD PRIMARY KEY (`id_pelayan`);

--
-- Indexes for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indexes for table `tb_pesanan_pemesan`
--
ALTER TABLE `tb_pesanan_pemesan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_daftar_pesanan`
--
ALTER TABLE `tb_daftar_pesanan`
  MODIFY `id_dPesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pelayan`
--
ALTER TABLE `tb_pelayan`
  MODIFY `id_pelayan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_pesanan_pemesan`
--
ALTER TABLE `tb_pesanan_pemesan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
