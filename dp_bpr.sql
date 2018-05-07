/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.31-MariaDB : Database - dp_bpr
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dp_bpr` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `dp_bpr`;

/*Table structure for table `dp_events` */

DROP TABLE IF EXISTS `dp_events`;

CREATE TABLE `dp_events` (
  `EVT_ID` int(11) NOT NULL AUTO_INCREMENT,
  `EVT_TITLE` varchar(25) DEFAULT NULL,
  `EVT_CONTENT` varchar(255) DEFAULT NULL,
  `EVT_DATE` date DEFAULT '0000-00-00',
  `EVT_STATUS` char(1) DEFAULT 'N',
  `U_ID` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`EVT_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

/*Data for the table `dp_events` */

insert  into `dp_events`(`EVT_ID`,`EVT_TITLE`,`EVT_CONTENT`,`EVT_DATE`,`EVT_STATUS`,`U_ID`) values 
(29,'Malam Bos','Malam','2018-04-24','Y','administrator'),
(33,'Tetsting','asdsd','2018-04-27','N','administrator');

/*Table structure for table `dp_news` */

DROP TABLE IF EXISTS `dp_news`;

CREATE TABLE `dp_news` (
  `NEWS_ID` int(11) NOT NULL AUTO_INCREMENT,
  `NEWS_CATEG_ID` int(11) DEFAULT NULL,
  `U_ID` varchar(80) DEFAULT NULL,
  `NEWS_HEADLINE` varchar(50) DEFAULT NULL,
  `NEWS_CONTENT` varchar(255) DEFAULT NULL,
  `NEWS_DATE` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `NEWS_IMG_PATH` text,
  `NEWS_STATUS` char(1) DEFAULT 'N',
  PRIMARY KEY (`NEWS_ID`),
  KEY `NEWS_CATEG_ID` (`NEWS_CATEG_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `dp_news` */

insert  into `dp_news`(`NEWS_ID`,`NEWS_CATEG_ID`,`U_ID`,`NEWS_HEADLINE`,`NEWS_CONTENT`,`NEWS_DATE`,`NEWS_IMG_PATH`,`NEWS_STATUS`) values 
(1,1,'Administrator','Headmen','halo indonesia','2018-04-17 11:16:42',NULL,'Y'),
(2,NULL,NULL,NULL,NULL,'0000-00-00 00:00:00',NULL,'N'),
(11,0,'administrator','Hello world','UPDATE MOBIL','2018-04-27 03:44:35','uploads/78e9793.jpg','N'),
(12,0,'administrator','TESTIMONI','TESTIMONI','2018-04-27 03:46:22','uploads/0116216.jpg','N'),
(15,21,'administrator','asd;ka;k','asdasdasd','2018-04-27 04:09:20','uploads/8b4e9b89ea.jpg','N'),
(17,18,'administrator','KPR BNI Griya: Solusi Praktis Beli Rumah atau Apar','<p>Bagi generasi milineal memiliki hunian pribadi seperti rumah atau apartemen menjadi salah satu&nbsp;wish list&nbsp;dalam hidup mereka, tentunya setelah&nbsp;travelling. Karakter generasi milineal yang lahir dan tumbuh di era serba digital ini memang ce','2018-04-30 02:08:40','uploads/9a2584c861.jpg','N'),
(18,18,'administrator','Judul Baru','kategori berita terkini<br>','2018-05-05 03:13:43','uploads/noimg.jpg','Y');

/*Table structure for table `dp_promotion` */

DROP TABLE IF EXISTS `dp_promotion`;

CREATE TABLE `dp_promotion` (
  `PRO_ID` int(11) NOT NULL AUTO_INCREMENT,
  `PRO_NAME` varchar(25) DEFAULT NULL,
  `PRO_DATE` date DEFAULT '0000-00-00',
  `PRO_CONTENT` text,
  `PRO_STATUS` char(1) DEFAULT 'N',
  `U_ID` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`PRO_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `dp_promotion` */

insert  into `dp_promotion`(`PRO_ID`,`PRO_NAME`,`PRO_DATE`,`PRO_CONTENT`,`PRO_STATUS`,`U_ID`) values 
(1,'promo hadiah','2018-04-30','Hadiah mobil','N','administrator');

/*Table structure for table `dp_reference_categori` */

DROP TABLE IF EXISTS `dp_reference_categori`;

CREATE TABLE `dp_reference_categori` (
  `CATEG_ID` int(11) NOT NULL AUTO_INCREMENT,
  `CATEG_NAME` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`CATEG_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `dp_reference_categori` */

insert  into `dp_reference_categori`(`CATEG_ID`,`CATEG_NAME`) values 
(18,'Berita Terkini'),
(21,'Hallo Semua');

/*Table structure for table `dp_users` */

DROP TABLE IF EXISTS `dp_users`;

CREATE TABLE `dp_users` (
  `U_ID` varchar(80) NOT NULL,
  `U_PASSWORD` varchar(80) NOT NULL,
  `U_PASSWORD_HASH` varchar(80) NOT NULL,
  `U_NAME` varchar(80) DEFAULT 'Trevalia.com Default User',
  `U_REG_DATE` date DEFAULT '0000-00-00',
  `U_DEVICE_ID` varchar(300) DEFAULT '-',
  `U_PHONE` varchar(20) DEFAULT '-',
  `U_ACCT_STATUS` varchar(30) DEFAULT 'ACCT_ACTIVE' COMMENT 'trv_references : ACCOUNT_STATUS',
  `U_LOGIN_TOKEN` varchar(50) DEFAULT '-',
  `U_LOGIN_TIME` datetime DEFAULT '0000-00-00 00:00:00',
  `U_LOGOUT_TIME` datetime DEFAULT '0000-00-00 00:00:00',
  `U_AVATAR_PATH` varchar(250) DEFAULT '-',
  `SYS_CREATE_TIME` datetime DEFAULT '0000-00-00 00:00:00',
  `SYS_CREATE_USER` varchar(80) DEFAULT '-',
  `SYS_UPDATE_TIME` datetime DEFAULT '0000-00-00 00:00:00',
  `SYS_UPDATE_USER` varchar(80) DEFAULT '-',
  PRIMARY KEY (`U_ID`),
  UNIQUE KEY `IDX_U_ID` (`U_ID`) COMMENT '(null)',
  KEY `U_ACCT_STATUS` (`U_ACCT_STATUS`) COMMENT '(null)',
  KEY `U_PHONE` (`U_PHONE`) COMMENT '(null)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

/*Data for the table `dp_users` */

insert  into `dp_users`(`U_ID`,`U_PASSWORD`,`U_PASSWORD_HASH`,`U_NAME`,`U_REG_DATE`,`U_DEVICE_ID`,`U_PHONE`,`U_ACCT_STATUS`,`U_LOGIN_TOKEN`,`U_LOGIN_TIME`,`U_LOGOUT_TIME`,`U_AVATAR_PATH`,`SYS_CREATE_TIME`,`SYS_CREATE_USER`,`SYS_UPDATE_TIME`,`SYS_UPDATE_USER`) values 
('administrator','12345678','199cac09d6dfce97c272ce3323b8fbfc','Administrator','2018-03-04','-','0819343434','ACCT_ACTIVE','-','0000-00-00 00:00:00','0000-00-00 00:00:00','fe4910ae38.jpg','0000-00-00 00:00:00','-','0000-00-00 00:00:00','-'),
('content','12345678','2618ff6af54b9e1a4f3c159161983e4e','Content Manager','2018-03-11','-','0888343322','ACCT_ACTIVE','-','0000-00-00 00:00:00','0000-00-00 00:00:00','-','0000-00-00 00:00:00','-','0000-00-00 00:00:00','-'),
('dev','','f6af7afd01d4eb0dc5fe0a342cd6cee7','Tim Development','0000-00-00','-','081915445524','ACCT_ACTIVE','-','0000-00-00 00:00:00','0000-00-00 00:00:00','513c285672.png','0000-00-00 00:00:00','-','2018-04-15 08:10:14','dev'),
('user1@yahoo.com','12345678','8834283546a0de1140fb1ffa8f15deed','User Satu','2018-03-20','-','0818134348','ACCT_ACTIVE','-','0000-00-00 00:00:00','0000-00-00 00:00:00','-','0000-00-00 00:00:00','-','0000-00-00 00:00:00','-'),
('user2@yahoo.com','12345678','087059d08ab26c644ddc3cd63b889d02','User Dua','2018-03-20','-','0857346263','ACCT_ACTIVE','-','0000-00-00 00:00:00','0000-00-00 00:00:00','-','0000-00-00 00:00:00','-','0000-00-00 00:00:00','-');

/*Table structure for table `dp_vacancies` */

DROP TABLE IF EXISTS `dp_vacancies`;

CREATE TABLE `dp_vacancies` (
  `VAC_ID` int(11) NOT NULL AUTO_INCREMENT,
  `VAC_NAME` varchar(50) DEFAULT NULL,
  `VAC_CONTENT` varchar(50) DEFAULT NULL,
  `VAC_DATE` date DEFAULT '0000-00-00',
  `VAC_STATUS` char(1) DEFAULT 'N',
  `U_ID` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`VAC_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `dp_vacancies` */

insert  into `dp_vacancies`(`VAC_ID`,`VAC_NAME`,`VAC_CONTENT`,`VAC_DATE`,`VAC_STATUS`,`U_ID`) values 
(2,'lowongan Programmer','programmer junior bagus','2018-04-30','Y','administrator');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
