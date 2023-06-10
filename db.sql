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

-- Dumping structure for table test.banner
DROP TABLE IF EXISTS `banner`;
CREATE TABLE IF NOT EXISTS `banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `link` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_d_x` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Image for desktop 1x  (588x260)',
  `title` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `subtitle` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `price_info` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `position` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '1 = left 2 = center',
  `order` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status_id` tinyint(2) NOT NULL COMMENT '1 = Active, 0 = Inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table test.banner: ~2 rows (approximately)
DELETE FROM `banner`;
INSERT INTO `banner` (`id`, `caption`, `link`, `img_d_x`, `title`, `subtitle`, `price_info`, `price`, `url`, `position`, `order`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status_id`) VALUES
	(1, NULL, NULL, 'banner_image6375aac4e4b33.jpg', NULL, NULL, NULL, NULL, NULL, 'slide-1', 1, 1, 1, '2021-07-28 13:32:26', '2022-11-17 09:30:13', 1),
	(2, NULL, NULL, 'banner_image6375aad61ad14.jpg', NULL, NULL, NULL, NULL, NULL, 'slide-1', 2, 1, 1, '2021-07-28 13:35:15', '2022-11-17 09:30:30', 1);

-- Dumping structure for table test.brand
DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `photo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `status` enum('1','2') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=active,2=inactive',
  `slug` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- Dumping data for table test.brand: ~6 rows (approximately)
DELETE FROM `brand`;
INSERT INTO `brand` (`id`, `name`, `code`, `photo`, `order`, `status`, `slug`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
	(1, 'Asus', 'asus', '646f3d4da661a79183.jpg', 1, '1', 'asus-1', '2023-05-25 10:44:58', 1, '2023-05-25 10:49:49', 1),
	(2, 'HP', 'hp', '646f3db8313a1hewlett-packard-logo-black-and-white.png', 2, '1', 'hp-2', '2023-05-25 10:51:36', 1, '2023-05-25 10:51:36', 1),
	(3, 'Twelve', 'twelve', NULL, 3, '1', 'twelve-3', '2023-05-27 18:26:00', 1, '2023-05-27 18:26:00', 1),
	(6, 'Bell', 'bell', NULL, 4, '1', 'bell-6', '2023-06-10 08:42:52', 1, '2023-06-10 08:43:42', 1),
	(7, 'Easy', 'easy', NULL, 5, '1', 'easy-7', '2023-06-10 08:42:52', 1, '2023-06-10 08:42:52', 1);

-- Dumping structure for table test.company_information
DROP TABLE IF EXISTS `company_information`;
CREATE TABLE IF NOT EXISTS `company_information` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` text COLLATE utf8_unicode_ci NOT NULL,
  `google_emed` text COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hotline` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `street_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` int(11) unsigned DEFAULT NULL,
  `state_id` int(11) unsigned DEFAULT NULL,
  `zip_code` int(11) unsigned DEFAULT NULL,
  `vat` decimal(10,2) NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `include_vat` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '0=No,1=Yes',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table test.company_information: ~1 rows (approximately)
DELETE FROM `company_information`;
INSERT INTO `company_information` (`id`, `name`, `address`, `google_emed`, `phone_number`, `email`, `website`, `hotline`, `street_address`, `city`, `country_id`, `state_id`, `zip_code`, `vat`, `logo`, `include_vat`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
	(1, 'Spring Hill', 'Road 24, House 31 Gulshan-1, Dhaka, 1212, Bangladesh', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.9421298833868!2d90.41384491545246!3d23.78507499336666!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7a1ddca06a3%3A0x754050d99862b80!2sSpring%20Hill%20Apartments!5e0!3m2!1sen!2sus!4v1667716117225!5m2!1sen!2sus', '{"a639006aa794cb":"+8801936010656"}', 'springHill@gmail.com', 'https://www.springhill.com/', '01936010653', 'Road 24, House 31 Gulshan-1', 'Dhaka', 18, 0, 1212, 0.00, '1_635a6a0a07b91.png', '0', '2020-01-07 18:27:16', 1, '2022-12-07 09:28:29', 1);

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
  PRIMARY KEY (`id`)
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
  PRIMARY KEY (`id`)
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

-- Dumping structure for table test.faq
DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` tinyint(4) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table test.faq: ~5 rows (approximately)
DELETE FROM `faq`;
INSERT INTO `faq` (`id`, `title`, `description`, `order`, `status`, `created_by`, `created_at`, `updated_by`, `updated_at`) VALUES
	(1, 'Where are you located?', '<p>It’s your opportunity to communicate with the most important visitors to your website – those who have begun the decision-making process about whether to do business with you.</p><p>Some companies use FAQs to store information they can’t fit elsewhere on their website. Yet your answers are a valuable opportunity to guide prospects towards making their purchase. A carefully crafted FAQ page is the most effective way to provide all the answers.</p>', 1, 1, 170, '2021-07-01 23:41:44', 170, '2022-03-28 17:06:02'),
	(2, 'How can I book rooms?', '<p><span style="color: rgb(0, 0, 0); font-family: "Open Sans", Arial, sans-serif; text-align: justify;">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur</span><br></p>', 2, 1, 170, '2021-07-11 22:31:52', 1, '2022-12-07 09:59:07'),
	(3, 'Do I have to come to booking also?', '<p><span style="color: rgb(0, 0, 0); font-family: "Open Sans", Arial, sans-serif; text-align: justify;">Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</span><br></p>', 3, 1, 170, '2021-07-11 22:32:46', 1, '2022-12-07 09:59:32'),
	(4, 'What is your confirmation time after booking?', '<p><span style="color: rgb(0, 0, 0); font-family: "Open Sans", Arial, sans-serif; text-align: justify;">On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.</span><br></p>', 4, 1, 170, '2021-07-11 22:34:47', 1, '2022-12-07 09:59:55'),
	(6, 'Is SpringHill a foreign company or local company?', '<p><span style="color: rgb(0, 0, 0);">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur</span><br></p>', 5, 1, 170, '2022-03-28 17:23:19', 1, '2022-12-07 09:58:44');

