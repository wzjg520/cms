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
Tool::premission('12', '您无权审核友情链接');
//管理员模块控制器入口
$_content=new LinkAction($_tpl);
$_content->action();
$_tpl->display('admin_link.html');




?>