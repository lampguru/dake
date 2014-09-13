<?php
/**
 * 管理后台用户Service
 * @author zhuli
 */
class AdminUserService extends BaseService {
	
	/**
	 * 新增后台管理用户接口
	 * 参数结构：
	 * array(
	 * 	'username' => 用户名
	 *  'password' => 用户密码
	 *  'email'    => 邮箱
	 *  'create_ip'=> 创建者IP地址
	 *  'groupid'  => 用户组
	 * )
	 * @param array $data 参数
	 * @return int
	 */
	public function addUser($data) {
		if (!is_array($data))
			return $this->service->return_msg(false, '参数不正确!');
		$data = $this->_cookUserData($data);
		if (!isset($data['username']) || !isset($data['password'])) 
			return $this->service->return_msg(false, '用户名和密码为必填项！');
		$userInfo = $this->_getAdminUserDao()->getByUsername($data['username']);
		if ($userInfo) 
			return $this->service->return_msg(false, '用户名已存在!');
		$data['create_time'] = $data['update_time'] = $data['last_time'] = InitPHP::getTime();
		$data['hash']        = $this->_hash();
		$data['password']    = $this->_password($data['password'], $data['hash']);
		$result = $this->_getAdminUserDao()->add($data);
		if (!$result) return $this->service->return_msg(false, '创建用户失败!');
		return $this->service->return_msg(true, '创建用户成功!', $result);
	}
	
	/**
	 * 编辑后台管理用户接口
	 * 参数结构：
	 * uid = 10
	 * array(
	 * 	'username' => 用户名
	 *  'password' => 用户密码
	 *  'email'    => 邮箱
	 *  'create_ip'=> 创建者IP地址
	 *  'groupid'  => 用户组
	 * )
	 * @param int   $uid  用户UID
	 * @param array $data 参数
	 * @return bool
	 */
	public function editUser($uid, $data) {
		$uid = intval($uid);
		if ($uid < 1) return false;
		$data = $this->_cookUserData($data);
		unset($data['username']); //用户名不允许编辑
		if (isset($data['password'])) {
			$data['hash']        = $this->_hash();
			$data['password']    = $this->_password($data['password'], $data['hash']);
		}
		if (empty($data)) return false;
		return $this->_getAdminUserDao()->edit($uid, $data);
	}
	
	/**
	 * 通过UID获取用户信息接口
	 * 参数：
	 * uid = 1
	 * @param int $uid 用户UID
	 * @return Array
	 */
	public function getUser($uid) {
		$uid = intval($uid);
		if ($uid < 1) return array();
		$userInfo = $this->_getAdminUserDao()->get($uid);
		if (!$userInfo) return array();
		$userGroupInfo = $this->_getAdminGroupDao()->get($userInfo['groupid']);
		$userInfo['groupInfo'] = $userGroupInfo;
		return $userInfo;
	}
	
	/**
	 * 检测用户是否已经登录
	 * @param string $username 用户名
	 * @param string $password 密码
	 * @return ArrayIterator
	 */
	public function checkUser($username, $password) {
		if (!$username || !$password) 
			return $this->service->return_msg(false, '用户名或者密码为空！');
		$userInfo = $this->_getAdminUserDao()->getByUsername($username);
		if (!$userInfo) return $this->service->return_msg(false, '用户不存在');
		$newPasswrd = $this->_password($password, $userInfo['hash']);
		if ($newPasswrd !== $userInfo['password'])
			return $this->service->return_msg(false, '密码不正确');
		/* 更新updateTime */
		$updateTime = InitPHP::getTime();
		$this->editUser($userInfo['uid'], array(
			'update_time' => $updateTime,
			'last_time'   => $updateTime
		));
		/* cookie */
		$str = '';
		$str .= $updateTime . '\t';
		$str .= $userInfo['uid'] . '\t';
		$str .= $userInfo['username'] . '\t';
		$str .= $userInfo['password'] . '\t';
		$function = $this->getLibrary('function');
		$str = $function->str_code($str, ADMIN_KEY, 'ENCODE');
		$cookie = $this->getUtil('cookie');
		$cookie->set('initapp_userinfo', $str, (InitPHP::getTime() + 3600), '/'); 
		return $this->service->return_msg(true, '用户验证通过');
	}
	
	/**
	 * 检测用户是否是登录状态
	 */
	public function checkLogin() {
		$cookie   = $this->getUtil('cookie');
		$userInfo = $cookie->get('initapp_userinfo');
		if (!$userInfo) return false;
		$function = $this->getLibrary('function');
		$userInfo = $function->str_code($userInfo, ADMIN_KEY, 'DECODE');
		$userInfo = explode('\t', $userInfo);
		$userData = $this->getUser($userInfo[1]);
		if (!$userData) return false;
		if (($userData['username'] !== $userInfo[2]) || ($userData['password'] !== $userInfo[3]))
			return false;
		if ($userData['last_time'] !== $userInfo[0])
			return false;
		return $userData;
	}
	
	/**
	 * 注销登录
	 */
	public function loginOut() {
		$cookie   = $this->getUtil('cookie');
		$cookie->del('initapp_userinfo');
		return true;
	}
	
	/**
	 * 获取用户分页列表
	 * @param int $page   当前页
	 * @param int $perpage每页显示数
	 * @return ArrayIterator
	 */
	public function getUserList($page, $perpage) {
		$page    = intval($page);
		$perpage = intval($perpage);
		return $this->_getAdminUserDao()->getList($page, $perpage);
	}

	/**
	 * 删除一个后台用户
	 * @param int $uid 用户UID
	 * @return bool
	 */
	public function deleteUser($uid) {
		return $this->_getAdminUserDao()->delete(intval($uid));
	}
	
