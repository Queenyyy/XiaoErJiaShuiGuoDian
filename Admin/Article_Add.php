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
<link rel="stylesheet" href="inc/kindeditor/themes/default/default.css" />
<link rel="stylesheet" href="inc/kindeditor/plugins/code/prettify.css" />
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
		alert("公告标题不能为空！");
		return false;
	}
	if(document.Form.KeyWords.value==""){
		alert("关键字不能为空！");
		return false;
	}
	if(document.Form.CategoryNo.value==-1){
		alert("类别不能为空！");
		return false;
	}
	if(editor.isEmpty()){  //在线编辑器验证空
		alert("内容不能为空！");
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
          <td width="95%" height="35" align="left" background="images/titlebg.gif"><strong>发布公告</strong></td> 
        </tr>
        
      </table>
	  <div class="RightBody">
      <form method="post" id="Form" name="Form" action="Article_Save.php?Action=Add" onsubmit="return CheckForm();">
      <table class="TableInfo">
        <tr>
		 <td width="80" align="right">公告标题：</td>
		 <td><input name="ArticleTitle" type="text"/>
             &nbsp;<span class="Required">&nbsp;*必填</span></td>
	    </tr>
		<tr>
		 <td width="80" align="right">关键字：</td>
		 <td><input name="KeyWords" type="text" />
		 &nbsp;<span class="Required">&nbsp;*必填</span></td>
	    </tr>
        <tr>
		 <td width="80" align="right">所属类别：</td>
		 <td>
           <select name="CategoryNo">
		       <option value="-1">--请选择类别--</option>
               <?php
                 $sql="Select * from Category where IsActive=1";
			     $result=$db->db_query($sql);
			     while($rs=mssql_fetch_array( $result)){
			   ?>
			   <option value="<?=$rs['CategoryNo']?>">--<?=$rs['CategoryName']?>--</option>
               <?php
		         }
			   ?>
           </select>
		 &nbsp;<span class="Required">&nbsp;请选择</span>
         </td>
	    </tr>
		<tr>
		 <td width="80" align="right">公告内容：</td>
		 <td><textarea name="ArticleContent" style="width:99%; height:300px; visibility:hidden;"></textarea></td>
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