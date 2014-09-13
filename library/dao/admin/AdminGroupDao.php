<?php
/**
 * InitApp 后台用户组Dao
 * @author zhuli
 */
class AdminGroupDao extends BaseDao {
	
	protected $table_name = 'initapp_admin_group';
	
	/**
	 * 新增用户组
	 * @param array $data
	 * @return int
	 */
	public function add($data) {  
		if (!$data) return false;
		$result = $this->dao->db->insert($data, $this->table_name);
		if ($result) {
			$this->dao->cache->clear($this->cacheKey('all'), CACHE_TYPE); //清除列表缓存
		}
		return $result;
	}
	
	/**
	 * 编辑用户组信息
	 * @param int   $groupid
	 * @param array $data
	 * @return bool
	 */
	public function edit($groupid, $data) {
		$groupid = intval($groupid);
		if (!$groupid || !$data) return false;
		$result = $this->dao->db->update($groupid, $data, $this->table_name, 'groupid');
		if ($result) {
			$this->dao->cache->clear($this->cacheKey('all'), CACHE_TYPE); //清除列表缓存
			$this->dao->cache->clear($this->cacheKey($groupid), CACHE_TYPE); //清除单个缓存
		}
		return $result;
	}
	
	/**
	 * 删除用户组
	 * @param int   $groupid
     * @return bool
	 */
	public function delete($groupid) {
		$groupid = intval($groupid);
		$result = $this->dao->db->delete($groupid, $this->table_name, 'groupid');
		if ($result) {
			$this->dao->cache->clear($this->cacheKey('all'), CACHE_TYPE); //清除列表缓存
			$this->dao->cache->clear($this->cacheKey($groupid), CACHE_TYPE); //清除单个缓存
		}
		return $result;
	}
	
	/**
	 * 【Cache】通过id获取用户组信息
	 * 缓存Key:$groupid
	 * 缓存类型：永久缓存 单个缓存
	 * @param int $groupid
	 * @return array
	 */
	public function get($groupid) {
		$groupid = intval($groupid);
		if ($groupid < 1) return false;
		$value = $this->dao->cache->get($this->cacheKey($groupid), CACHE_TYPE);
		if (!$value) {
			$value = $this->dao->db->get_one($groupid, $this->table_name, 'groupid');
			$this->dao->cache->set($this->cacheKey($groupid), $value, 0, CACHE_TYPE);
		}
		return $value;
	}
	
	/**
	 * 【Cache】获取用户组列表
	 * 缓存Key:all
	 * 缓存类型：永久缓存 列表缓存
	 * @return Array
	 */
	public function getList() {
   		$value = $this->dao->cache->get($this->cacheKey('all'), CACHE_TYPE);
		if (!$value) {
			$sql   = "SELECT * FROM " . $this->table_name;
			$value = $this->dao->db->get_all_sql($sql);
    		$this->dao->cache->set($this->cacheKey('all'), $value, 0, CACHE_TYPE);
		}
		return $value;
	}

}