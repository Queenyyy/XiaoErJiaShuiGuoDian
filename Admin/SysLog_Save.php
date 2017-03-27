<?php
include("inc/DBClass.php");
include("inc/Function.php");

$Action=$_GET['Action'];
$ID=$_GET['ID'];
$AdminNo=$_POST['AdminNo'];

$ModuleName='日志信息编辑';
$AdminNo=$_SESSION['AdminNo'];//操作人

if($Action=="Del"){	//删除的方法
		$sql="Delete from SysLogInfo where ID='".$ID."'";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'日志删除成功！','日志删除失败！','SysLog_Info.php');
}else if($Action=="DelAll"){ 	//批量删除的方法
		if(isset($_POST['DelBox'])&&!empty($_POST['DelBox'])){	
		$ID=implode(",",$_POST['DelBox']);
		$sql="Delete from SysLogInfo where ID in(".$ID.")";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'日志批量删除成功！','日志批量删除失败！','SysLog_Info.php');
}else{
	infoback($ModuleName,$Action,$sql,$AdminNo,$db,'请选择需要删除的数据！');
	}
}else{
	infoerror($ModuleName,'非法动作','非法数据','非法用户',$db,'error：非法动作！','Login.php');
}
?>