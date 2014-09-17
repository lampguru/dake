<?php
/**
 * 后台管理-扩展管理-单页管理
 * @author dake
 */
class singleController extends BaseAdminController {
	public $initphp_list = array (
			'run',
			'add',
			'add_do',
			'del',
			'edit',
			'edit_do' 
	); // Action白名单
	
	/**
	 * 单页列表显示
	 */
	public function run() {
		$page = intval ( $this->controller->get_gp ( 'page' ) );
		/* 列表 */
		$service = $this->_getService ();
		list ( $singleList, $singleCount ) = $service->getList ( $page, $this->perpage );
		$this->page ( $singleCount ); // 分页
		/* 输出 */
		$this->view->assign ( 'singleList', $singleList );
		$this->view->assign ( 'singleCount', $singleCount );
		$this->view->set_tpl ( 'single/run' );
	}
	
	/**
	 * 新增单页显示
	 */
	public function add() {
		$this->view->set_tpl ( 'single/add' );
	}
	
	/**
	 * 新增单页操作
	 */
	public function add_do() {
		$singleInfo = $this->controller->get_gp ( array (
				'name',
				'type',
				'descrip',
				'content',
				'status',
				'img_width',
				'img_height',
				'sort' 
		) );
		$singleInfo = $this->_checkData ( $singleInfo );
		/* 新增单页 */
		$result = $this->_getService ()->add ( $singleInfo );
		if ($result [0] == false)
			$this->ajax_return ( 0, $result [1] );
		$this->ajax_return ( 1, '单页新增成功' );
	}
	
	/**
	 * 编辑单页显示
	 */
	public function edit() {
		$id = $this->controller->get_gp ( 'id' );
		$singleInfo = $this->_getService ()->get ( $id );
		$this->view->assign ( 'singleInfo', $singleInfo );
		$this->view->set_tpl ( 'single/edit' );
	}
	
	/**
	 * 编辑单页操作
	 */
	public function edit_do() {
		$singleInfo = $this->controller->get_gp ( array (
				'id',
				'name',
				'type',
				'descrip',
				'str',
				'status',
				'img_width',
				'img_height',
				'sort' 
		) );
		$singleInfo = $this->_checkData ( $singleInfo );
		/* 编辑单页 */
		$result = $this->_getService ()->edit ( $singleInfo ['id'], $singleInfo );
		if ($result == false)
			$this->ajax_return ( 0, '单页编辑失败！' );
		$this->ajax_return ( 1, '单页编辑成功！' );
	}
	
	/**
	 * 删除单页操作
	 */
	public function del() {
		$id = $this->controller->get_gp ( 'id' );
		$result = $this->_getService ()->del ( $id );
		if (! $result)
			$this->ajax_return ( 0, '单页删除失败' );
		$this->ajax_return ( 1, '单页删除成功' );
	}
	
	/**
	 * 前置操作
	 */
	public function before() {
		parent::before ();
		$this->view->assign ( 'singleRun', $this->getUrl ( 'single', 'run' ) );
		$this->view->assign ( 'singleAdd', $this->getUrl ( 'single', 'add' ) );
		$this->view->assign ( 'singleAddDo', $this->getUrl ( 'single', 'add_do' ) );
		$this->view->assign ( 'singleEdit', $this->getUrl ( 'single', 'edit' ) );
		$this->view->assign ( 'singleEditDo', $this->getUrl ( 'single', 'edit_do' ) );
		$this->view->assign ( 'singleDel', $this->getUrl ( 'single', 'del' ) );
	}
	
	/**
	 * 单页共用部分
	 *
	 * @param array $singleInfo        	
	 */
	private function _checkData($singleInfo) {
		/* 单页名称 */
		if (! $this->controller->is_length ( $singleInfo ['name'], 1, 20 ))
			$this->ajax_return ( 0, '单页名称不得为空！' );
			/* 图片上传 */
		if ($singleInfo ['type'] == 0) {
			if (! ($_FILES ['img'] ['name'] == '' && $singleInfo ['id'])) {
				$uploadResult = $this->upload ( 'img', 'data/attachment/single' );
				if (is_array ( $uploadResult )) {
					$singleInfo ['img'] = $uploadResult ['source'];
					/* 图片压缩 */
					$param = array (
							0 => array (
									'',
									$singleInfo ['img_width'],
									$singleInfo ['img_height'] 
							) 
					);
					$this->imageThumb ( $singleInfo ['img'], $param );
				} else {
					$this->ajax_return ( 0, '文件上传失败，请检查文件类型，大小！' );
				}
			} else {
				unset ( $singleInfo ['img'] ); // 编辑的时候不上传图片 就用原先的图片
			}
		}
		return $singleInfo;
	}
	
	/**
	 *
	 * @return SingleService
	 */
	private function _getService() {
		return InitPHP::getService ( 'Single', 'single' );
	}
}