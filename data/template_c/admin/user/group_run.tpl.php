<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2014-09-16 15:25:41, compiled from E:\VertrigoServ\www\dake/web/template/admin/user/group_run.htm */ ?>
<div class="content_tab">
  <ul>
    <li class="checked" name="<?php echo $groupRun; ?>">用户组列表</li>
    <li name="<?php echo $groupAdd; ?>">新增用户组</li>
  </ul>
</div>
<div class="content">
  <h1>用户组列表</h1>
  <table>
    <tr>
      <th width="60">ID</th>
      <th width="80">用户组名称</th>
      <th width="200">描述</th>
      <th width="140">创建时间</th>
      <th>操作</th>
    </tr>
    <?php foreach ($groupList as $value) { ?>
    <tr>
      <td><?php echo $value['groupid']; ?></td>
      <td><?php echo $value['name']; ?></td>
      <td><?php echo $value['descrip']; ?></td>
      <td><?php echo date('Y-m-d H:i:s', $value['create_time']); ?></td>
      <td><a href="<?php echo $groupEdit; ?>&groupid=<?php echo $value['groupid']; ?>">[编辑]</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <?php if ($value['if_default'] == 0) { ?>
        <a href="javascript:del('您真的要删除该用户组？', '<?php echo $groupDel; ?>', 'groupid=<?php echo $value['groupid']; ?>&init_token=<?php echo $init_token; ?>');">[删除]</a>
        <?php  }  ?></td>
    </tr>
    <?php } ?>
    <?php if (count($groupList) == 0) { ?>
    <tr>
      <td colspan="6">暂时没有任何数据！</td>
    </tr>
    <?php } ?>
  </table>
</div>
