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
session_start();
//设置utf-8编码
header('Content-type:text/html;charset=utf-8');
//引入配置文件
require __DIR__.'/config/profile.inc.php';
//创建数据库连接
require ROOT_PATH.'/includes/DB.class.php';
//设置中国时区
date_default_timezone_set('Asia/Shanghai');

//引入模板类
require ROOT_PATH.'/includes/Template.class.php';
//引入工具类
require ROOT_PATH.'/includes/Tool.class.php';
//自动引入类
function __autoload($_className){
	if(substr($_className,-5)=='Model'){
		require ROOT_PATH.'/model/'.$_className.'.class.php';
	}elseif(substr($_className,-6)=='Action'){
		require ROOT_PATH.'/action/'.$_className.'.class.php';
	}else{
		require ROOT_PATH.'/includes/'.$_className.'.class.php';
	}
}
//不需要全局缓存的文件
$cache=new Cache(array('code','ckeditor_upload','static','upload','register','cast'));
//实例化模板类
$_tpl=new Templates($cache);
//引入缓存设置
require 'common.inc.php';

 ?>