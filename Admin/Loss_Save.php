<?php
include("inc/DBClass.php");
include("inc/Function.php");

$Action=$_GET['Action'];
$LossNo=$_POST['LossNo'];		 	//������
$FruitNo=$_POST['FruitNo']; 	//ˮ������
$LossPrice=$_POST['LossPrice'];	 	//������С����
$Remar=$_POST['Remar']; 		 	//��ע

$AdminNo=$_SESSION['AdminNo'];//������
$ModuleName='��Ʒ��Ϣ�༭';

$LossTime=date("Y-m-d H:i:s");

$ID=$_GET['ID'];

if($Action=="Add"){	//���ӵķ���
	$sqlC="Select * from LossInfo where LossNo='".$LossNo."'";
	$resultC=$db->db_query($sqlC);
	$rowsC=mssql_num_rows($resultC);
	if($rowsC>0){
		infoback($ModuleName,$Action,$sql,$AdminNo,$db,'����Ѵ��ڣ����������룡');
		exit; 
	}else{
		$sql="Insert into LossInfo(LossNo,FruitNo,LossPrice,Remar,LossTime) values ('".$LossNo."','".$FruitNo."','".$LossPrice."','".$Remar."','".$LossTime."')";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'������Ϣ��ӳɹ���','������Ϣ���ʧ�ܣ�','Loss_Info.php');
	}
}else if($Action=="Edit"){	//�޸ĵķ���
		$sql="Update LossInfo set LossNo='".$LossNo."',FruitNo='".$FruitNo."',LossPrice='".$LossPrice."',Remar='".$Remar."' where ID='".$ID."'";
		$result=$db->db_query($sql);
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'������Ϣ�޸ĳɹ���','������Ϣ�޸�ʧ�ܣ�','Loss_Info.php');
}else if($Action=="Del"){	//ɾ���ķ���
		$sql="Delete from LossInfo where ID='".$ID."'";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'������Ϣɾ���ɹ���','������Ϣɾ��ʧ�ܣ�','Loss_Info.php');
}else if($Action=="DelAll"){ 	//����ɾ���ķ���
		if(isset($_POST['DelBox'])&&!empty($_POST['DelBox'])){	
		$ID=implode(",",$_POST['DelBox']);
		$sql="Delete from LossInfo where ID in(".$ID.")";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'����ɾ��������Ϣ�ɹ���','����ɾ��������Ϣʧ�ܣ�','Loss_Info.php');
}else{
	infoback($ModuleName,$Action,$sql,$AdminNo,$db,'��ѡ����Ҫɾ�������ݣ�');
	}
}else{
	infoerror($ModuleName,'�Ƿ�����','�Ƿ�����','�Ƿ��û�',$db,'error���Ƿ�������','Login.php');
}
?>