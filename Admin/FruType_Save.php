<?php
include("inc/DBClass.php");
include("inc/Function.php");

$Action=$_GET['Action'];
$FruitTypeNo=$_POST['FruitTypeNo']; 		//������
$FruitTypeName=$_POST['FruitTypeName'];		//�������
$Remar=$_POST['Remar'];	  					//��ע

$AdminNo=$_SESSION['AdminNo'];//������
$ModuleName='������Ϣ�༭';

$ID=$_GET['ID'];

if($Action=="Add"){	//���ӵķ���
	$sqlA="Select * from FruitType where FruitTypeName='".$FruitTypeName."'";
	$resultA=$db->db_query($sqlA);
	$rowsA=mssql_num_rows($resultA);
	if($rowsA>0){
		infoback($ModuleName,$Action,$sql,$AdminNo,$db,'���������Ѵ��ڣ����������룡');
		exit; 
	}else{
		$sql="Insert into FruitType(FruitTypeNo,FruitTypeName,Remar) values ('".$FruitTypeNo."','".$FruitTypeName."','".$Remar."')";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'������ӳɹ���','�������ʧ�ܣ�','FruType_Info.php');
	}
}else if($Action=="Edit"){ //�޸ĵķ���
		$sql="Update FruitType set FruitTypeNo='".$FruitTypeNo."',FruitTypeName='".$FruitTypeName."',Remar='".$Remar."' where ID=".$ID."";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'�����޸ĳɹ���','�����޸�ʧ�ܣ�','FruType_Info.php');
}else if($Action=="Del"){	//ɾ���ķ���
		$sql="Delete from FruitType where ID='".$ID."'";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'����ɾ���ɹ���','����ɾ��ʧ�ܣ�','FruType_Info.php');
}else if($Action=="Disable"){	//���õķ���
		$sql="Update FruitType set IsActive=0 where ID=".$ID."";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'״̬�޸ĳɹ���','״̬�޸�ʧ�ܣ�','FruType_Info.php');
}else if($Action=="Enable"){	//���õķ���
		$sql="Update FruitType set IsActive=1 where ID=".$ID."";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'״̬�޸ĳɹ���','״̬�޸�ʧ�ܣ�','FruType_Info.php');
}else if($Action=="DelAll"){ 	//����ɾ���ķ���
		if(isset($_POST['DelBox'])&&!empty($_POST['DelBox'])){	
		$ID=implode(",",$_POST['DelBox']);	
		$sql="Delete from FruitType where ID in(".$ID.")";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'����ɾ�����ɹ���','����ɾ�����ʧ�ܣ�','FruType_Info.php');
}else{
	infoback($ModuleName,$Action,$sql,$AdminNo,$db,'��ѡ����Ҫɾ�������ݣ�');
	}
}else{
	infoerror($ModuleName,'�Ƿ�����','�Ƿ�����','�Ƿ��û�',$db,'error���Ƿ�������','Login.php');
}
?>