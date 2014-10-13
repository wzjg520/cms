<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="../style/admin.css" type="text/css"/>
<script type="text/javascript" src="../js/admin_top_nav.js"></script>

<title>top</title>
</head>

<body id="top">
		<h1>logo</h1>
		<ul>
			<li><a href="../templates/sidebar.html" target="sidebar" id="nav1" class="checked" onclick="javascript:checked(1)">首页</a></li>
			<li><a href="../templates/sidebar_content.html" target="sidebar" id="nav2" onclick="javascript:checked(2)">内容</a></li>
			<li><a href="../templates/sidebar_user.html" target="sidebar" id="nav3" onclick="javascript:checked(3)">会员</a></li>
			<li><a href="../templates/sidebar_system.html" target="sidebar" id="nav4" onclick="javascript:checked(4)">系统</a></li>
		</ul>
		<p>您好 <strong><?php echo $this->_vars['admin_user']?></strong> [ <?php echo $this->_vars['admin_lever']?> ] [ <a href="#">去首页</a> ] [ <a href="admin_login.php?action=loginOut" target="_parent">退出</a> ]</p>
</body>
</html>