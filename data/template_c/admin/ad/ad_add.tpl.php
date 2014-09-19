<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2014-09-19 00:31:45, compiled from E:\www\dake/web/template/admin/ad/ad_add.htm */ ?>

<div class="content_tab">
  <ul>
    <li   name="<?php echo $adRun; ?>">广告位列表</li>
	<li class="checked" name="<?php echo $adAdd; ?>">新增广告位</li>
  </ul>
</div>
<div class="content">
  <h1>添加广告</h1>
  <form name="addAdPosition" enctype="multipart/form-data" method="post" id="addAdPosition" action="<?php echo $adAdddo; ?>">
  <input name="init_token" type="hidden"  value="<?php echo $init_token; ?>" >
    <table>
      <tr>
        <th width="200">广告位名称</th>
        <td class="top_broder"><input name="name" value="" maxlength="20" class="input"  />
          <span></span> </td>
      </tr>
      <tr>
        <th width="200">广告位标识</th>
        <td class="top_broder"><input name="tag" value="" maxlength="20" class="input"  />
          <span>英文字母和_</span> </td>
      </tr>
      <tr>
        <th width="200">广告位描述</th>
        <td><textarea name="descrip" class="textarea"></textarea></td>
      </tr>
      <tr>
        <th width="200"></th>
        <td><input  value="提交" type="submit" class="btn2" /></td>
      </tr>
    </table>
  </form>
</div>
<script type="text/javascript">
$(document).ready(function() {
	submitForm('addAdPosition', '<?php echo $adRun; ?>');
});
</script>
