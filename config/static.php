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
//引入配置文件
require dirname(__DIR__).'/init.inc.php';
if(!IS_CACHE)exit;
global $cache;
$cache->action($_GET['type']);






?>