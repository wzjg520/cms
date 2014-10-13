<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="../style/admin.css" type="text/css"/>
<script type="text/javascript" src="../js/admin_nav.js"></script>
<title>main</title>
</head>

<body id="main">
	<div class="map">
		内容管理&gt;&gt;设置网站导航&gt;&gt;<strong style="color:green;" id="title"><?php echo $this->_vars['current']?></strong>
	</div>
	<ol>
		<li><a href="nav.php?action=show" class="selected">导航列表</a></li>
		<li><a href="nav.php?action=add">添加导航</a></li>
		<?php if($this->_vars['update']){ ?>
			<li><a href="lever.php?action=delete">修改导航</a></li>
		<?php }?>
		<?php if($this->_vars['addChildren']){ ?>
			<li><a href="nav.php?action=addChildren&id=<?php echo $this->_vars['id']?>">新增子导航</a></li>
		<?php }?>
		<?php if($this->_vars['showChildren']){ ?>
			<li><a href="nav.php?action=showChildren&id=<?php echo $this->_vars['id']?>">子导航列表</a></li>
		<?php }?>
	</ol>

	<?php if($this->_vars['showChildren']){ ?>
	<form action="?action=sort" method="post">
		<table cellspacing="0" class="table">
			<tr><th>编号</th><th>导航名称</th><th>导航描述</th><th>操作</th><th>排序</th></tr>
			<?php if($this->_vars['allNav']){ ?>
			<?php foreach($this->_vars['allNav'] as $key=>$value){?>
				<tr>
						<td><script>document.write(<?php echo $key+1;?>+<?php echo $this->_vars['num']?>)</script></td>
						<td><?php echo $value->nav_name;?></td>
						<td><?php echo $value->nav_info;?></td>
						<td>[ <a href="?action=update&id=<?php echo $value->id;?>">修改</a> ][ <a href="?action=delete&id=<?php echo $value->id;?>" onclick="return confirm('你真的要删除吗')?true:false">删除</a> ]</td>
						<td><input type="text" name="sort[<?php echo $value->id;?>]" value="<?php echo $value->sort;?>" class='sort'/></td>
				</tr>
			<?php }?>
			<?php }else{?>
			<tr><td colspan="5">暂时没有数据</td></tr>
			<?php }?>
			<tr><td></td><td></td><td></td><td></td><td><input type="submit" name="send" value="排序" class="sendSort"/></td></tr>
		</table>
	</form>
	<p>上级导航：<strong><?php echo $this->_vars['parentNav']?></strong> [ <a href="?action=addChildren&id=<?php echo $this->_vars['id']?>&nav_name=<?php echo $this->_vars['nav_name']?>">添加本导航</a> ][ <a href="<?php echo $this->_vars['prev_url']?>">返回上一级</a> ]</p>
	<div id="page"><?php echo $this->_vars['page']?></div>
	<?php }?>

	<?php if($this->_vars['show']){ ?>
	<form method="post" action="?action=sort">
		<table cellspacing="0" class="table">
			<tr><th>编号</th><th>导航名称</th><th>导航描述</th><th>子导航</th><th>操作</th><th>排序</th></tr>
			<?php if($this->_vars['allNav']){ ?>
			<?php foreach($this->_vars['allNav'] as $key=>$value){?>
				<tr>
						<td><script>document.write(<?php echo $key+1;?>+<?php echo $this->_vars['num']?>)</script></td>
						<td><?php echo $value->nav_name;?></td>
						<td><?php echo $value->nav_info;?></td>
						<td><a href="nav.php?action=addChildren&id=<?php echo $value->id;?>&nav_name=<?php echo $value->nav_name;?>">添加</a> | <a href="nav.php?action=showChildren&id=<?php echo $value->id;?>&nav_name=<?php echo $value->nav_name;?>">查看</a></td>
						<td>[ <a href="?action=update&id=<?php echo $value->id;?>">修改</a> ][ <a href="?action=delete&id=<?php echo $value->id;?>" onclick="return confirm('你真的要删除吗')?true:false">删除</a> ]</td>
						<td><input type="text" name="sort[<?php echo $value->id;?>]" value="<?php echo $value->sort;?>" class='sort'/></td>
				</tr>
			<?php }?>
			<?php }else{?>
			<tr><td colspan="6">暂时没有数据</td></tr>
			<?php }?>
			<tr><td></td><td></td><td></td><td></td><td></td><td><input type="submit" name="send" value="排序" class="sendSort"/></td></tr>
		</table>
	</form>
	<p>[ <a href="?action=add">添加导航</a> ]</p>
	<div id="page"><?php echo $this->_vars['page']?></div>
	<?php }?>


	<?php if($this->_vars['add']){ ?>
	<form method="post" action="" name="add">
		<table class= "table common">
				<tr><td>导航名称：<input type="text" name="nav_name" class="text"/></td></tr>
				<tr><td>导航描述：<textarea name="nav_info"></textarea></td></tr>
				<tr><td><input type="submit" value="添加导航" class="submit" name="send" onclick="return checkAddForm()"/>[ <a href="nav.php?action=show">返回列表</a> ]</td></tr>
		</table>
	</form>
	<?php }?>

	<?php if($this->_vars['addChildren']){ ?>
	<form method="post" action="" name="add">
	<input type="hidden" name="pid" value="<?php echo $this->_vars['pid']?>"/>
		<table class="table common">
				<tr><td>上级导航：<strong><?php echo $this->_vars['prev_nav']?></strong></td></tr>
				<tr><td>导航名称：<input type="text" name="nav_name" class="text"/>（*不得小于两位，不得大于20位）</td></tr>
				<tr><td>导航描述：<textarea name="nav_info"></textarea>（不得大于200位）</td></tr>
				<tr><td><input type="submit" value="新增子导航" class="submit" name="send" onclick="return checkAddForm()"/>[ <a href="<?php echo $this->_vars['prev_url']?>">返回列表</a> ]</td></tr>
		</table>
	</form>
	<?php }?>


	<?php if($this->_vars['delete']){ ?>
	 '删除页面'
	<?php }?>
	<?php if($this->_vars['update']){ ?>
		<form method="post" action="" name="update">
		<input type="hidden" name="id" value="<?php echo $this->_vars['oneNav']->id?>"/>
		<input type="hidden" name="prev_url" value="<?php echo $this->_vars['prev_url']?>"/>
		<table class="table common">
				<tr><td>导航名称：<input type="text" name="nav_name" class="text" value="<?php echo $this->_vars['oneNav']->nav_name?>"/></td></tr>
				<tr><td>导航描述：<textarea name="nav_info" ><?php echo $this->_vars['oneNav']->nav_info?></textarea></td></tr>
				<tr><td><input type="submit" value="修改导航" class="submit" name="send" onclick="return checkUpdateForm()"/>[ <a href="nav.php?action=show">返回列表</a> ]</td></tr>
		</table>
	</form>
	<?php }?>



</body>



</html>