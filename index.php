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
require dirname(__FILE__).'/init.inc.php';
global $_tpl;
$index=new IndexAction($_tpl);
$index->action();
$_tpl->display('index.html');
 ?>