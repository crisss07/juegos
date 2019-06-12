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

 Date: 12/06/2019 16:03:32
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
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_spanish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ahorcado
-- ----------------------------
INSERT INTO `ahorcado` VALUES (5, '¿Cuál es la ciudad más densa de Bolivia?', 'lapaz');
INSERT INTO `ahorcado` VALUES (6, '¿Cuál es la ciudad a mayor altitud de Bolivia?', 'elalto');
INSERT INTO `ahorcado` VALUES (7, '¿Cuál es la ciudad más extensa de Bolivia?', 'santacruz');
INSERT INTO `ahorcado` VALUES (8, '¿Cuál es la capital departamental más meridional de Bolivia?', 'tarija');
INSERT INTO `ahorcado` VALUES (9, '¿Cuál es la capital departamental más septentrional de Bolivia?', 'cobija');
INSERT INTO `ahorcado` VALUES (10, '¿Qué institución pública es responsable de la gestión de la ciudad?', 'municipio');
INSERT INTO `ahorcado` VALUES (11, '¿Cuántas áreas metropolitanas existen efectivamente en Bolivia?', 'tres');
INSERT INTO `ahorcado` VALUES (12, '¿Cómo se denomina la región de la metropolitana de Cochabamba?', 'kanata');
INSERT INTO `ahorcado` VALUES (13, '¿Cómo se denomina la disciplina de planificación de las ciudades?', 'urbanismo');

SET FOREIGN_KEY_CHECKS = 1;
