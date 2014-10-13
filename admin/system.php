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
Validate::checkSession();
Tool::premission('14', '您无权进行系统配置管理');
//系统配置模块控制器入口
$_system=new SystemAction($_tpl);
$_system->action();
$_tpl->display('system.html');



?>