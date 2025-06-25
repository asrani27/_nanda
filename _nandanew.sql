/*
 Navicat Premium Dump SQL

 Source Server         : local
 Source Server Type    : MySQL
 Source Server Version : 50739 (5.7.39)
 Source Host           : localhost:3306
 Source Schema         : _nanda

 Target Server Type    : MySQL
 Target Server Version : 50739 (5.7.39)
 File Encoding         : 65001

 Date: 25/06/2025 13:33:57
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for fasilitas
-- ----------------------------
DROP TABLE IF EXISTS `fasilitas`;
CREATE TABLE `fasilitas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tipe` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of fasilitas
-- ----------------------------
BEGIN;
INSERT INTO `fasilitas` (`id`, `tipe`, `nama`, `deskripsi`, `created_at`, `updated_at`, `file`) VALUES (1, '-', 'meja dan kursi', 'de', '2025-06-19 00:01:45', '2025-06-19 00:02:20', NULL);
COMMIT;

-- ----------------------------
-- Table structure for kamar
-- ----------------------------
DROP TABLE IF EXISTS `kamar`;
CREATE TABLE `kamar` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nomor` varchar(255) DEFAULT NULL,
  `tipe` varchar(255) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `perlengkapan_id` int(11) DEFAULT NULL,
  `fasilitas_id` int(11) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of kamar
-- ----------------------------
BEGIN;
INSERT INTO `kamar` (`id`, `nomor`, `tipe`, `harga`, `status`, `created_at`, `updated_at`, `perlengkapan_id`, `fasilitas_id`, `file`) VALUES (1, '001', 'standar', 300000, 'Y', '2025-06-19 02:03:37', '2025-06-25 03:46:39', 1, 1, '1750823199_Screenshot 2025-06-23 at 10.22.39.png');
INSERT INTO `kamar` (`id`, `nomor`, `tipe`, `harga`, `status`, `created_at`, `updated_at`, `perlengkapan_id`, `fasilitas_id`, `file`) VALUES (2, '002', 'deluxe', 5000000, 'T', '2025-06-25 03:43:35', '2025-06-25 05:12:22', 1, 1, '1750823015_Screenshot 2025-06-21 at 19.27.59.png');
COMMIT;

-- ----------------------------
-- Table structure for pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `pembayaran`;
CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `reservasi_id` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `metode` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`reservasi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pembayaran
-- ----------------------------
BEGIN;
COMMIT;

-- ----------------------------
-- Table structure for perlengkapan
-- ----------------------------
DROP TABLE IF EXISTS `perlengkapan`;
CREATE TABLE `perlengkapan` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) DEFAULT NULL,
  `stok` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of perlengkapan
-- ----------------------------
BEGIN;
INSERT INTO `perlengkapan` (`id`, `nama`, `stok`, `keterangan`, `created_at`, `updated_at`, `file`) VALUES (1, 'air mineral', '10', 'expired 10 juni 2025', '2025-06-19 00:01:04', '2025-06-19 00:01:13', NULL);
COMMIT;

-- ----------------------------
-- Table structure for reservasi
-- ----------------------------
DROP TABLE IF EXISTS `reservasi`;
CREATE TABLE `reservasi` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `kamar_id` int(11) DEFAULT NULL,
  `check_in` varchar(255) DEFAULT NULL,
  `check_out` varchar(255) DEFAULT NULL,
  `lama` int(11) DEFAULT NULL,
  `total` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of reservasi
-- ----------------------------
BEGIN;
INSERT INTO `reservasi` (`id`, `user_id`, `kamar_id`, `check_in`, `check_out`, `lama`, `total`, `status`, `created_at`, `updated_at`, `harga`) VALUES (4, 12, 2, '2025-06-25', '2025-06-27', 2, NULL, 'menunggu pembayaran', '2025-06-25 05:04:56', '2025-06-25 05:04:56', 5000000);
COMMIT;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `roles` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
BEGIN;
INSERT INTO `users` (`id`, `username`, `name`, `password`, `remember_token`, `created_at`, `updated_at`, `roles`) VALUES (1, 'superadmin', 'superadmin', '$2y$12$r0HAFQIZdiAabhk3HwCdVub716cax1jMnmwKnv76nJz8sJx0M3TB6', NULL, NULL, '2024-12-20 02:49:44', 'superadmin');
INSERT INTO `users` (`id`, `username`, `name`, `password`, `remember_token`, `created_at`, `updated_at`, `roles`) VALUES (11, 'adi', 'adi2', '$2y$12$S8y2eXzZhf7OMrScCfdwT.9EZo6yv7EBZUkrk/faHh3DNzW/7zhPu', NULL, '2025-05-12 23:54:44', '2025-05-12 23:56:31', 'superadmin');
INSERT INTO `users` (`id`, `username`, `name`, `password`, `remember_token`, `created_at`, `updated_at`, `roles`) VALUES (12, 'andi', 'andi', '$2y$12$HcLruAckv6bHMZy5A1gxeOihbQjKzJti6Gxh2Mk8pwE7UI6ZBBMgu', NULL, '2025-06-25 02:40:18', '2025-06-25 02:40:18', 'user');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
