-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.22-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table test.brand
DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL,
  `status` enum('1','2') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive',
  `slug` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `tiltle` (`code`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- Dumping data for table test.brand: ~2 rows (approximately)
DELETE FROM `brand`;
INSERT INTO `brand` (`id`, `name`, `code`, `photo`, `order`, `status`, `slug`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
	(1, 'Asus', 'asus', '646f3d4da661a79183.jpg', 1, '1', 'asus-1', '2023-05-25 10:44:58', 1, '2023-05-25 10:49:49', 1),
	(2, 'HP', 'hp', '646f3db8313a1hewlett-packard-logo-black-and-white.png', 2, '1', 'hp-2', '2023-05-25 10:51:36', 1, '2023-05-25 10:51:36', 1);

-- Dumping structure for table test.department
DROP TABLE IF EXISTS `department`;
CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `status` enum('1','2') COLLATE utf8_unicode_ci NOT NULL COMMENT '''1'' => ''Active'' , ''2'' => ''Inactive''',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tiltle` (`name`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- Dumping data for table test.department: ~1 rows (approximately)
DELETE FROM `department`;
INSERT INTO `department` (`id`, `name`, `order`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
	(1, 'IT', 1, '1', '2023-01-19 00:08:21', 170, '2023-05-17 16:46:19', 170);

-- Dumping structure for table test.designation
DROP TABLE IF EXISTS `designation`;
CREATE TABLE IF NOT EXISTS `designation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `status` enum('1','2') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `tiltle` (`title`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- Dumping data for table test.designation: ~1 rows (approximately)
DELETE FROM `designation`;
INSERT INTO `designation` (`id`, `title`, `order`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
	(1, 'Manager', 1, '1', '2022-05-22 13:44:55', 170, '2023-05-17 19:07:16', 1);

-- Dumping structure for table test.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.failed_jobs: ~0 rows (approximately)
DELETE FROM `failed_jobs`;

-- Dumping structure for table test.jobs
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.jobs: ~1 rows (approximately)
DELETE FROM `jobs`;

-- Dumping structure for table test.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.migrations: ~6 rows (approximately)
DELETE FROM `migrations`;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_05_09_143533_create_designations_table', 1),
	(6, '2023_05_24_062612_create_jobs_table', 2);

-- Dumping structure for table test.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;

-- Dumping structure for table test.personal_access_tokens
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.personal_access_tokens: ~0 rows (approximately)
DELETE FROM `personal_access_tokens`;

-- Dumping structure for table test.product_category
DROP TABLE IF EXISTS `product_category`;
CREATE TABLE IF NOT EXISTS `product_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL,
  `status` enum('1','2') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive',
  `slug` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- Dumping data for table test.product_category: ~2 rows (approximately)
DELETE FROM `product_category`;
INSERT INTO `product_category` (`id`, `name`, `photo`, `order`, `status`, `slug`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
	(1, 'Fashion', '646f714d5d083fashion.jpg', 1, '1', 'fashion-1', '2023-05-25 14:31:41', 1, '2023-05-25 14:32:20', 1),
	(2, 'Hardware', '646f715c54166723-7237327_hardware-56-icons.png', 2, '1', 'hardware-2', '2023-05-25 14:31:56', 1, '2023-05-25 14:31:56', 1);

-- Dumping structure for table test.unit
DROP TABLE IF EXISTS `unit`;
CREATE TABLE IF NOT EXISTS `unit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `info` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `status` enum('1','2') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE KEY `tiltle` (`info`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- Dumping data for table test.unit: ~1 rows (approximately)
DELETE FROM `unit`;
INSERT INTO `unit` (`id`, `title`, `info`, `order`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
	(1, 'pc', 'Piece', 1, '1', '2023-05-25 10:55:54', 1, '2023-05-25 10:55:54', 1);

-- Dumping structure for table test.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL,
  `first_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `official_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `phone_no` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('active','inactive') COLLATE utf8_unicode_ci NOT NULL,
  `is_admin` enum('1','2') COLLATE utf8_unicode_ci DEFAULT NULL,
  `recovery_attempt` datetime DEFAULT NULL,
  `recovery_link` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `group_id` (`group_id`),
  KEY `rank_id` (`designation_id`) USING BTREE,
  KEY `appointment_id` (`department_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table test.users: ~3 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `group_id`, `designation_id`, `department_id`, `first_name`, `last_name`, `official_name`, `email`, `phone_no`, `username`, `password`, `photo`, `status`, `is_admin`, `recovery_attempt`, `recovery_link`, `remember_token`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
	(1, 1, 1, 1, 'Shakil', 'Hossen', 'Shakil', 'admin@gmail.com', '0176546363', 'admin', '$2y$10$ckZrosUF5vilpF2kmySD0e0UKurRQTW7W/hRF7SRGLTbVG19mSY6S', '64651f6e04d4ashakil.jpg', 'active', '1', NULL, NULL, NULL, '2023-05-16 10:32:57', NULL, '2023-05-17 18:40:42', 1),
	(6, 1, 1, 1, 'Muhtasim', 'Riyon', 'Riyon', 'shakils923@gmail.com', '016355267383', 'riyon', '$2y$10$/XLPjl782FDM14aeQbauNuQ0HIeLRHzwhcdOwX.OBi7iG8WAPLgEW', '64652725bbf47avatar5.png', 'active', '1', NULL, NULL, 'YBFI4f2LZVBuspL497Pobv4tbfgUolYGrbYHcH8iLsBzUukTrTyOdNnvTMCm', '2023-05-17 16:51:23', 1, '2023-05-25 13:54:28', 6),
	(7, 1, 1, 1, 'Sajjad', 'Ashik', 'Sajjad', 'shakilhossen566@gmail.com', '0173645721', 'sajjad', '$2y$10$lu5vwkIm9OCxJyfitThLEO2hqI/bebYONGZIyJ8Zqxw57bBJK03Li', '6465270a025a0avatar5.png', 'inactive', '1', NULL, NULL, NULL, '2023-05-17 19:10:37', 1, '2023-05-25 08:39:49', 1);

-- Dumping structure for table test.user_group
DROP TABLE IF EXISTS `user_group`;
CREATE TABLE IF NOT EXISTS `user_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `info` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL,
  `status` enum('1','2') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table test.user_group: ~1 rows (approximately)
DELETE FROM `user_group`;
INSERT INTO `user_group` (`id`, `name`, `info`, `order`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
	(1, 'Administrator', 'Admin', 1, '1', '2023-05-17 10:07:40', 1, '2023-05-17 10:22:31', 1);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
