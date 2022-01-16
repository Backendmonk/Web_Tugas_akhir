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
-- Table structure for table `pengajuan_kegiatan`
--

DROP TABLE IF EXISTS `pengajuan_kegiatan`;
CREATE TABLE `pengajuan_kegiatan` (
  `ID_PENGAJUAN` varchar(100) NOT NULL,
  `ID_ORMAWA` varchar(100) DEFAULT NULL,
  `NAMA_ORMAWA_FK` varchar(100) DEFAULT NULL,
  `NAMA_KEGIATAN` varchar(100) DEFAULT NULL,
  `KONSEP_KEGIATAN` mediumtext DEFAULT NULL,
  `SUB_KEGIATAN` mediumtext DEFAULT NULL,
  `PJ_KEGIATAN` varchar(100) DEFAULT NULL,
  `LATAR_BELAKANG` mediumtext DEFAULT NULL,
  `TUJUAN_KEGIATAN` mediumtext DEFAULT NULL,
  `TGL_KEGIATAN` date DEFAULT NULL,
  `TEMPAT_KEGIATAN` varchar(100) DEFAULT NULL,
  `SK_KEPANITIAAN` mediumtext DEFAULT NULL,
  `TIMELINE_KEGIATAN` mediumtext DEFAULT NULL,
  `RAB` mediumtext DEFAULT NULL,
  `KETUA_PANITIA` varchar(100) DEFAULT NULL,
  `CONTAC_PERSON` varchar(100) DEFAULT NULL,
  `KATEGORI_KEGIATAN` varchar(100) DEFAULT NULL,
  `STATUS` varchar(100) DEFAULT NULL,
  `Date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan_kegiatan`
--

INSERT INTO `pengajuan_kegiatan` (`ID_PENGAJUAN`, `ID_ORMAWA`, `NAMA_ORMAWA_FK`, `NAMA_KEGIATAN`, `KONSEP_KEGIATAN`, `SUB_KEGIATAN`, `PJ_KEGIATAN`, `LATAR_BELAKANG`, `TUJUAN_KEGIATAN`, `TGL_KEGIATAN`, `TEMPAT_KEGIATAN`, `SK_KEPANITIAAN`, `TIMELINE_KEGIATAN`, `RAB`, `KETUA_PANITIA`, `CONTAC_PERSON`, `KATEGORI_KEGIATAN`, `STATUS`, `Date`) VALUES
('', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-23', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2022-01-15 16:00:00'),
(' 262 ', '1493474770', 'shinbun', 'dasdasdsa', '1554902866_Quis 2_ I Wayan Arya Pratama Putra.docx', '2047670941_Tugas 4.docx', 'qwe', '1349340825_Tugas 4.docx', '779672157_Tugas 4.docx', '2022-01-12', 'eqwewq', '1461982127_UTS ETIKA PROFESI - I Wayan Arya Pratama Putra.docx', '206411701_Ujian Akhir Semester_ Etika Profesi_18101020.docx', '1248811450_Ujian Akhir Semester_ Etika Profesi_18101020.docx', 'bagas', 'asdasdas', 'qweqweqwweq', 'Approve', '2022-01-15 21:22:39'),
(' 514 ', '1493474770', 'shinbun', 'rtrrertertertertert', '206065752_Assignment 15.docx', '1661353080_Task Meeting 10.docx', 'sdfsfs', '1206924603_Task Meeting 10.docx', '999806996_Task meeting 3.docx', '2022-01-14', 'adasdas', '1245960546_Assignment 15.docx', '249933003_Task meeting 3.docx', '1682809631_Task meeting 3.docx', 'bagas', '534543', 'sdfsdfsd', 'Approve', '2018-01-17 16:00:00'),
(' 611 ', '87764831', 'robotika', 'sumo', '408735357_Task Meeting 3.docx', '284789562_Task Meeting 3.docx', 'arwan', '1689966438_Task Meeting 3.docx', '1822979152_Task Meeting 3.docx', '2021-06-01', 'lipo mall', '976828388_Task Meeting 3.docx', '1803421307_Task Meeting 3.docx', '77666209_Task Meeting 3.docx', 'rikodo', '0882421421424', 'kompetesi', 'Approve', '2022-01-15 16:00:00'),
(' 616 ', '1493474770', 'shinbun', 'Hangout Event On Sunday', '1200132700_UTS ETIKA PROFESI - I Wayan Arya Pratama Putra.docx', '1658457420_UTS ETIKA PROFESI - I Wayan Arya Pratama Putra.docx', 'wqe', '1680397998_UTS ETIKA PROFESI - I Wayan Arya Pratama Putra.docx', '572734361_Tugas 4.docx', '2022-01-25', 'ewrwerw', '1336037171_Ujian Akhir Semester_ Etika Profesi_18101020.docx', '171290778_UTS ETIKA PROFESI - I Wayan Arya Pratama Putra.docx', '1839802373_UTS ETIKA PROFESI - I Wayan Arya Pratama Putra.docx', 'bagas', '3453453', 'ert', 'Approve', '2022-01-15 21:17:18'),
(' 630 ', '1493474770', 'shinbun', 'iuouioiuui', '1315709158_Kelas Tambahan Pertemuan 7.docx', '85082822_UTS ETIKA PROFESI - I Wayan Arya Pratama Putra.docx', 'dfgdfgd', '1708877112_UTS ETIKA PROFESI - I Wayan Arya Pratama Putra.docx', '8841870_Tugas 1.docx', '2022-01-14', 'weew', '816035299_UTS ETIKA PROFESI - I Wayan Arya Pratama Putra.docx', '232433204_Tugas 1.docx', '1462656485_Tugas 1.docx', 'bagas', '312312312', 'qweqweqw', 'Approve', '2022-01-15 16:00:00'),
(' 696 ', '1493474770', 'shinbun', 'Testing Kegiatan V2', '1439536242_Kelas Tambahan Pertemuan 7.docx', '1856368134_Tugas 2.docx', 'sadasda', '1222302841_Tugas 2.docx', '210628221_Tugas 2.docx', '2022-01-17', 'sda', '483520752_Ujian Akhir Semester_ Etika Profesi_18101020.docx', '884488259_UTS ETIKA PROFESI - I Wayan Arya Pratama Putra.docx', '1463457932_Tugas 4.docx', 'bagas', '345345', 'qweqweqwqwe', 'Approve', '2022-01-15 21:35:46'),
(' 782 ', '87764831', 'robotika', 'Line follower', '1598036686_Task Meeting 3.docx', '2152204_Task Meeting 3.docx', 'arwan', '113270015_Task Meeting 3.docx', '1687050300_Task Meeting 3.docx', '2021-05-01', 'lipo mall', '1255386758_Task Meeting 3.docx', '452848719_Task Meeting 3.docx', '1287706581_Task Meeting 3.docx', 'rikodo', '08824214214', 'kompetesi', 'Approve', '2022-01-15 16:00:00'),
(' 794 ', '1493474770', 'shinbun', 'asdda2342342', '473212745_Digital_heritage_in_general.docx', '269744359_Digital_heritage_in_general.docx', '123', '2088434143_Digital_heritage_in_general.docx', '1081930869_Digital_heritage_in_general.docx', '2022-01-18', 'qweqw', '2016867798_Digital_heritage_in_general.docx', '1495426432_Digital_heritage_in_general.docx', '1492974364_DH_1.docx', 'bagas', 'qweqweq', 'qwewqe', 'Belum Diterima', '2022-01-15 11:56:06'),
(' 973 ', '1493474770', 'shinbun', 'rtyrrtyrty', '785733238_DH_1.docx', '1934986370_Green_IT_Essay_-_Rizky_Andita_-_18101177.docx', 'ghfgh', '1583340765_Green_IT_Essay_-_Rizky_Andita_-_18101177.docx', '2006100288_Green_IT_Essay_-_Rizky_Andita_-_18101177.docx', '2022-01-17', 'erterertre', '122754688_Digital_heritage_in_general.docx', '1298932139_Digital_heritage_in_general.docx', '1424411098_Green_IT_Essay_-_Rizky_Andita_-_18101177.docx', 'bagas', 'dertert', 'ertertererewr', 'Approve', '2022-01-15 18:30:04'),
('333', '1753732088', 'UMA', 'WWA', NULL, NULL, NULL, NULL, NULL, '2021-12-24', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Belum Diterima', '2022-01-15 16:00:00'),
('777', '87764831', 'robotika', 'Robotech', 'fsaf', 'sfasf', NULL, NULL, NULL, '2021-07-01', 'sdsaf', 'sfafsf', 'sfsfasf', 'sfasf', 'sfaf', 'fsfa', 'fsf', 'Approve', '2022-01-15 16:00:00'),
('888', '87764831', 'BADMINTO', 'Badminton cup', NULL, NULL, NULL, NULL, NULL, '2021-05-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Approve', '2022-01-15 16:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pengajuan_kegiatan`
--
ALTER TABLE `pengajuan_kegiatan`
  ADD PRIMARY KEY (`ID_PENGAJUAN`),
  ADD KEY `MENGAJUKAN_FK` (`ID_ORMAWA`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pengajuan_kegiatan`
--
ALTER TABLE `pengajuan_kegiatan`
  ADD CONSTRAINT `FK_ID_ORMAWA` FOREIGN KEY (`ID_ORMAWA`) REFERENCES `ormawa` (`ID_ORMAWA`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
