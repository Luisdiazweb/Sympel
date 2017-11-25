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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sympel_db.profile_account: ~2 rows (aproximadamente)
DELETE FROM `profile_account`;
/*!40000 ALTER TABLE `profile_account` DISABLE KEYS */;
INSERT INTO `profile_account` (`id`, `user_id`, `profile_type_id`, `firstname`, `lastname`, `non_profit_name`, `company_name`, `title`, `address`, `state`, `city`, `zip_code`, `phone`, `registered_ein`, `website`, `areas_support`, `mission`, `profile_picture_url`) VALUES
	(10, 17, 3, 'Victor', 'Aguilar', '', NULL, '', '', 'san Salvador', 'Soyapango', '1101', '', '12312342341234', '', '["1","2","5","8","11","13","14","19","20","21","22","26","29"]', NULL, '  '),
	(11, 18, 3, 'Victor', 'Aguilar', NULL, NULL, NULL, NULL, 'san Salvador', 'Soyapango', '1101', '79283733', NULL, NULL, '["2"]', NULL, NULL);
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

-- Volcando datos para la tabla sympel_db.session: 3 rows
DELETE FROM `session`;
/*!40000 ALTER TABLE `session` DISABLE KEYS */;
INSERT INTO `session` (`id`, `expire`, `data`) VALUES
	('2kper34g8v012a2vtchctkpsp4', 1511393998, _binary 0x5F5F666C6173687C613A303A7B7D63757272656E745F737465707C693A323B70726F66696C655F747970657C4E3B73746570735F7369676E75707C613A333A7B733A373A227369676E757031223B613A323A7B733A353A225F63737266223B733A38383A226A764F3167546C6675464E346A44494B45374B594E4368433871517753414A764159646469664D48696E54424C634F31423651765F736F6F6F596A71686F6E304331347046697866417165364C4D7646797A473530773D3D223B733A31343A2250726F66696C654163636F756E74223B613A313A7B733A31353A2270726F66696C655F747970655F6964223B733A313A2233223B7D7D733A373A227369676E757032223B613A333A7B733A353A225F63737266223B733A38383A22616A6C684E53486342755F7173744D695769746D75335771554476473433427737433147665F7864346C6B6C3578634248796552516C6757514B436A483364375672614C69647230634C68586874417A784776525F673D3D223B733A31343A2250726F66696C654163636F756E74223B613A323A7B733A393A2266697273746E616D65223B733A363A22566963746F72223B733A383A226C6173746E616D65223B733A373A22416775696C6172223B7D733A31313A22557365727353797374656D223B613A343A7B733A353A22656D61696C223B733A32313A22766963746F72406463636F6C6F727765622E636F6D223B733A383A22757365726E616D65223B733A343A2274657374223B733A31333A2270617373776F72645F68617368223B733A363A22313233343536223B733A31353A2270617373776F72645F726570656174223B733A363A22313233343536223B7D7D733A373A227369676E757033223B613A323A7B733A353A225F63737266223B733A38383A22786738346573684A556E554751767954655462574B7749346B5A6879556D617379696B574A7833563152324A3055354F39724C46324C546D62784741417366724953524B4B6D35465A6D5278676F42724A65506D75673D3D223B733A31343A2250726F66696C654163636F756E74223B613A363A7B733A32323A2270726F66696C655F706963747572655F75706C6F6164223B733A303A22223B733A353A227374617465223B733A31323A2273616E2053616C7661646F72223B733A343A2263697479223B733A393A22536F796170616E676F223B733A383A227A69705F636F6465223B733A343A2231313031223B733A353A2270686F6E65223B733A383A223739323833373333223B733A31333A2261726561735F737570706F7274223B613A313A7B693A303B733A313A2232223B7D7D7D7D5F5F69647C693A31383B),
	('v5h6burkhhq5mh2i5bei7ekub0', 1511393985, _binary 0x5F5F666C6173687C613A303A7B7D5F5F69647C693A31373B),
	('op679dko54bkfrqe9mogm9rr64', 1511549234, _binary 0x5F5F666C6173687C613A303A7B7D5F5F69647C693A31373B);
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
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla sympel_db.user: ~1 rows (aproximadamente)
DELETE FROM `user`;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `password_hash`, `password_reset_token`, `email`, `admin`, `verified_account`, `accessToken`, `authKey`, `created_at`, `updated_at`) VALUES
	(17, 'admin', '$2y$13$G.iapHfvmSBZiakNBDF8TuXiiMs7aJqG65KHNPRGX2/EDvPjOfTB6', 'BxOvQwdt70yAHAFIJ_5y7HSuovezNf42', 'valbert1993@gmail.com', 1, 1, 'E4Q-ZmDjqdJXuD0GlPHE4orOQoKuvGtu', 'T0FJUVUAMfhNiAQSzYcSYCIKW2UXuigF', '2017-11-06 02:46:45', '2017-11-22 12:35:16'),
	(18, 'test', '$2y$13$9.WnXQK8rxdzLOWPxzoBKe6MGb2s4Ig/DvlcrzPFBluWLzhnFR0z6', NULL, 'victor@dccolorweb.com', 0, 1, 'nYoeJco9QCfrZCfBHqmowhZrUVLDHyeC', 'IMPLe7RjDHQPZbc2s76sUdyQAButpqd-', '2017-11-22 17:14:44', '2017-11-22 17:15:44');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
