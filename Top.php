<link rel="stylesheet" href="css/Popup.css" media="all">
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.min.js"></script>
<script src="js/Popupjquery.min.js"></script>
<script>
function CheckForm(){
	if(document.Form.UserName.value==""){   //document��ʾ��ҳ�档
		  alert("�û�������Ϊ�գ������룡");//alert�����Ի���
		  document.Form.AdminNo.focus();   //focus��궨λ��
		  return false;
		}
	if(document.Form.PassWord.value==""){
		  alert("���벻��Ϊ�գ������룡");
		  document.Form.PassWord.focus();
		  return false;
		}
		return true;
	}
</script>
<script>
jQuery(document).ready(function($) {
	$('.theme-login').click(function(){
		$('.theme-popover-mask').fadeIn(100);
		$('.theme-popover').slideDown(200);
	})
	$('.theme-poptit .close').click(function(){
		$('.theme-popover-mask').fadeOut(100);
		$('.theme-popover').slideUp(200);
	})

})
</script>
<link href="css/Eject.css" rel="stylesheet" type="text/css" />
<div class="Logo">
 <div class="Logo_Left"></div>
 <div class="Logo_Right">
  <? 
   if($_SESSION['UserName']==""){
  ?>
   <a class="btn btn-primary btn-large theme-login" href="javascript:;">��¼</a>
  <?
  }else{ 
   echo "��ӭ�� ".$_SESSION['Name']." !";
  ?>
    <a href="Admin/LoginOK.php?Action=ReLogin">�˳�</a>
  <?
  }
  ?>
 <div class="theme-popover">
  <div class="theme-poptit">
    <a href="javascript:;" title="�ر�" class="close">��</a>
    <h3><strong><font size="+1" color="#003366">��¼С����ˮ����</font></strong></h3>
   </div>
   <div class="theme-popbod dform">
    <form class="theme-signin" action="Memb_Save.php?Action=Login" method="post" name="Form" onsubmit="return CheckForm()">
      <ol>
       <li><strong>�û�����</strong><input class="ipt" type="text" name="UserName" /></li>
       <li><strong>���룺</strong><input class="ipt" type="password" name="PassWord" /></li>
       <li><h4>û���˺ţ�<a href="Reg.php">����ע��</a></h4></li>
       <li><input class="btn btn-primary" type="submit" name="submit" value=" �� ¼ " /></li>
      </ol>
     </form>
    </div>
   </div>
  <div class="theme-popover-mask"></div>
 </div>
</div>
<div class="Menu">
   <!--���벿��begin-->
   <div id="nav">
    <ul class="nav-menu clearfix unstyled">
     <li><a href="index.php" class="three-d active">��ҳ<span class="three-d-box"><span class="front">��ҳ</span><span class="back">��ҳ</span></span> </a></li>
     <li><a href="Mall.php" class="three-d">С���ʹ�<span class="three-d-box"><span class="front">С���ʹ�</span><span class="back">С���ʹ�</span></span> </a></li>
     <li><a href="Mall_B.php" class="three-d">С����Ʒ<span class="three-d-box"><span class="front">С����Ʒ</span><span class="back">С����Ʒ</span></span> </a></li>
     <li><a href="Consulta.php" class="three-d">С����Ѷ<span class="three-d-box"><span class="front">С����Ѷ</span><span class="back">С����Ѷ</span></span> </a></li>
     <li><a href="Store.php" class="three-d">С���ŵ�<span class="three-d-box"><span class="front">С���ŵ�</span><span class="back">С���ŵ�</span></span> </a></li>
     <li><a href="Message.php" class="three-d">��������<span class="three-d-box"><span class="front">��������</span><span class="back">��������</span></span></a></li>
     <li><a href="Contact.php" class="three-d">��ϵ����<span class="three-d-box"><span class="front">��ϵ����</span><span class="back">��ϵ����</span></span> </a></li>
    </ul>
   </div>
   <!--���벿��end-->
</div>
  