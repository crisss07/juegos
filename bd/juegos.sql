/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 100137
 Source Host           : localhost:3306
 Source Schema         : juegos

 Target Server Type    : MySQL
 Target Server Version : 100137
 File Encoding         : 65001

 Date: 07/06/2019 18:26:25
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for premios
-- ----------------------------
DROP TABLE IF EXISTS `premios`;
CREATE TABLE `premios`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `premio` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `puntaje` int(100) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for ranking
-- ----------------------------
DROP TABLE IF EXISTS `ranking`;
CREATE TABLE `ranking`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `persona_id` int(100) NULL DEFAULT NULL,
  `puntaje` int(100) NULL DEFAULT NULL,
  `fecha` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for registro
-- ----------------------------
DROP TABLE IF EXISTS `registro`;
CREATE TABLE `registro`  (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `persona_id` int(100) NULL DEFAULT NULL,
  `nombre_juego` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `puntaje` int(100) NULL DEFAULT NULL,
  `fecha` datetime(0) NULL DEFAULT CURRENT_TIMESTAMP,
  `contador` int(100) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 54 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of registro
-- ----------------------------
INSERT INTO `registro` VALUES (53, 1, 'ahorcado', 2, '2019-06-07 17:26:27', NULL);

SET FOREIGN_KEY_CHECKS = 1;
