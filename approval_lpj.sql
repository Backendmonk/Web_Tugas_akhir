-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 16, 2022 at 03:33 PM
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
-- Table structure for table `approval_lpj`
--

DROP TABLE IF EXISTS `approval_lpj`;
CREATE TABLE `approval_lpj` (
  `ID_APPROVALLPJ` varchar(100) NOT NULL,
  `NIDN_WKIII` varchar(100) DEFAULT NULL,
  `NIDN_KEMAHASISWAAN` varchar(100) DEFAULT NULL,
  `APPROVAL_LPJ_KEMAHASISWAAN` varchar(100) DEFAULT NULL,
  `APPROVAL_LPJ_WKIII` varchar(100) DEFAULT NULL,
  `LAPORAN_LPJ` mediumtext DEFAULT NULL,
  `REVISI_LPJ` mediumtext DEFAULT NULL,
  `ID_BK` varchar(100) DEFAULT NULL,
  `NIDN` int(100) DEFAULT NULL,
  `ALP` varchar(100) DEFAULT NULL,
  `ORMAWA` varchar(100) DEFAULT NULL,
  `Kegiatan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `approval_lpj`
--

INSERT INTO `approval_lpj` (`ID_APPROVALLPJ`, `NIDN_WKIII`, `NIDN_KEMAHASISWAAN`, `APPROVAL_LPJ_KEMAHASISWAAN`, `APPROVAL_LPJ_WKIII`, `LAPORAN_LPJ`, `REVISI_LPJ`, `ID_BK`, `NIDN`, `ALP`, `ORMAWA`, `Kegiatan`) VALUES
('1036867858', '202020', '10101010', 'Approve', 'Approve', '1642306176_Tugas 2.docx', NULL, '2062928425', 202020, 'Approve', '1493474770', ' 973 '),
('1047944703', '202020', '10101010', 'Approve', 'Approve', '1639197193_18101028-IPutuMellanaAriArtawan-HCI-Rangkum model dialog.docx', '1639203626_18101028-IPutuMellanaAriArtawan-Interpersonal_Skill-Pertemuan_12.docx', '1588414891', 1, 'Unapproved', NULL, NULL),
('1350054836', '202020', '10101010', 'Approve', 'Approve', '1642237649_Task Meeting 10.docx', NULL, '2094307256', 202020, 'Approve', '1493474770', NULL),
('1857137277', '202020', '10101010', 'Approve', 'Approve', '1639197193_18101028-IPutuMellanaAriArtawan-HCI-Rangkum model dialog.docx', NULL, '1186903940', NULL, NULL, NULL, NULL),
('1931024228', '202020', '10101010', 'Approve', 'Approve', '1642307671_Tugas 4.docx', NULL, '1301197952', 202020, 'Approve', '1493474770', ' 262 '),
('309887079', '202020', '10101010', 'Approve', 'Approve', '1640341494_26-2020-Implementasi-Deep-Learning-webinar3.pdf', NULL, '1786073396', 1, 'Approve', NULL, NULL),
('510212049', '202020', '10101010', 'Approve', 'Approve', '1642306861_Ujian Akhir Semester_ Etika Profesi_18101020.docx', NULL, '1689878362', 202020, 'Approve', '1493474770', ' 616 '),
('709843028', NULL, NULL, NULL, NULL, '1640342879_397-Article Text-846-2-10-20200415.pdf', NULL, '2110468124', NULL, NULL, NULL, NULL),
('884242751', '202020', '10101010', 'Approve', 'Approve', '1642265685_Pertemuan 4 Hasil Dan Pembahasan.docx', NULL, '1451047430', 202020, 'Approve', '1493474770', ' 630 ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approval_lpj`
--
ALTER TABLE `approval_lpj`
  ADD PRIMARY KEY (`ID_APPROVALLPJ`),
  ADD KEY `WKIII_MENGECEK_LPJ_FK` (`NIDN_WKIII`),
  ADD KEY `KEMAHASISWAAN_MENGECEKLPJ_FK` (`NIDN_KEMAHASISWAAN`),
  ADD KEY `FK_BK` (`ID_BK`),
  ADD KEY `FK_P` (`NIDN`),
  ADD KEY `FK_Ormawa_lPJ` (`ORMAWA`),
  ADD KEY `MILIK_KEGIATAN_FK` (`Kegiatan`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `approval_lpj`
--
ALTER TABLE `approval_lpj`
  ADD CONSTRAINT `FK_BK` FOREIGN KEY (`ID_BK`) REFERENCES `bukti_kegiatan` (`ID_BUKTIKEGIATAN`),
  ADD CONSTRAINT `FK_KEMAHASISWAAN_MENGECEKLPJ` FOREIGN KEY (`NIDN_KEMAHASISWAAN`) REFERENCES `kemahasiswaan` (`NIDN_KEMAHASISWAAN`),
  ADD CONSTRAINT `FK_Kegiatan` FOREIGN KEY (`Kegiatan`) REFERENCES `pengajuan_kegiatan` (`ID_PENGAJUAN`),
  ADD CONSTRAINT `FK_LPJ_ORMAWA` FOREIGN KEY (`ORMAWA`) REFERENCES `ormawa` (`ID_ORMAWA`),
  ADD CONSTRAINT `FK_P` FOREIGN KEY (`NIDN`) REFERENCES `pembina` (`NIDN`),
  ADD CONSTRAINT `FK_WKIII_MENGECEK_LPJ` FOREIGN KEY (`NIDN_WKIII`) REFERENCES `wkiii` (`NIDN_WKIII`),
  ADD CONSTRAINT `MILIK_KEGIATAN_FK` FOREIGN KEY (`Kegiatan`) REFERENCES `pengajuan_kegiatan` (`ID_PENGAJUAN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
