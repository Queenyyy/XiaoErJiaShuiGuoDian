<?php include("Admin/inc/DBClass.php");?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="Admin/images/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>С����ˮ����</title>
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
		echo "ͼƬ����ά����....";
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
    <div class="SMC_Title">�ŵ���Ϣ</div>
    <div class="SMC_Cont"><?=urldecode($rs['PhotoContent'])?></div>
   </div>
   <div class="StoMain_Righ">
    <div class="SMR_Title">��ϵ��ʽ</div>
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