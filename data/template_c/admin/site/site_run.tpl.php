<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2014-09-15 08:05:43, compiled from E:\www\dake/web/template/admin/site/site_run.htm */ ?>
<div class="content_tab">
  <ul>
    <li class="checked"  name="<?php echo $siteRun; ?>">网站基本设置</li>
  </ul>
</div>
<div class="content">
  <h1>网站基本设置</h1>
  <form name="editSite" method="post" id="editSite" action="<?php echo $siteEditdo; ?>">
  <input name="init_token" type="hidden"  value="<?php echo $init_token; ?>" >
    <table>
      <tr>
        <th width="200">网站标题</th>
        <td class="top_broder"><input name="site[title]" value="<?php echo $siteInfo['title']; ?>" maxlength="100" class="input wh300"  />
          <span>网站标题，显示在浏览器上</span> </td>
      </tr>
      <tr>
        <th width="200">网站URL</th>
        <td class="top_broder"><input name="site[url]" value="<?php echo $siteInfo['url']; ?>" maxlength="100" class="input wh300"  />
          <span></span> </td>
      </tr>
      <tr>
        <th width="200">网站关键词</th>
        <td class="top_broder"><input name="site[keywords]" value="<?php echo $siteInfo['keywords']; ?>" maxlength="100" class="input wh300"  />
          <span>网站关键词 (keywords)，用户网站SEO优化</span> </td>
      </tr>
      <tr>
        <th width="200">网站描述</th>
        <td class="top_broder"><textarea class="textarea wh300" name="site[description]" ><?php echo $siteInfo['description']; ?>
</textarea>
          <span>网站描述 (description)，用户网站SEO优化</span> </td>
      </tr>
      <tr>
        <th width="200">网站备案号</th>
        <td class="top_broder"><input name="site[beian]" value="<?php echo $siteInfo['beian']; ?>" maxlength="100" class="input wh300"  />
          <span></span> </td>
      </tr>
	  <tr>
        <th width="200">网站版权信息</th>
        <td class="top_broder"><input name="site[version]" value="<?php echo $siteInfo['version']; ?>" maxlength="100" class="input wh300"  />
          <span></span> </td>
      </tr>
      <tr>
        <th width="200">联系人</th>
        <td class="top_broder"><input name="site[holder]" value="<?php echo $siteInfo['holder']; ?>" maxlength="100" class="input wh300"  />
          <span></span> </td>
      </tr>
      <tr>
        <th width="200">联系电话</th>
        <td class="top_broder"><input name="site[tel]" value="<?php echo $siteInfo['tel']; ?>" maxlength="100" class="input wh300"  />
          <span></span> </td>
      </tr>
      <tr>
        <th width="200">联系地址</th>
        <td class="top_broder"><input name="site[address]" value="<?php echo $siteInfo['address']; ?>" maxlength="100" class="input wh300"  />
          <span></span> </td>
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
