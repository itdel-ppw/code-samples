/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.7-MariaDB : Database - fruitshop_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
USE `fruitshop_db`;

/*Table structure for table `fruit` */

DROP TABLE IF EXISTS `fruit`;

CREATE TABLE `fruit` (
  `id` char(64) NOT NULL,
  `name` varchar(64) NOT NULL,
  `latin` varchar(64) NOT NULL,
  `color` varchar(64) NOT NULL,
  `description` varchar(256) DEFAULT NULL,
  `image` varchar(128) NOT NULL,
  `price` float(4,2) unsigned NOT NULL DEFAULT 0.00,
  `stock` int(4) unsigned NOT NULL DEFAULT 0,
  `added_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `fruit` */

insert  into `fruit`(`id`,`name`,`latin`,`color`,`description`,`image`,`price`,`stock`,`added_at`) values ('0e21b9e56243d2915bd56d09034cecf5a4e20c86a928cb63623acfb83494217c','Grape','Vitis vinifera','Green, Purple, Red, & White','Very delicious.','images/grape.jpg',3.40,20,'2018-09-09 20:24:13');
insert  into `fruit`(`id`,`name`,`latin`,`color`,`description`,`image`,`price`,`stock`,`added_at`) values ('77d04b1ea52cc7145049407abfaf761b76af78f26ef5c5d451a3f2f190c11ce5','Cherry','Prunus avium','Red','On top of the case.','images/cherry.jpg',1.20,20,'2018-09-20 20:24:18');
insert  into `fruit`(`id`,`name`,`latin`,`color`,`description`,`image`,`price`,`stock`,`added_at`) values ('ca7baa9f5a65d045756e291728eb0df6a9da8d80bdcf397284d48b8cd8746112','Apple','Malus','Red & Green','Everyone loves it.','images/apple.jpg',1.00,20,'2018-09-04 20:24:22');
insert  into `fruit`(`id`,`name`,`latin`,`color`,`description`,`image`,`price`,`stock`,`added_at`) values ('fdc8e69bc9ce41b3bdc72163c88265afefe1931f082221a8982f3cd75de8c1dc','Strawberry','Fragaria','Red & Green','Kids\' favourite.','images/strawberry.jpg',1.75,20,'2018-10-03 20:24:28');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
