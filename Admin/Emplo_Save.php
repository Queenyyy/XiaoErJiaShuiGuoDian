<?php
include("inc/DBClass.php");
include("inc/Function.php");

$Action=$_GET['Action'];
$EmployeeNo=$_POST['EmployeeNo'];		 //员工编号
$EmployeeName=$_POST['EmployeeName']; 	 //姓名
$Sex=$_POST['Sex'];	 					 //性别
$EntryTime=$_POST['EntryTime']; 		 //入职时间
$Position=$_POST['Position'];			 //职位
$Phone=$_POST['Phone']; 				 //联系方式
$StoreNo=$_POST['StoreNo'];				 //所在门店

$AdminNo=$_SESSION['AdminNo'];//操作人
$ModuleName='员工信息编辑';

$EntryTime=date("Y-m-d H:i:s");

$ID=$_GET['ID'];

if($Action=="Add"){	//增加的方法
	$sqlC="Select * from Employee where EmployeeName='".$EmployeeName."'";
	$resultC=$db->db_query($sqlC);
	$rowsC=mssql_num_rows($resultC);
	if($rowsC>0){
		infoback($ModuleName,$Action,$sql,$AdminNo,$db,'员工姓名已存在，请重新输入！');
		exit; 
	}else{
		$sql="Insert into Employee(EmployeeNo,EmployeeName,Sex,EntryTime,Position,Phone,StoreNo) values ('".$EmployeeNo."','".$EmployeeName."','".$Sex."','".$EntryTime."','".$Position."','".$Phone."','".$StoreNo."')";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'员工添加成功！','员工添加失败！','Emplo_Info.php');
	}
}else if($Action=="Edit"){	//修改的方法
		$sql="Update Employee set EmployeeNo='".$EmployeeNo."',EmployeeName='".$EmployeeName."',Sex='".$Sex."',EntryTime='".$EntryTime."',Position='".$Position."',Phone='".$Phone."',StoreNo='".$StoreNo."' where ID='".$ID."'";
		$result=$db->db_query($sql);
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'员工修改成功！','员工修改失败！','Emplo_Info.php');
}else if($Action=="Del"){	//删除的方法
		$sql="Delete from Employee where ID='".$ID."'";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'员工删除成功！','员工删除失败！','Emplo_Info.php');
}else if($Action=="DelAll"){ 	//批量删除的方法
		if(isset($_POST['DelBox'])&&!empty($_POST['DelBox'])){	
		$ID=implode(",",$_POST['DelBox']);
		$sql="Delete from Employee where ID in(".$ID.")";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'批量删除员工成功！','批量删除员工失败！','Emplo_Info.php');
}else{
	infoback($ModuleName,$Action,$sql,$AdminNo,$db,'请选择需要删除的数据！');
	}
}else{
	infoerror($ModuleName,'非法动作','非法数据','非法用户',$db,'error：非法动作！','Login.php');
}
?>