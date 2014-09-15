<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2014-09-15 08:22:45, compiled from E:\www\dake/web/template/admin/ad/ad_run.htm */ ?>
<div class="content_tab">
  <ul>
    <li class="checked"  name="<?php echo $adRun; ?>">广告位列表</li>
	<li  name="<?php echo $adAdd; ?>">新增广告位</li>
  </ul>
 </div>
<div class="content">
  <h1>广告位列表</h1>
  <table>
    <tr>
      <th width="60">ID</th>
      <th width="160">广告位名称</th>
      <th width="100">唯一标识</th>
      <th width="200">描述</th>
      <th width="140">创建时间</th>
      <th>操作</th>
    </tr>
    <?php foreach ($adPositionList as $value) { ?>
    <tr>
      <td><?php echo $value['id']; ?></td>
      <td><?php echo $value['name']; ?></td>
      <td><?php echo $value['tag']; ?></td>
      <td><?php echo $value['descrip']; ?></td>
      <td><?php echo date('Y-m-d H:i:s', $value['create_time']); ?></td>
      <td><a href="<?php echo $adEdit; ?>&id=<?php echo $value['id']; ?>">[编辑]</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:del('您真的要删除该广告位么，删除广告位将删除广告位下的广告？', '<?php echo $adDel; ?>', 'id=<?php echo $value['id']; ?>&init_token=<?php echo $init_token; ?>');">[删除]</a></td>
    </tr>
    <?php } ?>
	<?php if ($adPositionCount == 0) { ?>
	<tr>
	<td colspan="6">暂时没有任何数据！</td>
	</tr>
	<?php } ?>
  </table>
  <div class="page">
    <?php echo InitPHP::output($page, 'decode'); ?>
  </div>
</div>
