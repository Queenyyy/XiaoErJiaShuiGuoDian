<?php
include("inc/DBClass.php");
include("inc/Function.php");

$Action=$_GET['Action'];
$StoreNo=$_POST['StoreNo']; 		//�ŵ���
$StoreName=$_POST['StoreName']; 	//����
$Addr=$_POST['Addr'];				//��ַ
$Telephone=$_POST['Telephone']; 	//��ϵ��ʽ
$Manager=$_POST['Manager'];			//������
$Remar=$_POST['Remar']; 			//��ע

$AdminNo=$_SESSION['AdminNo'];//������
$ModuleName='�ŵ���Ϣ�༭';

$ID=$_GET['ID'];

if($Action=="Add"){	//���ӵķ���
	$sql="Select * from StoreInfo where StoreNo='".$StoreNo."'";
	$result=$db->db_query($sql);
	$rows=mssql_num_rows($result);
	if($rows>0){
		infoback($ModuleName,$Action,$sql,$AdminNo,$db,'�ŵ����Ѵ��ڣ����������룡');
		exit; 
	}else{
		$sql="Insert into StoreInfo(StoreNo,StoreName,Addr,Telephone,Manager,Remar) values ('".$StoreNo."','".$StoreName."','".$Addr."','".$Telephone."','".$Manager."','".$Remar."')";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'�ŵ���ӳɹ���','�ŵ����ʧ�ܣ�','Store_Info.php');
	}
}else if($Action=="Edit"){	//�޸ĵķ���
		$sql="Update StoreInfo set StoreNo='".$StoreNo."',StoreName='".$StoreName."',Addr='".$Addr."',Telephone='".$Telephone."',Manager='".$Manager."',Remar='".$Remar."' where ID='".$ID."'";
		$result=$db->db_query($sql);
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'�ŵ��޸ĳɹ���','�ŵ��޸�ʧ�ܣ�','Store_Info.php');
}else if($Action=="Del"){	//ɾ���ķ���
		$sql="Delete from StoreInfo where ID='".$ID."'";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'�ŵ�ɾ���ɹ���','�ŵ�ɾ��ʧ�ܣ�','Store_Info.php');
}else if($Action=="DelAll"){ 	//����ɾ���ķ���
		if(isset($_POST['DelBox'])&&!empty($_POST['DelBox'])){	
		$ID=implode(",",$_POST['DelBox']);	
		$sql="Delete from StoreInfo where ID in(".$ID.")";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'����ɾ���ŵ�ɹ���','����ɾ���ŵ�ʧ�ܣ�','Store_Info.php');
}else{
	infoback($ModuleName,$Action,$sql,$AdminNo,$db,'��ѡ����Ҫɾ�������ݣ�');
	}
}else{
	infoerror($ModuleName,'�Ƿ�����','�Ƿ�����','�Ƿ��û�',$db,'error���Ƿ�������','Login.php');
}
?>