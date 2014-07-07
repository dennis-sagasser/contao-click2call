-- ********************************************************
-- *                                                      *
-- * IMPORTANT NOTE                                       *
-- *                                                      *
-- * Do not import this file manually but use the Contao  *
-- * install tool to create and maintain database tables! *
-- *                                                      *
-- ********************************************************


-- --------------------------------------------------------

-- 
-- Table `click2call_params`
-- 

CREATE TABLE `tl_click2call` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `sorting` int(10) unsigned NOT NULL default '0',
  `tstamp` int(10) unsigned NOT NULL default '0',
  `provider` varchar(64) NOT NULL default '',
  `host` varchar(128) NOT NULL default '',
  `user` varchar(64) NOT NULL default '',
  `password` varchar(32) NULL default NULL,
  `channel` varchar(128) NOT NULL default '',
  `context` varchar(32) NOT NULL default '',
  `port` int(10) unsigned NOT NULL default '5038',
  `wait_time` tinyint(4) unsigned NOT NULL default '30',
  `priority` tinyint(2) unsigned NOT NULL default '1',
  `show_office_hours` char(1) NOT NULL default '',
  `max_retry` tinyint(2) unsigned NOT NULL default '2',
  `mon_start` int(10) unsigned NULL default NULL,
  `mon_stop` int(10) unsigned NULL default NULL,  
  `tue_start` int(10) unsigned NULL default NULL,
  `tue_stop` int(10) unsigned NULL default NULL,  
  `wed_start` int(10) unsigned NULL default NULL,
  `wed_stop` int(10) unsigned NULL default NULL, 
  `thu_start` int(10) unsigned NULL default NULL,
  `thu_stop` int(10) unsigned NULL default NULL,  
  `fri_start` int(10) unsigned NULL default NULL,
  `fri_stop` int(10) unsigned NULL default NULL,  
  `sat_start` int(10) unsigned NULL default NULL,
  `sat_stop` int(10) unsigned NULL default NULL, 
  `sun_start` int(10) unsigned NULL default NULL,
  `sun_stop` int(10) unsigned NULL default NULL,  
PRIMARY KEY  (`id`),
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- 
-- Table `tl_module`
-- 

CREATE TABLE `tl_module` (
  `foreignKey` int(10) unsigned NOT NULL default '0',
  `teaser` text NULL,
  `addLogo` char(1) NOT NULL default '',
  `logoAlt` varchar(255) NOT NULL default '',
  `logoTitle` varchar(255) NOT NULL default '',
  `logoSize` varchar(64) NOT NULL default '',
  `logoMargin` varchar(128) NOT NULL default '',
  `logoUrl` varchar(255) NOT NULL default '',
  `logoCaption` varchar(255) NOT NULL default '',
  `logoFloating` varchar(32) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;