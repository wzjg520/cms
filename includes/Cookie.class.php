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
class Cookie{
	private $name;
	private $value;
	private $time;
	public function __construct($name,$value='',$time=0){
		$this->name=$name;
		$this->value=$value;
		$this->time= empty($time) ? 0 : $time+time();
	}
	public function setCookie(){
		setcookie($this->name,$this->value,$this->time);
	}
	public function unCookie(){
		setcookie($this->name,'',-1);
	}
	public function getCookie(){
		return $_COOKIE["$this->name"];
	}

}




?>