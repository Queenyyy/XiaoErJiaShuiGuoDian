<?php
include("inc/DBClass.php");
include("inc/Function.php");

$Action=$_GET['Action'];
$SupplierNo=$_POST['SupplierNo']; 		//供货商编号
$SupplierName=$_POST['SupplierName']; 	//供货商名称
$Addr=$_POST['Addr']; 					//地址
$Phone=$_POST['Phone'];	  				//联系电话
$Remar=$_POST['Remar'];	  				//备注

$AdminNo=$_SESSION['AdminNo'];			//操作人
$ModuleName='供货商信息编辑';

$ID=$_GET['ID'];

if($Action=="Add"){	//增加的方法
	$sqlC="Select * from SuppliInfo where SupplierName='".$SupplierName."'";
	$resultC=$db->db_query($sqlC);
	$rowsC=mssql_num_rows($resultC);
	if($rowsC>0){
		infoback($ModuleName,$Action,$sql,$AdminNo,$db,'供货商已存在，请重新输入！');
		exit; 
	}else{
		$sql="Insert into SuppliInfo(SupplierNo,SupplierName,Addr,Phone,Remar) values ('".$SupplierNo."','".$SupplierName."','".$Addr."','".$Phone."','".$Remar."')";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'供货商添加成功！','供货商添加失败！','Supp_Info.php');
	}
}else if($Action=="Edit"){	//修改的方法
		$sql="Update SuppliInfo set SupplierNo='".$SupplierNo."',SupplierName='".$SupplierName."',Addr='".$Addr."',Phone='".$Phone."',Remar='".$Remar."' where ID=".$ID."";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'供货商修改成功！','供货商修改失败！','Supp_Info.php');
}else if($Action=="Del"){	//删除的方法
		$sql="Delete from SuppliInfo where ID='".$ID."'";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'供货商删除成功！','供货商删除失败！','Supp_Info.php');
}else if($Action=="DelAll"){ 	//批量删除的方法
		if(isset($_POST['DelBox'])&&!empty($_POST['DelBox'])){	
		$ID=implode(",",$_POST['DelBox']);	
		$sql="Delete from SuppliInfo where ID in(".$ID.")";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'批量删除供货商成功！','批量删除供货商失败！','Admin_Info.php');
}else{
	infoback($ModuleName,$Action,$sql,$AdminNo,$db,'请选择需要删除的数据！');
	}
}else{
	infoerror($ModuleName,'非法动作','非法数据','非法用户',$db,'error：非法动作！','Login.php');
}
?>