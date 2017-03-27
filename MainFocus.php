<html>
<head>
<!--Title-->
<title></title>
<!--Basic page styles-->
<style>
html {
	font-family: 'Open Sans', Helvetica, Arial, sans-serif;
	background-color: #fff;
	font-weight: 300;
}
body {
	margin: 0px;
	padding: 0px;
}
.documentation {
	width: 1100px;
	margin: 0px auto;
	padding: 100px 0px;
}
.documentation h3, p {
	text-align: center;
}
.documentation h3 {
	margin: 0px 0px 20px 0px;
	font-weight: 300;
	font-size: 2em;
}
a, a:visited {
	color: #E54028;
	text-decoration: none;
}
a:hover {
	color: #c22d18;
	text-decoration: underline;
	cursor: pointer;
}
</style>
<!--Required libraries-->
<script src="js/min/jquery-v1.10.2.min.js" type="text/javascript"></script>
<script src="js/min/modernizr-custom-v2.7.1.min.js" type="text/javascript"></script>
<script src="js/min/jquery-finger-v0.1.0.min.js" type="text/javascript"></script>
<!--Include flickerplate-->
<link href="css/flickerplate.css"  type="text/css" rel="stylesheet">
<script src="js/min/flickerplate.min.js" type="text/javascript"></script>
<!--Execute flickerplate-->
<script>
	$(document).ready(function(){
		
		$('.flicker-example').flicker();
	});
	</script>
</head>
<body>
<!--Basic example-->
<div class="flicker-example" data-block-text="false">
  <ul>
   <? $sqlA=" select TOP 5  * from PhotoInfo where CategoryNo ='CN-6572'";
	  $resultA=$db->db_query($sqlA);
	  $total=mssql_num_rows($resultA);
	   if($total<0){
		echo "图片正在维护中....";
	   }
	   else{
		while($rs=mssql_fetch_array($resultA)){
   ?>
    <li data-background="Admin/UploadFile/<?=$rs['ImgPath']?>"></li>
   <? 
	  }
	 }
  ?> 
  </ul>
</div>
<!--Documentation link-->
</body>
</html>