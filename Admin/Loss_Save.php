<?php
include("inc/DBClass.php");
include("inc/Function.php");

$Action=$_GET['Action'];
$LossNo=$_POST['LossNo'];		 	//报损编号
$FruitNo=$_POST['FruitNo']; 	//水果名称
$LossPrice=$_POST['LossPrice'];	 	//数量（小数）
$Remar=$_POST['Remar']; 		 	//备注

$AdminNo=$_SESSION['AdminNo'];//操作人
$ModuleName='商品信息编辑';

$LossTime=date("Y-m-d H:i:s");

$ID=$_GET['ID'];

if($Action=="Add"){	//增加的方法
	$sqlC="Select * from LossInfo where LossNo='".$LossNo."'";
	$resultC=$db->db_query($sqlC);
	$rowsC=mssql_num_rows($resultC);
	if($rowsC>0){
		infoback($ModuleName,$Action,$sql,$AdminNo,$db,'编号已存在，请重新输入！');
		exit; 
	}else{
		$sql="Insert into LossInfo(LossNo,FruitNo,LossPrice,Remar,LossTime) values ('".$LossNo."','".$FruitNo."','".$LossPrice."','".$Remar."','".$LossTime."')";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'报损信息添加成功！','报损信息添加失败！','Loss_Info.php');
	}
}else if($Action=="Edit"){	//修改的方法
		$sql="Update LossInfo set LossNo='".$LossNo."',FruitNo='".$FruitNo."',LossPrice='".$LossPrice."',Remar='".$Remar."' where ID='".$ID."'";
		$result=$db->db_query($sql);
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'报损信息修改成功！','报损信息修改失败！','Loss_Info.php');
}else if($Action=="Del"){	//删除的方法
		$sql="Delete from LossInfo where ID='".$ID."'";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'报损信息删除成功！','报损信息删除失败！','Loss_Info.php');
}else if($Action=="DelAll"){ 	//批量删除的方法
		if(isset($_POST['DelBox'])&&!empty($_POST['DelBox'])){	
		$ID=implode(",",$_POST['DelBox']);
		$sql="Delete from LossInfo where ID in(".$ID.")";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'批量删除报损信息成功！','批量删除报损信息失败！','Loss_Info.php');
}else{
	infoback($ModuleName,$Action,$sql,$AdminNo,$db,'请选择需要删除的数据！');
	}
}else{
	infoerror($ModuleName,'非法动作','非法数据','非法用户',$db,'error：非法动作！','Login.php');
}
?>