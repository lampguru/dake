<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2014-09-16 01:27:26, compiled from E:\www\dake/web/template/admin/single/single_add.htm */ ?>

<div class="content_tab">
  <ul>
    <li   name="<?php echo $singleRun; ?>">单页模块列表</li>
	<li class="checked" name="<?php echo $singleAdd; ?>">新增单页模块</li>
  </ul>
</div>
<div class="content">
  <h1>新增单页模块</h1>
  <form name="addModule" enctype="multipart/form-data" method="post" id="addModule" action="<?php echo $singleAdddo; ?>">
  <input name="init_token" type="hidden"  value="<?php echo $init_token; ?>" >
    <table>
      <tr>
        <th width="200">单页模块名称</th>
        <td class="top_broder"><input name="name" value="" maxlength="20" class="input"  />
          <span></span> </td>
      </tr>
      <tr>
        <th width="200">单页模块标识</th>
        <td class="top_broder"><input name="tag" value="" maxlength="20" class="input"  />
          <span>英文字母和_</span> </td>
      </tr>
      <tr>
        <th width="200">单页模块描述</th>
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
	submitForm('addModule', '<?php echo $singleRun; ?>');
});
</script>
