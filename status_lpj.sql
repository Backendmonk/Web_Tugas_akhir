-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2022 at 03:32 PM
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
-- Table structure for table `status_lpj`
--

DROP TABLE IF EXISTS `status_lpj`;
CREATE TABLE `status_lpj` (
  `id` int(11) NOT NULL,
  `KEGIATAN` varchar(100) NOT NULL,
  `ORMAWA` varchar(100) NOT NULL,
  `STATUS` enum('Belum Terkumpul','Sudah Terkumpul','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_lpj`
--

INSERT INTO `status_lpj` (`id`, `KEGIATAN`, `ORMAWA`, `STATUS`) VALUES
(1, '262', '1493474770', 'Belum Terkumpul'),
(2, ' 696', '1493474770', 'Belum Terkumpul');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `status_lpj`
--
ALTER TABLE `status_lpj`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_ORMAWA` (`ORMAWA`),
  ADD KEY `KEGIATAN` (`KEGIATAN`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `status_lpj`
--
ALTER TABLE `status_lpj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `status_lpj`
--
ALTER TABLE `status_lpj`
  ADD CONSTRAINT `FK_ORMAWA` FOREIGN KEY (`ORMAWA`) REFERENCES `ormawa` (`ID_ORMAWA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
