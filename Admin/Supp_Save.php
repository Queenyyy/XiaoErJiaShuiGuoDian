<?php
include("inc/DBClass.php");
include("inc/Function.php");

$Action=$_GET['Action'];
$SupplierNo=$_POST['SupplierNo']; 		//�����̱��
$SupplierName=$_POST['SupplierName']; 	//����������
$Addr=$_POST['Addr']; 					//��ַ
$Phone=$_POST['Phone'];	  				//��ϵ�绰
$Remar=$_POST['Remar'];	  				//��ע

$AdminNo=$_SESSION['AdminNo'];			//������
$ModuleName='��������Ϣ�༭';

$ID=$_GET['ID'];

if($Action=="Add"){	//���ӵķ���
	$sqlC="Select * from SuppliInfo where SupplierName='".$SupplierName."'";
	$resultC=$db->db_query($sqlC);
	$rowsC=mssql_num_rows($resultC);
	if($rowsC>0){
		infoback($ModuleName,$Action,$sql,$AdminNo,$db,'�������Ѵ��ڣ����������룡');
		exit; 
	}else{
		$sql="Insert into SuppliInfo(SupplierNo,SupplierName,Addr,Phone,Remar) values ('".$SupplierNo."','".$SupplierName."','".$Addr."','".$Phone."','".$Remar."')";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'��������ӳɹ���','���������ʧ�ܣ�','Supp_Info.php');
	}
}else if($Action=="Edit"){	//�޸ĵķ���
		$sql="Update SuppliInfo set SupplierNo='".$SupplierNo."',SupplierName='".$SupplierName."',Addr='".$Addr."',Phone='".$Phone."',Remar='".$Remar."' where ID=".$ID."";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'�������޸ĳɹ���','�������޸�ʧ�ܣ�','Supp_Info.php');
}else if($Action=="Del"){	//ɾ���ķ���
		$sql="Delete from SuppliInfo where ID='".$ID."'";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'������ɾ���ɹ���','������ɾ��ʧ�ܣ�','Supp_Info.php');
}else if($Action=="DelAll"){ 	//����ɾ���ķ���
		if(isset($_POST['DelBox'])&&!empty($_POST['DelBox'])){	
		$ID=implode(",",$_POST['DelBox']);	
		$sql="Delete from SuppliInfo where ID in(".$ID.")";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'����ɾ�������̳ɹ���','����ɾ��������ʧ�ܣ�','Admin_Info.php');
}else{
	infoback($ModuleName,$Action,$sql,$AdminNo,$db,'��ѡ����Ҫɾ�������ݣ�');
	}
}else{
	infoerror($ModuleName,'�Ƿ�����','�Ƿ�����','�Ƿ��û�',$db,'error���Ƿ�������','Login.php');
}
?>