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
Tool::premission('10', '您无权进行广告管理');
//模块控制器入口
$_adver=new AdverAction($_tpl);
$_adver->action();
$_tpl->create('adver.html');


?>