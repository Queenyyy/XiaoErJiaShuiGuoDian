<?php include("CheckName.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/menu.js"></script>
</head>

<body>
<div class="left_menu">
  <ul id="nav_dot">
   <li>
    <h4   class="M10"><span></span>用户中心</h4>
     <div class="list-item none">
       <a href="Admin_Info.php" target="mainFrame">管理员列表</a>
       <a href="Membe_Info.php" target="mainFrame">会员管理</a>
       
     </div>
   </li>
   <li>
    <h4  class="M9"><span></span>内容管理</h4>
     <div class="list-item none">
      <a href="Category_Info.php" target="mainFrame">内容分类</a>
      <a href="Article_Info.php" target="mainFrame">公告管理</a>
      <a href="Photo_Info.php" target="mainFrame">图片管理</a>
      <a href="Message_Info.php" target="mainFrame">留言中心</a>
     </div>
   </li>
   <li>
    <h4  class="M5"><span></span>发布中心</h4>
     <div class="list-item none">
      <a href="Article_Add.php" target="mainFrame">发布公告</a>
      <a href="Photo_Add.php" target="mainFrame">发布图片</a>
     </div>
   </li>
   <li>
    <h4  class="M6"><span></span>商铺中心</h4>
     <div class="list-item none">
      <a href='Fruit_Info.php' target="mainFrame">商品信息</a>
      <a href='FruType_Info.php' target="mainFrame">商品分类</a>
      <a href='Store_Info.php' target="mainFrame">门店管理</a>
      <a href='Emplo_Info.php' target="mainFrame">员工中心</a>
     </div>
   </li>
   <li>
    <h4 class="M2"><span></span>货仓管理</h4>
     <div class="list-item none">
      <a href='Supp_Info.php' target="mainFrame">供货商信息</a>
      <a href='Purch_Info.php' target="mainFrame">进货货单</a>
      <a href='Sale_Info.php' target="mainFrame">销售货单</a>
      <a href='Loss_Info.php' target="mainFrame">损坏货单</a>        
     </div>
   </li>   
   <li>
    <h4 class="M3"><span></span>系统管理</h4>
     <div class="list-item none">
       <a href="SysLog_Info.php" target="mainFrame">操作日志</a>
     </div>
   </li>
   <li>
    <h4 class="M1"><span></span>制作中心</h4>
     <div class="list-item none">
       <div align="center">
        <strong><font color="#FFFFFF">邮箱：781421022@qq.com</font></strong>
       </div>
       <div align="center">
        <strong><font color="#FFFFFF">地址：广西南宁市园湖北路12号</font></strong>
       </div>
       <div align="center">
        <strong><font color="#FFFFFF">联系方式：15777176979</font></strong>
       </div>
     </div>
   </li>
  </ul>
</div>
<script>navList(12);</script>
</body>
</html>