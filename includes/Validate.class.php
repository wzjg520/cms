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
class Validate{
	static public function checkNull($_data){
		if(trim($_data)=='')return true;
		return false;
	}
	static public function checkEmail($_data){
		if (!preg_match('/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/',$_data)) return true;
			return false;
	}
	static public function checkNum($_data){
		if(!is_numeric($_data))return true;
		return false;
	}
	static public function checkLength($_data,$_length,$_flag){
		if($_flag=='max'){
			if(mb_strlen(trim($_data),'utf-8')>$_length){
				return true;
			}
		}elseif($_flag=='min'){
			if(mb_strlen(trim($_data),'utf-8')<$_length){
				return true;
			}
		}elseif($_flag=='equals'){
			if(mb_strlen($_data,'utf-8') != 4)return true;
		}else{
			Tool::alertBack('执行出错');
		}
		return false;
	}
	static public function checkEquals($_data,$_dataCompare){
		if(trim($_data)!=trim($_dataCompare))return true;
		return false;
	}
	static public function checkSession(){
		if(!isset($_SESSION['admin'])){
			Tool::alertBack('警告：非法登陆');
		}
	}
}




?>