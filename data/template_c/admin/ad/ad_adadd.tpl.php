<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2012-03-06 16:56:31, compiled from /var/www/initapp/web/template/admin/ad/ad_adadd.htm */ ?>
<div class="content_tab">
  <ul>
    <li  name="<?php echo $adAdlist; ?>">广告列表</li>
    <li class="checked"   name="<?php echo $adAdadd; ?>">新增广告</li>
  </ul>
</div>
<div class="content">
  <h1>添加广告</h1>
  <form name="addAd" enctype="multipart/form-data" method="post" id="addAd" action="<?php echo $adAdadddo; ?>">
    <input name="init_token" type="hidden"  value="<?php echo $init_token; ?>" >
    <table>
      <tr>
        <th width="200">广告名称</th>
        <td class="top_broder"><input name="name"  class="input" maxlength="20" class="input"  />
          <span></span> </td>
      </tr>
      <tr>
        <th width="200">广告描述</th>
        <td><textarea name="descrip" class="textarea"></textarea></td>
      </tr>
      <tr>
        <th width="200">广告类型</th>
        <td class="top_broder"><select name="type" id="adtype">
            <option value="0">图片广告</option>
            <option value="1">文字广告</option>
          </select>
          <span></span> </td>
      </tr>
      <tr>
        <th width="200">广告位置</th>
        <td class="top_broder"><select name="posid" >
            <?php foreach ($adPositionList as $key => $val) { ?>
            <option value="<?php echo $val[id]; ?>">
            <?php echo $val[name]; ?>
            </option>
            <?php } ?>
          </select>
          <span></span> </td>
      </tr>
      <tr>
        <th width="200">时间</th>
        <td class="top_broder">
		开始时间：
          <input name="start_time" class="Wdate input" type="input" />
          &nbsp;&nbsp;--&nbsp;&nbsp; 结束时间：
          <input name="end_time" class="Wdate input" type="input" />
		 </td>
      </tr>
      <tr>
        <th width="200">广告内容</th>
        <td><div id="ad_img">
            <input name="img" type="file">&nbsp;&nbsp;&nbsp;&nbsp;图片宽度： <input class="input wh50" name="img_width" type="text" value="100" maxlength="5" />&nbsp;&nbsp;&nbsp;&nbsp;图片高度： <input class="input wh50" maxlength="5" name="img_height" type="text" value="100" />&nbsp;&nbsp;&nbsp;&nbsp;
          </div>
          <div id="ad_str" style="display:none;">链接：
            <input class="input" name="link" type="text" value="http://" />
            &nbsp;&nbsp;&nbsp;&nbsp;
            文字：
            <input name="str" type="text" class="input"/>
          </div></td>
      </tr>
      <tr>
        <th width="200">广告状态</th>
        <td>开启：
          <input name="status" checked="checked" type="radio" value="1" />
          &nbsp;&nbsp;&nbsp;&nbsp; 关闭：
          <input name="status" type="radio" value="0" />
        </td>
      </tr>
	  <tr>
        <th width="200">广告排序</th>
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
var adContent = function () {
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
	submitForm('addAd', '<?php echo $adAdlist; ?>');
	$("#adtype").bind("click", adContent); 
});
</script>
