<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2014-09-17 09:09:46, compiled from E:\www\dake/web/template/admin/index/index_default.htm */ ?>
<div class="content">
  <h1>Dake</h1>
  <table>
    <tr>
      <th width="200">版本</th>
      <td class="top_broder"><?php echo $phpInfo['version']; ?></td>
    </tr>
    <tr>
      <th width="200">系统</th>
      <td class="top_broder"><?php echo $phpInfo['system']; ?></td>
    </tr>
    <tr>
      <th width="200">最大执行时间</th>
      <td class="top_broder"><?php echo $phpInfo['max_time']; ?></td>
    </tr>
    <tr>
      <th width="200">最大上传文件</th>
      <td class="top_broder"><?php echo $phpInfo['max_upload']; ?></td>
    </tr>
    <tr>
      <th width="200">GD库版本</th>
      <td class="top_broder"><?php echo $phpInfo['gd']; ?></td>
    </tr>
    <tr>
      <th width="200">脚本运行占用最大内存</th>
      <td class="top_broder"><?php echo $phpInfo['memory']; ?></td>
    </tr>
    <tr>
      <th width="200">服务器端信息</th>
      <td class="top_broder"><?php echo $phpInfo['server']; ?></td>
    </tr>
    <tr>
      <th width="200">Zend版本</th>
      <td class="top_broder"><?php echo $phpInfo['zend']; ?></td>
    </tr>
    <tr>
      <th width="200">当前时间</th>
      <td class="top_broder"><?php echo $phpInfo['now_time']; ?></td>
    </tr>
    <tr>
      <th width="200">系统开发</th>
      <td class="top_broder">Dake</td>
    </tr>
  </table>
</div>
