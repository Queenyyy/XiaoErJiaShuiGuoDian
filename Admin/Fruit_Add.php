<?php 
include("inc/DBClass.php");
include("CheckName.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
</head>

<body>
<table width="99%" border="0"  cellpadding="0" cellspacing="1" bgcolor="#01a5a6" style="font-size:14px; line-height:20px;">
  <tr> 
    <td valign="top" bgcolor="#FFFFFF"> 
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="5%" align="center" valign="middle" background="images/titlebg.gif"><img src="images/channel.png" width="20" height="20" /></td>
          <td width="95%" height="35" align="left" background="images/titlebg.gif"><strong>������Ʒ������Ϣ</strong></td> 
        </tr>
      </table>
	  <div class="RightBody">
      <form method="post" id="Form" name="Form" action="Fruit_Save.php?Action=Add" onsubmit="return CheckForm();">
      <table class="TableInfo">
        <tr>
		 <td width="80" align="right">��Ʒ��ţ�</td>
		 <td><input name="FruitNo" type="text"readonly="readonly" value="FR-<?=rand(1000,9999)?>"/></td>
	    </tr>
		<tr>
		 <td width="80" align="right">ˮ�����</td>
		 <td><select name="FruitTypeNo">
               <option value="-1">--��ѡ�����--</option>
               <?php
                 $sql="Select * from FruitType";
			     $result=$db->db_query($sql);
			     while($rs=mssql_fetch_array( $result)){
			   ?>
			   <option value="<?=$rs['FruitTypeNo']?>">--<?=$rs['FruitTypeName']?>--</option>
               <?php
		         }
			   ?>
           </select>
         </td>
	    </tr>
        <tr>
		 <td width="80" align="right">ˮ�����ƣ�</td>
		 <td><input name="FruitName" type="text" /></td>
	    </tr>
        <tr>
		 <td width="80" align="right">�����̣�</td>
		 <td><select name="SupplierNo">
               <option value="-1">--��ѡ��--</option>
               <?php
                 $sql="Select * from SuppliInfo";
			     $result=$db->db_query($sql);
			     while($rs=mssql_fetch_array( $result)){
			   ?>
			   <option value="<?=$rs['SupplierNo']?>">--<?=$rs['SupplierName']?>--</option>
               <?php
		         }
			   ?>
           </select>
         </td>
	    </tr>
        <tr>
		 <td width="80" align="right">��ע��</td>
		 <td><input name="Remar" type="text" /></td>
	    </tr>
		<tr>
		 <td colspan="2" align="center">
		   <input class="inputB" name="" type="submit" value="��&nbsp;&nbsp;��" />
		   <input class="inputB" name="" type="reset" value="��&nbsp;&nbsp;��" />
		   <input class="inputB" name="" type="button" onclick="javascript:window.history.go(-1)" value="��&nbsp;&nbsp;��" />
		 </td>
		 </tr>
      </table>
      </form>
	  </div>
    </td>
  </tr>
  <tr> 
    <td height="30" align="center" background="images/titlebg.gif"></td>
  </tr>
</table>
</body>
</html>