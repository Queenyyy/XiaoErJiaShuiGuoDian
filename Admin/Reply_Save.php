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
	echo "<script language='javascript'> alert('回复成功!');window.location.href='Message_Info.php';</script>";
   }else{
	echo "<script language='javascript'> alert( 回复失败!');window.location.href='Message_Info.php';</script>";	
   }
}else{
 echo "<script language='javascript'> alert('非法提交数据！');window.location.href='Login.php';</script>";
}

?>