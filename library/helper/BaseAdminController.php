<?php
class BaseAdminController extends Controller { 
	
	protected $perpage = 12; //默认后台分页
	
	/**
	 * 前置执行Action
	 */
	public function before() {  
		/* 用户后台权限验证 */
		$c = $this->controller->get_gp('c');
		$a = $this->controller->get_gp('a');
		if ($c == '' && $a == '') {
			$c = 'index';
			$a = 'run';
		}
		if (!($c == 'index' && in_array($a, array('login', 'logindo', 'loginout')))) {
			$userService = $this->_getAdminUserService();
			$userInfo = $userService->checkLogin();
			if (!$userInfo) 
				$this->controller->redirect($this->getUrl('index', 'login'), 0);
			$this->register_global('userInfo', $userInfo);
			$this->view->assign('userInfo', $userInfo);
			$groupInfo = $userService->getGroup($userInfo['groupid']);
			/* token */
			if ($this->controller->is_post()) {
				$isToken = $this->controller->check_token();
				if (!$isToken)  $this->controller->ajax_return(0, '非法Token！');
			}
			/* 后台菜单列表 */
			$navConfig = require(APP_PATH . '/conf/admin.nav.conf.php');
			if ($c == 'group' && in_array($a, array('add', 'edit')))
				$this->view->assign('navConfigList', $navConfig); 	
			/* 权限控制 创始人超级权限 */
			if ($userInfo['uid'] != 1) {
				$rvalue = explode(',', $groupInfo['rvalue']);
				$navConfig = $userService->getGroupRvalue($navConfig, $rvalue);
				if (!($c == 'index' && in_array($a, array('def', 'run')))) {
					$isRvalue = false;
					foreach ($rvalue as $value) {
						$str = explode("_", $value);
						if ($c == $str[2] && $a == $str[3])
							$isRvalue = true;	
					}
					if (!$isRvalue) {
						if ($this->controller->is_post()) {
							$this->controller->ajax_return(0, '您没有权限访问该模块！');
						} else {
							$this->error('您没有权限访问该模块！');
						}
				    }
				}
			}
			$this->view->assign('navConfig', $navConfig); 
		}
	}
	
	/**
	 * 前置执行Action
	 */
	public function after() {
		$c = $this->controller->get_gp('c');
		$a = $this->controller->get_gp('a');
		if (!($c == 'index' && $a == 'run') && !($c == 'index' && $a == 'login')) {
			$this->view->set_tpl('common/header', 'F');
			$this->view->set_tpl('common/footer', 'L');
		}
		$this->view->display();
	}
	
	/**
	 * 后台公用URL组装函数
	 * @param string $c
	 * @param string $a
	 */
	public function getUrl($c, $a) {
		$config = InitPHP::getConfig();
		return InitPHP::url($c.'|'.$a);
		//return InitPHP::url($config['url'] . ADMIN_FILE . '?c='.$c.'&a=' . $a);
	}
	
	/**
	 * 分页类
	 * @param int $count
	 */
	public function page($count, $str = '') {
		$pager= $this->getLibrary('pager'); //分页加载
		$c   = $this->controller->get_gp('c');
		$a   = $this->controller->get_gp('a');
		$url = $this->getUrl($c, $a) . $str;
		$page_html = $pager->pager($count, $this->perpage, $url);
		if ($count == 0) $page_html = '';
		$this->view->assign('page', $page_html);
	}
	
	/**
	 * 后台模板页面错误提示
	 * @param string $msg 错误信息
	 */
	public function error($msg) {
		$error= $this->getUtil('error'); 
		$error->send_error($msg, 'html');
	}
	
	/**
	 * 后台AJAX操作统一返回值函数
	 * @param string $status 状态
	 * @param string $msg    错误信息
	 */
	public function ajax_return($status, $msg) {
		$data = array(
			'username' => $this->userInfo['username'],
			'ip' => $this->controller->get_ip(),
			'controller' => $this->controller->get_gp('c'),
			'action' => $this->controller->get_gp('a'),
			'msg' => $msg,
			'data' => $this->controller->filter_escape($_POST)
		);
		if (isset($data['data']['password'])) 
			$data['data']['password'] = '******';
		if ($data['username'] == '')
			$data['username'] = $data['data']['username'];
		$this->_getAdminLogService()->addLog($data);
		return $this->controller->ajax_return($status, $msg);
	}
	
	/**
	 * 后台图片上传公用类
	 * @param string $fileName 表单名称 例如：img
	 * @param string 上传文件的路劲 例如：data/attachment/ad
	 */
	public function upload($fileName, $path) {
		$upload = $this->getLibrary('upload'); //文件上传类加载
		$allow  = array('maxSize'=>2048,'allowFileType'=>array('gif', 'jpg', 'png', 'jpeg'));
		$path   = rtrim($path, '/') . '/' . date("Y") . '/' . date("m") . '/' . date("d");
		$function = $this->getLibrary('function');
        $newFileName = $function->trade_no(); 
        $uploadResult = $upload->upload($fileName, $newFileName, $path, $allow);
		return $uploadResult;
	}
	
	/**
	 * 后台图片压缩 对InitPHP框架图片类进行封装
	 * @param string $source 原图片地址
	 * @param array  $param  参数
	 * 如果多张压缩图，这个数组为多维：
	 * array(
	 * 	 0=>array('_small', 50, 50)  
	 * )
	 * _small：最后图片名称 原名称：2011213902103.jpg,压缩图：2011213902103_small.jpg
	 * 如果第一个参数 _small 设置为空，则会覆盖原图
	 * 50, 50分别为：宽和高
	 */
	public function imageThumb($source, $param = array(0=>array('_small', 50, 50))) {
		$image   = $this->getLibrary('image'); //图片类加载
		$newName = str_replace(strstr($source, '.'), '', $source);
		foreach ($param as $val) {
       		$image->make_thumb($source, $newName . $val[0], $val[1], $val[2], true); //缩略图
		}
		return true;
	}
	
	/**
     * 日期处理
     */
	public function _getDateTime($dates) {
		if ($dates == '') return 0;
		$dtime[0] = substr($dates, 0, 10);
		$dtime[1] = substr($dates, -8, 8);
		$date     = explode('-', $dtime[0]);
		$time     = explode(':', $dtime[1]);
		return mktime($time[0], $time[1], $time[2], $date[1], $date[2], $date[0]);	
	}
	
	/**
	 * @return AdminUserService
	 */
	protected function _getAdminUserService() {
		return InitPHP::getService('AdminUser', 'admin');
	}
	
	/**
	 * @return AdminLogService
	 */
	protected function _getAdminLogService() {
		return InitPHP::getService('AdminLog', 'admin');
	}
}