-- Dumping structure for table test.footer_menu
DROP TABLE IF EXISTS `footer_menu`;
CREATE TABLE IF NOT EXISTS `footer_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) DEFAULT NULL,
  `status_id` tinyint(2) NOT NULL COMMENT '1 = Active, 0 = Inactive',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table test.footer_menu: ~2 rows (approximately)
DELETE FROM `footer_menu`;
INSERT INTO `footer_menu` (`id`, `title`, `slug`, `content`, `order`, `status_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	(15, 'Cancelation Policy', 'cancelation-policy-15', '<p style="text-align: center; "><span style="font-family: "Open Sans", Arial, sans-serif; font-size: 14px; text-align: justify;"><b>Spring Hill</b> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p><p style="text-align: center; "><span style="font-family: "Open Sans", Arial, sans-serif; font-size: 14px; font-weight: 700; text-align: justify;">Spring Hill</span><span style="font-family: "Open Sans", Arial, sans-serif; font-size: 14px; text-align: justify;"> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><span style="font-family: "Open Sans", Arial, sans-serif; font-size: 14px; text-align: justify;"><br></span><br></p><p><br></p>', 2, 1, 1, 1, '2021-07-31 07:28:33', '2022-12-08 12:39:14'),
	(16, 'Privacy Policy', 'privacy-policy-16', '<p>This Privacy Policy describes how your personal information is collected, used, and shared when you visit or make a purchase from <a href="http://www.rebekasattire.com.">www.rebekasattire.com.</a></p><p><b>WHAT PERSONAL INFORMATION WE COLLECT</b></p><p>When you visit the Site, we automatically collect certain information about your device, including information about your web browser, IP address, time zone, and some of the cookies that are installed on your device.</p><p>Additionally, as you browse the Site, we collect information about the individual web pages or products that you view, what websites or search terms referred you to the Site, and information about how you interact with the Site. We refer to this automatically collected information as Device Information.</p><p>We collect Device Information using the following technologies:</p><ul><li>Cookies are data files that are placed on your device or computer and often include an anonymous unique identifier.</li><li>Log files track actions occurring on the Site, and collect data including your IP address, browser type, referring/exit pages, and date/time stamps.</li></ul><p>Also, when you make a purchase or attempt to make a purchase through the Site, we collect certain information from you, including your name, billing address, shipping address, payment information (including credit card numbers email address, and phone number. This is called Order Information.</p><p>By Personal Information in this Privacy Policy, we are talking both about Device Information and Order Information.</p><p><b>HOW DO WE USE YOUR PERSONAL INFORMATION</b></p><p>We use the Order Information that we collect generally to fulfill any orders placed through the Site (including processing your payment information, arranging for shipping, and providing you with invoices and/or order confirmations).</p><p>Additionally, we use this Order Information to:</p><ul><li>Communicate with you.</li><li>Screen our orders for potential risk or fraud.</li><li>When in line with the preferences you have shared with us, provide you with information or advertising relating to our products or services.</li></ul><p>We use the Device Information that we collect to help us screen for potential risk and fraud (in particular, your IP address), and more generally to improve and optimize our Site.</p><p><b>SHARING YOUR PERSONAL INFORMATION</b></p><p>We share your Personal Information with third parties to help us use your Personal Information, as described above.</p><p>We also use Google Analytics to help us understand how our customers use (Store Name). <a target="_blank" href="https://www.google.com/intl/en/policies/privacy/">How Google uses your Personal Information.</a></p><p>Finally, we may also share your Personal Information to comply with applicable laws and regulations, to respond to a subpoena, search warrant or other lawful requests for information we receive, or to otherwise protect our rights.</p><p><b>YOUR RIGHTS</b></p><p>If you are a European resident, you have the right to access the personal information we hold about you and to ask that your personal information is corrected, updated, or deleted. If you would like to exercise this right, please contact us.</p><p>Additionally, if you are a European resident we note that we are processing your information in order to fulfill contracts we might have with you (for example if you make an order through the Site), or otherwise to pursue our legitimate business interests listed above.</p><p>Please note that your information will be transferred outside of Europe, including to Canada and the United States.</p><p><b>DATA RETENTION</b></p><p>When you place an order through the Site, we will maintain your Order Information for our records unless and until you ask us to delete this information.</p><p><b>CHANGES</b></p><p>We may update this privacy policy from time to time in order to reflect, for example, changes to our practices or for other operational, legal or regulatory reasons.</p><p>If you have questions and/or require more information, do not hesitate to contact us info@rebekasattire.com.</p><p><br></p>', 1, 1, 1, 1, '2021-07-31 07:33:24', '2022-12-06 18:03:47'),
	(17, 'Terms & Conditions', 'terms-conditions-17', '<div><font face="Symbol"><span style="font-size: 16px;">•<span style="white-space:pre">	</span>Guest up to Twelve (12) years of age is defined as Children and above Twelve (12) years of age is defined as Adult.</span></font></div><div><font face="Symbol"><span style="font-size: 16px;">•<span style="white-space:pre">	</span>Child below 8 years of age is complimentary both accommodation and buffet breakfast.</span></font></div><div><font face="Symbol"><span style="font-size: 16px;">•<span style="white-space:pre">	</span>Child age 8 to 12 years 50% of Regular Charge.</span></font></div><div><font face="Symbol"><span style="font-size: 16px;">•<span style="white-space:pre">	</span>Our Check-In time at 2:00 PM.</span></font></div><div><font face="Symbol"><span style="font-size: 16px;">•<span style="white-space:pre">	</span>Our Check-Out time at 12:00 PM.</span></font></div><div><font face="Symbol"><span style="font-size: 16px;">•<span style="white-space:pre">	</span>Check-In before 2:00 PM will be considered as early Check-In, which is chargeable and subject to availability of room for that particular day.</span></font></div><div><font face="Symbol"><span style="font-size: 16px;">•<span style="white-space:pre">	</span>Check-Out after 12:00 PM will be considered as late Check-Out, which is chargeable and subject to availability of room for that particular day.</span></font></div><div><font face="Symbol"><span style="font-size: 16px;">•<span style="white-space:pre">	</span>Guest must present his/her valid National ID Card/Passport/Driving License/Company photo ID card upon Check-In.</span></font></div><div><font face="Symbol"><span style="font-size: 16px;">•<span style="white-space:pre">	</span>Guest up to Twelve (12) years of age is defined as Children and above Twelve (12) years of age is defined as Adult.</span></font></div><div><font face="Symbol"><span style="font-size: 16px;">•<span style="white-space:pre">	</span>Child below 8 years of age is complimentary both accommodation and buffet breakfast.</span></font></div><div><font face="Symbol"><span style="font-size: 16px;">•<span style="white-space:pre">	</span>Child age 8 to 12 years 50% of Regular Charge.</span></font></div><div><font face="Symbol"><span style="font-size: 16px;">•<span style="white-space:pre">	</span>Our Check-In time at 2:00 PM.</span></font></div><div><font face="Symbol"><span style="font-size: 16px;">•<span style="white-space:pre">	</span>Our Check-Out time at 12:00 PM.</span></font></div><div><font face="Symbol"><span style="font-size: 16px;">•<span style="white-space:pre">	</span>Check-In before 2:00 PM will be considered as early Check-In, which is chargeable and subject to availability of room for that particular day.</span></font></div><div><font face="Symbol"><span style="font-size: 16px;">•<span style="white-space:pre">	</span>Check-Out after 12:00 PM will be considered as late Check-Out, which is chargeable and subject to availability of room for that particular day.</span></font></div><div><font face="Symbol"><span style="font-size: 16px;">•<span style="white-space:pre">	</span>Guest must present his/her valid National ID Card/Passport/Driving License/Company photo ID card upon Check-In.</span></font></div><div><font face="Symbol"><span style="font-size: 16px;"><br></span></font></div><div><font face="Symbol"><span style="font-size: 16px;">•<span style="white-space:pre">	</span>US Dollar Conversion Rate depends on the Government bank rate.</span></font></div><div><font face="Symbol"><span style="font-size: 16px;">•<span style="white-space:pre">	</span>All above rates are in USD and inclusive of 10% Service Charge &amp; 15% VAT.</span></font></div><div><font face="Symbol"><span style="font-size: 16px;">•<span style="white-space:pre">	</span>All rates mentioned in the Quotation are exclusive of AIT which will be added with the bill on the basis of Income Tax Ordinance, 1984, (Income Tax Manual [Part 1], Section – 52P.</span></font></div><div><font face="Symbol"><span style="font-size: 16px;">•<span style="white-space:pre">	</span>As this is a very exclusive offer, by singing this agreement, relevant parties agree to keep this offer details confidential.</span></font></div><div><font face="Symbol"><span style="font-size: 16px;">•<span style="white-space:pre">	</span>For any individual booking: Cancellation Notice must be given at-least 72 hours prior to Arrival/Check-In date.</span></font></div><div><font face="Symbol"><span style="font-size: 16px;"><br></span></font></div><div><font face="Symbol"><span style="font-size: 16px;">•<span style="white-space:pre">	</span>In Case of Flight Delay or Cancellation due to Technical or Weather disruption then No Cancellation charge will be applied.</span></font></div><div><font face="Symbol"><span style="font-size: 16px;">•<span style="white-space:pre">	</span>If guest wants to Cancel or Change Date of Room Reservation before 72 Hour of flight departure time (Standard Time of Departure) then No charge will be applied.</span></font></div><div><font face="Symbol"><span style="font-size: 16px;">•<span style="white-space:pre">	</span>If Cancellation made after the period of notice OR No-showed on the Date of Stay at Hotel then one Night Hotel Charge with 15% VAT and 10% Service Charge will be deducted only from the advance payment.</span></font></div><div><font face="Symbol"><span style="font-size: 16px;">•<span style="white-space:pre">	</span>For any Group Booking (Minimum 5 Rooms), Cancellation Notice must be given at least 10 days prior to Arrival/Check-in date.</span></font></div><div><font face="Symbol"><span style="font-size: 16px;">•<span style="white-space:pre">	</span>In case of Group Booking, the above terms and conditions can be negotiated and re-defined as per mutual consent of Guests and Apartment Authorities.</span></font></div><div><font face="Symbol"><span style="font-size: 16px;">•<span style="white-space:pre">	</span>Re-Issue date is applicable subject to availability of apartment rooms.</span></font></div><div><font face="Symbol"><span style="font-size: 16px;">•<span style="white-space:pre">	</span>All the rates quoted above are Non-Commissionable even when the reservation is made by the nominated Travel Agent of the Preferred Corporate Client.</span></font></div><div><font face="Symbol"><span style="font-size: 16px;">•<span style="white-space:pre">	</span>The company will make and advance reservation with the hotel and the hotel will confirm the reservation subject to availability.</span></font></div><div><font face="Symbol"><span style="font-size: 16px;">•<span style="white-space:pre">	</span>For any individual booking: Cancellation Notice must be given at-least 72 hours prior to Arrival/Check-In date.</span></font></div><div><font face="Symbol"><span style="font-size: 16px;">•<span style="white-space:pre">	</span>In Case of Flight Delay or Cancellation due to Technical or Weather disruption then No Cancellation charge will be applied.</span></font></div><div><font face="Symbol"><span style="font-size: 16px;">•<span style="white-space:pre">	</span>If guest wants to Cancel or Change Date of Room Reservation before 72 Hour of flight departure time (Standard Time of Departure) then No charge will be applied.</span></font></div><div><font face="Symbol"><span style="font-size: 16px;">•<span style="white-space:pre">	</span>If Cancellation made after the period of notice OR No-showed on the Date of Stay at Hotel then one Night Hotel Charge with 15% VAT and 10% Service Charge will be deducted only from the advance payment.</span></font></div><div><font face="Symbol"><span style="font-size: 16px;">•<span style="white-space:pre">	</span>For any Group Booking (Minimum 5 Rooms), Cancellation Notice must be given at least 10 days prior to Arrival/Check-in date.</span></font></div><div><font face="Symbol"><span style="font-size: 16px;">•<span style="white-space:pre">	</span>In case of Group Booking, the above terms and conditions can be negotiated and re-defined as per mutual consent of Guests and Apartment Authorities.</span></font></div><div><font face="Symbol"><span style="font-size: 16px;"><br></span></font></div><div><font face="Symbol"><span style="font-size: 16px;"><br></span></font></div><div><font face="Symbol"><span style="font-size: 16px;"><br></span></font></div><div><font face="Symbol"><span style="font-size: 16px;"><br></span></font></div><div><font face="Symbol"><span style="font-size: 16px;">•<span style="white-space:pre">	</span>Re-Issue date is applicable subject to availability of apartment rooms.</span></font></div><div><font face="Symbol"><span style="font-size: 16px;">•<span style="white-space:pre">	</span>All the rates quoted above are Non-Commissionable even when the reservation is made by the nominated Travel Agent of the Preferred Corporate Client.</span></font></div><div><font face="Symbol"><span style="font-size: 16px;">•<span style="white-space:pre">	</span>The company will make and advance reservation with the hotel and the hotel will confirm the reservation subject to availability.</span></font></div><div><br></div>', 4, 1, 1, 1, '2021-07-31 07:33:51', '2022-12-08 11:16:16'),
	(18, 'Refund Policy', 'refund-policy-18', '<p>Please, find our sales policies here in below sections: </p><p>1.<span style="white-space:pre">	</span>For the discounted products there is NO RETURN, NO EXCHANGE, NO REFUND policy available.</p><p>2.<span style="white-space: pre;">	</span>New product only can be exchanged within 3 days from the date of sale but need to take same or higher price product but not less price product.<br></p><p>3.<span style="white-space: pre;">	</span>We offer the wholesale price to our customers only at the purchase of minimum 20 products in a single order (invoice). <br></p><p>4.<span style="white-space: pre;">	</span>All of our available and displayed products are fixed price for regular customer. <br></p><p>5.<span style="white-space: pre;">	</span>We also offer installment (EMI) system for our customers in case of purchase more than <b>$1000</b> product. Our installment systems are <br></p><p style="margin-left: 25px;">a.<span style="white-space:pre">	</span>>=<b> $1000</b> => 1 month extra time for payment</p><p style="margin-left: 25px;">b.<span style="white-space:pre">	</span>>= <b>$3000</b> => 2 months installment</p><p style="margin-left: 25px;">c.<span style="white-space:pre">	</span>>= <b>$5000</b> => 3 months installment</p><p>Installment system is offered for both the local and overseas customers.</p><p>6.<span style="white-space: pre;">	</span>If anybody is running small sized online business and wants wholesale price, they can contact with us. We will deliver products from United States of America (USA) and also through our online store (<a href="https://www.rebekasattire.com"><b>www.rebekasattire.com</b></a>)<br></p>', 3, 1, 1, 1, '2021-07-31 07:34:19', '2022-12-08 12:38:47');

