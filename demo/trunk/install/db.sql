-- phpMyAdmin SQL Dump
-- version 2.6.1
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Mar 17, 2005 at 05:51 PM
-- Server version: 4.1.10
-- PHP Version: 4.3.10
-- 
-- Database: `ooo`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `base_users`
-- 

CREATE TABLE `base_users` (
  `id` int(11) NOT NULL auto_increment,
  `username` varchar(32) NOT NULL default '',
  `password` varchar(32) NOT NULL default '',
  `change_id` varchar(10) default NULL,
  `over_time` varchar(30) default NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `base_users`
-- 

INSERT INTO `base_users` VALUES (1, 'admin@openology.org', '21232f297a57a5a743894a0e4a801fc3', '', '');
INSERT INTO `base_users` VALUES (2, 'test1@openology.org', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL);
INSERT INTO `base_users` VALUES (3, 'test2@openology.org', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL);
INSERT INTO `base_users` VALUES (4, 'test2@openology.org', 'e10adc3949ba59abbe56e057f20f883e', NULL, NULL);

-- --------------------------------------------------------

-- 
-- Table structure for table `ooo_acl`
-- 

CREATE TABLE `ooo_acl` (
  `updated_date` int(11) NOT NULL default '0',
  `id` int(11) NOT NULL default '0',
  `section_value` varchar(230) NOT NULL default 'system',
  `allow` int(11) NOT NULL default '0',
  `enabled` int(11) NOT NULL default '0',
  `return_value` longtext,
  `note` longtext,
  KEY `enabled_acl` (`enabled`),
  KEY `section_value_acl` (`section_value`),
  KEY `updated_date_acl` (`updated_date`)
) TYPE=MyISAM;

-- 
-- Dumping data for table `ooo_acl`
-- 

INSERT INTO `ooo_acl` VALUES (1108361738, 18, 'system', 1, 1, '', '');
INSERT INTO `ooo_acl` VALUES (1111047809, 19, 'system', 1, 1, '', '');
INSERT INTO `ooo_acl` VALUES (1111047823, 20, 'system', 1, 1, '', '');

-- --------------------------------------------------------

-- 
-- Table structure for table `ooo_acl_sections`
-- 

CREATE TABLE `ooo_acl_sections` (
  `hidden` int(11) NOT NULL default '0',
  `id` int(11) NOT NULL default '0',
  `value` varchar(230) NOT NULL default '',
  `order_value` int(11) NOT NULL default '0',
  `name` varchar(230) NOT NULL default '',
  KEY `hidden_acl_sections` (`hidden`)
) TYPE=MyISAM;

-- 
-- Dumping data for table `ooo_acl_sections`
-- 

INSERT INTO `ooo_acl_sections` VALUES (0, 1, 'system', 1, 'System');
INSERT INTO `ooo_acl_sections` VALUES (0, 2, 'user', 2, 'User');

-- --------------------------------------------------------

-- 
-- Table structure for table `ooo_acl_seq`
-- 

CREATE TABLE `ooo_acl_seq` (
  `id` int(11) NOT NULL default '0'
) TYPE=MyISAM;

-- 
-- Dumping data for table `ooo_acl_seq`
-- 

INSERT INTO `ooo_acl_seq` VALUES (20);

-- --------------------------------------------------------

-- 
-- Table structure for table `ooo_aco`
-- 

CREATE TABLE `ooo_aco` (
  `hidden` int(11) NOT NULL default '0',
  `id` int(11) NOT NULL default '0',
  `section_value` varchar(240) NOT NULL default '0',
  `value` varchar(240) NOT NULL default '',
  `order_value` int(11) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  UNIQUE KEY `section_value_value_aco` (`section_value`,`value`),
  KEY `hidden_aco` (`hidden`)
) TYPE=MyISAM;

-- 
-- Dumping data for table `ooo_aco`
-- 

INSERT INTO `ooo_aco` VALUES (0, 22, 'system', 'user', 22, 'User Admin');
INSERT INTO `ooo_aco` VALUES (0, 21, 'system', 'group', 21, 'Group Admin');

-- --------------------------------------------------------

-- 
-- Table structure for table `ooo_aco_map`
-- 

CREATE TABLE `ooo_aco_map` (
  `value` varchar(230) NOT NULL default '',
  `acl_id` int(11) NOT NULL default '0',
  `section_value` varchar(230) NOT NULL default '0'
) TYPE=MyISAM;

-- 
-- Dumping data for table `ooo_aco_map`
-- 

INSERT INTO `ooo_aco_map` VALUES ('user', 18, 'system');
INSERT INTO `ooo_aco_map` VALUES ('group', 18, 'system');
INSERT INTO `ooo_aco_map` VALUES ('user', 20, 'system');
INSERT INTO `ooo_aco_map` VALUES ('group', 19, 'system');

-- --------------------------------------------------------

-- 
-- Table structure for table `ooo_aco_sections`
-- 

CREATE TABLE `ooo_aco_sections` (
  `hidden` int(11) NOT NULL default '0',
  `id` int(11) NOT NULL default '0',
  `value` varchar(230) NOT NULL default '',
  `order_value` int(11) NOT NULL default '0',
  `name` varchar(230) NOT NULL default '',
  UNIQUE KEY `value_aco_sections` (`value`),
  KEY `hidden_aco_sections` (`hidden`)
) TYPE=MyISAM;

-- 
-- Dumping data for table `ooo_aco_sections`
-- 

INSERT INTO `ooo_aco_sections` VALUES (0, 10, 'system', 10, 'System');

-- --------------------------------------------------------

-- 
-- Table structure for table `ooo_aco_sections_seq`
-- 

CREATE TABLE `ooo_aco_sections_seq` (
  `id` int(11) NOT NULL default '0'
) TYPE=MyISAM;

-- 
-- Dumping data for table `ooo_aco_sections_seq`
-- 

INSERT INTO `ooo_aco_sections_seq` VALUES (11);

-- --------------------------------------------------------

-- 
-- Table structure for table `ooo_aco_seq`
-- 

CREATE TABLE `ooo_aco_seq` (
  `id` int(11) NOT NULL default '0'
) TYPE=MyISAM;

-- 
-- Dumping data for table `ooo_aco_seq`
-- 

INSERT INTO `ooo_aco_seq` VALUES (30);

-- --------------------------------------------------------

-- 
-- Table structure for table `ooo_aro`
-- 

CREATE TABLE `ooo_aro` (
  `hidden` int(11) NOT NULL default '0',
  `id` int(11) NOT NULL default '0',
  `section_value` varchar(240) NOT NULL default '0',
  `value` varchar(240) NOT NULL default '',
  `order_value` int(11) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  UNIQUE KEY `section_value_value_aro` (`section_value`,`value`),
  KEY `hidden_aro` (`hidden`)
) TYPE=MyISAM;

-- 
-- Dumping data for table `ooo_aro`
-- 

INSERT INTO `ooo_aro` VALUES (0, 10, 'users', '1', 0, '1');
INSERT INTO `ooo_aro` VALUES (0, 14, 'users', '2', 0, '2');
INSERT INTO `ooo_aro` VALUES (0, 15, 'users', '4', 0, '4');

-- --------------------------------------------------------

-- 
-- Table structure for table `ooo_aro_groups`
-- 

CREATE TABLE `ooo_aro_groups` (
  `value` varchar(255) NOT NULL default '',
  `id` int(11) NOT NULL default '0',
  `parent_id` int(11) NOT NULL default '0',
  `lft` int(11) NOT NULL default '0',
  `rgt` int(11) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`value`),
  UNIQUE KEY `value_aro_groups` (`value`),
  KEY `parent_id_aro_groups` (`parent_id`),
  KEY `lft_rgt_aro_groups` (`lft`,`rgt`)
) TYPE=MyISAM;

