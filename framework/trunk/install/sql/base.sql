# phpMyAdmin SQL Dump
# version 2.5.6-rc2
# http://www.phpmyadmin.net
#
# Host: localhost
# Generation Time: Jan 15, 2005 at 01:09 AM
# Server version: 4.1.0
# PHP Version: 4.3.10
# 
# Database : `base`
# 

# --------------------------------------------------------

#
# Table structure for table `ooo_acl`
#

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
) TYPE=MyISAM CHARSET=latin1;

#
# Dumping data for table `ooo_acl`
#



# --------------------------------------------------------

#
# Table structure for table `ooo_acl_sections`
#

CREATE TABLE `ooo_acl_sections` (
  `hidden` int(11) NOT NULL default '0',
  `id` int(11) NOT NULL default '0',
  `value` varchar(230) NOT NULL default '',
  `order_value` int(11) NOT NULL default '0',
  `name` varchar(230) NOT NULL default '',
  KEY `hidden_acl_sections` (`hidden`)
) TYPE=MyISAM CHARSET=latin1;

#
# Dumping data for table `ooo_acl_sections`
#

INSERT INTO `ooo_acl_sections` VALUES (0, 1, 'system', 1, 'System');
INSERT INTO `ooo_acl_sections` VALUES (0, 2, 'user', 2, 'User');

# --------------------------------------------------------

#
# Table structure for table `ooo_acl_seq`
#

CREATE TABLE `ooo_acl_seq` (
  `id` int(11) NOT NULL default '0'
) TYPE=MyISAM CHARSET=latin1;

#
# Dumping data for table `ooo_acl_seq`
#

INSERT INTO `ooo_acl_seq` VALUES (17);

# --------------------------------------------------------

#
# Table structure for table `ooo_aco`
#

CREATE TABLE `ooo_aco` (
  `hidden` int(11) NOT NULL default '0',
  `id` int(11) NOT NULL default '0',
  `section_value` varchar(240) NOT NULL default '0',
  `value` varchar(240) NOT NULL default '',
  `order_value` int(11) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  UNIQUE KEY `section_value_value_aco` (`section_value`,`value`),
  KEY `hidden_aco` (`hidden`)
) TYPE=MyISAM CHARSET=latin1;

#
# Dumping data for table `ooo_aco`
#



# --------------------------------------------------------

#
# Table structure for table `ooo_aco_map`
#

CREATE TABLE `ooo_aco_map` (
  `value` varchar(230) NOT NULL default '',
  `acl_id` int(11) NOT NULL default '0',
  `section_value` varchar(230) NOT NULL default '0'
) TYPE=MyISAM CHARSET=latin1;

#
# Dumping data for table `ooo_aco_map`
#


# --------------------------------------------------------

#
# Table structure for table `ooo_aco_sections`
#

CREATE TABLE `ooo_aco_sections` (
  `hidden` int(11) NOT NULL default '0',
  `id` int(11) NOT NULL default '0',
  `value` varchar(230) NOT NULL default '',
  `order_value` int(11) NOT NULL default '0',
  `name` varchar(230) NOT NULL default '',
  UNIQUE KEY `value_aco_sections` (`value`),
  KEY `hidden_aco_sections` (`hidden`)
) TYPE=MyISAM CHARSET=latin1;

#
# Dumping data for table `ooo_aco_sections`
#

INSERT INTO `ooo_aco_sections` VALUES (0, 10, 'system', 10, 'System');

# --------------------------------------------------------

#
# Table structure for table `ooo_aco_sections_seq`
#

CREATE TABLE `ooo_aco_sections_seq` (
  `id` int(11) NOT NULL default '0'
) TYPE=MyISAM CHARSET=latin1;

#
# Dumping data for table `ooo_aco_sections_seq`
#

INSERT INTO `ooo_aco_sections_seq` VALUES (11);

# --------------------------------------------------------

#
# Table structure for table `ooo_aco_seq`
#

