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

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
