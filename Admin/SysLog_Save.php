<?php
include("inc/DBClass.php");
include("inc/Function.php");

$Action=$_GET['Action'];
$ID=$_GET['ID'];
$AdminNo=$_POST['AdminNo'];

$ModuleName='��־��Ϣ�༭';
$AdminNo=$_SESSION['AdminNo'];//������

if($Action=="Del"){	//ɾ���ķ���
		$sql="Delete from SysLogInfo where ID='".$ID."'";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'��־ɾ���ɹ���','��־ɾ��ʧ�ܣ�','SysLog_Info.php');
}else if($Action=="DelAll"){ 	//����ɾ���ķ���
		if(isset($_POST['DelBox'])&&!empty($_POST['DelBox'])){	
		$ID=implode(",",$_POST['DelBox']);
		$sql="Delete from SysLogInfo where ID in(".$ID.")";
		infoquery($ModuleName,$Action,$sql,$AdminNo,$db,'��־����ɾ���ɹ���','��־����ɾ��ʧ�ܣ�','SysLog_Info.php');
}else{
	infoback($ModuleName,$Action,$sql,$AdminNo,$db,'��ѡ����Ҫɾ�������ݣ�');
	}
}else{
	infoerror($ModuleName,'�Ƿ�����','�Ƿ�����','�Ƿ��û�',$db,'error���Ƿ�������','Login.php');
}
?>