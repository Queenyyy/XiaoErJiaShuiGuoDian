<?php
include("CheckName.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<link href="css/css.css" rel="stylesheet" type="text/css" />
<title>�޸�����</title>
</head>
<script language="javascript">
function CheckForm(){
	if(document.Form.OldPassWord.value.length==0){
		alert("�����벻��Ϊ�գ�");
		return false;
	}
	if(document.Form.NewPassWord.value==""){
		alert("�����벻��Ϊ�գ�");
		return false;
	}
	if(document.Form.NewPassWordA.value!=document.Form.NewPassWord.value){
		alert("���벻һ�£����������룡");
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
          <td width="5%" align="center" valign="middle" background="images/titlebg.gif"><img src="images/ioc-02.png" width="20" height="20" /></td>
          <td width="95%" height="35" align="left" background="images/titlebg.gif"><strong>�޸�����</strong></td> 
        </tr>
        
      </table>
      
      <form method="post" id="Form" name="Form" action="Admin_Save.php?Action=PassWordEdit" onsubmit="return CheckForm();">
      <table class="TableInfo">
        <tr>
		 <td width="80" align="center">�����룺</td>
		 <td><input name="OldPassWord" type="password" />&nbsp;<span class="Required">&nbsp;&nbsp;*�����������</span></td>
	    </tr>
		<tr>
		 <td width="80" align="center">�����룺</td>
		 <td><input name="NewPassWord" type="password"/>
		 &nbsp;<span class="Required">&nbsp; *������������</span></td>
	    </tr>
		<tr>
		 <td width="80" align="center">ȷ�����룺</td>
		 <td><input name="NewPassWordA" type="password"/> 
		 &nbsp;<span class="Required">&nbsp; *��ȷ������</span></td>
	    </tr>
        
		<tr>
		 <td colspan="2" align="center">
		   <input class="inputB" name="" type="submit" value="��&nbsp;&nbsp;��" />
		   <input class="inputB" name="" type="button" onclick="javascript:window.history.go(-1)" value="��&nbsp;&nbsp;��" />
		 </td>
		 </tr>
      </table>
      </form>
	  </div>
    </td>
  </tr>
  <tr> 
    <td height="30" align="center" background="images/titlebg.gif"></td>
  </tr>
</table>
</body>
</html>