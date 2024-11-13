/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : aiddb

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 13/11/2024 12:54:53
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for aids
-- ----------------------------
DROP TABLE IF EXISTS `aids`;
CREATE TABLE `aids`  (
  `aidId` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `userID` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `purpose` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10, 2) NOT NULL,
  `paymentAddress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `letter` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`aidId`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of aids
-- ----------------------------

-- ----------------------------
-- Table structure for donation_details
-- ----------------------------
DROP TABLE IF EXISTS `donation_details`;
CREATE TABLE `donation_details`  (
  `donationDetailId` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `userID` int NOT NULL,
  `aidID` int NOT NULL,
  `hash` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `from` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `eth` decimal(10, 7) NOT NULL,
  `amount` decimal(10, 2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`donationDetailId`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of donation_details
-- ----------------------------

-- ----------------------------
-- Table structure for done_donations
-- ----------------------------
DROP TABLE IF EXISTS `done_donations`;
CREATE TABLE `done_donations`  (
  `doneID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `userID` int NOT NULL,
  `aidID` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`doneID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of done_donations
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (2, '2024_10_06_045703_create_system_users_table', 1);
INSERT INTO `migrations` VALUES (3, '2024_10_16_193257_create_aids_table', 1);
INSERT INTO `migrations` VALUES (4, '2024_11_01_204340_create_donation_details_table', 1);
INSERT INTO `migrations` VALUES (5, '2024_11_04_214310_create_done_donations_table', 1);

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for system_users
-- ----------------------------
DROP TABLE IF EXISTS `system_users`;
CREATE TABLE `system_users`  (
  `userID` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `middleName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `lastName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `birthDate` date NOT NULL,
  `phoneNumber` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `userType` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`userID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of system_users
-- ----------------------------

-- ----------------------------
-- View structure for vwdonations
-- ----------------------------
DROP VIEW IF EXISTS `vwdonations`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vwdonations` AS select `aids`.`aidId` AS `aidId`,`aids`.`name` AS `name`,`aids`.`purpose` AS `purpose`,`aids`.`amount` AS `amount`,`aids`.`paymentAddress` AS `paymentAddress`,`aids`.`letter` AS `letter`,`aids`.`created_at` AS `created_at`,`system_users`.`firstName` AS `firstName`,`system_users`.`middleName` AS `middleName`,`system_users`.`lastName` AS `lastName`,`aids`.`userID` AS `userID` from (`aids` join `system_users` on((`aids`.`userID` = `system_users`.`userID`)));

-- ----------------------------
-- View structure for vwgiverdonation
-- ----------------------------
DROP VIEW IF EXISTS `vwgiverdonation`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vwgiverdonation` AS select `system_users`.`userID` AS `userID`,`donation_details`.`donationDetailId` AS `donationDetailId`,`donation_details`.`userID` AS `giverID`,`donation_details`.`aidID` AS `aidID`,`donation_details`.`hash` AS `hash`,`donation_details`.`from` AS `from`,`donation_details`.`to` AS `to`,`donation_details`.`eth` AS `eth`,`donation_details`.`amount` AS `amount`,`donation_details`.`created_at` AS `created_at`,`system_users`.`firstName` AS `firstName`,`system_users`.`middleName` AS `middleName`,`system_users`.`lastName` AS `lastName`,`aids`.`userID` AS `ownerID`,`aids`.`paymentAddress` AS `paymentAddress` from ((`donation_details` join `system_users` on((`donation_details`.`userID` = `system_users`.`userID`))) join `aids` on((`donation_details`.`aidID` = `aids`.`aidId`)));

-- ----------------------------
-- View structure for vwtotalreceives
-- ----------------------------
DROP VIEW IF EXISTS `vwtotalreceives`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vwtotalreceives` AS select `donation_details`.`aidID` AS `aidID`,sum(`donation_details`.`amount`) AS `total` from `donation_details` group by `donation_details`.`aidID`;

SET FOREIGN_KEY_CHECKS = 1;
