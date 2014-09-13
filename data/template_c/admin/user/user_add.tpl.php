<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2012-03-11 13:40:00, compiled from /var/www/initapp/web/template/admin/user/user_add.htm */ ?>
<div class="content_tab">
<ul>
<li name="<?php echo $userRun; ?>">管理员列表</li>
<li class="checked" name="<?php echo $userAdd; ?>">新增管理员</li>
</ul>
</div>
<div class="content">
  <h1>添加管理员</h1>
  <form name="addUser" method="post" id="addUser" action="<?php echo $userAdddo; ?>">
  <input name="init_token" type="hidden"  value="<?php echo $init_token; ?>" >
    <table>
      <tr>
        <th width="200">用户名</th>
        <td class="top_broder"><input name="username" value="" maxlength="20" class="input"  />
		<span>用户名长度5-20个字符之间</span>
		</td>
      </tr>
      <tr>
        <th width="200">用户密码</th>
        <td><input name="password" type="password" value=""  maxlength="20" class="input" />
		<span>用户密码长度6-20个字符之间</span>
		</td>
      </tr>
      <tr>
        <th width="200">重复密码</th>
        <td><input name="r_password" type="password" value=""  maxlength="20" class="input" /></td>
      </tr>
	   <tr>
        <th width="200">电子邮箱</th>
        <td class="top_broder"><input name="email" value=""  maxlength="60" class="input"  />
		<span>电子邮箱必填</span>
		</td>
      </tr>
	  	   <tr>
        <th width="200">用户组</th>
        <td class="top_broder">
		<select name="groupid">
		<?php foreach ($groupList as $key => $value) {  ?>
		<option value="<?php echo $value['groupid']; ?>"><?php echo $value['name']; ?></option>
		<?php } ?>
		</select>
		</td>
      </tr>
      <tr>
        <th width="200"></th>
        <td>
		<input value="提交" type="submit" class="btn2" />
		</td>
      </tr>
    </table>
  </form>
</div>
<script type="text/javascript">
$(document).ready(function() {
	submitForm('addUser', '<?php echo $userRun; ?>');
});
</script>
