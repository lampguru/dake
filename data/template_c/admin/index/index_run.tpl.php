<?php  if (!defined("IS_INITPHP")) exit("Access Denied!");  /* INITPHP Version 1.0 ,Create on 2014-09-19 05:05:49, compiled from E:\www\dake/web/template/admin/index/index_run.htm */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php if (STATIC_PATH != '') { ?>
<base href="<?php echo STATIC_PATH ?>" />
<?php } ?>
<link href="static/css/admin/comm.css" rel="stylesheet" type="text/css">
<link href="static/css/admin/index.css" rel="stylesheet" type="text/css">
<script src="static/js/common/jquery.js" type="text/javascript"></script>
<title>静态模板页面</title>
</head>
<body>
<div class="warp">
  <div class="header">
    <div class="logo">大可管理后台</div>
    <div class="banner">
      <ul id="nav">
        <?php foreach($navConfig['nav'] as $key => $val) {  ?>
        <li title="initapp_sidebar_<?php echo $key; ?>">
          <?php echo $val; ?>
        </li>
        <?php } ?>
      </ul>
    </div>
	 <div class="head_right">当前用户：<?php echo $userInfo['username']; ?>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="<?php echo $indexLoginout; ?>">[注销]</a></div>
  </div>
  <div class="main">
    <div class="left">
      <?php foreach($navConfig['sidebar'] as $k => $v) {  ?>
      <div id="initapp_sidebar_<?php echo $k; ?>" class="hidden sidebar">
        <?php foreach ($v as $kk => $vv) {  ?>
        <div class="title" title="initapp_option_<?php echo $kk; ?>">
          <?php echo $vv['title']; ?>
        </div>
        <ul class="hidden sidebar_list" id="initapp_option_<?php echo $kk; ?>">
          <?php foreach ($vv['option'] as $kkk => $vvv) { 
		  	if ($vvv[3] == 0) continue;
		   ?>
		  
          <li onclick="javascript:content_iframe.location.href='<?php echo ADMIN_FILE ?>?c=<?php echo $vvv[1]; ?>&a=<?php echo $vvv[2]; ?>'">
        <?php echo $vvv[0]; ?>
          </li>
		  
          <?php } ?>
        </ul>
        <?php } ?>
      </div>
      <?php } ?>
    </div>
    <div class="right">
	<iframe name="content_iframe" src="<?php echo $indexDefault; ?>" style="border:0px; width:100%; height:600px;" frameborder="no" border="0" marginwidth="0" marginheight="0"  allowtransparency="yes"></iframe>
    </div>
  </div>
  <div class="footer">
    <div class="info">Prowerd By Initphp,Dake,Zhu</div>
  </div>
</div>
<script src="static/js/admin/sidebar.js" type="text/javascript"></script>
</body>
</html>
