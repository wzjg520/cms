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
//等级实体类
class LeverModel extends Model{
	private $_tpl;
	private $_id;
	private $_lever_name;
	private $_lever_info;
	private $_limit;
	private $premission;
	//拦截器
	public function __set($_key,$_value){
		$this->$_key=$_value;
	}
	public function __get($_key){
		return $this->$_key;
	}
	public function getLeverCount(){
		$_sql="SELECT COUNT(1) FROM cms_lever";
		return $this->total($_sql);
	}
	//获得所有数据
	public function getAlllever(){
		$_sql="SELECT id,lever_name,lever_info FROM cms_lever";
		return parent::all($_sql);
	}
	//获得所有数据用于分页
	public function getAllLimitLever(){
		$_sql="SELECT id,lever_name,lever_info,premission FROM cms_lever $this->_limit ";
		return parent::all($_sql);
	}
	//获得一条数据
	public function getOneLever(){
		$_sql="SELECT
								id,
								lever_name,
								lever_info,
								premission
					FROM
								cms_lever
				WHERE
								id='$this->_id'
						OR
								lever_name='$this->_lever_name'";

		return $this->one($_sql);
	}
	//新增等级
	public function addLever(){
		$_sql="INSERT INTO cms_lever (
																	lever_name,
																	lever_info,
																	premission
																	)
													VALUES
																(
																	'$this->_lever_name',
																	'$this->_lever_info'
																	'$this->premission'
																)";
		return parent::adu($_sql);
	}
	//修改等级
	public function updateLever(){
		$_sql="UPDATE
								cms_lever
						SET
								lever_name='$this->_lever_name',
								lever_info='$this->_lever_info',
								premission='$this->premission'
					WHERE
								id='$this->_id'";
		return $this->adu($_sql);
	}
	//删除等级
	public function deleteLever(){
		$_sql="DELETE FROM
												cms_lever
								WHERE
												id='$this->_id'
										LIMIT 1
		";
		return $this->adu($_sql);
	}
// 	//获得等级详情
// 	public function getAllLever(){
// 		$_sql="SELECT id,lever_name FROM cms_lever";
// 		return parent::all($_sql);
// 	}



}




?>