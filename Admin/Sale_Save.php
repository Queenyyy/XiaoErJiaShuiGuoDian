<?php
include("inc/DBClass.php");
include("inc/Function.php");

$Action=$_GET['Action'];
$SalesNo=$_POST['SalesNo'];		 	//销售编号
$FruitNo=$_POST['FruitNo']; 	//水果名称
$Number=$_POST['Number'];	 		//数量（小数）
$SalePrice=$_POST['SalePrice'];	 	//价格（小数）
$Remar=$_POST['Remar']; 		 	//备注

$AdminNo=$_SESSION['AdminNo'];//操作人
$ModuleName='商品信息编辑';

$SaleTime=date("Y-m-d H:i:s");

$ID=$_GET['ID'];

if($Action=="Add"){	//增加的方法
	$sqlC="Select * from SaleInfo where SalesNo='".$SalesNo."'";
	$resultC=$db->db_query($sqlC);
	$rowsC=mssql_num_rows($resultC);
	if($rowsC>0){
		infoback($ModuleName,$Action,$sql,$AdminNo,$db,'编号已存在，请重新输入！');
		exit; 
	}else{
		$sql="Insert into SaleInfo(SalesNo,FruitNo,Number,SalePrice,Remar,SaleTime) values ('".$SalesNo."','".$FruitNo."','".$Number."','".$SalePrice."','".$Remar."','".$SaleTime."')";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'销售信息添加成功！','销售信息添加失败！','Sale_Info.php');
	}
}else if($Action=="Edit"){	//修改的方法
		$sql="Update SaleInfo set SalesNo='".$SalesNo."',FruitNo='".$FruitNo."',Number='".$Number."',SalePrice='".$SalePrice."',Remar='".$Remar."' where ID='".$ID."'";
		$result=$db->db_query($sql);
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'销售信息修改成功！','销售信息修改失败！','Sale_Info.php');
}else if($Action=="Del"){	//删除的方法
		$sql="Delete from SaleInfo where ID='".$ID."'";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'销售信息删除成功！','销售信息删除失败！','Sale_Info.php');
}else if($Action=="DelAll"){ 	//批量删除的方法
		if(isset($_POST['DelBox'])&&!empty($_POST['DelBox'])){	
		$ID=implode(",",$_POST['DelBox']);
		$sql="Delete from SaleInfo where ID in(".$ID.")";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'批量删除销售信息成功！','批量删除销售信息失败！','Sale_Info.php');
}else{
	infoback($ModuleName,$Action,$sql,$AdminNo,$db,'请选择需要删除的数据！');
	}
}else{
	infoerror($ModuleName,'非法动作','非法数据','非法用户',$db,'error：非法动作！','Login.php');
}
?>