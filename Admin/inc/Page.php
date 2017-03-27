<?php
/*
*��ҳ������ʾ��
*stella.elva
*/
class page_link{
    var $page;//��ǰҳ�룻
    var $firstcount; //�����ݿ⣩��ѯ����ʼ�
    var $total; //��������
    var $displaypg;//ÿҳ��ʾ��������
    var $get_txt; //ҳ���ʾ�ֶ�
    var $url;//ҳ���ַ
    var $lastpg;//���ҳ��Ҳ����ҳ��
	var $where;//��ѯ����
	var $keyword;//��ѯ����

    function page_link($total,$displaypg=30,$get_txt='page',$url=''){
        $lastpg=ceil($total/$displaypg);
        $this->lastpg=$lastpg;
        $this->page=($_GET[$get_txt]=='')?1:min($_GET[$get_txt],$lastpg);
        $this->total=$total;
        $this->displaypg=$displaypg*$this->page;
        $this->get_txt=$get_txt;
        $this->url=($url=='')?$_SERVER["REQUEST_URI"]:$url;
        $this->firstcount=($this->page-1)*$displaypg+1;
    }
	//��Ҫ������ѯ
	function set_where($where,$keyword){
		$this->where=$where;
		$this->keyword=$keyword;
	}

    //url��ַ������:URL���ҳ���ѯ��Ϣ����ֵ
    function get_new_url(){
        $url=$this->url;
        $parse_url=parse_url($url);
        $url_query=$parse_url["query"]; //����ȡ��URL�Ĳ�ѯ�ִ�
        if($url_query){
            //��ΪURL�п��ܰ�����ҳ����Ϣ������Ҫ����ȥ�����Ա�����µ�ҳ����Ϣ��
            $url_query=ereg_replace("(^|&)".$this->get_txt."=[0-9]+","",$url_query);

            //��������URL�Ĳ�ѯ�ִ��滻ԭ����URL�Ĳ�ѯ�ִ���
            $new_url=str_replace($parse_url["query"],$url_query,$url);

            //��URL���page��ѯ��Ϣ��������ֵ
            if($url_query)$new_url.="&".$this->get_txt; else $new_url.=$this->get_txt;
        }else {
            $new_url=$url."?".$this->get_txt;
        }
        return  $new_url;
    }

    //�����ҳ���������룺
    function show_link(){
        $pagenav="��ʾ�� <B>".($this->total?($this->firstcount):0)."</B>-<B>".min($this->displaypg,$this->total)."</B> ����¼���� $this->total ����¼&nbsp;&nbsp;&nbsp;";

        //�������һҳ��
        if($this->lastpg >1){
            $prepg=$this->page-1; //��һҳ
            $nextpg=($this->page==$this->lastpg ? 0 : $this->page+1); //��һҳ
            $url=$this->get_new_url();
			$where=$this->where;
			$keyword=$this->keyword;
			if($where&&$keyword){
				$pagenav.="<a href='$url=1&Where=$where&KeyWord=$keyword'>��һҳ</a> ";
				if($prepg) $pagenav.=" <a href='$url=$prepg&Where=$where&KeyWord=$keyword'>��һҳ</a> "; else $pagenav.=" ��һҳ ";
				if($nextpg) $pagenav.=" <a href='$url=$nextpg&Where=$where&KeyWord=$keyword'>��һҳ</a> "; else $pagenav.=" ��һҳ ";
				$pagenav.=" <a href='$url=$this->lastpg&Where=$where&KeyWord=$keyword'>ĩҳ</a> ";
			}else{
				$pagenav.="<a href='$url=1'>��һҳ</a> ";
				if($prepg) $pagenav.=" <a href='$url=$prepg'>��һҳ</a> "; else $pagenav.=" ��һҳ ";
				if($nextpg) $pagenav.=" <a href='$url=$nextpg'>��һҳ</a> "; else $pagenav.=" ��һҳ ";
				$pagenav.=" <a href='$url=$this->lastpg'>ĩҳ</a> ";
			}
			
            //������ת�б�ѭ���г�����ҳ�룺
            $pagenav.="������ <select name='topage' size='1' onchange='javascript:window.location=\"$url=\"+this.value'>\n";
            for($i=1;$i<=$this->lastpg;$i++){
                if($i==$this->page) $pagenav.="<option value='$i' selected>$i</option>\n";
                else $pagenav.="<option value='$i'>$i</option>\n";
            }
            $pagenav.="</select> ҳ���� $this->lastpg ҳ";
			$this->where="";
			$this->keyword="";
        }

        return $pagenav;
    }
}
?>
