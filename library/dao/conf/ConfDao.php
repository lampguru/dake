<?php
/**
 * InitApp 网站站点配置Dao
 * @author zhuli
 */
class ConfDao extends BaseDao {
    
    protected $table_name = 'initapp_site_config';
    
    /**
     * 新增网站配置
     * @param array $data
     * @return int
     */
    public function add($data) {
        if (!$data) return false; 
        return $this->dao->db->insert($data, $this->table_name);
    }
    
    /**
     * 编辑网站配置
     * @param int   $groupid
     * @param array $data
     * @return bool
     */
    public function edit($key, $data) {
        if (!$key || !$data) return false;
        $result = $this->dao->db->update_by_field($data, array('k' => $key), $this->table_name);
        if ($result) {
        	$this->dao->cache->clear($this->cacheKey($key), CACHE_TYPE); //清除缓存
        }
        return $result;
    }
    
    /**
	 * 【Cache】获取配置信息
	 * 缓存Key:$key
	 * 缓存类型：永久缓存 单个缓存
     * @param int $groupid
     * @return array
     */
    public function get($key) {
    	$value = $this->dao->cache->get($this->cacheKey($key), CACHE_TYPE);
		if (!$value) {
			$value = $this->dao->db->get_one_by_field(array('k' => $key), $this->table_name);
    		$this->dao->cache->set($this->cacheKey($key), $value, 0, CACHE_TYPE);
		}
		return $value;
    }
    
}