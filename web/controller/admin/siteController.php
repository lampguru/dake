<?php
/**
 * 站点基本设置
 * @author administrator
 */
class siteController extends BaseAdminController {
	
	public $initphp_list = array('editdo'); //Action白名单 
	
	private $key = 'site_basic_config'; //配置表 键名称
	
	/**
	 * 网站基本配置
	 */
	public function run() {
		$siteInfo = $this->_getConfService()->getConfig($this->key);
		$this->view->assign('siteInfo', $siteInfo);
		$this->view->set_tpl('site/site_run');
	}
	
	/**
	 * 网站基本配置更新
	 */
	public function editdo() {
		$siteInfo = $this->controller->get_gp('site');
		$result = $this->_getConfService()->updateConfig($this->key, $siteInfo);
		if (!$result) $this->ajax_return(0, '更新失败！');
		$this->ajax_return(1, '更新成功！');
	}
	
	/**
	 * 前置操作
	 */
	public function before() {
		parent::before();
		$this->view->assign('siteRun', $this->getUrl('site', 'run'));
		$this->view->assign('siteEditdo', $this->getUrl('site', 'editdo'));
	}
	
	/**
	 * @return ConfService
	 */
	private function _getConfService() {
		return InitPHP::getService('Conf', 'conf');
	}

}