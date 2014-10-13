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
//权限实体类
class PremissionModel extends Model{
	private $tpl;
	private $id;
	private $name;
	private $info;
	private $_limit;
	//拦截器
	public function __set($_key,$_value){
		$this->$_key=$_value;
	}
	public function __get($_key){
		return $this->$_key;
	}
	public function getPremissionCount(){
		$_sql="SELECT COUNT(1) FROM cms_premission";
		return $this->total($_sql);
	}
	//获得所有数据
	public function getAllPremission(){
		$_sql="SELECT id,name,info FROM cms_premission";
		return parent::all($_sql);
	}
	//获得所有数据用于分页
	public function getAllLimitPremission(){
		$_sql="SELECT id,name,info FROM cms_premission $this->_limit ";
		return parent::all($_sql);
	}
	//获得一条数据
	public function getOnePremission(){
		$_sql="SELECT
								id,
								name,
								info
					FROM
								cms_premission
				WHERE
								id='$this->id'
						OR
								name='$this->name'";

		return $this->one($_sql);
	}
	//新增权限
	public function addPremission(){
		$_sql="INSERT INTO cms_premission (
																	name,
																	info
																	)
													VALUES
																(
																	'$this->name',
																	'$this->info'
																)";
		return parent::adu($_sql);
	}
	//修改权限
	public function updatePremission(){
		$_sql="UPDATE
								cms_premission
						SET
								name='$this->name',
								info='$this->info'
					WHERE
								id='$this->id'";
		return $this->adu($_sql);
	}
	//删除权限
	public function deletePremission(){
		$_sql="DELETE FROM
												cms_premission
								WHERE
												id='$this->id'
										LIMIT 1
		";
		return $this->adu($_sql);
	}



}




?>