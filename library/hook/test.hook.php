<?php
//一个测试的钩子
class testHook {
    public function run($data) {
  		echo '第一个简单的' . $data;
    }
	
	public function aa($data) {
		echo '<br/>第二个简单的' . $data;
	}
}
?>