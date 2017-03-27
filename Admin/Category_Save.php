<?php
include("inc/DBClass.php");
include("inc/Function.php");

$Action=$_GET['Action'];
$CategoryNo=$_POST['CategoryNo']; 		//类别编号
$CategoryName=$_POST['CategoryName'];	//类别名称
$Description=$_POST['Description'];	  	//备注

$AdminNo=$_SESSION['AdminNo'];//操作人
$ModuleName='类别信息编辑';

$ID=$_GET['ID'];

if($Action=="Add"){	//增加的方法
	$sqlA="Select * from Category where CategoryName='".$CategoryName."'";
	$resultA=$db->db_query($sqlA);
	$rowsA=mssql_num_rows($resultA);
	if($rowsA>0){
		infoback($ModuleName,$Action,$sql,$AdminNo,$db,'类别名称已存在，请重新输入！');
		exit; 
	}else{
		$sql="Insert into Category(CategoryNo,CategoryName,Description) values ('".$CategoryNo."','".$CategoryName."','".$Description."')";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'类别添加成功！','类别添加失败！','Category_Info.php');
	}
}else if($Action=="Edit"){ //修改的方法
		$sql="Update Category set CategoryNo='".$CategoryNo."',CategoryName='".$CategoryName."',Description='".$Description."' where ID=".$ID."";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'类别修改成功！','类别修改失败！','Category_Info.php');
}else if($Action=="Del"){	//删除的方法
		$sql="Delete from Category where ID='".$ID."'";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'类别删除成功！','类别删除失败！','Category_Info.php');
}else if($Action=="Disable"){	//禁用的方法
		$sql="Update Category set IsActive=0 where ID=".$ID."";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'类别禁用成功！','类别禁用失败！','Category_Info.php');
}else if($Action=="Enable"){	//启用的方法
		$sql="Update Category set IsActive=1 where ID=".$ID."";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'类别启用成功！','类别启用失败！','Category_Info.php');
}else if($Action=="DelAll"){ 	//批量删除的方法
		if(isset($_POST['DelBox'])&&!empty($_POST['DelBox'])){	
		$ID=implode(",",$_POST['DelBox']);	
		$sql="Delete from Category where ID in(".$ID.")";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'批量删除类别成功！','批量删除类别失败！','Category_Info.php');
}else{
	infoback($ModuleName,$Action,$sql,$AdminNo,$db,'请选择需要删除的数据！');
	}
}else{
	infoerror($ModuleName,'非法动作','非法数据','非法用户',$db,'error：非法动作！','Login.php');
}
?>