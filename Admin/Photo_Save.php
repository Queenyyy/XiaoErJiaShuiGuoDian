<?php
include("inc/DBClass.php");
include("inc/Function.php");

$Action=$_GET['Action'];
$PhotoTitle=$_POST['PhotoTitle']; 					//ͼƬ����
$PhotoContent=urlencode($_POST['PhotoContent']);	//ͼƬ����
$CategoryNo=$_POST['CategoryNo'];					//���
$KeyWords=$_POST['KeyWords'];						//�ؼ���
$Author=$_SESSION['Author'];						//������
$IsTop=$_POST['IsTop'];								//�ö�
$AdminNo=$_SESSION['AdminNo'];//������
$ModuleName='ͼƬ��Ϣ�༭';

//��ȡͼƬ·��
if($_POST['BImgpath']==""){
	$ImgPath="noimg.jpg";
}else{
	$ImgPath=$_POST['BImgpath'];	
}	

$CreateDate=date("Y-m-d H:i:s");
$UpdateDate=date("Y-m-d H:i:s");

$ID=$_GET['ID'];

if($Action=="Add"){	//���ӵķ���
	$sql="Select * from PhotoInfo where PhotoTitle='".$PhotoTitle."'";
	$result=$db->db_query($sql);
	$rows=mssql_num_rows($result);
	if($rows>0){
		infoback($ModuleName,$Action,$sql,$AdminNo,$db,'ͼƬ�����Ѵ��ڣ����������룡');
		exit; 
	}else{
		$sql="Insert into PhotoInfo(PhotoTitle,PhotoContent,KeyWords,CategoryNo,Author,CreateDate,ImgPath) values ('".$PhotoTitle."','".$PhotoContent."','".$KeyWords."','".$CategoryNo."','".$Author."','".$CreateDate."','".$ImgPath."')";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'ͼƬ��ӳɹ���','ͼƬ���ʧ�ܣ�','Photo_Info.php');
	}
}else if($Action=="Edit"){	//�޸ĵķ���
		$sql="Update PhotoInfo set PhotoTitle='".$PhotoTitle."',KeyWords='".$KeyWords."',CategoryNo='".$CategoryNo."',ImgPath='".$ImgPath."',PhotoContent='".$PhotoContent."',UpdateDate='".$UpdateDate."',Author='".$Author."' where ID=".$ID."";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'ͼƬ�޸ĳɹ���','ͼƬ�޸�ʧ�ܣ�','Photo_Info.php');
}else if($Action=="Del"){	//ɾ���ķ���
		$sql="Delete from PhotoInfo where ID='".$ID."'";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'ͼƬɾ���ɹ���','ͼƬɾ��ʧ�ܣ�','Photo_Info.php');
}else if($Action=="Disable"){	//���õķ���
		$sql="Update PhotoInfo set IsActive=0 where ID=".$ID."";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'ͼƬ���óɹ���','ͼƬ����ʧ�ܣ�','Photo_Info.php');
}else if($Action=="Enable"){	//���õķ���
		$sql="Update PhotoInfo set IsActive=1 where ID=".$ID."";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'ͼƬ���óɹ���','ͼƬ����ʧ�ܣ�','Photo_Info.php');
}else if($Action=="DelAll"){ 	//����ɾ���ķ���
		if(isset($_POST['DelBox'])&&!empty($_POST['DelBox'])){	
		$ID=implode(",",$_POST['DelBox']);	
		$sql="Delete from PhotoInfo where ID in(".$ID.")";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'����ɾ��ͼƬ�ɹ���','����ɾ��ͼƬʧ�ܣ�','Photo_Info.php');
}else{
	infoback($ModuleName,$Action,$sql,$AdminNo,$db,'��ѡ����Ҫɾ�������ݣ�');
	}
}else if($Action=="DisaIsTop"){//�ö�
		$sql="Update PhotoInfo set IsTop=1 where ID=".$ID." ";
		$result=$db->db_query($sql);
		if($result){
			echo "<script language='javascript'>alert('ͼƬ���ö���');window.location.href='Photo_Info.php';</script>";
			}else{
				echo "<script language='javascript'>alert('ͼƬ�ö�ʧ�ܣ�');window.history.back();</script>";
				}
			}else if($Action=="EnaIsTop"){
				$sql="Update PhotoInfo set IsTop=0 where ID=".$ID." ";
				$result=$db->db_query($sql);
				if($result){
					echo "<script language='javascript'>alert('��ȡ��ͼƬ�ö���');window.location.href='Photo_Info.php';</script>";
					}else{
						echo "<script language='javascript'>alert('ȡ��ͼƬ�ö�ʧ�ܣ�');window.history.back();</script>";
				}
}else{
	infoerror($ModuleName,'�Ƿ�����','�Ƿ�����','�Ƿ��û�',$db,'error���Ƿ�������','Login.php');
}
?>