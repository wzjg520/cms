<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="../style/admin.css" type="text/css"/>
<title>main</title>
</head>

<body id="main">
	<div class="map">
		管理员首页&gt;&gt;管理员管理&gt;&gt;<strong style="color:green;" id="title"><?php echo $this->_vars['current']?></strong>
	</div>

	<form method="post">
		<table class="table">
			<tr><th>系统配置</th></tr>
			<tr><td>配置网站名称：<input type="text" name="webname" value="<?php echo $this->_vars['system']->webname?>" class="text"/></td></tr>
			<tr><td>数据显示条数：<input type="text" name="page_size" value="<?php echo $this->_vars['system']->page_size?>" class="text"/></td></tr>
			<tr><td>上传文件目录：<input type="text" name="upload_dir" value="<?php echo $this->_vars['system']->upload_dir?>" class="text"/></td></tr>
			<tr><td>文章显示条数：<input type="text" name="content_size" value="<?php echo $this->_vars['system']->content_size?>" class="text"/></td></tr>
			<tr><td>评论显示条数：<input type="text" name="new_commend" value="<?php echo $this->_vars['system']->new_commend?>" class="text"/></td></tr>
			<tr><td>导航显示个数：<input type="text" name="nav_size" value="<?php echo $this->_vars['system']->nav_size?>" class="text"/></td></tr>
			<tr><td>轮播循环时间：<input type="text" name="ro_time" value="<?php echo $this->_vars['system']->ro_time?>" class="text"/></td></tr>
			<tr><td>轮播显示条数：<input type="text" name="ro_num" value="<?php echo $this->_vars['system']->ro_num?>" class="text"/></td></tr>
			<tr><td>广告切换条数：<input type="text" name="adver_num" value="<?php echo $this->_vars['system']->adver_num?>" class="text"/></td></tr>
			<tr><td><input class="sub" type="submit" name="send" value="提交"/></td></tr>
		</table>
		
	</form>

</body>



</html>