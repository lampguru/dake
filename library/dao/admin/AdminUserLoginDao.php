<?php
/**
 * Dake 后台用户 登录错误次数记录表 
 * @author zhuli
 */
class AdminUserLoginDao extends BaseDao {
	
	protected $table_name = 'dake_admin_user_login';
	
	/**
	 * 新增记录
	 * @param array $data
	 * @return int
	 */
	public function add($data) {
		if (!$data) return false;
		return $this->dao->db->insert($data, $this->table_name);
	}
	
	/**
	 * 获取错误登录记录数
	 * @param string $ip
	 * @param int    $time
	 */
	public function getCount($ip, $time) {
		$dtime = InitPHP::getTime() - $time;
		$where = $this->dao->db->build_where(
			array(
				'ip' => $ip
			)
		);
		$sql   = sprintf("SELECT COUNT(id) as count FROM %s %s AND update_time > %s", 
			$this->table_name, 
			$where,
			$this->dao->db->build_escape($dtime)
		);
		$result = $this->dao->db->get_one_sql($sql);
		return $result['count'];
	}
	
}