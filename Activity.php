<ul>
<?php
//构建SQL
$sql="select top 5 * from ArticleInfo where CategoryNo='CN-5281' order by ID desc";//新闻中心只显示前5条
//执行SQL
$result=$db->db_query($sql);
//统计数据并执行判断
$total=mssql_num_rows($result);
//判断并循环数据
if($total>0){
	while($rs=mssql_fetch_array($result)){	
?>
<li><a href="NoticeCont.php?ID=<?=$rs['ID']?>" title="<?=$rs['ArticleTitle']?>"><?=mb_substr($rs['ArticleTitle'],0,20,'gb2312')?></a></li>

<?php
	}
}else{
?>
<li><strong>数据正在维护中......</strong></li>

<?php

}

?>

</ul>
