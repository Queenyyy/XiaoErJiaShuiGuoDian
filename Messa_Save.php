<?php
include("Admin/inc/DBClass.php");
include("Admin/inc/Function.php");
//���԰�
$Action=$_GET['Action'];
$Cont=$_POST['Cont'];
$Phone=$_POST['Phone'];
$Addr=$_POST['Addr'];
$Fruits=$_POST['Fruits'];
$CreateDate=date("Y-m-d H:i:s");

$ID=$_GET['ID'];

//�������
if($Action=="Add"){
	$sql="Insert into MessageInfo(UserName,CreateDate,Cont,Phone,Addr,Fruits) values('".$_SESSION['Name']."','".$CreateDate."','".$Cont."','".$Phone."','".$Addr."','".$Fruits."')";
	$result=$db->db_query($sql);
	if($result){
	 echo "<script language='javascript'> alert('���Գɹ���');window.location.href='index.php';</script>";
	}else{
	 echo "<script language='javascript'> alert('����ʧ�ܣ�');</script>";
	}
}else{
    echo "<script language='javascript'> alert('�Ƿ��ύ���ݣ�');window.location.href='index.php';</script>";
}

?>