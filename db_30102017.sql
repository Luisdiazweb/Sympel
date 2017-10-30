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

-- Volcando estructura para tabla sympel_db.profile_account
DROP TABLE IF EXISTS `profile_account`;
CREATE TABLE IF NOT EXISTS `profile_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `profile_type_id` int(11) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `non_profit_name` varchar(128) DEFAULT NULL,
  `title` varchar(128) DEFAULT NULL,
  `address` varchar(128) DEFAULT NULL,
  `state` varchar(128) DEFAULT NULL,
  `city` varchar(128) DEFAULT NULL,
  `zip_code` varchar(128) DEFAULT NULL,
  `phone` varchar(128) DEFAULT NULL,
  `registered_ein` varchar(128) DEFAULT NULL,
  `website` varchar(256) DEFAULT NULL,
  `areas_support` text,
  PRIMARY KEY (`id`),
  KEY `user_id_FK` (`user_id`),
  KEY `profile_type_FK` (`profile_type_id`),
  CONSTRAINT `profile_type_FK` FOREIGN KEY (`profile_type_id`) REFERENCES `profile_type` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `user_id_FK` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sympel_db.profile_account: ~2 rows (aproximadamente)
DELETE FROM `profile_account`;
/*!40000 ALTER TABLE `profile_account` DISABLE KEYS */;
INSERT INTO `profile_account` (`id`, `user_id`, `profile_type_id`, `firstname`, `lastname`, `non_profit_name`, `title`, `address`, `state`, `city`, `zip_code`, `phone`, `registered_ein`, `website`, `areas_support`) VALUES
	(4, 11, 1, 'Luis ', 'Diaz', 'DCCOLORWEB', 'Founder', '15 calle poniente ', 'La libertad', 'Santa Tecla', '00000', '22296700', '123456', 'www.dccolorweb.co', '["19","20"]'),
	(5, 12, 1, 'Eric', 'Melson', 'sympel', 'founder', 'Houston ', 'Texas', 'Houston', '76010', '000000000000000', '12345678910', 'www.sympel.com', '["8","13"]');
/*!40000 ALTER TABLE `profile_account` ENABLE KEYS */;

-- Volcando estructura para tabla sympel_db.profile_type
DROP TABLE IF EXISTS `profile_type`;
CREATE TABLE IF NOT EXISTS `profile_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sympel_db.profile_type: ~3 rows (aproximadamente)
DELETE FROM `profile_type`;
/*!40000 ALTER TABLE `profile_type` DISABLE KEYS */;
INSERT INTO `profile_type` (`id`, `name`, `created_at`) VALUES
	(1, 'nonprofit', '2017-10-23 13:51:34'),
	(2, 'company', '2017-10-23 13:51:43'),
	(3, 'individual', '2017-10-23 13:52:00');
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
	('bclp5bpb66tpdbnnprdljb9fr1', 1509148861, _binary 0x5F5F666C6173687C613A303A7B7D);
/*!40000 ALTER TABLE `session` ENABLE KEYS */;

-- Volcando estructura para tabla sympel_db.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `verified_account` tinyint(4) NOT NULL DEFAULT '0',
  `authKey` varchar(250) NOT NULL DEFAULT '0',
  `accessToken` varchar(250) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sympel_db.user: ~5 rows (aproximadamente)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `password_hash`, `password_reset_token`, `email`, `verified_account`, `authKey`, `accessToken`, `created_at`, `updated_at`) VALUES
	(2, 'admin', '$2y$13$KUUvBJIf/IoKbqmwqvdpcu3bme7kVqm3XTmLwl1EJpgsVXUsF7HQ6', '0', 'admin@test.com', 0, '0', '0', '2017-10-21 17:34:58', '2017-10-21 18:10:56'),
	(3, 'test', '$2y$13$QI.mh7hQrjCrQgLsIArRVOojtpUwwfwzvofFgpkRvfWO0Xk8ntGIe', '0', 'valbert1993@gmail.com', 0, '0', '0', '2017-10-24 06:54:13', '2017-10-26 15:10:24'),
	(5, 'test2', '$2y$13$.ODSpqrxmMUWfeYU8fw4uujNCiS30JLskcJWTcR3Try7HYyr/IK8S', '0', 'valbert1993@gmail.co', 0, '0', '0', '2017-10-24 23:59:20', '2017-10-26 15:10:26'),
	(11, 'DCCOLORWEB', '$2y$13$.FtH/DOMfUn39xeTCmdBI.g3GHcKe/woxmYKIprjAQ60BpP9Dl.Vi', NULL, 'luisd@dccolorweb.com', 0, '0', '0', '2017-10-27 16:50:57', '2017-10-27 16:54:14'),
	(12, 'sympel', '$2y$13$a.vkefuvkjicuI/ewvezCucbGwyuGfT/9ZBCsnWJ1XmRLBgmqvofG', NULL, 'Eric@sympel.com', 0, '0', '0', '2017-10-27 17:09:35', '2017-10-27 17:09:35');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
