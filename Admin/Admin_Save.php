<?php
include("inc/DBClass.php");
include("inc/Function.php");

$Action=$_GET['Action'];
$AdminNo=$_POST['AdminNo']; 		//用户名
$AdminName=$_POST['AdminName']; 	//姓名
$PassWord=md5($_POST['PassWord']);  //密码
$UnitAuth=$_POST['UnitAuth']; 		//权限
$Remark=$_POST['Remark'];	  		//备注

$ModuleName='管理员信息编辑';

$CreateDate=date("Y-m-d H:i:s");
$UpdateDate=date("Y-m-d H:i:s");

$ID=$_GET['ID'];

//修改密码的两个数据
$OldPassWord=md5($_POST['OldPassWord']); //旧密码
$NewPassWord=md5($_POST['NewPassWord']); //新密码

if($Action=="Add"){	//增加的方法
	$sqlC="Select * from AdminInfo where AdminNo='".$AdminNo."'";
	$resultC=$db->db_query($sqlC);
	$rowsC=mssql_num_rows($resultC);
	if($rowsC>0){
		infoback($ModuleName,$Action,$sql,$AdminNo,$db,'管理员帐号已存在，请重新输入！');
		exit; 
	}else{
		$sql="Insert into AdminInfo(AdminNo,AdminName,PassWord,UnitAuth,CreateDate,Remark) values ('".$AdminNo."','".$AdminName."','".$PassWord."','".$UnitAuth."','".$CreateDate."','".$Remark."')";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'管理员添加成功！','管理员添加失败！','Admin_Info.php');
	}
}else if($Action=="Edit"){	//修改的方法
		$sql="Update AdminInfo set AdminNo='".$AdminNo."',AdminName='".$AdminName."',UnitAuth='".$UnitAuth."',Remark='".$Remark."',UpdateDate='".$UpdateDate."' where ID=".$ID."";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'管理员修改成功！','管理员修改失败！','Admin_Info.php');
}else if($Action=="Del"){	//删除的方法
		$sql="Delete from AdminInfo where ID='".$ID."'";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'管理员删除成功！','管理员删除失败！','Admin_Info.php');
}else if($Action=="Disable"){	//禁用的方法
		$sql="Update AdminInfo set IsActive=0 where ID=".$ID."";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'管理员禁用成功！','管理员禁用失败！','Admin_Info.php');
}else if($Action=="Enable"){	//启用的方法
		$sql="Update AdminInfo set IsActive=1 where ID=".$ID."";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'管理员启用成功！','管理员启用失败！','Admin_Info.php');
}else if($Action=="DelAll"){ 	//批量删除的方法
		if(isset($_POST['DelBox'])&&!empty($_POST['DelBox'])){	
		$ID=implode(",",$_POST['DelBox']);	
		$sql="Delete from AdminInfo where ID in(".$ID.")";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'批量删除管理员成功！','批量删除管理员失败！','Admin_Info.php');
}else{
	infoback($ModuleName,$Action,$sql,$AdminNo,$db,'请选择需要删除的数据！');
	}
}else if($Action=="PassWordEdit"){	//修改密码的方法
		//判断旧密码输入是否正确
		$sqlP="Select * from AdminInfo where AdminNo='".$_SESSION['AdminNo']."' and PassWord='".$OldPassWord."'";
		$resultP=$db->db_query($sqlP);
		$rowsC=mssql_num_rows($resultP);//统计结果
		//写入日志 调用Function.php里的方法
		SysLogs($ModuleName,$Action,$sqlP,$AdminNo,$db);
		if($rowsC>0){
			//修改密码
			$sqlN="Update AdminInfo set PassWord='".$NewPassWord."' where AdminNo='".$_SESSION['AdminNo']."'";
			$resultN=$db->db_query($sqlN);
			if($resultN){
					echo "<script language='javascript'>alert('密码修改成功，请重新登录！');top.location.href='Login.php';</script>";
				}else{
					echo "<script language='javascript'>alert('密码修改失败！');window.history.back();</script>";
				}
		}else{
			echo "<script language='javascript'>alert('旧密码输入错误，请重新输入！');window.history.back();</script>";
		}
}else{
	//写入日志
	infoerror($ModuleName,'非法动作','非法数据','非法用户',$db,'error：非法动作！','Login.php');
}
?>