-- 
-- Dumping data for table `ooo_aro_groups`
-- 

INSERT INTO `ooo_aro_groups` VALUES ('top', 10, 0, 1, 14, 'top');
INSERT INTO `ooo_aro_groups` VALUES ('1', 20, 10, 8, 9, '1');
INSERT INTO `ooo_aro_groups` VALUES ('2', 21, 10, 10, 11, '2');
INSERT INTO `ooo_aro_groups` VALUES ('3', 22, 10, 12, 13, '3');

-- --------------------------------------------------------

-- 
-- Table structure for table `ooo_aro_groups_id_seq`
-- 

CREATE TABLE `ooo_aro_groups_id_seq` (
  `id` int(11) NOT NULL default '0'
) TYPE=MyISAM;

-- 
-- Dumping data for table `ooo_aro_groups_id_seq`
-- 

INSERT INTO `ooo_aro_groups_id_seq` VALUES (22);

-- --------------------------------------------------------

-- 
-- Table structure for table `ooo_aro_groups_map`
-- 

CREATE TABLE `ooo_aro_groups_map` (
  `group_id` int(11) NOT NULL default '0',
  `acl_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`group_id`)
) TYPE=MyISAM;

-- 
-- Dumping data for table `ooo_aro_groups_map`
-- 

INSERT INTO `ooo_aro_groups_map` VALUES (20, 18);
INSERT INTO `ooo_aro_groups_map` VALUES (21, 19);
INSERT INTO `ooo_aro_groups_map` VALUES (22, 20);

-- --------------------------------------------------------

-- 
-- Table structure for table `ooo_aro_map`
-- 

CREATE TABLE `ooo_aro_map` (
  `value` varchar(230) NOT NULL default '',
  `acl_id` int(11) NOT NULL default '0',
  `section_value` varchar(230) NOT NULL default '0',
  PRIMARY KEY  (`value`)
) TYPE=MyISAM;

-- 
-- Dumping data for table `ooo_aro_map`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `ooo_aro_sections`
-- 

CREATE TABLE `ooo_aro_sections` (
  `hidden` int(11) NOT NULL default '0',
  `id` int(11) NOT NULL default '0',
  `value` varchar(230) NOT NULL default '',
  `order_value` int(11) NOT NULL default '0',
  `name` varchar(230) NOT NULL default '',
  UNIQUE KEY `value_aro_sections` (`value`),
  KEY `hidden_aro_sections` (`hidden`)
) TYPE=MyISAM;

-- 
-- Dumping data for table `ooo_aro_sections`
-- 

INSERT INTO `ooo_aro_sections` VALUES (0, 10, 'users', 10, 'Users');

-- --------------------------------------------------------

-- 
-- Table structure for table `ooo_aro_sections_seq`
-- 

CREATE TABLE `ooo_aro_sections_seq` (
  `id` int(11) NOT NULL default '0'
) TYPE=MyISAM;

-- 
-- Dumping data for table `ooo_aro_sections_seq`
-- 

INSERT INTO `ooo_aro_sections_seq` VALUES (11);

-- --------------------------------------------------------

-- 
-- Table structure for table `ooo_aro_seq`
-- 

CREATE TABLE `ooo_aro_seq` (
  `id` int(11) NOT NULL default '0'
) TYPE=MyISAM;

-- 
-- Dumping data for table `ooo_aro_seq`
-- 

INSERT INTO `ooo_aro_seq` VALUES (16);

-- --------------------------------------------------------

-- 
-- Table structure for table `ooo_axo`
-- 

CREATE TABLE `ooo_axo` (
  `hidden` int(11) NOT NULL default '0',
  `id` int(11) NOT NULL default '0',
  `section_value` varchar(240) NOT NULL default '0',
  `value` varchar(240) NOT NULL default '',
  `order_value` int(11) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  UNIQUE KEY `section_value_value_axo` (`section_value`,`value`),
  KEY `hidden_axo` (`hidden`)
) TYPE=MyISAM;

-- 
-- Dumping data for table `ooo_axo`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `ooo_axo_groups`
-- 

CREATE TABLE `ooo_axo_groups` (
  `value` varchar(255) NOT NULL default '',
  `id` int(11) NOT NULL default '0',
  `parent_id` int(11) NOT NULL default '0',
  `lft` int(11) NOT NULL default '0',
  `rgt` int(11) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`value`),
  UNIQUE KEY `value_axo_groups` (`value`),
  KEY `parent_id_axo_groups` (`parent_id`),
  KEY `lft_rgt_axo_groups` (`lft`,`rgt`)
) TYPE=MyISAM;

-- 
-- Dumping data for table `ooo_axo_groups`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `ooo_axo_groups_map`
-- 

CREATE TABLE `ooo_axo_groups_map` (
  `group_id` int(11) NOT NULL default '0',
  `acl_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`group_id`)
) TYPE=MyISAM;

