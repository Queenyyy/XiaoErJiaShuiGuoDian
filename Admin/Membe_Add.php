<?php include("CheckName.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
</head>
<script language="javascript">
function CheckForm(){
	if(document.Form.UserName.value==""){
		alert("�û�������Ϊ�գ�");
		return false;
	}
	if(document.Form.PassWord.value==""){
		alert("���벻��Ϊ�գ�");
		return false;
	}
	if(document.Form.PassWordA.value!=document.Form.PassWord.value){
		alert("���벻һ�£����������룡");
		return false;
	}
	if(document.Form.Name.value==""){
		alert("��Ա��������Ϊ�գ�");
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
          <td width="5%" align="center" valign="middle" background="images/titlebg.gif"><img src="images/syetem_management.png" width="20" height="20" /></td>
          <td width="95%" height="35" align="left" background="images/titlebg.gif"><strong>������Ա</strong></td> 
        </tr>
      </table>
	  <div class="RightBody">
      <form method="post" id="Form" name="Form" action="Membe_Save.php?Action=Add" onsubmit="return CheckForm();">
      <table class="TableInfo">
        <tr>
		 <td width="80" align="right">�û�����</td>
		 <td><input name="UserName" type="text" />&nbsp;<span class="Required">&nbsp;&nbsp;*����</span></td>
	    </tr>
        <tr>
		 <td width="80" align="right">��ʵ������</td>
		 <td><input name="Name" type="text" />&nbsp;<span class="Required">&nbsp;&nbsp;*����</span></td>
	    </tr>
		<tr>
		 <td width="80" align="right">���룺</td>
		 <td><input name="PassWord" type="password" />
		 &nbsp;<span class="Required">&nbsp;*����</span></td>
	    </tr>
		<tr>
		 <td width="80" align="right">ȷ�����룺</td>
		 <td><input name="PassWordA" type="password" />
		 &nbsp;<span class="Required">&nbsp;*����</span></td>
	    </tr>
        <tr>
		 <td width="80" align="right">�Ա�</td>
		 <td>
         <input name="Sex" type="radio" value="1" checked="checked"/>��&nbsp;&nbsp;
         <input name="Sex" type="radio" value="0"/>Ů
         </td>
	    </tr>
		<tr>
		 <td width="80" align="right">�ȼ���</td>
		 <td><select name="Grade">
		       <option value="-1">--��ѡ���Ա�ȼ�--</option>
			   <option value="G01">--������Ա--</option>
			   <option value="G02">--��ͨ��Ա--</option>
		     </select><span class="Required">&nbsp;*�����ѡ��</span>		
         </td>
	    </tr>
		<tr>
		 <td width="80" align="right">��ע��</td>
		 <td><textarea name="Remark" rows="5"></textarea></td>
	    </tr>
		<tr>
		 <td colspan="2" align="center">
		   <input class="inputB" name="" type="submit" value="��&nbsp;&nbsp;��" />
		   <input class="inputB" name="" type="reset" value="��&nbsp;&nbsp;��" />
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