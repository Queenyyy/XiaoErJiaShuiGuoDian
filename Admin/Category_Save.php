<?php
include("inc/DBClass.php");
include("inc/Function.php");

$Action=$_GET['Action'];
$CategoryNo=$_POST['CategoryNo']; 		//�����
$CategoryName=$_POST['CategoryName'];	//�������
$Description=$_POST['Description'];	  	//��ע

$AdminNo=$_SESSION['AdminNo'];//������
$ModuleName='�����Ϣ�༭';

$ID=$_GET['ID'];

if($Action=="Add"){	//���ӵķ���
	$sqlA="Select * from Category where CategoryName='".$CategoryName."'";
	$resultA=$db->db_query($sqlA);
	$rowsA=mssql_num_rows($resultA);
	if($rowsA>0){
		infoback($ModuleName,$Action,$sql,$AdminNo,$db,'��������Ѵ��ڣ����������룡');
		exit; 
	}else{
		$sql="Insert into Category(CategoryNo,CategoryName,Description) values ('".$CategoryNo."','".$CategoryName."','".$Description."')";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'�����ӳɹ���','������ʧ�ܣ�','Category_Info.php');
	}
}else if($Action=="Edit"){ //�޸ĵķ���
		$sql="Update Category set CategoryNo='".$CategoryNo."',CategoryName='".$CategoryName."',Description='".$Description."' where ID=".$ID."";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'����޸ĳɹ���','����޸�ʧ�ܣ�','Category_Info.php');
}else if($Action=="Del"){	//ɾ���ķ���
		$sql="Delete from Category where ID='".$ID."'";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'���ɾ���ɹ���','���ɾ��ʧ�ܣ�','Category_Info.php');
}else if($Action=="Disable"){	//���õķ���
		$sql="Update Category set IsActive=0 where ID=".$ID."";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'�����óɹ���','������ʧ�ܣ�','Category_Info.php');
}else if($Action=="Enable"){	//���õķ���
		$sql="Update Category set IsActive=1 where ID=".$ID."";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'������óɹ���','�������ʧ�ܣ�','Category_Info.php');
}else if($Action=="DelAll"){ 	//����ɾ���ķ���
		if(isset($_POST['DelBox'])&&!empty($_POST['DelBox'])){	
		$ID=implode(",",$_POST['DelBox']);	
		$sql="Delete from Category where ID in(".$ID.")";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'����ɾ�����ɹ���','����ɾ�����ʧ�ܣ�','Category_Info.php');
}else{
	infoback($ModuleName,$Action,$sql,$AdminNo,$db,'��ѡ����Ҫɾ�������ݣ�');
	}
}else{
	infoerror($ModuleName,'�Ƿ�����','�Ƿ�����','�Ƿ��û�',$db,'error���Ƿ�������','Login.php');
}
?>