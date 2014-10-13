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
Tool::premission('13', '您无权进行会员管理');
//管理员模块控制器入口
$user=new UserAction($_tpl);
$user->action();
$_tpl->display('user.html');



?>