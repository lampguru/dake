<?php
class BaseDao extends Dao {
	
	/**
	 * 缓存KEY
	 * @param string $key
	 */
	public function cacheKey($key) {
		return $this->table_name . $key;
	}
}