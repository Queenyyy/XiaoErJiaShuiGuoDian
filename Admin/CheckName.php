<?php
session_start();//���ûỰ
if($_SESSION['AdminNo']==""){
	echo "<script language='javascript'>alert('û�е�¼�����ܽ���ϵͳ��');top.location.href='Login.php';</script>";
}
?> 