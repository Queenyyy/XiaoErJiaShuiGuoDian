<?php include("Admin/inc/DBClass.php");?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="Admin/images/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>小二家水果铺--会员注册</title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/Popup.css" media="all">
<script src="js/jquery.min.js"></script>
<script src="js/Popupjquery.min.js"></script>
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
		alert("昵称不能为空！");
		return false;
	}
	return true;	
}
</script>
</head>
<body>
<div class="Reg_Container">
 <div class="Top"><?php include("Top.php");?></div>
 <div class="Reg_Main">
   <div class="Reg_Left"></div>
   <div class="Reg_Right">
    <div class="Reg_Title">注册小二家会员</div>
    <form method="post" id="Form" name="Form" action="Memb_Save.php?Action=Add" onsubmit="return CheckForm();">
      <ul>
      <li>账　　号：<input name="UserName" type="text" class="Input_T" ></li>
      <li>昵　　称：<input name="Name" type="text"class="Input_T"></li>
      <li>密　　码：<input name="PassWord" type="password"class="Input_T"></li>
      <li>确认密码：<input name="PassWordA" type="password"class="Input_T"></li>
      <li>性　　别：
       <input name="Sex" type="radio" value="1" checked="checked"/>男&nbsp;&nbsp;
       <input name="Sex" type="radio" value="0"/>女
      </li>
      <li>
       <input class="inputB" name="" type="submit" value="增&nbsp;&nbsp;加" />
	   <input class="inputB" name="" type="reset" value="重&nbsp;&nbsp;置" />
	   <input class="inputB" name="" type="button" onclick="javascript:window.history.go(-1)" value="返&nbsp;&nbsp;回" />
      </li>
      </ul>
    </form>
  </div>
 </div>
 <div class="Foot"><?php include("Foot.php");?></div>
</div>
</body>
</html>