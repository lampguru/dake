<?php
/**
 * 后台管理-后台用户权限
 * @author zhuli
 */
class groupController extends BaseAdminController {
	
	public $initphp_list = array('add', 'adddo', 'edit', 'editdo', 'del'); //Action白名单
	
	/**
	 * 用户组列表
	 */
	public function run() {
		/* 获取列表 */
		$groupList = $this->_getAdminUserService()->getGroupList();
		/* 输出 */
		$this->view->assign('groupList', $groupList);
		$this->view->set_tpl('user/group_run');
	}
	
	/**
	 * 添加用户组-显示
	 */
	public function add() {
		$this->view->set_tpl('user/group_add');
	}
	
	/**
	 * 添加用户组-操作
	 */
	public function adddo() {
		/* 数据获取和过滤 */
		$groupInfo = $this->controller->get_gp(array('name', 'descrip', 'rvalue'));
		/* 数据过滤 */
		$groupInfo = $this->_checkGroupInfo($groupInfo);
		/* 用户组创建 */
		$result = $this->_getAdminUserService()->addGroup($groupInfo);
		/* 创建后校正 */
		if ($result[0] == false) $this->ajax_return(0, $result[1]);
		$this->ajax_return(1, '用户组创建成功');
	}
	
	/**
	 * 编辑用户-显示
	 */
	public function edit() {
		$groupid = $this->controller->get_gp('groupid');
		$groupInfo = $this->_getAdminUserService()->getGroup($groupid);
		$groupInfo['rvalue'] = explode(',', $groupInfo['rvalue']);
		$this->view->assign('groupInfo', $groupInfo);
		$this->view->set_tpl('user/group_edit');
	}
	
	/**
	 * 编辑用户-操作
	 */
	public function editdo() {
		/* 数据获取和过滤 */
		$groupInfo = $this->controller->get_gp(array('name', 'descrip', 'rvalue', 'groupid'));
		/* 数据过滤 */
		$groupInfo = $this->_checkGroupInfo($groupInfo);
		/* 编辑操作 */
		$result = $this->_getAdminUserService()->editGroup($groupInfo['groupid'], $groupInfo);
		/* 校正 */
		if ($result[0] == false) $this->ajax_return(0, $result[1]);
		$this->ajax_return(1, '用户组编辑成功');
	}
	
	/**
	 * 删除用户组
	 */
	public function del() {
		$groupid = intval($this->controller->get_gp('groupid'));
		if ($groupid < 1) $this->ajax_return(0, '非法参数！');
		$groupInfo = $this->_getAdminUserService()->getGroup($groupid);
		if ($groupInfo['if_default'] == 1) $this->ajax_return(0, '无法删除默认用户组！');
		$result = $this->_getAdminUserService()->deleteGroup($groupid);
		if ($result) $this->ajax_return(1, '删除成功');
		$this->ajax_return(0, '删除失败！');
	}
	
	/**
	 * 前置操作
	 */
	public function before() {
		parent::before();
		$this->view->assign('groupRun', $this->getUrl('group', 'run'));
		$this->view->assign('groupAdd', $this->getUrl('group', 'add'));
		$this->view->assign('groupAdddo', $this->getUrl('group', 'adddo'));
		$this->view->assign('groupEdit', $this->getUrl('group', 'edit'));
		$this->view->assign('groupEditdo', $this->getUrl('group', 'editdo'));
		$this->view->assign('groupDel', $this->getUrl('group', 'del'));
	}
	
	/**
	 * 检测用户组数据
	 * @param array $groupInfo
	 */
	private function _checkGroupInfo($groupInfo) {
		$groupInfo['rvalue'] = implode(',', $groupInfo['rvalue']);
		if (!$this->controller->is_length($groupInfo['name'], 1, 20))
			$this->ajax_return(0, '用户组名长度1-20个字符之间');
		if (!$this->controller->is_length($groupInfo['descrip'], 0, 100))
			$this->ajax_return(0, '用户组描述小于100字符');
		return $groupInfo;
	}
}