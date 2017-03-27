<?php 
include("inc/DBClass.php");
include("CheckName.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
</head>
<script language="javascript">
function CheckForm(){
	if(document.Form.StoreNo.value==""){
		alert("门店编号不能为空！");
		return false;
	}
	if(document.Form.StoreName.value==""){
		alert("店名不能为空！");
		return false;
	}
	if(document.Form.Manager.value==""){
		alert("负责人不能为空！");
		return false;
	}
	return true;	
}
</script>
<body>
<table width="99%" border="0"  cellpadding="0" cellspacing="1" bgcolor="#01a5a6" style="font-size:14px; line-height:20px;">
  <tr> 
    <td valign="top" bgcolor="#FFFFFF"> 
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="5%" align="center" valign="middle" background="images/titlebg.gif"><img src="images/channel.png" width="20" height="20" /></td>
          <td width="95%" height="35" align="left" background="images/titlebg.gif"><strong>新增门店</strong></td> 
        </tr>
        
      </table>
	  <div class="RightBody">
      <form method="post" id="Form" name="Form" action="Store_Save.php?Action=Add" onsubmit="return CheckForm();">
      <table class="TableInfo">
        <tr>
		 <td width="80" align="right">门店编号：</td>
		 <td><input name="StoreNo" type="text" readonly="readonly" value="ST-<?=rand(1000,9999)?>"/></td>
	    </tr>
		<tr>
		 <td width="80" align="right">店名：</td>
		 <td><input name="StoreName" type="text" />
		 &nbsp;<span class="Required">&nbsp;*必填</span></td>
	    </tr>
        <tr>
		 <td width="80" align="right">地址：</td>
		 <td><input name="Addr" type="text" />
		 &nbsp;<span class="Required">&nbsp;*请填写正确地址</span></td>
	    </tr>
        <tr>
		 <td width="80" align="right">联系方式：</td>
		 <td><input name="Telephone" type="text" /></td>
	    </tr>
        <tr>
		 <td width="80" align="right">负责人：</td>
		 <td><input name="Manager" type="text" />
		 &nbsp;<span class="Required">&nbsp;*请输入负责人姓名</span></td>
	    </tr>
        <tr>
		 <td width="80" align="right">备注：</td>
		 <td><input name="Remar" type="text" /></td>
	    </tr>
		<tr>
		 <td colspan="2" align="center">
		   <input class="inputB" name="" type="submit" value="增&nbsp;&nbsp;加" />
		   <input class="inputB" name="" type="reset" value="重&nbsp;&nbsp;置" />
		   <input class="inputB" name="" type="button" onclick="javascript:window.history.go(-1)" value="返&nbsp;&nbsp;回" />
		 </td>
		 </tr>
      </table>
      </form>
	  </div>
    </td>
  </tr>
  <tr> 
    <td height="25" align="center" background="images/titlebg.gif"><font color="#000000">程序制作：LK 工作室</font></td>
  </tr>
</table>
</body>
</html>