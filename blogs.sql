/*
SQLyog Ultimate v12.08 (64 bit)
MySQL - 8.0.17 : Database - blog
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`blog` /*!40100 DEFAULT CHARACTER SET utf8 */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `blog`;

/*Table structure for table `article2` */

DROP TABLE IF EXISTS `article2`;

CREATE TABLE `article2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` smallint(6) NOT NULL,
  `user_id` smallint(6) NOT NULL,
  `title` varchar(30) NOT NULL,
  `content` text,
  `orderby` tinyint(4) NOT NULL DEFAULT '0',
  `comment_count` int(11) NOT NULL DEFAULT '0',
  `top` tinyint(4) NOT NULL DEFAULT '0',
  `read` int(11) NOT NULL DEFAULT '0',
  `priaise` int(11) NOT NULL DEFAULT '0',
  `addate` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

/*Data for the table `article2` */

insert  into `article2`(`id`,`category_id`,`user_id`,`title`,`content`,`orderby`,`comment_count`,`top`,`read`,`priaise`,`addate`) values (1,1,21,'aaaaaaaaaaa','aaaaaaaaaaaaaaaaaaaaaaaa',50,4,0,61,11,1484899999),(2,0,21,'北京真好','北京北京北京被你弄',50,0,0,0,0,1609409013),(3,5,21,'北京真好','不不不不不不不不不不不不不不不不不不不不不不不不不不',50,0,0,0,0,1609409199),(4,17,21,'北京真好','吃吃吃吃吃吃吃错错错错错错错错错错错错错错错错错错错错错错错错错错错错错',50,0,0,0,0,1609409714),(5,1,21,'aaaaaaaaaaa','aaaaaaaaaaaaaaaaaaaaaaaa',50,4,0,61,11,1484899999),(6,0,21,'北京真好','北京北京北京被你弄',50,0,0,0,0,1609409013),(7,5,21,'北京真好','不不不不不不不不不不不不不不不不不不不不不不不不不不',50,0,0,0,0,1609409199),(8,17,21,'北京真好','吃吃吃吃吃吃吃错错错错错错错错错错错错错错错错错错错错错错错错错错错错错',50,0,0,0,0,1609409714),(9,1,21,'aaaaaaaaaaa','aaaaaaaaaaaaaaaaaaaaaaaa',50,4,0,61,11,1484899999),(10,0,21,'北京真好','北京北京北京被你弄',50,0,0,0,0,1609409013),(11,5,21,'北京真好','不不不不不不不不不不不不不不不不不不不不不不不不不不',50,0,0,0,0,1609409199),(12,17,21,'北京真好','吃吃吃吃吃吃吃错错错错错错错错错错错错错错错错错错错错错错错错错错错错错',50,0,0,0,0,1609409714),(13,1,21,'aaaaaaaaaaa','aaaaaaaaaaaaaaaaaaaaaaaa',50,4,0,61,11,1484899999),(14,0,21,'北京真好','北京北京北京被你弄',50,0,0,0,0,1609409013),(15,5,21,'北京真好','不不不不不不不不不不不不不不不不不不不不不不不不不不',50,0,0,17,0,1609409199),(16,17,21,'北京真好','吃吃吃吃吃吃吃错错错错错错错错错错错错错错错错错错错错错错错错错错错错错',50,0,0,1,0,1609409714),(17,1,21,'aaaaaaaaaaa','aaaaaaaaaaaaaaaaaaaaaaaa',50,4,0,62,11,1484899999),(18,0,21,'北京真好','北京北京北京被你弄',50,0,0,1,0,1609409013),(19,5,21,'北京真好','不不不不不不不不不不不不不不不不不不不不不不不不不不',50,0,0,1,0,1609409199),(20,17,21,'北京真好','吃吃吃吃吃吃吃错错错错错错错错错错错错错错错错错错错错错错错错错错错错错',50,0,0,1,0,1609409714),(21,1,21,'aaaaaaaaaaa','aaaaaaaaaaaaaaaaaaaaaaaa',50,4,0,62,11,1484899999),(22,0,21,'北京真好','北京北京北京被你弄',50,0,0,1,0,1609409013),(23,5,21,'北京真好','不不不不不不不不不不不不不不不不不不不不不不不不不不',50,0,0,1,0,1609409199),(24,17,21,'北京真好','吃吃吃吃吃吃吃错错错错错错错错错错错错错错错错错错错错错错错错错错错错错',50,0,0,1,0,1609409714),(25,1,21,'aaaaaaaaaaa','aaaaaaaaaaaaaaaaaaaaaaaa',50,4,0,62,11,1484899999),(26,0,21,'北京真好','北京北京北京被你弄',50,0,0,1,0,1609409013),(27,5,21,'北京真好','不不不不不不不不不不不不不不不不不不不不不不不不不不',50,0,0,1,0,1609409199),(28,17,21,'北京真好','吃吃吃吃吃吃吃错错错错错错错错错错错错错错错错错错错错错错错错错错错错错',50,0,0,1,0,1609409714),(29,1,21,'aaaaaaaaaaa','aaaaaaaaaaaaaaaaaaaaaaaa',50,4,0,62,11,1484899999),(30,0,21,'北京真好','北京北京北京被你弄',50,0,0,1,0,1609409013),(31,5,21,'北京真好','不不不不不不不不不不不不不不不不不不不不不不不不不不',50,0,0,1,0,1609409199),(32,17,21,'北京真好','吃吃吃吃吃吃吃错错错错错错错错错错错错错错错错错错错错错错错错错错错错错',50,0,0,1,0,1609409714),(33,1,21,'aaaaaaaaaaa','aaaaaaaaaaaaaaaaaaaaaaaa',50,4,0,62,11,1484899999),(34,0,21,'北京真好','北京北京北京被你弄',50,0,0,1,0,1609409013),(35,5,21,'北京真好','不不不不不不不不不不不不不不不不不不不不不不不不不不',50,0,0,1,0,1609409199),(36,17,21,'北京真好','吃吃吃吃吃吃吃错错错错错错错错错错错错错错错错错错错错错错错错错错错错错',50,0,0,1,0,1609409714),(37,1,21,'aaaaaaaaaaa','aaaaaaaaaaaaaaaaaaaaaaaa',50,4,0,62,11,1484899999),(38,0,21,'北京真好','北京北京北京被你弄',50,0,0,1,0,1609409013),(39,5,21,'北京真好','不不不不不不不不不不不不不不不不不不不不不不不不不不',50,0,0,1,0,1609409199),(40,17,21,'北京真好','吃吃吃吃吃吃吃错错错错错错错错错错错错错错错错错错错错错错错错错错错错错',50,0,0,1,0,1609409714),(41,1,21,'aaaaaaaaaaa','aaaaaaaaaaaaaaaaaaaaaaaa',50,4,0,62,11,1484899999),(42,0,21,'北京真好','北京北京北京被你弄',50,0,0,1,0,1609409013),(43,5,21,'北京真好','不不不不不不不不不不不不不不不不不不不不不不不不不不',50,0,0,1,0,1609409199),(44,17,21,'北京真好','吃吃吃吃吃吃吃错错错错错错错错错错错错错错错错错错错错错错错错错错错错错',50,0,0,1,0,1609409714),(45,1,21,'aaaaaaaaaaa','aaaaaaaaaaaaaaaaaaaaaaaa',50,4,0,62,11,1484899999),(46,0,21,'北京真好','北京北京北京被你弄',50,0,0,1,0,1609409013),(47,5,21,'北京真好','不不不不不不不不不不不不不不不不不不不不不不不不不不',50,0,0,1,0,1609409199),(48,17,21,'北京真好','吃吃吃吃吃吃吃错错错错错错错错错错错错错错错错错错错错错错错错错错错错错',50,0,0,1,0,1609409714),(49,1,21,'aaaaaaaaaaa','aaaaaaaaaaaaaaaaaaaaaaaa',50,4,0,62,11,1484899999),(50,0,21,'北京真好','北京北京北京被你弄',50,0,0,1,0,1609409013),(51,5,21,'北京真好','不不不不不不不不不不不不不不不不不不不不不不不不不不',50,0,0,1,0,1609409199),(52,17,21,'北京真好','吃吃吃吃吃吃吃错错错错错错错错错错错错错错错错错错错错错错错错错错错错错',50,0,0,1,0,1609409714),(53,1,21,'aaaaaaaaaaa','aaaaaaaaaaaaaaaaaaaaaaaa',50,4,0,62,11,1484899999),(54,0,21,'北京真好','北京北京北京被你弄',50,0,0,1,0,1609409013),(55,5,21,'北京真好','不不不不不不不不不不不不不不不不不不不不不不不不不不',50,0,0,1,0,1609409199),(56,17,21,'北京真好','吃吃吃吃吃吃吃错错错错错错错错错错错错错错错错错错错错错错错错错错错错错',50,0,0,1,0,1609409714),(57,1,21,'aaaaaaaaaaa','aaaaaaaaaaaaaaaaaaaaaaaa',50,4,0,62,11,1484899999),(58,0,21,'北京真好','北京北京北京被你弄',50,0,0,1,0,1609409013),(59,5,21,'北京真好','不不不不不不不不不不不不不不不不不不不不不不不不不不',50,0,0,1,0,1609409199),(60,17,21,'北京真好','吃吃吃吃吃吃吃错错错错错错错错错错错错错错错错错错错错错错错错错错错错错',50,0,0,1,0,1609409714),(61,1,21,'aaaaaaaaaaa','aaaaaaaaaaaaaaaaaaaaaaaa',50,4,0,62,11,1484899999),(62,0,21,'北京真好','北京北京北京被你弄',50,0,0,18,0,1609409013),(63,5,21,'北京真好','不不不不不不不不不不不不不不不不不不不不不不不不不不',50,0,1,19,3,1609409199),(64,17,21,'北京真好','吃吃吃吃吃吃吃错错错错错错错错错错错错错错错错错错错错错错错错错错错错错',50,0,1,19,5,1609409714);

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `classname` varchar(20) NOT NULL,
  `orderby` tinyint(4) NOT NULL DEFAULT '0',
  `pid` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

