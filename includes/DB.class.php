<?php
/*
* CMS VERSION 1.0
* ----------------------------------------
* COPY	2012-1013
* WEB :HTTP://jiajun.com
* =======================
* AUTHOR:WANG
* DATE:2014.3.11
* */
class DB{
	//创建数据库连接
	static  public function getDB(){
		$_mysqli=new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if(mysqli_connect_error()){
			exit('error:数据库连接出错'.mysqli_connect_error());
		}
		if(!$_mysqli->set_charset('utf8')){
			exit('error:设置字符集错误'.mysqli_connect_error());
		}
		return $_mysqli;
	}
	//清理
	static public function unDB(&$_result,&$_db){
		if(is_object($_result)){
			$_result->free();
			$_result=null;
		}
		if(is_object($_db)){
			$_db->close();
			$_db=null;
		}
	}

}




?>