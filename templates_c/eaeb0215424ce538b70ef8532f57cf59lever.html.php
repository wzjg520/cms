<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="../style/admin.css" type="text/css"/>
<script type="text/javascript" src="../js/admin_lever.js"></script>
<title>main</title>
</head>

<body id="main">
	<div class="map">
		管理员首页&gt;&gt;管理员管理&gt;&gt;<strong style="color:green;" id="title"><?php echo $this->_vars['current']?></strong>
	</div>
	<ol>
		<li><a href="lever.php?action=show" class="selected">等级列表</a></li>
		<li><a href="lever.php?action=add">添加等级</a></li>
		<?php if($this->_vars['update']){ ?>
			<li><a href="lever.php?action=update&id=<?php echo $this->_vars['id']?>">修改等级</a></li>
		<?php }?>
	</ol>
	<?php if($this->_vars['add']){ ?>
	<form method="post" action="" name="add">
		<table class="table common">
				<tr><td>等级名称：<input type="text" name="lever_name" class="text"/></td></tr>
				<tr><td>等级描述：<textarea name="lever_info"></textarea></td></tr>
				<tr><td><input type="submit" value="添加等级" class="submit" name="send" onclick="return checkAddForm()"/>[ <a href="lever.php?action=show">返回列表</a> ]</td></tr>
		</table>
	</form>
	<?php }?>
	<?php if($this->_vars['delete']){ ?>
	 '删除页面'
	<?php }?>
	<?php if($this->_vars['update']){ ?>
		<form method="post" action="" name="update">
		<input type="hidden" name="id" value="<?php echo $this->_vars['oneLever']->id?>"/>
		<input type="hidden" name="prev_url" value="<?php echo $this->_vars['prev_url']?>"/>
		<table class="table common">
				<tr><td>等级名称：<input type="text" name="lever_name" class="text" value="<?php echo $this->_vars['oneLever']->lever_name?>"/></td></tr>
				<tr><td>等级描述：<textarea name="lever_info" ><?php echo $this->_vars['oneLever']->lever_info?></textarea></td></tr>
				<tr><td style="padding-right:100px;">权限设定：
					<?php if($this->_vars['premission']){ ?>
						<?php foreach($this->_vars['premission'] as $key=>$value){?>
							<label style="display:inline-block;"><input type="checkbox" <?php echo $value->checked;?> name="premission[]" value="<?php echo $value->id;?>"/><?php echo $value->name;?></label>
						<?php }?>
					<?php }?>
				</td></tr>
				<tr><td><input type="submit" value="修改等级" class="submit" name="send" onclick="return checkUpdateForm()"/>[ <a href="lever.php?action=show">返回列表</a> ]</td></tr>
		</table>
	</form>
	<?php }?>

	<?php if($this->_vars['show']){ ?>
	<table cellspacing="0" class="table">
		<tr><th>编号</th><th>等级名称</th><th>等级描述</th><th>权限标示</th><th>操作</th></tr>
		<?php if($this->_vars['allLever']){ ?>
		<?php foreach($this->_vars['allLever'] as $key=>$value){?>
			<tr>
					<td><script>document.write(<?php echo $key+1;?>+<?php echo $this->_vars['num']?>)</script></td>
					<td><?php echo $value->lever_name;?></td>
					<td><?php echo $value->lever_info;?></td>
					<td><?php echo $value->premission;?></td>
					<td>[ <a href="?action=update&id=<?php echo $value->id;?>">修改</a> ][ <a href="?action=delete&id=<?php echo $value->id;?>" onclick="return confirm('你真的要删除吗')?true:false">删除</a> ]</td>
			</tr>
		<?php }?>
		<?php }else{?>
				<tr><td colspan="5">暂时没有数据</td></tr>
		<?php }?>
	</table>
	<p>[ <a href="?action=add">添加等级</a> ]</p>
	<div id="page"><?php echo $this->_vars['page']?></div>
	<?php }?>

</body>



</html>