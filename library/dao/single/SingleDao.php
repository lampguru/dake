<?php
/**
 * 单页
 * @author dake
 */
class SingleDao extends BaseDao {
	
	protected $table_name = 'initapp_single';
	
	/**
	 * 新增单页
	 * @param array $data
	 * @return int
	 */
	public function add($data) {
		if (!$data) return false;
		return $this->dao->db->insert($data, $this->table_name);
	}
	
	/**
	 * 编辑单页
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
	 * 删除单页
	 * @param int   $uid
     * @return bool
	 */
	public function delete($id) {
		$id = intval($id);
		return $this->dao->db->delete($id, $this->table_name);
	}
	
	/**
	 * 获取一个单页信息
	 * @param int $id
	 * @return array
	 */
	public function get($id) {
		$id = intval($id);
		if ($id < 1) return false;
		return $this->dao->db->get_one($id, $this->table_name);
	}
	
	/**
	 * 【Cache-有时间期效缓存】通过单页位ID获取一组数据
	 * 开启状态，时间
	 * @param int $modid
	 */
	public function getAllByModid($modid) {
		$value = $this->dao->cache->get($this->cacheKey($modid), CACHE_TYPE);
		if (!$value) {
			$where = $this->dao->db->build_where(array(
				'modid'  => $modid,
				'status' => 1,
			));
			$sql    = sprintf("SELECT * FROM %s %s ORDER BY sort DESC", $this->table_name, $where);
			$value  = $this->dao->db->get_all_sql($sql);
			$this->dao->cache->set($this->cacheKey($modid), $value, CACHE_TIME, CACHE_TYPE);
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
		return $this->dao->db->get_all($this->table_name,  $perpage, $page);
	}
}