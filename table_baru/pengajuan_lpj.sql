-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2022 at 06:55 AM
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
-- Table structure for table `pengajuan_lpj`
--

CREATE TABLE `pengajuan_lpj` (
  `id` int(11) NOT NULL,
  `id_ormawa` varchar(100) NOT NULL,
  `nama_ormawa` varchar(100) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `pendahuluan` text NOT NULL,
  `pelaksanaan_kegaitan` text NOT NULL,
  `kepanitiaan` text NOT NULL,
  `peserta` text NOT NULL,
  `pencapaian` text NOT NULL,
  `rab_masukan` text NOT NULL,
  `rab_pengeluaran` text NOT NULL,
  `realisasi_anggaran` text NOT NULL,
  `penutup` text NOT NULL,
  `bukti_pembayaran` text NOT NULL,
  `berita_acara` text NOT NULL,
  `absensi` text NOT NULL,
  `rapat` text NOT NULL,
  `nilai_peserta` varchar(100) NOT NULL,
  `desain_sertifikat` text NOT NULL,
  `dokumentasi` text NOT NULL,
  `LPJ` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengajuan_lpj`
--
ALTER TABLE `pengajuan_lpj`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ormawa_nama` (`id_ormawa`),
  ADD KEY `fk_kegiatan_ormawa` (`id_pengajuan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pengajuan_lpj`
--
ALTER TABLE `pengajuan_lpj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengajuan_lpj`
--
ALTER TABLE `pengajuan_lpj`
  ADD CONSTRAINT `fk_kegiatan_ormawa` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan_kegiatan_mhs` (`id`),
  ADD CONSTRAINT `fk_ormawa_nama` FOREIGN KEY (`id_ormawa`) REFERENCES `ormawa` (`ID_ORMAWA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
