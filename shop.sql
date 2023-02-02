/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 8.0.30 : Database - teabreak
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`teabreak` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `teabreak`;

/*Table structure for table `articlecataloguelink` */

DROP TABLE IF EXISTS `articlecataloguelink`;

CREATE TABLE `articlecataloguelink` (
  `cat_id` int NOT NULL DEFAULT '0',
  `art_id` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`cat_id`,`art_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

/*Table structure for table `articles` */

DROP TABLE IF EXISTS `articles`;

CREATE TABLE `articles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(32) NOT NULL DEFAULT 'news' COMMENT 'blog;news;article',
  `date` datetime DEFAULT NULL,
  `title` text,
  `short_descr` text,
  `content` text,
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=MyISAM AUTO_INCREMENT=338 DEFAULT CHARSET=utf8mb3;

/*Table structure for table `catalogue` */

DROP TABLE IF EXISTS `catalogue`;

CREATE TABLE `catalogue` (
  `id` int NOT NULL AUTO_INCREMENT,
  `parent_id` int DEFAULT NULL,
  `title` varchar(255) DEFAULT '',
  `sort` int NOT NULL DEFAULT '0',
  `hidden` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=185 DEFAULT CHARSET=utf8mb3;

/*Table structure for table `goods` */

DROP TABLE IF EXISTS `goods`;

CREATE TABLE `goods` (
  `id` int NOT NULL AUTO_INCREMENT,
  `catalog_id` int NOT NULL DEFAULT '0',
  `title` text,
  `description` text,
  `price` decimal(12,2) NOT NULL DEFAULT '0.00',
  `price_discount` decimal(12,2) NOT NULL DEFAULT '0.00',
  `weight` int NOT NULL DEFAULT '0',
  `property` varchar(255) DEFAULT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `min_qtty` int NOT NULL DEFAULT '1',
  `image` varchar(255) DEFAULT NULL,
  `grinding` tinyint(1) NOT NULL DEFAULT '0',
  `advertise` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'show on the home page or not',
  `new` tinyint(1) NOT NULL DEFAULT '0',
  `available` tinyint(1) NOT NULL DEFAULT '1',
  `hidden` tinyint(1) NOT NULL DEFAULT '0',
  `sort` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `catalog_id` (`catalog_id`),
  KEY `new` (`new`),
  KEY `available` (`available`)
) ENGINE=MyISAM AUTO_INCREMENT=1399 DEFAULT CHARSET=utf8mb3;

/*Table structure for table `jobs` */

DROP TABLE IF EXISTS `jobs`;

CREATE TABLE `jobs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `requests` text NOT NULL,
  `description` text NOT NULL,
  `closed` tinyint(1) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=cp1251;

/*Table structure for table `nova` */

DROP TABLE IF EXISTS `nova`;

CREATE TABLE `nova` (
  `id` text NOT NULL COMMENT 'ключ',
  `prodavec` text COMMENT 'продавец',
  `unp` text COMMENT 'УНП',
  `raschetni_schet` text COMMENT 'расчетный счет №',
  `bik` text COMMENT 'БИК',
  `tel_fax` text COMMENT 'Тел./факс',
  `usl_oplati` text COMMENT 'Условия оплаты',
  `valuta_plateja` text COMMENT 'Валюта платежа',
  `osnovanie` text COMMENT 'Основание'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

/*Table structure for table `ordergoods` */

DROP TABLE IF EXISTS `ordergoods`;

CREATE TABLE `ordergoods` (
  `order_id` int NOT NULL DEFAULT '0',
  `good_id` int NOT NULL DEFAULT '0',
  `count` int NOT NULL,
  `grinding` varchar(8) NOT NULL DEFAULT '',
  `good_price` decimal(12,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`order_id`,`good_id`,`grinding`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

/*Table structure for table `orders` */

DROP TABLE IF EXISTS `orders`;

CREATE TABLE `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `orderdate` datetime DEFAULT NULL,
  `sum` decimal(12,2) NOT NULL DEFAULT '0.00',
  `firstname` varchar(255) NOT NULL DEFAULT '',
  `lastname` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `phone` varchar(255) NOT NULL DEFAULT '',
  `shipping_adr` text,
  `shipping_adr2` text,
  `notes` text,
  `time_ud` varchar(255) NOT NULL DEFAULT 'неопределено',
  `dostavka` varchar(255) NOT NULL DEFAULT 'неопределено',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `orderdate` (`orderdate`)
) ENGINE=MyISAM AUTO_INCREMENT=3820 DEFAULT CHARSET=utf8mb3;

/*Table structure for table `promo` */

DROP TABLE IF EXISTS `promo`;

CREATE TABLE `promo` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `percent` int NOT NULL,
  `code` text NOT NULL,
  `used` int NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL,
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb3;

/*Table structure for table `settings` */

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `parameter` varchar(255) NOT NULL DEFAULT '',
  `value` varchar(3000) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3;

/*Table structure for table `shops` */

DROP TABLE IF EXISTS `shops`;

CREATE TABLE `shops` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `openingHours` varchar(255) DEFAULT NULL,
  `coordinates` varchar(255) DEFAULT NULL,
  `visible` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 ROW_FORMAT=DYNAMIC;

/*Table structure for table `static_item` */

DROP TABLE IF EXISTS `static_item`;

CREATE TABLE `static_item` (
  `id` int NOT NULL,
  `content` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL DEFAULT '',
  `password` varchar(32) NOT NULL DEFAULT '',
  `firstname` varchar(255) NOT NULL DEFAULT '',
  `lastname` varchar(255) NOT NULL DEFAULT '',
  `email` varchar(255) NOT NULL DEFAULT '',
  `phone` varchar(255) NOT NULL DEFAULT '',
  `address` text,
  `address2` text,
  `receive_email` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32217 DEFAULT CHARSET=utf8mb3;

/*Table structure for table `webchat_lines` */

DROP TABLE IF EXISTS `webchat_lines`;

CREATE TABLE `webchat_lines` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `author` varchar(16) NOT NULL,
  `gravatar` varchar(32) NOT NULL,
  `text` varchar(255) NOT NULL,
  `ts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `ts` (`ts`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3;

/*Table structure for table `webchat_users` */

DROP TABLE IF EXISTS `webchat_users`;

CREATE TABLE `webchat_users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL,
  `gravatar` varchar(32) NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `last_activity` (`last_activity`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb3;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
