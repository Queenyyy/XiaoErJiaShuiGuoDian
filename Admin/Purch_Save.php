<?php
include("inc/DBClass.php");
include("inc/Function.php");

$Action=$_GET['Action'];
$PurchaseNo=$_POST['PurchaseNo'];	//�������
$FruitNo=$_POST['FruitNo']; 		//ˮ������
$Number=$_POST['Number'];	 		//������С����
$PurchPrice=$_POST['PurchPrice'];	 //���ۣ�С����
$Remar=$_POST['Remar']; 		 	//��ע 
$SupplierNo=$_POST['SupplierNo'];	//������
$EmployeeNo=$_POST['EmployeeNo'];	//������

$AdminNo=$_SESSION['AdminNo'];//������
$ModuleName='��Ʒ��Ϣ�༭';

$PurcTime=date("Y-m-d H:i:s");

$ID=$_GET['ID'];

if($Action=="Add"){	//���ӵķ���
	$sqlC="Select * from Purchase where PurchaseNo='".$PurchaseNo."'";
	$resultC=$db->db_query($sqlC);
	$rowsC=mssql_num_rows($resultC);
	if($rowsC>0){
		infoback($ModuleName,$Action,$sql,$AdminNo,$db,'����Ѵ��ڣ����������룡');
		exit; 
	}else{
		$sql="Insert into Purchase(PurchaseNo,FruitNo,Number,PurchPrice,Remar,PurcTime,SupplierNo,EmployeeNo) values ('".$PurchaseNo."','".$FruitNo."','".$Number."','".$PurchPrice."','".$Remar."','".$PurcTime."','".$SupplierNo."','".$EmployeeNo."')";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'������Ϣ��ӳɹ���','������Ϣ���ʧ�ܣ�','Purch_Info.php');
	}
}else if($Action=="Edit"){	//�޸ĵķ���
		$sql="Update Purchase set PurchaseNo='".$PurchaseNo."',FruitNo='".$FruitNo."',Number='".$Number."',PurchPrice='".$PurchPrice."',Remar='".$Remar."',SupplierNo='".$SupplierNo."',EmployeeNo='".$EmployeeNo."' where ID='".$ID."'";
		$result=$db->db_query($sql);
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'������Ϣ�޸ĳɹ���','������Ϣ�޸�ʧ�ܣ�','Purch_Info.php');
}else if($Action=="Del"){	//ɾ���ķ���
		$sql="Delete from Purchase where ID='".$ID."'";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'������Ϣɾ���ɹ���','������Ϣɾ��ʧ�ܣ�','Purch_Info.php');
}else if($Action=="DelAll"){ 	//����ɾ���ķ���
		if(isset($_POST['DelBox'])&&!empty($_POST['DelBox'])){	
		$ID=implode(",",$_POST['DelBox']);
		$sql="Delete from Purchase where ID in(".$ID.")";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'����ɾ��������Ϣ�ɹ���','����ɾ��������Ϣʧ�ܣ�','Purch_Info.php');
}else{
	infoback($ModuleName,$Action,$sql,$AdminNo,$db,'��ѡ����Ҫɾ�������ݣ�');
	}
}else{
	infoerror($ModuleName,'�Ƿ�����','�Ƿ�����','�Ƿ��û�',$db,'error���Ƿ�������','Login.php');
}
?>