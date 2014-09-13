<?php
/**
 * InitApp 后台用户日志
 * @author zhuli
 */
class AdminLogDao extends BaseDao {
	
	protected $table_name = 'initapp_admin_log';
	
	/**
	 * 新增日志
	 * @param array $data
	 * @return int
	 */
	public function add($data) {
		if (!$data) return false;
		return $this->dao->db->insert($data, $this->table_name);
	}
	
	/**
	 * 获取单条数据
	 * @param int $id
	 */
	public function get($id) {
		return $this->dao->db->get_one($id, $this->table_name);
	}
	
	/**
	 * 日志搜索列表
	 * @param int $page
	 * @param int $perpage
	 * @param array $search
	 */
	public function getList($page, $perpage, $search) {
		if ($page < 1) $page = 1;
		$page    = ($page - 1) * $perpage;
		$limit   = $this->dao->db->build_limit($page, $perpage);
		$where   = $this->_getSearchParam($search);
		$sql     = sprintf("SELECT * FROM %s %s ORDER BY id DESC %s", 
			$this->table_name, 
			$where,
			$limit
		);
		$result = $this->dao->db->query($sql);
		$temp   = array();
		while ($row = $this->dao->db->fetch_assoc($result)) {
			$temp[] = $row;
		}
		return $temp;
	}
	
	/**
	 * 日志搜索统计
	 * @param array $search
	 */
	public function getCount($search) {
		$where    = $this->_getSearchParam($search);
		$sql      = sprintf("SELECT COUNT(*) as count FROM %s %s LIMIT 1", $this->table_name, $where);
		$result   = $this->dao->db->query($sql);
		$result   = $this->dao->db->fetch_assoc($result);
		return $result['count'];
	}
	
	/**
	 * 处理搜索参数
	 * @param array $search
	 */
	private function _getSearchParam($search) {
		$searchStr = '';
		$searchData = array();
		if (isset($search['update_time_start']) && $search['update_time_start'])
			$searchData[] = 'update_time > ' . $this->dao->db->build_escape($search['update_time_start']);
		if (isset($search['update_time_end']) && $search['update_time_end'])
			$searchData[] = 'update_time < ' . $this->dao->db->build_escape($search['update_time_end']);
		if (isset($search['username'])  && $search['username'] !== '')
			$searchData[] = 'username = ' . $this->dao->db->build_escape($search['username']);
		if (!empty($searchData)) $searchStr = ' WHERE ' . implode(' AND ', $searchData);
		return $searchStr;
	}
	
}