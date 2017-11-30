-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.14 - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para sympel_db
DROP DATABASE IF EXISTS `sympel_db`;
CREATE DATABASE IF NOT EXISTS `sympel_db` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `sympel_db`;

-- Volcando estructura para tabla sympel_db.areas_support
DROP TABLE IF EXISTS `areas_support`;
CREATE TABLE IF NOT EXISTS `areas_support` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sympel_db.areas_support: 30 rows
DELETE FROM `areas_support`;
/*!40000 ALTER TABLE `areas_support` DISABLE KEYS */;
INSERT INTO `areas_support` (`id`, `name`) VALUES
	(1, 'Advocacy and Human Rights'),
	(2, 'Disaster Relief'),
	(3, 'Hunger'),
	(4, 'Animals'),
	(5, 'Education & Literacy'),
	(6, 'Immigrants & Refugees'),
	(7, 'Art\'s & Culture'),
	(8, 'Emergency & Safety'),
	(9, ' International'),
	(10, 'Board Development'),
	(11, 'Employment'),
	(12, 'Justice & Legal'),
	(13, 'Children & Youth'),
	(14, 'Environment'),
	(15, 'LGBT'),
	(16, 'Comunity'),
	(17, 'Faith Based'),
	(18, 'Media & Broadcasting'),
	(19, 'Computers & Technology'),
	(20, 'Health & Medicine'),
	(21, 'Politics'),
	(22, 'Crisis Support'),
	(23, 'Homeless & Housing'),
	(24, 'Race & Ethnicity'),
	(25, 'Seniors'),
	(26, ' Sports & Recreation'),
	(27, 'Veterans & Military'),
	(28, 'Women'),
	(29, 'Health & Fitness'),
	(30, 'Civil Rights & Support');
/*!40000 ALTER TABLE `areas_support` ENABLE KEYS */;

-- Volcando estructura para tabla sympel_db.donations
DROP TABLE IF EXISTS `donations`;
CREATE TABLE IF NOT EXISTS `donations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_public` varchar(8) NOT NULL,
  `id_category` int(11) DEFAULT NULL,
  `id_type` int(11) NOT NULL DEFAULT '1',
  `title` varchar(256) NOT NULL,
  `city` varchar(256) NOT NULL,
  `zip_code` varchar(256) NOT NULL,
  `description` text,
  `why_need` text,
  `images_url` text,
  `keywords` text,
  `condition_new` tinyint(4) DEFAULT '1',
  `checked` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_category` (`id_category`),
  KEY `FK_type` (`id_type`),
  CONSTRAINT `FK_category` FOREIGN KEY (`id_category`) REFERENCES `donations_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_type` FOREIGN KEY (`id_type`) REFERENCES `donation_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sympel_db.donations: ~3 rows (aproximadamente)
DELETE FROM `donations`;
/*!40000 ALTER TABLE `donations` DISABLE KEYS */;
/*!40000 ALTER TABLE `donations` ENABLE KEYS */;

-- Volcando estructura para tabla sympel_db.donations_category
DROP TABLE IF EXISTS `donations_category`;
CREATE TABLE IF NOT EXISTS `donations_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sympel_db.donations_category: ~11 rows (aproximadamente)
DELETE FROM `donations_category`;
/*!40000 ALTER TABLE `donations_category` DISABLE KEYS */;
INSERT INTO `donations_category` (`id`, `name`) VALUES
	(1, 'Office Supplies'),
	(2, 'Automobiles'),
	(3, 'Appliances'),
	(4, 'Furniture'),
	(5, 'Tools'),
	(6, 'Category 12'),
	(7, 'Art\'s & Clothing'),
	(8, 'Sporting Goods'),
	(9, 'Category 13'),
	(10, 'Books'),
	(11, 'Musical Instruments'),
	(12, 'Toys'),
	(13, ' General Equipment');
/*!40000 ALTER TABLE `donations_category` ENABLE KEYS */;

-- Volcando estructura para tabla sympel_db.donation_type
DROP TABLE IF EXISTS `donation_type`;
CREATE TABLE IF NOT EXISTS `donation_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sympel_db.donation_type: ~2 rows (aproximadamente)
DELETE FROM `donation_type`;
/*!40000 ALTER TABLE `donation_type` DISABLE KEYS */;
INSERT INTO `donation_type` (`id`, `name`) VALUES
	(1, 'request'),
	(2, 'post');
