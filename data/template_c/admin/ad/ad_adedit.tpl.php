<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2012-03-06 19:29:11, compiled from ../initapp/web/template/admin/ad/ad_adedit.htm */ ?>
<div class="content_tab">
  <ul>
    <li  name="<?php echo $adAdlist; ?>">广告列表</li>
    <li class="checked"   name="<?php echo $adAdadd; ?>">新增广告</li>
  </ul>
</div>
<div class="content">
  <h1>编辑广告</h1>
  <form name="addAd" enctype="multipart/form-data" method="post" id="addAd" action="<?php echo $adAdeditdo; ?>">
    <input name="init_token" type="hidden"  value="<?php echo $init_token; ?>" >
	 <input name="id" type="hidden"  value="<?php echo $adInfo['id']; ?>" >
    <table>
      <tr>
        <th width="200">广告名称</th>
        <td class="top_broder"><input name="name"  class="input" value="<?php echo $adInfo['name']; ?>" maxlength="20" class="input"  />
          <span></span> </td>
      </tr>
      <tr>
        <th width="200">广告描述</th>
        <td><textarea name="descrip" class="textarea"><?php echo $adInfo['descrip']; ?></textarea></td>
      </tr>
      <tr>
        <th width="200">广告类型</th>
        <td class="top_broder">
		
		<select name="type" id="adtype">
            <option value="0" <?php if ($adInfo['type'] == 0) {  ?>selected="selected"<?php } ?> >图片广告</option>
            <option value="1" <?php if ($adInfo['type'] == 1) {  ?>selected="selected"<?php } ?>>文字广告</option>
          </select>
          <span></span> </td>
      </tr>
      <tr>
        <th width="200">广告位置</th>
        <td class="top_broder"><select name="posid" >
            <?php foreach ($adPositionList as $key => $val) { ?>
            <option value="<?php echo $val[id]; ?>" <?php if ($adInfo['posid'] == $val[id]) { ?>selected="selected"<?php } ?>>
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
          <input name="start_time" class="Wdate input" type="input" value="<?php echo $adInfo['start_time']; ?>" />
          &nbsp;&nbsp;--&nbsp;&nbsp; 结束时间：
          <input name="end_time" class="Wdate input" type="input" value="<?php echo $adInfo['end_time']; ?>" />
		 </td>
      </tr>
      <tr>
        <th width="200">广告内容</th>
        <td><div id="ad_img" <?php if ($adInfo['type'] == 1) { ?>style="display:none;"<?php } ?>>
			<?php if ($adInfo['type'] == 0) { ?>
			<img src="<?php echo $adInfo['img']; ?>"  width="100" height="100"/> &nbsp;&nbsp;&nbsp;&nbsp;
			<?php } ?>
            <input name="img" type="file">&nbsp;&nbsp;&nbsp;&nbsp;图片宽度： <input class="input wh50" name="img_width" type="text" value="100" maxlength="5" />&nbsp;&nbsp;&nbsp;&nbsp;图片高度： <input class="input wh50" maxlength="5" name="img_height" type="text" value="100" />&nbsp;&nbsp;&nbsp;&nbsp;
          </div>
          <div id="ad_str" <?php if ($adInfo['type'] == 0) { ?>style="display:none;"<?php } ?>>链接：
            <input class="input" name="link" type="text" value="<?php echo $adInfo['link']; ?>" />
            &nbsp;&nbsp;&nbsp;&nbsp;
            文字：
            <input name="str" type="text" class="input" value="<?php echo $adInfo['str']; ?>"/>
          </div></td>
      </tr>
      <tr>
        <th width="200">广告状态</th>
        <td>开启：
          <input name="status"  type="radio" value="1" <?php if ($adInfo['status'] == 1) { ?>checked="checked"<?php } ?> />
          &nbsp;&nbsp;&nbsp;&nbsp; 关闭：
          <input name="status" type="radio" value="0" <?php if ($adInfo['status'] == 0) { ?>checked="checked"<?php } ?> />
        </td>
      </tr>
	    <tr>
        <th width="200">广告排序</th>
        <td> <input class="input wh50" maxlength="5" name="sort" type="text" value="<?php echo $adInfo['sort']; ?>" /><span>数值越大越靠前</span>
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
