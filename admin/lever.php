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
require dirname(__DIR__).'/init.inc.php';
global $_tpl;
if(!isset($_GET['action'])){
	exit('非法操作');
}
Validate::checkSession();
Tool::premission('4', '您无权进行等级管理');
//管理员模块控制器入口
$_lever=new LeverAction($_tpl);
$_lever->action();
$_tpl->create('lever.html');



?>