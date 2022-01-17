-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2022 at 08:09 PM
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
-- Table structure for table `approval_kegiatan`
--

CREATE TABLE `approval_kegiatan` (
  `id` int(11) NOT NULL,
  `id_pengajuan` int(11) NOT NULL,
  `nama_ormawa` varchar(100) NOT NULL,
  `kegiatan` varchar(100) NOT NULL,
  `id_kemahasiswaan` varchar(100) DEFAULT NULL,
  `nama_kemahasiswaan` varchar(100) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `status` enum('Approve','Tolak','Pending','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `approval_kegiatan`
--

INSERT INTO `approval_kegiatan` (`id`, `id_pengajuan`, `nama_ormawa`, `kegiatan`, `id_kemahasiswaan`, `nama_kemahasiswaan`, `catatan`, `status`) VALUES
(4, 1237935209, 'shinbun', 'Summon_Satan', '10101010', 'mamang', ' ', 'Approve'),
(5, 1756837193, 'shinbun', 'Belajar Bostrap', '10101010', 'mamang', ' ', 'Approve'),
(6, 695748027, 'shinbun', 'Testingas', NULL, NULL, NULL, 'Pending');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approval_kegiatan`
--
ALTER TABLE `approval_kegiatan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pengajuan_kegiatan` (`id_pengajuan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approval_kegiatan`
--
ALTER TABLE `approval_kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `approval_kegiatan`
--
ALTER TABLE `approval_kegiatan`
  ADD CONSTRAINT `fk_pengajuan_kegiatan` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan_kegiatan_mhs` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
