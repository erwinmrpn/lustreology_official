/*
SQLyog Community v13.2.0 (64 bit)
MySQL - 10.4.28-MariaDB : Database - uas_manpro
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`uas_manpro` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `uas_manpro`;

/*Table structure for table `about_us` */

DROP TABLE IF EXISTS `about_us`;

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `judul_panjang` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` longblob DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `about_us` */

insert  into `about_us`(`id`,`id_kategori`,`judul`,`judul_panjang`,`deskripsi`,`gambar`) values 
(2,1,'SIEGA','Sistem Informasi E-Commerce Game Technology AKSI','SIEGA merupakan sebuah singkatan dari beberapa konsentrasi yang ada di Program Studi Sistem Informasi Unika Soegijapranata Semarang yaitu, Sistem Informasi, E-Commerce, Game Technology, dan Akuntansi + Sistem Informasi.\r\n\r\nSIEGA berdiri sejak 11 November 2011 yang didirikan oleh Prof. Dr. Ridwan Sanjaya S.E., S.Kom., MS.IEC. Program Studi Sistem Informasi mendapatkan ijin penyelenggaraan serta akreditasinya melalui SK Menteri Pendidikan dan Kebudayaan RI No. 235/E/O/2013 pada tanggal 25 Juni 2013 dengan akreditasi pertama yaitu C.',NULL),
(4,3,'AKREDITASI','Sistem Informasi E-Commerce Game Technology AKSI',NULL,'1765090053_sertifikat_akreditasi.png');

/*Table structure for table `contact_messages` */

DROP TABLE IF EXISTS `contact_messages`;

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `contact_messages` */

insert  into `contact_messages`(`id`,`fullname`,`email`,`phone`,`message`,`created_at`) values 
(1,'evan','evan@gmail.com','082138539834','selamat pagi testing','2025-12-06 19:55:29'),
(2,'Friend Ship','evansantoso138@gmail.com','+62 821 3853 9834','testing','2025-12-06 20:11:15'),
(3,'Evan SSANTOSO','evansantoso138@gmail.com','+62 821 3853 9834','testing dulu','2025-12-06 20:12:29');

/*Table structure for table `tabel_kategori_about_us` */

DROP TABLE IF EXISTS `tabel_kategori_about_us`;

CREATE TABLE `tabel_kategori_about_us` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(255) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tabel_kategori_about_us` */

insert  into `tabel_kategori_about_us`(`id_kategori`,`kategori`,`time_stamp`) values 
(1,'sejarah SIEGA','2025-12-07 13:02:29'),
(3,'Visi & Misi SIEGA','2025-12-07 13:18:02');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin') DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `user` */

insert  into `user`(`id_user`,`username`,`password`,`role`,`timestamp`) values 
(1,'admin','21232f297a57a5a743894a0e4a801fc3','admin','2025-12-06 19:39:26');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
