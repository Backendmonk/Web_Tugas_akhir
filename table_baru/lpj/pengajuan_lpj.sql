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

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
