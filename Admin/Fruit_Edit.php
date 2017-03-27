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
<body>
<table width="99%" border="0"  cellpadding="0" cellspacing="1" bgcolor="#01a5a6" style="font-size:14px; line-height:20px;">
  <tr> 
    <td valign="top" bgcolor="#FFFFFF"> 
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="5%" align="center" valign="middle" background="images/titlebg.gif"><img src="images/ioc-02.png" width="20" height="20" /></td>
          <td width="95%" height="35" align="left" background="images/titlebg.gif"><strong>商品基本信息编辑</strong></td> 
        </tr>
      </table>
      <?php
	  $ID=$_GET['ID'];
	  if(!is_numeric($ID)){
		  echo "<script language='javascript'>alert('错误！非法操作！');window.location.href='Login.php';</script>";
		  exit;
	  }
	  $sql="Select * from View_Fruit where ID=".$ID."";
	  $result=$db->db_query($sql);
	  $rs=mssql_fetch_array($result);
	  ?>
	  <div class="RightBody">
      <form method="post" id="Form" name="Form" action="Fruit_Save.php?Action=Edit&ID=<?=$rs['ID']?>" onsubmit="return CheckForm();">
      <table class="TableInfo">
        <tr>
		 <td width="80" align="right">商品编号：</td>
		 <td><input name="FruitNo" type="text" value="<?=$rs['FruitNo']?>" readonly="readonly"/></td>
	    </tr>
        <tr>
		 <td width="80" align="right">水果类别：</td>
		 <td><select name="FruitTypeNo">
             <?php
               $sqlC="Select * from FruitType";
			   $resultC=$db->db_query($sqlC);
			   while($rsC=mssql_fetch_array($resultC)){
			 ?>
			 <option value="<?=$rsC['FruitTypeNo']?>" 
			   <?php 
			     if($rs['FruitTypeNo']==$rsC['FruitTypeNo'])
			      {echo "selected='selected'";} ?>>
                  --<?=$rsC['FruitTypeName']?>--
             </option>
             <?php
		       }
			 ?>
           </select>
         </td>
	    </tr>
		<tr>
		 <td width="80" align="right">水果名称：</td>
		 <td><input name="FruitName" type="text" value="<?=$rs['FruitName']?>" /></td>
	    </tr>
        <tr>
		 <td width="80" align="right">供货商：</td>
		 <td><select name="SupplierNo">
             <?php
               $sqlC="Select * from SuppliInfo";
			   $resultC=$db->db_query($sqlC);
			   while($rsC=mssql_fetch_array($resultC)){
			 ?>
			 <option value="<?=$rsC['SupplierNo']?>" 
			   <?php 
			     if($rs['SupplierNo']==$rsC['SupplierNo'])
			      {echo "selected='selected'";} ?>>
                  --<?=$rsC['SupplierName']?>--
             </option>
             <?php
		       }
			 ?>
           </select>
         </td>
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
    <td height="30" align="center" background="images/titlebg.gif"></td>
  </tr>
</table>
</body>
</html>