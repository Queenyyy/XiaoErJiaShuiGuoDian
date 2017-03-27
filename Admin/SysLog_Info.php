<?php
include("CheckName.php");
include("inc/DBClass.php");
include("inc/Page.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title></title>
<link href="css/css.css" rel="stylesheet" type="text/css" />
</head>
<!--调用公共脚本Function.js-->
<script language="javascript" src="js/Function.js"></script>
<script language="javascript" src="js/Tab.js"></script>
<body>
<form name="Form" id="Form" method="post" onsubmit="return DelAllInfo()" action="SysLog_Save.php?Action=DelAll">
<table width="99%" border="0"  cellpadding="0" cellspacing="1" bgcolor="#01a5a6" style="font-size:14px; line-height:20px;">
  <tr> 
    <td valign="top" bgcolor="#FFFFFF">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ToptitleInfo">
        <tr> 
          <td width="5%" align="center" valign="middle" background="images/titlebg.gif"><img src="images/system.png" width="20" height="20" /></td>
          <td width="80%" height="35" align="left" background="images/titlebg.gif"><strong>系统操作日志</strong></td>
		  <td width="8%" height="35" align="center" valign="middle" background="images/titlebg.gif"></td>
		  <td width="5%" height="35" align="center" valign="middle" background="images/titlebg.gif">
          <input name="提交" type="submit" value="批量删除" /></a>
		  </td>
		  <td width="2%" height="35" background="images/titlebg.gif"></td>  
        </tr>
        
      </table>
	  <div class="RightBody">
      <table class="TableInfo" onmouseover="changeto()" onmouseout="changeback()" >
        <tr class="ListName">
         <td width="5%"><input type="checkbox" onclick="CheckAll()" /></td>
		 <td width="5%">序号</td>
		 <td width="15%">操作模块</td>
		 <td width="15%">操作动作</td>
         <td width="10%">操作人</td>
         <td width="15%">操作IP</td>	
		 <td width="15%">操作时间</td>
         <td width="10%">编辑</td>
	    </tr>
		<?php
		 //统计数据总数
		 $sqlA="Select * from SysLogInfo";
		 $resultA=$db->db_query($sqlA);
		 $total=mssql_num_rows($resultA);
		 //设置分页参数
		 $Page=new page_link($total,10);//设置一页显示几行数据
		 
		//构建SQL语句
			//RowNum 虚拟ID列
		$sql="Select * from(Select row_number() over(order by ID asc) as RowNum ,* from SysLogInfo) as TableInfo where RowNum between ".$Page->firstcount." and ".$Page->displaypg."";
		//执行SQL语句
		$result=$db->db_query($sql);
		if($total>0){
		  while($rs=mssql_fetch_array($result)){
		?>
		<tr class="ListContent">
         <td><input type="checkbox" name="DelBox[]" value="<?=$rs['ID']?>"/></td>
		 <td><?=$rs['RowNum']?></td>
		 <td><?=$rs['ModuleName']?></td>
         <td><?=$rs['ActionName']?></td>
         <td><?=$rs['AdminNo']?></td>
         <td><?=$rs['IP']?></td>
         <td><?=$rs['CreateDate']?></td>
		 <td class="Operation">
			<img src="images/del.gif"  width="16" height="16" />
            <a href="SysLog_Save.php?Action=Del&amp;ID=<?=$rs['ID']?>" onclick="return DelInfo()">删除</a>
		 </td>
	    </tr>
        <?php
		  }
		}else{
		?>
        <tr class="ListContent">
         <td colspan="9"><font color="#FF0000">数据正在维护中......</font></td>
        </tr>
        <?php
        }
		?>
      </table>
	  </div>
    </td>
  </tr>
  <tr> 
    <td height="30" class="PageInfo" align="right" background="images/titlebg.gif">
	 <?=$Page->show_link()?>
    </td>
  </tr>
</table>
</form>
</body>
</html>