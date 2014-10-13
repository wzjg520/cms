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
class TagAction extends Action{
	public function __construct(&$_tpl){
		parent::__construct($_tpl,new TagModel());
	}
	public function getFiveTag(){
		$this->_tpl->assign('fiveTag',$this->_model->getFiveTag());
	}

}




?>