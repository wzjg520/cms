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
class CastModel extends Model{
	private $id;


	//拦截器
	public function __get($key){
		return $this->$key;
	}
	public function __set($key,$value){
		$this->$key=$value;
	}




}




?>