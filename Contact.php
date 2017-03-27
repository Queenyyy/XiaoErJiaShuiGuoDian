<?php include("Admin/inc/DBClass.php");?>
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
<div class="Cont_Container">
 <div class="Top"><?php include("Top.php");?></div>
 <div class="Cont_Main">
 <? $sqlA=" select * from ArticleInfo where CategoryNo ='CN-2175'";
	  $resultA=$db->db_query($sqlA);
	  $total=mssql_num_rows($resultA);
	   if($total<0){
		echo "信息正在维护中....";
	   }
	   else{
		while($rs=mssql_fetch_array($resultA)){
   ?>
  <div class="ContM_Top"><?=urldecode($rs['ArticleContent'])?></div>
   <? 
	  }
	 }
  ?> 
  <div class="ContM_Foot">
  <div class="Contact_List">
   <div class="Contact_Us">客户服务</div>
   <div class="Contact_On">
    <ul>
     <li>电话：488-882-0008</li>
     <li>传真：0771-8820082</li>
     <li>QQ：8820082</li>
    </ul>
   </div>
  </div>
  <div class="Contact_List">
   <div class="Contact_Us">开发者</div>
   <div class="Contact_On">
    <ul>
     <li>L K 程序开发</li>
     <li>邮箱：<a href="mailto: 591753854@qq.com">591753854@qq.com</a></li>
     <li>QQ：5003201</li>
    </ul>
  </div>
 </div>
  </div>
   
 </div>
 <div class="Foot"><?php include("Foot.php");?></div>
</div>
</body>