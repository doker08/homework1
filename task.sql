/*
Navicat MySQL Data Transfer

Source Server         : LOCALE
Source Server Version : 50546
Source Host           : 192.168.56.101:3306
Source Database       : task

Target Server Type    : MYSQL
Target Server Version : 50546
File Encoding         : 65001

Date: 2016-12-07 11:46:05
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `doctors`
-- ----------------------------
DROP TABLE IF EXISTS `doctors`;
CREATE TABLE `doctors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET utf8 NOT NULL,
  `post` varchar(11) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of doctors
-- ----------------------------
INSERT INTO `doctors` VALUES ('1', 'Олег Гуляев', 'Стоматолог');
INSERT INTO `doctors` VALUES ('2', 'Александр Ефремов', 'Хирург');
INSERT INTO `doctors` VALUES ('3', 'Виктория Титова', 'Терапевт');
INSERT INTO `doctors` VALUES ('4', 'Инна Маркова', 'Терапевт');
INSERT INTO `doctors` VALUES ('5', 'Аркадий Никонов', 'Стоматолог');

-- ----------------------------
-- Table structure for `patients`
-- ----------------------------
DROP TABLE IF EXISTS `patients`;
CREATE TABLE `patients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(25) CHARACTER SET utf8 NOT NULL,
  `birthday` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of patients
-- ----------------------------
INSERT INTO `patients` VALUES ('1', 'Андрей Марков', '1995-10-13');
INSERT INTO `patients` VALUES ('2', 'Геннадий Буров', '1990-05-12');
INSERT INTO `patients` VALUES ('3', 'Ольга Игнатова', '1993-01-05');
INSERT INTO `patients` VALUES ('4', 'Виктория Рожкова', '1996-03-20');
INSERT INTO `patients` VALUES ('5', 'Полина Соболева', '1980-12-26');

-- ----------------------------
-- Table structure for `patientsDoctors`
-- ----------------------------
DROP TABLE IF EXISTS `patientsDoctors`;
CREATE TABLE `patientsDoctors` (
  `patientId` int(11) DEFAULT NULL,
  `doctorId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of patientsDoctors
-- ----------------------------
INSERT INTO `patientsDoctors` VALUES ('1', '2');
INSERT INTO `patientsDoctors` VALUES ('1', '3');
INSERT INTO `patientsDoctors` VALUES ('2', '1');
INSERT INTO `patientsDoctors` VALUES ('2', '3');
INSERT INTO `patientsDoctors` VALUES ('2', '4');
INSERT INTO `patientsDoctors` VALUES ('3', '1');
INSERT INTO `patientsDoctors` VALUES ('4', '2');
INSERT INTO `patientsDoctors` VALUES ('5', '1');
