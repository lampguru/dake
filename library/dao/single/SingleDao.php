<?php
/**
 * 单页
 * @author dake
 */
class SingleDao extends BaseDao {
	protected $table_name = 'initapp_single';
	
	/**
	 * 新增单页
	 * 
	 * @param array $data        	
	 * @return int
	 */
	public function add($data) {
		if (! $data)
			return false;
		return $this->dao->db->insert ( $data, $this->table_name );
	}
	
	/**
	 * 编辑单页
	 * 
	 * @param int $id        	
	 * @param array $data        	
	 * @return bool
	 */
	public function edit($id, $data) {
		$id = intval ( $id );
		if (! $id || ! $data)
			return false;
		return $this->dao->db->update ( $id, $data, $this->table_name );
	}
	
	/**
	 * 删除单页
	 * 
	 * @param int $uid        	
	 * @return bool
	 */
	public function delete($id) {
		$id = intval ( $id );
		return $this->dao->db->delete ( $id, $this->table_name );
	}
	
	/**
	 * 获取一个单页信息
	 * 
	 * @param int $id        	
	 * @return array
	 */
	public function get($id) {
		$id = intval ( $id );
		if ($id < 1)
			return false;
		return $this->dao->db->get_one ( $id, $this->table_name );
	}
	
	/**
	 * 获取分页列表
	 * 
	 * @param int $page        	
	 * @param int $perpage        	
	 * @return Array
	 */
	public function getList($page, $perpage) {
		$page = intval ( $page );
		$perpage = intval ( $perpage );
		if ($page < 1)
			$page = 1;
		$page = ($page - 1) * $perpage;
		return $this->dao->db->get_all ( $this->table_name, $perpage, $page );
	}
}