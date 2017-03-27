<?php include("Admin/inc/DBClass.php");?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="Admin/images/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>小二家水果铺</title>
<link rel="stylesheet" href="css/Popup.css" media="all">
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.min.js"></script>
<script src="js/Popupjquery.min.js"></script>
</head>
<body>
<div class="Container">
 <div class="Top"><?php include("Top.php");?></div>
 <div class="ConS_Main">
  <div class="ConS_Top">
   <div class="CST_Title">水果资讯</div>
   <div class="CST_Cont"><?php include("Notice.php");?></div>
  </div>
  <div class="ConS_Foot">
   <div class="CST_Title">最新活动</div>
   <div class="CSF_Cont"><?php include("Activity.php");?></div>
  </div>
 </div>
 <div class="Foot"><?php include("Foot.php");?></div>
</div>
</body>
</html>