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
Validate::checkSession();
global $_tpl;
Tool::premission('2', '您无权清理缓存');
$main=new MainAction($_tpl);
$main->action();
$_tpl->display('main.html');




?>