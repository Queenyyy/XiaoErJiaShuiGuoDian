<?php include("Admin/inc/DBClass.php");?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="Admin/images/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>小二家水果铺</title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/Popup.css" media="all">
<script src="js/jquery.min.js"></script>
<script src="js/Popupjquery.min.js"></script>
</head>
<body>
<div class="Container">
 <div class="Top"><?php include("Top.php");?></div>
 <div class="Main">
 <? $sqlA=" select TOP 7  * from PhotoInfo where CategoryNo ='CN-3458'";
	  $resultA=$db->db_query($sqlA);
	  $total=mssql_num_rows($resultA);
	   if($total<0){
		echo "图片正在维护中....";
	   }
	   else{
		while($rs=mssql_fetch_array($resultA)){
   ?>
  <div class="StoMain">
   <div class="StoMain_Left">
    <div class="SML_Photo"><img src="Admin/UploadFile/<?=$rs['ImgPath']?>" /></div>
    <div class="SML_Name"><?=$rs['PhotoTitle']?></div>
   </div>
   <div class="StoMain_Cont">
    <div class="SMC_Title">门店信息</div>
    <div class="SMC_Cont"><?=urldecode($rs['PhotoContent'])?></div>
   </div>
   <div class="StoMain_Righ">
    <div class="SMR_Title">联系方式</div>
    <div class="SMR_Cont"><?=$rs['KeyWords']?></div>
   </div>
  </div>
  <? 
	  }
	 }
  ?> 
 </div>
 <div class="Foot"><?php include("Foot.php");?></div>
</div>
</body>
</html>