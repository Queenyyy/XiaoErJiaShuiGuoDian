<?php
include("inc/DBClass.php");
include("inc/Function.php");

$Action=$_GET['Action'];
$PurchaseNo=$_POST['PurchaseNo'];	//进货编号
$FruitNo=$_POST['FruitNo']; 		//水果名称
$Number=$_POST['Number'];	 		//数量（小数）
$PurchPrice=$_POST['PurchPrice'];	 //单价（小数）
$Remar=$_POST['Remar']; 		 	//备注 
$SupplierNo=$_POST['SupplierNo'];	//供货商
$EmployeeNo=$_POST['EmployeeNo'];	//经手人

$AdminNo=$_SESSION['AdminNo'];//操作人
$ModuleName='商品信息编辑';

$PurcTime=date("Y-m-d H:i:s");

$ID=$_GET['ID'];

if($Action=="Add"){	//增加的方法
	$sqlC="Select * from Purchase where PurchaseNo='".$PurchaseNo."'";
	$resultC=$db->db_query($sqlC);
	$rowsC=mssql_num_rows($resultC);
	if($rowsC>0){
		infoback($ModuleName,$Action,$sql,$AdminNo,$db,'编号已存在，请重新输入！');
		exit; 
	}else{
		$sql="Insert into Purchase(PurchaseNo,FruitNo,Number,PurchPrice,Remar,PurcTime,SupplierNo,EmployeeNo) values ('".$PurchaseNo."','".$FruitNo."','".$Number."','".$PurchPrice."','".$Remar."','".$PurcTime."','".$SupplierNo."','".$EmployeeNo."')";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'进货信息添加成功！','进货信息添加失败！','Purch_Info.php');
	}
}else if($Action=="Edit"){	//修改的方法
		$sql="Update Purchase set PurchaseNo='".$PurchaseNo."',FruitNo='".$FruitNo."',Number='".$Number."',PurchPrice='".$PurchPrice."',Remar='".$Remar."',SupplierNo='".$SupplierNo."',EmployeeNo='".$EmployeeNo."' where ID='".$ID."'";
		$result=$db->db_query($sql);
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'进货信息修改成功！','进货信息修改失败！','Purch_Info.php');
}else if($Action=="Del"){	//删除的方法
		$sql="Delete from Purchase where ID='".$ID."'";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'进货信息删除成功！','进货信息删除失败！','Purch_Info.php');
}else if($Action=="DelAll"){ 	//批量删除的方法
		if(isset($_POST['DelBox'])&&!empty($_POST['DelBox'])){	
		$ID=implode(",",$_POST['DelBox']);
		$sql="Delete from Purchase where ID in(".$ID.")";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'批量删除进货信息成功！','批量删除进货信息失败！','Purch_Info.php');
}else{
	infoback($ModuleName,$Action,$sql,$AdminNo,$db,'请选择需要删除的数据！');
	}
}else{
	infoerror($ModuleName,'非法动作','非法数据','非法用户',$db,'error：非法动作！','Login.php');
}
?>