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
CREATE DATABASE IF NOT EXISTS `sympel_db` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `sympel_db`;

-- Volcando estructura para tabla sympel_db.areas_support
DROP TABLE IF EXISTS `areas_support`;
CREATE TABLE IF NOT EXISTS `areas_support` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sympel_db.areas_support: 0 rows
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

-- Volcando estructura para tabla sympel_db.profile_type
DROP TABLE IF EXISTS `profile_type`;
CREATE TABLE IF NOT EXISTS `profile_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sympel_db.profile_type: 0 rows
DELETE FROM `profile_type`;
/*!40000 ALTER TABLE `profile_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `profile_type` ENABLE KEYS */;

-- Volcando estructura para tabla sympel_db.session
DROP TABLE IF EXISTS `session`;
CREATE TABLE IF NOT EXISTS `session` (
  `id` char(40) NOT NULL,
  `expire` int(11) DEFAULT NULL,
  `data` blob,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sympel_db.session: 2 rows
DELETE FROM `session`;
/*!40000 ALTER TABLE `session` DISABLE KEYS */;
INSERT INTO `session` (`id`, `expire`, `data`) VALUES
	('rf630vpct863ng220krs6us9l4', 1508639287, _binary 0x5F5F666C6173687C613A303A7B7D5F5F69647C693A323B),
	('2p12f9jbh5kk0iqmgc17t8p137', 1508640419, _binary 0x5F5F666C6173687C613A303A7B7D);
/*!40000 ALTER TABLE `session` ENABLE KEYS */;

-- Volcando estructura para tabla sympel_db.user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sympel_db.user: 1 rows
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `password_hash`, `password_reset_token`, `email`, `created_at`, `updated_at`) VALUES
	(2, 'admin', '$2y$13$KUUvBJIf/IoKbqmwqvdpcu3bme7kVqm3XTmLwl1EJpgsVXUsF7HQ6', '0', 'admin@test.com', '2017-10-21 17:34:58', '2017-10-21 18:10:56');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
