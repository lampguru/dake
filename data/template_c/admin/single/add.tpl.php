<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2014-09-16 15:17:33, compiled from E:\VertrigoServ\www\dake/web/template/admin/single/add.htm */ ?>
<div class="content_tab">
  <ul>
    <li  name="<?php echo $singleRun; ?>">单页管理</li>
    <li class="checked"   name="<?php echo $singleAdd; ?>">新增单页</li>
  </ul>
</div>
<div class="content">
  <h1>新增单页</h1>
  <form name="addSingle" enctype="multipart/form-data" method="post" id="addSingle" action="<?php echo $singleAddDo; ?>">
    <input name="init_token" type="hidden"  value="<?php echo $init_token; ?>" >
    <table>
      <tr>
        <th width="200">单页名称</th>
        <td class="top_broder"><input name="name"  class="input" maxlength="20" class="input"  />
          <span></span> </td>
      </tr>
      <tr>
        <th width="200">单页描述</th>
        <td><textarea name="descrip" class="textarea"></textarea></td>
      </tr>
      <tr>
        <th width="200">单页类型</th>
        <td class="top_broder"><select name="type" id="adtype">
            <option value="0">图片单页</option>
            <option value="1">文字单页</option>
          </select>
          <span></span> </td>
      </tr>
      <tr>
        <th width="200">单页内容</th>
        <td>
          <div id="ad_img">
            <input name="img" type="file">&nbsp;&nbsp;&nbsp;&nbsp;图片宽度： <input class="input wh50" name="img_width" type="text" value="100" maxlength="5" />&nbsp;&nbsp;&nbsp;&nbsp;图片高度： <input class="input wh50" maxlength="5" name="img_height" type="text" value="100" />&nbsp;&nbsp;&nbsp;&nbsp;
          </div>
          <div id="ad_str" style="display:none;">
            <textarea name="str" style="width:700px;height:200px;visibility:hidden;"></textarea>
          </div>
        </td>
      </tr>
      <tr>
        <th width="200">单页状态</th>
        <td>开启：
          <input name="status" checked="checked" type="radio" value="1" />
          &nbsp;&nbsp;&nbsp;&nbsp; 关闭：
          <input name="status" type="radio" value="0" />
        </td>
      </tr>
	  <tr>
        <th width="200">单页排序</th>
        <td> <input class="input wh50" maxlength="5" name="sort" type="text" value="0" /><span>数值越大越靠前</span>
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
KindEditor.ready(function(K) {
	var editor1 = K.create('textarea[name="str"]', {
		cssPath : 'static/js/common/kindeditor/plugins/code/prettify.css',
		uploadJson : 'static/js/common/kindeditor/php/upload_json.php',
		fileManagerJson : 'static/js/common/kindeditor/php/file_manager_json.php',
		allowFileManager : true,
		items : [
			'source', '|', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
			'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
			'insertunorderedlist', '|', 'emoticons', 'image', 'link']

	});
	prettyPrint();
});
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
	submitForm('addSingle', '<?php echo $singleRun; ?>');
	$("#adtype").bind("click", singleContent); 
});
</script>
