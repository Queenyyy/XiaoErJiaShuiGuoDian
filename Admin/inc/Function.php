<?php
//获取验证码的值
function GetValue(){
	if(isset($_SESSION["v_ckstr"])){	//isset判断验证码是否设置
	$ckvalue=$_SESSION["v_ckstr"];
	}else{
		$ckvalue='';
		}
		return $ckvalue;
}

//1.操作成功
function infoherf($ModuleName,$Action,$sql,$AdminNo,$db,$Info,$Url){
	SysLogs($ModuleName,$Action,$sql,$AdminNo,$db);
	echo "<script language='javascript'>alert('".$Info."');window.location.href='".$Url."';</script>";
	}
//2.操作失败
function infoback($ModuleName,$Action,$sql,$AdminNo,$db,$Info){
	SysLogs($ModuleName,$Action,$sql,$AdminNo,$db);
	echo "<script language='javascript'>alert('".$Info."');window.history.back();</script>";
	}
//3.非法操作
function infoerror($ModuleName,$Action,$sql,$AdminNo,$db,$Info,$Url){
	SysLogs($ModuleName,$Action,$sql,$AdminNo,$db);
	echo "<script language='javascript'>alert('".$Info."');window.location.href='".$Url."';</script>";
}
//4.执行SQL语句反回结果
function infoquery($ModuleName,$Action,$sql,$AdminNo,$db,$InfoR,$InfoE,$Url){
	$result=$db->db_query($sql);
		//判断数据增加是否成功
		if($result){
			infoherf($ModuleName,$Action,$sql,$AdminNo,$db,$InfoR,$Url);//成功
		}else{
			infoback($ModuleName,$Action,$sql,$AdminNo,$db,$InfoE);//失败
		}
	}
//写入日志
function SysLogs($ModuleName,$ActionName,$Message,$AdminNo,$db){
	$sqlSys="Insert into SysLogInfo(ModuleName,ActionName,Message,AdminNo,IP,CreateDate) values ('".$ModuleName."','".$ActionName."','".str_ireplace("'","''",$Message)."','".$AdminNo."','".$_SERVER['REMOTE_ADDR']."','".date("Y-m-d H:i:s")."')";
	//str_ireplace 替换函数
	$resultSys=$db->db_query($sqlSys);	
}
?>