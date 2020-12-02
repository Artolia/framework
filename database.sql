/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.3.16-MariaDB : Database - framework
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`framework` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `framework`;

/*Table structure for table `group_member` */

DROP TABLE IF EXISTS `group_member`;

CREATE TABLE `group_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groups_id` int(11) DEFAULT NULL,
  `users_id` varchar(50) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `create_by` varchar(50) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `update_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `group_member` */

insert  into `group_member`(`id`,`groups_id`,`users_id`,`create_date`,`create_by`,`update_date`,`update_by`) values 
(1,1,'admin','2019-04-29 12:53:45','admin',NULL,NULL),
(3,2,'dummy','2020-08-09 11:37:38','admin',NULL,NULL);

/*Table structure for table `group_priv` */

DROP TABLE IF EXISTS `group_priv`;

CREATE TABLE `group_priv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groups_id` int(11) DEFAULT NULL,
  `menus_id` int(11) DEFAULT NULL,
  `priv` text DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `create_by` varchar(30) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `update_by` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `group_priv` */

insert  into `group_priv`(`id`,`groups_id`,`menus_id`,`priv`,`create_date`,`create_by`,`update_date`,`update_by`) values 
(13,1,1,'view',NULL,NULL,NULL,NULL),
(14,1,5,'view',NULL,NULL,NULL,NULL),
(15,1,2,'view, tambah, edit',NULL,NULL,NULL,NULL),
(16,1,3,'view, tambah, edit',NULL,NULL,NULL,NULL),
(17,1,6,'view, tambah, edit',NULL,NULL,NULL,NULL),
(18,2,1,'view',NULL,NULL,NULL,NULL),
(19,2,5,'view',NULL,NULL,NULL,NULL),
(20,2,2,'view, tambah, edit',NULL,NULL,NULL,NULL),
(21,2,3,'view',NULL,NULL,NULL,NULL),
(22,2,6,'view',NULL,NULL,NULL,NULL),
(23,1,9,'view, 0',NULL,NULL,NULL,NULL);

/*Table structure for table `groups` */

DROP TABLE IF EXISTS `groups`;

CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `create_by` varchar(50) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `update_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `groups` */

insert  into `groups`(`id`,`nama`,`status`,`create_date`,`create_by`,`update_date`,`update_by`) values 
(1,'Administrator','1','2019-04-29 12:52:25','admin',NULL,NULL),
(2,'user','1','2020-08-09 11:30:24','admin',NULL,NULL);

/*Table structure for table `menus` */

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `page` varchar(50) DEFAULT NULL,
  `parent` int(11) DEFAULT 0,
  `hak_akses` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `menus` */

insert  into `menus`(`id`,`nama`,`urutan`,`page`,`parent`,`hak_akses`) values 
(1,'Master',1,NULL,0,'view'),
(2,'User',1,'user',5,'view, tambah, edit'),
(3,'Group',3,'group',5,'view, tambah, edit'),
(5,'Admin',99,NULL,0,'view'),
(6,'Menu',2,'menu',5,'view, tambah, edit'),
(9,'testing menu',3,'testingmenu',0,'view, tambah');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` varchar(30) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `status` char(1) DEFAULT NULL COMMENT '1=aktif,0=non-aktif',
  `password` varchar(32) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `create_by` varchar(30) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `update_by` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`nama`,`status`,`password`,`create_date`,`create_by`,`update_date`,`update_by`) values 
('admin','Angel Artolia','1','e10adc3949ba59abbe56e057f20f883e',NULL,NULL,NULL,NULL),
('user','User','1','202cb962ac59075b964b07152d234b70','2020-08-09 11:27:03','admin','2020-08-09 11:28:22','admin');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
