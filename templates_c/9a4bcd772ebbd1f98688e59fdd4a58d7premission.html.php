<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="../style/admin.css" type="text/css"/>
<script type="text/javascript" src="../js/admin_premission.js"></script>
<title>main</title>
</head>

<body id="main">
	<div class="map">
		管理首页&gt;&gt;权限设定&gt;&gt;<strong style="color:green;" id="title"><?php echo $this->_vars['current']?></strong>
	</div>
	<ol>
		<li><a href="premission.php?action=show" class="selected">权限列表</a></li>
		<li><a href="premission.php?action=add">添加权限</a></li>
		<?php if($this->_vars['update']){ ?>
			<li><a href="premission.php?action=update">修改权限</a></li>
		<?php }?>
	</ol>
	<?php if($this->_vars['add']){ ?>
	<form method="post" action="" name="add">
		<table class="table common">
				<tr><td>权限名称：<input type="text" name="name" class="text"/></td></tr>
				<tr><td>权限描述：<textarea name="info"></textarea></td></tr>
				<tr><td><input type="submit" value="新增权限" class="submit" name="send" onclick="return checkAddForm()"/>[ <a href="?action=show">返回列表</a> ]</td></tr>
		</table>
	</form>
	<?php }?>
	<?php if($this->_vars['delete']){ ?>
	 '删除页面'
	<?php }?>
	<?php if($this->_vars['update']){ ?>
		<form method="post" action="" name="update">
		<input type="hidden" name="id" value="<?php echo $this->_vars['onePremission']->id?>"/>
		<input type="hidden" name="prev_url" value="<?php echo $this->_vars['prev_url']?>"/>
		<table class="table common">
				<tr><td>权限名称：<input type="text" name="name" class="text" value="<?php echo $this->_vars['onePremission']->name?>"/></td></tr>
				<tr><td>权限描述：<textarea name="info" ><?php echo $this->_vars['onePremission']->info?></textarea></td></tr>
				<tr><td><input type="submit" value="修改权限" class="submit" name="send" onclick="return checkUpdateForm()"/>[ <a href="Premission.php?action=show">返回列表</a> ]</td></tr>
		</table>
	</form>
	<?php }?>

	<?php if($this->_vars['show']){ ?>
	<table cellspacing="0" class="table">
		<tr><th>编号</th><th>权限名称</th><th>标示</th><th>权限描述</th><th>操作</th></tr>
		<?php if($this->_vars['allPremission']){ ?>
		<?php foreach($this->_vars['allPremission'] as $key=>$value){?>
			<tr>
					<td><script>document.write(<?php echo $key+1;?>+<?php echo $this->_vars['num']?>)</script></td>
					<td><?php echo $value->name;?></td>
					<td><?php echo $value->id;?></td>
					<td><?php echo $value->info;?></td>
					<td>[ <a href="?action=update&id=<?php echo $value->id;?>">修改</a> ][ <a href="?action=delete&id=<?php echo $value->id;?>" onclick="return confirm('你真的要删除吗')?true:false">删除</a> ]</td>
			</tr>
		<?php }?>
		<?php }else{?>
				<tr><td colspan="5">暂时没有数据</td></tr>
		<?php }?>
	</table>
	<p>[ <a href="?action=add">添加权限</a> ]</p>
	<div id="page"><?php echo $this->_vars['page']?></div>
	<?php }?>

</body>



</html>