<?php
include("inc/DBClass.php");
include("inc/Function.php");

$Action=$_GET['Action'];
$ModuleName='用户登录';
$AdminNo=$_POST['AdminNo'];
$PassWord=md5($_POST['PassWord']);
$AdminName=$_POST['AdminName']; 	//姓名
$VCode=$_POST['VCode'];


$GetVcode=GetValue();
 

if($Action=="Login"){
	//判断验证码输入是否正确   		window.history.back()返回历史记录，即返回前一个页面
	if($VCode!=$GetVcode){
		echo "<script language='javascript'>alert('验证码错误，请重新输入！');window.history.back();</script>";
		exit; //结束
		}
	$sql="Select * from AdminInfo where AdminNo='".$AdminNo."' and PassWord='".$PassWord."' and IsActive=1";
	$result=$db->db_query($sql);
	$rows=mssql_num_rows($result);
	if($rows>0){
		$rs=mssql_fetch_array($result);
		$_SESSION['AdminNo']=$rs['AdminNo'];
		$_SESSION['AdminName']=$rs['AdminName'];
		SysLogs($ModuleName,$Action,'非法数据',$AdminNo,$db);
		echo "<script language='javascript'>alert('登录成功！');window.location.href='index.html';</script>";
		}else{
			SysLogs($ModuleName,$Action,'非法数据',$AdminNo,$db);
			echo "<script language='javascript'>alert('登录失败，用户名或密码错误！');window.history.back();</script>";
			}
}
if($Action=="ReLogin"){
	unset($_SESSION["UserName"]);
	echo "<script language='javascript'>alert('退出成功，感谢您对小二家的支持！');window.location.href='../index.php';</script>";
}else{
	SysLogs($ModuleName,'非法动作','非法数据','非法用户',$db);
	echo "<script language='javascript'>alert('错误！非法操作！');window.location.href='Login.php';</script>";
}
?>