	/**
	 * 新增后台用户组接口
	 * 参数：
	 * array(
	 *  'name'       => 用户组名词
	 *  'descrip'    => 描述
	 *  'if_default' => 是否默认
	 *  'rvalue'     => 权限
	 * )
	 * @param array $data
	 * @return ArrayIterator
	 */
	public function addGroup($data) {
		if (!is_array($data))
			return $this->service->return_msg(false, '参数不正确!');
		$data = $this->_cookGroupData($data);
		if (!$data['name']) 
			return $this->service->return_msg(false, '用户组名称不得为空!');
		$data['create_time'] = InitPHP::getTime();
		$result = $this->_getAdminGroupDao()->add($data);
		if (!$result) 
			return $this->service->return_msg(false, '创建用户组失败!');
		return $this->service->return_msg(true, '创建用户组成功', $result);
	}
	
	/**
	 * 编辑用户组
	 * @param int $groupid
	 * @param array $data
	 */
	public function editGroup($groupid, $data) {
		if (!is_array($data))
			return $this->service->return_msg(false, '参数不正确!');
		$data = $this->_cookGroupData($data);
		if (!$data['name']) 
			return $this->service->return_msg(false, '用户组名称不得为空!');
		$result = $this->_getAdminGroupDao()->edit($groupid, $data);
		if (!$result) 
			return $this->service->return_msg(false, '编辑用户组失败!');
		return $this->service->return_msg(true, '编辑用户组成功', $result);
	}
	
	/**
	 * 获取用户组接口
	 * @param int $groupid 用户组ID
	 * @return ArrayIterator
	 */
	public function getGroup($groupid) {
		$groupid = intval($groupid);
		if ($groupid < 1) return array();
		return $this->_getAdminGroupDao()->get($groupid);
	}
	
	/**
	 * 获取用户组列表接口
	 * @return ArrayIterator
	 */
	public function getGroupList() {
		return $this->_getAdminGroupDao()->getList();
	}
	
	/**
	 * 删除用户组
	 * @param int $groupid
	 * @return bool
	 */
	public function deleteGroup($groupid) {
		return $this->_getAdminGroupDao()->delete(intval($groupid));
	}
	
	/**
	 * 用户权限控制
	 * @param array $navConfig
	 * @param array $rvalue
	 */
	public function getGroupRvalue($navConfig, $rvalue) {
		$sidebar = $navConfig['sidebar'];
		$nav     = $navConfig['nav'];
		foreach($sidebar as $key => $value) {
			foreach ($value as $k => $v) {
				foreach ($v['option'] as $kk => $vv) {
					$str = $key . '_' . $k . '_' . $vv[1] . '_' . $vv[2];
					if (!in_array($str, $rvalue)) {
						unset($sidebar[$key][$k]['option'][$kk]);
					}
				}
				if (empty($sidebar[$key][$k]['option'])) {
					unset($sidebar[$key][$k]);
				}
			}
			if (empty($sidebar[$key])) {
				unset($nav[$key]);
			}
		}
		return array('nav' => $nav , 'sidebar' => $sidebar);
	}
	
	/**
	 * 后台登录错误信息记录
	 * @param string $ip
	 * @param string $username
	 */
	public function addLoginError($ip, $username) {
		return $this->_getAdminUserLoginDao()->add(
			array(
				'ip' => $ip,
				'update_time' => InitPHP::getTime(),
				'data' => $username
			)
		);
	}
	
	/**
	 * 后台防止暴力破解
	 * @param string $ip
	 */
	public function checkLoginErrorNum($ip) {
		$time     = 60 * 60; // 一个小时
		$allowNum = 5; //每小时5次 
		$num  = $this->_getAdminUserLoginDao()->getCount($ip, $time);
		if ($num < $allowNum) return true;
		return false;
	}
	
	/**
	 * 后台密码加密函数
	 * @param string $password
	 * @return string
	 */
	private function _password($password, $hash) {
		return md5(md5($password) . $hash);
	}
	
	/**
	 * 后台密码加密hash
	 * @return string
	 */
	private function _hash() {
		$function = $this->getLibrary('function'); //共用类
		return $function->get_hash(6);
	}
	
	/**
	 * 过滤传递进来的参数
	 * @param array $data
	 * @return ArrayIterator
	 */
	private function _cookUserData($data) {
		$field = array(
			array('username', ''),
			array('password', ''),
			array('email' ,''),
			array('create_ip', ''),
			array('update_time', 'int'),
			array('last_time', 'int'),
			array('groupid' ,'int')
		);
		return $this->service->parse_data($field, $data);
	}
	
	/**
	 * 过滤用户组数据结构
	 * @param array $data
	 * @return ArrayIterator
	 */
	private function _cookGroupData($data) {
		$field = array(
			array('name', ''),
			array('descrip', ''),
			array('if_default' ,'int'),
			array('rvalue', '')
		);
		return $this->service->parse_data($field, $data);
	}
	
	/**
	 * 后台管理员用户组DAO
	 * @return AdminUserDao
	 */
	private function _getAdminUserDao() {
		return InitPHP::getDao('AdminUser', 'admin');
	}
	
	/**
	 * @return AdminUserLoginDao
	 */
	private function _getAdminUserLoginDao() {
		return InitPHP::getDao('AdminUserLogin', 'admin');
	}
	
	/**
	 * 后台管理员用户组DAO
	 * @return AdminGroupDao
	 */
	private function _getAdminGroupDao() {
		return InitPHP::getDao('AdminGroup', 'admin');
	}
	
	
}