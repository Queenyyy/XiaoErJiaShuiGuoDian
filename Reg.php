<?php include("Admin/inc/DBClass.php");?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="Admin/images/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>С����ˮ����--��Աע��</title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/Popup.css" media="all">
<script src="js/jquery.min.js"></script>
<script src="js/Popupjquery.min.js"></script>
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
		alert("�ǳƲ���Ϊ�գ�");
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
    <div class="Reg_Title">ע��С���һ�Ա</div>
    <form method="post" id="Form" name="Form" action="Memb_Save.php?Action=Add" onsubmit="return CheckForm();">
      <ul>
      <li>�ˡ����ţ�<input name="UserName" type="text" class="Input_T" ></li>
      <li>�ǡ����ƣ�<input name="Name" type="text"class="Input_T"></li>
      <li>�ܡ����룺<input name="PassWord" type="password"class="Input_T"></li>
      <li>ȷ�����룺<input name="PassWordA" type="password"class="Input_T"></li>
      <li>�ԡ�����
       <input name="Sex" type="radio" value="1" checked="checked"/>��&nbsp;&nbsp;
       <input name="Sex" type="radio" value="0"/>Ů
      </li>
      <li>
       <input class="inputB" name="" type="submit" value="��&nbsp;&nbsp;��" />
	   <input class="inputB" name="" type="reset" value="��&nbsp;&nbsp;��" />
	   <input class="inputB" name="" type="button" onclick="javascript:window.history.go(-1)" value="��&nbsp;&nbsp;��" />
      </li>
      </ul>
    </form>
  </div>
 </div>
 <div class="Foot"><?php include("Foot.php");?></div>
</div>
</body>
</html>