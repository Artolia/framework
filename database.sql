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

/*Table structure for table `ms_group` */

DROP TABLE IF EXISTS `ms_group`;

CREATE TABLE `ms_group` (
  `msg_id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_nama` varchar(255) DEFAULT NULL,
  `msg_status` varchar(1) DEFAULT NULL,
  `msg_create_date` datetime DEFAULT NULL,
  `msg_create_by` varchar(50) DEFAULT NULL,
  `msg_update_date` datetime DEFAULT NULL,
  `msg_update_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `ms_group` */

insert  into `ms_group`(`msg_id`,`msg_nama`,`msg_status`,`msg_create_date`,`msg_create_by`,`msg_update_date`,`msg_update_by`) values 
(1,'Administrator','1','2019-04-29 12:52:25','admin',NULL,NULL);

/*Table structure for table `ms_group_member` */

DROP TABLE IF EXISTS `ms_group_member`;

CREATE TABLE `ms_group_member` (
  `msgm_id` int(11) NOT NULL AUTO_INCREMENT,
  `msgm_msg_id` int(11) DEFAULT NULL,
  `msgm_username` varchar(50) DEFAULT NULL,
  `msgm_create_date` datetime DEFAULT NULL,
  `msgm_create_by` varchar(50) DEFAULT NULL,
  `msgm_update_date` datetime DEFAULT NULL,
  `msgm_update_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`msgm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `ms_group_member` */

insert  into `ms_group_member`(`msgm_id`,`msgm_msg_id`,`msgm_username`,`msgm_create_date`,`msgm_create_by`,`msgm_update_date`,`msgm_update_by`) values 
(1,1,'admin','2019-04-29 12:53:45','admin',NULL,NULL);

/*Table structure for table `ms_hak_akses_group` */

DROP TABLE IF EXISTS `ms_hak_akses_group`;

CREATE TABLE `ms_hak_akses_group` (
  `mshkg_id` int(11) NOT NULL AUTO_INCREMENT,
  `mshkg_msg_id` int(11) DEFAULT NULL,
  `mshkg_msm_id` int(11) DEFAULT NULL,
  `mshkg_priv` text DEFAULT NULL,
  `mshkg_create_date` datetime DEFAULT NULL,
  `mshkg_create_by` varchar(50) DEFAULT NULL,
  `mshkg_update_date` datetime DEFAULT NULL,
  `mshkg_update_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`mshkg_id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

/*Data for the table `ms_hak_akses_group` */

insert  into `ms_hak_akses_group`(`mshkg_id`,`mshkg_msg_id`,`mshkg_msm_id`,`mshkg_priv`,`mshkg_create_date`,`mshkg_create_by`,`mshkg_update_date`,`mshkg_update_by`) values 
(13,1,1,'view',NULL,NULL,NULL,NULL),
(14,1,5,'view',NULL,NULL,NULL,NULL),
(15,1,2,'view, tambah, edit',NULL,NULL,NULL,NULL),
(16,1,3,'view, tambah, edit',NULL,NULL,NULL,NULL),
(17,1,6,'view, tambah, edit',NULL,NULL,NULL,NULL);

/*Table structure for table `ms_login` */

DROP TABLE IF EXISTS `ms_login`;

CREATE TABLE `ms_login` (
  `msl_username` varchar(20) NOT NULL,
  `msl_password` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`msl_username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ms_login` */

insert  into `ms_login`(`msl_username`,`msl_password`) values 
('admin','e10adc3949ba59abbe56e057f20f883e'),
('dummy','e10adc3949ba59abbe56e057f20f883e');

/*Table structure for table `ms_menu` */

DROP TABLE IF EXISTS `ms_menu`;

CREATE TABLE `ms_menu` (
  `msm_id` int(11) NOT NULL AUTO_INCREMENT,
  `msm_nama` varchar(50) DEFAULT NULL,
  `msm_urutan` int(11) DEFAULT NULL,
  `msm_page` varchar(50) DEFAULT NULL,
  `msm_parent` int(11) DEFAULT 0,
  `msm_hak_akses` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`msm_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `ms_menu` */

insert  into `ms_menu`(`msm_id`,`msm_nama`,`msm_urutan`,`msm_page`,`msm_parent`,`msm_hak_akses`) values 
(1,'Master',1,NULL,0,'view'),
(2,'User',1,'user',5,'view, tambah, edit'),
(3,'Group',3,'group',5,'view, tambah, edit'),
(5,'Admin',99,NULL,0,'view'),
(6,'Menu',2,'menu',5,'view, tambah, edit');

/*Table structure for table `ms_user` */

DROP TABLE IF EXISTS `ms_user`;

CREATE TABLE `ms_user` (
  `msu_id` varchar(30) NOT NULL,
  `msu_nama` varchar(100) DEFAULT NULL,
  `msu_status_aktif` char(1) DEFAULT NULL,
  PRIMARY KEY (`msu_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `ms_user` */

insert  into `ms_user`(`msu_id`,`msu_nama`,`msu_status_aktif`) values 
('admin','Angel Artolia','1'),
('dummy','dummy','1');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
