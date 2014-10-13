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
//前台显示导航条
global $_tpl,$cache;
//前台缓存开关
define(IS_CACHE, true);
if(IS_CACHE && $cache->noCache()){
	ob_start();
	$_tpl->cache(Tool::fileName().'.html');
}
$_nav=new NavAction($_tpl);
$_nav->showFront();
$cookie=new Cookie('username');
if(IS_CACHE && !$cache->noCache()){
	$_tpl->assign('header', '<script>getHeader();</script>');
}else{
	if($cookie->getCookie()){
		$_tpl->assign('header', '<a href="#">您好！'.$cookie->getCookie().'</a><a href="register.php?action=logout">退出</a>');
	}else{
		$_tpl->assign('header', '<a href="register.php?action=login">登陆</a><a href="register.php?action=reg">注册</a>');
	}

}

//友情链接
$link=new FriendLinkAction($_tpl);
$link->index();
//热门标签
$tag=new TagAction($_tpl);
$tag->getFiveTag();
//注入网站名
$_tpl->assign('webname', WEBNAME);


?>