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
<form name="Form" id="Form" method="post" onsubmit="return DelAllInfo()" action="Photo_Save.php?Action=DelAll">
<table width="99%" border="0"  cellpadding="0" cellspacing="1" bgcolor="#01a5a6" style="font-size:14px; line-height:20px;">
  <tr> 
    <td valign="top" bgcolor="#FFFFFF">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ToptitleInfo">
        <tr> 
          <td width="5%" align="center" valign="middle" background="images/titlebg.gif"><img src="images/ioc-03.png" width="16" height="18" /></td>
          <td width="80%" height="35" align="left" background="images/titlebg.gif"><strong>ͼƬ��Ϣ</strong></td>
		  <td width="8%" height="35" align="center" valign="middle" background="images/titlebg.gif"><img src="images/syetem_management.png" width="14" height="14" /> <a href="Photo_Add.php">����</a></td>
		  <td width="5%" height="35" align="center" valign="middle" background="images/titlebg.gif">
          <input name="�ύ" type="submit" value="����ɾ��" /></a>
		  </td>
		  <td width="2%" height="35" background="images/titlebg.gif"></td>  
        </tr>
        
      </table>
	  <div class="RightBody">
      <table class="TableInfo" onmouseover="changeto()" onmouseout="changeback()" >
        <tr class="ListName">
         <td width="3%"><input type="checkbox" onclick="CheckAll()" /></td>
		 <td width="5%">���</td>
		 <td width="10%">ͼƬ����</td>
		 <td width="10%">�������</td>
         <td width="17%">����ͼ</td>	
         <td width="15%">����ʱ��</td>
         <td width="5%">�ö�</td>
		 <td width="10%">״̬</td>
         <td width="15%">�༭</td>
	    </tr>
		<?php
		 $sqlA="Select * from PhotoInfo";
		 $resultA=$db->db_query($sqlA);
		 $total=mssql_num_rows($resultA);
		 $Page=new page_link($total,10);
		 
		 $sql="Select * from(Select row_number() over(order by IsTop desc,CreateDate,UpdateDate) as RowNum ,* from View_Photo) as TableInfo where RowNum between ".$Page->firstcount." and ".$Page->displaypg."";
	
		 $result=$db->db_query($sql);
		 if($total>0){
		  while($rs=mssql_fetch_array($result)){
		?>
		<tr class="ListContent">
         <td><input type="checkbox" name="DelBox[]" value="<?=$rs['ID']?>"/></td>
		 <td><?=$rs['RowNum']?></td>
		 <td><?=$rs['PhotoTitle']?></td>
         <td><?=$rs['CategoryName']?></td>
         <td><img src="UploadFile/<?=$rs['ImgPath']?>" width="60" height="33"/></td>
         <td><?=$rs['CreateDate']?></td>
         <td align="center">
            <?php
		    if($rs['IsTop']==0){
		    ?>
            <a href="Photo_Save.php?Action=DisaIsTop&ID=<?=$rs['ID']?>"><font color="#FF0000">�ö�</font></a>
            <?php
		    }else{
		    ?>
            <a href="Photo_Save.php?Action=EnaIsTop&ID=<?=$rs['ID']?>"><font color="#0000FF">ȡ��</font></a>
            <?php
		    }
		    ?>
         </td>
		 <td class="Operation">
		 <?php
		 if($rs['IsActive']==1){
		 ?>
         	<img src="images/ok.gif" width="16" height="16"/>
            <a href="Photo_Save.php?Action=Disable&ID=<?=$rs['ID']?>">����</a>
         <?php
		 }else{
		 ?>
         	<img src="images/error.gif" width="16" height="16"/>
            <a href="Photo_Save.php?Action=Enable&ID=<?=$rs['ID']?>">����</a>
         <?php
		 }
		 ?> 
         </td>
		 <td class="Operation">
			<img src="images/edit.gif" width="16" height="16" />
            <a href="Photo_Edit.php?ID=<?=$rs['ID']?>">�༭</a>&nbsp; &nbsp;
			<img src="images/del.gif"  width="16" height="16" />
            <a href="Photo_Save.php?Action=Del&amp;ID=<?=$rs['ID']?>" onclick="return DelInfo()">ɾ��</a>
		 </td>
	    </tr>
        <?php
		  }
		}else{
		?>
        <tr>
         <td colspan="9"><font color="#FF0000">��������ά����......</font></td>
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