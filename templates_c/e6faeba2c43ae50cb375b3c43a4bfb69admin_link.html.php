<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="../style/admin.css" type="text/css"/>
<script type="text/javascript" src="../js/link.js"></script>
<title>main</title>
</head>

<body id="main">
	<div class="map">
		内容管理&gt;&gt;友情链接设置&gt;&gt;<strong style="color:green;" id="title"><?php echo $this->_vars['current']?></strong>
	</div>
	<ol>
		<li><a href="?action=show" class="selected">友情链接列表</a></li>
		<li><a href="?action=add">新增友情链接</a></li>
		<?php if($this->_vars['update']){ ?>
			<li><a href="?action=update">修改友情链接</a></li>
		<?php }?>
	</ol>
	<?php if($this->_vars['add']){ ?>
	<form method="post" action="" name="add">
		<input type="hidden" name="prev_url" value="<?php echo $this->_vars['prev_url']?>"/>
		<table class="table common">
				<tr><td>网站类型：<input type="radio" name="type" value="1" checked="checked" onclick="link(1);" />文字链接<input type="radio" name="type" onclick="link(2);" value="2" />图片链接</td></tr>
				<tr><td>网站名称：<input type="text" name="webname" class="text"/><span> [必填]</span>(*网站名称长度2到20位)</td></tr>
				<tr><td>网站地址：<input type="text" name="weburl" class="text"/><span> [必填]</span>(*请填写本网站的网址,不得大于50位)</td></tr>
				<tr id="logo" style="display:none;"><td>Logo地址：<input type="text" name="logourl" class="text"/><span> [必填]</span>(*请填写图片链接地址)</td></tr>
				<tr><td>站 长 名：<input type="text" name="user" class="text"/><span></span></td></tr>
				<tr><td>联系邮箱：<input type="text" name="email" class="text"/><span></span></td></tr>
				<tr><td><input type="submit" class="submit" name="send" onclick="return checkForm();" class="sub"  value="新增链接"/>[<a href="<?php echo $this->_vars['prev_url']?>">返回列表</a>]</td></tr>
		</table>
	</form>
	<?php }?>
	<?php if($this->_vars['update']){ ?>
		<form method="post" action="" name="add">
		<input type="hidden" name="id" value="<?php echo $this->_vars['oneLink']->id?>"/>
		<input type="hidden" name="prev_url" value="<?php echo $this->_vars['prev_url']?>"/>
		<table class="table common">
				<tr><td>网站类型：<input type="radio" name="type" value="1" <?php echo $this->_vars['checkedText']?> onclick="link(1);" />文字链接<input type="radio" name="type" onclick="link(2);" <?php echo $this->_vars['checkedLogo']?> value="2" />图片链接</td></tr>
				<tr><td>网站名称：<input type="text" name="webname" value="<?php echo $this->_vars['oneLink']->webname?>" class="text"/><span> [必填]</span>(*网站名称长度2到20位)</td></tr>
				<tr><td>网站地址：<input type="text" name="weburl" value="<?php echo $this->_vars['oneLink']->weburl?>" class="text"/><span> [必填]</span>(*请填写本网站的网址,不得大于50位)</td></tr>
				<tr id="logo" <?php echo $this->_vars['logoStyle']?>><td>Logo地址：<input type="text" name="logourl" value="<?php echo $this->_vars['oneLink']->logourl?>" class="text"/><span> [必填]</span>(*请填写图片链接地址)</td></tr>
				<tr><td>站 长 名：<input type="text" name="user" class="text" value="<?php echo $this->_vars['oneLink']->user?>"/><span></span></td></tr>
				<tr><td>联系邮箱：<input type="text" name="email" class="text" value="<?php echo $this->_vars['oneLink']->email?>"/><span></span></td></tr>
				<tr><td><input type="submit" value="修改链接" class="submit" name="send" onclick="return checkForm()"/>[ <a href="?action=show">返回列表</a> ]</td></tr>
		</table>
	</form>
	<?php }?>

	<?php if($this->_vars['show']){ ?>
	<table cellspacing="0" class="table">
		<tr><th>编号</th><th>网站类型</th><th>站长</th><th>网站名</th><th>网站地址</th><th>logo地址</th><th>审核</th><th>操作</th></tr>
		<?php if($this->_vars['allLink']){ ?>
		<?php foreach($this->_vars['allLink'] as $key=>$value){?>
			<tr>
					<td><script>document.write(<?php echo $key+1;?>+<?php echo $this->_vars['num']?>)</script></td>
					<td><?php echo $value->type;?></td>
					<td><?php echo $value->user;?></td>
					<td><?php echo $value->webname;?></td>
					<td><?php echo $value->weburl;?></td>
					<td><?php echo $value->logourl;?></td>
					<td><?php echo $value->state;?></td>
					<td>[ <a href="?action=update&id=<?php echo $value->id;?>">修改</a> ][ <a href="?action=delete&id=<?php echo $value->id;?>" onclick="return confirm('你真的要删除吗')?true:false">删除</a> ]</td>
			</tr>
		<?php }?>
		<?php }else{?>
				<tr><td colspan="5">暂时没有数据</td></tr>
		<?php }?>
	</table>
	<p>[ <a href="?action=add">新增友情链接</a> ]</p>
	<div id="page"><?php echo $this->_vars['page']?></div>
	<?php }?>

</body>



</html>