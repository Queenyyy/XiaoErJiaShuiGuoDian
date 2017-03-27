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
<script charset="utf-8" src="inc/kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="inc/kindeditor/lang/zh_CN.js"></script>
<script charset="utf-8" src="inc/kindeditor/plugins/code/prettify.js"></script>
<script>
var editor;
KindEditor.ready(function(K) {
		editor = K.create('textarea[name="ArticleContent"]', {
		cssPath : 'inc/kindeditor/plugins/code/prettify.css',
		uploadJson : 'inc/kindeditor/php/upload_json.php',
		fileManagerJson : 'inc/kindeditor/php/file_manager_json.php',
		allowFileManager : true
	});
});
</script>
</head>
<script language="javascript">
function CheckForm(){
	if(document.Form.ArticleTitle.value==""){
		alert("������ⲻ��Ϊ�գ�");
		return false;
	}
	if(document.Form.KeyWords.value==""){
		alert("�ؼ��ֲ���Ϊ�գ�");
		return false;
	}
	if(document.Form.CategoryNo.value==-1){
		alert("�����Ϊ�գ�");
		return false;
	}
	if(editor.isEmpty()){  //���߱༭����֤��
		alert("���ݲ���Ϊ�գ�");
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
          <td width="95%" height="35" align="left" background="images/titlebg.gif"><strong>������Ϣ�༭</strong></td> 
        </tr>
      </table>
      <?php
	  $ID=$_GET['ID'];
	  if(!is_numeric($ID)){
		  echo "<script language='javascript'>alert('���󣡷Ƿ�������');window.location.href='Login.php';</script>";
		  exit;
	  }
	  $sql="Select * from View_Article where ID=".$ID."";
	  $result=$db->db_query($sql);
	  $rs=mssql_fetch_array($result);
	  ?>
	  <div class="RightBody">
      <form method="post" id="Form" name="Form" action="Article_Save.php?Action=Edit&ID=<?=$rs['ID']?>" onsubmit="return CheckForm();">
      <table class="TableInfo">
        <tr>
		 <td width="80" align="right">������⣺</td>
		 <td><input name="ArticleTitle" type="text" value="<?=$rs['ArticleTitle']?>"/>&nbsp;<span class="Required">&nbsp;&nbsp;*����</span></td>
	    </tr>
		<tr>
		 <td width="80" align="right">�ؼ��֣�</td>
		 <td><input name="KeyWords" type="text" value="<?=$rs['KeyWords']?>"/>
		 &nbsp;<span class="Required">&nbsp;*����</span></td>
	    </tr>
         <tr>
		 <td width="80" align="right">�������</td>
		 <td>
           <select name="CategoryNo">
               <?php
                 $sqlC="Select * from Category where IsActive=1";
			     $resultC=$db->db_query($sqlC);
			     while($rsC=mssql_fetch_array($resultC)){
			   ?>
			   <option value="<?=$rsC['CategoryNo']?>" <?php if($rs['CategoryNo']==$rsC['CategoryNo']){echo "selected='selected'";} ?>>--<?=$rsC['CategoryName']?>--</option>
               <?php
		         }
			   ?>
           </select>
		 &nbsp;<span class="Required">&nbsp;��ѡ��</span>
         </td>
	    </tr>
		<tr>
		 <td width="80" align="right">�������ݣ�</td>
		 <td><textarea name="ArticleContent" style="width:99%; height:300px; visibility:hidden;"><?=urldecode($rs['ArticleContent'])?></textarea></td>
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