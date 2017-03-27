<?
include("inc/DBClass.php");
include("inc/Function.php");

$Action=$_GET['Action'];
$Cont=$_POST['Cont'];
$Phone=$_POST['Phone'];
$Addr=$_POST['Addr'];
$Fruits=$_POST['Fruits'];
$CreateDate=date("Y-m-d H:i:s");
$ID=$_GET['ID'];

//添加留言
if($Action=="Add"){
	$sql="Insert into MessageInfo(UserNameR,CreateDate,Cont,Phone,Addr,Fruits) values('".$_SESSION['AdminNo']."','".$CreateDate."','".$Cont."','".$Phone."','".$Addr."','".$Fruits."')";
	$result=$db->db_query($sql);
	if($result){
	 echo "<script language='javascript'> alert('留言成功！');window.location.href='Message_Info.php';</script>";
	}else{
	 echo "<script language='javascript'> alert('留言失败！');</script>";
	}
}else{
    echo "<script language='javascript'> alert('非法提交数据！');window.location.href='Login.php';</script>";
}

?>