<?php
include("CheckName.php");
include("inc/DBClass.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
</head>
<script language="javascript">
function CheckForm(){
	if(document.Form.StoreNo.value==""){
		alert("门店编号不能为空！");
		return false;
	}
	if(document.Form.StoreName.value==""){
		alert("店名不能为空！");
		return false;
	}
	if(document.Form.EmployeeNo.value==""){
		alert("负责人不能为空！");
		return false;
	}
	return true;	
}
</script>
<body>
<table width="99%" border="0"  cellpadding="0" cellspacing="1" bgcolor="#01a5a6" style="font-size:14px; line-height:20px;">
  <tr> 
    <td valign="top" bgcolor="#FFFFFF"> 
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="5%" align="center" valign="middle" background="images/titlebg.gif"><img src="images/ioc-02.png" width="20" height="20" /></td>
          <td width="95%" height="35" align="left" background="images/titlebg.gif"><strong>门店信息编辑</strong></td> 
        </tr>
        
      </table>
      <?php
	  $ID=$_GET['ID'];
	  if(!is_numeric($ID)){
		  echo "<script language='javascript'>alert('错误！非法操作！');window.location.href='Login.php';</script>";
		  exit;
	  }
	  $sql="Select * from StoreInfo where ID=".$ID."";
	  $result=$db->db_query($sql);
	  $rs=mssql_fetch_array($result);
	  ?>
	  <div class="RightBody">
      <form method="post" id="Form" name="Form" action="Store_Save.php?Action=Edit&ID=<?=$rs['ID']?>" onsubmit="return CheckForm();">
      <table class="TableInfo">
        <tr>
		 <td width="80" align="right">门店编号：</td>
		 <td><input name="StoreNo" type="text" value="<?=$rs['StoreNo']?>" readonly="readonly"/>
             &nbsp;<span class="Required">&nbsp;*必填</span></td>
	    </tr>
		<tr>
		 <td width="80" align="right">名称：</td>
		 <td><input name="StoreName" type="text" value="<?=$rs['StoreName']?>"/>
		 &nbsp;<span class="Required">&nbsp;*必填</span></td>
	    </tr>
        <tr>
		 <td width="80" align="right">地址：</td>
		 <td><input name="Addr" type="text" value="<?=$rs['Addr']?>"/></td>
	    </tr>
        <tr>
		 <td width="80" align="right">联系方式：</td>
		 <td><input name="Telephone" type="text" value="<?=$rs['Telephone']?>"/></td>
	    </tr>
        <tr>
		 <td width="80" align="right">负责人：</td>
		 <td><input name="Manager" type="text" value="<?=$rs['Manager']?>"/>
		 &nbsp;<span class="Required">&nbsp;*必填</span></td>
	    </tr>
		<tr>
		 <td width="80" align="right">备注：</td>
		 <td><input name="Remar" type="text" value="<?=$rs['Remar']?>"/></td>
	    </tr>
		<tr>
		 <td colspan="2" align="center">
		   <input class="inputB" name="" type="submit" value="修&nbsp;&nbsp;改" />
		   <input class="inputB" name="" type="button" onclick="javascript:window.history.go(-1)" value="返&nbsp;&nbsp;回" />
		 </td>
		 </tr>
      </table> 
      </form>
	  </div>
    </td>
  </tr>
  <tr> 
    <td height="25" align="center" background="images/titlebg.gif"><font color="#000000">程序制作：LK 工作室</font></td>
  </tr>
</table>
</body>
</html>