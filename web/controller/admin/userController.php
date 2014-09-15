<?php
/**
 * 后台管理-后台用户管理
 * @author zhuli
 */
class userController extends BaseAdminController {
	
	public $initphp_list = array('add', 'adddo', 'del', 'edit', 'editdo'); //Action白名单
	
	/**
	 * 后台用户列表
	 */
	public function run() {
		$page = intval($this->controller->get_gp('page'));
		$AdminUserService = $this->_getAdminUserService();
		list($userList, $userCount) = $AdminUserService->getUserList($page, $this->perpage);
		$this->page($userCount); //分页
		/* 用户组 */
		$groupListTemp = $this->_getAdminUserService()->getGroupList();
		$groupList = array();
		foreach ($groupListTemp as $val) {
			$groupList[$val['groupid']] = $val;
		}
		/* 输出模板 */
		$this->view->assign('groupList', $groupList);
		$this->view->assign('page', $page_html);
		$this->view->assign('userList', $userList);
		$this->view->assign('userCount', $userCount);
		$this->view->set_tpl('user/user_run');	
	}
	
	/**
	 * 新增用户-显示
	 */
	public function add() {
		/* 获取用户组列表 */
		$groupList = $this->_getAdminUserService()->getGroupList();
		/* 输出模板 */
		$this->view->assign('groupList', $groupList);
		$this->view->set_tpl('user/user_add');
	}
	
	/**
	 * 新增用户-操作
	 */
	public function adddo() {
		$userInfo = $this->controller->get_gp(array('username', 'password', 'r_password', 'email', 'groupid'));
		/* 数据表单验证 */
		if (!$this->controller->is_length($userInfo['username'], 5, 20))
			$this->ajax_return(0, '用户名长度在5-20个字符之间');
		if ($userInfo['password'] !== $userInfo['r_password'])
			$this->ajax_return(0, '两次密码输入不一致');
		if (!$this->controller->is_length($userInfo['password'], 6, 20))
			$this->ajax_return(0, '用户密码在6-20个字符之间');
		if (!$this->controller->is_length($userInfo['email'], 1, 60))
			$this->ajax_return(0, '用户Email不得为空');
		if (!$this->controller->is_email($userInfo['email']))
			$this->ajax_return(0, 'Email格式不正确');
		/* 获取IP */
		$userInfo['create_ip'] = $this->controller->get_ip();
		/* 用户创建 */
		$result = $this->_getAdminUserService()->addUser($userInfo);
		/* 创建后校正 */
		if ($result[0] == false) $this->ajax_return(0, $result[1]);
		$this->ajax_return(1, '用户创建成功');
	}
	
	/**
	 * 编辑用户-显示
	 */
	public function edit() {
		$uid = intval($this->controller->get_gp('uid'));
		$userInfo = $this->_getAdminUserService()->getUser($uid);
		/* 用户组列表 */
		$groupList = $this->_getAdminUserService()->getGroupList();
		/* 输出模板 */
		$this->view->assign('groupList', $groupList);
		$this->view->assign('userInfo', $userInfo);
		$this->view->set_tpl('user/user_edit');
	}
	
	/**
	 * 编辑用户-操作
	 */
	public function editdo() {
		$userInfo = $this->controller->get_gp(array('uid', 'password', 'r_password', 'email', 'groupid'));
		/* 数据验证 */
		if ($userInfo['password'] != '' || $userInfo['r_password'] != '') {
			if ($userInfo['password'] !== $userInfo['r_password'])
				$this->ajax_return(0, '两次密码输入不一致');
			if (!$this->controller->is_length($userInfo['password'], 6, 20))
				$this->ajax_return(0, '用户密码在6-20个字符之间');
		} else {
			unset($userInfo['password']);
		}
		if (!$this->controller->is_length($userInfo['email'], 1, 60))
			$this->ajax_return(0, '用户Email不得为空');
		if (!$this->controller->is_email($userInfo['email']))
			$this->ajax_return(0, 'Email格式不正确');
		/* 编辑 */
		$result = $this->_getAdminUserService()->editUser($userInfo['uid'], $userInfo);
		/* 校正 */
		if (!$result) $this->ajax_return(0, '用户编辑失败');
		$this->ajax_return(1, '用户编辑成功');
	}
	
	/**
	 * 删除用户
	 */
	public function del() {
		$uid = (int) $this->controller->get_gp('uid');
		if ($uid < 1) $this->ajax_return(0, '非法参数！');
		if ($uid == 1) $this->ajax_return(0, '无法删除创始人！');
		$result = $this->_getAdminUserService()->deleteUser($uid);
		if ($result) $this->ajax_return(1, '删除成功');
		$this->ajax_return(0, '删除失败！');
	}
	
	/**
	 * 前置操作
	 */
	public function before() {
		parent::before();
		$this->view->assign('userRun', $this->getUrl('user', 'run'));
		$this->view->assign('userAdd', $this->getUrl('user', 'add'));
		$this->view->assign('userAdddo', $this->getUrl('user', 'adddo'));
		$this->view->assign('userEdit', $this->getUrl('user', 'edit'));
		$this->view->assign('userEditdo', $this->getUrl('user', 'editdo'));
		$this->view->assign('userDel', $this->getUrl('user', 'del'));
	}
	
}