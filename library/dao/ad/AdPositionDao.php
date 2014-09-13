<?php
/**
 * 广告位
 */
class AdPositionDao extends BaseDao {
	
	protected $table_name = 'initapp_ad_position';
	
	/**
	 * 新增广告位
	 * @param array $data
	 * @return int
	 */
	public function add($data) {
		if (!$data) return false;
		return $this->dao->db->insert($data, $this->table_name);
	}
	
	/**
	 * 编辑广告位
	 * @param int   $id
	 * @param array $data
	 * @return bool
	 */
	public function edit($id, $data) {
		$id = intval($id);
		if (!$id || !$data) return false;
		return $this->dao->db->update($id, $data, $this->table_name);
	}
	
	/**
	 * 删除广告位
	 * @param int   $id
     * @return bool
	 */
	public function delete($id) {
		$id = intval($id);
		return $this->dao->db->delete($id, $this->table_name);
	}
	
	/**
	 * 获取一个广告位信息
	 * @param int $id
	 * @return array
	 */
	public function get($id) {
		$id = intval($id);
		if ($id < 1) return false;
		return $this->dao->db->get_one($id, $this->table_name);
	}
	
	/**
	 * 【Cache-有时间期效缓存】通过唯一标识获取广告位
	 * @param string $tag
	 */
	public function getByTag($tag) {
		$value = $this->dao->cache->get($this->cacheKey($tag), CACHE_TYPE);
		if (!$value) {
			$where  = $this->dao->db->build_where(array('tag' => $tag));
			$sql    = sprintf("SELECT * FROM %s %s ", $this->table_name, $where);
			$value  = $this->dao->db->get_one_sql($sql);
			$this->dao->cache->set($this->cacheKey($tag), $value, CACHE_TIME, CACHE_TYPE);
		}
		return $value;
	}
	
	/**
	 * 获取分页列表
	 * @param int $page
	 * @param int $perpage
	 * @return Array
	 */
	public function getList($page, $perpage) {
		$page    = intval($page);
		$perpage = intval($perpage);
		if ($page < 1) $page = 1;
		$page    = ($page - 1) * $perpage;
		return $this->dao->db->get_all($this->table_name, $perpage, $page);
	}
	
	/**
	 * 获取全部广告位列表
	 */
	public function getAll() {
		$sql = sprintf("SELECT * FROM %s ", $this->table_name);
		return $this->dao->db->get_all_sql($sql);
	}
}