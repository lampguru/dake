<?php
/**
 * 分类
 * @author dake
 */
class TreeService extends BaseService {
	
	/**
	 * 添加分类
	 *
	 * @param array $data        	
	 */
	public function add($data) {
		
	}
	
	/**
	 * 编辑分类
	 *
	 * @param int $id        	
	 * @param array $data        	
	 */
	public function edit($id, $data) {
		
	}
	
	/**
	 * 删除分类
	 *
	 * @param int $id        	
	 */
	public function del($id) {
		
	}
	
	/**
	 * 获取分类
	 *
	 * @param int $id        	
	 */
	public function get($id) {
		
	}
	
	/**
	 * 过滤传递进来的参数
	 *
	 * @param array $data        	
	 * @return ArrayIterator
	 */
	private function _cookData($data) {
		$data = $this->_cookContent ( $data );
		$field = array (
				array (
						'pid',
						'int' 
				),
				array (
						'name',
						'' 
				),
				array (
						'descrip',
						'' 
				),
				array (
						'status',
						'int' 
				),
				array (
						'content',
						'' 
				),
				array (
						'sort',
						'int' 
				) 
		);
		return $this->service->parse_data ( $field, $data );
	}
	
	/**
	 * 分类DAO
	 *
	 * @return Dao
	 */
	private function _getDao() {
		return InitPHP::getDao ( 'Tree', 'tree' );
	}
}