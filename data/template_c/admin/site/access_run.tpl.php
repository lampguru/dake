<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2012-03-07 09:36:29, compiled from /var/www/initapp/web/template/admin/site/access_run.htm */ ?>
<div class="content_tab">
  <ul>
    <li class="checked"  name="<?php echo $siteRun; ?>">访问权限控制</li>
  </ul>
</div>
<div class="content">
  <h1>访问权限控制</h1>
  <form name="editSite" method="post" id="editSite" action="<?php echo $siteEditdo; ?>">
  <input name="init_token" type="hidden"  value="<?php echo $init_token; ?>" >
    <table>
      <tr>
        <th width="200">后台允许访问IP列表</th>
        <td class="top_broder"><textarea class="textarea wh300 hg80" name="site[admin_allow]" ><?php echo $siteInfo['admin_allow']; ?>
</textarea>
          <span>使用逗号分隔</span> </td>
      </tr>
	        <tr>
        <th width="200">后台禁止访问IP列表</th>
        <td class="top_broder"><textarea class="textarea wh300 hg80" name="site[admin_ban]" ><?php echo $siteInfo['admin_ban']; ?>
</textarea>
          <span>使用逗号分隔</span> </td>
      </tr>
	        <tr>
        <th width="200">前台允许访问IP列表</th>
        <td class="top_broder"><textarea class="textarea wh300 hg80" name="site[front_allow]" ><?php echo $siteInfo['front_allow']; ?>
</textarea>
          <span>使用逗号分隔</span> </td>
      </tr>
	  	        <tr>
        <th width="200">前台禁止访问IP列表</th>
        <td class="top_broder"><textarea class="textarea wh300 hg80" name="site[front_ban]" ><?php echo $siteInfo['front_ban']; ?>
</textarea>
          <span>使用逗号分隔</span> </td>
      </tr>
      <tr>
        <th width="200"></th>
        <td><input value="提交" type="submit" class="btn2" style="margin-left:" /></td>
      </tr>
    </table>
  </form>
</div>
<script type="text/javascript">
$(document).ready(function() {
	submitForm('editSite', '<?php echo $siteRun; ?>');
});
</script>
