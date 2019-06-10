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

 Date: 10/06/2019 16:50:21
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

SET FOREIGN_KEY_CHECKS = 1;
