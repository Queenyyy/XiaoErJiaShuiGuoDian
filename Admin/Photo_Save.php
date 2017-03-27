<?php
include("inc/DBClass.php");
include("inc/Function.php");

$Action=$_GET['Action'];
$PhotoTitle=$_POST['PhotoTitle']; 					//图片标题
$PhotoContent=urlencode($_POST['PhotoContent']);	//图片描述
$CategoryNo=$_POST['CategoryNo'];					//类别
$KeyWords=$_POST['KeyWords'];						//关键字
$Author=$_SESSION['Author'];						//发布人
$IsTop=$_POST['IsTop'];								//置顶
$AdminNo=$_SESSION['AdminNo'];//操作人
$ModuleName='图片信息编辑';

//获取图片路径
if($_POST['BImgpath']==""){
	$ImgPath="noimg.jpg";
}else{
	$ImgPath=$_POST['BImgpath'];	
}	

$CreateDate=date("Y-m-d H:i:s");
$UpdateDate=date("Y-m-d H:i:s");

$ID=$_GET['ID'];

if($Action=="Add"){	//增加的方法
	$sql="Select * from PhotoInfo where PhotoTitle='".$PhotoTitle."'";
	$result=$db->db_query($sql);
	$rows=mssql_num_rows($result);
	if($rows>0){
		infoback($ModuleName,$Action,$sql,$AdminNo,$db,'图片标题已存在，请重新输入！');
		exit; 
	}else{
		$sql="Insert into PhotoInfo(PhotoTitle,PhotoContent,KeyWords,CategoryNo,Author,CreateDate,ImgPath) values ('".$PhotoTitle."','".$PhotoContent."','".$KeyWords."','".$CategoryNo."','".$Author."','".$CreateDate."','".$ImgPath."')";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'图片添加成功！','图片添加失败！','Photo_Info.php');
	}
}else if($Action=="Edit"){	//修改的方法
		$sql="Update PhotoInfo set PhotoTitle='".$PhotoTitle."',KeyWords='".$KeyWords."',CategoryNo='".$CategoryNo."',ImgPath='".$ImgPath."',PhotoContent='".$PhotoContent."',UpdateDate='".$UpdateDate."',Author='".$Author."' where ID=".$ID."";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'图片修改成功！','图片修改失败！','Photo_Info.php');
}else if($Action=="Del"){	//删除的方法
		$sql="Delete from PhotoInfo where ID='".$ID."'";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'图片删除成功！','图片删除失败！','Photo_Info.php');
}else if($Action=="Disable"){	//禁用的方法
		$sql="Update PhotoInfo set IsActive=0 where ID=".$ID."";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'图片禁用成功！','图片禁用失败！','Photo_Info.php');
}else if($Action=="Enable"){	//启用的方法
		$sql="Update PhotoInfo set IsActive=1 where ID=".$ID."";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'图片启用成功！','图片启用失败！','Photo_Info.php');
}else if($Action=="DelAll"){ 	//批量删除的方法
		if(isset($_POST['DelBox'])&&!empty($_POST['DelBox'])){	
		$ID=implode(",",$_POST['DelBox']);	
		$sql="Delete from PhotoInfo where ID in(".$ID.")";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'批量删除图片成功！','批量删除图片失败！','Photo_Info.php');
}else{
	infoback($ModuleName,$Action,$sql,$AdminNo,$db,'请选择需要删除的数据！');
	}
}else if($Action=="DisaIsTop"){//置顶
		$sql="Update PhotoInfo set IsTop=1 where ID=".$ID." ";
		$result=$db->db_query($sql);
		if($result){
			echo "<script language='javascript'>alert('图片已置顶！');window.location.href='Photo_Info.php';</script>";
			}else{
				echo "<script language='javascript'>alert('图片置顶失败！');window.history.back();</script>";
				}
			}else if($Action=="EnaIsTop"){
				$sql="Update PhotoInfo set IsTop=0 where ID=".$ID." ";
				$result=$db->db_query($sql);
				if($result){
					echo "<script language='javascript'>alert('已取消图片置顶！');window.location.href='Photo_Info.php';</script>";
					}else{
						echo "<script language='javascript'>alert('取消图片置顶失败！');window.history.back();</script>";
				}
}else{
	infoerror($ModuleName,'非法动作','非法数据','非法用户',$db,'error：非法动作！','Login.php');
}
?>