<?php
include("inc/DBClass.php");
include("inc/Function.php");

$Action=$_GET['Action'];
$EmployeeNo=$_POST['EmployeeNo'];		 //Ա�����
$EmployeeName=$_POST['EmployeeName']; 	 //����
$Sex=$_POST['Sex'];	 					 //�Ա�
$EntryTime=$_POST['EntryTime']; 		 //��ְʱ��
$Position=$_POST['Position'];			 //ְλ
$Phone=$_POST['Phone']; 				 //��ϵ��ʽ
$StoreNo=$_POST['StoreNo'];				 //�����ŵ�

$AdminNo=$_SESSION['AdminNo'];//������
$ModuleName='Ա����Ϣ�༭';

$EntryTime=date("Y-m-d H:i:s");

$ID=$_GET['ID'];

if($Action=="Add"){	//���ӵķ���
	$sqlC="Select * from Employee where EmployeeName='".$EmployeeName."'";
	$resultC=$db->db_query($sqlC);
	$rowsC=mssql_num_rows($resultC);
	if($rowsC>0){
		infoback($ModuleName,$Action,$sql,$AdminNo,$db,'Ա�������Ѵ��ڣ����������룡');
		exit; 
	}else{
		$sql="Insert into Employee(EmployeeNo,EmployeeName,Sex,EntryTime,Position,Phone,StoreNo) values ('".$EmployeeNo."','".$EmployeeName."','".$Sex."','".$EntryTime."','".$Position."','".$Phone."','".$StoreNo."')";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'Ա����ӳɹ���','Ա�����ʧ�ܣ�','Emplo_Info.php');
	}
}else if($Action=="Edit"){	//�޸ĵķ���
		$sql="Update Employee set EmployeeNo='".$EmployeeNo."',EmployeeName='".$EmployeeName."',Sex='".$Sex."',EntryTime='".$EntryTime."',Position='".$Position."',Phone='".$Phone."',StoreNo='".$StoreNo."' where ID='".$ID."'";
		$result=$db->db_query($sql);
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'Ա���޸ĳɹ���','Ա���޸�ʧ�ܣ�','Emplo_Info.php');
}else if($Action=="Del"){	//ɾ���ķ���
		$sql="Delete from Employee where ID='".$ID."'";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'Ա��ɾ���ɹ���','Ա��ɾ��ʧ�ܣ�','Emplo_Info.php');
}else if($Action=="DelAll"){ 	//����ɾ���ķ���
		if(isset($_POST['DelBox'])&&!empty($_POST['DelBox'])){	
		$ID=implode(",",$_POST['DelBox']);
		$sql="Delete from Employee where ID in(".$ID.")";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'����ɾ��Ա���ɹ���','����ɾ��Ա��ʧ�ܣ�','Emplo_Info.php');
}else{
	infoback($ModuleName,$Action,$sql,$AdminNo,$db,'��ѡ����Ҫɾ�������ݣ�');
	}
}else{
	infoerror($ModuleName,'�Ƿ�����','�Ƿ�����','�Ƿ��û�',$db,'error���Ƿ�������','Login.php');
}
?>