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
	if(document.Form.UserName.value==""){
		alert("用户名不能为空！");
		return false;
	}
	if(document.Form.Name.value==""){
		alert("会员姓名不能为空！");
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
          <td width="95%" height="35" align="left" background="images/titlebg.gif"><strong>会员信息编辑</strong></td> 
        </tr>
      </table>
      <?php
	  $ID=$_GET['ID'];
	  if(!is_numeric($ID)){
		  echo "<script language='javascript'>alert('错误！非法操作！');window.location.href='Login.php';</script>";
		  exit;
	  }
	  $sql="Select * from MembeInfo where ID=".$ID."";
	  $result=$db->db_query($sql);
	  $rs=mssql_fetch_array($result);
	  ?>
	  <div class="RightBody">
      <form method="post" id="Form" name="Form" action="Membe_Save.php?Action=Edit&amp;ID=<?=$rs['ID']?>" onsubmit="return CheckForm();">
      <table class="TableInfo">
        <tr>
		 <td width="80" align="right">用户名：</td>
		 <td><input name="UserName" type="text" value="<?=$rs['UserName']?>" readonly="readonly"/></td>
	    </tr>
        <tr>
		 <td width="80" align="right">真实姓名：</td>
		 <td><input name="Name" type="text" value="<?=$rs['Name']?>"/>&nbsp;<span class="Required">&nbsp;&nbsp;*必填</span></td>
	    </tr>
        <tr>
		 <td width="80" align="right">性别：</td>
		 <td>
         <input name="Sex" type="radio" value="1" <?php if($rs['Sex']==1){echo "checked='checked'";}?>/>男&nbsp;&nbsp;
         <input name="Sex" type="radio" value="0" <?php if($rs['Sex']==0){echo "checked='checked'";}?>/>女
         </td>
	    </tr>
		<tr>
		 <td width="80" align="right">会员等级：</td>
		 <td><select name="Grade">
		       <option value="-1">--请选择会员等级--</option>
			   <option value="G01" <?php if($rs['Grade']=="G01"){echo "selected='selected'";}?>>--超级会员--</option>
			   <option value="G02" <?php if($rs['Grade']=="G02"){echo "selected='selected'";}?>>--普通会员--</option>
		     </select><span class="Required">&nbsp;*请选择</span>		 </td>
	    </tr>
		<tr>
		 <td width="80" align="right">备注：</td>
		 <td><textarea name="Remark" rows="5"><?=$rs['Remark']?></textarea></td>
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