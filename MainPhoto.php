<link href="css/css.css" rel="stylesheet" type="text/css">
<div class="MP_Title"><span class="Text">С�����ŵ�</span></div>
<div class="MP_Cont">
<div id="colee_left" style="overflow:hidden;width:1020px; height:130px; font-size:12px;  color:#74adaa; margin-top:10px;">
<table cellpadding="0" cellspacing="0">
<tr>
  <td id="colee_left1" valign="top" align="center"><table cellpadding="8" cellspacing="0" id="ScrollPic">
	  <tr align="center">
		<td height="95"><a href="Store.php" target="_blank"><img src="images/Photo_1.jpg"/>԰����</a></td>
		<td height="95"><a href="Store.php" target="_blank"><img src="images/Photo_2.jpg"/>�����</a></td>
		<td height="95"><a href="Store.php" target="_blank"><img src="images/Photo_3.jpg"/>������</a></td>
		<td height="95"><a href="Store.php" target="_blank"><img src="images/Photo_4.jpg"/>������</a></td>
		<td height="95"><a href="Store.php" target="_blank"><img src="images/Photo_5.jpg"/>������</a></td>
		<td height="95"><a href="Store.php" target="_blank"><img src="images/Photo_6.jpg"/>�����</a></td>
		<td height="95"><a href="Store.php" target="_blank"><img src="images/Photo_7.jpg"/>�Ŷ���</a></td>
		<td height="95"><a href="Store.php" target="_blank"><img src="images/Photo_8.jpg"/>�����</a></td>
	  </tr>
  </table></td>
  <td id="colee_left2" valign="top"></td>
</tr>
</table>
</div>
</div>
<script>
//ʹ��divʱ���뱣֤colee_left2��colee_left1����ͬһ����.
var speed=30//�ٶ���ֵԽ���ٶ�Խ��
var colee_left2=document.getElementById("colee_left2");
var colee_left1=document.getElementById("colee_left1");
var colee_left=document.getElementById("colee_left");
colee_left2.innerHTML=colee_left1.innerHTML
function Marquee3(){
if(colee_left2.offsetWidth-colee_left.scrollLeft<=0)//offsetWidth �Ƕ���Ŀɼ����
colee_left.scrollLeft-=colee_left1.offsetWidth//scrollWidth �Ƕ����ʵ�����ݵĿ��������߿��
else{
colee_left.scrollLeft++
}
}
var MyMar3=setInterval(Marquee3,speed)
colee_left.onmouseover=function() {clearInterval(MyMar3)}
colee_left.onmouseout=function() {MyMar3=setInterval(Marquee3,speed)}
</script>

