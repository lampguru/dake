<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2012-03-06 18:36:03, compiled from ../initapp/web/template/admin/ad/ad_edit.htm */ ?>
<div class="content_tab">
  <ul>
    <li class="checked"  name="<?php echo $adRun; ?>">广告位列表</li>
	<li  name="<?php echo $adAdd; ?>">新增广告位</li>
  </ul>
</div>
<div class="content">
  <h1>编辑广告位</h1>
  <form name="editAdPosition" method="post" id="editAdPosition" action="<?php echo $adEditdo; ?>">
  <input name="init_token" type="hidden"  value="<?php echo $init_token; ?>" >
   <input name="id" type="hidden" value="<?php echo $adPositionInfo['id']; ?>">
    <table>
      <tr>
        <th width="200">广告位名称</th>
        <td class="top_broder"><input name="name" value="<?php echo $adPositionInfo['name']; ?>" maxlength="20" class="input"  />
          <span></span> </td>
      </tr>
      <tr>
        <th width="200">广告位标识</th>
        <td class="top_broder"><input name="tag" value="<?php echo $adPositionInfo['tag']; ?>" maxlength="20" class="input"  />
          <span>英文字母和_</span> </td>
      </tr>
      <tr>
        <th width="200">广告位描述</th>
        <td><textarea name="descrip" class="textarea"><?php echo $adPositionInfo['descrip']; ?></textarea></td>
      </tr>
      <tr>
        <th width="200"></th>
        <td><input value="提交" type="submit" class="btn2" /></td>
      </tr>
    </table>
  </form>
</div>
<script type="text/javascript">
$(document).ready(function() {
	submitForm('editAdPosition', '<?php echo $adRun; ?>');
});
</script>
