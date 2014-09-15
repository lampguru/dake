<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2014-09-15 07:10:10, compiled from E:\www\dake/web/template/admin/user/user_run.htm */ ?>
<div class="content_tab">
  <ul>
    <li class="checked"  name="<?php echo $userRun; ?>">管理员列表</li>
    <li  name="<?php echo $userAdd; ?>">新增管理员</li>
  </ul>
</div>
<div class="content">
  <h1>管理员列表</h1>
  <table>
    <tr>
      <th width="60">UID</th>
      <th width="80">用户名</th>
      <th width="160">Email</th>
      <th width="100">用户组</th>
      <th width="140">创建时间</th>
      <th width="140">最后登录</th>
      <th>操作</th>
    </tr>
    <?php foreach ($userList as $value) { ?>
    <tr>
      <td><?php echo $value['uid']; ?></td>
      <td><?php echo $value['username']; ?></td>
      <td><?php echo $value['email']; ?></td>
      <td><?php echo $groupList[$value['groupid']]['name'] ?></td>
      <td><?php echo date('Y-m-d H:i:s', $value['create_time']); ?></td>
      <td><?php echo date('Y-m-d H:i:s', $value['last_time']); ?></td>
      <td><a href="<?php echo $userEdit; ?>&uid=<?php echo $value['uid']; ?>">[编辑]</a>&nbsp;&nbsp;&nbsp;&nbsp;
        <?php if ($value['uid'] != 1) { ?>
        <a href="javascript:del('您真的要删除该用户？', '<?php echo $userDel; ?>', 'uid=<?php echo $value['uid']; ?>&init_token=<?php echo $init_token; ?>');">[删除]</a>
        <?php } ?></td>
    </tr>
    <?php } ?>
    <?php if ($userCount == 0) { ?>
    <tr>
      <td colspan="7">暂时没有任何数据！</td>
    </tr>
    <?php } ?>
  </table>
  <div class="page">
    <?php echo InitPHP::output($page, 'decode'); ?>
  </div>
</div>
