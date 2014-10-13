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
$_tpl->assign('admin_user', $_SESSION['admin']['admin_user']);
$_tpl->assign('admin_lever', $_SESSION['admin']['admin_lever']);
$_tpl->display('top.html');




?>