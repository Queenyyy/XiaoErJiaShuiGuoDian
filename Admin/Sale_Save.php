<?php
include("inc/DBClass.php");
include("inc/Function.php");

$Action=$_GET['Action'];
$SalesNo=$_POST['SalesNo'];		 	//���۱��
$FruitNo=$_POST['FruitNo']; 	//ˮ������
$Number=$_POST['Number'];	 		//������С����
$SalePrice=$_POST['SalePrice'];	 	//�۸�С����
$Remar=$_POST['Remar']; 		 	//��ע

$AdminNo=$_SESSION['AdminNo'];//������
$ModuleName='��Ʒ��Ϣ�༭';

$SaleTime=date("Y-m-d H:i:s");

$ID=$_GET['ID'];

if($Action=="Add"){	//���ӵķ���
	$sqlC="Select * from SaleInfo where SalesNo='".$SalesNo."'";
	$resultC=$db->db_query($sqlC);
	$rowsC=mssql_num_rows($resultC);
	if($rowsC>0){
		infoback($ModuleName,$Action,$sql,$AdminNo,$db,'����Ѵ��ڣ����������룡');
		exit; 
	}else{
		$sql="Insert into SaleInfo(SalesNo,FruitNo,Number,SalePrice,Remar,SaleTime) values ('".$SalesNo."','".$FruitNo."','".$Number."','".$SalePrice."','".$Remar."','".$SaleTime."')";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'������Ϣ��ӳɹ���','������Ϣ���ʧ�ܣ�','Sale_Info.php');
	}
}else if($Action=="Edit"){	//�޸ĵķ���
		$sql="Update SaleInfo set SalesNo='".$SalesNo."',FruitNo='".$FruitNo."',Number='".$Number."',SalePrice='".$SalePrice."',Remar='".$Remar."' where ID='".$ID."'";
		$result=$db->db_query($sql);
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'������Ϣ�޸ĳɹ���','������Ϣ�޸�ʧ�ܣ�','Sale_Info.php');
}else if($Action=="Del"){	//ɾ���ķ���
		$sql="Delete from SaleInfo where ID='".$ID."'";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'������Ϣɾ���ɹ���','������Ϣɾ��ʧ�ܣ�','Sale_Info.php');
}else if($Action=="DelAll"){ 	//����ɾ���ķ���
		if(isset($_POST['DelBox'])&&!empty($_POST['DelBox'])){	
		$ID=implode(",",$_POST['DelBox']);
		$sql="Delete from SaleInfo where ID in(".$ID.")";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'����ɾ��������Ϣ�ɹ���','����ɾ��������Ϣʧ�ܣ�','Sale_Info.php');
}else{
	infoback($ModuleName,$Action,$sql,$AdminNo,$db,'��ѡ����Ҫɾ�������ݣ�');
	}
}else{
	infoerror($ModuleName,'�Ƿ�����','�Ƿ�����','�Ƿ��û�',$db,'error���Ƿ�������','Login.php');
}
?>