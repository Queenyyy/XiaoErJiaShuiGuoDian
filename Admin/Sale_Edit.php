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
	if(document.Form.Number.value==""){
		alert("������������Ϊ�գ�");
		return false;
	}
	if(document.Form.SalePrice.value==""){
		alert("���ۼ۸���Ϊ�գ�");
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
          <td width="95%" height="35" align="left" background="images/titlebg.gif"><strong>��Ʒ������Ϣ�༭</strong></td> 
        </tr>
      </table>
      <?php
	  $ID=$_GET['ID'];
	  if(!is_numeric($ID)){
		  echo "<script language='javascript'>alert('���󣡷Ƿ�������');window.location.href='Login.php';</script>";
		  exit;
	  }
	  $sql="Select * from View_Sale where ID=".$ID."";
	  $result=$db->db_query($sql);
	  $rs=mssql_fetch_array($result);
	  ?>
	  <div class="RightBody">
      <form method="post" id="Form" name="Form" action="Sale_Save.php?Action=Edit&ID=<?=$rs['ID']?>" onsubmit="return CheckForm();">
      <table class="TableInfo">
        <tr>
		 <td width="80" align="right">���۱�ţ�</td>
		 <td><input name="SalesNo" type="text" value="<?=$rs['SalesNo']?>" readonly="readonly"/></td>
	    </tr>
		<tr>
		 <td width="80" align="right">ˮ�����ƣ�</td>
		 <td><select name="FruitNo">
             <?php
               $sqlC="Select * from FruitInfo";
			   $resultC=$db->db_query($sqlC);
			   while($rsC=mssql_fetch_array($resultC)){
			 ?>
			 <option value="<?=$rsC['FruitNo']?>" 
			   <?php 
			     if($rs['FruitNo']==$rsC['FruitNo'])
			      {echo "selected='selected'";} ?>>
                  --<?=$rsC['FruitName']?>--
             </option>
             <?php
		       }
			 ?>
           </select>
         </td>
	    </tr>
		<tr>
		 <td width="80" align="right">����������</td>
		 <td><input name="Number" type="text" value="<?=$rs['Number']?>"/>
             &nbsp;<span class="Required">&nbsp;*����</span>
         </td>
	    </tr>
        <tr>
		 <td width="80" align="right">���ۼ۸�</td>
		 <td><input name="SalePrice" type="text" value="<?=$rs['SalePrice']?>"/>
             &nbsp;<span class="Required">&nbsp;*����</span>
         </td>
	    </tr>
        <tr>
		 <td width="80" align="right">��ע��</td>
		 <td><input name="Remar" type="text" value="<?=$rs['Remar']?>"/></td>
	    </tr>
		<tr>
		 <td colspan="2" align="center">
		   <input class="inputB" name="" type="submit" value="��&nbsp;&nbsp;��" />
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