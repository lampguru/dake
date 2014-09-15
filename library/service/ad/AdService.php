<?php 
/**
 * 广告服务
 */
class AdService extends BaseService {
	
	/**
	 * 前台调用接口，通过广告位唯一标识获取广告列表
	 * @param string $tag  唯一标识
	 * @param int    $num  调用广告数量
	 */
	public function getAdData($tag, $num = 1) {
		$positionInfo = $this->getAdPositionByTag($tag);
		if (!$positionInfo) return array();
		$posid  = $positionInfo['id'];
		$result = $this->_getAdDao()->getAllByPosid($posid);
		$temp   = array();
		$time   = InitPHP::getTime();
		$i      = 0;
		foreach ($result as $val) {
			if ($i > $num) break;
			if ($val['start_time'] == 0 || $time > $val['start_time']) {
				if ($val['end_time'] == 0 || $time < $val['end_time']) {
					$val = $this->_cookAdContent($val, true);
					$temp[] = $val;
					$i++;
				}
			}
		}
		return $temp;
	}
	
	/**
	 * 新增广告位
	 * 参数结构
	 * array(
	 * 'tag' => 广告位标识
	 * 'name'=> 广告位名称
	 * 'descrip' => 广告描述
	 * )
	 * @param array $data
	 */
	public function addAdPosition($data) {
		if (!is_array($data))
			return $this->service->return_msg(false, '参数不正确!');
		$data = $this->_cookAdPositionData($data);
		$data['create_time'] = InitPHP::getTime();
		if (empty($data['tag']) || empty($data['name']))
			return $this->service->return_msg(false, '广告位标签或者名称不得为空!');
		$result = $this->_getAdPositionDao()->add($data);
		if (!$result) return $this->service->return_msg(false, '创建失败!');
		return $this->service->return_msg(true, '创建成功!', $result);
	}
	
	/**
	 * 编辑广告位置
	 * 参数结构
	 * array(
	 * 'tag' => 广告位标识
	 * 'name'=> 广告位名称
	 * 'descrip' => 广告描述
	 * )
	 * @param int   $id
	 * @param array $data
	 */
	public function editAdPosition($id, $data) {
		$id = intval($id);
		if ($id < 1) return false;
		$data = $this->_cookAdPositionData($data);
		if (empty($data['tag']) || empty($data['name'])) return false;
		if (empty($data)) return false;
		return $this->_getAdPositionDao()->edit($id, $data);
	}
	
	/**
	 * 通过ID获取一个广告位
	 * @param int $id
	 */
	public function getAdPosition($id) {
		$id = intval($id);
		if ($id < 1) return array();
		return $this->_getAdPositionDao()->get($id);
	}
	
	/**
	 * 通过tag获取广告位
	 * @param string $tag
	 */
	public function getAdPositionByTag($tag) {
		return $this->_getAdPositionDao()->getByTag($tag);
	}
	
	/**
	 * 通过ID删除一个广告位
	 * @param int $id
	 */
	public function delAdPosition($id) {
		$id = intval($id);
		if ($id < 1) return false;
		return $this->_getAdPositionDao()->delete($id);
	}
	
	/**
	 * 获取广告位列表
	 * @param int $page
	 * @param int $perpage
	 */
	public function getAdPositionList($page, $perpage) {
		$page    = intval($page);
		$perpage = intval($perpage);
		return $this->_getAdPositionDao()->getList($page, $perpage);
	} 
	
	/**
	 * 获取全部广告位
	 */
	public function getAllPosition() {
		$result = $this->_getAdPositionDao()->getAll();
		$temp   = array();
		foreach ($result as $val) {
			$temp[$val['id']] = $val;
		}
		return $temp;
	}
	
	/**
	 * 添加广告
	 * 参数结构:
	 * array(
	 * 'posid' => 广告位ID
	 * 'type'  => 广告类型
	 * 'name'  => 广告名词
	 * 'descrip' => 广告详细内容
	 * )
	 * @param array $data
	 */
	public function addAd($data) {
		if (!is_array($data))
			return $this->service->return_msg(false, '参数不正确!');
		$data = $this->_cookAdData($data);
		$data['create_time'] = InitPHP::getTime();
		$result = $this->_getAdDao()->add($data);
		if (!$result) return $this->service->return_msg(false, '创建失败!');
		return $this->service->return_msg(true, '创建成功!', $result);
	}
	
	/**
	 * 编辑广告
	 * @param int   $id
	 * @param array $data
	 */
	public function editAd($id, $data) {
		$id = intval($id);
		if ($id < 1) return false;
		$data = $this->_cookAdData($data);
		return $this->_getAdDao()->edit($id, $data);
	}
	
	/**
	 * 删除广告
	 * @param int $id
	 */
	public function delAd($id) {
		$id = intval($id);
		if ($id < 1) return false;
		return $this->_getAdDao()->delete($id);
	}
	
	/**
	 * 获取单个广告
	 * @param int $id
	 */
	public function getAd($id) {
		$id = intval($id);
		if ($id < 1) return array();
		$data  = $this->_getAdDao()->get($id);
		return $this->_cookAdContent($data, true);
	}
	
	/**
	 * 获取广告列表
	 * @param int $page
	 * @param int $perpage
	 */
	public function getAdList($page, $perpage) {
		$page    = intval($page);
		$perpage = intval($perpage);
		return $this->_getAdDao()->getList($page, $perpage);
	}
	
	/**
	 * 过滤传递进来的参数
	 * @param array $data
	 * @return ArrayIterator
	 */
	private function _cookAdPositionData($data) {
		$field = array(
			array('tag', ''),
			array('name', ''),
			array('descrip' ,'')
		);
		return $this->service->parse_data($field, $data);
	}
	
	/**
	 * 过滤传递进来的参数
	 * @param array $data
	 * @return ArrayIterator
	 */
	private function _cookAdData($data) {
		$data  = $this->_cookAdContent($data);
		$field = array(
			array('posid', 'int'),
			array('type', 'int'),
			array('name', ''),
			array('descrip' ,''),
			array('status' ,'int'),
			array('start_time' ,'int'),
			array('end_time' ,'int'),
			array('content' ,''),
			array('sort' ,'int')
		);
		return $this->service->parse_data($field, $data);
	}
	
	/**
	 * 各种类型存储
	 * @param array $data
	 * @param bool $type  false = 新增；true = 获取数据
	 */
	private function _cookAdContent($data, $type = false) {
		if ($type == false) { //新增 组装content字段
			if ($data['type'] == 1) {
				$data['content'] = json_encode(array(
					'str' => urlencode($data['str']),
					'link'=> urlencode($data['link'])
				));
			} else {
				if (isset($data['img'])) {
					$data['content'] = json_encode(array(
						'img' => urlencode($data['img'])
					));
				} else {
					unset($data['content']);
				}
			}
		} else {
			if ($data['type'] == 1) {
				$data['content'] = json_decode($data['content'], TRUE);
				$data['link']    = urldecode($data['content']['link']);
				$data['str']     = urldecode($data['content']['str']);
			} else {
				$data['content'] = json_decode($data['content'], TRUE);
				$data['img']    = urldecode($data['content']['img']);
			}
		}
		return $data;
	}
	
	/**
	 * 广告位DAO
	 * @return AdPositionDao
	 */
	private function _getAdPositionDao() {
		return InitPHP::getDao('AdPosition', 'ad');
	}
	
	/**
	 * 广告DAO
	 * @return AdDao
	 */
	private function _getAdDao() {
		return InitPHP::getDao('Ad', 'ad');
	}
	
	
}