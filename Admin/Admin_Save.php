<?php
include("inc/DBClass.php");
include("inc/Function.php");

$Action=$_GET['Action'];
$AdminNo=$_POST['AdminNo']; 		//�û���
$AdminName=$_POST['AdminName']; 	//����
$PassWord=md5($_POST['PassWord']);  //����
$UnitAuth=$_POST['UnitAuth']; 		//Ȩ��
$Remark=$_POST['Remark'];	  		//��ע

$ModuleName='����Ա��Ϣ�༭';

$CreateDate=date("Y-m-d H:i:s");
$UpdateDate=date("Y-m-d H:i:s");

$ID=$_GET['ID'];

//�޸��������������
$OldPassWord=md5($_POST['OldPassWord']); //������
$NewPassWord=md5($_POST['NewPassWord']); //������

if($Action=="Add"){	//���ӵķ���
	$sqlC="Select * from AdminInfo where AdminNo='".$AdminNo."'";
	$resultC=$db->db_query($sqlC);
	$rowsC=mssql_num_rows($resultC);
	if($rowsC>0){
		infoback($ModuleName,$Action,$sql,$AdminNo,$db,'����Ա�ʺ��Ѵ��ڣ����������룡');
		exit; 
	}else{
		$sql="Insert into AdminInfo(AdminNo,AdminName,PassWord,UnitAuth,CreateDate,Remark) values ('".$AdminNo."','".$AdminName."','".$PassWord."','".$UnitAuth."','".$CreateDate."','".$Remark."')";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'����Ա��ӳɹ���','����Ա���ʧ�ܣ�','Admin_Info.php');
	}
}else if($Action=="Edit"){	//�޸ĵķ���
		$sql="Update AdminInfo set AdminNo='".$AdminNo."',AdminName='".$AdminName."',UnitAuth='".$UnitAuth."',Remark='".$Remark."',UpdateDate='".$UpdateDate."' where ID=".$ID."";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'����Ա�޸ĳɹ���','����Ա�޸�ʧ�ܣ�','Admin_Info.php');
}else if($Action=="Del"){	//ɾ���ķ���
		$sql="Delete from AdminInfo where ID='".$ID."'";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'����Աɾ���ɹ���','����Աɾ��ʧ�ܣ�','Admin_Info.php');
}else if($Action=="Disable"){	//���õķ���
		$sql="Update AdminInfo set IsActive=0 where ID=".$ID."";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'����Ա���óɹ���','����Ա����ʧ�ܣ�','Admin_Info.php');
}else if($Action=="Enable"){	//���õķ���
		$sql="Update AdminInfo set IsActive=1 where ID=".$ID."";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'����Ա���óɹ���','����Ա����ʧ�ܣ�','Admin_Info.php');
}else if($Action=="DelAll"){ 	//����ɾ���ķ���
		if(isset($_POST['DelBox'])&&!empty($_POST['DelBox'])){	
		$ID=implode(",",$_POST['DelBox']);	
		$sql="Delete from AdminInfo where ID in(".$ID.")";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'����ɾ������Ա�ɹ���','����ɾ������Աʧ�ܣ�','Admin_Info.php');
}else{
	infoback($ModuleName,$Action,$sql,$AdminNo,$db,'��ѡ����Ҫɾ�������ݣ�');
	}
}else if($Action=="PassWordEdit"){	//�޸�����ķ���
		//�жϾ����������Ƿ���ȷ
		$sqlP="Select * from AdminInfo where AdminNo='".$_SESSION['AdminNo']."' and PassWord='".$OldPassWord."'";
		$resultP=$db->db_query($sqlP);
		$rowsC=mssql_num_rows($resultP);//ͳ�ƽ��
		//д����־ ����Function.php��ķ���
		SysLogs($ModuleName,$Action,$sqlP,$AdminNo,$db);
		if($rowsC>0){
			//�޸�����
			$sqlN="Update AdminInfo set PassWord='".$NewPassWord."' where AdminNo='".$_SESSION['AdminNo']."'";
			$resultN=$db->db_query($sqlN);
			if($resultN){
					echo "<script language='javascript'>alert('�����޸ĳɹ��������µ�¼��');top.location.href='Login.php';</script>";
				}else{
					echo "<script language='javascript'>alert('�����޸�ʧ�ܣ�');window.history.back();</script>";
				}
		}else{
			echo "<script language='javascript'>alert('����������������������룡');window.history.back();</script>";
		}
}else{
	//д����־
	infoerror($ModuleName,'�Ƿ�����','�Ƿ�����','�Ƿ��û�',$db,'error���Ƿ�������','Login.php');
}
?>