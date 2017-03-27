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
		alert("员工职位不能为空！");
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
          <td width="5%" align="center" valign="middle" background="images/titlebg.gif"><img src="images/channel.png" width="20" height="20" /></td>
          <td width="95%" height="35" align="left" background="images/titlebg.gif"><strong>新增员工</strong></td> 
        </tr>
      </table>
	  <div class="RightBody">
      <form method="post" id="Form" name="Form" action="Emplo_Save.php?Action=Add" onsubmit="return CheckForm();">
      <table class="TableInfo">
        <tr>
		 <td width="80" align="right">员工编号：</td>
		 <td><input name="EmployeeNo" type="text"readonly="readonly" value="EN-<?=rand(1000,9999)?>"/></td>
	    </tr>
		<tr>
		 <td width="80" align="right">员工姓名：</td>
		 <td><input name="EmployeeName" type="text" />
		 &nbsp;<span class="Required">&nbsp;*请输入真实姓名</span></td>
	    </tr>
        <tr>
         <td align="center">性别：</td>
         <td><input type="radio" name="Sex" value="1" checked="checked" />
             男
             <input type="radio" name="Sex" value="0" />
             女 </td>
        </tr>
         <tr>
		 <td width="80" align="right">联系方式：</td>
		 <td><input name="Phone" type="text" />
		 &nbsp;<span class="Required">&nbsp;*必填</span></td>
	    </tr>
        <tr>
        <tr>
		 <td width="80" align="right">职位：</td>
		 <td><select name="Position">
		       <option value="-1">--请选择职位--</option>
			   <option value="UA001">--店长--</option>
			   <option value="UA002">--收银员--</option>
               <option value="UA003">--导购员--</option>
		     </select>
         </td>
	    </tr>
        <tr>
		 <td width="80" align="right">所属门店：</td>
		 <td>
           <select name="StoreNo">
               <option value="-1">--请选择门店--</option>
               <?php
                 $sql="Select * from StoreInfo";
			     $result=$db->db_query($sql);
			     while($rs=mssql_fetch_array( $result)){
			   ?>
			   <option value="<?=$rs['StoreNo']?>">--<?=$rs['StoreName']?>--</option>
               <?php
		         }
			   ?>
           </select>
         </td>
	    </tr>
		<tr>
		 <td colspan="2" align="center">
		   <input class="inputB" name="" type="submit" value="增&nbsp;&nbsp;加" />
		   <input class="inputB" name="" type="reset" value="重&nbsp;&nbsp;置" />
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