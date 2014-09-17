<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2014-09-16 16:06:25, compiled from E:\VertrigoServ\www\dake/web/template/admin/single/run.htm */ ?>
<div class="content_tab">
  <ul>
    <li class="checked"  name="<?php echo $singleRun; ?>">单页管理</li>
    <li   name="<?php echo $singleAdd; ?>">新增单页</li>
  </ul>
</div>
<div class="content">
  <h1>单页列表</h1>
  <table>
    <tr>
      <th width="40">ID</th>
	  <th width="40">排序</th>
      <th width="80">单页名称</th>
	  <th width="80">单页类型</th>
	  <th width="80">单页状态</th>
      <th width="140">创建时间</th>
      <th>操作</th>
    </tr>
    <?php foreach ($singleList as $value) { ?>
    <tr>
      <td><?php echo $value['id']; ?></td>
	   <td><?php echo $value['sort']; ?></td>
      <td><?php echo $value['name']; ?></td>
	  <td><?php if ($value['type'] == 0) {  ?>
       	图片单页
        <?php } else {  ?>
        文字单页
        <?php }  ?>
      </td>
	  <td><?php if ($value['status'] == 1) {  ?>
        <div class="s1">开启</div>
        <?php } else {  ?>
        <div class="s2">关闭</div>
        <?php }  ?>
      </td>
      <td><?php echo date('Y-m-d H:i:s', $value['create_time']); ?></td>
      <td><a href="<?php echo $singleEdit; ?>&id=<?php echo $value['id']; ?>">[编辑]</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:del('确定要删除该单页？', '<?php echo $singleDel; ?>', 'id=<?php echo $value['id']; ?>&init_token=<?php echo $init_token; ?>');">[删除]</a></td>
    </tr>
    <?php } ?>
    <?php if ($singleCount == 0) { ?>
    <tr>
      <td colspan="6">暂时没有任何数据！</td>
    </tr>
    <?php } ?>
  </table>
  <div class="page">
    <?php echo InitPHP::output($page, 'decode'); ?>
  </div>
</div>
