<ul>
<?php
//����SQL
$sql="select top 5 * from ArticleInfo where CategoryNo='CN-5281' order by ID desc";//��������ֻ��ʾǰ5��
//ִ��SQL
$result=$db->db_query($sql);
//ͳ�����ݲ�ִ���ж�
$total=mssql_num_rows($result);
//�жϲ�ѭ������
if($total>0){
	while($rs=mssql_fetch_array($result)){	
?>
<li><a href="NoticeCont.php?ID=<?=$rs['ID']?>" title="<?=$rs['ArticleTitle']?>"><?=mb_substr($rs['ArticleTitle'],0,20,'gb2312')?></a></li>

<?php
	}
}else{
?>
<li><strong>��������ά����......</strong></li>

<?php

}

?>

</ul>
