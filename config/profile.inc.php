<?php
//网站目录
define('ROOT_PATH', substr(__DIR__,0,-7));
//模板目录
define('TPL_DIR',ROOT_PATH.'/templates/');
//编译文件目录
define('TPL_C_DIR', ROOT_PATH.'/templates_c/');
//缓存文件目录
define('CACHE_DIR', ROOT_PATH.'/cache/');
define('WEBNAME','我的第一个cms系统');
//定义水印目录
define('WATER_DIR',ROOT_PATH.'/images/water.png');
//上传文件目录
define('UPLOAD_DIR','/uploads/');
//定义翻页size
define('PAGE_SIZE',10);
define('CONTENT_SIZE',5);
define('NEW_COMMEND',10);
//动态开启错误提示
ini_set('display_errors','on');
error_reporting(E_ALL &~E_NOTICE);

//数据库配置信息
define('DB_HOST','localhost');
define('DB_USER', 'root');
define('DB_PASS', 'ABC201314');
define('DB_NAME', 'cms');

//上一个url
define('PREV_URL',$_SERVER['HTTP_REFERER']);
//当前url
define('CURRENT_URL','http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
//前台显示导航数量
define('NAV_SIZE', 10);
//定义轮播器刷新时间
define('RO_TIME',3);
//定义轮播器个数
define('RO_NUM', 3);
//定义广告循环条数
define('ADVER_NUM',5);
?>
