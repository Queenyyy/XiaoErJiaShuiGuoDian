<?php include("Admin/inc/DBClass.php");?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="Admin/images/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>小二家水果铺</title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/Popup.css" media="all">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
<script src="js/jquery.min.js"></script>
<script src="js/Popupjquery.min.js"></script>
</head>
<body>
<div class="Container">
 <div class="Top"><?php include("Top.php");?></div>
 <div class="Main_Mall">
  <div class="ct-pageWrapper">
  <main>
	<div class="Mall">
	  <div class="row">
		<div class="col-md-3">
		  <div class="widget">
			<h2 class="widget-header">购物车</h2>
			<div class="ct-cart"></div>
		  </div>
		</div>
		<div class="col-md-9">
		  <div class="row">
          <? $sqlA=" select TOP 6 * from PhotoInfo where CategoryNo ='CN-6448'";
			  $resultA=$db->db_query($sqlA);
			  $total=mssql_num_rows($resultA);
			   if($total<0){
				echo "图片正在维护中....";
			   }
			   else{
				while($rs=mssql_fetch_array($resultA)){
		   ?>
			<div class="col-sm-4">
			  <div class="ct-product">
				<div class="image"><img src="Admin/UploadFile/<?=$rs[ImgPath]?>" alt=""></div>
				<div class="inner"><a href="#" class="btn btn-motive ct-product-button"><i class="fa fa-shopping-cart">买</i></a>
				  <h2 class="ct-product-title"><?=$rs['PhotoTitle']?>
                  </h2><span class="ct-product-price">小二家特惠价：￥<?=urldecode($rs['PhotoContent'])?></span>
				</div>
			  </div>
			</div>
            <? 
			  }
			 }
		  ?> 
		  </div>
		</div>
	  </div>
	</div>
  </main>
<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="js/shop.min.js"></script>
<script type="text/javascript">
$('body').ctshop({
  currency: '￥',
  paypal: {
	currency_code: 'EUR'
  }
});
</script>
</div>
 </div>
 <div class="Foot"><?php include("Foot.php");?></div>
</div>
</body>
</html>