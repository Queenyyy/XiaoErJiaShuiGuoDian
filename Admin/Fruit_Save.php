<?php
include("inc/DBClass.php");
include("inc/Function.php");

$Action=$_GET['Action'];
$FruitNo=$_POST['FruitNo']; 		//��Ʒ���
$FruitName=$_POST['FruitName']; 	//ˮ������
$FruitTypeNo=$_POST['FruitTypeNo'];	//ˮ�����
$SupplierNo=$_POST['SupplierNo'];	//������
$Remar=$_POST['Remar']; 		 	//��ע 

$AdminNo=$_SESSION['AdminNo'];//������
$ModuleName='��Ʒ��Ϣ�༭';

$ID=$_GET['ID'];

if($Action=="Add"){	//���ӵķ���
	$sqlC="Select * from FruitInfo where FruitNo='".$FruitNo."'";
	$resultC=$db->db_query($sqlC);
	$rowsC=mssql_num_rows($resultC);
	if($rowsC>0){
		infoback($ModuleName,$Action,$sql,$AdminNo,$db,'����Ѵ��ڣ����������룡');
		exit; 
	}else{
		$sql="Insert into FruitInfo(FruitNo,FruitName,FruitTypeNo,SupplierNo,Remar) values ('".$FruitNo."','".$FruitName."','".$FruitTypeNo."','".$SupplierNo."','".$Remar."')";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'��Ʒ��Ϣ��ӳɹ���','��Ʒ��Ϣ���ʧ�ܣ�','Fruit_Info.php');
	}
}else if($Action=="Edit"){	//�޸ĵķ���
		$sql="Update FruitInfo set FruitNo='".$FruitNo."',FruitName='".$FruitName."',FruitTypeNo='".$FruitTypeNo."',SupplierNo='".$SupplierNo."',Remar='".$Remar."' where ID='".$ID."'";
		$result=$db->db_query($sql);
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'��Ʒ��Ϣ�޸ĳɹ���','��Ʒ��Ϣ�޸�ʧ�ܣ�','Fruit_Info.php');
}else if($Action=="Del"){	//ɾ���ķ���
		$sql="Delete from FruitInfo where ID='".$ID."'";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'��Ʒ��Ϣɾ���ɹ���','��Ʒ��Ϣɾ��ʧ�ܣ�','Fruit_Info.php');
}else if($Action=="DelAll"){ 	//����ɾ���ķ���
		if(isset($_POST['DelBox'])&&!empty($_POST['DelBox'])){	
		$ID=implode(",",$_POST['DelBox']);
		$sql="Delete from FruitInfo where ID in(".$ID.")";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'����ɾ����Ʒ��Ϣ�ɹ���','����ɾ����Ʒ��Ϣʧ�ܣ�','Fruit_Info.php');
}else{
	infoback($ModuleName,$Action,$sql,$AdminNo,$db,'��ѡ����Ҫɾ�������ݣ�');
	}
}else{
	infoerror($ModuleName,'�Ƿ�����','�Ƿ�����','�Ƿ��û�',$db,'error���Ƿ�������','Login.php');
}
?>