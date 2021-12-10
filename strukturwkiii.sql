-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2021 at 04:43 PM
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
-- Table structure for table `strukturwkiii`
--

DROP TABLE IF EXISTS `strukturwkiii`;
CREATE TABLE `strukturwkiii` (
  `id_struktur` int(10) NOT NULL,
  `Nama_ketua` varchar(100) NOT NULL,
  `gambar_ketua` text NOT NULL,
  `nama_bid_kemahasiswaan` varchar(100) NOT NULL,
  `gambar_kemahasiswaan` text NOT NULL,
  `nama_bid_alumni` varchar(100) NOT NULL,
  `gambar_alumni` text NOT NULL,
  `nama_bid_pusat_karir` varchar(100) NOT NULL,
  `gambar_pusat_karir` text NOT NULL,
  `Sekretaris_WKIII` varchar(100) NOT NULL,
  `gambar_sekretaris` text NOT NULL,
  `nama_bimbingan_konseling` varchar(100) NOT NULL,
  `gambar_bimbingan_konseling` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `strukturwkiii`
--

INSERT INTO `strukturwkiii` (`id_struktur`, `Nama_ketua`, `gambar_ketua`, `nama_bid_kemahasiswaan`, `gambar_kemahasiswaan`, `nama_bid_alumni`, `gambar_alumni`, `nama_bid_pusat_karir`, `gambar_pusat_karir`, `Sekretaris_WKIII`, `gambar_sekretaris`, `nama_bimbingan_konseling`, `gambar_bimbingan_konseling`) VALUES
(1545704652, 'ketut', '1254480412_pexels-photo-736716.jpeg', 'Elie', ' 1000469715_8-business-woman-girl-png-image.png ', '    Sastra', '836130666_22392372_0.png', '  Lin', '960611232_nico-devil-may-cry-5-1w.jpg', 'Melly', ' 1674145974_trish-dmc5-face.jpg ', ' Han', '  1560616167_alpha-wolf-earl-contehmorgan.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `strukturwkiii`
--
ALTER TABLE `strukturwkiii`
  ADD PRIMARY KEY (`id_struktur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
