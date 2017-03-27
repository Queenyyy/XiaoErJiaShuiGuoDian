<?php
session_start();//启用会话
if($_SESSION['AdminNo']==""){
	echo "<script language='javascript'>alert('没有登录，不能进入系统！');top.location.href='Login.php';</script>";
}
?> 