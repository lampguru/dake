<?php
/**
 * 后台管理-扩展管理-广告管理
 * @author zhuli
 */
class adController extends BaseAdminController{

    public $initphp_list = array('add', 'adddo', 'del', 'edit', 'editdo',
		'adlist', 'adadd', 'adadddo', 'addel', 'adedit', 'adeditdo'
	); //Action白名单
    
    /**
     * [广告位]广告位列表 
     */
    public function run() {    	
        $page = intval($this->controller->get_gp('page'));
        /* 列表 */
        $AdService = $this->_getAdService();
        list($adPositionList, $adPositionCount) = $AdService->getAdPositionList($page, $this->perpage);
       	$this->page($adPositionCount); //分页
        /* 输出 */
        $this->view->assign('adPositionList', $adPositionList);
        $this->view->assign('adPositionCount', $adPositionCount);
        $this->view->set_tpl('ad/ad_run');  
    }
    
    /**
     * [广告位]新增广告位-显示
     */
    public function add() {
        $this->view->set_tpl('ad/ad_add');
    }
    
    /**
     * [广告位]新增广告位-操作
     */
    public function adddo() {
        $adPositionInfo = $this->controller->get_gp(array('name', 'tag', 'descrip'));
        /* 数据过滤 */
  		$this->_checkPositionData($adPositionInfo);
        /* 新增数据 */
        $result = $this->_getAdService()->addAdPosition($adPositionInfo);
        if ($result[0] == false) $this->ajax_return(0, $result[1]);
        $this->ajax_return(1, '广告位新增成功');
    }
    
    /**
     * [广告位]编辑广告位-显示 
     */
    public function edit() {
        $id = $this->controller->get_gp('id');
        $adPositionInfo = $this->_getAdService()->getAdPosition($id);
        $this->view->assign('adPositionInfo', $adPositionInfo);
        $this->view->set_tpl('ad/ad_edit');
    }
    
    /**
     * [广告位]编辑广告位-操作
     */
    public function editdo() {
    	$adPositionInfo = $this->controller->get_gp(array('id', 'name', 'tag', 'descrip'));
    	/* 数据过滤 */
    	$this->_checkPositionData($adPositionInfo);
    	/* 编辑数据 */
    	$result = $this->_getAdService()->editAdPosition($adPositionInfo['id'], $adPositionInfo);
    	if (!$result) $this->ajax_return(0, '广告位编辑失败');
        $this->ajax_return(1, '广告位编辑成功');
    }
    
    /**
     * [广告位]删除广告位-操作
     */
    public function del() {
        $id = $this->controller->get_gp('id');
        $result = $this->_getAdService()->delAdPosition($id);
        if (!$result) $this->ajax_return(0, '广告位删除失败');
        $this->ajax_return(1, '广告位删除成功');
    }
	
	/**
     * [广告]广告列表-显示
     */
	public function adlist() {
		$page = intval($this->controller->get_gp('page'));
        /* 列表 */
        $AdService = $this->_getAdService();
        list($adList, $adCount) = $AdService->getAdList($page, $this->perpage);
	    $this->page($adCount); //分页
		/* 广告位 */
		$adPositionList = $this->_getAdService()->getAllPosition();
		$this->view->assign('adPositionList', $adPositionList);
        /* 输出 */
        $this->view->assign('adList', $adList);
        $this->view->assign('adCount', $adCount);
        $this->view->set_tpl('ad/ad_adlist');  
	}
	
	/**
     * [广告]新增广告显示
     */
	public function adadd() {
		$adPositionList = $this->_getAdService()->getAllPosition();
		$this->view->assign('adPositionList', $adPositionList);
		$this->view->set_tpl('ad/ad_adadd'); 
	}
	
	/**
     * [广告]新增广告操作
     */
	public function adadddo() {
		$adInfo = $this->controller->get_gp(array('name', 'type', 'descrip', 'content', 'posid', 'status', 'str', 
		'link', 'start_time', 'end_time', 'img_width', 'img_height', 'sort'));
		$adInfo = $this->_checkAdData($adInfo);
		/* 新增广告 */
		$result = $this->_getAdService()->addAd($adInfo);
		if ($result[0] == false) $this->ajax_return(0, $result[1]);
        $this->ajax_return(1, '广告新增成功');
	}
	
	/**
     * [广告]编辑广告显示
     */
	public function adedit() {
		$id = $this->controller->get_gp('id');
		$adInfo = $this->_getAdService()->getAd($id);
		$adInfo['start_time'] = ($adInfo['start_time'] == 0) ? '' : date("Y-m-d H:i:s", $adInfo['start_time']);
		$adInfo['end_time'] = ($adInfo['end_time'] == 0) ? '' : date("Y-m-d H:i:s", $adInfo['end_time']);
		/* 广告位 */
		$adPositionList = $this->_getAdService()->getAllPosition();
		$this->view->assign('adInfo', $adInfo);
		$this->view->assign('adPositionList', $adPositionList);
		$this->view->set_tpl('ad/ad_adedit'); 
	}
	