/*Data for the table `category` */

insert  into `category`(`id`,`classname`,`orderby`,`pid`) values (1,'新闻资讯',50,0),(2,'PHP培训',50,0),(3,'国内新闻',50,1),(4,'国际新闻',50,1),(5,'北京新闻',50,3),(6,'上海新闻',50,3),(7,'PHP基础',50,2),(8,'PHP就业',50,2),(9,'HTML',50,7),(10,'CSS',50,7),(11,'JavaScript',50,7),(12,'Bootstrap',49,7),(13,'PHP核心技术',50,8),(14,'PHP典型技术',50,8),(15,'MySQL基础',45,8),(22,'论坛技术',50,8),(17,'日本新闻',50,4),(18,'美国新闻',50,4),(19,'OOP技术',50,8),(20,'娱乐新闻',50,5),(21,'军事新闻',47,5),(23,'MVC框架基础',48,8),(24,'jQuery',50,7);

/*Table structure for table `category2` */

DROP TABLE IF EXISTS `category2`;

CREATE TABLE `category2` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `classname` varchar(20) NOT NULL,
  `orderby` tinyint(4) NOT NULL DEFAULT '0',
  `pid` smallint(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

/*Data for the table `category2` */

insert  into `category2`(`id`,`classname`,`orderby`,`pid`) values (1,'HTML标记语言',50,0),(2,'CSS',50,0),(3,'JavaScript客户端语言',50,0),(4,'Apache服务器配置',50,0),(5,'PHP入门基础',50,0),(6,'MsSQLs数据库',50,0),(7,'PHP典型应用',50,0),(8,'面向对象编程',50,0),(9,'MVC框架基础',50,0),(10,'PDO数据库对象',50,0),(11,'Smarty模板引擎',50,0);

/*Table structure for table `comment` */

DROP TABLE IF EXISTS `comment`;

CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `comment` */

/*Table structure for table `links2` */

DROP TABLE IF EXISTS `links2`;

CREATE TABLE `links2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domain` varchar(20) NOT NULL,
  `url` varchar(30) NOT NULL,
  `orderby` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `links2` */

insert  into `links2`(`id`,`domain`,`url`,`orderby`) values (1,'创智播客','http://www.itcast.cn',2),(2,'黑马程序员','http://:www.itheima.com',50);

/*Table structure for table `user2` */

DROP TABLE IF EXISTS `user2`;

CREATE TABLE `user2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` char(32) NOT NULL,
  `name` char(12) NOT NULL,
  `tel` varchar(15) NOT NULL,
  `last_login_ip` char(15) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `last_login_time` int(10) DEFAULT NULL,
  `login_times` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `role` tinyint(4) NOT NULL DEFAULT '0',
  `addate` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

/*Data for the table `user2` */

insert  into `user2`(`id`,`username`,`password`,`name`,`tel`,`last_login_ip`,`last_login_time`,`login_times`,`status`,`role`,`addate`) values (15,'ccc','9df62e693988eb4e1e1444ece0578579','ccc','123',NULL,NULL,0,1,1,1608974143),(7,'aaa','123','aaa','aaa','123',123,123,1,0,123),(9,'aaa','123','aaa','aaa','123',123,123,1,0,123),(21,'admin','21232f297a57a5a743894a0e4a801fc3','admin','123','::1',1609586164,13,1,1,1609057091),(11,'aaa','123','aaa','aaa','123',123,123,1,0,123),(12,'aaa','123','aaa','aaa','123',123,123,1,0,123),(13,'aaa','123','aaa','aaa','123',123,123,1,0,123),(14,'bbb','202cb962ac59075b964b07152d234b70','bbb','123',NULL,NULL,0,1,1,1608974041),(16,'ddd','77963b7a931377ad4ab5ad6a9cd718aa','ddd','123',NULL,NULL,0,1,1,1609040192),(17,'eee','d2f2297d6e829cd3493aa7de4416a18f','eee','123',NULL,NULL,0,1,1,1609042605),(18,'fff','343d9040a671c45832ee5381860e2996','fff','123',NULL,NULL,0,1,1,1609042771),(19,'ggg','ba248c985ace94863880921d8900c53f','ggg','123',NULL,NULL,0,1,1,1609042978),(20,'hhh','a3aca2964e72000eea4c56cb341002a4','hhh','123',NULL,NULL,0,1,1,1609043017),(22,'zhang','d0cd2693b3506677e4c55e91d6365bff','zhang','123','::1',1609217431,4,1,1,1609216198);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
