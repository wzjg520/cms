<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="../style/admin.css" type="text/css"/>
<script type="text/javascript" src="../js/admin_vote.js"></script>
<title>main</title>
</head>

<body id="main">
	<div class="map">
		内容管理&gt;&gt;投票栏设置&gt;&gt;<strong style="color:green;" id="title"><?php echo $this->_vars['current']?></strong>
	</div>
	<ol>
		<li><a href="?action=show" class="selected">主题列表</a></li>
		<li><a href="?action=add">添加主题</a></li>
		<?php if($this->_vars['update']){ ?>
			<li><a href="?action=update">修改主题</a></li>
		<?php }?>
		<?php if($this->_vars['showChild']){ ?>
		<li><a href="?action=showChild">投票项目</a></li>
		<?php }?>
		
	</ol>
	<?php if($this->_vars['add']){ ?>
	<form method="post" action="" name="content">
		<table class="table common">
				<tr><td>主题名称：<input type="text" name="title" class="text"/></td></tr>
				<tr><td>主题描述：<textarea name="info"></textarea></td></tr>
				<tr><td><input type="submit" value="添加主题" class="submit" name="send" onclick="return checkForm()"/>[ <a href="<?php echo $this->_vars['prev_url']?>">返回列表</a> ]</td></tr>
		</table>
	</form>
	<?php }?>
	<?php if($this->_vars['addChild']){ ?>
	<form method="post" action="" name="content">
		<input type="hidden" name="id" value="<?php echo $this->_vars['vote']->id?>"/>
		<table class="table common">
				<tr><td>所属主题：<strong><?php echo $this->_vars['vote']->title?></strong></td></tr>
				<tr><td>投票项目：<input type="text" name="title" class="text"/></td></tr>
				<tr><td>主题描述：<textarea name="info"></textarea></td></tr>
				<tr><td><input type="submit" value="添加项目" class="submit" name="send" onclick="return checkForm()"/>[ <a href="<?php echo $this->_vars['prev_url']?>">返回列表</a> ]</td></tr>
		</table>
	</form>
	<?php }?>
	<?php if($this->_vars['delete']){ ?>
	 '删除页面'
	<?php }?>
	<?php if($this->_vars['update']){ ?>
		<form method="post" action="" name="update">
		<input type="hidden" name="id" value="<?php echo $this->_vars['oneVote']->id?>"/>
		<input type="hidden" name="prev_url" value="<?php echo $this->_vars['prev_url']?>"/>
		<table class="table common">
				<tr><td>主题：<input type="text" name="title" class="text" value="<?php echo $this->_vars['oneVote']->title?>"/></td></tr>
				<tr><td>描述：<textarea name="info" ><?php echo $this->_vars['oneVote']->info?></textarea></td></tr>
				<tr><td><input type="submit" value="修改主题" class="submit" name="send" onclick="return checkForm()"/>[ <a href="<?php echo $this->_vars['prev_url']?>">返回列表</a> ]</td></tr>
		</table>
	</form>
	<?php }?>

	<?php if($this->_vars['show']){ ?>
	<table cellspacing="0" class="table">
		<tr><th>编号</th><th>投票主题</th><th>投票人数</th><th>投票项目</th><th>是否前台首选</th><th>操作</th></tr>
		<?php if($this->_vars['allVote']){ ?>
		<?php foreach($this->_vars['allVote'] as $key=>$value){?>
			<tr>
					<td><script>document.write(<?php echo $key+1;?>+<?php echo $this->_vars['num']?>)</script></td>
					<td><?php echo $value->title;?></td>
					<td><?php echo $value->pcount;?></td>
					<td>[<a href="?action=showChild&id=<?php echo $value->id;?>">查看</a>] | [<a href="?action=addChild&id=<?php echo $value->id;?>">添加项目</a>]</td>
					<td> <?php echo $value->state;?></td>
					<td>[ <a href="?action=update&id=<?php echo $value->id;?>">修改</a> ][ <a href="?action=delete&id=<?php echo $value->id;?>" onclick="return confirm('你真的要删除吗')?true:false">删除</a> ]</td>
			</tr>
		<?php }?>
		<?php }else{?>
				<tr><td colspan="5">暂时没有数据</td></tr>
		<?php }?>
	</table>
	<p>[ <a href="?action=add">添加主题</a> ]</p>
	<div id="page"><?php echo $this->_vars['page']?></div>
	<?php }?>
	
	
	<?php if($this->_vars['showChild']){ ?>
	<table cellspacing="0" class="table">
		<tr><th>编号</th><th>投票项目</th><th>操作</th></tr>
		<?php if($this->_vars['allChildVote']){ ?>
		<?php foreach($this->_vars['allChildVote'] as $key=>$value){?>
			<tr>
					<td><script>document.write(<?php echo $key+1;?>+<?php echo $this->_vars['num']?>)</script></td>
					<td><?php echo $value->title;?></td>
					<td>[ <a href="?action=update&id=<?php echo $value->id;?>">修改</a> ][ <a href="?action=delete&id=<?php echo $value->id;?>" onclick="return confirm('你真的要删除吗')?true:false">删除</a> ]</td>
			</tr>
		<?php }?>
		<?php }else{?>
				<tr><td colspan="3">暂时没有数据</td></tr>
		<?php }?>
	</table>
	<p>[ <a href="?action=addChild&id=<?php echo $this->_vars['id']?>">添加投票项目</a> ][ <a href="<?php echo $this->_vars['prev_url']?>">返回列表</a> ]</p>
	<div id="page"><?php echo $this->_vars['page']?></div>
	<?php }?>

</body>



</html>