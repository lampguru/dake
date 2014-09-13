<?php
/**
 * 公用配置文件类
 * @author zhuli
 */
class ConfService extends BaseService {
	
	/**
	 * 更新网站配置文件接口
	 * @param string $key   KEY值小于20位
	 * @param array  $value value，数组格式
	 * @return bool
	 */
	public function updateConfig($key, $value) {
		if (!$key || !is_array($value)) return false; 
		$valueTemp = $value; 
		foreach ($value as $k => $v) {
			$valueTemp[$k] = urlencode($v);
		}
		$val = json_encode($valueTemp);
		$val = str_replace('\\', '', $val);
		$data = array('v' => $val);
		$isExist = $this->getConfig($key);
		if ($isExist) { //存在，更新
			$result = $this->_getSiteConfigDao()->edit($key, $data);
		} else { //不存在，新建
			$data['k'] = $key;
			$result = $this->_getSiteConfigDao()->add($data);
			return true;
		}
		if (!$result) return false;
		return true;
	}
	
	/**
	 * 获取网站配置信息接口
	 * @param string $key KEY值小于20位
	 * @return array
	 */
	public function getConfig($key) {
		if (!$key) return array();
		$result = $this->_getSiteConfigDao()->get($key);
		if (!$result) return array();
		return json_decode(urldecode($result['v']), true);
	}
	
	/**
	 * @return ConfDao
	 */
	private function _getSiteConfigDao() {
		return InitPHP::getDao('Conf', 'conf');
	}
}