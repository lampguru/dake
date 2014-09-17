<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2014-09-17 08:58:34, compiled from E:\www\dake/web/template/admin/user/adminlog_run.htm */ ?>
<div class="content_tab">
  <ul>
    <li class="checked" name="<?php echo $adminlogRun; ?>">后台管理日志</li>
  </ul>
</div>
<div class="content">
  <h1>后台管理日志列表</h1>
  <div class="search">
  <form action="<?php echo $adminlogRun; ?>" method="post" >
  <ul >
  <input name="init_token" type="hidden"  value="<?php echo $init_token; ?>" >
  	<li>用户名：<input name="username" value="<?php echo $search['username']; ?>" class="input wh150" type="text" /></li>
	<li>开始时间：<input name="time_start" value="<?php echo $search['time_start']; ?>"  class="Wdate" type="text" /></li>
	<li>结束时间：<input name="time_end" value="<?php echo $search['time_end']; ?>"  class="Wdate" type="text" /></li>
	<li><input value="搜&nbsp;索" type="submit" class="btn" /></li> 
	
  </ul>
  </form>
  </div>
  <table>
    <tr>
      <th width="40">ID</th>
      <th width="80">用户名</th>
	   <th width="80">IP地址</th>
      <th width="60">C</th>
	   <th width="60">A</th>
      <th width="140">创建时间</th>
	  <th width="280">Msg</th>
      <th>操作</th>
    </tr>
    <?php foreach ($logList as $value) { ?>
    <tr>
      <td><?php echo $value['id']; ?></td>
      <td><?php echo $value['username']; ?></td>
	  <td><?php echo $value['ip']; ?></td>
      <td><?php echo $value['controller']; ?></td>
	  <td><?php echo $value['action']; ?></td>
      <td><?php echo date('Y-m-d H:i:s', $value['update_time']); ?></td>
	   <td><?php echo $value['msg']; ?></td>
      <td><a href="<?php echo $adminlogDetail; ?>&id=<?php echo $value['id']; ?>">[查看详细参数]</a></td>
    </tr>
    <?php } ?>
    <?php if ($logCount == 0) { ?>
    <tr>
      <td colspan="8">暂时没有任何数据！</td>
    </tr>
    <?php } ?>
  </table>
    <div class="page">
    <?php echo InitPHP::output($page, 'decode'); ?>
  </div>
</div>