-- 
-- Dumping data for table `ooo_axo_groups_map`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `ooo_axo_map`
-- 

CREATE TABLE `ooo_axo_map` (
  `value` varchar(230) NOT NULL default '',
  `acl_id` int(11) NOT NULL default '0',
  `section_value` varchar(230) NOT NULL default '0',
  PRIMARY KEY  (`value`)
) TYPE=MyISAM;

-- 
-- Dumping data for table `ooo_axo_map`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `ooo_axo_sections`
-- 

CREATE TABLE `ooo_axo_sections` (
  `hidden` int(11) NOT NULL default '0',
  `id` int(11) NOT NULL default '0',
  `value` varchar(230) NOT NULL default '',
  `order_value` int(11) NOT NULL default '0',
  `name` varchar(230) NOT NULL default '',
  UNIQUE KEY `value_axo_sections` (`value`),
  KEY `hidden_axo_sections` (`hidden`)
) TYPE=MyISAM;

-- 
-- Dumping data for table `ooo_axo_sections`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `ooo_config`
-- 

CREATE TABLE `ooo_config` (
  `id` int(11) NOT NULL auto_increment,
  `config_name` varchar(50) NOT NULL default '',
  `config_value` varchar(255) NOT NULL default '',
  `modified_time` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `ooo_config`
-- 

INSERT INTO `ooo_config` VALUES (1, 'themes', '1', '0000-00-00 00:00:00');

-- --------------------------------------------------------

-- 
-- Table structure for table `ooo_groups_aro_map`
-- 

CREATE TABLE `ooo_groups_aro_map` (
  `aro_id` int(11) NOT NULL default '0',
  `group_id` int(11) NOT NULL default '0',
  KEY `aro_id` (`aro_id`)
) TYPE=MyISAM;

-- 
-- Dumping data for table `ooo_groups_aro_map`
-- 

INSERT INTO `ooo_groups_aro_map` VALUES (10, 20);
INSERT INTO `ooo_groups_aro_map` VALUES (14, 21);
INSERT INTO `ooo_groups_aro_map` VALUES (15, 22);

-- --------------------------------------------------------

-- 
-- Table structure for table `ooo_groups_axo_map`
-- 

CREATE TABLE `ooo_groups_axo_map` (
  `axo_id` int(11) NOT NULL default '0',
  `group_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`axo_id`),
  KEY `axo_id` (`axo_id`)
) TYPE=MyISAM;

-- 
-- Dumping data for table `ooo_groups_axo_map`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `ooo_language`
-- 

CREATE TABLE `ooo_language` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(32) NOT NULL default '',
  `dir` varchar(32) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `ooo_language`
-- 

INSERT INTO `ooo_language` VALUES (1, 'english', '/en');

-- --------------------------------------------------------

-- 
-- Table structure for table `ooo_themes`
-- 

CREATE TABLE `ooo_themes` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) default NULL,
  `dir` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `ooo_themes`
-- 

INSERT INTO `ooo_themes` VALUES (1, 'default', '/default');

-- --------------------------------------------------------

-- 
-- Table structure for table `user`
-- 

CREATE TABLE `user` (
  `id` int(11) NOT NULL default '0',
  `name` varchar(20) default NULL,
  `did` varchar(20) default NULL,
  `fax` varchar(20) default NULL,
  `email` varchar(50) default NULL,
  `active` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM;

-- 
-- Dumping data for table `user`
-- 

INSERT INTO `user` VALUES (1, 'admin', '12345678', '12345678', 'admin@openology.org', 1);
INSERT INTO `user` VALUES (2, 'Test 1', '123456', '123456', 'test1@openology.org', 1);
INSERT INTO `user` VALUES (4, 'Test 2', '1234567', '1234567', 'test2@openology.org', 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `usergroup`
-- 

CREATE TABLE `usergroup` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) default NULL,
  `description` text,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `usergroup`
-- 

INSERT INTO `usergroup` VALUES (1, 'admin', 'admin group');
INSERT INTO `usergroup` VALUES (2, 'Group 1', 'Test group 1');
INSERT INTO `usergroup` VALUES (3, 'Group 2', 'Test group 2');
