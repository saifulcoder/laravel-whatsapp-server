/*
 Navicat Premium Data Transfer

 Source Server         : localhost mysql
 Source Server Type    : MySQL
 Source Server Version : 100424 (10.4.24-MariaDB-log)
 Source Host           : 127.0.1.1:3306
 Source Schema         : baileys_api

 Target Server Type    : MySQL
 Target Server Version : 100424 (10.4.24-MariaDB-log)
 File Encoding         : 65001

 Date: 03/06/2023 10:37:10
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for _prisma_migrations
-- ----------------------------
DROP TABLE IF EXISTS `_prisma_migrations`;
CREATE TABLE `_prisma_migrations`  (
  `id` varchar(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `checksum` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `finished_at` datetime(3) NULL DEFAULT NULL,
  `migration_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logs` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `rolled_back_at` datetime(3) NULL DEFAULT NULL,
  `started_at` datetime(3) NOT NULL DEFAULT current_timestamp(3),
  `applied_steps_count` int UNSIGNED NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of _prisma_migrations
-- ----------------------------
INSERT INTO `_prisma_migrations` VALUES ('11d584be-c785-41a6-9280-d452393a462c', '49616142e3244955781ec3da1490014b3d6ad5c8143578238a0e7bb990cb9e6d', '2023-05-26 12:48:11.430', '20230526124811_', NULL, NULL, '2023-05-26 12:48:11.300', 1);

-- ----------------------------
-- Table structure for chat
-- ----------------------------
DROP TABLE IF EXISTS `chat`;
CREATE TABLE `chat`  (
  `pkId` int NOT NULL AUTO_INCREMENT,
  `sessionId` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `archived` tinyint(1) NULL DEFAULT NULL,
  `contactPrimaryIdentityKey` longblob NULL,
  `conversationTimestamp` bigint NULL DEFAULT NULL,
  `createdAt` bigint NULL DEFAULT NULL,
  `createdBy` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `disappearingMode` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `displayName` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `endOfHistoryTransfer` tinyint(1) NULL DEFAULT NULL,
  `endOfHistoryTransferType` int NULL DEFAULT NULL,
  `ephemeralExpiration` int NULL DEFAULT NULL,
  `ephemeralSettingTimestamp` bigint NULL DEFAULT NULL,
  `id` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `isDefaultSubgroup` tinyint(1) NULL DEFAULT NULL,
  `isParentGroup` tinyint(1) NULL DEFAULT NULL,
  `lastMsgTimestamp` bigint NULL DEFAULT NULL,
  `lidJid` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `markedAsUnread` tinyint(1) NULL DEFAULT NULL,
  `mediaVisibility` int NULL DEFAULT NULL,
  `messages` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `muteEndTime` bigint NULL DEFAULT NULL,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `newJid` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `notSpam` tinyint(1) NULL DEFAULT NULL,
  `oldJid` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pHash` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `parentGroupId` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `participant` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `pinned` int NULL DEFAULT NULL,
  `pnJid` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `pnhDuplicateLidThread` tinyint(1) NULL DEFAULT NULL,
  `readOnly` tinyint(1) NULL DEFAULT NULL,
  `shareOwnPn` tinyint(1) NULL DEFAULT NULL,
  `support` tinyint(1) NULL DEFAULT NULL,
  `suspended` tinyint(1) NULL DEFAULT NULL,
  `tcToken` longblob NULL,
  `tcTokenSenderTimestamp` bigint NULL DEFAULT NULL,
  `tcTokenTimestamp` bigint NULL DEFAULT NULL,
  `terminated` tinyint(1) NULL DEFAULT NULL,
  `unreadCount` int NULL DEFAULT NULL,
  `unreadMentionCount` int NULL DEFAULT NULL,
  `wallpaper` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `lastMessageRecvTimestamp` int NULL DEFAULT NULL,
  PRIMARY KEY (`pkId`) USING BTREE,
  UNIQUE INDEX `unique_id_per_session_id`(`sessionId` ASC, `id` ASC) USING BTREE,
  INDEX `Chat_sessionId_idx`(`sessionId` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of chat
-- ----------------------------

-- ----------------------------
-- Table structure for contact
-- ----------------------------
DROP TABLE IF EXISTS `contact`;
CREATE TABLE `contact`  (
  `pkId` int NOT NULL AUTO_INCREMENT,
  `sessionId` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `notify` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `verifiedName` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `imgUrl` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`pkId`) USING BTREE,
  UNIQUE INDEX `unique_id_per_session_id`(`sessionId` ASC, `id` ASC) USING BTREE,
  INDEX `Contact_sessionId_idx`(`sessionId` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of contact
-- ----------------------------

-- ----------------------------
-- Table structure for groupmetadata
-- ----------------------------
DROP TABLE IF EXISTS `groupmetadata`;
CREATE TABLE `groupmetadata`  (
  `pkId` int NOT NULL AUTO_INCREMENT,
  `sessionId` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `subject` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `subjectOwner` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `subjectTime` int NULL DEFAULT NULL,
  `creation` int NULL DEFAULT NULL,
  `desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `descOwner` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `descId` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `restrict` tinyint(1) NULL DEFAULT NULL,
  `announce` tinyint(1) NULL DEFAULT NULL,
  `size` int NULL DEFAULT NULL,
  `participants` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `ephemeralDuration` int NULL DEFAULT NULL,
  `inviteCode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`pkId`) USING BTREE,
  UNIQUE INDEX `unique_id_per_session_id`(`sessionId` ASC, `id` ASC) USING BTREE,
  INDEX `GroupMetadata_sessionId_idx`(`sessionId` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of groupmetadata
-- ----------------------------

-- ----------------------------
-- Table structure for message
-- ----------------------------
DROP TABLE IF EXISTS `message`;
CREATE TABLE `message`  (
  `pkId` int NOT NULL AUTO_INCREMENT,
  `sessionId` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remoteJid` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `agentId` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `bizPrivacyStatus` int NULL DEFAULT NULL,
  `broadcast` tinyint(1) NULL DEFAULT NULL,
  `clearMedia` tinyint(1) NULL DEFAULT NULL,
  `duration` int NULL DEFAULT NULL,
  `ephemeralDuration` int NULL DEFAULT NULL,
  `ephemeralOffToOn` tinyint(1) NULL DEFAULT NULL,
  `ephemeralOutOfSync` tinyint(1) NULL DEFAULT NULL,
  `ephemeralStartTimestamp` bigint NULL DEFAULT NULL,
  `finalLiveLocation` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `futureproofData` longblob NULL,
  `ignore` tinyint(1) NULL DEFAULT NULL,
  `keepInChat` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `key` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `labels` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `mediaCiphertextSha256` longblob NULL,
  `mediaData` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `message` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `messageC2STimestamp` bigint NULL DEFAULT NULL,
  `messageSecret` longblob NULL,
  `messageStubParameters` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `messageStubType` int NULL DEFAULT NULL,
  `messageTimestamp` bigint NULL DEFAULT NULL,
  `multicast` tinyint(1) NULL DEFAULT NULL,
  `originalSelfAuthorUserJidString` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `participant` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `paymentInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `photoChange` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `pollAdditionalMetadata` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `pollUpdates` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `pushName` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `quotedPaymentInfo` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `quotedStickerData` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `reactions` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `revokeMessageTimestamp` bigint NULL DEFAULT NULL,
  `starred` tinyint(1) NULL DEFAULT NULL,
  `status` int NULL DEFAULT NULL,
  `statusAlreadyViewed` tinyint(1) NULL DEFAULT NULL,
  `statusPsa` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `urlNumber` tinyint(1) NULL DEFAULT NULL,
  `urlText` tinyint(1) NULL DEFAULT NULL,
  `userReceipt` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NULL,
  `verifiedBizName` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`pkId`) USING BTREE,
  UNIQUE INDEX `unique_message_key_per_session_id`(`sessionId` ASC, `remoteJid` ASC, `id` ASC) USING BTREE,
  INDEX `Message_sessionId_idx`(`sessionId` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of message
-- ----------------------------

-- ----------------------------
-- Table structure for session
-- ----------------------------
DROP TABLE IF EXISTS `session`;
CREATE TABLE `session`  (
  `pkId` int NOT NULL AUTO_INCREMENT,
  `sessionId` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`pkId`) USING BTREE,
  UNIQUE INDEX `unique_id_per_session_id`(`sessionId` ASC, `id` ASC) USING BTREE,
  INDEX `Session_sessionId_idx`(`sessionId` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of session
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
