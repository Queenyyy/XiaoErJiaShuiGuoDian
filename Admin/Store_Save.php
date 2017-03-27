<?php
include("inc/DBClass.php");
include("inc/Function.php");

$Action=$_GET['Action'];
$StoreNo=$_POST['StoreNo']; 		//门店编号
$StoreName=$_POST['StoreName']; 	//店名
$Addr=$_POST['Addr'];				//地址
$Telephone=$_POST['Telephone']; 	//联系方式
$Manager=$_POST['Manager'];			//负责人
$Remar=$_POST['Remar']; 			//备注

$AdminNo=$_SESSION['AdminNo'];//操作人
$ModuleName='门店信息编辑';

$ID=$_GET['ID'];

if($Action=="Add"){	//增加的方法
	$sql="Select * from StoreInfo where StoreNo='".$StoreNo."'";
	$result=$db->db_query($sql);
	$rows=mssql_num_rows($result);
	if($rows>0){
		infoback($ModuleName,$Action,$sql,$AdminNo,$db,'门店编号已存在，请重新输入！');
		exit; 
	}else{
		$sql="Insert into StoreInfo(StoreNo,StoreName,Addr,Telephone,Manager,Remar) values ('".$StoreNo."','".$StoreName."','".$Addr."','".$Telephone."','".$Manager."','".$Remar."')";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'门店添加成功！','门店添加失败！','Store_Info.php');
	}
}else if($Action=="Edit"){	//修改的方法
		$sql="Update StoreInfo set StoreNo='".$StoreNo."',StoreName='".$StoreName."',Addr='".$Addr."',Telephone='".$Telephone."',Manager='".$Manager."',Remar='".$Remar."' where ID='".$ID."'";
		$result=$db->db_query($sql);
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'门店修改成功！','门店修改失败！','Store_Info.php');
}else if($Action=="Del"){	//删除的方法
		$sql="Delete from StoreInfo where ID='".$ID."'";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'门店删除成功！','门店删除失败！','Store_Info.php');
}else if($Action=="DelAll"){ 	//批量删除的方法
		if(isset($_POST['DelBox'])&&!empty($_POST['DelBox'])){	
		$ID=implode(",",$_POST['DelBox']);	
		$sql="Delete from StoreInfo where ID in(".$ID.")";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'批量删除门店成功！','批量删除门店失败！','Store_Info.php');
}else{
	infoback($ModuleName,$Action,$sql,$AdminNo,$db,'请选择需要删除的数据！');
	}
}else{
	infoerror($ModuleName,'非法动作','非法数据','非法用户',$db,'error：非法动作！','Login.php');
}
?>