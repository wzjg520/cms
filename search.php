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
$_search=new SearchAction($_tpl);
$_search->action();
$_tpl->display('search.html');




 ?>