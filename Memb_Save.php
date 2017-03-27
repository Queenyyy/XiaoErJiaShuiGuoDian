<?php
include("Admin/inc/DBClass.php");
include("Admin/inc/Function.php");

$Action=$_GET['Action'];
$UserName=$_POST['UserName']; 		//用户名
$Name=$_POST['Name']; 				//会员姓名
$PassWord=md5($_POST['PassWord']); 	//密码
$Remark=$_POST['Remark'];	  		//备注
$Sex=$_POST['Sex'];			  		//性别
$Grade=$_POST['Grade'];		  		//会员等级

$CreateDate=date("Y-m-d H:i:s");
$UpdateDate=date("Y-m-d H:i:s");

$ID=$_GET['ID'];

if($Action=="Login"){//会员登录
	$sql="Select * from MembeInfo where UserName='".$UserName."' and PassWord='".$PassWord."' and IsActive=1";
	$result=$db->db_query($sql);
	$rows=mssql_num_rows($result);
	if($rows>0){
		$rs=mssql_fetch_array($result);
		$_SESSION['UserName']=$rs['UserName'];
			$_SESSION['Name']=$rs['Name'];
		echo "<script language='javascript'>alert('尊敬的会员，小二家店铺欢迎您的光临！');window.location.href='index.php';</script>";
		}else{
			echo "<script language='javascript'>alert('请检查用户名或密码是否错误！');window.history.back();</script>";
			}
}else if($Action=="Add"){//注册会员
	$sqlC="Select * from MembeInfo where UserName='".$UserName."'";
	$resultC=$db->db_query($sqlC);
	$rowsC=mssql_num_rows($resultC);
	if($rowsC>0){
		infoback($ModuleName,$Action,$sql,$AdminNo,$db,'帐号已存在，请重新输入！');
		exit; 
	}else{
		$sql="Insert into MembeInfo(UserName,Name,PassWord,Sex,CreateDate,Grade,Remark) values ('".$UserName."','".$Name."','".$PassWord."','".$Sex."','".$CreateDate."','".$Grade."','".$Remark."')";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'恭喜您，注册成功！','注册失败！','index.php');
	}
}else{
	echo "<script language='javascript'>alert('错误！非法操作！');window.location.href='Login.php';</script>";
}
?>