-- Dumping structure for table test.gallery
DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `album_id` int(11) NOT NULL DEFAULT 0,
  `caption` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumb` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `photo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `status_id` enum('1','0') COLLATE utf8_unicode_ci NOT NULL COMMENT '1 = active, 0 = inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table test.gallery: ~27 rows (approximately)
DELETE FROM `gallery`;
INSERT INTO `gallery` (`id`, `album_id`, `caption`, `thumb`, `photo`, `order`, `status_id`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
	(13, 2, 'Image 01', 'gallery_thumbnail_60b51e7d02fd5.jpg', 'gallery_img_60b51e7d02fd1.jpg', 6, '1', '2021-01-26 02:32:55', 170, '2022-11-09 11:08:31', 170),
	(14, 1, 'Image 2', 'gallery_thumbnail_60b51e87c95ac.jpg', 'gallery_img_60b51e87c95a8.jpg', 8, '1', '2021-01-26 02:33:12', 170, '2022-11-09 11:08:31', 170),
	(15, 2, 'Image 3', 'gallery_thumbnail_60b51e92d960e.jpg', 'gallery_img_60b51e92d960a.jpg', 9, '1', '2021-01-26 02:33:23', 170, '2022-11-09 11:08:31', 170),
	(16, 1, 'Image-4', 'gallery_thumbnail_60b51e9e0e41a.jpg', 'gallery_img_60b51e9e0e415.jpg', 10, '1', '2021-01-26 02:43:38', 170, '2022-11-09 11:08:31', 170),
	(17, 1, 'Image -5', 'gallery_thumbnail_60b51ea97570c.jpg', 'gallery_img_60b51ea975708.jpg', 11, '1', '2021-01-26 02:43:54', 170, '2022-11-09 11:08:31', 170),
	(18, 1, 'Image-6', 'gallery_thumbnail_60b51eb31a444.jpg', 'gallery_img_60b51eb31a437.jpg', 12, '1', '2021-01-26 02:44:12', 170, '2022-11-09 11:08:31', 170),
	(19, 1, 'Image 7', 'gallery_thumbnail_60b51ebd29374.jpg', 'gallery_img_60b51ebd2936a.jpg', 13, '1', '2021-01-26 02:44:53', 170, '2022-11-09 11:08:31', 170),
	(21, 1, 'Image 01', 'gallery_thumbnail_60b51e73784ca.jpg', 'gallery_img_60b51e73784c1.jpg', 5, '1', '2021-01-31 17:24:04', 170, '2022-11-09 11:08:31', 170),
	(22, 2, 'sfz', 'gallery_thumbnail_636b5ccd73647.jpg', 'gallery_img_636b5ccd73643.jpg', 7, '1', '2022-11-09 07:54:53', 1, '2022-11-09 11:08:31', 1),
	(23, 12, 'Shakil', 'gallery_thumbnail_636b73137e546.jpg', 'gallery_img_636b73137e543.jpg', 1, '1', '2022-11-09 09:29:55', 1, '2022-11-09 09:29:55', 1),
	(24, 13, 'Outside Imagessssssssss', 'gallery_thumbnail_636b7d418dc27.jpg', 'gallery_img_636b7d418dc23.jpg', 4, '1', '2022-11-09 09:50:41', 1, '2022-11-09 11:08:31', 1),
	(25, 14, 'Aoyonnnnnnn hhh', 'gallery_thumbnail_636b87685c47e.jpg', 'gallery_img_636b87685c47a.jpg', 3, '1', '2022-11-09 10:21:28', 1, '2022-11-09 11:08:31', 1),
	(26, 14, 'tewtegg', 'gallery_thumbnail_636b8a2f3b95f.jpg', 'gallery_img_636b8a2f3b95d.jpg', 2, '1', '2022-11-09 11:08:31', 1, '2022-11-14 06:31:58', 1),
	(27, 17, 'fg', 'gallery_thumbnail_6371e0fe79fe6.png', 'gallery_img_6371e0fe79fe3.png', 14, '1', '2022-11-14 06:32:30', 1, '2022-11-14 06:32:30', 1),
	(28, 19, 'new', 'gallery_thumbnail_6371e196a0421.png', 'gallery_img_6371e196a041c.png', 15, '1', '2022-11-14 06:35:02', 1, '2022-11-14 06:35:02', 1),
	(29, 14, 'test', 'gallery_thumbnail_6375d516acf4f.png', 'gallery_img_6375d516acf4c.png', 16, '1', '2022-11-17 06:30:46', 1, '2022-11-17 06:30:46', 1),
	(30, 14, 'test2', 'gallery_thumbnail_6375d528c10b2.jpg', 'gallery_img_6375d528c10af.jpg', 17, '1', '2022-11-17 06:31:04', 1, '2022-11-17 06:31:04', 1),
	(31, 14, 'sd', 'gallery_thumbnail_6375d5a80732b.jpg', 'gallery_img_6375d5a807328.jpg', 18, '1', '2022-11-17 06:33:12', 1, '2022-11-17 06:33:12', 1),
	(32, 14, 'sd', 'gallery_thumbnail_6375d5a80732b.jpg', 'gallery_img_6375d5a807328.jpg', 18, '1', '2022-11-17 06:33:12', 1, '2022-11-17 06:33:12', 1),
	(33, 14, 'sd', 'gallery_thumbnail_6375d5a80732b.jpg', 'gallery_img_6375d5a807328.jpg', 18, '1', '2022-11-17 06:33:12', 1, '2022-11-17 06:33:12', 1),
	(34, 14, 'sd', 'gallery_thumbnail_6375d5a80732b.jpg', 'gallery_img_6375d5a807328.jpg', 18, '1', '2022-11-17 06:33:12', 1, '2022-11-17 06:33:12', 1),
	(35, 14, 'sd', 'gallery_thumbnail_6375d5a80732b.jpg', 'gallery_img_6375d5a807328.jpg', 18, '1', '2022-11-17 06:33:12', 1, '2022-11-17 06:33:12', 1),
	(36, 14, 'sd', 'gallery_thumbnail_6375d5a80732b.jpg', 'gallery_img_6375d5a807328.jpg', 18, '1', '2022-11-17 06:33:12', 1, '2022-11-17 06:33:12', 1),
	(37, 14, 'sd', 'gallery_thumbnail_6375d5a80732b.jpg', 'gallery_img_6375d5a807328.jpg', 18, '1', '2022-11-17 06:33:12', 1, '2022-11-17 06:33:12', 1),
	(38, 14, 'sd', 'gallery_thumbnail_6375d5a80732b.jpg', 'gallery_img_6375d5a807328.jpg', 18, '1', '2022-11-17 06:33:12', 1, '2022-11-17 06:33:12', 1),
	(39, 14, 'sd', 'gallery_thumbnail_6375d5a80732b.jpg', 'gallery_img_6375d5a807328.jpg', 18, '1', '2022-11-17 06:33:12', 1, '2022-11-17 06:33:12', 1),
	(40, 14, 'sd', 'gallery_thumbnail_6375d5a80732b.jpg', 'gallery_img_6375d5a807328.jpg', 18, '1', '2022-11-17 06:33:12', 1, '2022-11-17 06:33:12', 1);

-- Dumping structure for table test.gallery_album
DROP TABLE IF EXISTS `gallery_album`;
CREATE TABLE IF NOT EXISTS `gallery_album` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cover_photo` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'Image for desktop 1x  (588x260)',
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status_id` tinyint(2) NOT NULL COMMENT '1 = Active, 0 = Inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table test.gallery_album: ~6 rows (approximately)
DELETE FROM `gallery_album`;
INSERT INTO `gallery_album` (`id`, `title`, `slug`, `cover_photo`, `content`, `order`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status_id`) VALUES
	(14, 'Hotel Outside Views', 'hotel-outside-views-14', 'album_image_636b7b7ab4a36.png', '<p>gfddgsgsg</p>', 1, 1, 1, '2022-11-09 16:05:46', '2022-11-14 12:34:12', 1),
	(15, 'fsdfsdf', 'fsdfsdf-15', 'album_image_636b8a77c8841.jpg', '<p><div style="margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; text-align: left; float: right; color: rgb(0, 0, 0); font-family: "Open Sans", Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;"></div></p><div style="margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; text-align: left; float: left; color: rgb(0, 0, 0); font-family: "Open Sans", Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;"><p style="margin: 0px 0px 15px; padding: 0px; text-align: justify;"><strong style="margin: 0px; padding: 0px;">Lorem Ipsum</strong><span> </span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div>', 2, 1, 1, '2022-11-09 17:09:43', '2022-11-09 17:10:49', 1),
	(16, 'cxzvv', 'cxzvv-16', 'banner_image_636b8db145678.png', '<p><div style="margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; text-align: left; float: right; color: rgb(0, 0, 0); font-family: "Open Sans", Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;"></div></p><div style="margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; text-align: left; float: left; color: rgb(0, 0, 0); font-family: "Open Sans", Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;"><p style="margin: 0px 0px 15px; padding: 0px; text-align: justify;"><strong style="margin: 0px; padding: 0px;">Lorem Ipsum</strong><span> </span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div>', 3, 1, 1, '2022-11-09 17:10:12', '2022-11-09 17:23:29', 1),
	(17, 'sFcds f ds', 'sfcds-f-ds-17', 'album_image_636b9176bf69b.jpg', '<p><div style="margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; text-align: left; float: right; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;"></div></p><div style="margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; text-align: left; float: left; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;"><p style="margin: 0px 0px 15px; padding: 0px; text-align: justify;"><strong style="margin: 0px; padding: 0px;">Lorem Ipsum</strong><span>&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div>', 4, 1, 1, '2022-11-09 17:39:34', '2022-11-09 17:39:34', 1),
	(18, 'fdgfhfh', 'fdgfhfh-18', 'album_image_636b91892e38b.jpg', '<p><div style="margin: 0px 28.7969px 0px 14.3906px; padding: 0px; width: 436.797px; text-align: left; float: right; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;"></div></p><div style="margin: 0px 14.3906px 0px 28.7969px; padding: 0px; width: 436.797px; text-align: left; float: left; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); text-decoration-thickness: initial; text-decoration-style: initial; text-decoration-color: initial;"><p style="margin: 0px 0px 15px; padding: 0px; text-align: justify;"><strong style="margin: 0px; padding: 0px;">Lorem Ipsum</strong><span>&nbsp;</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p></div>', 5, 1, 1, '2022-11-09 17:39:53', '2022-11-09 17:39:53', 1),
	(19, 'bnn', 'bnn-19', 'album_image_6371e15ab01b2.jpg', '<p>bn</p>', 6, 1, 1, '2022-11-14 12:34:02', '2022-11-14 12:34:02', 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.jobs: ~0 rows (approximately)
DELETE FROM `jobs`;

-- Dumping structure for table test.menu
DROP TABLE IF EXISTS `menu`;
CREATE TABLE IF NOT EXISTS `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status_id` tinyint(2) NOT NULL COMMENT '1 = Active, 0 = Inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table test.menu: ~6 rows (approximately)
DELETE FROM `menu`;
INSERT INTO `menu` (`id`, `title`, `url`, `order`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status_id`) VALUES
	(1, 'About Us', 'footer-menu/about-us-15', 4, 1, 1, '2021-07-31 07:57:10', '2022-11-03 16:18:02', 0),
	(2, 'Gallery', 'gallery', 5, 1, 1, '2021-07-31 07:57:36', '2022-11-14 12:08:54', 1),
	(3, 'Contact Us', 'contactUs', 6, 1, 1, '2021-07-31 07:58:03', '2022-11-02 10:55:52', 1),
	(5, 'Home', '/', 1, 1, 1, '2022-09-22 17:20:49', '2022-09-22 17:20:49', 1),
	(6, 'Room', 'apartments', 2, 1, 1, '2022-10-16 10:22:25', '2022-11-09 14:14:21', 1),
	(7, 'Offers', 'offers', 3, 1, 1, '2022-10-30 17:27:59', '2022-10-30 17:27:59', 1);

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

-- Dumping structure for table test.news_and_events
DROP TABLE IF EXISTS `news_and_events`;
CREATE TABLE IF NOT EXISTS `news_and_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `featured_image` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Image for desktop 1x  (588x260)',
  `content` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) DEFAULT NULL,
  `location` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish_date` datetime DEFAULT NULL,
  `duration_from_date` date DEFAULT NULL,
  `duration_to_date` date DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status_id` tinyint(2) NOT NULL COMMENT '1 = Active, 0 = Inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table test.news_and_events: ~3 rows (approximately)
DELETE FROM `news_and_events`;
INSERT INTO `news_and_events` (`id`, `title`, `slug`, `featured_image`, `content`, `order`, `location`, `publish_date`, `duration_from_date`, `duration_to_date`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status_id`) VALUES
	(12, 'Lorem Ipsum is simply dummy text', 'lorem-ipsum-is-simply-dummy-text-12', 'news_and_events_627c84c85d4c8.jpg', '<p><strong style="margin: 0px; padding: 0px; font-family: " open="" sans",="" arial,="" sans-serif;="" font-size:="" 14px;="" text-align:="" justify;"="">Lorem Ipsum</strong><span style="font-family: " open="" sans",="" arial,="" sans-serif;="" font-size:="" 14px;="" text-align:="" justify;"="">Â is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br></p>', 1, NULL, '2021-07-28 01:00:00', '2021-06-01', '2021-07-01', 1, 1, '2021-07-29 12:04:45', '2022-05-12 09:53:44', 1),
	(13, 'Simply dummy text', 'simply-dummy-text-13', 'news_and_events_627c84e911b94.jpg', '<p><span style="font-family: "Open Sans", Arial, sans-serif; font-size: 14px; text-align: justify;">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span><br></p>', 2, NULL, '2021-06-01 01:05:00', '2006-07-13', '2019-01-11', 1, 1, '2021-07-29 12:05:33', '2022-05-12 09:54:17', 1),
	(14, 'Lorem Ipsum is simply dummy text', 'lorem-ipsum-is-simply-dummy-text-14', 'news_and_events_627c84d390657.jpg', '<p><span style="font-family: "Open Sans", Arial, sans-serif; font-size: 14px; text-align: justify;">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</span><br></p>', 3, NULL, '2021-07-28 01:05:00', '2006-07-13', '2019-01-11', 1, 1, '2021-07-29 12:06:52', '2022-05-12 09:53:55', 1);

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

