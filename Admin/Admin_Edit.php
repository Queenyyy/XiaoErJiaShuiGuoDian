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
	if(document.Form.AdminNo.value==""){
		alert("����Ա�ʺŲ���Ϊ�գ�");
		return false;
	}
	if(document.Form.AdminName.value==""){
		alert("����Ա��������Ϊ�գ�");
		return false;
	}
	if(document.Form.UnitAuth.value==-1){
		alert("��ѡ��Ȩ�ޣ�");
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
          <td width="95%" height="35" align="left" background="images/titlebg.gif"><strong>����Ա��Ϣ�༭</strong></td> 
        </tr>
      </table>
      <?php
	  $ID=$_GET['ID'];
	  if(!is_numeric($ID)){
		  echo "<script language='javascript'>alert('���󣡷Ƿ�������');window.location.href='Login.php';</script>";
		  exit;
	  }
	  $sql="Select * from AdminInfo where ID=".$ID."";
	  $result=$db->db_query($sql);
	  $rs=mssql_fetch_array($result);
	  ?>
	  <div class="RightBody">
      <form method="post" id="Form" name="Form" action="Admin_Save.php?Action=Edit&amp;ID=<?=$rs['ID']?>" onsubmit="return CheckForm();">
      <table class="TableInfo">
        <tr>
		 <td width="80" align="right">����Ա�ʺţ�</td>
		 <td><input name="AdminNo" type="text" value="<?=$rs['AdminNo']?>" readonly="readonly"/></td>
	    </tr>
        <tr>
		 <td width="80" align="right">����Ա������</td>
		 <td><input name="AdminName" type="text" value="<?=$rs['AdminName']?>"/>&nbsp;<span class="Required">&nbsp; *���������Ա����</span></td>
	    </tr>
		<tr>
		 <td width="80" align="right">Ȩ�ޣ�</td>
		 <td><select name="UnitAuth">
		       <option value="-1">--��ѡ��Ȩ��--</option>
			   <option value="UA001" <?php if($rs['UnitAuth']=="UA001"){echo "selected='selected'";}?>>--��������Ա--</option>
			   <option value="UA002" <?php if($rs['UnitAuth']=="UA002"){echo "selected='selected'";}?>>--��ͨ����Ա--</option>
		     </select><span class="Required">&nbsp;*��ѡ��</span>		 </td>
	    </tr>
		<tr>
		 <td width="80" align="right">��ע��</td>
		 <td><textarea name="Remark" rows="5"><?=$rs['Remark']?></textarea></td>
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