<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2012-03-09 14:39:07, compiled from /var/www/initapp/web/template/admin/user/group_add.htm */ ?>
<div class="content_tab">
  <ul>
    <li name="<?php echo $groupRun; ?>">用户组列表</li>
    <li class="checked"  name="<?php echo $groupAdd; ?>">新增用户组</li>
  </ul>
</div>
<div class="content">
  <h1>添加用户组</h1>
  <form name="addGroup" method="post" id="addGroup" action="<?php echo $groupAdddo; ?>">
    <input name="init_token" type="hidden"  value="<?php echo $init_token; ?>" >
    <table>
      <tr>
        <th width="200">用户组名称</th>
        <td class="top_broder"><input name="name" value="" maxlength="20" class="input"  />
          <span>用户名长度5-20个字符之间</span> </td>
      </tr>
      <tr>
        <h1></h1>
        <th width="200">用户组描述</th>
        <td><textarea name="descrip" class="textarea"></textarea></td>
      </tr>
      <tr>
        <th width="200">用户组权限</th>
        <td><?php foreach($navConfigList['nav'] as $key => $value) {  ?>
          <div style=" width:660px; padding:10px 0;">
          <div style="width:60px; float:left;">
            <label>
            <input name="<?php echo $key; ?>" type="checkbox" class="checked_all">
            <b>
            <?php echo $value; ?>
            </b></label>
          </div>
          <div style=" width:580px; float:left; margin-bottom:20px;">
            <?php foreach($navConfigList['sidebar'][$key] as $k => $v) {  ?>
            <div style="width:100%;">
              <div style="width:100px; float:left; font-weight:bold;">
                <input name="<?php echo $k; ?>" type="checkbox" class="checked_self checked_<?php echo $key; ?>">
                <?php echo $v[title]; ?>
              </div>
              <div style="width:480px; float:left;">
                <?php foreach($navConfigList['sidebar'][$key][$k]['option'] as $val) {  ?>
                <label style="width:160px; float:left;">
                <input name="rvalue[]" type="checkbox" value="<?php echo $key . '_' . $k . '_' . $val[1] . '_' . $val[2]; ?>" class="checked_<?php echo $key; ?> checked_self_<?php echo $k; ?>">
                <?php if ($val[3] == 0) { ?>
                <span style="color:#666666;">
                <?php }else{ ?>
                <span style="color:#FF6600">
                <?php } ?>
                <?php echo $val[0]; ?>
                </span> </label>
                <?php  }  ?>
              </div>
            </div>
            <?php  }  ?>
          </div>
          <?php  }  ?>
        </td>
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
	submitForm('addGroup', '<?php echo $groupRun; ?>');
	$(".checked_all").bind("click", function () {
		var val = $(this).attr('name');
		if ($(this).attr('checked') == true) {
			var is_checked = 1;
		} else {
			var is_checked = 0;
		}
		$(".checked_" + val).each(
			function (i) {
				if (is_checked == 1) {
					$(".checked_" + val).eq(i).attr("checked","checked");
				} else {
					$(".checked_" + val).eq(i).attr("checked","");
				}
			}
		);
	});
	$(".checked_self").bind("click", function () {
		var val = $(this).attr('name');
		if ($(this).attr('checked') == true) {
			var is_checked = 1;
		} else {
			var is_checked = 0;
		}
		
		$(".checked_self_" + val).each(
			function (i) {
				if (is_checked == 1) {
					$(".checked_self_" + val).eq(i).attr("checked","checked");
				} else {
					$(".checked_self_" + val).eq(i).attr("checked","");
				}
			}
		);
	});
});
</script>
