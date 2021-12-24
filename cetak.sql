-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2021 at 06:39 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simaks`
--

-- --------------------------------------------------------

--
-- Table structure for table `cetak`
--

DROP TABLE IF EXISTS `cetak`;
CREATE TABLE `cetak` (
  `id_cetak` int(10) NOT NULL,
  `NAMA_KEGIATAN` varchar(100) NOT NULL,
  `TANGGAL_KEGIATAN` varchar(100) NOT NULL,
  `TEMPAT_KEGIATAN` varchar(100) NOT NULL,
  `PENYELENGGARA` varchar(100) NOT NULL,
  `ABSENSI` varchar(100) NOT NULL,
  `BERITA_ACARA KEGIATAN` varchar(100) NOT NULL,
  `LPJ` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cetak`
--

INSERT INTO `cetak` (`id_cetak`, `NAMA_KEGIATAN`, `TANGGAL_KEGIATAN`, `TEMPAT_KEGIATAN`, `PENYELENGGARA`, `ABSENSI`, `BERITA_ACARA KEGIATAN`, `LPJ`) VALUES
(1, 'Esport', '01 januari 2021', 'Stiki', 'E-Sport', 'Ada', 'Ada', 'Ada');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cetak`
--
ALTER TABLE `cetak`
  ADD PRIMARY KEY (`id_cetak`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
