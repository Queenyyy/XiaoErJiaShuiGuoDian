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
		alert("用户名不能为空！");
		return false;
	}
	if(document.Form.PassWord.value==""){
		alert("密码不能为空！");
		return false;
	}
	if(document.Form.PassWordA.value!=document.Form.PassWord.value){
		alert("密码不一致，请重新输入！");
		return false;
	}
	if(document.Form.Name.value==""){
		alert("会员姓名不能为空！");
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
          <td width="95%" height="35" align="left" background="images/titlebg.gif"><strong>新增会员</strong></td> 
        </tr>
      </table>
	  <div class="RightBody">
      <form method="post" id="Form" name="Form" action="Membe_Save.php?Action=Add" onsubmit="return CheckForm();">
      <table class="TableInfo">
        <tr>
		 <td width="80" align="right">用户名：</td>
		 <td><input name="UserName" type="text" />&nbsp;<span class="Required">&nbsp;&nbsp;*必填</span></td>
	    </tr>
        <tr>
		 <td width="80" align="right">真实姓名：</td>
		 <td><input name="Name" type="text" />&nbsp;<span class="Required">&nbsp;&nbsp;*必填</span></td>
	    </tr>
		<tr>
		 <td width="80" align="right">密码：</td>
		 <td><input name="PassWord" type="password" />
		 &nbsp;<span class="Required">&nbsp;*必填</span></td>
	    </tr>
		<tr>
		 <td width="80" align="right">确认密码：</td>
		 <td><input name="PassWordA" type="password" />
		 &nbsp;<span class="Required">&nbsp;*必填</span></td>
	    </tr>
        <tr>
		 <td width="80" align="right">性别：</td>
		 <td>
         <input name="Sex" type="radio" value="1" checked="checked"/>男&nbsp;&nbsp;
         <input name="Sex" type="radio" value="0"/>女
         </td>
	    </tr>
		<tr>
		 <td width="80" align="right">等级：</td>
		 <td><select name="Grade">
		       <option value="-1">--请选择会员等级--</option>
			   <option value="G01">--超级会员--</option>
			   <option value="G02">--普通会员--</option>
		     </select><span class="Required">&nbsp;*请谨慎选择</span>		
         </td>
	    </tr>
		<tr>
		 <td width="80" align="right">备注：</td>
		 <td><textarea name="Remark" rows="5"></textarea></td>
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
    <td height="30" align="center" background="images/titlebg.gif"></td>
  </tr>
</table>
</body>
</html>