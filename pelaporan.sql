-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2022 at 02:38 AM
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
-- Table structure for table `pelaporan`
--

DROP TABLE IF EXISTS `pelaporan`;
CREATE TABLE `pelaporan` (
  `Nama_Kegiatan` varchar(100) DEFAULT NULL,
  `Tanggal_Kegiatan` varchar(100) DEFAULT NULL,
  `Tempat_Kegiatan` varchar(100) DEFAULT NULL,
  `Penyelenggara` varchar(100) DEFAULT NULL,
  `Absensi` varchar(100) DEFAULT NULL,
  `Berita_Acara` varchar(100) DEFAULT NULL,
  `LPJ` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelaporan`
--

INSERT INTO `pelaporan` (`Nama_Kegiatan`, `Tanggal_Kegiatan`, `Tempat_Kegiatan`, `Penyelenggara`, `Absensi`, `Berita_Acara`, `LPJ`) VALUES
('Mamak Kao', '2022-02-01', 'ewrwerw', 'Jurnalistik & PERS STIKI Indonesia', 'Ada', 'Ada', '	approve'),
('STIKI Creative Journalism Competition (SCJC)', '2022-01-29', 'STIKI Indonesia', 'Jurnalistik & PERS STIKI Indonesia', 'Ada', 'Ada', 'approve'),
('asdasd', 'sad', 'asd', 'asd', '', '', ''),
('sad', 'asd', 'asd', 'asd', NULL, NULL, NULL),
('Main Dark Souls', '2022-02-01', 'ewrwerw', 'Jurnalistik & PERS STIKI Indonesia', 'Ada', 'Ada', 'Approve'),
('asdsae432432', '2022-02-01', 'weew', 'Jurnalistik & PERS STIKI Indonesia', 'Ada', 'Ada', 'approve');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
