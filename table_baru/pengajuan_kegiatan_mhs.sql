-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2022 at 06:54 AM
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
-- Table structure for table `pengajuan_kegiatan_mhs`
--

DROP TABLE IF EXISTS `pengajuan_kegiatan_mhs`;
CREATE TABLE `pengajuan_kegiatan_mhs` (
  `id` int(11) NOT NULL,
  `id_ormawa` varchar(100) NOT NULL,
  `nama_ormawa` varchar(100) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `tema_kegiatan` varchar(100) NOT NULL,
  `konsep_kegiatan` text NOT NULL,
  `sub_kegiatan` text NOT NULL,
  `pj_kegiatan` text NOT NULL,
  `latar_belakang` text NOT NULL,
  `tujuan_kegiatan` text NOT NULL,
  `hasil_harapan` text NOT NULL,
  `targer_pemasaran` text NOT NULL,
  `Tanggal` date NOT NULL,
  `Waktu` time NOT NULL,
  `Tempat` varchar(100) NOT NULL,
  `sk_kepanitiaan` text NOT NULL,
  `jadwal_kegiatan` text NOT NULL,
  `rab` text NOT NULL,
  `profile_pengisi_acara` text NOT NULL,
  `desain_poster_sertifikat` text NOT NULL,
  `ketua_panitia` varchar(100) NOT NULL,
  `contac_person` varchar(100) NOT NULL,
  `softcopy_proposal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengajuan_kegiatan_mhs`
--
ALTER TABLE `pengajuan_kegiatan_mhs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_kegiatan_darai_ormawa` (`id_ormawa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengajuan_kegiatan_mhs`
--
ALTER TABLE `pengajuan_kegiatan_mhs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengajuan_kegiatan_mhs`
--
ALTER TABLE `pengajuan_kegiatan_mhs`
  ADD CONSTRAINT `FK_kegiatan_darai_ormawa` FOREIGN KEY (`id_ormawa`) REFERENCES `ormawa` (`ID_ORMAWA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
