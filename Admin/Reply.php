<?
include("inc/DBClass.php");
?>
<!--���ù����ű�Function.js-->
<script language="javascript" src="js/Function.js"></script>
<script language="javascript" src="js/Tab.js"></script>
<link href="css/css.css" rel="stylesheet" type="text/css">
<script language="javascript">
function CheckForm(){
	//������֤������
	if(document.Form.ContR.value==""){//document��ʾ��ҳ��
		alert("�Բ��𣬻ظ����ݲ���Ϊ�գ������룡");//alert�����Ի���
		return false;
	}
	return true;
}
</script>
<body>
<form action="Reply_Save.php?Action=Add&ID=<?=$_GET['ID']?>" method="post" name="Form" id="Form" onsubmit="return CheckForm();">
<table width="99%" border="0"  cellpadding="0" cellspacing="1" bgcolor="#01a5a6" style="font-size:14px; line-height:20px;">
  <tr> 
    <td valign="top" bgcolor="#FFFFFF">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ToptitleInfo">
        <tr> 
          <td width="5%" align="center" valign="middle" background="images/titlebg.gif"><img src="images/custom.png" width="20" height="20" /></td>
          <td width="80%" height="35" align="left" background="images/titlebg.gif"><strong>��������</strong></td>
		  <td width="8%" height="35" align="center" valign="middle" background="images/titlebg.gif"></td>
		  <td width="5%" height="35" align="center" valign="middle" background="images/titlebg.gif">
          </td>
		  <td width="2%" height="35" background="images/titlebg.gif"></td>  
        </tr>
      </table>
	  <div class="RightBody">
      <table class="TableInfo" width="98%" border="0" cellspacing="1" cellpadding="0">
      <tr>
        <td width="8%" height="30" align="right">���ݣ�</td>
        <td width="92%" height="100">
          <textarea name="ContR" cols="50" rows="5" id="ContR"></textarea>          
          <label for="ContR"></label></td>
      </tr>
      <tr>
       <td height="30" align="right">�ŵ꣺</td>
        <td height="30">
         <select name="StoreName" id="StoreName">
          <option value="-1">-��ѡ���ŵ�-</option>
          <option value="SN001">԰����</option>
          <option value="SN002">�����</option>
          <option value="SN003">�����</option>
          <option value="SN004">������</option>
          <option value="SN005">�Ŷ���</option>
         </select>
        </td>
       </tr>
       <tr>
        <td height="30"></td>
        <td height="30"><input type="submit" name="buttonAdd" id="buttonAdd" value="�ظ�����" /></td>
      </tr>
    </table>
      </div>
    </td>
  </tr>
  <tr> 
    <td height="30" class="PageInfo" align="right" background="images/titlebg.gif"></td>
  </tr>
</table>
</form> 
</body>
