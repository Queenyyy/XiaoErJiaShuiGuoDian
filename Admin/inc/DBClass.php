<?php
class db_class{
	//�򿪷�����
	var $Server='.';	//����������
	var $UserName='sa';		//�������û���
	var $PassWord='Zaq12wsx';	//����������
	var $DataBase='FruitDB';		//���ݿ�����
	
	//���ӷ�����  @mssql_connect���ش�����ʾ
	function db_connect(){
		$this->conn=mssql_connect($this->Server,$this->UserName,$this->PassWord) or die("�Բ��𣬷���������ʧ�ܣ�");
		return $this->conn;
	}
	
	//�������ݿ�
	function db_select(){
		mssql_select_db($this->DataBase,$this->conn) or die("�Բ������ݿ�����ʧ�ܣ�");
	}
	//ִ��SQL���
	function db_query($sql){
		if($this->query=mssql_query($sql,$this->conn)){
			return $this->query;
		}else{
			return false;
			}	
	}
	
}

$db=new db_class(); //ʵ����db_class��
$db->db_connect();	//���÷��������ӷ���
$db->db_select();	//�������ݿ����ӷ���

//����ʱ��
date_default_timezone_set('PRC');//�й�
?>