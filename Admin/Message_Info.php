<?
include("inc/DBClass.php");
include("inc/Page.php");
?>
<!--调用公共脚本Function.js-->
<script language="javascript" src="js/Function.js"></script>
<script language="javascript" src="js/Tab.js"></script>
<link href="css/css.css" rel="stylesheet" type="text/css">
<body>
<form name="Form" id="Form" method="post" >
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
      <table class="TableInfo" onMouseOver="changeto()" onMouseOut="changeback()">
        <tr class="ListTitle">
          <td valign="top">
		  <?
		   $sql="Select * from MessageInfo order by CreateDate desc";
	       $result=$db->db_query($sql);
	       $rows=mssql_num_rows($result);
	       if($rows>0){
		    while($rs=mssql_fetch_array($result)){
	      ?>
   <table width="99%" border="0" cellspacing="1" cellpadding="0" class="TB">
    <tr>
     <td width="13%" height="30" align="right"><?=$rs['UserName']?>：</td>
     <td width="87%" align="center"><table width="99%" border="0" cellspacing="0" cellpadding="0" class="BT">
    <tr>
     <td><span id="Cont"><?=$rs['Cont']?></span>
         
    </td>
    </tr>
    <tr>
     <td align="right">
      联系电话：<span id="Cont"><?=$rs['Phone']?></span>
     &nbsp;&nbsp;&nbsp;购买商品：
      <?php
	   if($rs['Fruits']=="FT001"){
	    echo "苹果";
	   }else if($rs['Fruits']=="FT002"){
		echo "雪梨";
	   }else if($rs['Fruits']=="FT003"){
		echo "猕猴桃";
	   }else if($rs['Fruits']=="FT004"){
		echo "芒果";
	   }else{
		echo "枇杷";
	   }
	  ?>   &nbsp;&nbsp;&nbsp;  
      <a href="Reply.php?ID=<?=$rs['ID']?>"><span id="reply">回复</span></a>
     </td>
    </tr>
    <tr>
     <td align="right">发表时间：<?=$rs['CreateDate']?></td>
    </tr>
    <tr>
     <td align="right" bgcolor="#CCCCCC">
	<? 
	 $sqlA="Select * from ReplyInfo";
	 $resultA=$db->db_query($sqlA);
	 $total=mssql_num_rows($resultA);
	 $Page=new page_link($total,5);
		 
	 $sqlR="Select * from ReplyInfo where MessageNoR='".$rs['ID']."'";
	 $resultR=$db->db_query($sqlR);
	 $rowsR=mssql_num_rows($resultR);
	  if($rowsR>0){ 
	   while($rsR=mssql_fetch_array($resultR)){
	?>
   <table width="98%" border="0" cellspacing="0" cellpadding="0">
    <tr>
     <td><?=$rsR['UserNameR']?> ：<?=$rsR['ContR']?></td>
    </tr>
    <tr>
     <td>门店：
      <?php
	   if($rsR['StoreName']=="SN001"){
	    echo "园湖店";
	   }else if($rsR['StoreName']=="SN002"){
		echo "东葛店";
	   }else if($rsR['StoreName']=="SN003"){
		echo "北大店";
	   }else if($rsR['StoreName']=="SN004"){
		echo "北湖店";
	   }else{
		echo "琅东店";
	   }
	  ?>
     </td>
    </tr>
    <tr>
    <td>回复时间：<?=$rsR['CreateDateR']?></td>
    </tr>
   </table>
   <?
		}}else{}
   ?>
   </td>
  </tr>
 </table>
</td>
</tr>
</table>
    <?
		}}else{
	?>
    <tr class="ListContent">
      <td> 对不起，暂无留言！ </td>
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
