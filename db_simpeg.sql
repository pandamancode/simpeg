/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.13-MariaDB : Database - db_simpeg
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_simpeg` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_simpeg`;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(4,'2014_10_12_000000_create_users_table',1),
(5,'2014_10_12_100000_create_password_resets_table',1),
(6,'2019_08_19_000000_create_failed_jobs_table',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

insert  into `password_resets`(`email`,`token`,`created_at`) values 
('thonie.chopper@gmail.com','$2y$10$//LFaB64klIwlwvOpF/j/.lVSQjsUuHH2CZtpfGWXiO/KOJUpsLZm','2020-07-14 07:53:08');

/*Table structure for table `tb_honor` */

DROP TABLE IF EXISTS `tb_honor`;

CREATE TABLE `tb_honor` (
  `id_honor` int(11) NOT NULL AUTO_INCREMENT,
  `bidang_kerja` enum('Direktur','Bendahara','HRD','Satpam','Driver','Cleaning Service','Parkir') DEFAULT NULL,
  `gapok` double NOT NULL DEFAULT 0,
  `tunjangan` double NOT NULL DEFAULT 0,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_honor`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_honor` */

insert  into `tb_honor`(`id_honor`,`bidang_kerja`,`gapok`,`tunjangan`,`updated_at`,`created_at`) values 
(1,'Satpam',1800000,400000,'2020-07-18 02:26:30','2020-07-13 08:15:41'),
(2,'Bendahara',1231,67676,'2020-07-13 08:23:32','2020-07-13 08:23:32');

/*Table structure for table `tb_mitra` */

DROP TABLE IF EXISTS `tb_mitra`;

CREATE TABLE `tb_mitra` (
  `id_mitra` int(11) NOT NULL AUTO_INCREMENT,
  `nama_mitra` varchar(100) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `telp` varchar(25) DEFAULT NULL,
  `jenis_perusahaan` text DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_mitra`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_mitra` */

insert  into `tb_mitra`(`id_mitra`,`nama_mitra`,`alamat`,`telp`,`jenis_perusahaan`,`updated_at`,`created_at`) values 
(1,'Prudential','Jalan ABCD','08123718738','ASURANSI','2020-07-13 02:10:32','2020-07-13 02:07:29'),
(3,'Teknokrat','jl. zainal abidin pagaralam no 9-11','072184738','PENDIDIKAN','2020-07-20 02:44:07','2020-07-20 02:44:07');

/*Table structure for table `tb_pegawai` */

DROP TABLE IF EXISTS `tb_pegawai`;

CREATE TABLE `tb_pegawai` (
  `nik` varchar(20) NOT NULL,
  `nama_pegawai` varchar(50) DEFAULT NULL,
  `jk` enum('L','P') DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `bidang_kerja` enum('Direktur','Bendahara','HRD','Satpam','Driver','Cleaning Service','Parkir') DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  PRIMARY KEY (`nik`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_pegawai` */

insert  into `tb_pegawai`(`nik`,`nama_pegawai`,`jk`,`tempat_lahir`,`tanggal_lahir`,`no_telp`,`alamat`,`bidang_kerja`,`foto`,`updated_at`,`created_at`) values 
('10312148','thonie chopper','L','Adf','2020-07-10','082372799157','Natar','Satpam','images/10312148.jpg','2020-07-17 09:01:47','2020-07-17 16:01:47'),
('354343','Ucup','L','dsfsf','2020-07-30','34534','dsfdsf','Satpam','images/354343.jpg','2020-07-17 09:12:42','2020-07-17 16:12:42'),
('565656565','Mugiwara','L','lsdfjsk','2020-07-16','56346364','adsfa','Satpam','images/565656565.jpg','2020-07-17 09:07:06','2020-07-17 16:07:06');

/*Table structure for table `tb_penempatan` */

DROP TABLE IF EXISTS `tb_penempatan`;

CREATE TABLE `tb_penempatan` (
  `id_penempatan` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) DEFAULT NULL,
  `id_mitra` int(11) DEFAULT NULL,
  `status` enum('ANGGOTA','KOORDINATOR') DEFAULT NULL,
  `aktif` enum('true','false') DEFAULT 'true',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_penempatan`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_penempatan` */

insert  into `tb_penempatan`(`id_penempatan`,`nik`,`id_mitra`,`status`,`aktif`,`updated_at`,`created_at`) values 
(1,'10312148',1,'KOORDINATOR','true',NULL,NULL),
(2,'354343',1,'ANGGOTA','false','2020-07-20 02:55:46','2020-07-13 07:02:55'),
(4,'565656565',1,'ANGGOTA','false','2020-07-14 07:48:53','2020-07-13 07:53:56'),
(5,'565656565',3,'ANGGOTA','true','2020-07-20 02:44:19','2020-07-20 02:44:19'),
(6,'354343',1,'ANGGOTA','true','2020-09-03 01:30:20','2020-09-03 01:29:56');

/*Table structure for table `tb_penggajian` */

DROP TABLE IF EXISTS `tb_penggajian`;

CREATE TABLE `tb_penggajian` (
  `id_penggajian` int(11) NOT NULL AUTO_INCREMENT,
  `nik` varchar(20) DEFAULT NULL,
  `bulan` varchar(20) DEFAULT NULL,
  `tahun` varchar(4) DEFAULT NULL,
  `gapok` double NOT NULL DEFAULT 0,
  `tunjangan` double NOT NULL DEFAULT 0,
  `potongan` double NOT NULL DEFAULT 0,
  `total_gaji` double NOT NULL DEFAULT 0 COMMENT 'total gaji sebelum sebelum dipotong',
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id_penggajian`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tb_penggajian` */

insert  into `tb_penggajian`(`id_penggajian`,`nik`,`bulan`,`tahun`,`gapok`,`tunjangan`,`potongan`,`total_gaji`,`updated_at`,`created_at`) values 
(1,'10312148','Januari','2020',1800000,200000,0,0,NULL,NULL),
(2,'10312148','Februari','2020',12123,6767,0,18890,'2020-07-14 03:03:16','2020-07-14 03:03:16'),
(6,'10312148','Juli','2020',1800000,400000,0,2200000,'2020-07-18 02:26:50','2020-07-18 02:26:50'),
(9,'354343','Juli','2020',1800000,0,100000,1800000,'2020-07-18 02:43:51','2020-07-18 02:43:36');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('HRD','BENDAHARA','ADMIN') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ADMIN',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`name`,`email`,`email_verified_at`,`password`,`level`,`remember_token`,`created_at`,`updated_at`) values 
(1,'thonie chopper','thonie.chopper@gmail.com',NULL,'$2y$10$Jbrr7umv59Y7Rc/fDj/iyuggL3Wz21LNxiEsCnwSZlcJv8NATGsgu','ADMIN',NULL,'2020-07-14 06:42:41','2020-07-20 03:40:23'),
(3,'eyanx','eyanx@gmail.com',NULL,'$2y$10$sm9E5Fsu9l7ENGuK08zLOOjJRTrVoRBWWD6oAFH1SDBGaJ5Ij1VI.','HRD',NULL,'2020-07-14 07:26:56','2020-07-14 07:26:56'),
(4,'sanusi','sanusi@gmail.com',NULL,'$2y$10$i2dTCDo1AxuyIjTzIVGEtO.Edtu4HY4T7.r6CHha.0f4GL9SSpOee','BENDAHARA',NULL,'2020-07-14 08:04:20','2020-07-14 08:04:20');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
