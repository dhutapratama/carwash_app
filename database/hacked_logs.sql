/*
Navicat MySQL Data Transfer

Source Server         : Keren
Source Server Version : 50529
Source Host           : localhost:3306
Source Database       : zadmin_stocknbar

Target Server Type    : MYSQL
Target Server Version : 50529
File Encoding         : 65001

Date: 2015-08-24 18:40:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for hacked_logs
-- ----------------------------
DROP TABLE IF EXISTS `hacked_logs`;
CREATE TABLE `hacked_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `detection_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip_address` varchar(20) DEFAULT NULL,
  `hacking_type` varchar(20) DEFAULT NULL,
  `resolving_type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8;
