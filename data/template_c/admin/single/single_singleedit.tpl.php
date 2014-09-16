<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2014-09-16 01:26:25, compiled from E:\www\dake/web/template/admin/single/single_singleedit.htm */ ?>
<div class="content_tab">
  <ul>
    <li  name="<?php echo $singleSingle; ?>">单页列表</li>
    <li class="checked"   name="<?php echo $singleSingleAdd; ?>">新增单页</li>
  </ul>
</div>
<div class="content">
  <h1>编辑单页</h1>
  <form name="edit" enctype="multipart/form-data" method="post" id="edit" action="<?php echo $singleSingleEditdo; ?>">
    <input name="init_token" type="hidden"  value="<?php echo $init_token; ?>" >
	 <input name="id" type="hidden"  value="<?php echo $singleInfo['id']; ?>" >
    <table>
      <tr>
        <th width="200">单页名称</th>
        <td class="top_broder"><input name="name"  class="input" value="<?php echo $singleInfo['name']; ?>" maxlength="20" class="input"  />
          <span></span> </td>
      </tr>
      <tr>
        <th width="200">单页描述</th>
        <td><textarea name="descrip" class="textarea"><?php echo $singleInfo['descrip']; ?></textarea></td>
      </tr>
      <tr>
        <th width="200">单页模块</th>
        <td class="top_broder"><select name="posid" >
            <?php foreach ($moduleList as $key => $val) { ?>
            <option value="<?php echo $val[id]; ?>" <?php if ($singleInfo['posid'] == $val[id]) { ?>selected="selected"<?php } ?>>
            <?php echo $val[name]; ?>
            </option>
            <?php } ?>
          </select>
          <span></span> </td>
      </tr>
      <tr>
        <th width="200">单页内容</th>
        <td><div id="ad_img" <?php if ($singleInfo['type'] == 1) { ?>style="display:none;"<?php } ?>>
			<?php if ($singleInfo['type'] == 0) { ?>
			<img src="<?php echo $singleInfo['img']; ?>"  width="100" height="100"/> &nbsp;&nbsp;&nbsp;&nbsp;
			<?php } ?>
            <input name="img" type="file">&nbsp;&nbsp;&nbsp;&nbsp;图片宽度： <input class="input wh50" name="img_width" type="text" value="100" maxlength="5" />&nbsp;&nbsp;&nbsp;&nbsp;图片高度： <input class="input wh50" maxlength="5" name="img_height" type="text" value="100" />&nbsp;&nbsp;&nbsp;&nbsp;
          </div>
          <div id="ad_str" <?php if ($singleInfo['type'] == 0) { ?>style="display:none;"<?php } ?>>链接：
            <input class="input" name="link" type="text" value="<?php echo $singleInfo['link']; ?>" />
            &nbsp;&nbsp;&nbsp;&nbsp;
            文字：
            <input name="str" type="text" class="input" value="<?php echo $singleInfo['str']; ?>"/>
          </div></td>
      </tr>
      <tr>
        <th width="200">单页状态</th>
        <td>开启：
          <input name="status"  type="radio" value="1" <?php if ($singleInfo['status'] == 1) { ?>checked="checked"<?php } ?> />
          &nbsp;&nbsp;&nbsp;&nbsp; 关闭：
          <input name="status" type="radio" value="0" <?php if ($singleInfo['status'] == 0) { ?>checked="checked"<?php } ?> />
        </td>
      </tr>
	    <tr>
        <th width="200">单页排序</th>
        <td> <input class="input wh50" maxlength="5" name="sort" type="text" value="<?php echo $singleInfo['sort']; ?>" /><span>数值越大越靠前</span>
        </td>
      </tr>
      <tr>
        <th width="200"></th>
        <td><input  value="提交" type="submit" class="btn2" /></td>
      </tr>
    </table>
  </form>
</div>
<script type="text/javascript">
var singleContent = function () {
	var val = $("#adtype").val();
	if (val == 0) {
		$("#ad_str").hide();
		$("#ad_img").show();
	} else {
		$("#ad_str").show();
		$("#ad_img").hide();
	}
}
$(document).ready(function() {
	submitForm('edit', '<?php echo $singleSingle; ?>');
	$("#adtype").bind("click", singleContent); 
});
</script>
