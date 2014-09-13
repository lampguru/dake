<?php
/**
 * 网站访问控制
 * @author zhuli
 */
class accessController extends BaseAdminController {
	
	public $initphp_list = array('editdo'); //Action白名单
	
	private $key = 'site_access'; //配置表 键名称
	
	/**
	 * 访问控制基本配置
	 */
	public function run() {
		$siteInfo = $this->_getConfService()->getConfig($this->key);
		$this->view->assign('siteInfo', $siteInfo);
		$this->view->set_tpl('site/access_run');
	}
	
	/**
	 * 访问控制配置更新
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
		$this->view->assign('siteRun', $this->getUrl('access', 'run'));
		$this->view->assign('siteEditdo', $this->getUrl('access', 'editdo'));
	}
	
	/**
	 * @return ConfService
	 */
	private function _getConfService() {
		return InitPHP::getService('Conf', 'conf');
	}

}