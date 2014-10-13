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
class TagModel extends Model{
	private $tag;
	private $id;
	//拦截器
	public function __set($key,$value){
		$this->$key=$value;
	}
	public function __get($key){
		return $this->$key;
	}
	public function setTag(){
		$_sql="INSERT INTO
							cms_tag
						(
							tag,
							count
					)VALUES(
							'{$this->tag}',
							0
						)";
		return parent::adu($_sql);
	}
	public function setCount(){
		$_sql="UPDATE cms_tag SET count=count+1 WHERE tag='{$this->tag}' OR id='{$this->id}'";
		return parent::adu($_sql);
	}
	public function getOneTag(){
		$_sql="SELECT tag,id,count FROM cms_tag WHERE tag='{$this->tag}' OR id='{$this->id}'";
		return parent::one($_sql);
	}
	public function getFiveTag(){
		$_sql="SELECT tag,id,count FROM cms_tag ORDER BY count DESC LIMIT 5";
		return parent::all($_sql);
	}
}




?>