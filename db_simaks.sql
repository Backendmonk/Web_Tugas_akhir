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
  PRIMARY KEY (`ID_APPROVALLPJ`),
  KEY `WKIII_MENGECEK_LPJ_FK` (`NIDN_WKIII`),
  KEY `KEMAHASISWAAN_MENGECEKLPJ_FK` (`NIDN_KEMAHASISWAAN`),
  KEY `FK_BK` (`ID_BK`),
  KEY `FK_P` (`NIDN`),
  CONSTRAINT `FK_BK` FOREIGN KEY (`ID_BK`) REFERENCES `bukti_kegiatan` (`ID_BUKTIKEGIATAN`),
  CONSTRAINT `FK_KEMAHASISWAAN_MENGECEKLPJ` FOREIGN KEY (`NIDN_KEMAHASISWAAN`) REFERENCES `kemahasiswaan` (`NIDN_KEMAHASISWAAN`),
  CONSTRAINT `FK_P` FOREIGN KEY (`NIDN`) REFERENCES `pembina` (`NIDN`),
  CONSTRAINT `FK_WKIII_MENGECEK_LPJ` FOREIGN KEY (`NIDN_WKIII`) REFERENCES `wkiii` (`NIDN_WKIII`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `approval_lpj` */

insert  into `approval_lpj`(`ID_APPROVALLPJ`,`NIDN_WKIII`,`NIDN_KEMAHASISWAAN`,`APPROVAL_LPJ_KEMAHASISWAAN`,`APPROVAL_LPJ_WKIII`,`LAPORAN_LPJ`,`REVISI_LPJ`,`ID_BK`,`NIDN`,`ALP`) values 
('1047944703','202020','10101010','Approve','Approve','1639197193_18101028-IPutuMellanaAriArtawan-HCI-Rangkum model dialog.docx','1639203626_18101028-IPutuMellanaAriArtawan-Interpersonal_Skill-Pertemuan_12.docx','1588414891',1,'Unapproved'),
('1857137277','202020','10101010','Approve','Approve','1639197193_18101028-IPutuMellanaAriArtawan-HCI-Rangkum model dialog.docx',NULL,'1186903940',NULL,NULL),
('309887079','202020','10101010','Approve',NULL,'1640341494_26-2020-Implementasi-Deep-Learning-webinar3.pdf',NULL,'1786073396',1,'Approve'),
('709843028',NULL,NULL,NULL,NULL,'1640342879_397-Article Text-846-2-10-20200415.pdf',NULL,'2110468124',NULL,NULL);

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
('23258801','202020','10101010','Approve','Approve','1639078392_18101028-IPutuMellanaAriArtawan-Interpersonal_Skill-Proaktif1.docx',NULL,NULL,NULL),
('283425815','202020','10101010',NULL,NULL,'1639074109_Untitled.pdf',NULL,NULL,NULL);

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
('1588414891',NULL,NULL,'1639220419_18101028-IPutuMellanaAriArtawan-HCI_AC-Tugas_8_Golden_rulesdocx.pdf','1639220419_18101028-IPutuMellanaAriArtawan-Interpersonal_Skill-Proaktif1.pdf',NULL,NULL,'1639220419_18101028-IPutuMellanaAriArtawan-Interpersonal_Skill-Proaktif1.pdf'),
('1786073396',NULL,NULL,'1640342632_12. Prosiding Ryan Hernawan-OK.pdf','1640342632_14976-19507-2-PB (2).pdf',NULL,NULL,'1640342632_26-2020-Implementasi-Deep-Learning-webinar3.pdf'),
('2110468124',NULL,NULL,'1640342963_1lW8X2bgFrz2eqLZnv5kyY5U9kAEj0KXnwYe5S2t.docx','1640342963_397-Article Text-846-2-10-20200415.pdf',NULL,NULL,'1640342963_14976-19507-2-PB (1).pdf');

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
('1924144729','1047944703','1588414891','2021-12-24',NULL),
('413376370','309887079','1786073396','2021-12-24',NULL),
('875718304','1857137277','1186903940','2021-12-19',NULL);

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
  PRIMARY KEY (`ID_PENGAJUAN`),
  KEY `MENGAJUKAN_FK` (`ID_ORMAWA`),
  CONSTRAINT `FK_ID_ORMAWA` FOREIGN KEY (`ID_ORMAWA`) REFERENCES `ormawa` (`ID_ORMAWA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pengajuan_kegiatan` */

insert  into `pengajuan_kegiatan`(`ID_PENGAJUAN`,`ID_ORMAWA`,`NAMA_ORMAWA_FK`,`NAMA_KEGIATAN`,`KONSEP_KEGIATAN`,`SUB_KEGIATAN`,`PJ_KEGIATAN`,`LATAR_BELAKANG`,`TUJUAN_KEGIATAN`,`TGL_KEGIATAN`,`TEMPAT_KEGIATAN`,`SK_KEPANITIAAN`,`TIMELINE_KEGIATAN`,`RAB`,`KETUA_PANITIA`,`CONTAC_PERSON`,`KATEGORI_KEGIATAN`,`STATUS`) values 
('',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2021-12-23',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(' 611 ','87764831','robotika','sumo','408735357_Task Meeting 3.docx','284789562_Task Meeting 3.docx','arwan','1689966438_Task Meeting 3.docx','1822979152_Task Meeting 3.docx','2021-06-01','lipo mall','976828388_Task Meeting 3.docx','1803421307_Task Meeting 3.docx','77666209_Task Meeting 3.docx','rikodo','0882421421424','kompetesi','Approve'),
(' 782 ','87764831','robotika','Line follower','1598036686_Task Meeting 3.docx','2152204_Task Meeting 3.docx','arwan','113270015_Task Meeting 3.docx','1687050300_Task Meeting 3.docx','2021-05-01','lipo mall','1255386758_Task Meeting 3.docx','452848719_Task Meeting 3.docx','1287706581_Task Meeting 3.docx','rikodo','08824214214','kompetesi','Approve'),
('333','1753732088','UMA','WWA',NULL,NULL,NULL,NULL,NULL,'2021-12-24',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
('777','87764831','robotika','Robotech','fsaf','sfasf',NULL,NULL,NULL,'2021-07-01','sdsaf','sfafsf','sfsfasf','sfasf','sfaf','fsfa','fsf','Approve'),
('888','87764831','BADMINTO','Badminton cup',NULL,NULL,NULL,NULL,NULL,'2021-05-01',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Approve');

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
('2023888528',' 611','10101010','Approve'),
('23213123','777','10101010','Approve');

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
('65757','777',202020,'Approve');

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
('21323','777','202020','Approve');

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
('21341231','283425815','333','2021-12-09',NULL,NULL),
('383662818','1124969242','777','2021-12-09',NULL,'309887079'),
('724843558','23258801','888','2021-12-09',NULL,'1857137277'),
('885958765','1465410095',' 782 ','2021-12-09',NULL,'709843028');

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
