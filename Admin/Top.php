<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<script language="javascript">
//�˳�ϵͳ����ʾ
function Logout(){
	if(confirm("��ȷ��Ҫ�˳�ϵͳ��")){
		top.location.href='Login.php';
	}else{
		return false;
	}
}
</script>
<body>
<div class="top"></div>
<div id="header">
 <!--LOGO-->
 <div class="logo">ˮ�����к�̨����ϵͳ</div>
 <!--��ӭ��-->
 <div class="navigation">
  <strong>��ӭ��&nbsp;<font color="#FF0000"><?=$_SESSION['AdminName']?></font> 
   <a href="PassWord_Edit.php" target="mainFrame" class="Top_a">&nbsp;�޸�����&nbsp;</a>
   <a href="#" onclick="Logout()" class="Top_a">&nbsp;�˳�ϵͳ&nbsp;</a>
  </strong>
 </div>
</div>
</body>
</html>