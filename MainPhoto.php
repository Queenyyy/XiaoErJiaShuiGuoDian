<link href="css/css.css" rel="stylesheet" type="text/css">
<div class="MP_Title"><span class="Text">小二家门店</span></div>
<div class="MP_Cont">
<div id="colee_left" style="overflow:hidden;width:1020px; height:130px; font-size:12px;  color:#74adaa; margin-top:10px;">
<table cellpadding="0" cellspacing="0">
<tr>
  <td id="colee_left1" valign="top" align="center"><table cellpadding="8" cellspacing="0" id="ScrollPic">
	  <tr align="center">
		<td height="95"><a href="Store.php" target="_blank"><img src="images/Photo_1.jpg"/>园湖店</a></td>
		<td height="95"><a href="Store.php" target="_blank"><img src="images/Photo_2.jpg"/>东葛店</a></td>
		<td height="95"><a href="Store.php" target="_blank"><img src="images/Photo_3.jpg"/>安吉店</a></td>
		<td height="95"><a href="Store.php" target="_blank"><img src="images/Photo_4.jpg"/>北湖店</a></td>
		<td height="95"><a href="Store.php" target="_blank"><img src="images/Photo_5.jpg"/>朝阳店</a></td>
		<td height="95"><a href="Store.php" target="_blank"><img src="images/Photo_6.jpg"/>北大店</a></td>
		<td height="95"><a href="Store.php" target="_blank"><img src="images/Photo_7.jpg"/>琅东店</a></td>
		<td height="95"><a href="Store.php" target="_blank"><img src="images/Photo_8.jpg"/>凤岭店</a></td>
	  </tr>
  </table></td>
  <td id="colee_left2" valign="top"></td>
</tr>
</table>
</div>
</div>
<script>
//使用div时，请保证colee_left2与colee_left1是在同一行上.
var speed=30//速度数值越大速度越慢
var colee_left2=document.getElementById("colee_left2");
var colee_left1=document.getElementById("colee_left1");
var colee_left=document.getElementById("colee_left");
colee_left2.innerHTML=colee_left1.innerHTML
function Marquee3(){
if(colee_left2.offsetWidth-colee_left.scrollLeft<=0)//offsetWidth 是对象的可见宽度
colee_left.scrollLeft-=colee_left1.offsetWidth//scrollWidth 是对象的实际内容的宽，不包边线宽度
else{
colee_left.scrollLeft++
}
}
var MyMar3=setInterval(Marquee3,speed)
colee_left.onmouseover=function() {clearInterval(MyMar3)}
colee_left.onmouseout=function() {MyMar3=setInterval(Marquee3,speed)}
</script>