-- Dumping structure for table test.payment_method
DROP TABLE IF EXISTS `payment_method`;
CREATE TABLE IF NOT EXISTS `payment_method` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `connection_type` enum('0','1','2') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '''0'' = ''none'', ''1'' = ''sandbox'', ''2'' =''production''',
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `api_json` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `api_param` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(12) NOT NULL DEFAULT 0,
  `status` enum('1','2') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table test.payment_method: ~4 rows (approximately)
DELETE FROM `payment_method`;
INSERT INTO `payment_method` (`id`, `name`, `connection_type`, `description`, `api_json`, `api_param`, `order`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
	(1, 'Cash on Delivery', '0', NULL, NULL, NULL, 1, '2', '2022-06-15 15:45:57', 1, '2022-08-28 14:27:07', 1),
	(2, 'Credit Card', '1', NULL, '{"c62b172cd29987":{"credential_key":"merchant_login_id","credential_value":"2zThZ28rK5P"},"nc62b172cfb8b9b":{"credential_key":"merchant_transaction_key","credential_value":"97g7tB8d26TBQfqw"}}', '{"merchant_login_id":"2zThZ28rK5P","merchant_transaction_key":"97g7tB8d26TBQfqw"}', 2, '2', '2022-06-15 15:45:57', 1, '2022-11-27 11:19:17', 1),
	(3, 'Paypal', '1', NULL, '{"c62e11e9b6516d":{"credential_key":"client_id","credential_value":"AdkY4suGuZyAwXTuTDIgZJq7n0zToaMSim0lcur7TAeHt7qNHPWAmfJ2bKQkrHCyt-EirJZtTeEwla4p"},"nc62e11ea920d6f":{"credential_key":"secret","credential_value":"ELi9QKk_FtBBNGFnGsk3sdbsbFfE8wRYFPhhxJf3XO-QoEqTnXyVtwZlTpTULW6eYL1lZ8aDJaNKu4mO"}}', '{"client_id":"AdkY4suGuZyAwXTuTDIgZJq7n0zToaMSim0lcur7TAeHt7qNHPWAmfJ2bKQkrHCyt-EirJZtTeEwla4p","secret":"ELi9QKk_FtBBNGFnGsk3sdbsbFfE8wRYFPhhxJf3XO-QoEqTnXyVtwZlTpTULW6eYL1lZ8aDJaNKu4mO"}', 3, '2', '2022-06-15 15:45:57', 1, '2022-11-09 17:46:53', 1),
	(4, 'aamarPay', '1', NULL, '{"c638311a0227f8":{"credential_key":"store_id","credential_value":"aamarpaytest"},"nc638311ee44f13":{"credential_key":"signature_key","credential_value":"dbb74894e82415a2f7ff0ec3a97e4183"}}', '{"store_id":"aamarpaytest","signature_key":"dbb74894e82415a2f7ff0ec3a97e4183"}', 4, '1', '0000-00-00 00:00:00', NULL, '2022-11-27 13:30:06', 1);

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

-- Dumping structure for table test.product
DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type_id` int(11) NOT NULL COMMENT 'product_type table id',
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `short_description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` enum('1','2') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Active,2=Inactive',
  `publish` enum('0','1') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '0=Unpublish,1=Publish',
  `slug` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- Dumping data for table test.product: ~1 rows (approximately)
DELETE FROM `product`;
INSERT INTO `product` (`id`, `name`, `code`, `type_id`, `category_id`, `brand_id`, `unit_id`, `short_description`, `description`, `status`, `publish`, `slug`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
	(1, 'Asus Gaming Laptop 1', 'asus-gaming-laptop-1', 2, 2, 1, 1, 'This is a gaming laptop from Asus. Ram 8gb.', 'This is a gaming laptop from Asus.', '1', '0', 'asus-gaming-laptop-1-1', '2023-05-27 18:59:22', 1, '2023-05-27 19:06:56', 1);

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
	(1, 'Sharii', '646f714d5d083fashion.jpg', 1, '1', 'sharii-1', '2023-05-25 14:31:41', 1, '2023-05-27 18:24:48', 1),
	(2, 'PC', '646f715c54166723-7237327_hardware-56-icons.png', 2, '1', 'pc-2', '2023-05-25 14:31:56', 1, '2023-05-27 18:25:22', 1);

-- Dumping structure for table test.product_image
DROP TABLE IF EXISTS `product_image`;
CREATE TABLE IF NOT EXISTS `product_image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table test.product_image: ~47 rows (approximately)
DELETE FROM `product_image`;
INSERT INTO `product_image` (`id`, `product_id`, `image`, `created_by`, `created_at`) VALUES
	(1, 1, '["z62aed1194c188.jpg"]', 1, '2022-06-19 14:19:27'),
	(2, 2, '["1_62aed93f8346e.jpg"]', 1, '2022-06-19 14:19:21'),
	(3, 4, '["1_62aedf8d79fe8.jpg"]', 1, '2022-06-21 17:57:57'),
	(4, 3, '["1_62aed9f1a178d.jpg"]', 1, '2022-06-19 14:19:14'),
	(5, 5, '["1_62aedf5c17948.jpg"]', 1, '2022-06-19 14:33:32'),
	(6, 6, '["1_62aeef5f00041.jpg"]', 1, '2022-06-19 15:41:51'),
	(7, 7, '["1_62aef14c85a79.jpg"]', 1, '2022-06-19 15:50:04'),
	(8, 8, '["1_62aef1e213c80.jpg"]', 1, '2022-06-19 15:52:34'),
	(9, 9, '["1_62aef253bf5b4.jpg"]', 1, '2022-06-19 15:54:28'),
	(10, 10, '["1_62aef2b5c3f0d.jpg"]', 1, '2022-06-19 15:56:06'),
	(11, 12, '["1_62aef3ca5c205.jpg"]', 1, '2022-06-19 16:00:42'),
	(12, 13, '["1_62aef423eae8d.jpg"]', 1, '2022-06-19 16:02:12'),
	(13, 14, '["1_62aef4976b05e.jpg"]', 1, '2022-06-19 16:04:07'),
	(14, 15, '["1_62aef73fcaf3d.jpg"]', 1, '2022-06-19 16:15:28'),
	(15, 17, '["1_62aef7ee8b8c2.jpg"]', 1, '2022-06-19 16:18:22'),
	(16, 18, '["1_62aef84b1540c.jpg"]', 1, '2022-06-19 16:19:55'),
	(17, 19, '["1_62aef9760e734.jpg"]', 1, '2022-06-19 16:24:54'),
	(18, 20, '["1_62aef9c6bd808.jpg"]', 1, '2022-06-19 16:26:15'),
	(19, 21, '["1_62aefa24a11c6.jpg"]', 1, '2022-06-19 16:27:48'),
	(20, 22, '["1_62aefaa0a93a3.jpg"]', 1, '2022-06-19 16:29:52'),
	(21, 25, '["1_62aefccff0bd7.jpg","1_62aefca4d3b60.jpg"]', 1, '2022-06-19 16:39:12'),
	(22, 26, '["1_62aefdb69a227.jpg"]', 1, '2022-06-19 16:43:02'),
	(23, 27, '["1_62aefe5b02b1c.jpg"]', 1, '2022-06-19 16:45:47'),
	(24, 28, '["1_62aeff840fff0.jpg"]', 1, '2022-06-19 16:50:44'),
	(25, 30, '["1_62af0030479aa.jpg"]', 1, '2022-06-19 16:53:36'),
	(26, 31, '["1_62af0097753cf.jpg"]', 1, '2022-06-19 16:55:19'),
	(27, 32, '["1_62af018000d55.jpg"]', 1, '2022-06-19 16:59:12'),
	(28, 34, '["1_62af0222b09e5.jpg"]', 1, '2022-06-19 17:01:55'),
	(29, 35, '["1_62af02737847a.jpg"]', 1, '2022-06-19 17:03:15'),
	(30, 36, '["1_62af02ebddd8e.jpg"]', 1, '2022-06-19 17:05:16'),
	(31, 37, '["1_62af034568445.jpg"]', 1, '2022-06-19 17:06:45'),
	(32, 38, '["1_62af039978390.jpg"]', 1, '2022-06-19 17:08:09'),
	(33, 39, '["1_62af03e80017b.jpg"]', 1, '2022-06-19 17:09:28'),
	(34, 40, '["1_62af043968919.jpg"]', 1, '2022-06-19 17:10:49'),
	(35, 41, '["1_62af04841a84a.jpg"]', 1, '2022-06-19 17:12:04'),
	(36, 42, '[]', 1, '2022-07-06 19:12:00'),
	(37, 43, '[]', 1, '2022-07-06 19:18:42'),
	(38, 33, '["1_62b0a5827f7d9.jpg"]', 1, '2022-06-20 22:51:14'),
	(39, 16, '["1_62b1b2c3755cc.jpg"]', 1, '2022-06-21 18:00:04'),
	(40, 23, '["1_62b1b40c358e8.jpg"]', 1, '2022-06-21 18:05:32'),
	(41, 24, '["1_62b1b425b8fa8.jpg"]', 1, '2022-06-21 18:05:58'),
	(42, 29, '["1_62b1b51424e3a.jpg"]', 1, '2022-06-21 18:09:56'),
	(43, 11, '["1_62b1b54494f44.jpg"]', 1, '2022-06-21 18:10:44'),
	(44, 44, '["1_6307134a8179d.png"]', 1, '2022-08-25 12:14:35'),
	(45, 46, '["1_63073e805e096.png","1_63073e748228f.JPG"]', 1, '2022-08-25 15:18:56'),
	(46, 47, '["1_6307434e90f13.png"]', 1, '2022-08-25 15:39:27'),
	(47, 49, '["1_63356e72880d2.jpg","1_63356e28de48a.jpg","1_63356e1f2208e.jpg","1_63356e0ebe50d.jpg"]', 1, '2022-09-29 16:07:46');

-- Dumping structure for table test.product_type
DROP TABLE IF EXISTS `product_type`;
CREATE TABLE IF NOT EXISTS `product_type` (
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- Dumping data for table test.product_type: ~3 rows (approximately)
DELETE FROM `product_type`;
INSERT INTO `product_type` (`id`, `name`, `photo`, `order`, `status`, `slug`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
	(1, 'Fashion', '646f714d5d083fashion.jpg', 1, '1', 'fashion-1', '2023-05-25 14:31:41', 1, '2023-05-25 14:32:20', 1),
	(2, 'Hardware', '646f715c54166723-7237327_hardware-56-icons.png', 2, '1', 'hardware-2', '2023-05-25 14:31:56', 1, '2023-05-25 14:31:56', 1),
	(3, 'Food', '64722ffe5edddfood-courts-icons-set-vector.jpg', 3, '1', 'food-3', '2023-05-27 16:27:59', 1, '2023-05-27 16:29:50', 1);

-- Dumping structure for table test.social_network
DROP TABLE IF EXISTS `social_network`;
CREATE TABLE IF NOT EXISTS `social_network` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status_id` tinyint(2) NOT NULL COMMENT '1 = Active, 0 = Inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table test.social_network: ~5 rows (approximately)
DELETE FROM `social_network`;
INSERT INTO `social_network` (`id`, `title`, `url`, `icon`, `order`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status_id`) VALUES
	(44, 'Facebook', '#', 'fa fa-facebook', 1, 1, 1, '2021-07-28 03:08:19', '2022-12-07 10:34:52', 1),
	(45, 'Twitter', '#', 'fa fa-twitter', 2, 1, 1, '2021-07-28 03:08:38', '2022-04-05 12:31:04', 1),
	(46, 'Instagram', '#', 'fa fa-instagram', 3, 1, 1, '2021-07-28 03:08:57', '2022-04-05 12:31:04', 1),
	(47, 'Pinterest', '#', 'fa fa-pinterest', 4, 1, 1, '2021-07-28 03:09:16', '2022-04-05 12:31:04', 1),
	(48, 'Vimeo', '#', 'fa fa-vimeo', 5, 1, 1, '2021-07-28 03:09:37', '2022-04-05 12:31:04', 1);

-- Dumping structure for table test.speciality
DROP TABLE IF EXISTS `speciality`;
CREATE TABLE IF NOT EXISTS `speciality` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `subtitle` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status_id` tinyint(2) NOT NULL COMMENT '1 = Active, 0 = Inactive',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table test.speciality: ~3 rows (approximately)
DELETE FROM `speciality`;
INSERT INTO `speciality` (`id`, `title`, `subtitle`, `icon`, `order`, `created_by`, `updated_by`, `created_at`, `updated_at`, `status_id`) VALUES
	(49, 'FREE SHIPPING', 'Free On Oder Over $1000', 'fa fa-life-ring', 1, 1, 1, '2021-07-29 11:44:59', '2022-08-25 14:51:27', 1),
	(50, 'GUARANTEE', 'Product Exchange within 3 Days', 'fa fa-recycle', 2, 1, 1, '2021-07-29 11:46:50', '2022-06-25 23:44:15', 1),
	(51, 'SAFE PAYMENTtttttttttt', 'Safe your online payment', 'fa fa-credit-card', 3, 1, 1, '2021-07-29 11:47:09', '2022-08-28 14:27:39', 1);

-- Dumping structure for table test.subscribe
DROP TABLE IF EXISTS `subscribe`;
CREATE TABLE IF NOT EXISTS `subscribe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table test.subscribe: ~0 rows (approximately)
DELETE FROM `subscribe`;

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
  PRIMARY KEY (`id`) USING BTREE
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
  `is_admin` enum('0','1') COLLATE utf8_unicode_ci DEFAULT '0',
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table test.users: ~6 rows (approximately)
DELETE FROM `users`;
INSERT INTO `users` (`id`, `group_id`, `designation_id`, `department_id`, `first_name`, `last_name`, `official_name`, `email`, `phone_no`, `username`, `password`, `photo`, `status`, `is_admin`, `recovery_attempt`, `recovery_link`, `remember_token`, `created_at`, `created_by`, `updated_at`, `updated_by`) VALUES
	(1, 1, 1, 1, 'Shakil', 'Hossen', 'Shakil', 'admin@gmail.com', '0176546363', 'admin', '$2y$10$ckZrosUF5vilpF2kmySD0e0UKurRQTW7W/hRF7SRGLTbVG19mSY6S', '64651f6e04d4ashakil.jpg', 'active', '1', NULL, NULL, NULL, '2023-05-16 10:32:57', NULL, '2023-05-17 18:40:42', 1),
	(6, 1, 1, 1, 'Muhtasim', 'Riyon', 'Riyon', 'shakils923@gmail.com', '016355267383', 'riyon', '$2y$10$/XLPjl782FDM14aeQbauNuQ0HIeLRHzwhcdOwX.OBi7iG8WAPLgEW', '64652725bbf47avatar5.png', 'active', '1', NULL, NULL, 'YBFI4f2LZVBuspL497Pobv4tbfgUolYGrbYHcH8iLsBzUukTrTyOdNnvTMCm', '2023-05-17 16:51:23', 1, '2023-05-25 13:54:28', 6),
	(7, 1, 1, 1, 'Sajjad', 'Ashik', 'Sajjad', 'shakilhossen566@gmail.com', '0173645721', 'sajjad', '$2y$10$lu5vwkIm9OCxJyfitThLEO2hqI/bebYONGZIyJ8Zqxw57bBJK03Li', '6465270a025a0avatar5.png', 'inactive', '1', NULL, NULL, NULL, '2023-05-17 19:10:37', 1, '2023-05-25 08:39:49', 1),
	(8, NULL, NULL, NULL, 'Rabbi', 'Rahman', NULL, 'rabbi@gmail.com', '0175632231', 'rabbi', '$2y$10$nRIzXLk1NRmeR2Jig/9dzOdTWdBEa16kjoqSChljKZOe/X/5cbJue', NULL, 'active', '0', NULL, NULL, NULL, '2023-05-26 08:15:20', 1, '2023-05-29 19:51:55', 1),
	(9, NULL, NULL, NULL, 'Shakil', 'Coc v1', NULL, 'shakilcocv1@gmail.com', '019738272', 'cocv1', '$2y$10$jf2t.aGVrLhJ8GIkAvawHejdZfl9b5B1f/Xb6dyUNadthpvPT9mTm', NULL, 'active', '0', NULL, NULL, 'dUOVsOOXBj9QcfwR0OXOrx9Knykr8NcY9Gn8dHhucqr23SPL7ytUy2101BjN', '2023-05-26 08:18:23', 1, '2023-05-29 19:51:57', 9),
	(10, NULL, NULL, NULL, 'Sajal', 'Rahman', NULL, 'sajal@gmail.com', '0193881231', 'sajal', '$2y$10$KoynXZXMANeSoA.k6HQH4uDsGsQ7MzO5UJPws/Z0i3dAFsE6QLdIy', NULL, 'active', '0', NULL, NULL, NULL, '2023-05-29 12:59:22', 1, '2023-05-29 19:52:00', 1);

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

-- Dumping structure for table test.wishlist
DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sku_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL DEFAULT 0,
  `updated_at` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table test.wishlist: ~2 rows (approximately)
DELETE FROM `wishlist`;
INSERT INTO `wishlist` (`id`, `sku_id`, `customer_id`, `updated_at`, `created_at`) VALUES
	(2, 8, 3, '2022-06-30 11:41:18', '2022-06-30 11:41:18'),
	(4, 7, 6, '2022-08-25 12:24:33', '2022-08-25 12:24:33');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
