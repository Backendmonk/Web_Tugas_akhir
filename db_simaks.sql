-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2021 at 03:37 PM
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
CREATE DATABASE IF NOT EXISTS `db_simaks` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `db_simaks`;

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
  `REVISI_LPJ` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `approval_lpj`
--

INSERT INTO `approval_lpj` (`ID_APPROVALLPJ`, `NIDN_WKIII`, `NIDN_KEMAHASISWAAN`, `APPROVAL_LPJ_KEMAHASISWAAN`, `APPROVAL_LPJ_WKIII`, `LAPORAN_LPJ`, `REVISI_LPJ`) VALUES
('0002', '234', '123', 'test', 'test', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `approval_proposal`
--

DROP TABLE IF EXISTS `approval_proposal`;
CREATE TABLE `approval_proposal` (
  `ID_APPROVAL` varchar(100) NOT NULL,
  `NIDN_WKIII` varchar(100) DEFAULT NULL,
  `NIDN_KEMAHASISWAAN` varchar(100) DEFAULT NULL,
  `APPROVAL_PROPOSAL_KEMAHASISWAAN` varchar(100) DEFAULT NULL,
  `APPROVAL_PROPOSAL_WKIII` varchar(100) DEFAULT NULL,
  `LAPORAN_PROPOSAL` mediumtext DEFAULT NULL,
  `REVISI` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `approval_proposal`
--

INSERT INTO `approval_proposal` (`ID_APPROVAL`, `NIDN_WKIII`, `NIDN_KEMAHASISWAAN`, `APPROVAL_PROPOSAL_KEMAHASISWAAN`, `APPROVAL_PROPOSAL_WKIII`, `LAPORAN_PROPOSAL`, `REVISI`) VALUES
('21231', '234', '123', 'test', 'test', 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `bukti_kegiatan`
--

DROP TABLE IF EXISTS `bukti_kegiatan`;
CREATE TABLE `bukti_kegiatan` (
  `ID_BUKTIKEGIATAN` varchar(100) NOT NULL,
  `ID_PROPOSAL` varchar(100) DEFAULT NULL,
  `BERITA_ACARA` date DEFAULT NULL,
  `ABSENSI_BK` mediumtext DEFAULT NULL,
  `DOKUMENTASI` mediumtext DEFAULT NULL,
  `DOKUMENTASI2` mediumtext DEFAULT NULL,
  `DOKUMENTASI3` mediumtext DEFAULT NULL,
  `SERTIFIKAT` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bukti_kegiatan`
--

INSERT INTO `bukti_kegiatan` (`ID_BUKTIKEGIATAN`, `ID_PROPOSAL`, `BERITA_ACARA`, `ABSENSI_BK`, `DOKUMENTASI`, `DOKUMENTASI2`, `DOKUMENTASI3`, `SERTIFIKAT`) VALUES
('99', '212', '2021-11-26', 'asdasdasdasdas', 'dasasd', 'sadasd', 'asdasd', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `kemahasiswaan`
--

DROP TABLE IF EXISTS `kemahasiswaan`;
CREATE TABLE `kemahasiswaan` (
  `NIDN_KEMAHASISWAAN` varchar(100) NOT NULL,
  `NAMA_KEMAHASISWAAN` varchar(100) DEFAULT NULL,
  `JABATAN_KEMAHASISWAAN` varchar(100) DEFAULT NULL,
  `PASSWORD_KEMAHASISWAAN` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kemahasiswaan`
--

INSERT INTO `kemahasiswaan` (`NIDN_KEMAHASISWAAN`, `NAMA_KEMAHASISWAAN`, `JABATAN_KEMAHASISWAAN`, `PASSWORD_KEMAHASISWAAN`) VALUES
('123', 'arya', 'ketua', '$2y$10$a.DSeF6PKlWRtotLbWZ0gu/1Z9V38gOfV8N1ZqhXswyfHf8rWvrem');

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

DROP TABLE IF EXISTS `laporan`;
CREATE TABLE `laporan` (
  `ID_LAPORAN` int(11) NOT NULL,
  `ID_PENGAJUAN` varchar(100) DEFAULT NULL,
  `TANGGAL` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `lpj`
--

DROP TABLE IF EXISTS `lpj`;
CREATE TABLE `lpj` (
  `ID_LPJ` varchar(100) NOT NULL,
  `ID_APPROVALLPJ` varchar(100) DEFAULT NULL,
  `ID_BUKTIKEGIATAN` varchar(100) DEFAULT NULL,
  `TGL_PENGAJUANLPJ` date DEFAULT NULL,
  `LPJ` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lpj`
--

INSERT INTO `lpj` (`ID_LPJ`, `ID_APPROVALLPJ`, `ID_BUKTIKEGIATAN`, `TGL_PENGAJUANLPJ`, `LPJ`) VALUES
('21312312', '0002', '99', '2021-11-24', 'eqweqwewq');

-- --------------------------------------------------------

--
-- Table structure for table `ormawa`
--

DROP TABLE IF EXISTS `ormawa`;
CREATE TABLE `ormawa` (
  `ID_ORMAWA` varchar(100) NOT NULL,
  `NIDN` int(11) DEFAULT NULL,
  `NAMA_ORMAWA` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ormawa`
--

INSERT INTO `ormawa` (`ID_ORMAWA`, `NIDN`, `NAMA_ORMAWA`) VALUES
('001', 234, 'E-Sport STIKI');

-- --------------------------------------------------------

--
-- Table structure for table `pembina`
--

DROP TABLE IF EXISTS `pembina`;
CREATE TABLE `pembina` (
  `NIDN` int(11) NOT NULL,
  `NAMA_PEMBINA` varchar(100) DEFAULT NULL,
  `PASSOWRD_PEMBINA` varchar(100) DEFAULT NULL,
  `ALAMAT_PEMBINA` varchar(100) DEFAULT NULL,
  `NO_TELP_PEMBINA` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembina`
--

INSERT INTO `pembina` (`NIDN`, `NAMA_PEMBINA`, `PASSOWRD_PEMBINA`, `ALAMAT_PEMBINA`, `NO_TELP_PEMBINA`) VALUES
(234, 'Gede', '$2y$10$a.DSeF6PKlWRtotLbWZ0gu/1Z9V38gOfV8N1ZqhXswyfHf8rWvrem', 'Dawas', '02518484864867');

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
  `STATUS` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan_kegiatan`
--

INSERT INTO `pengajuan_kegiatan` (`ID_PENGAJUAN`, `ID_ORMAWA`, `NAMA_ORMAWA_FK`, `NAMA_KEGIATAN`, `KONSEP_KEGIATAN`, `SUB_KEGIATAN`, `PJ_KEGIATAN`, `LATAR_BELAKANG`, `TUJUAN_KEGIATAN`, `TGL_KEGIATAN`, `TEMPAT_KEGIATAN`, `SK_KEPANITIAAN`, `TIMELINE_KEGIATAN`, `RAB`, `KETUA_PANITIA`, `CONTAC_PERSON`, `KATEGORI_KEGIATAN`, `STATUS`) VALUES
(' 109 ', '001', 'E-Sport STIKI', 'Section-10', '1571087786_1 (1).doc', '2014887571_1 (2).docx', 'wqweq', '340213952_1 (2).docx', '116403418_1 (3).docx', '2021-12-02', 'saxzczxcxz', '187158400_1 (4).docx', '1278786969_1 (5).docx', '1075533404_1 (6).docx', 'Wayan', '434564545', 'sdfsddfs', 'Belum Diterima'),
(' 397 ', '001', 'E-Sport STIKI', 'Section 4', '1972079667_Kuis Pertemuan 3 - Kewirausahaan.docx', '2047393714_Kuis Pertemuan 6.docx', 'Entah', '1983245168_Kuis Pertemuan 6.docx', '206474805_Kuis Pertemuan 5.docx', '2021-11-29', 'Entah', '233653704_Nama.docx', '1025213298_Ujian Tengah Semester _ I Wayan Arya Pratama Putra _ 18101020.docx', '731706130_Tugas Pertemuan 6.docx', 'nyoman', '099234234', 'Entah', 'Belum Diterima'),
(' 90 ', '001', 'E-Sport STIKI', 'Section 2', 'Section 2_BodyHealthy.docx', 'Section 2_Doc1.docx', 'sadsad', 'Section 2_Doc1.docx', 'Section 2_Doc2.docx', '0000-00-00', '', 'Section 2_Pertemuan 4 Hasil Dan Pembahasan.docx', 'Section 2_Rev_Template Laporan MK Seminar_191021 (1) (1).docx', 'Section 2_Soal Mid test (F,FA).doc', 'Made', '008978', 'qweqwe', 'Belum Diterima'),
('112', '001', 'sad', 'asda', 'sad', 'asd', 'asd', 'sad', 'asd', '2021-11-02', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `pengurus_ormawa`
--

DROP TABLE IF EXISTS `pengurus_ormawa`;
CREATE TABLE `pengurus_ormawa` (
  `USERNAME_KETUA` varchar(100) NOT NULL,
  `ID_ORMAWA` varchar(100) DEFAULT NULL,
  `PASSWORD_KETUA` varchar(100) DEFAULT NULL,
  `NAMA_KETUA` varchar(100) DEFAULT NULL,
  `NAMA_WAKIL` varchar(100) DEFAULT NULL,
  `NAMA_WAKIL2` varchar(100) DEFAULT NULL,
  `SEKRETARIS1` varchar(100) DEFAULT NULL,
  `SEKRETARIS2` varchar(100) DEFAULT NULL,
  `BENDAHARA1` varchar(100) DEFAULT NULL,
  `BENDAHARA2` varchar(100) DEFAULT NULL,
  `RENJA` mediumtext DEFAULT NULL,
  `AD_ART` mediumtext DEFAULT NULL,
  `MASA_JABATAN` date DEFAULT NULL,
  `TAHUN_DILANTIK` date DEFAULT NULL,
  `GAMBAR_STRUKTUR_ORGANISASI` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengurus_ormawa`
--

INSERT INTO `pengurus_ormawa` (`USERNAME_KETUA`, `ID_ORMAWA`, `PASSWORD_KETUA`, `NAMA_KETUA`, `NAMA_WAKIL`, `NAMA_WAKIL2`, `SEKRETARIS1`, `SEKRETARIS2`, `BENDAHARA1`, `BENDAHARA2`, `RENJA`, `AD_ART`, `MASA_JABATAN`, `TAHUN_DILANTIK`, `GAMBAR_STRUKTUR_ORGANISASI`) VALUES
('admin', '001', '$2y$10$a.DSeF6PKlWRtotLbWZ0gu/1Z9V38gOfV8N1ZqhXswyfHf8rWvrem', 'Wayan', 'Made', 'ketut', 'putu', 'nyoman', 'komang', 'sultan', 'fdsdfs', 'sdfsdfsdfs', '2021-11-08', '2022-11-08', 'fsdfsdfds');

-- --------------------------------------------------------

--
-- Table structure for table `persetujuan_kemahasiswaan`
--

DROP TABLE IF EXISTS `persetujuan_kemahasiswaan`;
CREATE TABLE `persetujuan_kemahasiswaan` (
  `id_Persetujuan` varchar(100) NOT NULL,
  `id_pengajuan` varchar(100) NOT NULL,
  `NIDN_kemahsiswaan` varchar(100) NOT NULL,
  `approval_status` enum('Approve','Tolak','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `persetujuan_kemahasiswaan`
--

INSERT INTO `persetujuan_kemahasiswaan` (`id_Persetujuan`, `id_pengajuan`, `NIDN_kemahsiswaan`, `approval_status`) VALUES
('1031315368', ' 109', '123', 'Approve'),
('178732249', ' 397', '123', 'Tolak'),
('513379155', ' 90', '123', 'Approve');

-- --------------------------------------------------------

--
-- Table structure for table `persetujuan_pembina`
--

DROP TABLE IF EXISTS `persetujuan_pembina`;
CREATE TABLE `persetujuan_pembina` (
  `id_Persetujuan` varchar(100) NOT NULL,
  `id_pengajuan` varchar(100) NOT NULL,
  `NIDN_pembina` int(11) NOT NULL,
  `approval_status` enum('Approve','Tolak','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `persetujuan_wkiii`
--

DROP TABLE IF EXISTS `persetujuan_wkiii`;
CREATE TABLE `persetujuan_wkiii` (
  `id_Persetujuan` varchar(100) NOT NULL,
  `id_pengajuan` varchar(100) NOT NULL,
  `NIDN_WKIII` varchar(100) NOT NULL,
  `approval_status` enum('Approve','Tolak','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

DROP TABLE IF EXISTS `proposal`;
CREATE TABLE `proposal` (
  `ID_PROPOSAL` varchar(100) NOT NULL,
  `ID_APPROVAL` varchar(100) DEFAULT NULL,
  `ID_PENGAJUAN` varchar(100) DEFAULT NULL,
  `TANNGGAL_PENGAJUANPROPOSAL` date DEFAULT NULL,
  `ABSENSI_PROPOSAL` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`ID_PROPOSAL`, `ID_APPROVAL`, `ID_PENGAJUAN`, `TANNGGAL_PENGAJUANPROPOSAL`, `ABSENSI_PROPOSAL`) VALUES
('212', '21231', '112', '2021-11-18', 'wewe');

-- --------------------------------------------------------

--
-- Table structure for table `wkiii`
--

DROP TABLE IF EXISTS `wkiii`;
CREATE TABLE `wkiii` (
  `NIDN_WKIII` varchar(100) NOT NULL,
  `NAMA_WKIII` varchar(100) DEFAULT NULL,
  `JABATAN_WKIII` varchar(100) DEFAULT NULL,
  `PASSWORD_WKIII` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wkiii`
--

INSERT INTO `wkiii` (`NIDN_WKIII`, `NAMA_WKIII`, `JABATAN_WKIII`, `PASSWORD_WKIII`) VALUES
('234', 'ketut', 'Ketua', '$2y$10$6v4zlzN5/eI2W8SjW0XdBuRJ1mMYElA5ICyRJbbQPao9OUN4EqYXm'),
('667', 'Dewa', 'ketua', '$2y$10$a.DSeF6PKlWRtotLbWZ0gu/1Z9V38gOfV8N1ZqhXswyfHf8rWvrem');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approval_lpj`
--
ALTER TABLE `approval_lpj`
  ADD PRIMARY KEY (`ID_APPROVALLPJ`),
  ADD KEY `WKIII_MENGECEK_LPJ_FK` (`NIDN_WKIII`),
  ADD KEY `KEMAHASISWAAN_MENGECEKLPJ_FK` (`NIDN_KEMAHASISWAAN`);

--
-- Indexes for table `approval_proposal`
--
ALTER TABLE `approval_proposal`
  ADD PRIMARY KEY (`ID_APPROVAL`),
  ADD KEY `WKIII_MENGECAKPROPOSAL_FK` (`NIDN_WKIII`),
  ADD KEY `KEMAHASISWAAN_MENGECEK_PROPOSAL_FK` (`NIDN_KEMAHASISWAAN`);

--
-- Indexes for table `bukti_kegiatan`
--
ALTER TABLE `bukti_kegiatan`
  ADD PRIMARY KEY (`ID_BUKTIKEGIATAN`),
  ADD KEY `TERDAPAT_FK` (`ID_PROPOSAL`);

--
-- Indexes for table `kemahasiswaan`
--
ALTER TABLE `kemahasiswaan`
  ADD PRIMARY KEY (`NIDN_KEMAHASISWAAN`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`ID_LAPORAN`),
  ADD KEY `MENGHASILKAN_FK` (`ID_PENGAJUAN`);

--
-- Indexes for table `lpj`
--
ALTER TABLE `lpj`
  ADD PRIMARY KEY (`ID_LPJ`),
  ADD KEY `MENGELUARKAN_FK` (`ID_BUKTIKEGIATAN`),
  ADD KEY `MENGHASILKANLPJ_FK` (`ID_APPROVALLPJ`);

--
-- Indexes for table `ormawa`
--
ALTER TABLE `ormawa`
  ADD PRIMARY KEY (`ID_ORMAWA`),
  ADD KEY `MEMBINA_FK` (`NIDN`);

--
-- Indexes for table `pembina`
--
ALTER TABLE `pembina`
  ADD PRIMARY KEY (`NIDN`);

--
-- Indexes for table `pengajuan_kegiatan`
--
ALTER TABLE `pengajuan_kegiatan`
  ADD PRIMARY KEY (`ID_PENGAJUAN`),
  ADD KEY `MENGAJUKAN_FK` (`ID_ORMAWA`);

--
-- Indexes for table `pengurus_ormawa`
--
ALTER TABLE `pengurus_ormawa`
  ADD PRIMARY KEY (`USERNAME_KETUA`),
  ADD KEY `MEMILIKI_FK` (`ID_ORMAWA`);

--
-- Indexes for table `persetujuan_kemahasiswaan`
--
ALTER TABLE `persetujuan_kemahasiswaan`
  ADD PRIMARY KEY (`id_Persetujuan`),
  ADD KEY `pengajuan_fk` (`id_pengajuan`),
  ADD KEY `nidn_kemahasiswaan_fk` (`NIDN_kemahsiswaan`);

--
-- Indexes for table `persetujuan_pembina`
--
ALTER TABLE `persetujuan_pembina`
  ADD PRIMARY KEY (`id_Persetujuan`),
  ADD KEY `pengajuan_pembina_fk` (`id_pengajuan`),
  ADD KEY `NIDN_PEMBINA_FK_` (`NIDN_pembina`);

--
-- Indexes for table `persetujuan_wkiii`
--
ALTER TABLE `persetujuan_wkiii`
  ADD PRIMARY KEY (`id_Persetujuan`),
  ADD KEY `pengajuan_fk_WKIII` (`id_pengajuan`),
  ADD KEY `NIDN_WKIII_FK` (`NIDN_WKIII`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`ID_PROPOSAL`),
  ADD KEY `MENGHASILKAN_PROPOSAL_FK` (`ID_APPROVAL`),
  ADD KEY `MEMERLUKAN_FK` (`ID_PENGAJUAN`);

--
-- Indexes for table `wkiii`
--
ALTER TABLE `wkiii`
  ADD PRIMARY KEY (`NIDN_WKIII`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `approval_lpj`
--
ALTER TABLE `approval_lpj`
  ADD CONSTRAINT `FK_KEMAHASISWAAN_MENGECEKLPJ` FOREIGN KEY (`NIDN_KEMAHASISWAAN`) REFERENCES `kemahasiswaan` (`NIDN_KEMAHASISWAAN`),
  ADD CONSTRAINT `FK_WKIII_MENGECEK_LPJ` FOREIGN KEY (`NIDN_WKIII`) REFERENCES `wkiii` (`NIDN_WKIII`);

--
-- Constraints for table `approval_proposal`
--
ALTER TABLE `approval_proposal`
  ADD CONSTRAINT `FK_KEMAHASISWAAN_MENGECEK_PROPOSAL` FOREIGN KEY (`NIDN_KEMAHASISWAAN`) REFERENCES `kemahasiswaan` (`NIDN_KEMAHASISWAAN`),
  ADD CONSTRAINT `FK_WKIII_MENGECAKPROPOSAL` FOREIGN KEY (`NIDN_WKIII`) REFERENCES `wkiii` (`NIDN_WKIII`);

--
-- Constraints for table `bukti_kegiatan`
--
ALTER TABLE `bukti_kegiatan`
  ADD CONSTRAINT `FK_Terdapat_ID_Proposal` FOREIGN KEY (`ID_PROPOSAL`) REFERENCES `proposal` (`ID_PROPOSAL`);

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `FK_Memerluakan_Pengajuan` FOREIGN KEY (`ID_PENGAJUAN`) REFERENCES `pengajuan_kegiatan` (`ID_PENGAJUAN`);

--
-- Constraints for table `lpj`
--
ALTER TABLE `lpj`
  ADD CONSTRAINT `FK_memerlukan _bukti_kegiatan` FOREIGN KEY (`ID_BUKTIKEGIATAN`) REFERENCES `bukti_kegiatan` (`ID_BUKTIKEGIATAN`),
  ADD CONSTRAINT `FK_menghasilkan_LPJ` FOREIGN KEY (`ID_APPROVALLPJ`) REFERENCES `approval_lpj` (`ID_APPROVALLPJ`);

--
-- Constraints for table `ormawa`
--
ALTER TABLE `ormawa`
  ADD CONSTRAINT `FK_NIDN_pembina` FOREIGN KEY (`NIDN`) REFERENCES `pembina` (`NIDN`);

--
-- Constraints for table `pengajuan_kegiatan`
--
ALTER TABLE `pengajuan_kegiatan`
  ADD CONSTRAINT `FK_ID_ORMAWA` FOREIGN KEY (`ID_ORMAWA`) REFERENCES `ormawa` (`ID_ORMAWA`);

--
-- Constraints for table `pengurus_ormawa`
--
ALTER TABLE `pengurus_ormawa`
  ADD CONSTRAINT `FK_ID_ORMAWA_Pengurus` FOREIGN KEY (`ID_ORMAWA`) REFERENCES `ormawa` (`ID_ORMAWA`);

--
-- Constraints for table `persetujuan_kemahasiswaan`
--
ALTER TABLE `persetujuan_kemahasiswaan`
  ADD CONSTRAINT `nidn_kemahasiswaan_fk` FOREIGN KEY (`NIDN_kemahsiswaan`) REFERENCES `kemahasiswaan` (`NIDN_KEMAHASISWAAN`),
  ADD CONSTRAINT `pengajuan_fk` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan_kegiatan` (`ID_PENGAJUAN`);

--
-- Constraints for table `persetujuan_pembina`
--
ALTER TABLE `persetujuan_pembina`
  ADD CONSTRAINT `NIDN_PEMBINA_FK_` FOREIGN KEY (`NIDN_pembina`) REFERENCES `pembina` (`NIDN`),
  ADD CONSTRAINT `pengajuan_pembina_fk` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan_kegiatan` (`ID_PENGAJUAN`);

--
-- Constraints for table `persetujuan_wkiii`
--
ALTER TABLE `persetujuan_wkiii`
  ADD CONSTRAINT `NIDN_WKIII_FK` FOREIGN KEY (`NIDN_WKIII`) REFERENCES `wkiii` (`NIDN_WKIII`),
  ADD CONSTRAINT `pengajuan_fk_WKIII` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan_kegiatan` (`ID_PENGAJUAN`);

--
-- Constraints for table `proposal`
--
ALTER TABLE `proposal`
  ADD CONSTRAINT `FK_ID_APPROVAL_Proposal` FOREIGN KEY (`ID_APPROVAL`) REFERENCES `approval_proposal` (`ID_APPROVAL`),
  ADD CONSTRAINT `FK_ID_PENGAJUAN_PROPOSAL` FOREIGN KEY (`ID_PENGAJUAN`) REFERENCES `pengajuan_kegiatan` (`ID_PENGAJUAN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