/*!40000 ALTER TABLE `donation_type` ENABLE KEYS */;

-- Volcando estructura para tabla sympel_db.profile_account
DROP TABLE IF EXISTS `profile_account`;
CREATE TABLE IF NOT EXISTS `profile_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `profile_type_id` int(11) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `non_profit_name` varchar(128) DEFAULT NULL,
  `company_name` varchar(128) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `state` varchar(128) NOT NULL,
  `city` varchar(128) NOT NULL,
  `zip_code` varchar(128) NOT NULL,
  `phone` varchar(128) DEFAULT NULL,
  `registered_ein` varchar(128) DEFAULT NULL,
  `website` varchar(256) DEFAULT NULL,
  `areas_support` text,
  `mission` text,
  `profile_picture_url` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id_FK` (`user_id`),
  KEY `profile_type_FK` (`profile_type_id`),
  CONSTRAINT `profile_type_FK` FOREIGN KEY (`profile_type_id`) REFERENCES `profile_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_id_FK` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sympel_db.profile_account: ~2 rows (aproximadamente)
DELETE FROM `profile_account`;
/*!40000 ALTER TABLE `profile_account` DISABLE KEYS */;
INSERT INTO `profile_account` (`id`, `user_id`, `profile_type_id`, `firstname`, `lastname`, `non_profit_name`, `company_name`, `title`, `address`, `state`, `city`, `zip_code`, `phone`, `registered_ein`, `website`, `areas_support`, `mission`, `profile_picture_url`) VALUES
	(10, 17, 3, 'Victor', 'Aguilar', '', NULL, '', '', 'san Salvador', 'Soyapango', '1101', '', '12312342341234', '', '["1","2","5","8","11","13","14","19","20","21","22","26","29"]', NULL, '  ');
/*!40000 ALTER TABLE `profile_account` ENABLE KEYS */;

-- Volcando estructura para tabla sympel_db.profile_type
DROP TABLE IF EXISTS `profile_type`;
CREATE TABLE IF NOT EXISTS `profile_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL DEFAULT '0',
  `public_name` varchar(128) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sympel_db.profile_type: ~3 rows (aproximadamente)
DELETE FROM `profile_type`;
/*!40000 ALTER TABLE `profile_type` DISABLE KEYS */;
INSERT INTO `profile_type` (`id`, `name`, `public_name`, `created_at`) VALUES
	(1, 'nonprofit', 'Non Profit', '2017-10-23 13:51:34'),
	(2, 'company', 'Company', '2017-10-23 13:51:43'),
	(3, 'individual', 'Individual', '2017-10-23 13:52:00');
/*!40000 ALTER TABLE `profile_type` ENABLE KEYS */;

-- Volcando estructura para tabla sympel_db.session
DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `id` char(40) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` blob,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sympel_db.session: 1 rows
DELETE FROM `session`;
/*!40000 ALTER TABLE `session` DISABLE KEYS */;
INSERT INTO `session` (`id`, `expire`, `data`) VALUES
	('cv3m5qsfanqrr3ob1953kiupi7', 1512079865, _binary 0x5F5F666C6173687C613A303A7B7D);
/*!40000 ALTER TABLE `session` ENABLE KEYS */;

-- Volcando estructura para tabla sympel_db.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT '0',
  `verified_account` tinyint(4) NOT NULL DEFAULT '0',
  `accessToken` text NOT NULL,
  `authKey` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sympel_db.user: ~1 rows (aproximadamente)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `password_hash`, `password_reset_token`, `email`, `admin`, `verified_account`, `accessToken`, `authKey`, `created_at`, `updated_at`) VALUES
	(17, 'admin', '$2y$13$G.iapHfvmSBZiakNBDF8TuXiiMs7aJqG65KHNPRGX2/EDvPjOfTB6', '', 'valbert1993@gmail.com', 1, 1, 'E4Q-ZmDjqdJXuD0GlPHE4orOQoKuvGtu', 'T0FJUVUAMfhNiAQSzYcSYCIKW2UXuigF', '2017-11-06 02:46:45', '2017-11-30 15:50:16');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
