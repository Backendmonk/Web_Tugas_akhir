/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.17-MariaDB : Database - db_simaks
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_simaks` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_simaks`;

/*Table structure for table `appbk` */

DROP TABLE IF EXISTS `appbk`;

CREATE TABLE `appbk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idbk` int(11) DEFAULT NULL,
  `nidn` varchar(100) DEFAULT NULL,
  `approve` tinyint(1) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `appbk` (`idbk`),
  KEY `appbkkema` (`nidn`),
  CONSTRAINT `appbk` FOREIGN KEY (`idbk`) REFERENCES `bukti_kegiatan_mahasiswa` (`id`),
  CONSTRAINT `appbkkema` FOREIGN KEY (`nidn`) REFERENCES `kemahasiswaan` (`NIDN_KEMAHASISWAAN`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `appbk` */

insert  into `appbk`(`id`,`idbk`,`nidn`,`approve`,`catatan`) values 
(1,1,'10101010',NULL,' ');

/*Table structure for table `applpj` */

DROP TABLE IF EXISTS `applpj`;

CREATE TABLE `applpj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idlpj` int(11) DEFAULT NULL,
  `nidn` varchar(100) DEFAULT NULL,
  `approve` tinyint(1) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `approKema` (`nidn`),
  KEY `idlpj&approve` (`idlpj`),
  CONSTRAINT `approKema` FOREIGN KEY (`nidn`) REFERENCES `kemahasiswaan` (`NIDN_KEMAHASISWAAN`),
  CONSTRAINT `idlpj&approve` FOREIGN KEY (`idlpj`) REFERENCES `pengajuan_lpj` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `applpj` */

insert  into `applpj`(`id`,`idlpj`,`nidn`,`approve`,`catatan`) values 
(1,2,'10101010',1,' '),
(5,3,'10101010',NULL,' kurang ');

/*Table structure for table `approval_kegiatan` */

DROP TABLE IF EXISTS `approval_kegiatan`;

CREATE TABLE `approval_kegiatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengajuan` int(11) NOT NULL,
  `nama_ormawa` varchar(100) NOT NULL,
  `kegiatan` varchar(100) NOT NULL,
  `id_kemahasiswaan` varchar(100) DEFAULT NULL,
  `nama_kemahasiswaan` varchar(100) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `status` enum('Approve','Tolak','Pending','') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_pengajuan_kegiatan` (`id_pengajuan`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

/*Data for the table `approval_kegiatan` */

insert  into `approval_kegiatan`(`id`,`id_pengajuan`,`nama_ormawa`,`kegiatan`,`id_kemahasiswaan`,`nama_kemahasiswaan`,`catatan`,`status`) values 
(4,1237935209,'shinbun','Summon_Satan','10101010','mamang',' ','Approve'),
(5,1756837193,'shinbun','Belajar Bostrap','10101010','mamang',' ','Approve'),
(6,695748027,'shinbun','Testingas',NULL,NULL,NULL,'Pending'),
(8,1606381653,'robotika','gundam',NULL,NULL,NULL,'Pending');

/*Table structure for table `approval_lpj` */

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
  `Kegiatan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_APPROVALLPJ`),
  KEY `WKIII_MENGECEK_LPJ_FK` (`NIDN_WKIII`),
  KEY `KEMAHASISWAAN_MENGECEKLPJ_FK` (`NIDN_KEMAHASISWAAN`),
  KEY `FK_BK` (`ID_BK`),
  KEY `FK_P` (`NIDN`),
  KEY `FK_Ormawa_lPJ` (`ORMAWA`),
  KEY `MILIK_KEGIATAN_FK` (`Kegiatan`),
  CONSTRAINT `FK_BK` FOREIGN KEY (`ID_BK`) REFERENCES `bukti_kegiatan` (`ID_BUKTIKEGIATAN`),
  CONSTRAINT `FK_KEMAHASISWAAN_MENGECEKLPJ` FOREIGN KEY (`NIDN_KEMAHASISWAAN`) REFERENCES `kemahasiswaan` (`NIDN_KEMAHASISWAAN`),
  CONSTRAINT `FK_Kegiatan` FOREIGN KEY (`Kegiatan`) REFERENCES `pengajuan_kegiatan` (`ID_PENGAJUAN`),
  CONSTRAINT `FK_LPJ_ORMAWA` FOREIGN KEY (`ORMAWA`) REFERENCES `ormawa` (`ID_ORMAWA`),
  CONSTRAINT `FK_P` FOREIGN KEY (`NIDN`) REFERENCES `pembina` (`NIDN`),
  CONSTRAINT `FK_WKIII_MENGECEK_LPJ` FOREIGN KEY (`NIDN_WKIII`) REFERENCES `wkiii` (`NIDN_WKIII`),
  CONSTRAINT `MILIK_KEGIATAN_FK` FOREIGN KEY (`Kegiatan`) REFERENCES `pengajuan_kegiatan` (`ID_PENGAJUAN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `approval_lpj` */

insert  into `approval_lpj`(`ID_APPROVALLPJ`,`NIDN_WKIII`,`NIDN_KEMAHASISWAAN`,`APPROVAL_LPJ_KEMAHASISWAAN`,`APPROVAL_LPJ_WKIII`,`LAPORAN_LPJ`,`REVISI_LPJ`,`ID_BK`,`NIDN`,`ALP`,`ORMAWA`,`Kegiatan`) values 
('1036867858','202020','10101010','Approve','Approve','1642306176_Tugas 2.docx',NULL,'2062928425',202020,'Approve','1493474770',' 973 '),
('1047944703','202020','10101010','Approve','Approve','1639197193_18101028-IPutuMellanaAriArtawan-HCI-Rangkum model dialog.docx','1639203626_18101028-IPutuMellanaAriArtawan-Interpersonal_Skill-Pertemuan_12.docx','1588414891',1,'Unapproved',NULL,NULL),
('1350054836','202020','10101010','Approve','Approve','1642237649_Task Meeting 10.docx',NULL,'2094307256',202020,'Approve','1493474770',NULL),
('1857137277','202020','10101010','Approve','Approve','1639197193_18101028-IPutuMellanaAriArtawan-HCI-Rangkum model dialog.docx',NULL,'1186903940',NULL,NULL,NULL,NULL),
('1931024228','202020','10101010','Approve','Approve','1642307671_Tugas 4.docx',NULL,'1301197952',202020,'Approve','1493474770',' 262 '),
('309887079','202020','10101010','Approve','Approve','1640341494_26-2020-Implementasi-Deep-Learning-webinar3.pdf',NULL,'1786073396',1,'Approve',NULL,NULL),
('510212049','202020','10101010','Approve','Approve','1642306861_Ujian Akhir Semester_ Etika Profesi_18101020.docx',NULL,'1689878362',202020,'Approve','1493474770',' 616 '),
('709843028',NULL,NULL,NULL,NULL,'1640342879_397-Article Text-846-2-10-20200415.pdf',NULL,'2110468124',NULL,NULL,NULL,NULL),
('884242751','202020','10101010','Approve','Approve','1642265685_Pertemuan 4 Hasil Dan Pembahasan.docx',NULL,'1451047430',202020,'Approve','1493474770',' 630 ');

/*Table structure for table `approval_pernyataan_kegiatan` */

DROP TABLE IF EXISTS `approval_pernyataan_kegiatan`;

CREATE TABLE `approval_pernyataan_kegiatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_pernyatan` int(11) NOT NULL,
  `nama_ormawa` varchar(100) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `id_kemahasiswaan` varchar(100) DEFAULT NULL,
  `nama_kemahasiswaan` varchar(100) DEFAULT NULL,
  `catatan` text DEFAULT NULL,
  `status` enum('Approve','Tidak','Pending','') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

/*Data for the table `approval_pernyataan_kegiatan` */

insert  into `approval_pernyataan_kegiatan`(`id`,`id_pernyatan`,`nama_ormawa`,`nama_kegiatan`,`id_kemahasiswaan`,`nama_kemahasiswaan`,`catatan`,`status`) values 
(1,11227398,'shinbun','Cara jadi Wibu','10101010','mamang',' ','Approve'),
(2,267450824,'shinbun','Makan Makan',NULL,NULL,NULL,'Pending'),
(3,939745536,'robotika','naruto run',NULL,NULL,NULL,'Pending'),
(4,1734660435,'robotika','jalan rengas',NULL,NULL,NULL,'Pending'),
(5,1482523592,'robotika','jalan kayang',NULL,NULL,NULL,'Tidak'),
(7,718962446,'robotika','jalan melayang',NULL,NULL,NULL,'Tidak');

/*Table structure for table `approval_proposal` */

DROP TABLE IF EXISTS `approval_proposal`;

CREATE TABLE `approval_proposal` (
  `ID_APPROVAL` varchar(100) NOT NULL,
  `NIDN_WKIII` varchar(100) DEFAULT NULL,
  `NIDN_KEMAHASISWAAN` varchar(100) DEFAULT NULL,
  `APPROVAL_PROPOSAL_KEMAHASISWAAN` varchar(100) DEFAULT NULL,
  `APPROVAL_PROPOSAL_WKIII` varchar(100) DEFAULT NULL,
  `LAPORAN_PROPOSAL` mediumtext DEFAULT NULL,
  `REVISI` mediumtext DEFAULT NULL,
  `NIDN` int(100) DEFAULT NULL,
  `APP` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_APPROVAL`),
  KEY `WKIII_MENGECAKPROPOSAL_FK` (`NIDN_WKIII`),
  KEY `KEMAHASISWAAN_MENGECEK_PROPOSAL_FK` (`NIDN_KEMAHASISWAAN`),
  KEY `FK_PEMBINA` (`NIDN`),
  CONSTRAINT `FK_KEMAHASISWAAN_MENGECEK_PROPOSAL` FOREIGN KEY (`NIDN_KEMAHASISWAAN`) REFERENCES `kemahasiswaan` (`NIDN_KEMAHASISWAAN`),
  CONSTRAINT `FK_PEMBINA` FOREIGN KEY (`NIDN`) REFERENCES `pembina` (`NIDN`),
  CONSTRAINT `FK_WKIII_MENGECAKPROPOSAL` FOREIGN KEY (`NIDN_WKIII`) REFERENCES `wkiii` (`NIDN_WKIII`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `approval_proposal` */

insert  into `approval_proposal`(`ID_APPROVAL`,`NIDN_WKIII`,`NIDN_KEMAHASISWAAN`,`APPROVAL_PROPOSAL_KEMAHASISWAAN`,`APPROVAL_PROPOSAL_WKIII`,`LAPORAN_PROPOSAL`,`REVISI`,`NIDN`,`APP`) values 
('1012122540','202020','10101010',NULL,'Approve','1639077593_18101028-IPutuMellanaAriArtawan-ParBud-UAS.docx','1640339114_327-Article Text-596-1-10-20160611 (1).pdf',1,'Approve'),
('1124969242','202020','10101010','Approve','Approve','1639077593_18101028-IPutuMellanaAriArtawan-ParBud-UAS.docx','1639132431_18101028-IPutuMellanaAriArtawan-HCI_AC-Tugas GUI.pdf',1,'Approve'),
('1465410095','202020','10101010','Approve','Approve','1639077593_18101028-IPutuMellanaAriArtawan-ParBud-UAS.docx',NULL,1,'Approve'),
('1659551858','202020','10101010','Approve','Approve','1642307220_UTS ETIKA PROFESI - I Wayan Arya Pratama Putra.docx',NULL,202020,'Approve'),
('1902510148','202020','10101010','Approve','Approve','1642262771_Pertemuan 4 Hasil Dan Pembahasan.docx',NULL,202020,'Approve'),
('1974114294',NULL,'10101010','Approve',NULL,'1642307784_Ujian Akhir Semester_ Etika Profesi_18101020.docx',NULL,202020,'Approve'),
('2101566727','202020','10101010','Approve','Approve','1642231369_Task Meeting 10.docx',NULL,202020,'Approve'),
('23258801','202020','10101010','Approve','Approve','1639078392_18101028-IPutuMellanaAriArtawan-Interpersonal_Skill-Proaktif1.docx',NULL,NULL,NULL),
('283425815','202020','10101010',NULL,NULL,'1639074109_Untitled.pdf',NULL,NULL,NULL),
('385867533','202020','10101010','Approve','Approve','1642306708_Kelas Tambahan Pertemuan 7.docx',NULL,202020,'Approve'),
('785863487','202020','10101010','Approve','Approve','1642303784_Quis 2_ I Wayan Arya Pratama Putra.docx',NULL,202020,'Approve');

/*Table structure for table `bk` */

DROP TABLE IF EXISTS `bk`;

CREATE TABLE `bk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idpk` int(11) DEFAULT NULL,
  `bk` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pk&bk` (`idpk`),
  CONSTRAINT `pk&bk` FOREIGN KEY (`idpk`) REFERENCES `pengajuan_kegiatan_mhs` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `bk` */

/*Table structure for table `bukti_kegiatan` */

DROP TABLE IF EXISTS `bukti_kegiatan`;

CREATE TABLE `bukti_kegiatan` (
  `ID_BUKTIKEGIATAN` varchar(100) NOT NULL,
  `ID_PROPOSAL` varchar(100) DEFAULT NULL,
  `BERITA_ACARA` date DEFAULT NULL,
  `ABSENSI_BK` mediumtext DEFAULT NULL,
  `DOKUMENTASI` mediumtext DEFAULT NULL,
  `DOKUMENTASI2` mediumtext DEFAULT NULL,
  `DOKUMENTASI3` mediumtext DEFAULT NULL,
  `SERTIFIKAT` mediumtext DEFAULT NULL,
  PRIMARY KEY (`ID_BUKTIKEGIATAN`),
  KEY `TERDAPAT_FK` (`ID_PROPOSAL`),
  CONSTRAINT `FK_Terdapat_ID_Proposal` FOREIGN KEY (`ID_PROPOSAL`) REFERENCES `proposal` (`ID_PROPOSAL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `bukti_kegiatan` */

insert  into `bukti_kegiatan`(`ID_BUKTIKEGIATAN`,`ID_PROPOSAL`,`BERITA_ACARA`,`ABSENSI_BK`,`DOKUMENTASI`,`DOKUMENTASI2`,`DOKUMENTASI3`,`SERTIFIKAT`) values 
('1186903940',NULL,NULL,'1639887184_Sertifikasi.pdf','1639887184_Sertifikasi.pdf',NULL,NULL,'1639887184_Sertifikasi.pdf'),
('1301197952',NULL,NULL,'1642307680_Tugas 1.docx','1642307680_Tugas 4.docx',NULL,NULL,'1642307680_UTS ETIKA PROFESI - I Wayan Arya Pratama Putra.docx'),
('1451047430',NULL,NULL,'1642271242_Laporan Seminar_18101010_Luh Sri Wahyuni.pdf','1642271242_TUGAS DH- 6 januari 2022 (1).pdf',NULL,NULL,'1642271242_Laporan Seminar_18101010_Luh Sri Wahyuni.pdf'),
('1588414891',NULL,NULL,'1639220419_18101028-IPutuMellanaAriArtawan-HCI_AC-Tugas_8_Golden_rulesdocx.pdf','1639220419_18101028-IPutuMellanaAriArtawan-Interpersonal_Skill-Proaktif1.pdf',NULL,NULL,'1639220419_18101028-IPutuMellanaAriArtawan-Interpersonal_Skill-Proaktif1.pdf'),
('1689878362',NULL,NULL,'1642306870_UTS ETIKA PROFESI - I Wayan Arya Pratama Putra.docx','1642306870_Tugas 2.docx',NULL,NULL,'1642306870_Quis 2_ I Wayan Arya Pratama Putra.docx'),
('1786073396',NULL,NULL,'1640342632_12. Prosiding Ryan Hernawan-OK.pdf','1640342632_14976-19507-2-PB (2).pdf',NULL,NULL,'1640342632_26-2020-Implementasi-Deep-Learning-webinar3.pdf'),
('2062928425',NULL,NULL,'1642306189_Quis 2_ I Wayan Arya Pratama Putra.docx','1642306189_Tugas 2.docx',NULL,NULL,'1642306189_UTS ETIKA PROFESI - I Wayan Arya Pratama Putra.docx'),
('2094307256',NULL,NULL,'1642237780_598-1127-1-SM.pdf','1642237780_Modul Dasar-Dasar Pemrograman S1 2016.pdf',NULL,NULL,'1642237780_TUGAS DH- 6 januari 2022 (1).pdf'),
('2110468124',NULL,NULL,'1640342963_1lW8X2bgFrz2eqLZnv5kyY5U9kAEj0KXnwYe5S2t.docx','1640342963_397-Article Text-846-2-10-20200415.pdf',NULL,NULL,'1640342963_14976-19507-2-PB (1).pdf');

/*Table structure for table `bukti_kegiatan_mahasiswa` */

DROP TABLE IF EXISTS `bukti_kegiatan_mahasiswa`;

CREATE TABLE `bukti_kegiatan_mahasiswa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kegiatan` int(11) NOT NULL,
  `nama_kegiatan` varchar(100) NOT NULL,
  `bukti` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

/*Data for the table `bukti_kegiatan_mahasiswa` */

insert  into `bukti_kegiatan_mahasiswa`(`id`,`id_kegiatan`,`nama_kegiatan`,`bukti`) values 
(1,1,'sumo','1642465978_.pdf');

/*Table structure for table `cetak` */

DROP TABLE IF EXISTS `cetak`;

CREATE TABLE `cetak` (
  `id_cetak` int(10) NOT NULL,
  `NAMA_KEGIATAN` varchar(100) NOT NULL,
  `TANGGAL_KEGIATAN` varchar(100) NOT NULL,
  `TEMPAT_KEGIATAN` varchar(100) NOT NULL,
  `PENYELENGGARA` varchar(100) NOT NULL,
  `ABSENSI` varchar(100) NOT NULL,
  `BERITA_ACARA KEGIATAN` varchar(100) NOT NULL,
  `LPJ` varchar(100) NOT NULL,
  PRIMARY KEY (`id_cetak`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `cetak` */

insert  into `cetak`(`id_cetak`,`NAMA_KEGIATAN`,`TANGGAL_KEGIATAN`,`TEMPAT_KEGIATAN`,`PENYELENGGARA`,`ABSENSI`,`BERITA_ACARA KEGIATAN`,`LPJ`) values 
(1,'Esport','01 januari 2021','Stiki','E-Sport','Ada','Ada','Ada');

/*Table structure for table `kemahasiswaan` */

DROP TABLE IF EXISTS `kemahasiswaan`;

CREATE TABLE `kemahasiswaan` (
  `NIDN_KEMAHASISWAAN` varchar(100) NOT NULL,
  `NAMA_KEMAHASISWAAN` varchar(100) DEFAULT NULL,
  `JABATAN_KEMAHASISWAAN` varchar(100) DEFAULT NULL,
  `PASSWORD_KEMAHASISWAAN` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`NIDN_KEMAHASISWAAN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `kemahasiswaan` */

insert  into `kemahasiswaan`(`NIDN_KEMAHASISWAAN`,`NAMA_KEMAHASISWAAN`,`JABATAN_KEMAHASISWAAN`,`PASSWORD_KEMAHASISWAAN`) values 
('10101010','mamang','ketua','$2y$10$GIMuWTIVta/oaKk29y0sX.eIJHS2TRNJhOzggG6rCJcGr.gjE8p02');

/*Table structure for table `laporan` */

DROP TABLE IF EXISTS `laporan`;

CREATE TABLE `laporan` (
  `ID_LAPORAN` varchar(100) NOT NULL,
  `ID_PENGAJUAN` varchar(100) DEFAULT NULL,
  `TANGGAL` date DEFAULT NULL,
  PRIMARY KEY (`ID_LAPORAN`),
  KEY `MENGHASILKAN_FK` (`ID_PENGAJUAN`),
  CONSTRAINT `FK_Memerluakan_Pengajuan` FOREIGN KEY (`ID_PENGAJUAN`) REFERENCES `pengajuan_kegiatan` (`ID_PENGAJUAN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `laporan` */

/*Table structure for table `lpj` */

DROP TABLE IF EXISTS `lpj`;

CREATE TABLE `lpj` (
  `ID_LPJ` varchar(100) NOT NULL,
  `ID_APPROVALLPJ` varchar(100) DEFAULT NULL,
  `ID_BUKTIKEGIATAN` varchar(100) DEFAULT NULL,
  `TGL_PENGAJUANLPJ` date DEFAULT NULL,
  `LPJ` mediumtext DEFAULT NULL,
  PRIMARY KEY (`ID_LPJ`),
  KEY `MENGELUARKAN_FK` (`ID_BUKTIKEGIATAN`),
  KEY `MENGHASILKANLPJ_FK` (`ID_APPROVALLPJ`),
  CONSTRAINT `FK_memerlukan _bukti_kegiatan` FOREIGN KEY (`ID_BUKTIKEGIATAN`) REFERENCES `bukti_kegiatan` (`ID_BUKTIKEGIATAN`),
  CONSTRAINT `FK_menghasilkan_LPJ` FOREIGN KEY (`ID_APPROVALLPJ`) REFERENCES `approval_lpj` (`ID_APPROVALLPJ`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `lpj` */

insert  into `lpj`(`ID_LPJ`,`ID_APPROVALLPJ`,`ID_BUKTIKEGIATAN`,`TGL_PENGAJUANLPJ`,`LPJ`) values 
('1178920230','1350054836','2094307256','2022-01-15',NULL),
('1426685516','309887079','1786073396','2022-01-16',NULL),
('1593945252','884242751','1451047430','2022-01-15',NULL),
('1924144729','1047944703','1588414891','2021-12-24',NULL),
('2114847557','1036867858','2062928425','2022-01-16',NULL),
('413376370','309887079','1786073396','2021-12-24',NULL),
('839330464','1931024228','1301197952','2022-01-16',NULL),
('875718304','1857137277','1186903940','2021-12-19',NULL),
('998003146','510212049','1689878362','2022-01-16',NULL);

/*Table structure for table `ormawa` */

DROP TABLE IF EXISTS `ormawa`;

CREATE TABLE `ormawa` (
  `ID_ORMAWA` varchar(100) NOT NULL,
  `NIDN` int(11) DEFAULT NULL,
  `NAMA_ORMAWA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_ORMAWA`),
  KEY `MEMBINA_FK` (`NIDN`),
  CONSTRAINT `FK_NIDN_pembina` FOREIGN KEY (`NIDN`) REFERENCES `pembina` (`NIDN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `ormawa` */

insert  into `ormawa`(`ID_ORMAWA`,`NIDN`,`NAMA_ORMAWA`) values 
('1493474770',202020,'shinbun'),
('1753732088',18101028,'rare'),
('653546756',10101010,'rujih'),
('87764831',1,'robotika');

/*Table structure for table `pembina` */

DROP TABLE IF EXISTS `pembina`;

CREATE TABLE `pembina` (
  `NIDN` int(11) NOT NULL,
  `NAMA_PEMBINA` varchar(100) DEFAULT NULL,
  `PASSOWRD_PEMBINA` varchar(100) DEFAULT NULL,
  `ALAMAT_PEMBINA` varchar(100) DEFAULT NULL,
  `NO_TELP_PEMBINA` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`NIDN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pembina` */

insert  into `pembina`(`NIDN`,`NAMA_PEMBINA`,`PASSOWRD_PEMBINA`,`ALAMAT_PEMBINA`,`NO_TELP_PEMBINA`) values 
(1,'rudiono','$2y$10$eR87bKQ8mx.2ZmC/5bBjjeHAhzu9DNMqToe4EczkP.O4g.srK7Vjy','pluto','0997878'),
(202020,'arie','$2y$10$P1oh5dR8rCbluZghdOAFoOoqnemIFLsNhqGjk3t0SvsckSyFUJMkm','namek','04525215'),
(10101010,'rosa','$2y$10$MWItlnW0oVlD2HrYnFK/OuDAMvrH4nMBblmEX2hwwmygW16lbx/WG','darat','0525121'),
(18101028,'rika','$2y$10$i39pD8OB0deMuMBx/Okp9Os/biYYBWCRZsiocm2EsHhavBwJ0bS7W','bumi','087678678'),
(20202021,'rikodo','$2y$10$B7ldilVbpq6T0QdQtCgY4eabseUDgeC2eRiMKGSeVjYNIrz6N9T3a','angkasa','08812442');

/*Table structure for table `pengajuan_kegiatan` */

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
  `Date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`ID_PENGAJUAN`),
  KEY `MENGAJUKAN_FK` (`ID_ORMAWA`),
  CONSTRAINT `FK_ID_ORMAWA` FOREIGN KEY (`ID_ORMAWA`) REFERENCES `ormawa` (`ID_ORMAWA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pengajuan_kegiatan` */

insert  into `pengajuan_kegiatan`(`ID_PENGAJUAN`,`ID_ORMAWA`,`NAMA_ORMAWA_FK`,`NAMA_KEGIATAN`,`KONSEP_KEGIATAN`,`SUB_KEGIATAN`,`PJ_KEGIATAN`,`LATAR_BELAKANG`,`TUJUAN_KEGIATAN`,`TGL_KEGIATAN`,`TEMPAT_KEGIATAN`,`SK_KEPANITIAAN`,`TIMELINE_KEGIATAN`,`RAB`,`KETUA_PANITIA`,`CONTAC_PERSON`,`KATEGORI_KEGIATAN`,`STATUS`,`Date`) values 
('',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-12-23',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2022-01-16 00:00:00'),
(' 262 ','1493474770','shinbun','dasdasdsa','1554902866_Quis 2_ I Wayan Arya Pratama Putra.docx','2047670941_Tugas 4.docx','qwe','1349340825_Tugas 4.docx','779672157_Tugas 4.docx','2022-01-12','eqwewq','1461982127_UTS ETIKA PROFESI - I Wayan Arya Pratama Putra.docx','206411701_Ujian Akhir Semester_ Etika Profesi_18101020.docx','1248811450_Ujian Akhir Semester_ Etika Profesi_18101020.docx','bagas','asdasdas','qweqweqwweq','Approve','2022-01-16 05:22:39'),
(' 514 ','1493474770','shinbun','rtrrertertertertert','206065752_Assignment 15.docx','1661353080_Task Meeting 10.docx','sdfsfs','1206924603_Task Meeting 10.docx','999806996_Task meeting 3.docx','2022-01-14','adasdas','1245960546_Assignment 15.docx','249933003_Task meeting 3.docx','1682809631_Task meeting 3.docx','bagas','534543','sdfsdfsd','Approve','2018-01-18 00:00:00'),
(' 611 ','87764831','robotika','sumo','408735357_Task Meeting 3.docx','284789562_Task Meeting 3.docx','arwan','1689966438_Task Meeting 3.docx','1822979152_Task Meeting 3.docx','2021-06-01','lipo mall','976828388_Task Meeting 3.docx','1803421307_Task Meeting 3.docx','77666209_Task Meeting 3.docx','rikodo','0882421421424','kompetesi','Approve','2022-01-16 00:00:00'),
(' 616 ','1493474770','shinbun','Hangout Event On Sunday','1200132700_UTS ETIKA PROFESI - I Wayan Arya Pratama Putra.docx','1658457420_UTS ETIKA PROFESI - I Wayan Arya Pratama Putra.docx','wqe','1680397998_UTS ETIKA PROFESI - I Wayan Arya Pratama Putra.docx','572734361_Tugas 4.docx','2022-01-25','ewrwerw','1336037171_Ujian Akhir Semester_ Etika Profesi_18101020.docx','171290778_UTS ETIKA PROFESI - I Wayan Arya Pratama Putra.docx','1839802373_UTS ETIKA PROFESI - I Wayan Arya Pratama Putra.docx','bagas','3453453','ert','Approve','2022-01-16 05:17:18'),
(' 630 ','1493474770','shinbun','iuouioiuui','1315709158_Kelas Tambahan Pertemuan 7.docx','85082822_UTS ETIKA PROFESI - I Wayan Arya Pratama Putra.docx','dfgdfgd','1708877112_UTS ETIKA PROFESI - I Wayan Arya Pratama Putra.docx','8841870_Tugas 1.docx','2022-01-14','weew','816035299_UTS ETIKA PROFESI - I Wayan Arya Pratama Putra.docx','232433204_Tugas 1.docx','1462656485_Tugas 1.docx','bagas','312312312','qweqweqw','Approve','2022-01-16 00:00:00'),
(' 696 ','1493474770','shinbun','Testing Kegiatan V2','1439536242_Kelas Tambahan Pertemuan 7.docx','1856368134_Tugas 2.docx','sadasda','1222302841_Tugas 2.docx','210628221_Tugas 2.docx','2022-01-17','sda','483520752_Ujian Akhir Semester_ Etika Profesi_18101020.docx','884488259_UTS ETIKA PROFESI - I Wayan Arya Pratama Putra.docx','1463457932_Tugas 4.docx','bagas','345345','qweqweqwqwe','Approve','2022-01-16 05:35:46'),
(' 782 ','87764831','robotika','Line follower','1598036686_Task Meeting 3.docx','2152204_Task Meeting 3.docx','arwan','113270015_Task Meeting 3.docx','1687050300_Task Meeting 3.docx','2021-05-01','lipo mall','1255386758_Task Meeting 3.docx','452848719_Task Meeting 3.docx','1287706581_Task Meeting 3.docx','rikodo','08824214214','kompetesi','Approve','2022-01-16 00:00:00'),
(' 794 ','1493474770','shinbun','asdda2342342','473212745_Digital_heritage_in_general.docx','269744359_Digital_heritage_in_general.docx','123','2088434143_Digital_heritage_in_general.docx','1081930869_Digital_heritage_in_general.docx','2022-01-18','qweqw','2016867798_Digital_heritage_in_general.docx','1495426432_Digital_heritage_in_general.docx','1492974364_DH_1.docx','bagas','qweqweq','qwewqe','Belum Diterima','2022-01-15 19:56:06'),
(' 973 ','1493474770','shinbun','rtyrrtyrty','785733238_DH_1.docx','1934986370_Green_IT_Essay_-_Rizky_Andita_-_18101177.docx','ghfgh','1583340765_Green_IT_Essay_-_Rizky_Andita_-_18101177.docx','2006100288_Green_IT_Essay_-_Rizky_Andita_-_18101177.docx','2022-01-17','erterertre','122754688_Digital_heritage_in_general.docx','1298932139_Digital_heritage_in_general.docx','1424411098_Green_IT_Essay_-_Rizky_Andita_-_18101177.docx','bagas','dertert','ertertererewr','Approve','2022-01-16 02:30:04'),
('333','1753732088','UMA','WWA',NULL,NULL,NULL,NULL,NULL,'2021-12-24',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Belum Diterima','2022-01-16 00:00:00'),
('777','87764831','robotika','Robotech','fsaf','sfasf',NULL,NULL,NULL,'2021-07-01','sdsaf','sfafsf','sfsfasf','sfasf','sfaf','fsfa','fsf','Approve','2022-01-16 00:00:00'),
('888','87764831','BADMINTO','Badminton cup',NULL,NULL,NULL,NULL,NULL,'2021-05-01',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Approve','2022-01-16 00:00:00');

/*Table structure for table `pengajuan_kegiatan_mhs` */

DROP TABLE IF EXISTS `pengajuan_kegiatan_mhs`;

CREATE TABLE `pengajuan_kegiatan_mhs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `softcopy_proposal` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_kegiatan_darai_ormawa` (`id_ormawa`),
  CONSTRAINT `FK_kegiatan_darai_ormawa` FOREIGN KEY (`id_ormawa`) REFERENCES `ormawa` (`ID_ORMAWA`)
) ENGINE=InnoDB AUTO_INCREMENT=1606381654 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pengajuan_kegiatan_mhs` */

insert  into `pengajuan_kegiatan_mhs`(`id`,`id_ormawa`,`nama_ormawa`,`nama_kegiatan`,`tema_kegiatan`,`konsep_kegiatan`,`sub_kegiatan`,`pj_kegiatan`,`latar_belakang`,`tujuan_kegiatan`,`hasil_harapan`,`targer_pemasaran`,`Tanggal`,`Waktu`,`Tempat`,`sk_kepanitiaan`,`jadwal_kegiatan`,`rab`,`profile_pengisi_acara`,`desain_poster_sertifikat`,`ketua_panitia`,`contac_person`,`softcopy_proposal`) values 
(1,'87764831','robotika','sumo','kompetisi','','','','','','','','2021-10-01','00:00:17','stiki','','','','','','yoga','087541515',''),
(1606381653,'87764831','robotika','gundam 2','figth godzila 2','oraoraoroaroaroaroaoraoh','arararararasasasas','budiman','gabut sekali ya','mengisi waktu luang nya','untung sekali','orang gabut sekali','2021-12-15','01:15:00','metaverse 2','1714807822_3261-8273-1-PB.pdf','2062514060_3261-8273-1-PB.pdf','1640426380_3261-8273-1-PB.pdf','1698196878_naskah publikasi revisi.pdf','908757658_harris_biases.pdf','rudimon','081868584582','578552009_3261-8273-1-PB.pdf');

/*Table structure for table `pengajuan_lpj` */

DROP TABLE IF EXISTS `pengajuan_lpj`;

CREATE TABLE `pengajuan_lpj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `LPJ` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ormawa_nama` (`id_ormawa`),
  KEY `fk_kegiatan_ormawa` (`id_pengajuan`),
  CONSTRAINT `fk_kegiatan_ormawa` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan_kegiatan_mhs` (`id`),
  CONSTRAINT `fk_ormawa_nama` FOREIGN KEY (`id_ormawa`) REFERENCES `ormawa` (`ID_ORMAWA`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pengajuan_lpj` */

insert  into `pengajuan_lpj`(`id`,`id_ormawa`,`nama_ormawa`,`id_pengajuan`,`nama_kegiatan`,`pendahuluan`,`pelaksanaan_kegaitan`,`kepanitiaan`,`peserta`,`pencapaian`,`rab_masukan`,`rab_pengeluaran`,`realisasi_anggaran`,`penutup`,`bukti_pembayaran`,`berita_acara`,`absensi`,`rapat`,`nilai_peserta`,`desain_sertifikat`,`dokumentasi`,`LPJ`) values 
(2,'87764831','robotika',1,'sumo','sadas','196452097_harris_biases.pdf','1827070646_harris_biases.pdf','196773007_harris_biases.pdf','fsafsaf','1093242820_harris_biases.pdf','1887546681_harris_biases.pdf','346709633_harris_biases.pdf','fsafsaffs','1141067096_harris_biases.pdf','451931478_harris_biases.pdf','627620367_harris_biases.pdf','851552237_harris_biases.pdf','55991005_harris_biases.pdf','1560714772_harris_biases.pdf','176447692_harris_biases.pdf','1620642759_harris_biases.pdf'),
(3,'87764831','robotika',1,'line Follower','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pellentesque pulvinar urna et auctor. Vestibulum eu massa id odio facilisis tristique at eget orci. Vivamus ac consectetur magna, vel finibus neque. Suspendisse a lorem vitae mi tincidunt pellentesque dignissim eget nisl. Nullam magna nunc, volutpat at nunc non, sollicitudin posuere est. Fusce vehicula nisi ac ante fringilla, quis tincidunt diam condimentum. Aenean vitae convallis nisl. Vivamus a eleifend leo. Curabitur accumsan ut sapien sit amet dictum.\r\n\r\nVivamus ultrices felis in sapien convallis pulvinar. Vivamus luctus erat id nulla porttitor aliquam. In eget urna sem. Donec ornare consequat arcu fringilla commodo. Quisque sollicitudin diam nibh, nec varius mauris iaculis non. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aliquam erat volutpat. Curabitur sed est sed purus tristique pretium. Aenean non ipsum purus. In vehicula imperdiet tellus id aliquet. Fusce sed luctus velit. Ut vehicula diam a diam molestie, et imperdiet elit vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse congue vulputate tristique.','2050136046_.pdf','146065598_harris_biases.pdf','543282312_harris_biases.pdf','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pellentesque pulvinar urna et auctor. Vestibulum eu massa id odio facilisis tristique at eget orci. Vivamus ac consectetur magna, vel finibus neque. Suspendisse a lorem vitae mi tincidunt pellentesque dignissim eget nisl. Nullam magna nunc, volutpat at nunc non, sollicitudin posuere est. Fusce vehicula nisi ac ante fringilla, quis tincidunt diam condimentum. Aenean vitae convallis nisl. Vivamus a eleifend leo. Curabitur accumsan ut sapien sit amet dictum.\r\n\r\nVivamus ultrices felis in sapien convallis pulvinar. Vivamus luctus erat id nulla porttitor aliquam. In eget urna sem. Donec ornare consequat arcu fringilla commodo. Quisque sollicitudin diam nibh, nec varius mauris iaculis non. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aliquam erat volutpat. Curabitur sed est sed purus tristique pretium. Aenean non ipsum purus. In vehicula imperdiet tellus id aliquet. Fusce sed luctus velit. Ut vehicula diam a diam molestie, et imperdiet elit vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse congue vulputate tristique.','1552193187_harris_biases.pdf','809637688_harris_biases.pdf','1777036434_harris_biases.pdf','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed pellentesque pulvinar urna et auctor. Vestibulum eu massa id odio facilisis tristique at eget orci. Vivamus ac consectetur magna, vel finibus neque. Suspendisse a lorem vitae mi tincidunt pellentesque dignissim eget nisl. Nullam magna nunc, volutpat at nunc non, sollicitudin posuere est. Fusce vehicula nisi ac ante fringilla, quis tincidunt diam condimentum. Aenean vitae convallis nisl. Vivamus a eleifend leo. Curabitur accumsan ut sapien sit amet dictum.\r\n\r\nVivamus ultrices felis in sapien convallis pulvinar. Vivamus luctus erat id nulla porttitor aliquam. In eget urna sem. Donec ornare consequat arcu fringilla commodo. Quisque sollicitudin diam nibh, nec varius mauris iaculis non. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Aliquam erat volutpat. Curabitur sed est sed purus tristique pretium. Aenean non ipsum purus. In vehicula imperdiet tellus id aliquet. Fusce sed luctus velit. Ut vehicula diam a diam molestie, et imperdiet elit vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Suspendisse congue vulputate tristique.','163924351_harris_biases.pdf','2021968268_harris_biases.pdf','2049469382_harris_biases.pdf','1370826941_harris_biases.pdf','2090254604_harris_biases.pdf','279755776_harris_biases.pdf','1425692776_harris_biases.pdf','1203520600_harris_biases.pdf');

/*Table structure for table `pengumuman` */

DROP TABLE IF EXISTS `pengumuman`;

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pengumuman` text DEFAULT NULL,
  `nidn` varchar(100) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `pengumuman` */

insert  into `pengumuman`(`id`,`pengumuman`,`nidn`,`tgl`) values 
(1,'besok Libur','10101010','2022-01-18'),
(2,'makan?','10101010','2022-01-18');

/*Table structure for table `pengurus_ormawa` */

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
  `GAMBAR_STRUKTUR_ORGANISASI` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`USERNAME_KETUA`),
  KEY `MEMILIKI_FK` (`ID_ORMAWA`),
  CONSTRAINT `FK_ID_ORMAWA_Pengurus` FOREIGN KEY (`ID_ORMAWA`) REFERENCES `ormawa` (`ID_ORMAWA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pengurus_ormawa` */

insert  into `pengurus_ormawa`(`USERNAME_KETUA`,`ID_ORMAWA`,`PASSWORD_KETUA`,`NAMA_KETUA`,`NAMA_WAKIL`,`NAMA_WAKIL2`,`SEKRETARIS1`,`SEKRETARIS2`,`BENDAHARA1`,`BENDAHARA2`,`RENJA`,`AD_ART`,`MASA_JABATAN`,`TAHUN_DILANTIK`,`GAMBAR_STRUKTUR_ORGANISASI`) values 
('bagas','1493474770','$2y$10$vGDokZrmvVMabt5/gqH3o.qQvIsGmqHocEbNmyB1iDXFeYlP2CHry','bagas',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
('riko','87764831','$2y$10$MPjlTqFpssOOJCU/JNgyruoW7Q9Z2MCpB4wimkQtUAh6ZgQJggE6W','rikodo',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `persetujuan_kemahasiswaan` */

DROP TABLE IF EXISTS `persetujuan_kemahasiswaan`;

CREATE TABLE `persetujuan_kemahasiswaan` (
  `id_Persetujuan` varchar(100) NOT NULL,
  `id_pengajuan` varchar(100) NOT NULL,
  `NIDN_kemahsiswaan` varchar(100) NOT NULL,
  `approval_status` enum('Approve','Tolak','','') NOT NULL,
  PRIMARY KEY (`id_Persetujuan`),
  KEY `pengajuan_fk` (`id_pengajuan`),
  KEY `nidn_kemahasiswaan_fk` (`NIDN_kemahsiswaan`),
  CONSTRAINT `nidn_kemahasiswaan_fk` FOREIGN KEY (`NIDN_kemahsiswaan`) REFERENCES `kemahasiswaan` (`NIDN_KEMAHASISWAAN`),
  CONSTRAINT `pengajuan_fk` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan_kegiatan` (`ID_PENGAJUAN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `persetujuan_kemahasiswaan` */

insert  into `persetujuan_kemahasiswaan`(`id_Persetujuan`,`id_pengajuan`,`NIDN_kemahsiswaan`,`approval_status`) values 
('1257502387',' 696','10101010','Approve'),
('1346586907',' 630','10101010','Approve'),
('1464988269',' 973','10101010','Approve'),
('2023888528',' 611','10101010','Approve'),
('23213123','777','10101010','Approve'),
('590446466',' 514','10101010','Approve'),
('690936195',' 262','10101010','Approve');

/*Table structure for table `persetujuan_pembina` */

DROP TABLE IF EXISTS `persetujuan_pembina`;

CREATE TABLE `persetujuan_pembina` (
  `id_Persetujuan` varchar(100) NOT NULL,
  `id_pengajuan` varchar(100) NOT NULL,
  `NIDN_pembina` int(11) NOT NULL,
  `approval_status` enum('Approve','Tolak','','') NOT NULL,
  PRIMARY KEY (`id_Persetujuan`),
  KEY `pengajuan_pembina_fk` (`id_pengajuan`),
  KEY `NIDN_PEMBINA_FK_` (`NIDN_pembina`),
  CONSTRAINT `NIDN_PEMBINA_FK_` FOREIGN KEY (`NIDN_pembina`) REFERENCES `pembina` (`NIDN`),
  CONSTRAINT `pengajuan_pembina_fk` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan_kegiatan` (`ID_PENGAJUAN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `persetujuan_pembina` */

insert  into `persetujuan_pembina`(`id_Persetujuan`,`id_pengajuan`,`NIDN_pembina`,`approval_status`) values 
('1448671901',' 611',1,'Approve'),
('1556988941',' 696',202020,'Approve'),
('1718566278',' 514',202020,'Approve'),
('1805080430',' 630',202020,'Approve'),
('1865759308',' 973',202020,'Approve'),
('65757','777',202020,'Approve'),
('743319756',' 616',202020,'Approve'),
('912751514',' 262',202020,'Approve');

/*Table structure for table `persetujuan_wkiii` */

DROP TABLE IF EXISTS `persetujuan_wkiii`;

CREATE TABLE `persetujuan_wkiii` (
  `id_Persetujuan` varchar(100) NOT NULL,
  `id_pengajuan` varchar(100) NOT NULL,
  `NIDN_WKIII` varchar(100) NOT NULL,
  `approval_status` enum('Approve','Tolak','','') NOT NULL,
  PRIMARY KEY (`id_Persetujuan`),
  KEY `pengajuan_fk_WKIII` (`id_pengajuan`),
  KEY `NIDN_WKIII_FK` (`NIDN_WKIII`),
  CONSTRAINT `NIDN_WKIII_FK` FOREIGN KEY (`NIDN_WKIII`) REFERENCES `wkiii` (`NIDN_WKIII`),
  CONSTRAINT `pengajuan_fk_WKIII` FOREIGN KEY (`id_pengajuan`) REFERENCES `pengajuan_kegiatan` (`ID_PENGAJUAN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `persetujuan_wkiii` */

insert  into `persetujuan_wkiii`(`id_Persetujuan`,`id_pengajuan`,`NIDN_WKIII`,`approval_status`) values 
('1207416269',' 611','202020','Approve'),
('1363760689',' 616','202020','Approve'),
('1685727298',' 262','202020','Approve'),
('2038684167',' 973','202020','Approve'),
('21323','777','202020','Approve'),
('351588887',' 514','202020','Approve'),
('520555280',' 630','202020','Approve'),
('685646233',' 696','202020','Approve');

/*Table structure for table `proposal` */

DROP TABLE IF EXISTS `proposal`;

CREATE TABLE `proposal` (
  `ID_PROPOSAL` varchar(100) NOT NULL,
  `ID_APPROVAL` varchar(100) DEFAULT NULL,
  `ID_PENGAJUAN` varchar(100) DEFAULT NULL,
  `TANNGGAL_PENGAJUANPROPOSAL` date DEFAULT NULL,
  `ABSENSI_PROPOSAL` mediumtext DEFAULT NULL,
  `ID_LPJ` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_PROPOSAL`),
  KEY `MENGHASILKAN_PROPOSAL_FK` (`ID_APPROVAL`),
  KEY `MEMERLUKAN_FK` (`ID_PENGAJUAN`),
  KEY `fk_lpj` (`ID_LPJ`),
  CONSTRAINT `FK_ID_APPROVAL_Proposal` FOREIGN KEY (`ID_APPROVAL`) REFERENCES `approval_proposal` (`ID_APPROVAL`),
  CONSTRAINT `FK_ID_PENGAJUAN_PROPOSAL` FOREIGN KEY (`ID_PENGAJUAN`) REFERENCES `pengajuan_kegiatan` (`ID_PENGAJUAN`),
  CONSTRAINT `fk_lpj` FOREIGN KEY (`ID_LPJ`) REFERENCES `approval_lpj` (`ID_APPROVALLPJ`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `proposal` */

insert  into `proposal`(`ID_PROPOSAL`,`ID_APPROVAL`,`ID_PENGAJUAN`,`TANNGGAL_PENGAJUANPROPOSAL`,`ABSENSI_PROPOSAL`,`ID_LPJ`) values 
('1327682772','1012122540',' 611 ','2021-12-09',NULL,'1047944703'),
('2115357520','1974114294',' 696 ','2022-01-16',NULL,NULL),
('21341231','283425815','333','2021-12-09',NULL,NULL),
('383662818','1124969242','777','2021-12-09',NULL,'309887079'),
('548353470','1902510148',' 630 ','2022-01-15',NULL,'884242751'),
('605944005','1659551858',' 262 ','2022-01-16',NULL,'1931024228'),
('642926363','385867533',' 616 ','2022-01-16',NULL,'510212049'),
('690097689','785863487',' 973 ','2022-01-16',NULL,'1036867858'),
('724843558','23258801','888','2021-12-09',NULL,'1857137277'),
('759838640','2101566727',' 514 ','2022-01-15',NULL,'1350054836'),
('885958765','1465410095',' 782 ','2021-12-09',NULL,'709843028');

/*Table structure for table `status_lpj` */

DROP TABLE IF EXISTS `status_lpj`;

CREATE TABLE `status_lpj` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `KEGIATAN` varchar(100) NOT NULL,
  `ORMAWA` varchar(100) NOT NULL,
  `STATUS` enum('Belum Terkumpul','Sudah Terkumpul','','') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_ORMAWA` (`ORMAWA`),
  KEY `KEGIATAN` (`KEGIATAN`),
  CONSTRAINT `FK_ORMAWA` FOREIGN KEY (`ORMAWA`) REFERENCES `ormawa` (`ID_ORMAWA`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

/*Data for the table `status_lpj` */

insert  into `status_lpj`(`id`,`KEGIATAN`,`ORMAWA`,`STATUS`) values 
(1,'262','1493474770','Belum Terkumpul'),
(2,' 696','1493474770','Belum Terkumpul');

/*Table structure for table `strukturwkiii` */

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
  `gambar_bimbingan_konseling` varchar(100) NOT NULL,
  PRIMARY KEY (`id_struktur`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `strukturwkiii` */

insert  into `strukturwkiii`(`id_struktur`,`Nama_ketua`,`gambar_ketua`,`nama_bid_kemahasiswaan`,`gambar_kemahasiswaan`,`nama_bid_alumni`,`gambar_alumni`,`nama_bid_pusat_karir`,`gambar_pusat_karir`,`Sekretaris_WKIII`,`gambar_sekretaris`,`nama_bimbingan_konseling`,`gambar_bimbingan_konseling`) values 
(1545704652,'ketut','1254480412_pexels-photo-736716.jpeg','Elie',' 1000469715_8-business-woman-girl-png-image.png ','    Sastra','836130666_22392372_0.png','  Lin','960611232_nico-devil-may-cry-5-1w.jpg','Melly',' 1674145974_trish-dmc5-face.jpg ',' Han','  1560616167_alpha-wolf-earl-contehmorgan.jpg');

/*Table structure for table `surat_pernyataan_kegiatan` */

DROP TABLE IF EXISTS `surat_pernyataan_kegiatan`;

CREATE TABLE `surat_pernyataan_kegiatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kegiatan` varchar(100) NOT NULL,
  `surat_pernyataan` text NOT NULL,
  `id_ormawa` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1968124022 DEFAULT CHARSET=utf8mb4;

/*Data for the table `surat_pernyataan_kegiatan` */

insert  into `surat_pernyataan_kegiatan`(`id`,`nama_kegiatan`,`surat_pernyataan`,`id_ormawa`) values 
(1,'lomba badminton','sfasfaf',NULL),
(718962446,'jalan melayang','547083410_177038031.pdf',87764831),
(1482523592,'jalan kayang','413396078_01.60.0064 Satrio Adi Wibowo LAMPIRAN.pdf',87764831),
(1968124021,'jalan salto','277285716_177038031.pdf',87764831);

/*Table structure for table `wkiii` */

DROP TABLE IF EXISTS `wkiii`;

CREATE TABLE `wkiii` (
  `NIDN_WKIII` varchar(100) NOT NULL,
  `NAMA_WKIII` varchar(100) DEFAULT NULL,
  `JABATAN_WKIII` varchar(100) DEFAULT NULL,
  `PASSWORD_WKIII` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`NIDN_WKIII`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `wkiii` */

insert  into `wkiii`(`NIDN_WKIII`,`NAMA_WKIII`,`JABATAN_WKIII`,`PASSWORD_WKIII`) values 
('202020','mamang','dadySguar','$2y$10$cWpWldR6a/zB.sARu5Bu9.2XnsG9pZccCXDnLXcGyR5vuP6pBxA8i');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
