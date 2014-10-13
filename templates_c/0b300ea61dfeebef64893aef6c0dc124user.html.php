<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="../style/admin.css" type="text/css"/>
<script type="text/javascript" src="../js/user.js"></script>
<title>main</title>
</head>

<body id="main">
	<div class="map">
		会员首页&gt;&gt;会员管理&gt;&gt;<strong style="color:green;" id="title"><?php echo $this->_vars['current']?></strong>
	</div>
	<ol>
		<li><a href="user.php?action=show" class="selected">会员列表</a></li>
		<li><a href="user.php?action=add">添加会员</a></li>
		<?php if($this->_vars['update']){ ?>
			<li><a href="user.php?action=update">修改会员</a></li>
		<?php }?>
	</ol>
	<?php if($this->_vars['add']){ ?>
			<form method="post" name="reg">
			<table cellspacing="0" class="table common">
				<tr><td>用 户 名：<input type="text" class="text" name="username" /> <span class="red">[必填]</span> ( *用户名在2到20位之间 )</td></tr>
				<tr><td>密　　码：<input type="password" class="text" name="password" /> <span class="red">[必填]</span> ( *密码不得小于6位 )</td></tr>
				<tr><td>密码确认：<input type="password" class="text" name="notpass" /> <span class="red">[必填]</span> ( *密码确认和密码一致 )</td></tr>
				<tr><td>电子邮件：<input type="text" class="text" name="email" /> <span class="red">[必填]</span> ( *每个电子邮件只能注册一个ID )</td></tr>
				<tr><td>选择头像：<select name="face" onchange="setFace();">
											<?php foreach($this->_vars['option1'] as $key=>$value){?>
											<option>0<?php echo $value;?>.gif</option>
											<?php }?>
											<?php foreach($this->_vars['option2'] as $key=>$value){?>
											<option><?php echo $value;?>.gif</option>
											<?php }?>
										</select>
				</td></tr>
				<tr><td><img name="faceimg" src="../images/01.gif" class="face" alt="01.gif" /></td></tr>
				<tr><td>安全问题：<select name="question">
													<option value="默认不填">默认不填</option>
													<option value="您父亲的名字是">您父亲的名字是</option>
													<option value="您母亲的年龄是">您母亲的年龄是</option>
													<option value="您配偶的名字是">您配偶的名字是</option>
													<option value="您配偶的生日是">您配偶的生日是</option>
											</select>
				</td></tr>
				<tr><td>问题答案：<input type="text" class="text" name="answer" /></td></tr>
				<tr><td>会员状态：<select name="state">
											<option value="0">被封杀的会员</option>
											<option value="1">刚注册的会员</option>
											<option value="2">初级会员</option>
											<option value="3">中级会员</option>
											<option value="4">高级会员</option>
											<option value="3">VIP会员</option>
										</select>
				</td></tr>
				<tr><td><input type="submit" class="submit" name="send" onclick="return checkAdd();" value="添加会员" /></td></tr>
			</table>
		</form>
	<?php }?>
	<?php if($this->_vars['delete']){ ?>
	 '删除页面'
	<?php }?>
	<?php if($this->_vars['update']){ ?>
		<form method="post" action="" name="reg">
		<input type="hidden" name="id" value="<?php echo $this->_vars['oneUser']->id?>"/>
		<input type="hidden" name="prev_url" value="<?php echo $this->_vars['prev_url']?>"/>
		<input type="hidden" name="old_password" value="<?php echo $this->_vars['old_password']?>"/>
		<table class="table common">
				<tr><td>用 户 名：<?php echo $this->_vars['oneUser']->username?></td></tr>
				<tr><td>密　　码：<input type="password" class="password" name="password"/>(*留空则代表不修改)
				</td></tr>
				<tr><td>安全问题：<select name="question" class="text">
													<?php echo $this->_vars['showQuestion']?>
											</select>
			</td></tr>
			<tr><td>安全答案：<input type="text" name="answer" class="text" value="<?php echo $this->_vars['answer']?>"/></td></tr>
				<tr><td>邮　　箱：<input type="text" class="text" name="email"value="<?php echo $this->_vars['oneUser']->email?>"/></td></tr>
				<tr><td>选择头像：<select name="face" onchange="setFace();" class="text">
														<?php echo $this->_vars['showFace1']?><?php echo $this->_vars['showFace2']?>
											</select>
				</td></tr>
				<tr><td><img name="faceimg" src="../images/<?php echo $this->_vars['facesrc']?>" class="face" alt="01.gif" /></td></tr>
				<tr><td>会员状态：<select name="state" class="text">
													<?php echo $this->_vars['showState']?>
											</select>
				</td></tr>
				<tr><td><input type="submit" value="修改会员" class="submit" name="send" onclick="return checkUpdate()"/>[ <a href="<?php echo $this->_vars['prev_url']?>">返回上一层</a> ]</td></tr>
		</table>
	</form>
	<?php }?>

	<?php if($this->_vars['show']){ ?>
	<table cellspacing="0" class="table">
		<tr><th>编号</th><th>用户名</th><th>邮箱</th><th>状态</th><th>操作</th></tr>
		<?php if($this->_vars['allUser']){ ?>
		<?php foreach($this->_vars['allUser'] as $key=>$value){?>
			<tr>
					<td><script>document.write(<?php echo $key+1;?>+<?php echo $this->_vars['num']?>)</script></td>
					<td><?php echo $value->username;?></td>
					<td><?php echo $value->email;?></td>
					<td><?php echo $value->state;?></td>
					<td>[ <a href="?action=update&id=<?php echo $value->id;?>">修改</a> ][ <a href="?action=delete&id=<?php echo $value->id;?>" onclick="return confirm('你真的要删除吗')?true:false">删除</a> ]</td>
			</tr>
		<?php }?>
		<?php }else{?>
				<tr><td colspan="5">暂时没有数据</td></tr>
		<?php }?>
	</table>
	<p>[ <a href="?action=add">添加会员</a> ]</p>
	<div id="page"><?php echo $this->_vars['page']?></div>
	<?php }?>

</body>



</html>