	public function adeditdo() {
		$adInfo = $this->controller->get_gp(array('id', 'name', 'type', 'descrip', 'content', 'posid', 'status',
		 'str', 'link', 'start_time', 'end_time', 'img_width', 'img_height', 'sort'));
		$adInfo = $this->_checkAdData($adInfo);
		/* 编辑广告 */
		$result = $this->_getAdService()->editAd($adInfo['id'], $adInfo);
		if ($result == false) $this->ajax_return(0, '广告编辑失败！');
        $this->ajax_return(1, '广告编辑成功！');
	}
	
	/**
     * [广告]删除广告操作
     */
	public function addel() {
		$id = $this->controller->get_gp('id');
        $result = $this->_getAdService()->delAd($id);
        if (!$result) $this->ajax_return(0, '广告删除失败');
        $this->ajax_return(1, '广告删除成功');
	}
    
	/**
	 * 前置操作
	 */
    public function before() {
        parent::before();
        $this->view->assign('adRun', $this->getUrl('ad', 'run'));
        $this->view->assign('adAdd', $this->getUrl('ad', 'add'));
        $this->view->assign('adAdddo', $this->getUrl('ad', 'adddo'));
        $this->view->assign('adDel', $this->getUrl('ad', 'del'));
        $this->view->assign('adEdit', $this->getUrl('ad', 'edit'));
        $this->view->assign('adEditdo', $this->getUrl('ad', 'editdo'));
        $this->view->assign('adAdlist', $this->getUrl('ad', 'adlist'));
		$this->view->assign('adAdadd', $this->getUrl('ad', 'adadd'));
		$this->view->assign('adAdadddo', $this->getUrl('ad', 'adadddo'));
		$this->view->assign('adAdedit', $this->getUrl('ad', 'adedit'));
		$this->view->assign('adAdeditdo', $this->getUrl('ad', 'adeditdo'));
		$this->view->assign('adAddel', $this->getUrl('ad', 'addel'));
		$this->view->assign('adAdedit', $this->getUrl('ad', 'adedit'));
		$this->view->assign('adAdeditdo', $this->getUrl('ad', 'adeditdo'));
    }
    
    /**
     * 广告位数据过滤
     * @param array $adPositionInfo
     */
    private function _checkPositionData($adPositionInfo) {
    	if (!$this->controller->is_length($adPositionInfo['name'], 1, 20))
            $this->ajax_return(0, '广告位名称1-20个字符！');
		$adPositionInfo['tag'] = str_replace('_', '', $adPositionInfo['tag']);
        if (!$this->controller->is_english($adPositionInfo['tag']))
            $this->ajax_return(0, '广告位标识必须为英文字母和_！');
		$tagInfo = $this->_getAdService()->getAdPositionByTag($adPositionInfo['tag']);
        if ($tagInfo && $tagInfo['id'] != $adPositionInfo['id'])
        	$this->ajax_return(0, '广告位标识已存在');
        if (!$this->controller->is_length($adPositionInfo['descrip'], 0, 500))
            $this->ajax_return(0, '广告位描述小于500字符');
        return true;
    }
    
    /**
     * 广告共用部分
     * @param array $adInfo
     */
    private function _checkAdData($adInfo) {
    	/* 广告名称 */
		if (!$this->controller->is_length($adInfo['name'], 1, 20))
			$this->ajax_return(0, '广告名称不得为空！');
		/* 图片上传 */
		if ($adInfo['type'] == 0) {
			if (!($_FILES['img']['name'] == '' && $adInfo['id'])) {
				$uploadResult = $this->upload('img', 'data/attachment/ad');
	            if (is_array($uploadResult)) {
	            	$adInfo['img'] = $uploadResult['source'];
	            	/* 图片压缩 */
	            	$param = array(0=>array('', $adInfo['img_width'], $adInfo['img_height']));
					$this->imageThumb($adInfo['img'], $param);
	            } else {
	            	$this->ajax_return(0, '文件上传失败，请检查文件类型，大小！');
	            }
			} else {
				unset($adInfo['img']); //编辑的时候不上传图片 就用原先的图片
			}
		}
		/* 开始时间和结束时间处理 */
		$adInfo['start_time'] = $this->_getDateTime($adInfo['start_time']);			
		$adInfo['end_time']   = $this->_getDateTime($adInfo['end_time']);	
		if ($adInfo['end_time'] != 0 && $adInfo['start_time'] != 0 && $adInfo['end_time'] < $adInfo['start_time'])
			$this->ajax_return(0, '结束时间不能大于开始时间！');
		return $adInfo;
    }
    
    /**
     * @return AdService
     */
    private function _getAdService() {
        return InitPHP::getService('Ad', 'ad');
    }
    
}