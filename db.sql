-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.27-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table test.department
DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `order` int(11) NOT NULL,
  `status` enum('1','2') NOT NULL COMMENT '''1'' => ''Active'' , ''2'' => ''Inactive''',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tiltle` (`name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- Dumping data for table test.department: ~3 rows (approximately)
DELETE FROM `department`;
/*!40000 ALTER TABLE `department` DISABLE KEYS */;
INSERT INTO `department` (`id`, `name`, `order`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
	(1, 'IT', 1, '1', '2023-01-19 00:08:21', 170, '2023-05-17 16:46:19', 170);
/*!40000 ALTER TABLE `department` ENABLE KEYS */;

-- Dumping structure for table test.designation
DROP TABLE IF EXISTS `designation`;
CREATE TABLE IF NOT EXISTS `designation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `order` int(11) NOT NULL,
  `status` enum('1','2') NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tiltle` (`title`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- Dumping data for table test.designation: ~2 rows (approximately)
DELETE FROM `designation`;
/*!40000 ALTER TABLE `designation` DISABLE KEYS */;
INSERT INTO `designation` (`id`, `title`, `order`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
	(1, 'Executive Director', 1, '1', '2022-05-22 13:44:55', 170, '2023-05-17 10:23:23', 170);
/*!40000 ALTER TABLE `designation` ENABLE KEYS */;

-- Dumping structure for table test.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `first_name` varchar(45) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `official_name` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `phone_no` varchar(16) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `password_changed` tinyint(4) DEFAULT NULL,
  `photo` varchar(200) DEFAULT NULL,
  `status` enum('active','inactive') NOT NULL,
  `is_admin` enum('1','2') DEFAULT NULL,
  `recovery_attempt` datetime DEFAULT NULL,
  `recovery_link` varchar(1000) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `group_id` (`group_id`),
  KEY `rank_id` (`designation_id`) USING BTREE,
  KEY `appointment_id` (`department_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table test.users: ~1 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `group_id`, `designation_id`, `department_id`, `first_name`, `last_name`, `official_name`, `email`, `phone_no`, `username`, `password`, `password_changed`, `photo`, `status`, `is_admin`, `recovery_attempt`, `recovery_link`, `remember_token`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
	(1, 1, 1, 1, 'Shakil', 'Hossen', NULL, 'admin@gmail.com', NULL, 'admin', '$2y$10$VkgcWvPpY5cAJBTwNuv9duGIkkYk.sv66BeFWuErmeroijMTdhUY.', NULL, NULL, 'active', '1', NULL, NULL, NULL, '2023-05-16 10:32:57', NULL, '2023-05-16 16:33:21', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table test.user_group
DROP TABLE IF EXISTS `user_group`;
CREATE TABLE IF NOT EXISTS `user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `info` text DEFAULT NULL,
  `order` int(11) NOT NULL,
  `status` enum('1','2') NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table test.user_group: ~0 rows (approximately)
DELETE FROM `user_group`;
/*!40000 ALTER TABLE `user_group` DISABLE KEYS */;
INSERT INTO `user_group` (`id`, `name`, `info`, `order`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
	(1, 'Administrator', 'Admin', 1, '1', '2023-05-17 10:07:40', 1, '2023-05-17 10:22:31', 1);
/*!40000 ALTER TABLE `user_group` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
