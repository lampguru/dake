<?php
/**
 * 后台管理-后台日志
 * @author zhuli
 */
class adminlogController extends BaseAdminController { 
	
	public $initphp_list = array('detail'); //Action白名单
	
	/**
	 * 后台管理日志列表
	 */
	public function run() {  
	    /* 搜索参数 */
		$search = $this->controller->get_gp(array('username', 'time_start', 'time_end'));
		$search['update_time_start'] = $this->_getDateTime($search['time_start']);
		$search['update_time_end'] = $this->_getDateTime($search['time_end']);
        /* 分页列表 */
		$page = intval($this->controller->get_gp('page'));
		$logService = $this->_getAdminLogService();
		list($logList, $logCount) = $logService->getLogList($page, $this->perpage, $search);
		$str = '&time_start=' . $search['time_start'] . '&time_end=' . $search['time_end'] . '&username=' . $search['username'];
		$this->page($logCount, $str); //分页
		$this->view->assign('search', $search);
		$this->view->assign('logList', $logList);
		$this->view->assign('logCount', $logCount);
		$this->view->set_tpl('user/adminlog_run');
	}
	
	/**
	 * 详细参数
	 */
	public function detail() {  
		$id = $this->controller->get_gp('id');
		$logInfo = $this->_getAdminLogService()->getLog($id);
		$this->view->assign('logInfo', $logInfo);
		$this->view->set_tpl('user/adminlog_detail');
	}

	/**
	 * 前置操作
	 */
	public function before() {
		parent::before();
		$this->view->assign('adminlogRun', $this->getUrl('adminlog', 'run'));
		$this->view->assign('adminlogDetail', $this->getUrl('adminlog', 'detail'));
	}
	
	/**
	 * @return AdminLogService
	 */
	protected function _getAdminLogService() {
		return InitPHP::getService('AdminLog', 'admin');
	}

}