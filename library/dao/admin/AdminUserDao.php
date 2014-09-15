<?php
/**
 * InitApp 后台用户Dao
 * @author zhuli
 */
class AdminUserDao extends BaseDao {
	
	protected $table_name = 'initapp_admin_user';
	
	/**
	 * 新增用户
	 * @param array $data
	 * @return int
	 */
	public function add($data) {
		if (!$data) return false;
		return $this->dao->db->insert($data, $this->table_name);
	}
	
	/**
	 * 编辑用户信息
	 * @param int   $uid
	 * @param array $data
	 * @return bool
	 */
	public function edit($uid, $data) {
		$uid = intval($uid);
		if (!$uid || !$data) return false;
		return $this->dao->db->update($uid, $data, $this->table_name, 'uid');
	}
	
	/**
	 * 删除用户
	 * @param int   $uid
     * @return bool
	 */
	public function delete($uid) {
		$uid = intval($uid);
		return $this->dao->db->delete($uid, $this->table_name, 'uid');
	}
	
	/**
	 * 通过UID获取一个用户信息
	 * @param int $id
	 * @return array
	 */
	public function get($uid) {
		$uid = intval($uid);
		if ($uid < 1) return false;
		return $this->dao->db->get_one($uid, $this->table_name, 'uid');
	}
	
	/**
	 * 通用用户名获取一条数据
	 * @param string $username
	 * @return
	 */
	public function getByUsername($username) {
		$username = trim($username);
		$field = array('username' => $username);
		return $this->dao->db->get_one_by_field($field, $this->table_name);
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
		return $this->dao->db->get_all($this->table_name, $perpage, $page,  array(), 'uid');
	}
}