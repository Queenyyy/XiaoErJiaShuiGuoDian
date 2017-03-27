<?php
include("inc/DBClass.php");
include("inc/Function.php");

$Action=$_GET['Action'];
$FruitTypeNo=$_POST['FruitTypeNo']; 		//果类编号
$FruitTypeName=$_POST['FruitTypeName'];		//类别名称
$Remar=$_POST['Remar'];	  					//备注

$AdminNo=$_SESSION['AdminNo'];//操作人
$ModuleName='果类信息编辑';

$ID=$_GET['ID'];

if($Action=="Add"){	//增加的方法
	$sqlA="Select * from FruitType where FruitTypeName='".$FruitTypeName."'";
	$resultA=$db->db_query($sqlA);
	$rowsA=mssql_num_rows($resultA);
	if($rowsA>0){
		infoback($ModuleName,$Action,$sql,$AdminNo,$db,'果类名称已存在，请重新输入！');
		exit; 
	}else{
		$sql="Insert into FruitType(FruitTypeNo,FruitTypeName,Remar) values ('".$FruitTypeNo."','".$FruitTypeName."','".$Remar."')";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'果类添加成功！','果类添加失败！','FruType_Info.php');
	}
}else if($Action=="Edit"){ //修改的方法
		$sql="Update FruitType set FruitTypeNo='".$FruitTypeNo."',FruitTypeName='".$FruitTypeName."',Remar='".$Remar."' where ID=".$ID."";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'果类修改成功！','果类修改失败！','FruType_Info.php');
}else if($Action=="Del"){	//删除的方法
		$sql="Delete from FruitType where ID='".$ID."'";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'果类删除成功！','果类删除失败！','FruType_Info.php');
}else if($Action=="Disable"){	//禁用的方法
		$sql="Update FruitType set IsActive=0 where ID=".$ID."";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'状态修改成功！','状态修改失败！','FruType_Info.php');
}else if($Action=="Enable"){	//启用的方法
		$sql="Update FruitType set IsActive=1 where ID=".$ID."";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'状态修改成功！','状态修改失败！','FruType_Info.php');
}else if($Action=="DelAll"){ 	//批量删除的方法
		if(isset($_POST['DelBox'])&&!empty($_POST['DelBox'])){	
		$ID=implode(",",$_POST['DelBox']);	
		$sql="Delete from FruitType where ID in(".$ID.")";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'批量删除类别成功！','批量删除类别失败！','FruType_Info.php');
}else{
	infoback($ModuleName,$Action,$sql,$AdminNo,$db,'请选择需要删除的数据！');
	}
}else{
	infoerror($ModuleName,'非法动作','非法数据','非法用户',$db,'error：非法动作！','Login.php');
}
?>