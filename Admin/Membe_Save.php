<?php
include("inc/DBClass.php");
include("inc/Function.php");

$Action=$_GET['Action'];
$UserName=$_POST['UserName']; 		//�û���
$Name=$_POST['Name']; 				//��Ա����
$PassWord=md5($_POST['PassWord']); 	//����
$Remark=$_POST['Remark'];	  		//��ע
$Sex=$_POST['Sex'];			  		//�Ա�
$Grade=$_POST['Grade'];		  		//��Ա�ȼ�

$AdminNo=$_SESSION['AdminNo'];//������
$ModuleName='��Ա��Ϣ�༭';

$CreateDate=date("Y-m-d H:i:s");
$UpdateDate=date("Y-m-d H:i:s");

$ID=$_GET['ID'];


if($Action=="Add"){	//���ӵķ���
	$sqlC="Select * from MembeInfo where UserName='".$UserName."'";
	$resultC=$db->db_query($sqlC);
	$rowsC=mssql_num_rows($resultC);
	if($rowsC>0){
		infoback($ModuleName,$Action,$sql,$AdminNo,$db,'��Ա�Ѵ��ڣ����������룡');
		exit; 
	}else{
		//����SQL
		$sql="Insert into MembeInfo(UserName,Name,PassWord,Sex,CreateDate,Grade,Remark) values ('".$UserName."','".$Name."','".$PassWord."','".$Sex."','".$CreateDate."','".$Grade."','".$Remark."')";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'��Ա��ӳɹ���','��Ա���ʧ�ܣ�','Membe_Info.php');
	}
}else if($Action=="Edit"){	//�޸ĵķ���
		$sql="Update MembeInfo set UserName='".$UserName."',Name='".$Name."',Sex='".$Sex."',Grade='".$Grade."',UpdateDate='".$UpdateDate."',Remark='".$Remark."' where ID=".$ID."";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'��Ա�޸ĳɹ���','��Ա�޸�ʧ�ܣ�','Membe_Info.php');
}else if($Action=="Del"){	//ɾ���ķ���
		$sql="Delete from MembeInfo where ID='".$ID."'";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'��Աɾ���ɹ���','��Աɾ��ʧ�ܣ�','Membe_Info.php');
}else if($Action=="Disable"){	//���õķ���
		$sql="Update MembeInfo set IsActive=0 where ID=".$ID."";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'��Ա���óɹ���','��Ա����ʧ�ܣ�','Membe_Info.php');
}else if($Action=="Enable"){	//���õķ���
		$sql="Update MembeInfo set IsActive=1 where ID=".$ID."";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'��Ա���óɹ���','��Ա����ʧ�ܣ�','Membe_Info.php');
}else if($Action=="DelAll"){ 	//����ɾ���ķ���
		if(isset($_POST['DelBox'])&&!empty($_POST['DelBox'])){	
		$ID=implode(",",$_POST['DelBox']);	
		$sql="Delete from MembeInfo where ID in(".$ID.")";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'����ɾ����Ա�ɹ���','����ɾ����Աʧ�ܣ�','Membe_Info.php');
}else{
	infoback($ModuleName,$Action,$sql,$AdminNo,$db,'��ѡ����Ҫɾ�������ݣ�');
	}
}else{
	infoerror($ModuleName,'�Ƿ�����','�Ƿ�����','�Ƿ��û�',$db,'error���Ƿ�������','Login.php');
}
?>