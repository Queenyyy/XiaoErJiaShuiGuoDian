<?
include("inc/DBClass.php");
?>
<!--调用公共脚本Function.js-->
<script language="javascript" src="js/Function.js"></script>
<script language="javascript" src="js/Tab.js"></script>
<link href="css/css.css" rel="stylesheet" type="text/css">
<script language="javascript">
function CheckForm(){
	//创建验证表单方法
	if(document.Form.Cont.value==""){//document表示本页面
		alert("对不起，留言内容不能为空，请输入！");//alert弹出对话框
		return false;
	}
	return true;
}
</script>
<body>
<table width="99%" border="0"  cellpadding="0" cellspacing="1" bgcolor="#01a5a6" style="font-size:14px; line-height:20px;">
  <tr> 
    <td valign="top" bgcolor="#FFFFFF">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ToptitleInfo">
        <tr> 
          <td width="5%" align="center" valign="middle" background="images/titlebg.gif"><img src="images/custom.png" width="20" height="20" /></td>
          <td width="80%" height="35" align="left" background="images/titlebg.gif"><strong>留言中心</strong></td>
		  <td width="8%" height="35" align="center" valign="middle" background="images/titlebg.gif"></td>
		  <td width="5%" height="35" align="center" valign="middle" background="images/titlebg.gif">
          </td>
		  <td width="2%" height="35" background="images/titlebg.gif"></td>  
        </tr>
      </table>
	  <div class="RightBody">
      <table class="TableInfo" width="98%" border="0" cellspacing="1" cellpadding="0">
      <tr>
        <td width="10%" height="30" align="right">内容：</td>
        <td width="90%" height="100">
          <textarea name="ContR" cols="50" rows="5" id="ContR"></textarea>          
        </td>
      </tr>
      <tr>
        <td width="10%" align="right">联系电话：</td>
        <td width="90%" >
        <input name="Phone" type="text">        
        </td>
      </tr>
      <tr>
       <td height="30" align="right">购买商品：</td>
        <td height="30">
         <select name="Fruits" id="Fruits">
          <option value="-1">-请选择商品-</option>
          <option value="FT001">苹果</option>
          <option value="FT002">雪梨</option>
          <option value="FT003">猕猴桃</option>
          <option value="FT004">芒果</option>
          <option value="FT005">枇杷</option>
         </select>
        </td>
       </tr>
       <tr>
        <td height="30"></td>
        <td height="30"><input type="submit" name="buttonAdd" id="buttonAdd" value="发表留言" /></td>
      </tr>
    </table>
      </div>
    </td>
  </tr>
  <tr> 
    <td height="30" class="PageInfo" align="right" background="images/titlebg.gif">
    </td>
  </tr>
</table>
</body>
