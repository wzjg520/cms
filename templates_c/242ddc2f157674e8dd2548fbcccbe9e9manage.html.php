<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="../style/admin.css" type="text/css"/>
<script type="text/javascript" src="../js/admin_manage.js"></script>
<title>main</title>
</head>

<body id="main">
	<div class="map">
		管理员首页&gt;&gt;管理员管理&gt;&gt;<strong style="color:green;" id="title"><?php echo $this->_vars['current']?></strong>
	</div>
	<ol>
		<li><a href="manage.php?action=show" class="selected">管理员列表</a></li>
		<li><a href="manage.php?action=add">添加管理员</a></li>
		<?php if($this->_vars['update']){ ?>
			<li><a href="manage.php?action=update">修改管理员</a></li>
		<?php }?>
	</ol>
	<?php if($this->_vars['add']){ ?>
	<form method="post" action="" name="add">
		<table class="table common">
				<tr><td>用 户 名：<input type="text" name="admin_user" class="text"/> （*不得大约20位）</td></tr>
				<tr><td>密　　码：<input type="password" name="admin_pass" class="text"/> （*不得小月6位并且不得大约20位）</td></tr>
				<tr><td>确认密码：<input type="password" name="admin_notepass" class="text"/></td></tr>
				<tr><td>等　　级：<select name="lever" class="text">
													<?php foreach($this->_vars['getAllLever'] as $key=>$value){?>
													<option value="<?php echo $value->id;?>"><?php echo $value->lever_name;?></option>
													<?php }?>

										</select>
					</td></tr>
				<tr><td><input type="submit" value="添加管理员" class="submit" name="send" onclick="return checkAddForm()"/>[ <a href="manage.php?action=show">返回列表</a> ]</td></tr>
		</table>
	</form>
	<?php }?>
	<?php if($this->_vars['delete']){ ?>
	 '删除页面'
	<?php }?>
	<?php if($this->_vars['update']){ ?>
		<form method="post" action="" name="update">
		<input type="hidden" name="id" value="<?php echo $this->_vars['oneManage']->id?>"/>
		<input type="hidden" name="lever" value="<?php echo $this->_vars['oneManage']->lever?>" id="admin_lever"/>
		<input type="hidden" name="admin_pass" value="<?php echo $this->_vars['oneManage']->admin_pass?>"/>
		<input type="hidden" name="prev_url" value="<?php echo $this->_vars['prev_url']?>"/>
		<table class="table common">
				<tr><td>用户名：<input type="text" name="admin_user" class="text" value="<?php echo $this->_vars['oneManage']->admin_user?>"readonly="readonly"/></td></tr>
				<tr><td>密　码：<input type="password" name="modify_pass" class="text"/></td></tr>
				<tr><td>等　级：<select name="lever" class="text">
													<?php foreach($this->_vars['getAllLever'] as $key=>$value){?>
													<option value="<?php echo $value->id;?>"><?php echo $value->lever_name;?></option>
													<?php }?>
										</select>
					</td></tr>
				<tr><td><input type="submit" value="修改管理员" class="submit" name="send" onclick="return checkUpdateForm()"/>[ <a href="manage.php?action=show">返回列表</a> ]</td></tr>
		</table>
	</form>
	<?php }?>

	<?php if($this->_vars['show']){ ?>
	<table cellspacing="0" class="table">
		<tr><th>编号</th><th>用户名</th><th>等级</th><th>登陆次数</th><th>最近登录ip</th><th>最近登录时间</th><th>操作</th></tr>
		<?php if($this->_vars['allManage']){ ?>
		<?php foreach($this->_vars['allManage'] as $key=>$value){?>
			<tr>
					<td><script>document.write(<?php echo $key+1;?>+<?php echo $this->_vars['num']?>)</script></td>
					<td><?php echo $value->admin_user;?></td>
					<td><?php echo $value->lever_name;?></td>
					<td><?php echo $value->login_count;?></td>
					<td><?php echo $value->last_ip;?></td>
					<td><?php echo $value->last_time;?></td>
					<td>[ <a href="?action=update&id=<?php echo $value->id;?>">修改</a> ][ <a href="?action=delete&id=<?php echo $value->id;?>" onclick="return confirm('你真的要删除吗')?true:false">删除</a> ]</td>
			</tr>
		<?php }?>
		<?php }else{?>
				<tr><td colspan="5">暂时没有数据</td></tr>
		<?php }?>
	</table>
	<p>[ <a href="?action=add">添加管理员</a> ]</p>
	<div id="page"><?php echo $this->_vars['page']?></div>
	<?php }?>

</body>



</html>