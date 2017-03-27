<?php
include("inc/DBClass.php");
include("inc/Function.php");

$Action=$_GET['Action'];
$FruitNo=$_POST['FruitNo']; 		//商品编号
$FruitName=$_POST['FruitName']; 	//水果名称
$FruitTypeNo=$_POST['FruitTypeNo'];	//水果类别
$SupplierNo=$_POST['SupplierNo'];	//供货商
$Remar=$_POST['Remar']; 		 	//备注 

$AdminNo=$_SESSION['AdminNo'];//操作人
$ModuleName='商品信息编辑';

$ID=$_GET['ID'];

if($Action=="Add"){	//增加的方法
	$sqlC="Select * from FruitInfo where FruitNo='".$FruitNo."'";
	$resultC=$db->db_query($sqlC);
	$rowsC=mssql_num_rows($resultC);
	if($rowsC>0){
		infoback($ModuleName,$Action,$sql,$AdminNo,$db,'编号已存在，请重新输入！');
		exit; 
	}else{
		$sql="Insert into FruitInfo(FruitNo,FruitName,FruitTypeNo,SupplierNo,Remar) values ('".$FruitNo."','".$FruitName."','".$FruitTypeNo."','".$SupplierNo."','".$Remar."')";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'商品信息添加成功！','商品信息添加失败！','Fruit_Info.php');
	}
}else if($Action=="Edit"){	//修改的方法
		$sql="Update FruitInfo set FruitNo='".$FruitNo."',FruitName='".$FruitName."',FruitTypeNo='".$FruitTypeNo."',SupplierNo='".$SupplierNo."',Remar='".$Remar."' where ID='".$ID."'";
		$result=$db->db_query($sql);
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'商品信息修改成功！','商品信息修改失败！','Fruit_Info.php');
}else if($Action=="Del"){	//删除的方法
		$sql="Delete from FruitInfo where ID='".$ID."'";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'商品信息删除成功！','商品信息删除失败！','Fruit_Info.php');
}else if($Action=="DelAll"){ 	//批量删除的方法
		if(isset($_POST['DelBox'])&&!empty($_POST['DelBox'])){	
		$ID=implode(",",$_POST['DelBox']);
		$sql="Delete from FruitInfo where ID in(".$ID.")";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'批量删除商品信息成功！','批量删除商品信息失败！','Fruit_Info.php');
}else{
	infoback($ModuleName,$Action,$sql,$AdminNo,$db,'请选择需要删除的数据！');
	}
}else{
	infoerror($ModuleName,'非法动作','非法数据','非法用户',$db,'error：非法动作！','Login.php');
}
?>