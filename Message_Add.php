<?
include("Admin/inc/DBClass.php");
?>
<script language="javascript">
function CheckForm(){
	//������֤������
	if(document.Form.Cont.value==""){//document��ʾ��ҳ��
		alert("�Բ����������ݲ���Ϊ�գ������룡");//alert�����Ի���
		return false;
	}
	return true;
}
</script>
<link href="css/css.css" rel="stylesheet" type="text/css">
<link href="css/Popup.css" rel="stylesheet" type="text/css">
<body>
<div class="MesgA_Container">
 <div class="Top"><?php include("Top.php");?></div>
 <div class="Mesg_Main">
 <form action="Messa_Save.php?Action=Add&ID=<?=$_GET['ID']?>" method="post" name="Form" id="Form" onSubmit="return CheckForm();">
<table width="99%" border="0"  cellpadding="0" cellspacing="1" bgcolor="#01a5a6" style="font-size:14px; line-height:20px;">
  <tr> 
    <td valign="top" bgcolor="#e7edd3">
      <table width="100%" border="0" cellspacing="0" cellpadding="0" class="ToptitleInfo">
        <tr> 
          <td width="20%" align="left" valign="middle"><strong>��������</strong></td>
          <td width="65%" height="35" align="left"></td>
		  <td width="8%" height="35" align="center" valign="middle" background="images/titlebg.gif"></td>
		  <td width="5%" height="35" align="center" valign="middle" background="images/titlebg.gif">
          </td>
		  <td width="2%" height="35" background="images/titlebg.gif"></td>  
        </tr>
      </table>
	  <div class="RightBody">
      <table class="TableInfo" width="98%" border="0" cellspacing="1" cellpadding="0">
      <tr>
        <td width="10%" height="30" align="right">���ݣ�</td>
        <td width="90%" height="100">
          <textarea name="Cont" cols="50" rows="5" id="Cont"></textarea>          
        </td>
      </tr>
      <tr>
        <td width="10%" align="right">��ϵ�绰��</td>
        <td width="90%" >
        <input name="Phone" type="text">        
        </td>
      </tr>
      <tr>
       <td height="30" align="right">������Ʒ��</td>
        <td height="30">
         <select name="Fruits" id="Fruits">
          <option value="-1">-��ѡ����Ʒ-</option>
          <option value="FT001">ƻ��</option>
          <option value="FT002">ѩ��</option>
          <option value="FT003">⨺���</option>
          <option value="FT004">â��</option>
          <option value="FT005">����</option>
         </select>
        </td>
       </tr>
       <tr>
        <td height="30"></td>
        <td height="30"><input type="submit" name="buttonAdd" id="buttonAdd" value="��������" /></td>
      </tr>
    </table>
      </div>
    </td>
  </tr>
  <tr> 
    <td height="30" class="PageInfo" align="right" bgcolor="#e7edd3">
    </td>
  </tr>
</table>
</form> 
 </div>
 <div class="Foot"><?php include("Foot.php");?></div>
</div>
</body>
