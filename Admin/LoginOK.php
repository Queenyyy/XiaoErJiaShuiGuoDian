<?php
include("inc/DBClass.php");
include("inc/Function.php");

$Action=$_GET['Action'];
$ModuleName='�û���¼';
$AdminNo=$_POST['AdminNo'];
$PassWord=md5($_POST['PassWord']);
$AdminName=$_POST['AdminName']; 	//����
$VCode=$_POST['VCode'];


$GetVcode=GetValue();
 

if($Action=="Login"){
	//�ж���֤�������Ƿ���ȷ   		window.history.back()������ʷ��¼��������ǰһ��ҳ��
	if($VCode!=$GetVcode){
		echo "<script language='javascript'>alert('��֤��������������룡');window.history.back();</script>";
		exit; //����
		}
	$sql="Select * from AdminInfo where AdminNo='".$AdminNo."' and PassWord='".$PassWord."' and IsActive=1";
	$result=$db->db_query($sql);
	$rows=mssql_num_rows($result);
	if($rows>0){
		$rs=mssql_fetch_array($result);
		$_SESSION['AdminNo']=$rs['AdminNo'];
		$_SESSION['AdminName']=$rs['AdminName'];
		SysLogs($ModuleName,$Action,'�Ƿ�����',$AdminNo,$db);
		echo "<script language='javascript'>alert('��¼�ɹ���');window.location.href='index.html';</script>";
		}else{
			SysLogs($ModuleName,$Action,'�Ƿ�����',$AdminNo,$db);
			echo "<script language='javascript'>alert('��¼ʧ�ܣ��û������������');window.history.back();</script>";
			}
}
if($Action=="ReLogin"){
	unset($_SESSION["UserName"]);
	echo "<script language='javascript'>alert('�˳��ɹ�����л����С���ҵ�֧�֣�');window.location.href='../index.php';</script>";
}else{
	SysLogs($ModuleName,'�Ƿ�����','�Ƿ�����','�Ƿ��û�',$db);
	echo "<script language='javascript'>alert('���󣡷Ƿ�������');window.location.href='Login.php';</script>";
}
?>