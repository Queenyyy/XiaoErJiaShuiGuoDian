<?php
include("inc/DBClass.php");
include("inc/Function.php");

$Action=$_GET['Action'];
$ArticleTitle=$_POST['ArticleTitle']; 					//新闻标题 
$KeyWords=$_POST['KeyWords'];							//关键字
$CategoryNo=$_POST['CategoryNo'];						//类别
$ArticleContent=urlencode($_POST['ArticleContent']);	//内容 urlencode对字符串进行加密，urldecode对字符串进行解密
$IsTop=$_POST['IsTop'];									//置顶
$Author=$_SESSION['AdminNo'];							//发布人

$AdminNo=$_SESSION['AdminNo'];//操作人
$ModuleName='公告信息编辑';
$CreateDate=date("Y-m-d H:i:s");
$UpdateDate=date("Y-m-d H:i:s");

$ID=$_GET['ID'];

if($Action=="Add"){	//增加的方法
	$sqlC="Select * from ArticleInfo where ArticleTitle='".$ArticleTitle."'";
	$resultC=$db->db_query($sqlC);
	$rowsC=mssql_num_rows($resultC);
	if($rowsC>0){
		infoback($ModuleName,$Action,$sql,$AdminNo,$db,'公告标题已存在，请重新输入！');
		exit; 
	}else{
		$sql="Insert into ArticleInfo(ArticleTitle,ArticleContent,KeyWords,CategoryNo,CreateDate,Author) values ('".$ArticleTitle."','".$ArticleContent."','".$KeyWords."','".$CategoryNo."','".$CreateDate."','".$Author."')";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'公告添加成功！','公告添加失败！','Article_Info.php');
	}
}else if($Action=="Edit"){	//修改的方法
		$sql="Update ArticleInfo set ArticleTitle='".$ArticleTitle."',KeyWords='".$KeyWords."',ArticleContent='".$ArticleContent."',CategoryNo='".$CategoryNo."',UpdateDate='".$UpdateDate."',Author='".$Author."' where ID=".$ID."";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'公告修改成功！','公告修改失败！','Article_Info.php');
}else if($Action=="Del"){	//删除的方法
		$sql="Delete from ArticleInfo where ID='".$ID."'";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'公告删除成功！','公告删除失败！','Article_Info.php');
}else if($Action=="Disable"){	//禁用的方法
		$sql="Update ArticleInfo set IsActive=0 where ID=".$ID."";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'公告禁用成功！','公告禁用失败！','Article_Info.php');
}else if($Action=="Enable"){	//启用的方法
		$sql="Update ArticleInfo set IsActive=1 where ID=".$ID."";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'公告启用成功！','公告启用失败！','Article_Info.php');
}else if($Action=="DelAll"){ 	//批量删除的方法
		if(isset($_POST['DelBox'])&&!empty($_POST['DelBox'])){	
		$ID=implode(",",$_POST['DelBox']);	
		$sql="Delete from ArticleInfo where ID in(".$ID.")";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'批量删除公告成功！','批量删除公告失败！','Article_Info.php');
}else{
	infoback($ModuleName,$Action,$sql,$AdminNo,$db,'请选择需要删除的数据！');
	}
}else if($Action=="DisaIsTop"){//置顶
		$sql="Update ArticleInfo set IsTop=1 where ID=".$ID." ";
		$result=$db->db_query($sql);
		if($result){
			echo "<script language='javascript'>alert('公告已置顶！');window.location.href='Article_Info.php';</script>";
			}else{
				echo "<script language='javascript'>alert('公告置顶失败！');window.history.back();</script>";
				}
			}else if($Action=="EnaIsTop"){
				$sql="Update ArticleInfo set IsTop=0 where ID=".$ID." ";
				$result=$db->db_query($sql);
				if($result){
					echo "<script language='javascript'>alert('已取消公告置顶！');window.location.href='Article_Info.php';</script>";
					}else{
						echo "<script language='javascript'>alert('取消公告置顶失败！');window.history.back();</script>";
				}
}else{
	infoerror($ModuleName,'非法动作','非法数据','非法用户',$db,'error：非法动作！','Login.php');
}
?>