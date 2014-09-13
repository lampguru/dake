-- TableName initapp_admin_user
-- Created By initphp.com@2012-01-01
-- Fields uid          主键ID 
-- Fields username     用户名
-- Fields password     用户密码
-- Fields hash         hash
-- Fields email        邮箱地址
-- Fields create_time  创建时间
-- Fields create_ip    创建IP
-- Fields update_time  用户信息更新时间
-- Fields last_time    最后登录时间
-- Fields groupid      用户组ID
DROP TABLE IF EXISTS initapp_admin_user; 
CREATE TABLE `initapp_admin_user` (  
	`uid` int(10) unsigned NOT NULL AUTO_INCREMENT, 
	`username` varchar(20) NOT NULL DEFAULT '', 
	`password` varchar(32) NOT NULL DEFAULT '', 
	`hash` varchar(6) NOT NULL DEFAULT '', 
	`email` varchar(60) NOT NULL DEFAULT '', 
	`create_time` int(10) unsigned NOT NULL DEFAULT '0', 
	`create_ip` varchar(16) NOT NULL DEFAULT '', 
	`update_time` int(10) unsigned NOT NULL DEFAULT '0', 
	`last_time` int(10) unsigned NOT NULL DEFAULT '0', 
	`groupid` int(10) unsigned NOT NULL DEFAULT '0', 
	 PRIMARY KEY (`uid`),    
	 KEY `idx_username` (`username`)
) DEFAULT CHARSET=utf8;

-- TableName initapp_admin_user_login
-- Created By initphp.com@2012-01-01
-- Fields id           主键ID 
-- Fields ip           来源IP
-- Fields update_time  更新时间
-- Fields data         数据参数
DROP TABLE IF EXISTS initapp_admin_user_login; 
CREATE TABLE `initapp_admin_user_login` (  
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT, 
	`ip` varchar(25) NOT NULL DEFAULT '', 
	`update_time` int(10) unsigned NOT NULL DEFAULT '0', 
	`data` text NOT NULL,
	 PRIMARY KEY (`id`),    
	 KEY `idx_ip_update_time` (`ip`, `update_time`)
) DEFAULT CHARSET=utf8;

-- TableName initapp_admin_log 后台日志表
-- Created By initphp.com@2012-01-01
-- Fields id           主键ID 
-- Fields username     操作用户
-- Fields ip           来源IP
-- Fields update_time  更新时间
-- Fields controller   c
-- Fields action       a
-- Fields msg          操作提示
-- Fields data         数据参数
DROP TABLE IF EXISTS initapp_admin_log; 
CREATE TABLE `initapp_admin_log` (  
	`id` int(10) unsigned NOT NULL AUTO_INCREMENT, 
	`username` varchar(25) NOT NULL DEFAULT '', 
	`ip` varchar(25) NOT NULL DEFAULT '', 
	`update_time` int(10) unsigned NOT NULL DEFAULT '0', 
	`controller` varchar(25) NOT NULL DEFAULT '', 
	`action` varchar(25) NOT NULL DEFAULT '', 
	`msg` text NOT NULL,
	`data` text NOT NULL,
	 PRIMARY KEY (`id`),    
	 KEY `idx_update_time` (`update_time`),
	 KEY `idx_username` (`username`)
) DEFAULT CHARSET=utf8;

-- TableName initapp_admin_group 后台用户组
-- Created By initphp.com@2012-01-01
-- Fields groupid      用户组ID
-- Fields name         用户组名称
-- Fields descrip      用户组描述
-- Fields create_time  创建时间
-- Fields if_default   是否默认
-- Fields rvalue       权限值
DROP TABLE IF EXISTS initapp_admin_group; 
CREATE TABLE IF NOT EXISTS `initapp_admin_group` (
  `groupid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '',
  `descrip` varchar(255) NOT NULL DEFAULT '',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `if_default` tinyint(10) unsigned NOT NULL DEFAULT '0',
  `rvalue` text NOT NULL,
  PRIMARY KEY (`groupid`)
)   DEFAULT CHARSET=utf8; 

-- TableName initapp_site_config 站点配置文件
-- Created By initphp.com@2012-01-01
-- Fields k       KEY值 
-- Fields v       Value值
DROP TABLE IF EXISTS initapp_site_config; 
CREATE TABLE `initapp_site_config` (  
	`k` varchar(20) NOT NULL DEFAULT '', 
	`v` text NOT NULL,
	 PRIMARY KEY (`k`)
) DEFAULT CHARSET=utf8;

-- TableName initapp_ad_position 广告位
-- Created By initphp.com@2012-01-01
-- Fields id           主键ID
-- Fields tag          广告位标识名称
-- Fields name         广告位名称
-- Fields descrip      广告位描述
-- Fields create_time  创建时间
DROP TABLE IF EXISTS initapp_ad_position; 
CREATE TABLE IF NOT EXISTS `initapp_ad_position` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag` varchar(20) NOT NULL DEFAULT '',
  `name` varchar(60) NOT NULL DEFAULT '',
  `descrip` varchar(255) NOT NULL DEFAULT '',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_tag` (`tag`)
)   DEFAULT CHARSET=utf8; 

-- TableName initapp_ad_content 广告内容
-- Created By initphp.com@2012-01-01
-- Fields id           主键ID
-- Fields posid        广告位ID
-- Fields type         广告位类型
-- Fields name         广告名称
-- Fields descrip      广告描述
-- Fields create_time  创建时间
-- Fields status       状态
-- Fields start_time   开始时间
-- Fields end_time     结束时间
-- Fields sort         排序
DROP TABLE IF EXISTS initapp_ad_content; 
CREATE TABLE IF NOT EXISTS `initapp_ad_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `posid` int(10) unsigned NOT NULL DEFAULT '0',
  `type` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `name` varchar(60) NOT NULL DEFAULT '',
  `descrip` varchar(255) NOT NULL DEFAULT '',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `status` tinyint(3) unsigned NOT NULL  DEFAULT '0',
  `start_time` int(10) unsigned NOT NULL DEFAULT '0',
  `end_time` int(10) unsigned NOT NULL DEFAULT '0',
  `sort` tinyint(3) unsigned NOT NULL  DEFAULT '0',
  PRIMARY KEY (`id`)
)  DEFAULT CHARSET=utf8; 

INSERT INTO `initapp_admin_user` (`uid`, `username`, `password`, `hash`, `email`, `create_time`, `create_ip`, `update_time`, `last_time`, `groupid`) VALUES
(1, 'admin', 'c4a15f693b7412f454a129c73b7d8767', 'sg899c', '420332292@qq.om', 1328677231, '', 1330052167, 1330052167, 1),
(42, 'woshiheihei', '5e9b0b8098c079dd859c42bc131c0844', 'iyea6t', 'woshiheihei@qq.com', 1329358939, '', 1329732935, 1329732935, 1);
