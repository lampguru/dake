<?php 
/**
 * 单页管理
 * @author dake
 */
class SingleService extends BaseService {
	
	/**
	 * 添加单页
	 * 参数结构:
	 * array(
	 * 'type'  => 单页类型
	 * 'name'  => 单页名词
	 * 'descrip' => 单页详细内容
	 * )
	 * @param array $data
	 */
	public function add($data) {
		if (!is_array($data))
			return $this->service->return_msg(false, '参数不正确!');
		$data = $this->_cookData($data);
		$data['create_time'] = InitPHP::getTime();
		$result = $this->_getDao()->add($data);
		if (!$result) return $this->service->return_msg(false, '创建失败!');
		return $this->service->return_msg(true, '创建成功!', $result);
	}
	
	/**
	 * 编辑单页
	 * @param int   $id
	 * @param array $data
	 */
	public function edit($id, $data) {
		$id = intval($id);
		if ($id < 1) return false;
		$data = $this->_cookData($data);
		return $this->_getDao()->edit($id, $data);
	}
	
	/**
	 * 删除单页
	 * @param int $id
	 */
	public function del($id) {
		$id = intval($id);
		if ($id < 1) return false;
		return $this->_getDao()->delete($id);
	}
	
	/**
	 * 获取单个广告
	 * @param int $id
	 */
	public function get($id) {
		$id = intval($id);
		if ($id < 1) return array();
		$data  = $this->_getDao()->get($id);
		return $this->_cookContent($data, true);
	}
	
	/**
	 * 获取广告列表
	 * @param int $page
	 * @param int $perpage
	 */
	public function getList($page, $perpage) {
		$page    = intval($page);
		$perpage = intval($perpage);
		return $this->_getDao()->getList($page, $perpage);
	}
	
	/**
	 * 过滤传递进来的参数
	 * @param array $data
	 * @return ArrayIterator
	 */
	private function _cookData($data) {
		$data  = $this->_cookContent($data);
		$field = array(
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
	private function _cookContent($data, $type = false) {
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
	 * 单页DAO
	 * @return Dao
	 */
	private function _getDao() {
		return InitPHP::getDao('Single', 'single');
	}
	
	
}