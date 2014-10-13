<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="../style/admin.css" type="text/css"/>
<script type="text/javascript" src="../js/admin_manage.js"></script>
<title><?php echo $this->_vars['webname']?></title>
</head>

<body id="main">
	<div class="map">
		管理首页&gt;&gt;内容管理&gt;&gt;<strong style="color:green;" id="title"><?php echo $this->_vars['current']?></strong>
	</div>
	<ol>
		<?php if($this->_vars['update']){ ?>
			<li><a href="manage.php?action=update">文档列表</a></li>
		<?php }?>
	</ol>
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
	<form action='?action=states' method="post">
		<table cellspacing="0" class="table">
			<tr><th>编号</th><th>评论内容</th><th>评论者</th><th>所属文档</th><th>状态</th><th>批审</th><th>操作</th></tr>
			<?php if($this->_vars['allCommend']){ ?>
			<?php foreach($this->_vars['allCommend'] as $key=>$value){?>
				<tr>
						<td><script>document.write(<?php echo $key+1;?>+<?php echo $this->_vars['num']?>)</script></td>
						<td title="<?php echo $value->ct;?>"><?php echo $value->content;?></td>
						<td><?php echo $value->username;?></td>
						<td><a href="../details.php?id=<?php echo $value->cid;?>" target="_bank" title="<?php echo $value->pct;?>">查看</a></td>
						<td><?php echo $value->state;?></td>
						<td><input type="text" name="states[<?php echo $value->id;?>]" value="<?php echo $value->num;?>" class='sort'/></td>
						<td>[ <a href="?action=delete&id=<?php echo $value->id;?>" onclick="return confirm('你真的要删除吗')?true:false">删除</a> ]</td>
				</tr>
			<?php }?>
			<tr><td></td><td></td><td></td><td></td><td></td><td><input type="submit" name="send" value="批审" class="sendSort"/></td></tr>
			<?php }else{?>
					<tr><td colspan="5">暂时没有数据</td></tr>
			<?php }?>
		</table>
	</form>
	<div id="page"><?php echo $this->_vars['page']?></div>
	<?php }?>

</body>



</html>