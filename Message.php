<?php 
include("Admin/inc/DBClass.php");
include("Admin/inc/Page.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="Admin/images/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>С����ˮ����--��������</title>

<script language="javascript">
function CheckForm(){
	//������֤������
	if(document.Form.Cont.value==""){//document��ʾ��ҳ��
		alert("�Բ����������ݲ���Ϊ�գ������룡");//alert�����Ի���
		return false;
	}
	return true;
}
</script>
<link href="css/css.css" rel="stylesheet" type="text/css" />
<link href="css/Popup.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div class="Container">
 <div class="Top"><?php include("Top.php");?></div>
 <div class="Mesg_Main">
<form name="Form" id="Form" method="post" >
<table width="99%" border="0"  cellpadding="0" cellspacing="1" bgcolor="#01a5a6" style="font-size:14px; line-height:20px;">
  <tr> 
    <td valign="top"  bgcolor="#e7edd3">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ToptitleInfo">
        <tr> 
          <td width="20%" align="left" valign="middle"><strong>��������</strong></td>
          <td width="65%" height="35" align="left" ></td>
		  <td width="8%" height="35" align="center" valign="middle">
          <a href="Message_Add.php">��Ҫ����</a>
          </td> 
        </tr>
      </table>
	  <div class="RightBody">
      <table class="TableInfo" onMouseOver="changeto()" onMouseOut="changeback()">
        <tr class="ListTitle">
          <td valign="top">
		  <?
		   $sql="Select * from MessageInfo order by CreateDate desc";
	       $result=$db->db_query($sql);
	       $rows=mssql_num_rows($result);
	       if($rows>0){
		    while($rs=mssql_fetch_array($result)){
	      ?>
   <table width="99%" border="0" cellspacing="1" cellpadding="0" class="TB">
    <tr>
     <td width="13%" height="30" align="right"><?=$rs['UserName']?>��</td>
     <td width="87%" align="center"><table width="99%" border="0" cellspacing="0" cellpadding="0" class="BT">
    <tr>
     <td><span id="Cont"><?=$rs['Cont']?></span>
         
    </td>
    </tr>
    <tr>
     <td align="right">��ϵ�绰��<span id="Cont"><?=$rs['Phone']?></span>
     &nbsp;&nbsp;&nbsp;������Ʒ��
      <?php
	   if($rs['Fruits']=="FT001"){
	    echo "ƻ��";
	   }else if($rs['Fruits']=="FT002"){
		echo "ѩ��";
	   }else if($rs['Fruits']=="FT003"){
		echo "⨺���";
	   }else if($rs['Fruits']=="FT004"){
		echo "â��";
	   }else{
		echo "����";
	   }
	  ?>    
     </td>
    </tr>
    <tr>
     <td align="right">����ʱ�䣺<?=$rs['CreateDate']?></td>
    </tr>
    <tr>
     <td align="right" bgcolor="#CCCCCC">
	<? 
	 $sqlR="Select * from ReplyInfo where MessageNoR='".$rs['ID']."'";
	 $resultR=$db->db_query($sqlR);
	 $rowsR=mssql_num_rows($resultR);
	  if($rowsR>0){ 
	   while($rsR=mssql_fetch_array($resultR)){
	?>
   <table width="98%" border="0" cellspacing="0" cellpadding="0">
    <tr>
     <td><?=$rsR['UserNameR']?> ��<?=$rsR['ContR']?></td>
    </tr>
    <tr>
     <td>�ŵ꣺
      <?php
	   if($rsR['StoreName']=="SN001"){
	    echo "԰����";
	   }else if($rsR['StoreName']=="SN002"){
		echo "�����";
	   }else if($rsR['StoreName']=="SN003"){
		echo "�����";
	   }else if($rsR['StoreName']=="SN004"){
		echo "������";
	   }else{
		echo "�Ŷ���";
	   }
	  ?>
     </td>
    </tr>
    <tr>
    <td>�ظ�ʱ�䣺<?=$rsR['CreateDateR']?></td>
    </tr>
   </table>
   <?
		}}else{}
   ?>
   </td>
  </tr>
 </table>
</td>
</tr>
</table>
    <?
		}}else{
	?>
    <tr class="ListContent" bgcolor="#e7edd3">
      <td> �Բ����������ԣ� </td>
    </tr>
    <?php
	 }
	?>
      </table>
	  </div>
    </td>
  </tr>
  <tr> 
    <td height="30" class="PageInfo" align="right" bgcolor="#e7edd3">
	
    </td>
  </tr>
</table>
</form>
 </div>
 <div class="Foot"><?php include("Foot.php");?></div>
</div>
</body>
</html>