<?
include("inc/DBClass.php");

$Action=$_GET['Action'];
$ContR=$_POST['ContR'];
$StoreName=$_POST['StoreName'];
$CreateDateR=date("Y-m-d H:i:s");
$ID=$_GET['ID'];

if($Action=="Add"){
	$sql="Insert into ReplyInfo(MessageNoR,UserNameR,ContR,StoreName,CreateDateR) values('".$ID."','".$_SESSION['AdminNo']."','".$ContR."','".$StoreName."','".$CreateDateR."')";
	$result=$db->db_query($sql);
   if($result){
	echo "<script language='javascript'> alert('�ظ��ɹ�!');window.location.href='Message_Info.php';</script>";
   }else{
	echo "<script language='javascript'> alert( �ظ�ʧ��!');window.location.href='Message_Info.php';</script>";	
   }
}else{
 echo "<script language='javascript'> alert('�Ƿ��ύ���ݣ�');window.location.href='Login.php';</script>";
}

?>