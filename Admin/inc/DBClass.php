<?php
class db_class{
	//打开服务器
	var $Server='.';	//服务器名称
	var $UserName='sa';		//服务器用户名
	var $PassWord='Zaq12wsx';	//服务器密码
	var $DataBase='FruitDB';		//数据库名称
	
	//连接服务器  @mssql_connect隐藏错误提示
	function db_connect(){
		$this->conn=mssql_connect($this->Server,$this->UserName,$this->PassWord) or die("对不起，服务器连接失败！");
		return $this->conn;
	}
	
	//连接数据库
	function db_select(){
		mssql_select_db($this->DataBase,$this->conn) or die("对不起，数据库连接失败！");
	}
	//执行SQL语句
	function db_query($sql){
		if($this->query=mssql_query($sql,$this->conn)){
			return $this->query;
		}else{
			return false;
			}	
	}
	
}

$db=new db_class(); //实例化db_class类
$db->db_connect();	//调用服务器连接方法
$db->db_select();	//调用数据库连接方法

//设置时区
date_default_timezone_set('PRC');//中国
?>