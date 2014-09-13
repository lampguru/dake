<?php
/*
 *  钩子名称 => array(array('挂钩上对应的类名称', '函数名称')) 一个挂钩多个函数
 *  钩子名称 => array(挂钩上对应的类名称,函数名称) //一个挂钩一个钩子函数
 */
return array(
	//guest挂钩，InitPHP::hook('guest','Hook'); 在程序中放置钩子，guest钩子名称，Hook传递的参数
	'guest' => array( 
		array('test', 'run'), 
		array('test', 'aa')
	)
);
?>