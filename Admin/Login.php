<?php
session_start();	//启用会话
session_destroy();	//注销会话
unset($_SESSION);	//重置会话
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="images/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>水果超市后台管理系统</title>
<link href="css/CSS.css" rel="stylesheet" type="text/css" />
</head>
<script language="javascript">
//创建验证表单的方法
function CheckForm(){
	if(document.Form.AdminNo.value==""){   //document表示本页面。
		  alert("用户名不能为空，请输入！");//alert弹出对话框。
		  document.Form.AdminNo.focus();   //focus光标定位。
		  return false;
		}
	if(document.Form.PassWord.value==""){
		  alert("密码不能为空，请输入！");
		  document.Form.PassWord.focus();
		  return false;
		}
	if(document.Form.VCode.value==""){
		  alert("请输入验证码！");
		  document.Form.VCode.focus();
		  return false;
		}
		return true;
	}
</script>
<body>
<div class="Container">
 <div class="Top">
  <ul>
   <li class="A">水果超市后台管理系统</li>
   <li class="B">小二家水果铺</li>
  </ul>
 </div>
 <div class="Main">
  <div class="Main_L">
  </div>
  <div class="Main_M">
   <form action="LoginOK.php?Action=Login" method="post" name="Form" onsubmit="return CheckForm()">
    <ul>
      <li>用户名：<input class="InputT" name="AdminNo" type="text" /></li>
      <li>密&nbsp;码：<input class="InputT" name="PassWord" type="password" /></li>
      <li>验证码：<input class="InputV" name="VCode" type="text" maxlength="4" />
         <img src="inc/GetCode.php" onclick="javascript:this.src='inc/GetCode.php?tm='+Math.random();" title="点击更换"/>
      </li>
      <li class="button"><input name="" type="submit" class="InputS" value="登 录" /></li>
    </ul>
   </form>
  </div>
  <div class="Main_R"></div>
 </div>
 <div class="Foot"></div>
</div>
</body>
</html>