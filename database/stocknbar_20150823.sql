/*
Navicat MySQL Data Transfer

Source Server         : Keren
Source Server Version : 50529
Source Host           : localhost:3306
Source Database       : zadmin_stocknbar

Target Server Type    : MYSQL
Target Server Version : 50529
File Encoding         : 65001

Date: 2015-08-23 18:57:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for investments
-- ----------------------------
DROP TABLE IF EXISTS `investments`;
CREATE TABLE `investments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_investor_company` int(11) DEFAULT NULL,
  `id_startup` int(11) DEFAULT NULL,
  `invest_value` decimal(10,0) DEFAULT NULL,
  `publishment_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for investor_companys
-- ----------------------------
DROP TABLE IF EXISTS `investor_companys`;
CREATE TABLE `investor_companys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(45) DEFAULT NULL,
  `description` text,
  `legal_name` varchar(70) DEFAULT NULL,
  `office_address` text,
  `office_phone` varchar(20) DEFAULT NULL,
  `found_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_verified` varchar(1) DEFAULT '0',
  `verified_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for investor_members
-- ----------------------------
DROP TABLE IF EXISTS `investor_members`;
CREATE TABLE `investor_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_investor_user` int(11) DEFAULT NULL,
  `id_company` int(11) DEFAULT NULL,
  `id_investor_position` int(11) DEFAULT NULL,
  `is_admin` varchar(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for investor_users
-- ----------------------------
DROP TABLE IF EXISTS `investor_users`;
CREATE TABLE `investor_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `address` text,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `backup_email` varchar(70) DEFAULT NULL,
  `user_picture_path` varchar(120) DEFAULT NULL,
  `confirmation_code` varchar(45) DEFAULT NULL,
  `is_verified` varchar(1) DEFAULT '0',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for login_session
-- ----------------------------
DROP TABLE IF EXISTS `login_session`;
CREATE TABLE `login_session` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for startups
-- ----------------------------
DROP TABLE IF EXISTS `startups`;
CREATE TABLE `startups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `startup_name` varchar(45) DEFAULT NULL,
  `description` text,
  `legal_name` varchar(45) DEFAULT NULL,
  `office_address` text,
  `office_phone` varchar(20) DEFAULT NULL,
  `npwp_number` varchar(45) DEFAULT NULL,
  `siup_number` varchar(45) DEFAULT NULL,
  `startup_logo_path` varchar(120) DEFAULT NULL,
  `startup_url` varchar(70) DEFAULT NULL,
  `found_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_verified` varchar(1) DEFAULT '0',
  `verified_date` timestamp NULL DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for startup_exchange
-- ----------------------------
DROP TABLE IF EXISTS `startup_exchange`;
CREATE TABLE `startup_exchange` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_startup` int(11) DEFAULT NULL,
  `sell_price` decimal(10,0) DEFAULT NULL,
  `buy_price` decimal(10,0) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for startup_growth
-- ----------------------------
DROP TABLE IF EXISTS `startup_growth`;
CREATE TABLE `startup_growth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_startup` int(11) DEFAULT NULL,
  `provit` decimal(10,0) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for startup_members
-- ----------------------------
DROP TABLE IF EXISTS `startup_members`;
CREATE TABLE `startup_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_startup` int(11) DEFAULT NULL,
  `id_startup_user` int(11) DEFAULT NULL,
  `is_admin` varchar(1) NOT NULL DEFAULT '1',
  `id_startup_position` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for startup_positions
-- ----------------------------
DROP TABLE IF EXISTS `startup_positions`;
CREATE TABLE `startup_positions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `position_name` varchar(45) DEFAULT NULL,
  `description` text,
  `create_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for startup_stocks
-- ----------------------------
DROP TABLE IF EXISTS `startup_stocks`;
CREATE TABLE `startup_stocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_startup` int(11) DEFAULT NULL,
  `stocks` int(11) DEFAULT NULL,
  `min_invest` decimal(10,0) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for startup_users
-- ----------------------------
DROP TABLE IF EXISTS `startup_users`;
CREATE TABLE `startup_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `address` text,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `backup_email` varchar(70) DEFAULT NULL,
  `user_picture_path` varchar(120) DEFAULT NULL,
  `confirmation_code` varchar(45) DEFAULT NULL,
  `is_verified` varchar(1) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for startup_value
-- ----------------------------
DROP TABLE IF EXISTS `startup_value`;
CREATE TABLE `startup_value` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_startup` int(11) DEFAULT NULL,
  `id_investment` int(11) DEFAULT NULL,
  `fund_value` decimal(10,0) DEFAULT NULL,
  `debt_value` decimal(10,0) DEFAULT NULL,
  `assets_value` decimal(10,0) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for subscriber_investors
-- ----------------------------
DROP TABLE IF EXISTS `subscriber_investors`;
CREATE TABLE `subscriber_investors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  `company_name` varchar(70) DEFAULT NULL,
  `invitation_code` varchar(20) DEFAULT NULL,
  `id_invitor_subs` int(11) DEFAULT NULL,
  `invitor_table` varchar(50) DEFAULT NULL,
  `subscribe_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Table structure for subscriber_startups
-- ----------------------------
DROP TABLE IF EXISTS `subscriber_startups`;
CREATE TABLE `subscriber_startups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(120) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  `startup_name` varchar(70) DEFAULT NULL,
  `invitation_code` varchar(20) DEFAULT NULL,
  `id_invitor_subs` int(11) DEFAULT NULL,
  `invitor_table` varchar(50) DEFAULT NULL,
  `subscribe_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
