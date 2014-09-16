<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2014-09-16 01:27:29, compiled from E:\www\dake/web/template/admin/single/single_run.htm */ ?>
<div class="content_tab">
  <ul>
    <li class="checked"  name="<?php echo $singleRun; ?>">单页模块列表</li>
	<li  name="<?php echo $singleAdd; ?>">新增单页模块</li>
  </ul>
 </div>
<div class="content">
  <h1>单页模块列表</h1>
  <table>
    <tr>
      <th width="60">ID</th>
      <th width="160">单页模块名称</th>
      <th width="100">唯一标识</th>
      <th width="200">描述</th>
      <th width="140">创建时间</th>
      <th>操作</th>
    </tr>
    <?php foreach ($moduleList as $value) { ?>
    <tr>
      <td><?php echo $value['id']; ?></td>
      <td><?php echo $value['name']; ?></td>
      <td><?php echo $value['tag']; ?></td>
      <td><?php echo $value['descrip']; ?></td>
      <td><?php echo date('Y-m-d H:i:s', $value['create_time']); ?></td>
      <td><a href="<?php echo $singleEdit; ?>&id=<?php echo $value['id']; ?>">[编辑]</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:del('删除单页模块将删除单页模块下的所有单页，您确定吗？', '<?php echo $singleDel; ?>', 'id=<?php echo $value['id']; ?>&init_token=<?php echo $init_token; ?>');">[删除]</a></td>
    </tr>
    <?php } ?>
	<?php if ($moduleCount == 0) { ?>
	<tr>
	<td colspan="6">暂时没有任何数据！</td>
	</tr>
	<?php } ?>
  </table>
  <div class="page">
    <?php echo InitPHP::output($page, 'decode'); ?>
  </div>
</div>
