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
<!--���ù����ű�Function.js-->
<script language="javascript" src="js/Function.js"></script>
<script language="javascript" src="js/Tab.js"></script>
<body>
<form name="Form" id="Form" method="post" onsubmit="return DelAllInfo()" action="Supp_Save.php?Action=DelAll">
<table width="99%" border="0"  cellpadding="0" cellspacing="1" bgcolor="#01a5a6" style="font-size:14px; line-height:20px;">
  <tr> 
    <td valign="top" bgcolor="#FFFFFF">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ToptitleInfo">
        <tr> 
          <td width="5%" align="center" valign="middle" background="images/titlebg.gif"><img src="images/custom.png" width="20" height="20" /></td>
          <td width="80%" height="35" align="left" background="images/titlebg.gif"><strong>��������Ϣ</strong></td>
		  <td width="8%" height="35" align="center" valign="middle" background="images/titlebg.gif"><img src="images/syetem_management.png" width="14" height="14" /> <a href="Supp_Add.php">����</a></td>
		  <td width="5%" height="35" align="center" valign="middle" background="images/titlebg.gif">
           <input name="�ύ" type="submit" value="����ɾ��" /></a>
		  </td>
		  <td width="2%" height="35" background="images/titlebg.gif"></td>  
        </tr>
        
      </table>
	  <div class="RightBody">
      <table class="TableInfo" onmouseover="changeto()" onmouseout="changeback()" >
        <tr class="ListName" >
         <td width="3%"><input type="checkbox" onclick="CheckAll()" /></td>
		 <td width="5%">���</td>
		 <td width="8%">�����̱��</td>
		 <td width="15%">����������</td>
		 <td width="20%">��ַ</td>
         <td width="8%">��ϵ��ʽ</td>
		 <td width="10%">��ע</td>
         <td width="15%">��������</td>
	    </tr>
		<?php
		 //ͳ����������
		 $sqlA="Select * from SuppliInfo";
		 $resultA=$db->db_query($sqlA);
		 $total=mssql_num_rows($resultA);
		 //���÷�ҳ����
		 $Page=new page_link($total,10);//����һҳ��ʾ��������
		 
		 $sql="Select * from(Select row_number() over(order by ID asc) as RowNum ,* from SuppliInfo) as TableInfo where RowNum between ".$Page->firstcount." and ".$Page->displaypg."";
		 $result=$db->db_query($sql);
		 if($total>0){
		  while($rs=mssql_fetch_array($result)){
		?>
		<tr class="ListContent">
         <td><input type="checkbox" name="DelBox[]" value="<?=$rs['ID']?>"/></td>
		 <td><?=$rs['RowNum']?></td>
		 <td><?=$rs['SupplierNo']?></td>
		 <td><?=$rs['SupplierName']?></td>
         <td><?=$rs['Addr']?></td>
         <td><?=$rs['Phone']?></td>
         <td><?=$rs['Remar']?></td>
		 <td class="Operation">
			<img src="images/edit.gif" width="16" height="16" />
            <a href="Supp_Edit.php?ID=<?=$rs['ID']?>">�༭</a>&nbsp; &nbsp;
			<img src="images/del.gif"  width="16" height="16" />
            <a href="Supp_Save.php?Action=Del&amp;ID=<?=$rs['ID']?>" onclick="return DelInfo()">ɾ��</a>
		 </td>
	    </tr>
        <?php
		  }
		}else{
		?>
        <tr>
         <td colspan="10"><font color="#FF0000">��������ά����......</font></td>
        </tr>
        <?php
        }
		?>
      </table>
	  </div>
    </td>
  <tr> 
    <td height="30" class="PageInfo" align="right" background="images/titlebg.gif">
	 <?=$Page->show_link()?>
    </td>
  </tr>
</table>
</form>
</body>
</html>