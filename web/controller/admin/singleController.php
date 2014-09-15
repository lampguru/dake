<?php
/**
 * 后台管理-扩展管理-单页管理
 * @author dake
 */
class singleController extends BaseAdminController{

    public $initphp_list = array('add', 'add_do', 'del', 'edit', 'edit_do',
		'single', 'single_add', 'single_add_do', 'single_del', 'single_edit', 'single_edit_do'
	); //Action白名单
    
    /**
     * [单页模块]单页模块列表 
     */
    public function run() {
        $page = intval($this->controller->get_gp('page'));
        /* 列表 */
        $service = $this->_getService();
        list($moduleList, $moduleCount) = $service->getModuleList($page, $this->perpage);
       	$this->page($moduleCount); //分页
        /* 输出 */
        $this->view->assign('moduleList', $moduleList);
        $this->view->assign('moduleCount', $moduleCount);
        $this->view->set_tpl('single/single_run');  
    }
    
    /**
     * [单页模块]新增单页模块-显示
     */
    public function add() {
        $this->view->set_tpl('single/single_add');
    }
    
    /**
     * [单页模块]新增单页模块-操作
     */
    public function add_do() {
        $moduleInfo = $this->controller->get_gp(array('name', 'tag', 'descrip'));
        /* 数据过滤 */
  		$this->_checkModuleData($moduleInfo);
        /* 新增数据 */
        $result = $this->_getService()->addModule($moduleInfo);
        if ($result[0] == false) $this->ajax_return(0, $result[1]);
        $this->ajax_return(1, '单页模块新增成功');
    }
    
    /**
     * [单页模块]编辑单页模块-显示 
     */
    public function edit() {
        $id = $this->controller->get_gp('id');
        $moduleInfo = $this->_getService()->getModule($id);
        $this->view->assign('moduleInfo', $moduleInfo);
        $this->view->set_tpl('single/single_edit');
    }
    
    /**
     * [单页模块]编辑单页模块-操作
     */
    public function edit_do() {
    	$moduleInfo = $this->controller->get_gp(array('id', 'name', 'tag', 'descrip'));
    	/* 数据过滤 */
    	$this->_checkModuleData($moduleInfo);
    	/* 编辑数据 */
    	$result = $this->_getService()->editModule($moduleInfo['id'], $moduleInfo);
    	if (!$result) $this->ajax_return(0, '单页模块编辑失败');
        $this->ajax_return(1, '单页模块编辑成功');
    }
    
    /**
     * [单页模块]删除单页模块-操作
     */
    public function del() {
        $id = $this->controller->get_gp('id');
        $result = $this->_getService()->delModule($id);
        if (!$result) $this->ajax_return(0, '单页模块删除失败');
        $this->ajax_return(1, '单页模块删除成功');
    }
	
	/**
     * [单页]单页列表-显示
     */
	public function single() {
		$page = intval($this->controller->get_gp('page'));
        /* 列表 */
        $service = $this->_getService();
        list($singleList, $singleCount) = $service->getList($page, $this->perpage);
	    $this->page($singleCount); //分页
		/* 单页模块 */
		$moduleList = $this->_getService()->getAllModule();
		$this->view->assign('moduleList', $moduleList);
        /* 输出 */
        $this->view->assign('singleList', $singleList);
        $this->view->assign('singleCount', $singleCount);
        $this->view->set_tpl('single/single_singlelist');  
	}
	
	/**
     * [单页]新增单页显示
     */
	public function single_add() {
		$moduleList = $this->_getService()->getAllModule();
		$this->view->assign('moduleList', $moduleList);
		$this->view->set_tpl('single/single_singleadd'); 
	}
	
	/**
     * [单页]新增单页操作
     */
	public function single_add_do() {
		$singleInfo = $this->controller->get_gp(array('name', 'type', 'descrip', 'content', 'modid', 'status', 'str', 
		'link', 'start_time', 'end_time', 'img_width', 'img_height', 'sort'));
		$singleInfo = $this->_checkData($singleInfo);
		/* 新增单页 */
		$result = $this->_getService()->add($singleInfo);
		if ($result[0] == false) $this->ajax_return(0, $result[1]);
        $this->ajax_return(1, '单页新增成功');
	}
	
	/**
     * [单页]编辑单页显示
     */
	public function single_edit() {
		$id = $this->controller->get_gp('id');
		$singleInfo = $this->_getService()->get($id);
		$singleInfo['start_time'] = ($singleInfo['start_time'] == 0) ? '' : date("Y-m-d H:i:s", $singleInfo['start_time']);
		$singleInfo['end_time'] = ($singleInfo['end_time'] == 0) ? '' : date("Y-m-d H:i:s", $singleInfo['end_time']);
		/* 单页模块 */
		$moduleList = $this->_getService()->getAllModule();
		$this->view->assign('singleInfo', $singleInfo);
		$this->view->assign('moduleList', $moduleList);
		$this->view->set_tpl('single/single_singleedit'); 
	}
	
