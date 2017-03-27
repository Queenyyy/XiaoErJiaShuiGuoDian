<link href="css/css.css" rel="stylesheet" type="text/css" />
<link href="css/MainMidle.css" rel="stylesheet" type="text/css" />
<div class="MM_Title">小二推荐<a href="Mall.php"><span>更多</span></a></div>
<div class="MM_Cont">
<!-- 代码部分begin -->
 <? $sqlA=" select TOP 4  * from PhotoInfo where CategoryNo ='CN-1174'";
	  $resultA=$db->db_query($sqlA);
	  $total=mssql_num_rows($resultA);
	   if($total<0){
		echo "图片正在维护中....";
	   }
	   else{
		while($rs=mssql_fetch_array($resultA)){
   ?>
    <div class="view view-tenth">
     <figure>
	  <div class="thumb"><img src="Admin/UploadFile/<?=$rs[ImgPath]?>" /></div>
	    <div class="mask">
	      <h2><?=$rs['PhotoTitle']?></h2>
	      <p><?=urldecode($rs['PhotoContent'])?></p>
	      <a href="Mall_B.php" class="link">立即抢购</a>
	     </div>
     </figure>
    </div>
     <? 
	  }
	 }
  ?> 
    
<!-- 代码部分end -->
</div>