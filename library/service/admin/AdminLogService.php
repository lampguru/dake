<?php 
/**
 * 后台日志服务
 */
class AdminLogService extends BaseService {
		
	/**
	 * 新增日志
	 * 参数结构
	 * array(
	 * 'username' => 用户名称
	 * 'ip'=> 来源IP地址
	 * 'controller' => c
	 * 'action' => a
	 * 'msg' => msg信息
	 * 'data' => 参数
	 * )
	 * @param array $data
	 */
	public function addLog($data) {
		$data = $this->_cookLogData($data);
		$data['update_time'] = InitPHP::getTime();
		return $this->_getAdminLogDao()->add($data);
	}
	
	/**
	 * 获取日志
	 * @param int $id
	 */
	public function getLog($id) {
		$logInfo = $this->_getAdminLogDao()->get($id);
		$logInfo['data'] = json_decode(urldecode($logInfo['data']), true);
		return $logInfo;
	}
	
	/**
	 * 后台管理日志
	 * @param int $page
	 * @param int $perpage
	 * @param array $search
	 */
	public function getLogList($page, $perpage, $search) {
		$page    = intval($page);
		$perpage = intval($perpage);
		$count   = $this->_getAdminLogDao()->getCount($search);
		$result  = $this->_getAdminLogDao()->getList($page, $perpage, $search);
		return array($result, $count);
	}
	
	/**
	 * 过滤传递进来的参数
	 * @param array $data
	 * @return ArrayIterator
	 */
	private function _cookLogData($data) {
		$data['data'] = urlencode(json_encode($data['data']));
		$field = array(
			array('username', ''),
			array('ip', ''),
			array('controller' ,''),
			array('action' ,''),
			array('msg' ,''),
			array('data' ,'')
		);
		return $this->service->parse_data($field, $data);
	}
	

	/**
	 * 日志DAO
	 * @return AdminLogDao
	 */
	private function _getAdminLogDao() {
		return InitPHP::getDao('AdminLog', 'admin');
	}
	
	
}