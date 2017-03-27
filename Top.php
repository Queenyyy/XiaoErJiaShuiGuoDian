<link rel="stylesheet" href="css/Popup.css" media="all">
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script src="js/jquery.min.js"></script>
<script src="js/Popupjquery.min.js"></script>
<script>
function CheckForm(){
	if(document.Form.UserName.value==""){   //document表示本页面。
		  alert("用户名不能为空，请输入！");//alert弹出对话框。
		  document.Form.AdminNo.focus();   //focus光标定位。
		  return false;
		}
	if(document.Form.PassWord.value==""){
		  alert("密码不能为空，请输入！");
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
   <a class="btn btn-primary btn-large theme-login" href="javascript:;">登录</a>
  <?
  }else{ 
   echo "欢迎您 ".$_SESSION['Name']." !";
  ?>
    <a href="Admin/LoginOK.php?Action=ReLogin">退出</a>
  <?
  }
  ?>
 <div class="theme-popover">
  <div class="theme-poptit">
    <a href="javascript:;" title="关闭" class="close">×</a>
    <h3><strong><font size="+1" color="#003366">登录小二家水果铺</font></strong></h3>
   </div>
   <div class="theme-popbod dform">
    <form class="theme-signin" action="Memb_Save.php?Action=Login" method="post" name="Form" onsubmit="return CheckForm()">
      <ol>
       <li><strong>用户名：</strong><input class="ipt" type="text" name="UserName" /></li>
       <li><strong>密码：</strong><input class="ipt" type="password" name="PassWord" /></li>
       <li><h4>没有账号？<a href="Reg.php">立即注册</a></h4></li>
       <li><input class="btn btn-primary" type="submit" name="submit" value=" 登 录 " /></li>
      </ol>
     </form>
    </div>
   </div>
  <div class="theme-popover-mask"></div>
 </div>
</div>
<div class="Menu">
   <!--代码部分begin-->
   <div id="nav">
    <ul class="nav-menu clearfix unstyled">
     <li><a href="index.php" class="three-d active">首页<span class="three-d-box"><span class="front">首页</span><span class="back">首页</span></span> </a></li>
     <li><a href="Mall.php" class="three-d">小二鲜果<span class="three-d-box"><span class="front">小二鲜果</span><span class="back">小二鲜果</span></span> </a></li>
     <li><a href="Mall_B.php" class="three-d">小二礼品<span class="three-d-box"><span class="front">小二礼品</span><span class="back">小二礼品</span></span> </a></li>
     <li><a href="Consulta.php" class="three-d">小二资讯<span class="three-d-box"><span class="front">小二资讯</span><span class="back">小二资讯</span></span> </a></li>
     <li><a href="Store.php" class="three-d">小二门店<span class="three-d-box"><span class="front">小二门店</span><span class="back">小二门店</span></span> </a></li>
     <li><a href="Message.php" class="three-d">留言中心<span class="three-d-box"><span class="front">留言中心</span><span class="back">留言中心</span></span></a></li>
     <li><a href="Contact.php" class="three-d">联系我们<span class="three-d-box"><span class="front">联系我们</span><span class="back">联系我们</span></span> </a></li>
    </ul>
   </div>
   <!--代码部分end-->
</div>
  