/*
Navicat MySQL Data Transfer

Source Server         : MySQL_Local
Source Server Version : 50733
Source Host           : 127.0.0.1:3306
Source Database       : db_laravel

Target Server Type    : MYSQL
Target Server Version : 50733
File Encoding         : 65001

Date: 2021-10-26 11:46:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for globalvar
-- ----------------------------
DROP TABLE IF EXISTS `globalvar`;
CREATE TABLE `globalvar` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) DEFAULT NULL,
  `varvalue` varchar(50) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of globalvar
-- ----------------------------
INSERT INTO `globalvar` VALUES ('1', 'import_siswa', '0', 'import:siswa', null, '2021-10-26 11:16:19');

-- ----------------------------
-- Table structure for hobi
-- ----------------------------
DROP TABLE IF EXISTS `hobi`;
CREATE TABLE `hobi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_hobi` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of hobi
-- ----------------------------
INSERT INTO `hobi` VALUES ('1', 'BERENANG', '2021-10-25 09:47:00', '2021-10-25 09:47:01');
INSERT INTO `hobi` VALUES ('2', 'MEMBACA', '2021-10-25 09:47:13', '2021-10-25 09:47:14');
INSERT INTO `hobi` VALUES ('3', 'SEPAK BOLA', '2021-10-25 09:47:27', '2021-10-25 09:47:28');
INSERT INTO `hobi` VALUES ('4', 'TRAVELING', '2021-10-25 09:47:39', '2021-10-25 09:47:40');

-- ----------------------------
-- Table structure for hobi_siswa
-- ----------------------------
DROP TABLE IF EXISTS `hobi_siswa`;
CREATE TABLE `hobi_siswa` (
  `id_siswa` int(10) unsigned NOT NULL,
  `id_hobi` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_siswa`,`id_hobi`),
  KEY `hobi_siswa_id_siswa_index` (`id_siswa`),
  KEY `hobi_siswa_id_hobi_index` (`id_hobi`),
  CONSTRAINT `hobi_siswa_id_hobi_foreign` FOREIGN KEY (`id_hobi`) REFERENCES `hobi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `hobi_siswa_id_siswa_foreign` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of hobi_siswa
-- ----------------------------
INSERT INTO `hobi_siswa` VALUES ('15', '2', '2021-10-25 10:46:10', '2021-10-25 10:46:10');
INSERT INTO `hobi_siswa` VALUES ('15', '3', '2021-10-25 10:46:10', '2021-10-25 10:46:10');
INSERT INTO `hobi_siswa` VALUES ('16', '2', '2021-10-25 10:46:24', '2021-10-25 10:46:24');
INSERT INTO `hobi_siswa` VALUES ('26', '1', '2021-10-25 10:31:54', '2021-10-25 10:31:54');
INSERT INTO `hobi_siswa` VALUES ('26', '3', '2021-10-25 10:31:54', '2021-10-25 10:31:54');
INSERT INTO `hobi_siswa` VALUES ('26', '4', '2021-10-25 10:46:39', '2021-10-25 10:46:39');

-- ----------------------------
-- Table structure for kelas
-- ----------------------------
DROP TABLE IF EXISTS `kelas`;
CREATE TABLE `kelas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sudah_pindah` int(10) DEFAULT '0' COMMENT '0=belum, 1=sudah',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of kelas
-- ----------------------------
INSERT INTO `kelas` VALUES ('1', 'X-A', '2021-10-25 08:22:36', '2021-10-25 08:22:38', '0');
INSERT INTO `kelas` VALUES ('2', 'X-B', '2021-10-25 08:22:50', '2021-10-25 08:22:50', '0');
INSERT INTO `kelas` VALUES ('3', 'XI-A', '2021-10-25 08:23:01', '2021-10-25 08:23:01', '0');
INSERT INTO `kelas` VALUES ('4', 'XI-B', '2021-10-25 08:23:21', '2021-10-25 08:23:21', '0');
INSERT INTO `kelas` VALUES ('5', 'XII-A', '2021-10-25 08:23:43', '2021-10-25 08:23:43', '0');
INSERT INTO `kelas` VALUES ('6', 'XII-B', '2021-10-25 08:23:57', '2021-10-25 08:23:57', '0');
INSERT INTO `kelas` VALUES ('7', 'XII-C', '2021-10-26 10:38:51', '2021-10-26 10:38:51', '0');
INSERT INTO `kelas` VALUES ('8', 'XII-D', '2021-10-26 10:50:12', '2021-10-26 10:50:12', '0');
INSERT INTO `kelas` VALUES ('9', 'XII-E', '2021-10-26 10:51:30', '2021-10-26 10:51:30', '0');
INSERT INTO `kelas` VALUES ('10', 'XII-F', '2021-10-26 10:55:20', '2021-10-26 10:55:20', '0');
INSERT INTO `kelas` VALUES ('11', 'XII-G', '2021-10-26 10:56:18', '2021-10-26 10:56:18', '0');
INSERT INTO `kelas` VALUES ('12', 'XII-H', '2021-10-26 10:57:19', '2021-10-26 10:57:19', '0');
INSERT INTO `kelas` VALUES ('13', 'XII-I', '2021-10-26 11:13:19', '2021-10-26 11:13:19', '0');
INSERT INTO `kelas` VALUES ('14', 'XII-J', '2021-10-26 11:16:19', '2021-10-26 11:16:19', '0');

-- ----------------------------
-- Table structure for kelas_history
-- ----------------------------
DROP TABLE IF EXISTS `kelas_history`;
CREATE TABLE `kelas_history` (
  `id_kelas_history` int(10) unsigned NOT NULL,
  `id_kelas` int(10) unsigned NOT NULL,
  `nama_kelas` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_kelas_history`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kelas_history
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2019_08_19_000000_create_failed_jobs_table', '1');
INSERT INTO `migrations` VALUES ('4', '2019_12_14_000001_create_personal_access_tokens_table', '1');
INSERT INTO `migrations` VALUES ('5', '2021_10_19_024235_create_table_siswa', '1');
INSERT INTO `migrations` VALUES ('6', '2021_10_22_101835_create_table_telepon', '2');
INSERT INTO `migrations` VALUES ('7', '2021_10_25_075858_add_id_kelas_to_siswa_table', '3');
INSERT INTO `migrations` VALUES ('8', '2021_10_25_081819_create_table_kelas', '4');
INSERT INTO `migrations` VALUES ('9', '2021_10_25_094036_create_table_hobi', '5');
INSERT INTO `migrations` VALUES ('10', '2021_10_25_094053_create_table_hobi_siswa', '6');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for siswa
-- ----------------------------
DROP TABLE IF EXISTS `siswa`;
CREATE TABLE `siswa` (
  `id_siswa` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nisn` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'L',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_kelas` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_siswa`),
  UNIQUE KEY `siswa_nisn_unique` (`nisn`),
  KEY `siswa_id_kelas_foreign` (`id_kelas`),
  CONSTRAINT `siswa_id_kelas_foreign` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of siswa
-- ----------------------------
INSERT INTO `siswa` VALUES ('15', 'A002', 'BABAB', 'BBAB', '1991-02-01', 'L', '2021-10-22 10:45:27', '2021-10-25 08:50:32', '4');
INSERT INTO `siswa` VALUES ('16', 'A003', 'TINI', 'SURABAYA', '1990-12-01', 'P', '2021-10-22 10:46:02', '2021-10-25 09:03:42', '6');
INSERT INTO `siswa` VALUES ('20', 'A005', 'JONI', 'BANTEN', '1990-05-19', 'L', '2021-10-25 08:38:39', '2021-10-25 08:38:39', '1');
INSERT INTO `siswa` VALUES ('22', 'A006', 'NANO', 'BANTEN', '1990-05-12', 'L', '2021-10-25 09:01:56', '2021-10-25 09:01:56', '1');
INSERT INTO `siswa` VALUES ('26', 'A007', 'BAGUS', 'JAKARTA', '1989-12-01', 'L', '2021-10-25 10:31:54', '2021-10-25 10:31:54', '3');

-- ----------------------------
-- Table structure for telepon
-- ----------------------------
DROP TABLE IF EXISTS `telepon`;
CREATE TABLE `telepon` (
  `id_siswa` int(10) unsigned NOT NULL,
  `no_telepon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_siswa`),
  UNIQUE KEY `telepon_no_telepon_unique` (`no_telepon`),
  CONSTRAINT `telepon_id_siswa_foreign` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of telepon
-- ----------------------------
INSERT INTO `telepon` VALUES ('15', '0856322222', '2021-10-22 10:45:27', '2021-10-22 10:45:27');
INSERT INTO `telepon` VALUES ('16', '0856322223', '2021-10-22 10:46:02', '2021-10-22 10:46:02');
INSERT INTO `telepon` VALUES ('20', '08595211241', '2021-10-25 08:38:39', '2021-10-25 08:38:39');
INSERT INTO `telepon` VALUES ('22', '085212121211', '2021-10-25 09:01:56', '2021-10-25 09:02:37');
INSERT INTO `telepon` VALUES ('26', '085412121111', '2021-10-25 10:31:54', '2021-10-25 10:31:54');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_department` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_employee_number` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ad_description` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'fulan', 'fulan@email.com', null, '$2y$10$zbIc/Nmks6m0psKdA2hQuOlNQQy0ldIE1o63IOw0PHXOXs9FxV8/q', null, '2021-10-25 11:14:03', '2021-10-25 11:14:03', null, null, null, null, null, null);