CREATE TABLE `ooo_aco_seq` (
  `id` int(11) NOT NULL default '0'
) TYPE=MyISAM CHARSET=latin1;

#
# Dumping data for table `ooo_aco_seq`
#



# --------------------------------------------------------

#
# Table structure for table `ooo_aro`
#

CREATE TABLE `ooo_aro` (
  `hidden` int(11) NOT NULL default '0',
  `id` int(11) NOT NULL default '0',
  `section_value` varchar(240) NOT NULL default '0',
  `value` varchar(240) NOT NULL default '',
  `order_value` int(11) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  UNIQUE KEY `section_value_value_aro` (`section_value`,`value`),
  KEY `hidden_aro` (`hidden`)
) TYPE=MyISAM CHARSET=latin1;

#
# Dumping data for table `ooo_aro`
#


# --------------------------------------------------------

#
# Table structure for table `ooo_aro_groups`
#

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
) TYPE=MyISAM CHARSET=latin1;

#
# Dumping data for table `ooo_aro_groups`
#


# --------------------------------------------------------

#
# Table structure for table `ooo_aro_groups_id_seq`
#

CREATE TABLE `ooo_aro_groups_id_seq` (
  `id` int(11) NOT NULL default '0'
) TYPE=MyISAM CHARSET=latin1;

#
# Dumping data for table `ooo_aro_groups_id_seq`
#


# --------------------------------------------------------

#
# Table structure for table `ooo_aro_groups_map`
#

CREATE TABLE `ooo_aro_groups_map` (
  `group_id` int(11) NOT NULL default '0',
  `acl_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`group_id`)
) TYPE=MyISAM CHARSET=latin1;

#
# Dumping data for table `ooo_aro_groups_map`
#


# --------------------------------------------------------

#
# Table structure for table `ooo_aro_map`
#

CREATE TABLE `ooo_aro_map` (
  `value` varchar(230) NOT NULL default '',
  `acl_id` int(11) NOT NULL default '0',
  `section_value` varchar(230) NOT NULL default '0',
  PRIMARY KEY  (`value`)
) TYPE=MyISAM CHARSET=latin1;

#
# Dumping data for table `ooo_aro_map`
#


# --------------------------------------------------------

#
# Table structure for table `ooo_aro_sections`
#

CREATE TABLE `ooo_aro_sections` (
  `hidden` int(11) NOT NULL default '0',
  `id` int(11) NOT NULL default '0',
  `value` varchar(230) NOT NULL default '',
  `order_value` int(11) NOT NULL default '0',
  `name` varchar(230) NOT NULL default '',
  UNIQUE KEY `value_aro_sections` (`value`),
  KEY `hidden_aro_sections` (`hidden`)
) TYPE=MyISAM CHARSET=latin1;

#
# Dumping data for table `ooo_aro_sections`
#

INSERT INTO `ooo_aro_sections` VALUES (0, 10, 'users', 10, 'Users');

# --------------------------------------------------------

#
# Table structure for table `ooo_aro_sections_seq`
#

CREATE TABLE `ooo_aro_sections_seq` (
  `id` int(11) NOT NULL default '0'
) TYPE=MyISAM CHARSET=latin1;

#
# Dumping data for table `ooo_aro_sections_seq`
#

INSERT INTO `ooo_aro_sections_seq` VALUES (11);

# --------------------------------------------------------

#
# Table structure for table `ooo_aro_seq`
#

CREATE TABLE `ooo_aro_seq` (
  `id` int(11) NOT NULL default '0'
) TYPE=MyISAM CHARSET=latin1;

#
# Dumping data for table `ooo_aro_seq`
#



# --------------------------------------------------------

#
# Table structure for table `ooo_axo`
#

CREATE TABLE `ooo_axo` (
  `hidden` int(11) NOT NULL default '0',
  `id` int(11) NOT NULL default '0',
  `section_value` varchar(240) NOT NULL default '0',
  `value` varchar(240) NOT NULL default '',
  `order_value` int(11) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  UNIQUE KEY `section_value_value_axo` (`section_value`,`value`),
  KEY `hidden_axo` (`hidden`)
) TYPE=MyISAM CHARSET=latin1;

#
# Dumping data for table `ooo_axo`
#


# --------------------------------------------------------

#
# Table structure for table `ooo_axo_groups`
#

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
) TYPE=MyISAM CHARSET=latin1;

#
# Dumping data for table `ooo_axo_groups`
#


# --------------------------------------------------------

#
# Table structure for table `ooo_axo_groups_map`
#

CREATE TABLE `ooo_axo_groups_map` (
  `group_id` int(11) NOT NULL default '0',
  `acl_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`group_id`)
) TYPE=MyISAM CHARSET=latin1;

