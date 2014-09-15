<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2014-09-15 08:24:03, compiled from E:\www\dake/web/template/admin/single/single_edit.htm */ ?>
<div class="content_tab">
  <ul>
    <li class="checked"  name="<?php echo $singleRun; ?>">单页模块列表</li>
	<li  name="<?php echo $singleAdd; ?>">新增单页模块</li>
  </ul>
</div>
<div class="content">
  <h1>编辑单页模块</h1>
  <form name="editModule" method="post" id="editModule" action="<?php echo $singleEditdo; ?>">
  <input name="init_token" type="hidden"  value="<?php echo $init_token; ?>" >
   <input name="id" type="hidden" value="<?php echo $moduleInfo['id']; ?>">
    <table>
      <tr>
        <th width="200">单页模块名称</th>
        <td class="top_broder"><input name="name" value="<?php echo $moduleInfo['name']; ?>" maxlength="20" class="input"  />
          <span></span> </td>
      </tr>
      <tr>
        <th width="200">单页模块标识</th>
        <td class="top_broder"><input name="tag" value="<?php echo $moduleInfo['tag']; ?>" maxlength="20" class="input"  />
          <span>英文字母和_</span> </td>
      </tr>
      <tr>
        <th width="200">单页模块描述</th>
        <td><textarea name="descrip" class="textarea"><?php echo $moduleInfo['descrip']; ?></textarea></td>
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
	submitForm('editModule', '<?php echo $singleRun; ?>');
});
</script>
