<?php
session_start();	//���ûỰ
session_destroy();	//ע���Ự
unset($_SESSION);	//���ûỰ
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="images/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>ˮ�����к�̨����ϵͳ</title>
<link href="css/CSS.css" rel="stylesheet" type="text/css" />
</head>
<script language="javascript">
//������֤���ķ���
function CheckForm(){
	if(document.Form.AdminNo.value==""){   //document��ʾ��ҳ�档
		  alert("�û�������Ϊ�գ������룡");//alert�����Ի���
		  document.Form.AdminNo.focus();   //focus��궨λ��
		  return false;
		}
	if(document.Form.PassWord.value==""){
		  alert("���벻��Ϊ�գ������룡");
		  document.Form.PassWord.focus();
		  return false;
		}
	if(document.Form.VCode.value==""){
		  alert("��������֤�룡");
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
   <li class="A">ˮ�����к�̨����ϵͳ</li>
   <li class="B">С����ˮ����</li>
  </ul>
 </div>
 <div class="Main">
  <div class="Main_L">
  </div>
  <div class="Main_M">
   <form action="LoginOK.php?Action=Login" method="post" name="Form" onsubmit="return CheckForm()">
    <ul>
      <li>�û�����<input class="InputT" name="AdminNo" type="text" /></li>
      <li>��&nbsp;�룺<input class="InputT" name="PassWord" type="password" /></li>
      <li>��֤�룺<input class="InputV" name="VCode" type="text" maxlength="4" />
         <img src="inc/GetCode.php" onclick="javascript:this.src='inc/GetCode.php?tm='+Math.random();" title="�������"/>
      </li>
      <li class="button"><input name="" type="submit" class="InputS" value="�� ¼" /></li>
    </ul>
   </form>
  </div>
  <div class="Main_R"></div>
 </div>
 <div class="Foot"></div>
</div>
</body>
</html>