#
# Dumping data for table `ooo_axo_groups_map`
#


# --------------------------------------------------------

#
# Table structure for table `ooo_axo_map`
#

CREATE TABLE `ooo_axo_map` (
  `value` varchar(230) NOT NULL default '',
  `acl_id` int(11) NOT NULL default '0',
  `section_value` varchar(230) NOT NULL default '0',
  PRIMARY KEY  (`value`)
) TYPE=MyISAM CHARSET=latin1;

#
# Dumping data for table `ooo_axo_map`
#


# --------------------------------------------------------

#
# Table structure for table `ooo_axo_sections`
#

CREATE TABLE `ooo_axo_sections` (
  `hidden` int(11) NOT NULL default '0',
  `id` int(11) NOT NULL default '0',
  `value` varchar(230) NOT NULL default '',
  `order_value` int(11) NOT NULL default '0',
  `name` varchar(230) NOT NULL default '',
  UNIQUE KEY `value_axo_sections` (`value`),
  KEY `hidden_axo_sections` (`hidden`)
) TYPE=MyISAM CHARSET=latin1;

#
# Dumping data for table `ooo_axo_sections`
#


# --------------------------------------------------------

#
# Table structure for table `ooo_config`
#

CREATE TABLE `ooo_config` (
  `id` int(11) NOT NULL auto_increment,
  `config_name` varchar(50) NOT NULL default '',
  `config_value` varchar(255) NOT NULL default '',
  `modified_time` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM CHARSET=latin1;

#
# Dumping data for table `ooo_config`
#

INSERT INTO `ooo_config` VALUES (1, 'themes', '1', '0000-00-00 00:00:00');

# --------------------------------------------------------

#
# Table structure for table `ooo_groups_aro_map`
#

CREATE TABLE `ooo_groups_aro_map` (
  `aro_id` int(11) NOT NULL default '0',
  `group_id` int(11) NOT NULL default '0',
  KEY `aro_id` (`aro_id`)
) TYPE=MyISAM CHARSET=latin1;

#
# Dumping data for table `ooo_groups_aro_map`
#



# --------------------------------------------------------

#
# Table structure for table `ooo_groups_axo_map`
#

CREATE TABLE `ooo_groups_axo_map` (
  `axo_id` int(11) NOT NULL default '0',
  `group_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`axo_id`),
  KEY `axo_id` (`axo_id`)
) TYPE=MyISAM CHARSET=latin1;

#
# Dumping data for table `ooo_groups_axo_map`
#


# --------------------------------------------------------

#
# Table structure for table `ooo_language`
#

CREATE TABLE `ooo_language` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(32) NOT NULL default '',
  `dir` varchar(32) NOT NULL default '',
  PRIMARY KEY  (`id`)
) TYPE=MyISAM CHARSET=latin1;

#
# Dumping data for table `ooo_language`
#

INSERT INTO `ooo_language` VALUES (1, 'english', '/en');

# --------------------------------------------------------

#
# Table structure for table `ooo_themes`
#

CREATE TABLE `ooo_themes` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) default NULL,
  `dir` varchar(50) default NULL,
  PRIMARY KEY  (`id`)
) TYPE=MyISAM CHARSET=latin1;

#
# Dumping data for table `ooo_themes`
#

INSERT INTO `ooo_themes` VALUES (1, 'default', '/default');
