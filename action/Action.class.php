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
class Action{
	protected  $_tpl;
	protected  $_model;
	public function __construct(&$_tpl,&$_model=null){
		$this->_tpl=$_tpl;
		$this->_model=$_model;
	}

	public function page($_total,$_pagesize=PAGE_SIZE){
		$_page=new Page($_total,$_pagesize,3);
		$this->_model->_limit=$_page->_limit;
		$this->_tpl->assign('page',$_page->pageShow());
		$this->_tpl->assign('num',($_page->_page-1)*$_pagesize);
	}
}




?>