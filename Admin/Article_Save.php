<?php
include("inc/DBClass.php");
include("inc/Function.php");

$Action=$_GET['Action'];
$ArticleTitle=$_POST['ArticleTitle']; 					//���ű��� 
$KeyWords=$_POST['KeyWords'];							//�ؼ���
$CategoryNo=$_POST['CategoryNo'];						//���
$ArticleContent=urlencode($_POST['ArticleContent']);	//���� urlencode���ַ������м��ܣ�urldecode���ַ������н���
$IsTop=$_POST['IsTop'];									//�ö�
$Author=$_SESSION['AdminNo'];							//������

$AdminNo=$_SESSION['AdminNo'];//������
$ModuleName='������Ϣ�༭';
$CreateDate=date("Y-m-d H:i:s");
$UpdateDate=date("Y-m-d H:i:s");

$ID=$_GET['ID'];

if($Action=="Add"){	//���ӵķ���
	$sqlC="Select * from ArticleInfo where ArticleTitle='".$ArticleTitle."'";
	$resultC=$db->db_query($sqlC);
	$rowsC=mssql_num_rows($resultC);
	if($rowsC>0){
		infoback($ModuleName,$Action,$sql,$AdminNo,$db,'��������Ѵ��ڣ����������룡');
		exit; 
	}else{
		$sql="Insert into ArticleInfo(ArticleTitle,ArticleContent,KeyWords,CategoryNo,CreateDate,Author) values ('".$ArticleTitle."','".$ArticleContent."','".$KeyWords."','".$CategoryNo."','".$CreateDate."','".$Author."')";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'������ӳɹ���','�������ʧ�ܣ�','Article_Info.php');
	}
}else if($Action=="Edit"){	//�޸ĵķ���
		$sql="Update ArticleInfo set ArticleTitle='".$ArticleTitle."',KeyWords='".$KeyWords."',ArticleContent='".$ArticleContent."',CategoryNo='".$CategoryNo."',UpdateDate='".$UpdateDate."',Author='".$Author."' where ID=".$ID."";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'�����޸ĳɹ���','�����޸�ʧ�ܣ�','Article_Info.php');
}else if($Action=="Del"){	//ɾ���ķ���
		$sql="Delete from ArticleInfo where ID='".$ID."'";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'����ɾ���ɹ���','����ɾ��ʧ�ܣ�','Article_Info.php');
}else if($Action=="Disable"){	//���õķ���
		$sql="Update ArticleInfo set IsActive=0 where ID=".$ID."";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'������óɹ���','�������ʧ�ܣ�','Article_Info.php');
}else if($Action=="Enable"){	//���õķ���
		$sql="Update ArticleInfo set IsActive=1 where ID=".$ID."";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'�������óɹ���','��������ʧ�ܣ�','Article_Info.php');
}else if($Action=="DelAll"){ 	//����ɾ���ķ���
		if(isset($_POST['DelBox'])&&!empty($_POST['DelBox'])){	
		$ID=implode(",",$_POST['DelBox']);	
		$sql="Delete from ArticleInfo where ID in(".$ID.")";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'����ɾ������ɹ���','����ɾ������ʧ�ܣ�','Article_Info.php');
}else{
	infoback($ModuleName,$Action,$sql,$AdminNo,$db,'��ѡ����Ҫɾ�������ݣ�');
	}
}else if($Action=="DisaIsTop"){//�ö�
		$sql="Update ArticleInfo set IsTop=1 where ID=".$ID." ";
		$result=$db->db_query($sql);
		if($result){
			echo "<script language='javascript'>alert('�������ö���');window.location.href='Article_Info.php';</script>";
			}else{
				echo "<script language='javascript'>alert('�����ö�ʧ�ܣ�');window.history.back();</script>";
				}
			}else if($Action=="EnaIsTop"){
				$sql="Update ArticleInfo set IsTop=0 where ID=".$ID." ";
				$result=$db->db_query($sql);
				if($result){
					echo "<script language='javascript'>alert('��ȡ�������ö���');window.location.href='Article_Info.php';</script>";
					}else{
						echo "<script language='javascript'>alert('ȡ�������ö�ʧ�ܣ�');window.history.back();</script>";
				}
}else{
	infoerror($ModuleName,'�Ƿ�����','�Ƿ�����','�Ƿ��û�',$db,'error���Ƿ�������','Login.php');
}
?>