<?php 
include("Admin/inc/DBClass.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="Admin/images/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>С����ˮ����</title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div class="Container">
 <div class="Top"><?php include("Top.php");?></div>
 <div class="Not_Main">
  <div id="lineOne"></div>
    <?php
    //��ȡID
	$ID=$_GET['ID'];
	//�ж�ID�ĺϷ���
	if(!is_numeric($ID)){
		echo "<script language='javascript'>alert('���󣡷Ƿ�������');window.location.href='index.php';</script>";
		exit;
	}
	//����� 
	$sqlHit="Update  ArticleInfo set Hit=Hit+1 where ID=".$ID."";
	$resultHit=$db->db_query($sqlHit);
	
	$sql="Select * from View_Article where ID=".$ID."";
	$result=$db->db_query($sql);
	$rs=mssql_fetch_array($result);
	?>
	<div id="NewContent">
	  <div id="NewContentT"><strong><font size="+1" color="#0088db"><span>�����ڵ�λ�ã�&nbsp;<a href="index.php">��ҳ</a>&nbsp;>>&nbsp;<a href="Consulta.php?CategoryNo=<?=$rs['CategoryNo']?>"><?=$rs['CategoryName']?></a>&nbsp;>>&nbsp;<a href="#">����</a></span></font></strong></div><br />
	  <div id="NewContentC">
	    <h4><strong><font size="+2" color="#000"><?=$rs['ArticleTitle']?></font></strong></h4><br />
		<p class="ArticleInfo"><strong><font size="+0" color="#a9a6a6">
	     ���<?=$rs['CategoryName']?>&nbsp;&nbsp;&nbsp;&nbsp;
	     ���ʱ�䣺<?=mb_substr($rs['CreateDate'],0,10,'gb2312')?>&nbsp;&nbsp;&nbsp;&nbsp;
	     �����ߣ�<?=$rs['Author']?>&nbsp;&nbsp;&nbsp;&nbsp;
	     ����ʣ�<?=$rs['Hit']?></font></strong></p><br />
		 <strong><font color="#000"><?=urldecode($rs['ArticleContent'])?></font></strong>
	  </div>
	</div>
	<div id="lineOne"></div>
 </div>
 <div class="Foot"><?php include("Foot.php");?></div>
</div>
</body>
</html>