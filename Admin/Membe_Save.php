<?php
include("inc/DBClass.php");
include("inc/Function.php");

$Action=$_GET['Action'];
$UserName=$_POST['UserName']; 		//用户名
$Name=$_POST['Name']; 				//会员姓名
$PassWord=md5($_POST['PassWord']); 	//密码
$Remark=$_POST['Remark'];	  		//备注
$Sex=$_POST['Sex'];			  		//性别
$Grade=$_POST['Grade'];		  		//会员等级

$AdminNo=$_SESSION['AdminNo'];//操作人
$ModuleName='会员信息编辑';

$CreateDate=date("Y-m-d H:i:s");
$UpdateDate=date("Y-m-d H:i:s");

$ID=$_GET['ID'];


if($Action=="Add"){	//增加的方法
	$sqlC="Select * from MembeInfo where UserName='".$UserName."'";
	$resultC=$db->db_query($sqlC);
	$rowsC=mssql_num_rows($resultC);
	if($rowsC>0){
		infoback($ModuleName,$Action,$sql,$AdminNo,$db,'会员已存在，请重新输入！');
		exit; 
	}else{
		//构建SQL
		$sql="Insert into MembeInfo(UserName,Name,PassWord,Sex,CreateDate,Grade,Remark) values ('".$UserName."','".$Name."','".$PassWord."','".$Sex."','".$CreateDate."','".$Grade."','".$Remark."')";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'会员添加成功！','会员添加失败！','Membe_Info.php');
	}
}else if($Action=="Edit"){	//修改的方法
		$sql="Update MembeInfo set UserName='".$UserName."',Name='".$Name."',Sex='".$Sex."',Grade='".$Grade."',UpdateDate='".$UpdateDate."',Remark='".$Remark."' where ID=".$ID."";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'会员修改成功！','会员修改失败！','Membe_Info.php');
}else if($Action=="Del"){	//删除的方法
		$sql="Delete from MembeInfo where ID='".$ID."'";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'会员删除成功！','会员删除失败！','Membe_Info.php');
}else if($Action=="Disable"){	//禁用的方法
		$sql="Update MembeInfo set IsActive=0 where ID=".$ID."";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'会员禁用成功！','会员禁用失败！','Membe_Info.php');
}else if($Action=="Enable"){	//启用的方法
		$sql="Update MembeInfo set IsActive=1 where ID=".$ID."";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'会员启用成功！','会员启用失败！','Membe_Info.php');
}else if($Action=="DelAll"){ 	//批量删除的方法
		if(isset($_POST['DelBox'])&&!empty($_POST['DelBox'])){	
		$ID=implode(",",$_POST['DelBox']);	
		$sql="Delete from MembeInfo where ID in(".$ID.")";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'批量删除会员成功！','批量删除会员失败！','Membe_Info.php');
}else{
	infoback($ModuleName,$Action,$sql,$AdminNo,$db,'请选择需要删除的数据！');
	}
}else{
	infoerror($ModuleName,'非法动作','非法数据','非法用户',$db,'error：非法动作！','Login.php');
}
?>