	public function single_edit_do() {
		$singleInfo = $this->controller->get_gp(array('id', 'name', 'type', 'descrip', 'content', 'modid', 'status',
		 'str', 'link', 'start_time', 'end_time', 'img_width', 'img_height', 'sort'));
		$singleInfo = $this->_checkData($singleInfo);
		/* 编辑单页 */
		$result = $this->_getService()->edit($singleInfo['id'], $singleInfo);
		if ($result == false) $this->ajax_return(0, '单页编辑失败！');
        $this->ajax_return(1, '单页编辑成功！');
	}
	
	/**
     * [单页]删除单页操作
     */
	public function single_del() {
		$id = $this->controller->get_gp('id');
        $result = $this->_getService()->del($id);
        if (!$result) $this->ajax_return(0, '单页删除失败');
        $this->ajax_return(1, '单页删除成功');
	}
    
	/**
	 * 前置操作
	 */
    public function before() {
        parent::before();
        $this->view->assign('singleRun', $this->getUrl('single', 'run'));
        $this->view->assign('singleAdd', $this->getUrl('single', 'add'));
        $this->view->assign('singleAdddo', $this->getUrl('single', 'add_do'));
        $this->view->assign('singleDel', $this->getUrl('single', 'del'));
        $this->view->assign('singleEdit', $this->getUrl('single', 'edit'));
        $this->view->assign('singleEditdo', $this->getUrl('single', 'edit_do'));
        $this->view->assign('singleSingle', $this->getUrl('single', 'single'));
		$this->view->assign('singleSingleAdd', $this->getUrl('single', 'single_add'));
		$this->view->assign('singleSingleAdddo', $this->getUrl('single', 'single_add_do'));
		$this->view->assign('singleSingleEdit', $this->getUrl('single', 'single_edit'));
		$this->view->assign('singleSingleEditdo', $this->getUrl('single', 'single_edit_do'));
		$this->view->assign('singleSingleDel', $this->getUrl('single', 'single_del'));
    }
    
    /**
     * 单页模块数据过滤
     * @param array $moduleInfo
     */
    private function _checkModuleData($moduleInfo) {
    	if (!$this->controller->is_length($moduleInfo['name'], 1, 20))
            $this->ajax_return(0, '单页模块名称1-20个字符！');
		$moduleInfo['tag'] = str_replace('_', '', $moduleInfo['tag']);
        if (!$this->controller->is_english($moduleInfo['tag']))
            $this->ajax_return(0, '单页模块标识必须为英文字母和_！');
		$tagInfo = $this->_getService()->getModuleByTag($moduleInfo['tag']);
        if ($tagInfo && $tagInfo['id'] != $moduleInfo['id'])
        	$this->ajax_return(0, '单页模块标识已存在');
        if (!$this->controller->is_length($moduleInfo['descrip'], 0, 500))
            $this->ajax_return(0, '单页模块描述小于500字符');
        return true;
    }
    
    /**
     * 单页共用部分
     * @param array $singleInfo
     */
    private function _checkData($singleInfo) {
    	/* 单页名称 */
		if (!$this->controller->is_length($singleInfo['name'], 1, 20))
			$this->ajax_return(0, '单页名称不得为空！');
		/* 图片上传 */
		if ($singleInfo['type'] == 0) {
			if (!($_FILES['img']['name'] == '' && $singleInfo['id'])) {
				$uploadResult = $this->upload('img', 'data/attachment/single');
	            if (is_array($uploadResult)) {
	            	$singleInfo['img'] = $uploadResult['source'];
	            	/* 图片压缩 */
	            	$param = array(0=>array('', $singleInfo['img_width'], $singleInfo['img_height']));
					$this->imageThumb($singleInfo['img'], $param);
	            } else {
	            	$this->ajax_return(0, '文件上传失败，请检查文件类型，大小！');
	            }
			} else {
				unset($singleInfo['img']); //编辑的时候不上传图片 就用原先的图片
			}
		}
		/* 开始时间和结束时间处理 */
		$singleInfo['start_time'] = $this->_getDateTime($singleInfo['start_time']);			
		$singleInfo['end_time']   = $this->_getDateTime($singleInfo['end_time']);	
		if ($singleInfo['end_time'] != 0 && $singleInfo['start_time'] != 0 && $singleInfo['end_time'] < $singleInfo['start_time'])
			$this->ajax_return(0, '结束时间不能大于开始时间！');
		return $singleInfo;
    }
    
    /**
     * @return SingleService
     */
    private function _getService() {
        return InitPHP::getService('Single', 'single');
    }
    
}