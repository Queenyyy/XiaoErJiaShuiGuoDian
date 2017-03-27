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
	if(document.Form.EmployeeNo.value==""){
		alert("员工编号不能为空！");
		return false;
	}
	if(document.Form.EmployeeName.value==""){
		alert("员工姓名不能为空！");
		return false;
	}
	if(document.Form.Position.value==""){
		alert("请选择职位！");
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
          <td width="95%" height="35" align="left" background="images/titlebg.gif"><strong>员工信息编辑</strong></td> 
        </tr>
      </table>
      <?php
	  $ID=$_GET['ID'];
	  if(!is_numeric($ID)){
		  echo "<script language='javascript'>alert('错误！非法操作！');window.location.href='Login.php';</script>";
		  exit;
	  }
	  $sql="Select * from View_Emplo where ID=".$ID."";
	  $result=$db->db_query($sql);
	  $rs=mssql_fetch_array($result);
	  ?>
	  <div class="RightBody">
      <form method="post" id="Form" name="Form" action="Emplo_Save.php?Action=Edit&ID=<?=$rs['ID']?>" onsubmit="return CheckForm();">
      <table class="TableInfo">
        <tr>
		 <td width="80" align="right">员工编号：</td>
		 <td><input name="EmployeeNo" type="text" value="<?=$rs['EmployeeNo']?>" readonly="readonly"/>
             &nbsp;<span class="Required">&nbsp;*必填</span></td>
	    </tr>
		<tr>
		 <td width="80" align="right">姓名：</td>
		 <td><input name="EmployeeName" type="text" value="<?=$rs['EmployeeName']?>"/>
		 &nbsp;<span class="Required">&nbsp;*必填</span></td>
	    </tr>
        <tr>
		 <td width="80" align="right">性别：</td>
		 <td><input type="radio" name="Sex" value="1" <?php if($rs['Sex']==1){echo "checked='checked'";}?> />男
             <input type="radio" name="Sex" value="0" <?php if($rs['Sex']==0){echo "checked='checked'";}?> />女 
         </td>
	    </tr>
		<tr>
		 <td width="80" align="right">联系方式：</td>
		 <td><input name="Phone" type="text" value="<?=$rs['Phone']?>"/>
             &nbsp;<span class="Required">&nbsp;*必填</span></td>
	    </tr>
        <tr>
		 <td width="80" align="right">职位：</td>
		 <td><select name="Position">
              <option value="-1">--请选择职位--</option>
              <option value="UA001" <?php if($rs['Position']=="UA001"){echo "selected='selected'";}?>>--店长--</option>
              <option value="UA002" <?php if($rs['Position']=="UA002"){echo "selected='selected'";}?>>--收银员--</option>
              <option value="UA003" <?php if($rs['Position']=="UA003"){echo "selected='selected'";}?>>--导购员--</option>
             </select>
         </td>
	    </tr>
        <tr>
		 <td width="80" align="right">所属门店：</td>
		 <td>
           <select name="StoreNo">
               <?php
                 $sqlC="Select * from StoreInfo";
			     $resultC=$db->db_query($sqlC);
			     while($rsC=mssql_fetch_array($resultC)){
			   ?>
			   <option value="<?=$rsC['StoreNo']?>" <?php if($rs['StoreNo']==$rsC['StoreNo']){echo "selected='selected'";} ?>>--<?=$rsC['StoreName']?>--</option>
               <?php
		         }
			   ?>
           </select>
         </td>
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