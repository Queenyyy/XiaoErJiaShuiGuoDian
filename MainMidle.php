<link href="css/css.css" rel="stylesheet" type="text/css" />
<link href="css/MainMidle.css" rel="stylesheet" type="text/css" />
<div class="MM_Title">С���Ƽ�<a href="Mall.php"><span>����</span></a></div>
<div class="MM_Cont">
<!-- ���벿��begin -->
 <? $sqlA=" select TOP 4  * from PhotoInfo where CategoryNo ='CN-1174'";
	  $resultA=$db->db_query($sqlA);
	  $total=mssql_num_rows($resultA);
	   if($total<0){
		echo "ͼƬ����ά����....";
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
	      <a href="Mall_B.php" class="link">��������</a>
	     </div>
     </figure>
    </div>
     <? 
	  }
	 }
  ?> 
    
<!-- ���벿��end -->
</div>