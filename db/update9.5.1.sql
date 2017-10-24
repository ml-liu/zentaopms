-- DROP TABLE IF EXISTS `zt_entry`;
CREATE TABLE IF NOT EXISTS `zt_entry` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `code` varchar(20) NOT NULL,
  `key` varchar(32) NOT NULL,
  `ip` varchar(100) NOT NULL,
  `desc` text NOT NULL,
  `createdBy` varchar(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  `editedBy` varchar(30) NOT NULL,
  `editedDate` datetime NOT NULL,
  PRIMARY KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `zt_webhook`;
CREATE TABLE IF NOT EXISTS `zt_webhook` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  `contentType` enum('json','form') NOT NULL DEFAULT 'json',
  `sendType` enum('sync','async') NOT NULL DEFAULT 'sync',
  `params` varchar(100) NOT NULL,
  `actions` text NOT NULL,
  `desc` text NOT NULL,
  `createdBy` varchar(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  `editedBy` varchar(30) NOT NULL,
  `editedDate` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `zt_webhookdatas`;
CREATE TABLE IF NOT EXISTS `zt_webhookdatas` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `webhook` mediumint(8) unsigned NOT NULL,
  `action` mediumint(8) unsigned NOT NULL,
  `data` text NOT NULL,
  `status` enum('wait', 'sended') NOT NULL DEFAULT 'wait',
  `createdBy` varchar(30) NOT NULL,
  `createdDate` datetime NOT NULL,
  PRIMARY KEY `id` (`id`),
  UNIQUE KEY `uniq` (`webhook`, `action`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- DROP TABLE IF EXISTS `zt_log`;
CREATE TABLE IF NOT EXISTS `zt_log` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `objectType` varchar(30) NOT NULL,
  `objectID` mediumint(8) unsigned NOT NULL,
  `action` mediumint(8) unsigned NOT NULL,
  `date` datetime NOT NULL,
  `url` varchar(255) NOT NULL,
  `contentType` varchar(40) NOT NULL,
  `data` text NOT NULL,
  `status` smallint(5) NOT NULL,
  PRIMARY KEY `id` (`id`),
  KEY `objectType` (`objectType`),
  KEY `obejctID` (`objectID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
