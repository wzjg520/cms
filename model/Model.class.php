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
class Model{
	//获取下一个将要增值的id模型
	protected function nextId($_table){
		$_sql="SHOW TABLE STATUS LIKE '$_table'";
		$_obj=$this->one($_sql);
		return $_obj->Auto_increment;
	}
	//批量修改数据
	protected function mul($_sql){
		$_db=DB::getDB();
		$_db->multi_query($_sql);
		$_result='';

		DB::unDB($_result, $_db);
		return true;
	}
	//查找单个数据模型
	protected function one($_sql){
		$_db=DB::getDB();
		$_result=$_db->query($_sql);
		$_object=$_result->fetch_object();
		DB::unDB($_result, $_db);
		return $_object;
	}
	//查找数据量
	protected function total($_sql){
		$_db=DB::getDB();
		$_result=$_db->query($_sql);
		$_total=$_result->fetch_row();
		DB::unDB($_result, $_db);
		return $_total[0];
	}
	//查找所有
	protected function all($_sql){
		$_db=DB::getDB();
		$_result=$_db->query($_sql);
		$_html=array();
		while (!!$_objects=$_result->fetch_object()){
			$_html[]=$_objects;
		}
		DB::unDB($_result, $_db);
		return Tool::htmlString($_html);
	}
	//增删改会员
	protected function adu($_sql){
		$_db=DB::getDB();
		$_db->query($_sql);
		$_affected_rows=$_db->affected_rows>0?1:0;
		$_result='';
		DB::unDB($_result, $_db);
		return $_affected_rows;
	}
}




?>