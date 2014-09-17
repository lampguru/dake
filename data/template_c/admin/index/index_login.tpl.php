<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2014-09-17 08:23:23, compiled from E:\www\dake/web/template/admin/index/index_login.htm */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php if (STATIC_PATH != '') { ?>
<base href="<?php echo STATIC_PATH ?>" />
<?php } ?>
<title>静态模板页面</title>
<style>
html{background: url("static/images/admin/bg.jpg") repeat scroll 0 0 transparent;}
</style>
</head>
<body style=" font-size:18px; font-family:Arial, Helvetica, sans-serif; ">
<div style="margin-top:10%; margin-left:37%; width:450px; height:250px; padding:15px; border:4px #990000 solid; background:url('static/images/admin/0300.jpg') repeat scroll 0 0 transparent;">
  <div style="width:100%; text-align:center; font-size:24px; font-weight:bold; height:30px; margin-bottom:30px;">大可万维</div>
  <form name="login" method="post" id="login" action="<?php echo $indexLogindo; ?>">
  <input name="initphp_token" type="hidden" value="<?php echo $init_token; ?>" >
    <div style=" height:90px;">
      <div style="margin-bottom:10px;height:40px;">
        <div style="float:left; width:80px; padding-top:10px; font-size:16px; font-weight:bold;">用户名：</div>
        <div style="float:left;">
          <input style="font-size:18px; width:250px; height:24px; padding:5px; border:#990000 2px solid; " class="input" name="username" type="text" maxlength="20" />
        </div>
      </div>
      <div style="height:40px;margin-bottom:10px;">
        <div style="float:left; width:80px; padding-top:10px;font-size:16px; font-weight:bold;">密&nbsp;&nbsp;码：</div>
        <div style="float:left;">
          <input style="font-size:18px; width:250px; height:24px; padding:5px; border:#990000 2px solid; " class="input" name="password" type="password" maxlength="20" />
        </div>
      </div>
      <div style="height:40px;margin-bottom:10px;">
        <div style="float:left; width:80px; padding-top:10px;font-size:16px; font-weight:bold;"></div>
        <div style="float:left; text-align:center;">
		  <input value="提交" type="submit" style="padding: 3px 4px 2px 4px;font-size:12px; width:80px; min-width:50px;height:23;background-color:#ece9d8;border-width:1; cursor:pointer;" />
        </div>
      </div>
	  <div id="msg" style="width:230px; display:none; padding:4px; color:#CC0000;  margin-bottom:10px; margin-left:30px; height:18px; border:#990000 1px solid; background-color:#FFF5D7; "><div style="width:40px; height:18px; float:left">&nbsp;&nbsp;&nbsp;<img src="static/images/admin/no.gif">&nbsp;&nbsp;&nbsp;</div><div id="msgs" style="float:left;"></div></div>
    </div>
  </form>
</div>
<script src="static/js/common/jquery.js" type="text/javascript"></script>
<script src="static/js/common/jquery.form.js" type="text/javascript"></script>
<script type="text/javascript">
var cg = function () {
	$(this).css('background-color', '#FFF4FA');
}
var cg2 = function () {
	$(this).css('background-color', '#FFFFFF');
}
var loginForm = function (id, url) {
	 $('#' + id).ajaxForm(function(result) {
			if (url == '') url = location.href;
	 		//result = eval('(' + result + ')');
            if (result.status == 0) {
				$("#msg").show();
				$("#msgs").html(result.message);
			} else {
				location.href = url;
			}
     });	
}
$(document).ready(function() {
	$(".input").bind("focus", cg); //侧导航选项绑定鼠标点击事件
	$(".input").bind("blur", cg2); //侧导航选项绑定鼠标点击事件
	loginForm('login', '<?php echo $indexRun; ?>');
});
</script>
</body>
</html>
