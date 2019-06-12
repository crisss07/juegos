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

 Date: 11/06/2019 12:13:10
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ahorcado
-- ----------------------------
DROP TABLE IF EXISTS `ahorcado`;
CREATE TABLE `ahorcado`  (
  `ahorcado_id` int(11) NOT NULL AUTO_INCREMENT,
  `pregunta` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `respuesta` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ahorcado_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ahorcado
-- ----------------------------
INSERT INTO `ahorcado` VALUES (1, 'Símbolo patrio boliviano', 'escarapela');
INSERT INTO `ahorcado` VALUES (2, 'Primer presidente indígena de Bolivia', 'evo');
INSERT INTO `ahorcado` VALUES (3, 'El dios creador del Inca en tierras altas era conocido como:', 'viracocha');
INSERT INTO `ahorcado` VALUES (4, 'La madre tierra se conoce con el nombre:', 'pachamama');

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
) ENGINE = InnoDB AUTO_INCREMENT = 81 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of registro
-- ----------------------------
INSERT INTO `registro` VALUES (80, 2, 'ahorcado', 2, '2019-06-11 11:41:30', NULL);

SET FOREIGN_KEY_CHECKS = 1;
