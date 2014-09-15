<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2014-09-15 08:18:23, compiled from E:\www\dake/web/template/admin/ad/ad_adlist.htm */ ?>
<div class="content_tab">
  <ul>
    <li class="checked"  name="<?php echo $adAdlist; ?>">广告列表</li>
    <li   name="<?php echo $adAdadd; ?>">新增广告</li>
  </ul>
</div>
<div class="content">
  <h1>广告列表</h1>
  <table>
    <tr>
      <th width="40">ID</th>
	  <th width="40">排序</th>
      <th width="80">广告名称</th>
	  <th width="80">广告位</th>
	  <th width="80">广告类型</th>
	  <th width="80">广告状态</th>
      <th width="140">开始时间</th>
      <th width="140">结束时间</th>
      <th width="140">创建时间</th>
      <th>操作</th>
    </tr>
    <?php foreach ($adList as $value) { ?>
    <tr>
      <td><?php echo $value['id']; ?></td>
	   <td><?php echo $value['sort']; ?></td>
      <td><?php echo $value['name']; ?></td>
	  <td><?php echo $adPositionList[$value['posid']]['name']; ?></td>
	  <td><?php if ($value['type'] == 0) {  ?>
       	图片广告
        <?php } else {  ?>
        文字广告
        <?php }  ?>
      </td>
	  <td><?php if ($value['status'] == 1) {  ?>
        <div class="s1">开启</div>
        <?php } else {  ?>
        <div class="s2">关闭</div>
        <?php }  ?>
      </td>
      <td><?php echo date('Y-m-d H:i:s', $value['start_time']); ?></td>
      <td><?php echo date('Y-m-d H:i:s', $value['end_time']); ?></td>
      <td><?php echo date('Y-m-d H:i:s', $value['create_time']); ?></td>
      <td><a href="<?php echo $adAdedit; ?>&id=<?php echo $value['id']; ?>">[编辑]</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:del('确定要删除该广告？', '<?php echo $adAddel; ?>', 'id=<?php echo $value['id']; ?>&init_token=<?php echo $init_token; ?>');">[删除]</a></td>
    </tr>
    <?php } ?>
    <?php if ($adCount == 0) { ?>
    <tr>
      <td colspan="6">暂时没有任何数据！</td>
    </tr>
    <?php } ?>
  </table>
  <div class="page">
    <?php echo InitPHP::output($page, 'decode'); ?>
  </div>
</div>
