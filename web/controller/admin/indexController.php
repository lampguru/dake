<?php
/**
 * 
 * Enter description here ...
 * @author administrator
 *
 */
class indexController extends BaseAdminController { 

	public $initphp_list = array('def', 'login', 'logindo', 'loginout');  //Action白名单
	
	/** 
	 * 后台界面
	 */
	public function run() { 
		$this->view->set_tpl('index/index_run');	
	}
	
	/**
	 * 后台用户登录
	 */
	public function login() {	
		$this->view->set_tpl('index/index_login');
	}
	
	/**
	 * 登录状态
	 */
	public function logindo() {
		$info = $this->controller->get_gp(array('username', 'password'));
		$ip = $this->controller->get_ip();
		if ($this->_getAdminUserService()->checkLoginErrorNum($ip)) {
			$result = $this->_getAdminUserService()->checkUser($info['username'], $info['password']);
			if ($result[0] == false) {
				$this->_getAdminUserService()->addLoginError($ip, $info['username']);
				$this->ajax_return(0, $result[1]);
			}
		} else {
			$this->ajax_return(0, '错误次数过多，1小时候再登');
		}
		$this->ajax_return(1, '登录成功！');
	}
	
	/**
	 * 注销登录
	 */
	public function loginout() {
		$this->_getAdminUserService()->loginOut();
		$this->controller->redirect($this->getUrl('index', 'login'), 0);
	}
	
	/**
	 * 后台默认页面
	 */
	public function def() {
		$phpInfo = array();
		$phpInfo['version']     = PHP_VERSION;
		$phpInfo['system']      = PHP_OS;
		$phpInfo['max_time']    = ini_get("max_execution_time")." 秒";
		$phpInfo['max_upload']  = ini_get("file_uploads") ? ini_get("upload_max_filesize") : "Disabled";
		if(function_exists("gd_info")){
			$gd = gd_info();
			$phpInfo['gd'] = $gd["GD Version"];
		}else{
			$phpInfo['gd'] = "<span style='color:red'>Unknow</span>";
		}
		$phpInfo['now_time'] = date("Y-m-d H:i:s");
		$phpInfo['memory']   =  get_cfg_var("memory_limit") ? get_cfg_var("memory_limit") : "无";
		$phpInfo['server']   =  $_SERVER ['SERVER_SOFTWARE']; 
		$phpInfo['zend']     =  zend_version(); 
		$this->view->assign('phpInfo', $phpInfo);
		$this->view->set_tpl('index/index_default');
	}
	
	/**
	 * 前置操作
	 */
	public function before() {
		parent::before();
		$this->view->assign('indexLogindo', $this->getUrl('index', 'logindo'));
		$this->view->assign('indexRun', $this->getUrl('index', 'run'));
		$this->view->assign('indexDefault', $this->getUrl('index', 'def'));
		$this->view->assign('indexLoginout', $this->getUrl('index', 'loginout'));
	}
	
	/**
	 * @return SiteConfigService
	 */
	private function _getSiteConfigService() {
		return InitPHP::getService('SiteConfig', 'site');
	}
	
}