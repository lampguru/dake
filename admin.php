<?php
define("APP_PATH", dirname(__FILE__)); 
header("Content-Type:text/html; charset=utf-8");   
require_once('initphp/initphp.php'); //导入配置文件-必须载入
require_once('conf/comm.conf.php'); //公用配置
require_once('conf/admin.conf.php'); //公用配置
InitPHP::import('library/helper/BaseDao.php');
InitPHP::import('library/helper/BaseService.php');
InitPHP::import('library/helper/BaseAdminController.php');
InitPHP::init(); //框架初始化
