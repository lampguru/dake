-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2014 年 09 月 16 日 17:37
-- 服务器版本: 5.5.34
-- PHP 版本: 5.3.28

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `dake`
--

-- --------------------------------------------------------

--
-- 表的结构 `initapp_admin_group`
--

CREATE TABLE IF NOT EXISTS `initapp_admin_group` (
  `groupid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL DEFAULT '',
  `descrip` varchar(255) NOT NULL DEFAULT '',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `if_default` tinyint(10) unsigned NOT NULL DEFAULT '0',
  `rvalue` text NOT NULL,
  PRIMARY KEY (`groupid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `initapp_admin_group`
--

INSERT INTO `initapp_admin_group` (`groupid`, `name`, `descrip`, `create_time`, `if_default`, `rvalue`) VALUES
(1, 'super', '超级管理员', 1410254747, 0, 'system_admin_user_run,system_admin_user_edit,system_admin_user_editdo,system_admin_user_del,system_admin_user_add,system_admin_user_adddo,system_admin_group_run,system_admin_group_edit,system_admin_group_editdo,system_admin_group_del,system_admin_group_add,system_admin_group_adddo,system_admin_adminlog_run,system_admin_adminlog_detail,system_site_site_run,system_site_site_editdo,system_site_access_run,system_site_access_editdo,extend_ad_ad_run,extend_ad_ad_edit,extend_ad_ad_editdo,extend_ad_ad_del,extend_ad_ad_add,extend_ad_ad_adddo,extend_ad_ad_adlist,extend_ad_ad_adadd,extend_ad_ad_adadddo,extend_ad_ad_adedit,extend_ad_ad_adeditdo,extend_ad_ad_addel');

-- --------------------------------------------------------

--
-- 表的结构 `initapp_admin_log`
--

CREATE TABLE IF NOT EXISTS `initapp_admin_log` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=193 ;

--
-- 转存表中的数据 `initapp_admin_log`
--

INSERT INTO `initapp_admin_log` (`id`, `username`, `ip`, `update_time`, `controller`, `action`, `msg`, `data`) VALUES
(1, 'admin', '::1', 1410239940, 'index', 'logindo', '登录成功！', '%7B%22initphp_token%22%3A%223024c840%22%2C%22username%22%3A%22admin%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(2, 'admin', '::1', 1410239989, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%223024c840%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%7D%7D'),
(3, '', '::1', 1410245231, 'index', 'logindo', '用户名或者密码为空！', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(4, '', '::1', 1410245238, 'index', 'logindo', '用户名或者密码为空！', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(5, 'admin', '::1', 1410245267, 'index', 'logindo', '用户名或者密码为空！', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22admin%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(6, 'admin', '::1', 1410245273, 'index', 'logindo', '密码不正确', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22admin%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(7, 'asdasd', '::1', 1410245293, 'index', 'logindo', '用户不存在', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22asdasd%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(8, '', '::1', 1410245698, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%223024c840%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(9, '', '::1', 1410245702, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%223024c840%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(10, '', '::1', 1410246308, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%223024c840%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(11, 'asdasd', '::1', 1410246342, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22asdasd%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(12, 'asdasd', '::1', 1410247795, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22asdasd%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(13, '', '::1', 1410247798, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(14, '', '::1', 1410247803, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(15, '', '::1', 1410247841, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(16, '', '::1', 1410247843, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(17, '', '::1', 1410247844, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(18, '', '::1', 1410247977, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(19, '', '::1', 1410247977, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(20, '', '::1', 1410247978, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(21, '', '::1', 1410248368, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(22, '', '::1', 1410248444, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(23, '', '::1', 1410248444, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(24, '', '::1', 1410248564, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(25, '', '::1', 1410248568, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(26, '', '::1', 1410248600, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(27, '', '::1', 1410248603, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(28, '', '::1', 1410248627, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(29, '', '::1', 1410248634, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(30, '', '::1', 1410248657, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(31, '', '::1', 1410248661, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(32, '', '::1', 1410248663, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(33, '', '::1', 1410248951, 'index', 'logindo', '用户名或者密码为空！', '%7B%22initphp_token%22%3A%223024c840%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(34, '', '::1', 1410249019, 'index', 'logindo', '用户名或者密码为空！', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(35, '', '::1', 1410249027, 'index', 'logindo', '用户名或者密码为空！', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(36, '', '::1', 1410249094, 'index', 'logindo', '用户名或者密码为空！', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(37, '', '::1', 1410249112, 'index', 'logindo', '用户名或者密码为空！', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(38, '', '::1', 1410250355, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(39, '', '::1', 1410250472, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(40, '', '::1', 1410250479, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(41, '', '::1', 1410250493, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(42, '', '::1', 1410250535, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%222bb431ac%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(43, '', '::1', 1410250542, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%222bb431ac%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(44, '', '::1', 1410250624, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%222bb431ac%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(45, '', '::1', 1410250672, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%222bb431ac%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(46, '', '::1', 1410250739, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%222bb431ac%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(47, '', '::1', 1410250754, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%222bb431ac%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(48, '', '::1', 1410250773, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%222bb431ac%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(49, '', '::1', 1410250802, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%222bb431ac%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(50, '', '::1', 1410250809, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%222bb431ac%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(51, '', '::1', 1410251595, 'index', 'logindo', '错误次数过多，1小时候再登', '%7B%22initphp_token%22%3A%222bb431ac%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(52, '', '::1', 1410253543, 'index', 'logindo', '用户名或者密码为空！', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(53, '', '::1', 1410253560, 'index', 'logindo', '用户名或者密码为空！', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(54, 'admin', '::1', 1410253571, 'index', 'logindo', '登录成功！', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22admin%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(55, 'admin', '::1', 1410253609, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22eaa1e590%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%7D%7D'),
(56, 'admin', '::1', 1410253641, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22eaa1e590%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%7D%7D'),
(57, 'admin', '::1', 1410253666, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22eaa1e590%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%7D%7D'),
(58, 'admin', '::1', 1410254747, 'group', 'adddo', '用户组创建成功', '%7B%22init_token%22%3A%22eaa1e590%22%2C%22name%22%3A%22dake%22%2C%22descrip%22%3A%22%5Cu8d85%5Cu7ea7%5Cu7ba1%5Cu7406%5Cu5458%22%2C%22system%22%3A%22on%22%2C%22admin%22%3A%22on%22%2C%22rvalue%22%3A%5B%22system_admin_user_run%22%2C%22system_admin_user_edit%22%2C%22system_admin_user_editdo%22%2C%22system_admin_user_del%22%2C%22system_admin_user_add%22%2C%22system_admin_user_adddo%22%2C%22system_admin_group_run%22%2C%22system_admin_group_edit%22%2C%22system_admin_group_editdo%22%2C%22system_admin_group_del%22%2C%22system_admin_group_add%22%2C%22system_admin_group_adddo%22%2C%22system_admin_adminlog_run%22%2C%22system_admin_adminlog_detail%22%2C%22system_site_site_run%22%2C%22system_site_site_editdo%22%2C%22system_site_access_run%22%2C%22system_site_access_editdo%22%2C%22extend_ad_ad_run%22%2C%22extend_ad_ad_edit%22%2C%22extend_ad_ad_editdo%22%2C%22extend_ad_ad_del%22%2C%22extend_ad_ad_add%22%2C%22extend_ad_ad_adddo%22%2C%22extend_ad_ad_adlist%22%2C%22extend_ad_ad_adadd%22%2C%22extend_ad_ad_adadddo%22%2C%22extend_ad_ad_adedit%22%2C%22extend_ad_ad_adeditdo%22%2C%22extend_ad_ad_addel%22%5D%2C%22site%22%3A%22on%22%2C%22extend%22%3A%22on%22%2C%22ad%22%3A%22on%22%7D'),
(59, 'admin', '::1', 1410254771, 'group', 'editdo', '用户组编辑成功', '%7B%22init_token%22%3A%22eaa1e590%22%2C%22groupid%22%3A%221%22%2C%22name%22%3A%22dake%22%2C%22descrip%22%3A%22%5Cu8d85%5Cu7ea7%5Cu7ba1%5Cu7406%5Cu5458%22%2C%22rvalue%22%3A%5B%22system_admin_user_run%22%2C%22system_admin_user_edit%22%2C%22system_admin_user_editdo%22%2C%22system_admin_user_del%22%2C%22system_admin_user_add%22%2C%22system_admin_user_adddo%22%2C%22system_admin_group_run%22%2C%22system_admin_group_edit%22%2C%22system_admin_group_editdo%22%2C%22system_admin_group_del%22%2C%22system_admin_group_add%22%2C%22system_admin_group_adddo%22%2C%22system_admin_adminlog_run%22%2C%22system_admin_adminlog_detail%22%2C%22system_site_site_run%22%2C%22system_site_site_editdo%22%2C%22system_site_access_run%22%2C%22system_site_access_editdo%22%2C%22extend_ad_ad_run%22%2C%22extend_ad_ad_edit%22%2C%22extend_ad_ad_editdo%22%2C%22extend_ad_ad_del%22%2C%22extend_ad_ad_add%22%2C%22extend_ad_ad_adddo%22%2C%22extend_ad_ad_adlist%22%2C%22extend_ad_ad_adadd%22%2C%22extend_ad_ad_adadddo%22%2C%22extend_ad_ad_adedit%22%2C%22extend_ad_ad_adeditdo%22%5D%7D'),
(60, 'admin', '::1', 1410254886, 'ad', 'adddo', '广告位新增成功', '%7B%22init_token%22%3A%22eaa1e590%22%2C%22name%22%3A%22asd%22%2C%22tag%22%3A%22aasd%22%2C%22descrip%22%3A%22asd%22%7D'),
(61, 'admin', '::1', 1410254922, 'index', 'logindo', '登录成功！', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22admin%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(62, 'admin', '::1', 1410254923, 'index', 'logindo', '登录成功！', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22admin%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(63, 'admin', '::1', 1410254936, 'index', 'logindo', '登录成功！', '%7B%22initphp_token%22%3A%22eaa1e590%22%2C%22username%22%3A%22admin%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(64, 'admin', '::1', 1410310067, 'index', 'logindo', '登录成功！', '%7B%22initphp_token%22%3A%22499892a1%22%2C%22username%22%3A%22admin%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(65, 'admin', '::1', 1410310068, 'index', 'logindo', '登录成功！', '%7B%22initphp_token%22%3A%22499892a1%22%2C%22username%22%3A%22admin%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(66, 'admin', '::1', 1410310368, 'index', 'logindo', '登录成功！', '%7B%22initphp_token%22%3A%22499892a1%22%2C%22username%22%3A%22admin%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(67, 'admin', '::1', 1410310381, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22499892a1%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%7D%7D'),
(68, 'admin', '::1', 1410310409, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22499892a1%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%7D%7D'),
(69, 'admin', '::1', 1410310426, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22499892a1%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%7D%7D'),
(70, 'admin', '::1', 1410310447, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22499892a1%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%7D%7D'),
(71, 'admin', '::1', 1410311123, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22499892a1%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%7D%7D'),
(72, 'admin', '::1', 1410311183, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22499892a1%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%7D%7D'),
(73, 'admin', '::1', 1410313410, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22499892a1%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%7D%7D'),
(74, 'admin', '::1', 1410313642, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22499892a1%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%7D%7D'),
(75, 'admin', '::1', 1410313725, 'index', 'logindo', '登录成功！', '%7B%22initphp_token%22%3A%222a1612da%22%2C%22username%22%3A%22admin%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(76, 'admin', '::1', 1410313733, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%222a1612da%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%7D%7D'),
(77, 'admin', '::1', 1410313827, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%222a1612da%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%7D%7D'),
(78, 'admin', '::1', 1410314137, 'index', 'logindo', '登录成功！', '%7B%22initphp_token%22%3A%22499892a1%22%2C%22username%22%3A%22admin%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(79, 'admin', '::1', 1410314146, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22499892a1%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%7D%7D'),
(80, 'admin', '::1', 1410314166, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22499892a1%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%7D%7D'),
(81, 'admin', '::1', 1410314182, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22499892a1%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%7D%7D'),
(82, 'admin', '::1', 1410314262, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22499892a1%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%7D%7D'),
(83, 'admin', '::1', 1410314275, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22499892a1%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%7D%7D'),
(84, 'admin', '::1', 1410314327, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22499892a1%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%7D%7D'),
(85, 'admin', '::1', 1410314332, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22499892a1%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%7D%7D'),
(86, 'admin', '::1', 1410314341, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22499892a1%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%7D%7D'),
(87, 'admin', '::1', 1410314741, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22499892a1%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%7D%7D'),
(88, 'admin', '::1', 1410315081, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22499892a1%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%7D%7D'),
(89, 'admin', '::1', 1410315114, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22499892a1%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%7D%7D'),
(90, 'admin', '::1', 1410315211, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22499892a1%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%7D%7D'),
(91, 'admin', '::1', 1410315345, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22499892a1%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%7D%7D'),
(92, 'admin', '::1', 1410315421, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22499892a1%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%7D%7D'),
(93, 'admin', '::1', 1410315460, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22499892a1%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%7D%7D'),
(94, 'admin', '::1', 1410315534, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22499892a1%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%7D%7D'),
(95, 'admin', '::1', 1410315558, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22499892a1%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%7D%7D'),
(96, 'admin', '::1', 1410315574, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22499892a1%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%7D%7D'),
(97, 'admin', '::1', 1410316381, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22499892a1%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%7D%7D'),
(98, 'admin', '::1', 1410317456, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22499892a1%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%2C%22holder%22%3A%22Dake%22%2C%22tel%22%3A%2213196041405%22%2C%22address%22%3A%22%5Cu524d%5Cu8fdb%5Cu5927%5Cu8857%22%7D%7D'),
(99, 'admin', '::1', 1410317504, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22499892a1%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%2C%22holder%22%3A%22Dake%22%2C%22tel%22%3A%2213196041405%22%2C%22address%22%3A%22%5Cu524d%5Cu8fdb%5Cu5927%5Cu8857%22%7D%7D'),
(100, 'admin', '::1', 1410317526, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22499892a1%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%2C%22holder%22%3A%22Dake%22%2C%22tel%22%3A%2213196041405%22%2C%22address%22%3A%22%5Cu524d%5Cu8fdb%5Cu5927%5Cu8857%22%7D%7D'),
(101, 'admin', '::1', 1410317578, 'group', 'editdo', '用户组编辑成功', '%7B%22init_token%22%3A%22499892a1%22%2C%22groupid%22%3A%221%22%2C%22name%22%3A%22dake%22%2C%22descrip%22%3A%22%5Cu8d85%5Cu7ea7%5Cu7ba1%5Cu7406%5Cu5458%22%2C%22rvalue%22%3A%5B%22system_admin_user_run%22%2C%22system_admin_user_edit%22%2C%22system_admin_user_editdo%22%2C%22system_admin_user_del%22%2C%22system_admin_user_add%22%2C%22system_admin_user_adddo%22%2C%22system_admin_group_run%22%2C%22system_admin_group_edit%22%2C%22system_admin_group_editdo%22%2C%22system_admin_group_del%22%2C%22system_admin_group_add%22%2C%22system_admin_group_adddo%22%2C%22system_admin_adminlog_run%22%2C%22system_admin_adminlog_detail%22%2C%22system_site_site_run%22%2C%22system_site_site_editdo%22%2C%22system_site_access_run%22%2C%22system_site_access_editdo%22%2C%22extend_ad_ad_run%22%2C%22extend_ad_ad_edit%22%2C%22extend_ad_ad_editdo%22%2C%22extend_ad_ad_del%22%2C%22extend_ad_ad_add%22%2C%22extend_ad_ad_adddo%22%2C%22extend_ad_ad_adlist%22%2C%22extend_ad_ad_adadd%22%2C%22extend_ad_ad_adadddo%22%2C%22extend_ad_ad_adedit%22%2C%22extend_ad_ad_adeditdo%22%2C%22extend_ad_ad_addel%22%5D%7D'),
(102, 'admin', '::1', 1410317595, 'user', 'del', '删除成功', '%7B%22uid%22%3A%2242%22%2C%22init_token%22%3A%22499892a1%22%7D'),
(103, 'admin', '::1', 1410317771, 'index', 'logindo', '登录成功！', '%7B%22initphp_token%22%3A%22499892a1%22%2C%22username%22%3A%22admin%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(104, 'admin', '::1', 1410317817, 'group', 'editdo', '用户组编辑成功', '%7B%22init_token%22%3A%22499892a1%22%2C%22groupid%22%3A%221%22%2C%22name%22%3A%22super%22%2C%22descrip%22%3A%22%5Cu8d85%5Cu7ea7%5Cu7ba1%5Cu7406%5Cu5458%22%2C%22rvalue%22%3A%5B%22system_admin_user_run%22%2C%22system_admin_user_edit%22%2C%22system_admin_user_editdo%22%2C%22system_admin_user_del%22%2C%22system_admin_user_add%22%2C%22system_admin_user_adddo%22%2C%22system_admin_group_run%22%2C%22system_admin_group_edit%22%2C%22system_admin_group_editdo%22%2C%22system_admin_group_del%22%2C%22system_admin_group_add%22%2C%22system_admin_group_adddo%22%2C%22system_admin_adminlog_run%22%2C%22system_admin_adminlog_detail%22%2C%22system_site_site_run%22%2C%22system_site_site_editdo%22%2C%22system_site_access_run%22%2C%22system_site_access_editdo%22%2C%22extend_ad_ad_run%22%2C%22extend_ad_ad_edit%22%2C%22extend_ad_ad_editdo%22%2C%22extend_ad_ad_del%22%2C%22extend_ad_ad_add%22%2C%22extend_ad_ad_adddo%22%2C%22extend_ad_ad_adlist%22%2C%22extend_ad_ad_adadd%22%2C%22extend_ad_ad_adadddo%22%2C%22extend_ad_ad_adedit%22%2C%22extend_ad_ad_adeditdo%22%2C%22extend_ad_ad_addel%22%5D%7D'),
(105, 'admin', '::1', 1410317907, 'user', 'adddo', '用户名长度在5-20个字符之间', '%7B%22init_token%22%3A%22499892a1%22%2C%22username%22%3A%22dake%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%2C%22r_password%22%3A%22dakeweb%22%2C%22email%22%3A%22dakeweb%40yeah.net%22%2C%22groupid%22%3A%221%22%7D'),
(106, 'admin', '::1', 1410318001, 'user', 'adddo', '用户创建成功', '%7B%22init_token%22%3A%22499892a1%22%2C%22username%22%3A%22danan%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%2C%22r_password%22%3A%22dakeso%22%2C%22email%22%3A%22dakeweb%40yeah.net%22%2C%22groupid%22%3A%221%22%7D'),
(107, 'admin', '::1', 1410319668, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22499892a1%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%2C%22holder%22%3A%22Dake%22%2C%22tel%22%3A%2213196041405%22%2C%22address%22%3A%22%5Cu524d%5Cu8fdb%5Cu5927%5Cu8857%22%7D%7D'),
(108, 'admin', '::1', 1410319688, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22499892a1%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%2C%22holder%22%3A%22Dake%22%2C%22tel%22%3A%2213196041405%22%2C%22address%22%3A%22%5Cu524d%5Cu8fdb%5Cu5927%5Cu8857%22%7D%7D'),
(109, 'admin', '::1', 1410319808, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22499892a1%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%2C%22holder%22%3A%22Dake%22%2C%22tel%22%3A%2213196041405%22%2C%22address%22%3A%22%5Cu524d%5Cu8fdb%5Cu5927%5Cu8857%22%7D%7D'),
(110, 'admin', '::1', 1410319915, 'index', 'logindo', '登录成功！', '%7B%22initphp_token%22%3A%22e5305dc6%22%2C%22username%22%3A%22admin%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(111, 'admin', '::1', 1410319923, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22e5305dc6%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%2C%22holder%22%3A%22Dake%22%2C%22tel%22%3A%2213196041405%22%2C%22address%22%3A%22%5Cu524d%5Cu8fdb%5Cu5927%5Cu8857%22%7D%7D'),
(112, 'admin', '::1', 1410319961, 'index', 'logindo', '登录成功！', '%7B%22initphp_token%22%3A%22762656c8%22%2C%22username%22%3A%22admin%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(113, 'admin', '::1', 1410319967, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22762656c8%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%2C%22holder%22%3A%22Dake%22%2C%22tel%22%3A%2213196041405%22%2C%22address%22%3A%22%5Cu524d%5Cu8fdb%5Cu5927%5Cu8857%22%7D%7D'),
(114, 'admin', '::1', 1410322793, 'index', 'logindo', '登录成功！', '%7B%22initphp_token%22%3A%22670683ef%22%2C%22username%22%3A%22admin%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(115, 'admin', '::1', 1410322806, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22670683ef%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%2C%22holder%22%3A%22Dake%22%2C%22tel%22%3A%2213196041405%22%2C%22address%22%3A%22%5Cu524d%5Cu8fdb%5Cu5927%5Cu8857%22%7D%7D'),
(116, 'admin', '::1', 1410575331, 'index', 'logindo', '登录成功！', '%7B%22initphp_token%22%3A%223e3a4c7d%22%2C%22username%22%3A%22admin%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(117, 'admin', '::1', 1410746869, 'index', 'logindo', '登录成功！', '%7B%22initphp_token%22%3A%22653745c5%22%2C%22username%22%3A%22admin%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(118, 'admin', '::1', 1410746902, 'site', 'editdo', '更新成功！', '%7B%22init_token%22%3A%22653745c5%22%2C%22site%22%3A%7B%22title%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22url%22%3A%22http%3A%5C%2F%5C%2Fwww.dake.so%22%2C%22keywords%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22description%22%3A%22%5Cu4e92%5Cu8054%5Cu4e16%5Cu754c%5Cuff0c%5Cu5927%5Cu6709%5Cu53ef%5Cu4e3a%22%2C%22beian%22%3A%22%22%2C%22version%22%3A%22%22%2C%22holder%22%3A%22Dake%22%2C%22tel%22%3A%2213196041405%22%2C%22address%22%3A%22%5Cu524d%5Cu8fdb%5Cu5927%5Cu8857%22%7D%7D'),
(119, 'damin', '::1', 1410751034, 'index', 'logindo', '用户不存在', '%7B%22initphp_token%22%3A%22653745c5%22%2C%22username%22%3A%22damin%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(120, 'admin', '::1', 1410751039, 'index', 'logindo', '登录成功！', '%7B%22initphp_token%22%3A%22653745c5%22%2C%22username%22%3A%22admin%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(121, 'admin', '::1', 1410755599, 'index', 'logindo', '登录成功！', '%7B%22initphp_token%22%3A%22653745c5%22%2C%22username%22%3A%22admin%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(122, 'admin', '::1', 1410764705, 'index', 'logindo', '登录成功！', '%7B%22initphp_token%22%3A%22653745c5%22%2C%22username%22%3A%22admin%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(123, 'admin', '::1', 1410764706, 'index', 'logindo', '登录成功！', '%7B%22initphp_token%22%3A%22653745c5%22%2C%22username%22%3A%22admin%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(124, 'admin', '::1', 1410764751, 'index', 'logindo', '登录成功！', '%7B%22initphp_token%22%3A%22653745c5%22%2C%22username%22%3A%22admin%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(125, 'admin', '::1', 1410764752, 'index', 'logindo', '登录成功！', '%7B%22initphp_token%22%3A%22653745c5%22%2C%22username%22%3A%22admin%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(126, 'admin', '::1', 1410764769, 'index', 'logindo', '登录成功！', '%7B%22initphp_token%22%3A%22653745c5%22%2C%22username%22%3A%22admin%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(127, 'admin', '::1', 1410764907, 'single', 'add_do', '单页模块新增成功', '%7B%22init_token%22%3A%22653745c5%22%2C%22name%22%3A%22%5Cu5173%5Cu4e8e%5Cu6211%5Cu4eec%22%2C%22tag%22%3A%22about%22%2C%22descrip%22%3A%22%5Cu591a%5Cu7528%5Cu4e8e%5Cu516c%5Cu53f8%5Cu7b80%5Cu4ecb%5Cu3001%5Cu8363%5Cu8a89%5Cu8d44%5Cu8d28%5Cu3001%5Cu4f01%5Cu4e1a%5Cu6587%5Cu5316%5Cu3001%5Cu8054%5Cu7cfb%5Cu65b9%5Cu5f0f%22%7D'),
(128, 'admin', '::1', 1410767848, 'single', 'del', '单页模块删除成功', '%7B%22id%22%3A%221%22%2C%22init_token%22%3A%22653745c5%22%7D'),
(129, 'admin', '::1', 1410768323, 'single', 'add_do', '单页模块标识必须为英文字母和_！', '%7B%22init_token%22%3A%22653745c5%22%2C%22name%22%3A%22%5Cu624d%5Cu662f%22%2C%22tag%22%3A%22%22%2C%22descrip%22%3A%22%22%7D'),
(130, 'admin', '::1', 1410768436, 'index', 'logindo', '登录成功！', '%7B%22initphp_token%22%3A%22653745c5%22%2C%22username%22%3A%22admin%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(131, 'admin', '::1', 1410768453, 'single', 'add_do', '单页模块新增成功', '%7B%22init_token%22%3A%22653745c5%22%2C%22name%22%3A%22cs%22%2C%22tag%22%3A%22cs%22%2C%22descrip%22%3A%22cs%22%7D'),
(132, 'admin', '::1', 1410768469, 'single', 'del', '单页模块删除成功', '%7B%22id%22%3A%223%22%2C%22init_token%22%3A%22653745c5%22%7D'),
(133, 'admin', '::1', 1410768936, 'single', 'single_add_do', '文件上传失败，请检查文件类型，大小！', '%7B%22init_token%22%3A%22653745c5%22%2C%22name%22%3A%22%5Cu516c%5Cu53f8%5Cu7b80%5Cu4ecb%22%2C%22descrip%22%3A%22%5Cu4f01%5Cu4e1a%5Cu4ecb%5Cu7ecd%22%2C%22modid%22%3A%222%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22link%22%3A%22http%3A%5C%2F%5C%2F%22%2C%22str%22%3A%22%22%2C%22status%22%3A%221%22%2C%22sort%22%3A%220%22%7D'),
(134, 'admin', '::1', 1410769045, 'single', 'single_add_do', '文件上传失败，请检查文件类型，大小！', '%7B%22init_token%22%3A%22653745c5%22%2C%22name%22%3A%22%5Cu516c%5Cu53f8%5Cu7b80%5Cu4ecb%22%2C%22descrip%22%3A%22%5Cu4f01%5Cu4e1a%5Cu4ecb%5Cu7ecd%22%2C%22modid%22%3A%222%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22link%22%3A%22http%3A%5C%2F%5C%2F%22%2C%22str%22%3A%22%22%2C%22status%22%3A%221%22%2C%22sort%22%3A%220%22%7D'),
(135, 'admin', '::1', 1410769090, 'ad', 'adadddo', '文件上传失败，请检查文件类型，大小！', '%7B%22init_token%22%3A%22653745c5%22%2C%22name%22%3A%22%5Cu9996%5Cu9875banner%22%2C%22descrip%22%3A%22%5Cu9996%5Cu9875banner%22%2C%22type%22%3A%220%22%2C%22posid%22%3A%221%22%2C%22start_time%22%3A%22%22%2C%22end_time%22%3A%22%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22link%22%3A%22http%3A%5C%2F%5C%2F%22%2C%22str%22%3A%22%22%2C%22status%22%3A%221%22%2C%22sort%22%3A%220%22%7D'),
(136, 'admin', '::1', 1410769304, 'single', 'edit_do', '单页模块编辑成功', '%7B%22init_token%22%3A%22653745c5%22%2C%22id%22%3A%222%22%2C%22name%22%3A%22%5Cu5173%5Cu4e8e%5Cu6211%5Cu4eec%22%2C%22tag%22%3A%22about%22%2C%22descrip%22%3A%22%5Cu591a%5Cu7528%5Cu4e8e%5Cu516c%5Cu53f8%5Cu7b80%5Cu4ecb%5Cu3001%5Cu8363%5Cu8a89%5Cu8d44%5Cu8d28%5Cu3001%5Cu4f01%5Cu4e1a%5Cu6587%5Cu5316%5Cu3001%5Cu8054%5Cu7cfb%5Cu65b9%5Cu5f0f%5Cu3002%22%7D'),
(137, 'admin', '::1', 1410830365, 'index', 'logindo', '登录成功！', '%7B%22initphp_token%22%3A%22e3ed2739%22%2C%22username%22%3A%22admin%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(138, 'admin', '::1', 1410830367, 'index', 'logindo', '登录成功！', '%7B%22initphp_token%22%3A%22e3ed2739%22%2C%22username%22%3A%22admin%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(139, 'admin', '::1', 1410830400, 'index', 'logindo', '登录成功！', '%7B%22initphp_token%22%3A%22e3ed2739%22%2C%22username%22%3A%22admin%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(140, 'admin', '::1', 1410830494, 'ad', 'adadddo', '广告新增成功', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22name%22%3A%22%5Cu6d4b%5Cu8bd5%22%2C%22descrip%22%3A%22%5Cu6d4b%5Cu8bd5%22%2C%22type%22%3A%221%22%2C%22posid%22%3A%221%22%2C%22start_time%22%3A%222014-09-16+09%3A21%3A00%22%2C%22end_time%22%3A%222014-10-16+09%3A21%3A05%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22link%22%3A%22http%3A%5C%2F%5C%2Fbaidu.com%22%2C%22str%22%3A%22dadss%22%2C%22status%22%3A%221%22%2C%22sort%22%3A%221%22%7D'),
(141, 'admin', '::1', 1410830567, 'single', 'single_add_do', '单页新增成功', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22name%22%3A%22%5Cu516c%5Cu53f8%5Cu7b80%5Cu4ecb%22%2C%22descrip%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22modid%22%3A%222%22%2C%22type%22%3A%221%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22link%22%3A%22http%3A%5C%2F%5C%2Fbaidu.com%22%2C%22str%22%3A%22%5Cu767e%5Cu5ea6%5Cu4e00%5Cu4e0b%22%2C%22status%22%3A%221%22%2C%22sort%22%3A%222%22%7D'),
(142, 'admin', '::1', 1410830612, 'single', 'single_add_do', '文件上传失败，请检查文件类型，大小！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22name%22%3A%22%5Cu4f01%5Cu4e1a%5Cu6587%5Cu5316%22%2C%22descrip%22%3A%22%5Cu8bda%5Cu4fe1%5Cu4e3a%5Cu672c%22%2C%22modid%22%3A%222%22%2C%22type%22%3A%220%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22link%22%3A%22http%3A%5C%2F%5C%2F%22%2C%22str%22%3A%22%22%2C%22status%22%3A%221%22%2C%22sort%22%3A%222%22%7D'),
(143, 'admin', '::1', 1410830668, 'single', 'single_edit_do', '单页编辑成功！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22id%22%3A%221%22%2C%22name%22%3A%22%5Cu516c%5Cu53f8%5Cu7b80%5Cu4ecb%22%2C%22descrip%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22posid%22%3A%222%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22link%22%3A%22http%3A%5C%2F%5C%2Fbaidu.com%22%2C%22str%22%3A%22%22%2C%22status%22%3A%221%22%2C%22sort%22%3A%222%22%7D'),
(144, 'admin', '::1', 1410830690, 'single', 'single_edit_do', '单页编辑成功！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22id%22%3A%221%22%2C%22name%22%3A%22%5Cu516c%5Cu53f8%5Cu7b80%5Cu4ecb%22%2C%22descrip%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22posid%22%3A%222%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22link%22%3A%22http%3A%5C%2F%5C%2Fbaidu.com%22%2C%22str%22%3A%22%5Cu767e%5Cu5ea6%22%2C%22status%22%3A%221%22%2C%22sort%22%3A%222%22%7D'),
(145, 'admin', '::1', 1410830729, 'ad', 'adeditdo', '广告编辑成功！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22id%22%3A%221%22%2C%22name%22%3A%22%5Cu6d4b%5Cu8bd5%22%2C%22descrip%22%3A%22%5Cu6d4b%5Cu8bd5%22%2C%22type%22%3A%221%22%2C%22posid%22%3A%221%22%2C%22start_time%22%3A%222014-09-16+09%3A21%3A00%22%2C%22end_time%22%3A%222014-10-16+09%3A21%3A05%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22link%22%3A%22http%3A%5C%2F%5C%2Fbaidu.com%22%2C%22str%22%3A%22%5Cu767e%5Cu5ea6%22%2C%22status%22%3A%221%22%2C%22sort%22%3A%221%22%7D'),
(146, 'admin', '::1', 1410830749, 'single', 'single_edit_do', '单页编辑成功！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22id%22%3A%221%22%2C%22name%22%3A%22%5Cu516c%5Cu53f8%5Cu7b80%5Cu4ecb%22%2C%22descrip%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22posid%22%3A%222%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22link%22%3A%22http%3A%5C%2F%5C%2Fbaidu.com%22%2C%22str%22%3A%22%22%2C%22status%22%3A%221%22%2C%22sort%22%3A%222%22%7D'),
(147, 'admin', '::1', 1410830773, 'single', 'single_edit_do', '单页编辑成功！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22id%22%3A%221%22%2C%22name%22%3A%22%5Cu516c%5Cu53f8%5Cu7b80%5Cu4ecb%22%2C%22descrip%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22posid%22%3A%222%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22link%22%3A%22http%3A%5C%2F%5C%2Fbaidu.com%22%2C%22str%22%3A%22%5Cu767e%5Cu5ea6%22%2C%22status%22%3A%221%22%2C%22sort%22%3A%222%22%7D'),
(148, 'admin', '::1', 1410834262, 'index', 'logindo', '登录成功！', '%7B%22initphp_token%22%3A%22e3ed2739%22%2C%22username%22%3A%22admin%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(149, 'admin', '::1', 1410834264, 'index', 'logindo', '登录成功！', '%7B%22initphp_token%22%3A%22e3ed2739%22%2C%22username%22%3A%22admin%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(150, 'admin', '::1', 1410834276, 'index', 'logindo', '登录成功！', '%7B%22initphp_token%22%3A%22e3ed2739%22%2C%22username%22%3A%22admin%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(151, 'admin', '::1', 1410834315, 'single', 'add_do', '单页新增成功', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22name%22%3A%22%5Cu516c%5Cu53f8%5Cu7b80%5Cu4ecb%22%2C%22descrip%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22type%22%3A%221%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22link%22%3A%22http%3A%5C%2F%5C%2Fbaidu.com%22%2C%22str%22%3A%22%5Cu767e%5Cu5ea6%22%2C%22status%22%3A%221%22%2C%22sort%22%3A%220%22%7D'),
(152, 'admin', '::1', 1410836800, 'single', 'add_do', '单页新增成功', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22name%22%3A%22%5Cu4f01%5Cu4e1a%5Cu6587%5Cu5316%22%2C%22descrip%22%3A%22%5Cu4e8b%5Cu4ee5%5Cu8bda%5Cu4fe1%22%2C%22type%22%3A%220%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22link%22%3A%22http%3A%5C%2F%5C%2F%22%2C%22str%22%3A%22%22%2C%22status%22%3A%221%22%2C%22sort%22%3A%220%22%7D'),
(153, 'admin', '::1', 1410837189, 'single', 'edit_do', '单页编辑成功！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22id%22%3A%222%22%2C%22name%22%3A%22%5Cu516c%5Cu53f8%5Cu7b80%5Cu4ecb%22%2C%22descrip%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22link%22%3A%22http%3A%5C%2F%5C%2Fwww.dake.so%22%2C%22str%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22status%22%3A%221%22%2C%22sort%22%3A%221%22%7D'),
(154, 'admin', '::1', 1410845624, 'index', 'logindo', '登录成功！', '%7B%22initphp_token%22%3A%22e3ed2739%22%2C%22username%22%3A%22admin%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(155, 'admin', '::1', 1410845649, 'single', 'add_do', '文件上传失败，请检查文件类型，大小！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22name%22%3A%22%5Cu6d4b%5Cu8bd5%22%2C%22descrip%22%3A%22%5Cu6d4b%5Cu8bd5%22%2C%22type%22%3A%220%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22link%22%3A%22http%3A%5C%2F%5C%2F%22%2C%22str%22%3A%22%22%2C%22status%22%3A%221%22%2C%22sort%22%3A%220%22%7D'),
(156, 'admin', '::1', 1410848455, 'single', 'edit_do', '单页编辑成功！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22id%22%3A%222%22%2C%22name%22%3A%22%5Cu516c%5Cu53f8%5Cu7b80%5Cu4ecb%22%2C%22descrip%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22link%22%3A%22%22%2C%22str%22%3A%22%22%2C%22status%22%3A%220%22%2C%22sort%22%3A%221%22%7D'),
(157, 'admin', '::1', 1410848480, 'single', 'edit_do', '单页编辑成功！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22id%22%3A%222%22%2C%22name%22%3A%22%5Cu516c%5Cu53f8%5Cu7b80%5Cu4ecb%22%2C%22descrip%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22link%22%3A%22%22%2C%22str%22%3A%22%22%2C%22status%22%3A%221%22%2C%22sort%22%3A%22100%22%7D'),
(158, 'admin', '::1', 1410848533, 'single', 'edit_do', '单页编辑成功！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22id%22%3A%223%22%2C%22name%22%3A%22%5Cu4f01%5Cu4e1a%5Cu6587%5Cu5316%22%2C%22descrip%22%3A%22%5Cu4e8b%5Cu4ee5%5Cu8bda%5Cu4fe1%22%2C%22img_width%22%3A%22300%22%2C%22img_height%22%3A%22300%22%2C%22link%22%3A%22%22%2C%22str%22%3A%22%22%2C%22status%22%3A%221%22%2C%22sort%22%3A%220%22%7D'),
(159, 'admin', '::1', 1410848549, 'single', 'edit_do', '单页编辑成功！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22id%22%3A%223%22%2C%22name%22%3A%22%5Cu4f01%5Cu4e1a%5Cu6587%5Cu5316%22%2C%22descrip%22%3A%22%5Cu4e8b%5Cu4ee5%5Cu8bda%5Cu4fe1%22%2C%22img_width%22%3A%22300%22%2C%22img_height%22%3A%22300%22%2C%22link%22%3A%22%22%2C%22str%22%3A%22%22%2C%22status%22%3A%220%22%2C%22sort%22%3A%220%22%7D'),
(160, 'admin', '::1', 1410848653, 'single', 'edit_do', '单页编辑成功！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22id%22%3A%223%22%2C%22name%22%3A%22%5Cu4f01%5Cu4e1a%5Cu6587%5Cu5316%22%2C%22descrip%22%3A%22%5Cu4e8b%5Cu4ee5%5Cu8bda%5Cu4fe1%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22link%22%3A%22%22%2C%22str%22%3A%22%22%2C%22status%22%3A%221%22%2C%22sort%22%3A%220%22%7D'),
(161, 'admin', '::1', 1410848689, 'single', 'edit_do', '单页编辑成功！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22id%22%3A%223%22%2C%22name%22%3A%22%5Cu4f01%5Cu4e1a%5Cu6587%5Cu5316%22%2C%22descrip%22%3A%22%5Cu4e8b%5Cu4ee5%5Cu8bda%5Cu4fe1%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22link%22%3A%22%22%2C%22str%22%3A%22%22%2C%22status%22%3A%220%22%2C%22sort%22%3A%220%22%7D'),
(162, 'admin', '::1', 1410850615, 'index', 'logindo', '登录成功！', '%7B%22initphp_token%22%3A%22e3ed2739%22%2C%22username%22%3A%22admin%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(163, 'admin', '::1', 1410854281, 'index', 'logindo', '登录成功！', '%7B%22initphp_token%22%3A%22e3ed2739%22%2C%22username%22%3A%22admin%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D');
INSERT INTO `initapp_admin_log` (`id`, `username`, `ip`, `update_time`, `controller`, `action`, `msg`, `data`) VALUES
(164, 'admin', '::1', 1410854415, 'single', 'add_do', '文件上传失败，请检查文件类型，大小！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22name%22%3A%22Test+editor%22%2C%22descrip%22%3A%22%26lt%3Bp%26gt%3B%5Cn%26nbsp%3B%26nbsp%3B%26nbsp%3B%26nbsp%3B%26lt%3Bspan+style%3D%5C%5C%26quot%3Bcolor%3A%23E53333%3B%5C%5C%26quot%3B%26gt%3BTest+editor%26lt%3B%5C%2Fspan%26gt%3B%5Cn%26lt%3B%5C%2Fp%26gt%3B%5Cn%26lt%3Bp%26gt%3B%5Cn%26nbsp%3B%26nbsp%3B%26nbsp%3B%26nbsp%3B%26lt%3Bspan+style%3D%5C%5C%26quot%3Bcolor%3A%23009900%3B%5C%5C%26quot%3B%26gt%3BTest+editor%26lt%3B%5C%2Fspan%26gt%3B%5Cn%26lt%3B%5C%2Fp%26gt%3B%5Cn%26lt%3Bp%26gt%3B%5Cn%26nbsp%3B%26nbsp%3B%26nbsp%3B%26nbsp%3B%26lt%3Bspan+style%3D%5C%5C%26quot%3Bcolor%3A%23FF9900%3B%5C%5C%26quot%3B%26gt%3BTest+editor%26lt%3B%5C%2Fspan%26gt%3B+%5Cn%26lt%3B%5C%2Fp%26gt%3B%22%2C%22type%22%3A%220%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22link%22%3A%22http%3A%5C%2F%5C%2F%22%2C%22str%22%3A%22%22%2C%22status%22%3A%221%22%2C%22sort%22%3A%220%22%7D'),
(165, 'admin', '::1', 1410854422, 'single', 'add_do', '文件上传失败，请检查文件类型，大小！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22name%22%3A%22Test+editor%22%2C%22descrip%22%3A%22%26lt%3Bp%26gt%3B%5Cn%26nbsp%3B%26nbsp%3B%26nbsp%3B%26nbsp%3B%26lt%3Bspan+style%3D%5C%5C%26quot%3Bcolor%3A%23E53333%3B%5C%5C%26quot%3B%26gt%3BTest+editor%26lt%3B%5C%2Fspan%26gt%3B%5Cn%26lt%3B%5C%2Fp%26gt%3B%5Cn%26lt%3Bp%26gt%3B%5Cn%26nbsp%3B%26nbsp%3B%26nbsp%3B%26nbsp%3B%26lt%3Bspan+style%3D%5C%5C%26quot%3Bcolor%3A%23009900%3B%5C%5C%26quot%3B%26gt%3BTest+editor%26lt%3B%5C%2Fspan%26gt%3B%5Cn%26lt%3B%5C%2Fp%26gt%3B%5Cn%26lt%3Bp%26gt%3B%5Cn%26nbsp%3B%26nbsp%3B%26nbsp%3B%26nbsp%3B%26lt%3Bspan+style%3D%5C%5C%26quot%3Bcolor%3A%23FF9900%3B%5C%5C%26quot%3B%26gt%3BTest+editor%26lt%3B%5C%2Fspan%26gt%3B+%5Cn%26lt%3B%5C%2Fp%26gt%3B%22%2C%22type%22%3A%220%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22link%22%3A%22http%3A%5C%2F%5C%2F%22%2C%22str%22%3A%22%22%2C%22status%22%3A%221%22%2C%22sort%22%3A%220%22%7D'),
(166, 'admin', '::1', 1410854453, 'single', 'add_do', '文件上传失败，请检查文件类型，大小！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22name%22%3A%22Test+editor%22%2C%22descrip%22%3A%22%26lt%3Bp%26gt%3B%5Cn%26nbsp%3B%26nbsp%3B%26nbsp%3B%26nbsp%3B%26lt%3Bspan+style%3D%5C%5C%26quot%3Bcolor%3A%23E53333%3B%5C%5C%26quot%3B%26gt%3BTest+editor%26lt%3B%5C%2Fspan%26gt%3B%5Cn%26lt%3B%5C%2Fp%26gt%3B%5Cn%26lt%3Bp%26gt%3B%5Cn%26nbsp%3B%26nbsp%3B%26nbsp%3B%26nbsp%3B%26lt%3Bspan+style%3D%5C%5C%26quot%3Bcolor%3A%23009900%3B%5C%5C%26quot%3B%26gt%3BTest+editor%26lt%3B%5C%2Fspan%26gt%3B%5Cn%26lt%3B%5C%2Fp%26gt%3B%5Cn%26lt%3Bp%26gt%3B%5Cn%26nbsp%3B%26nbsp%3B%26nbsp%3B%26nbsp%3B%26lt%3Bspan+style%3D%5C%5C%26quot%3Bcolor%3A%23FF9900%3B%5C%5C%26quot%3B%26gt%3BTest+editor%26lt%3B%5C%2Fspan%26gt%3B+%5Cn%26lt%3B%5C%2Fp%26gt%3B%22%2C%22type%22%3A%220%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22link%22%3A%22http%3A%5C%2F%5C%2F%22%2C%22str%22%3A%22%22%2C%22status%22%3A%221%22%2C%22sort%22%3A%220%22%7D'),
(167, 'admin', '::1', 1410854458, 'single', 'add_do', '文件上传失败，请检查文件类型，大小！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22name%22%3A%22Test+editor%22%2C%22descrip%22%3A%22%26lt%3Bp%26gt%3B%5Cn%26nbsp%3B%26nbsp%3B%26nbsp%3B%26nbsp%3B%26lt%3Bspan+style%3D%5C%5C%26quot%3Bcolor%3A%23E53333%3B%5C%5C%26quot%3B%26gt%3BTest+editor%26lt%3B%5C%2Fspan%26gt%3B%5Cn%26lt%3B%5C%2Fp%26gt%3B%5Cn%26lt%3Bp%26gt%3B%5Cn%26nbsp%3B%26nbsp%3B%26nbsp%3B%26nbsp%3B%26lt%3Bspan+style%3D%5C%5C%26quot%3Bcolor%3A%23009900%3B%5C%5C%26quot%3B%26gt%3BTest+editor%26lt%3B%5C%2Fspan%26gt%3B%5Cn%26lt%3B%5C%2Fp%26gt%3B%5Cn%26lt%3Bp%26gt%3B%5Cn%26nbsp%3B%26nbsp%3B%26nbsp%3B%26nbsp%3B%26lt%3Bspan+style%3D%5C%5C%26quot%3Bcolor%3A%23FF9900%3B%5C%5C%26quot%3B%26gt%3BTest+editor%26lt%3B%5C%2Fspan%26gt%3B+%5Cn%26lt%3B%5C%2Fp%26gt%3B%22%2C%22type%22%3A%220%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22link%22%3A%22http%3A%5C%2F%5C%2F%22%2C%22str%22%3A%22%22%2C%22status%22%3A%221%22%2C%22sort%22%3A%220%22%7D'),
(168, 'admin', '::1', 1410854606, 'single', 'edit_do', '单页编辑成功！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22id%22%3A%223%22%2C%22name%22%3A%22%5Cu4f01%5Cu4e1a%5Cu6587%5Cu5316%22%2C%22descrip%22%3A%22%5Cu4e8b%5Cu4ee5%5Cu8bda%5Cu4fe1%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22link%22%3A%22%22%2C%22str%22%3A%22%22%2C%22status%22%3A%220%22%2C%22sort%22%3A%220%22%7D'),
(169, 'admin', '::1', 1410854622, 'single', 'edit_do', '单页编辑成功！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22id%22%3A%223%22%2C%22name%22%3A%22%5Cu4f01%5Cu4e1a%5Cu6587%5Cu5316%22%2C%22descrip%22%3A%22%5Cu4e8b%5Cu4ee5%5Cu8bda%5Cu4fe1%5Cuff01%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22link%22%3A%22%22%2C%22str%22%3A%22%22%2C%22status%22%3A%220%22%2C%22sort%22%3A%220%22%7D'),
(170, 'admin', '::1', 1410854703, 'single', 'edit_do', '单页编辑成功！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22id%22%3A%223%22%2C%22name%22%3A%22%5Cu4f01%5Cu4e1a%5Cu6587%5Cu5316%22%2C%22descrip%22%3A%22%26lt%3Bp%26gt%3B%5Cn%26nbsp%3B%26nbsp%3B%26nbsp%3B%26nbsp%3B%5Cu4e8b%5Cu4ee5%5Cu8bda%5Cu4fe1%5Cn%26lt%3B%5C%2Fp%26gt%3B%5Cn%26lt%3Bp%26gt%3B%5Cn%26nbsp%3B%26nbsp%3B%26nbsp%3B%26nbsp%3B%5Cu4e8b%5Cu65e0%5Cu4e0d%5Cu6210%5Cn%26lt%3B%5C%2Fp%26gt%3B%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22link%22%3A%22%22%2C%22str%22%3A%22%22%2C%22status%22%3A%220%22%2C%22sort%22%3A%220%22%7D'),
(171, 'admin', '::1', 1410856947, 'single', 'edit_do', '单页编辑成功！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22id%22%3A%222%22%2C%22name%22%3A%22%5Cu516c%5Cu53f8%5Cu7b80%5Cu4ecb%22%2C%22descrip%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22str%22%3A%22%26lt%3Bp%26gt%3B%5Cn%26nbsp%3B%26nbsp%3B%26nbsp%3B%26nbsp%3B%26lt%3Bspan+style%3D%5C%5C%26quot%3Bcolor%3A%23009900%3B%5C%5C%26quot%3B%26gt%3B%5Cu4e92%5Cu8054%5Cu4e16%5Cu754c%26lt%3B%5C%2Fspan%26gt%3B+%5Cn%26lt%3B%5C%2Fp%26gt%3B%5Cn%26lt%3Bp%26gt%3B%5Cn%26nbsp%3B%26nbsp%3B%26nbsp%3B%26nbsp%3B%26lt%3Bspan+style%3D%5C%5C%26quot%3Bcolor%3A%23009900%3B%5C%5C%26quot%3B%26gt%3B%5Cu5927%5Cu6709%5Cu53ef%5Cu4e3a%26lt%3B%5C%2Fspan%26gt%3B+%5Cn%26lt%3B%5C%2Fp%26gt%3B%22%2C%22status%22%3A%221%22%2C%22sort%22%3A%22100%22%7D'),
(172, 'admin', '::1', 1410856953, 'single', 'edit_do', '单页编辑成功！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22id%22%3A%222%22%2C%22name%22%3A%22%5Cu516c%5Cu53f8%5Cu7b80%5Cu4ecb%22%2C%22descrip%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22str%22%3A%22%26lt%3Bp%26gt%3B%5Cn%26nbsp%3B%26nbsp%3B%26nbsp%3B%26nbsp%3B%26lt%3Bspan+style%3D%5C%5C%26quot%3Bcolor%3A%23009900%3B%5C%5C%26quot%3B%26gt%3B%5Cu4e92%5Cu8054%5Cu4e16%5Cu754c%26lt%3B%5C%2Fspan%26gt%3B+%5Cn%26lt%3B%5C%2Fp%26gt%3B%5Cn%26lt%3Bp%26gt%3B%5Cn%26nbsp%3B%26nbsp%3B%26nbsp%3B%26nbsp%3B%26lt%3Bspan+style%3D%5C%5C%26quot%3Bcolor%3A%23009900%3B%5C%5C%26quot%3B%26gt%3B%5Cu5927%5Cu6709%5Cu53ef%5Cu4e3a%26lt%3B%5C%2Fspan%26gt%3B+%5Cn%26lt%3B%5C%2Fp%26gt%3B%22%2C%22status%22%3A%221%22%2C%22sort%22%3A%22100%22%7D'),
(173, 'admin', '::1', 1410856966, 'single', 'edit_do', '单页编辑成功！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22id%22%3A%222%22%2C%22name%22%3A%22%5Cu516c%5Cu53f8%5Cu7b80%5Cu4ecb%22%2C%22descrip%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22str%22%3A%22%26lt%3Bp%26gt%3B%5Cn%26nbsp%3B%26nbsp%3B%26nbsp%3B%26nbsp%3B%26lt%3Bspan+style%3D%5C%5C%26quot%3Bcolor%3A%23009900%3B%5C%5C%26quot%3B%26gt%3B%5Cu4e92%5Cu8054%5Cu4e16%5Cu754c%26lt%3B%5C%2Fspan%26gt%3B+%5Cn%26lt%3B%5C%2Fp%26gt%3B%5Cn%26lt%3Bp%26gt%3B%5Cn%26nbsp%3B%26nbsp%3B%26nbsp%3B%26nbsp%3B%26lt%3Bspan+style%3D%5C%5C%26quot%3Bcolor%3A%23009900%3B%5C%5C%26quot%3B%26gt%3B%5Cu5927%5Cu6709%5Cu53ef%5Cu4e3a%26lt%3B%5C%2Fspan%26gt%3B+%5Cn%26lt%3B%5C%2Fp%26gt%3B%22%2C%22status%22%3A%221%22%2C%22sort%22%3A%22100%22%7D'),
(174, 'admin', '::1', 1410857003, 'single', 'edit_do', '单页编辑成功！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22id%22%3A%223%22%2C%22name%22%3A%22%5Cu4f01%5Cu4e1a%5Cu6587%5Cu5316%22%2C%22descrip%22%3A%22%5Cu4e8b%5Cu4ee5%5Cu8bda%5Cu4fe1%5Cn%5Cu4e8b%5Cu65e0%5Cu4e0d%5Cu6210%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22str%22%3A%22%22%2C%22status%22%3A%220%22%2C%22sort%22%3A%220%22%7D'),
(175, 'admin', '::1', 1410857022, 'single', 'edit_do', '单页编辑成功！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22id%22%3A%222%22%2C%22name%22%3A%22%5Cu516c%5Cu53f8%5Cu7b80%5Cu4ecb%22%2C%22descrip%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22str%22%3A%22%26lt%3Bp%26gt%3B%5Cn%26nbsp%3B%26nbsp%3B%26nbsp%3B%26nbsp%3B%26lt%3Bspan+style%3D%5C%5C%26quot%3Bcolor%3A%23009900%3B%5C%5C%26quot%3B%26gt%3B%5Cu4e92%5Cu8054%5Cu4e16%5Cu754c%26lt%3B%5C%2Fspan%26gt%3B+%5Cn%26lt%3B%5C%2Fp%26gt%3B%5Cn%26lt%3Bp%26gt%3B%5Cn%26nbsp%3B%26nbsp%3B%26nbsp%3B%26nbsp%3B%26lt%3Bspan+style%3D%5C%5C%26quot%3Bcolor%3A%23009900%3B%5C%5C%26quot%3B%26gt%3B%5Cu5927%5Cu6709%5Cu53ef%5Cu4e3a%26lt%3B%5C%2Fspan%26gt%3B+%5Cn%26lt%3B%5C%2Fp%26gt%3B%22%2C%22status%22%3A%221%22%2C%22sort%22%3A%22100%22%7D'),
(176, 'admin', '::1', 1410857420, 'single', 'edit_do', '单页编辑成功！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22id%22%3A%222%22%2C%22name%22%3A%22%5Cu516c%5Cu53f8%5Cu7b80%5Cu4ecb%22%2C%22descrip%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22str%22%3A%22%26lt%3Bp%26gt%3B%5Cn%26nbsp%3B%26nbsp%3B%26nbsp%3B%26nbsp%3B%26lt%3Bspan+style%3D%5C%5C%26quot%3Bcolor%3A%23009900%3B%5C%5C%26quot%3B%26gt%3B%5Cu4e92%5Cu8054%5Cu4e16%5Cu754c%26lt%3B%5C%2Fspan%26gt%3B%5Cn%26lt%3B%5C%2Fp%26gt%3B%5Cn%26lt%3Bp%26gt%3B%5Cn%26nbsp%3B%26nbsp%3B%26nbsp%3B%26nbsp%3B%26lt%3Bspan+style%3D%5C%5C%26quot%3Bcolor%3A%23009900%3B%5C%5C%26quot%3B%26gt%3B%5Cu5927%5Cu6709%5Cu53ef%5Cu4e3a%26lt%3B%5C%2Fspan%26gt%3B%5Cn%26lt%3B%5C%2Fp%26gt%3B%22%2C%22status%22%3A%221%22%2C%22sort%22%3A%221%22%7D'),
(177, 'admin', '::1', 1410857571, 'single', 'edit_do', '单页编辑成功！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22id%22%3A%222%22%2C%22name%22%3A%22%5Cu516c%5Cu53f8%5Cu7b80%5Cu4ecb%22%2C%22descrip%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22str%22%3A%22%26lt%3Bp%26gt%3B%5Cn%26nbsp%3B%26nbsp%3B%26nbsp%3B%26nbsp%3B%26lt%3Bspan+style%3D%5C%5C%26quot%3Bcolor%3A%23009900%3B%5C%5C%26quot%3B%26gt%3B%5Cu4e92%5Cu8054%5Cu4e16%5Cu754c%26lt%3B%5C%2Fspan%26gt%3B+%5Cn%26lt%3B%5C%2Fp%26gt%3B%5Cn%26lt%3Bp%26gt%3B%5Cn%26nbsp%3B%26nbsp%3B%26nbsp%3B%26nbsp%3B%26lt%3Bspan+style%3D%5C%5C%26quot%3Bcolor%3A%23009900%3B%5C%5C%26quot%3B%26gt%3B%5Cu5927%5Cu6709%5Cu53ef%5Cu4e3a%26lt%3B%5C%2Fspan%26gt%3B+%5Cn%26lt%3B%5C%2Fp%26gt%3B%22%2C%22status%22%3A%221%22%2C%22sort%22%3A%221%22%7D'),
(178, 'admin', '::1', 1410857649, 'single', 'add_do', '单页新增成功', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22name%22%3A%22%5Cu67f1%5Cu5b50%5Cu54e5%22%2C%22descrip%22%3A%22%5Cu67f1%5Cu54e5%5Cu4f60%5Cu5565%5Cu65f6%5Cu5019%5Cu4e0a%5Cu7ebf%22%2C%22type%22%3A%221%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22str%22%3A%22%26lt%3Bp%26gt%3B%5Cn%26nbsp%3B%26nbsp%3B%26nbsp%3B%26nbsp%3B%26lt%3Bspan+style%3D%5C%5C%26quot%3Bcolor%3A%23009900%3B%5C%5C%26quot%3B%26gt%3B%5Cu4e92%5Cu8054%5Cu4e16%5Cu754c%26lt%3B%5C%2Fspan%26gt%3B+%5Cn%26lt%3B%5C%2Fp%26gt%3B%5Cn%26lt%3Bp%26gt%3B%5Cn%26nbsp%3B%26nbsp%3B%26nbsp%3B%26nbsp%3B%26lt%3Bspan+style%3D%5C%5C%26quot%3Bcolor%3A%23009900%3B%5C%5C%26quot%3B%26gt%3B%5Cu5927%5Cu6709%5Cu53ef%5Cu4e3a%26lt%3B%5C%2Fspan%26gt%3B+%5Cn%26lt%3B%5C%2Fp%26gt%3B%22%2C%22status%22%3A%221%22%2C%22sort%22%3A%220%22%7D'),
(179, 'admin', '::1', 1410858110, 'index', 'logindo', '登录成功！', '%7B%22initphp_token%22%3A%22e3ed2739%22%2C%22username%22%3A%22admin%22%2C%22password%22%3A%22%2A%2A%2A%2A%2A%2A%22%7D'),
(180, 'admin', '::1', 1410858132, 'single', 'edit_do', '单页编辑成功！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22id%22%3A%224%22%2C%22name%22%3A%22%5Cu67f1%5Cu5b50%5Cu54e5%22%2C%22descrip%22%3A%22%5Cu67f1%5Cu54e5%5Cu4f60%5Cu5565%5Cu65f6%5Cu5019%5Cu4e0a%5Cu7ebf%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22str%22%3A%22%26lt%3Bp%26gt%3B%5Cn%26nbsp%3B%26nbsp%3B%26nbsp%3B%26nbsp%3Basda%5Cn%26lt%3B%5C%2Fp%26gt%3B%5Cn%26lt%3Bp%26gt%3B%5Cn%26nbsp%3B%26nbsp%3B%26nbsp%3B%26nbsp%3Basdasd%5Cn%26lt%3B%5C%2Fp%26gt%3B%22%2C%22status%22%3A%221%22%2C%22sort%22%3A%220%22%7D'),
(181, 'admin', '::1', 1410858194, 'single', 'edit_do', '单页编辑成功！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22id%22%3A%224%22%2C%22name%22%3A%22%5Cu67f1%5Cu5b50%5Cu54e5%22%2C%22descrip%22%3A%22%5Cu67f1%5Cu54e5%5Cu4f60%5Cu5565%5Cu65f6%5Cu5019%5Cu4e0a%5Cu7ebf%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22str%22%3A%22%26lt%3Bp%26gt%3B%5Cn%26nbsp%3B%26nbsp%3B%26nbsp%3B%26nbsp%3Baaaa%5Cn%26lt%3B%5C%2Fp%26gt%3B%5Cn%26lt%3Bp%26gt%3B%5Cn%26nbsp%3B%26nbsp%3B%26nbsp%3B%26nbsp%3Baaaa%5Cn%26lt%3B%5C%2Fp%26gt%3B%22%2C%22status%22%3A%221%22%2C%22sort%22%3A%220%22%7D'),
(182, 'admin', '::1', 1410858228, 'single', 'edit_do', '单页编辑成功！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22id%22%3A%224%22%2C%22name%22%3A%22%5Cu67f1%5Cu5b50%5Cu54e5%22%2C%22descrip%22%3A%22%5Cu67f1%5Cu54e5%5Cu4f60%5Cu5565%5Cu65f6%5Cu5019%5Cu4e0a%5Cu7ebf%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22str%22%3A%22%26lt%3Bp%26gt%3B%5Cn%26nbsp%3B%26nbsp%3B%26nbsp%3B%26nbsp%3Baa%5Cn%26lt%3B%5C%2Fp%26gt%3B%5Cn%26lt%3Bp%26gt%3B%5Cn%26nbsp%3B%26nbsp%3B%26nbsp%3B%26nbsp%3Bbb%5Cn%26lt%3B%5C%2Fp%26gt%3B%22%2C%22status%22%3A%221%22%2C%22sort%22%3A%220%22%7D'),
(183, 'admin', '::1', 1410858496, 'single', 'add_do', '单页名称不得为空！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22name%22%3A%22%22%2C%22descrip%22%3A%22%22%2C%22type%22%3A%220%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22str%22%3A%22%22%2C%22status%22%3A%221%22%2C%22sort%22%3A%220%22%7D'),
(184, 'admin', '::1', 1410858631, 'single', 'del', '单页删除成功', '%7B%22id%22%3A%224%22%2C%22init_token%22%3A%22e3ed2739%22%7D'),
(185, 'admin', '::1', 1410858651, 'single', 'edit_do', '单页编辑成功！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22id%22%3A%222%22%2C%22name%22%3A%22%5Cu516c%5Cu53f8%5Cu7b80%5Cu4ecb%22%2C%22descrip%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22str%22%3A%22asdasd%22%2C%22status%22%3A%221%22%2C%22sort%22%3A%221%22%7D'),
(186, 'admin', '::1', 1410859050, 'single', 'edit_do', '单页编辑成功！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22id%22%3A%223%22%2C%22name%22%3A%22%5Cu4f01%5Cu4e1a%5Cu6587%5Cu5316%22%2C%22descrip%22%3A%22%5Cu4e8b%5Cu4ee5%5Cu8bda%5Cu4fe1%5Cn%5Cu4e8b%5Cu65e0%5Cu4e0d%5Cu6210%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22str%22%3A%22%22%2C%22status%22%3A%220%22%2C%22sort%22%3A%220%22%7D'),
(187, 'admin', '::1', 1410859105, 'single', 'edit_do', '单页编辑成功！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22id%22%3A%223%22%2C%22name%22%3A%22%5Cu4f01%5Cu4e1a%5Cu6587%5Cu5316%22%2C%22descrip%22%3A%22%5Cu4e8b%5Cu4ee5%5Cu8bda%5Cu4fe1%5Cn%5Cu4e8b%5Cu65e0%5Cu4e0d%5Cu6210%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22str%22%3A%22%22%2C%22status%22%3A%220%22%2C%22sort%22%3A%220%22%7D'),
(188, 'admin', '::1', 1410859317, 'single', 'edit_do', '单页编辑成功！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22id%22%3A%223%22%2C%22name%22%3A%22%5Cu4f01%5Cu4e1a%5Cu6587%5Cu5316%22%2C%22descrip%22%3A%22%5Cu4e8b%5Cu4ee5%5Cu8bda%5Cu4fe1%5Cn%5Cu4e8b%5Cu65e0%5Cu4e0d%5Cu6210%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22str%22%3A%22%22%2C%22status%22%3A%220%22%2C%22sort%22%3A%220%22%7D'),
(189, 'admin', '::1', 1410859429, 'single', 'edit_do', '单页编辑成功！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22id%22%3A%223%22%2C%22name%22%3A%22%5Cu4f01%5Cu4e1a%5Cu6587%5Cu5316%22%2C%22descrip%22%3A%22%5Cu4e8b%5Cu4ee5%5Cu8bda%5Cu4fe1%5Cn%5Cu4e8b%5Cu65e0%5Cu4e0d%5Cu6210%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22str%22%3A%22%22%2C%22status%22%3A%220%22%2C%22sort%22%3A%220%22%7D'),
(190, 'admin', '::1', 1410859584, 'single', 'edit_do', '单页编辑成功！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22id%22%3A%223%22%2C%22name%22%3A%22%5Cu4f01%5Cu4e1a%5Cu6587%5Cu5316%22%2C%22descrip%22%3A%22%5Cu4e8b%5Cu4ee5%5Cu8bda%5Cu4fe1%5Cn%5Cu4e8b%5Cu65e0%5Cu4e0d%5Cu6210%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22str%22%3A%22%22%2C%22status%22%3A%220%22%2C%22sort%22%3A%220%22%7D'),
(191, 'admin', '::1', 1410859627, 'single', 'edit_do', '单页编辑成功！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22id%22%3A%222%22%2C%22name%22%3A%22%5Cu516c%5Cu53f8%5Cu7b80%5Cu4ecb%22%2C%22descrip%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22str%22%3A%22%26lt%3Bp%26gt%3B%5Cn%26nbsp%3B%26nbsp%3B%26nbsp%3B%26nbsp%3Baaa%5Cn%26lt%3B%5C%2Fp%26gt%3B%5Cn%26lt%3Bp%26gt%3B%5Cn%26nbsp%3B%26nbsp%3B%26nbsp%3B%26nbsp%3Bbbb%5Cn%26lt%3B%5C%2Fp%26gt%3B%22%2C%22status%22%3A%221%22%2C%22sort%22%3A%221%22%7D'),
(192, 'admin', '::1', 1410860103, 'single', 'edit_do', '单页编辑成功！', '%7B%22init_token%22%3A%22e3ed2739%22%2C%22id%22%3A%222%22%2C%22name%22%3A%22%5Cu516c%5Cu53f8%5Cu7b80%5Cu4ecb%22%2C%22descrip%22%3A%22%5Cu5927%5Cu53ef%5Cu4e07%5Cu7ef4%22%2C%22img_width%22%3A%22100%22%2C%22img_height%22%3A%22100%22%2C%22str%22%3A%22%5Cu67f1%5Cu54e5%5Cu4f60%5Cu8bd5%5Cu4e00%5Cu8bd5%5Cuff0c%5Cu8fd9%5Cu5757%5Cu4e0a%5Cu4f20%5Cu6709%5Cu95ee%5Cu9898%22%2C%22status%22%3A%221%22%2C%22sort%22%3A%221%22%7D');

-- --------------------------------------------------------

--
-- 表的结构 `initapp_admin_user`
--

CREATE TABLE IF NOT EXISTS `initapp_admin_user` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `initapp_admin_user`
--

INSERT INTO `initapp_admin_user` (`uid`, `username`, `password`, `hash`, `email`, `create_time`, `create_ip`, `update_time`, `last_time`, `groupid`) VALUES
(1, 'admin', 'c4a15f693b7412f454a129c73b7d8767', 'sg899c', '420332292@qq.om', 1328677231, '', 1410858110, 1410858110, 1);

-- --------------------------------------------------------

--
-- 表的结构 `initapp_admin_user_login`
--

CREATE TABLE IF NOT EXISTS `initapp_admin_user_login` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(25) NOT NULL DEFAULT '',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0',
  `data` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_ip_update_time` (`ip`,`update_time`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `initapp_admin_user_login`
--

INSERT INTO `initapp_admin_user_login` (`id`, `ip`, `update_time`, `data`) VALUES
(1, '::1', 1410245231, ''),
(2, '::1', 1410245238, ''),
(3, '::1', 1410245267, 'admin'),
(4, '::1', 1410245273, 'admin'),
(5, '::1', 1410245293, 'asdasd'),
(6, '::1', 1410248951, ''),
(7, '::1', 1410249019, ''),
(8, '::1', 1410249027, ''),
(9, '::1', 1410249094, ''),
(10, '::1', 1410249112, ''),
(11, '::1', 1410253543, ''),
(12, '::1', 1410253560, ''),
(13, '::1', 1410751034, 'damin');

-- --------------------------------------------------------

--
-- 表的结构 `initapp_ad_content`
--

CREATE TABLE IF NOT EXISTS `initapp_ad_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `posid` int(10) unsigned NOT NULL DEFAULT '0',
  `type` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `name` varchar(60) NOT NULL DEFAULT '',
  `descrip` varchar(255) NOT NULL DEFAULT '',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `start_time` int(10) unsigned NOT NULL DEFAULT '0',
  `end_time` int(10) unsigned NOT NULL DEFAULT '0',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `initapp_ad_content`
--

INSERT INTO `initapp_ad_content` (`id`, `posid`, `type`, `name`, `descrip`, `create_time`, `content`, `status`, `start_time`, `end_time`, `sort`) VALUES
(1, 1, 1, '测试', '测试', 1410830494, '{"str":"%E7%99%BE%E5%BA%A6","link":"http%3A%2F%2Fbaidu.com"}', 1, 1410859260, 1413451265, 1);

-- --------------------------------------------------------

--
-- 表的结构 `initapp_ad_position`
--

CREATE TABLE IF NOT EXISTS `initapp_ad_position` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tag` varchar(20) NOT NULL DEFAULT '',
  `name` varchar(60) NOT NULL DEFAULT '',
  `descrip` varchar(255) NOT NULL DEFAULT '',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `idx_tag` (`tag`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `initapp_ad_position`
--

INSERT INTO `initapp_ad_position` (`id`, `tag`, `name`, `descrip`, `create_time`) VALUES
(1, 'aasd', 'asd', 'asd', 1410254886);

-- --------------------------------------------------------

--
-- 表的结构 `initapp_single`
--

CREATE TABLE IF NOT EXISTS `initapp_single` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) unsigned NOT NULL DEFAULT '0',
  `name` varchar(60) NOT NULL DEFAULT '',
  `descrip` varchar(255) NOT NULL DEFAULT '',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0',
  `content` text NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `start_time` int(10) unsigned NOT NULL DEFAULT '0',
  `end_time` int(10) unsigned NOT NULL DEFAULT '0',
  `sort` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `initapp_single`
--

INSERT INTO `initapp_single` (`id`, `type`, `name`, `descrip`, `create_time`, `content`, `status`, `start_time`, `end_time`, `sort`) VALUES
(2, 1, '公司简介', '大可万维', 1410834315, '{"str":"柱哥你试一试，这块上传有问题"}', 1, 0, 0, 1),
(3, 0, '企业文化', '事以诚信\r\n事无不成', 1410836800, '{"img":"data%2Fattachment%2Fsingle%2F2014%2F09%2F16%2F20140916030640182641.jpg"}', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `initapp_site_config`
--

CREATE TABLE IF NOT EXISTS `initapp_site_config` (
  `k` varchar(20) NOT NULL DEFAULT '',
  `v` text NOT NULL,
  PRIMARY KEY (`k`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `initapp_site_config`
--

INSERT INTO `initapp_site_config` (`k`, `v`) VALUES
('site_basic_config', '{"title":"%E5%A4%A7%E5%8F%AF%E4%B8%87%E7%BB%B4","url":"http%3A%2F%2Fwww.dake.so","keywords":"%E5%A4%A7%E5%8F%AF%E4%B8%87%E7%BB%B4","description":"%E4%BA%92%E8%81%94%E4%B8%96%E7%95%8C%EF%BC%8C%E5%A4%A7%E6%9C%89%E5%8F%AF%E4%B8%BA","beian":"","version":"","holder":"Dake","tel":"13196041405","address":"%E5%89%8D%E8%BF%9B%E5%A4%A7%E8%A1%97"}');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
