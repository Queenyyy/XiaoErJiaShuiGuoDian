<?php
include("Admin/inc/DBClass.php");
include("Admin/inc/Function.php");

$Action=$_GET['Action'];
$UserName=$_POST['UserName']; 		//�û���
$Name=$_POST['Name']; 				//��Ա����
$PassWord=md5($_POST['PassWord']); 	//����
$Remark=$_POST['Remark'];	  		//��ע
$Sex=$_POST['Sex'];			  		//�Ա�
$Grade=$_POST['Grade'];		  		//��Ա�ȼ�

$CreateDate=date("Y-m-d H:i:s");
$UpdateDate=date("Y-m-d H:i:s");

$ID=$_GET['ID'];

if($Action=="Login"){//��Ա��¼
	$sql="Select * from MembeInfo where UserName='".$UserName."' and PassWord='".$PassWord."' and IsActive=1";
	$result=$db->db_query($sql);
	$rows=mssql_num_rows($result);
	if($rows>0){
		$rs=mssql_fetch_array($result);
		$_SESSION['UserName']=$rs['UserName'];
			$_SESSION['Name']=$rs['Name'];
		echo "<script language='javascript'>alert('�𾴵Ļ�Ա��С���ҵ��̻�ӭ���Ĺ��٣�');window.location.href='index.php';</script>";
		}else{
			echo "<script language='javascript'>alert('�����û����������Ƿ����');window.history.back();</script>";
			}
}else if($Action=="Add"){//ע���Ա
	$sqlC="Select * from MembeInfo where UserName='".$UserName."'";
	$resultC=$db->db_query($sqlC);
	$rowsC=mssql_num_rows($resultC);
	if($rowsC>0){
		infoback($ModuleName,$Action,$sql,$AdminNo,$db,'�ʺ��Ѵ��ڣ����������룡');
		exit; 
	}else{
		$sql="Insert into MembeInfo(UserName,Name,PassWord,Sex,CreateDate,Grade,Remark) values ('".$UserName."','".$Name."','".$PassWord."','".$Sex."','".$CreateDate."','".$Grade."','".$Remark."')";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'��ϲ����ע��ɹ���','ע��ʧ�ܣ�','index.php');
	}
}else{
	echo "<script language='javascript'>alert('���󣡷Ƿ�������');window.location.href='Login.php';</script>";
}
?>