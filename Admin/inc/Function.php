<?php
//��ȡ��֤���ֵ
function GetValue(){
	if(isset($_SESSION["v_ckstr"])){	//isset�ж���֤���Ƿ�����
	$ckvalue=$_SESSION["v_ckstr"];
	}else{
		$ckvalue='';
		}
		return $ckvalue;
}

//1.�����ɹ�
function infoherf($ModuleName,$Action,$sql,$AdminNo,$db,$Info,$Url){
	SysLogs($ModuleName,$Action,$sql,$AdminNo,$db);
	echo "<script language='javascript'>alert('".$Info."');window.location.href='".$Url."';</script>";
	}
//2.����ʧ��
function infoback($ModuleName,$Action,$sql,$AdminNo,$db,$Info){
	SysLogs($ModuleName,$Action,$sql,$AdminNo,$db);
	echo "<script language='javascript'>alert('".$Info."');window.history.back();</script>";
	}
//3.�Ƿ�����
function infoerror($ModuleName,$Action,$sql,$AdminNo,$db,$Info,$Url){
	SysLogs($ModuleName,$Action,$sql,$AdminNo,$db);
	echo "<script language='javascript'>alert('".$Info."');window.location.href='".$Url."';</script>";
}
//4.ִ��SQL��䷴�ؽ��
function infoquery($ModuleName,$Action,$sql,$AdminNo,$db,$InfoR,$InfoE,$Url){
	$result=$db->db_query($sql);
		//�ж����������Ƿ�ɹ�
		if($result){
			infoherf($ModuleName,$Action,$sql,$AdminNo,$db,$InfoR,$Url);//�ɹ�
		}else{
			infoback($ModuleName,$Action,$sql,$AdminNo,$db,$InfoE);//ʧ��
		}
	}
//д����־
function SysLogs($ModuleName,$ActionName,$Message,$AdminNo,$db){
	$sqlSys="Insert into SysLogInfo(ModuleName,ActionName,Message,AdminNo,IP,CreateDate) values ('".$ModuleName."','".$ActionName."','".str_ireplace("'","''",$Message)."','".$AdminNo."','".$_SERVER['REMOTE_ADDR']."','".date("Y-m-d H:i:s")."')";
	//str_ireplace �滻����
	$resultSys=$db->db_query($sqlSys);	
}
?>