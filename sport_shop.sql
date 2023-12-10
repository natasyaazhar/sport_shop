/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 8.0.31 : Database - sport_shop
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`sport_shop` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `sport_shop`;

/*Table structure for table `customers` */

DROP TABLE IF EXISTS `customers`;

CREATE TABLE `customers` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `no_phone` varchar(12) DEFAULT NULL,
  `skillset` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `hobby` text,
  `soft_delete` bigint DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `customers` */

insert  into `customers`(`id`,`name`,`email`,`no_phone`,`skillset`,`hobby`,`soft_delete`,`created_at`) values 
(1,'jetta','jetta@gmail.com','01234567899','draw','reading',0,'2023-12-10 16:34:06'),
(2,'danish','danish@gmail.com','0123014999','paint art','color',0,'2023-12-10 16:32:59'),
(3,'natasya','natasya@gmail.com','012','planting','cooking',0,'2023-12-10 16:32:35'),
(4,'qamarina','qamarina@gmail.com','0123456','sewing','sewing',0,'2023-12-10 16:32:23'),
(5,'ad','ad@gmail.com','019','cooking','playing football',0,'2023-12-10 16:32:04');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
