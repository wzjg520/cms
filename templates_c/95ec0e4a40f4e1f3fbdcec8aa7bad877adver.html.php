<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="../style/admin.css" type="text/css"/>
<script type="text/javascript" src="../js/admin_adver.js"></script>
<title>main</title>
</head>

<body id="main">
	<div class="map">
		管理首页&gt;&gt;内容管理&gt;&gt;<strong style="color:green;" id="title"><?php echo $this->_vars['current']?></strong>
	</div>
	<ol>
		<li><a href="?action=show">广告列表</a></li>
		<li><a href="?action=add">新增广告</a></li>
		<?php if($this->_vars['update']){ ?>
			<li><a href="rotatain.php?action=update">广告修改</a></li>
		<?php }?>
	</ol>
	<?php if($this->_vars['delete']){ ?>
	 '删除页面'
	<?php }?>
	<?php if($this->_vars['show']){ ?>
	<form method="post">
		<table cellspacing="0" class="table">
			<tr><th>编号</th><th>类型</th><th>标题</th><th>链接</th><th>是否首页轮播</th><th>操作</th></tr>
			<?php if($this->_vars['adver']){ ?>
			<?php foreach($this->_vars['adver'] as $key=>$value){?>
				<tr>
						<td><script>document.write(<?php echo $key+1;?>+<?php echo $this->_vars['num']?>)</script></td>
						<td><?php echo $value->type;?></td>
						<td><?php echo $value->title;?></td>
						<td><?php echo $value->link;?></td>
						<td><?php echo $value->state;?></td>
						<td><a href="?action=update&id=<?php echo $value->id;?>">查看并修改广告</a> |[ <a href="?action=delete&id=<?php echo $value->id;?>" onclick="return confirm('你真的要删除吗')?true:false">删除</a> ]</td>
				</tr>
			<?php }?>
			<?php }else{?>
					<tr><td colspan="6">暂时没有数据</td></tr>
			<?php }?>
			<tr><td colspan="6"><input type="button" value="刷新文字广告" onclick="javascript:location.href='?action=text';" /><input type="button" value="刷新侧栏广告" onclick="javascript:location.href='?action=sidebar';" /><input type="button" value="刷新头部广告" onclick="javascript:location.href='?action=header'" />(*每次更新广告请点击刷新相应类型)</td></td></tr>
			<tr><td colspan="6">[ <a href="?action=add">新增广告</a> ]</td></tr>
		</table>
	</form>
	<div id="page"><?php echo $this->_vars['page']?>
		<form method="post">
			<select name="kind">
				<option value='0'>默认全部</option>
				<option value='1'>文字广告</option>
				<option value='2'>头部广告</option>
				<option value='3'>侧栏广告</option>
			</select>
			<input type="submit" name="send" value="查询"/>
		</form>
		
	</div>
	<?php }?>
	
	
	<?php if($this->_vars['add']){ ?>
	<form method="post" action=""  name="content">
		<input type="hidden" name="adv" />
		<table class="table content">
				<tr><td>广告类型：<input type="radio" value="1" onclick="adver(1)" name="type" checked="checked"/>文字广告
								<input type="radio" value="2" onclick="adver(2)" name="type"/>头部广告(690*80)
								<input type="radio" value="3" onclick="adver(3)" name="type"/>侧栏广告(270*200)
				</td></tr>
				<tr><td>广告标题：<input type="text" name="title" class="text" /><span style="color:red;">(*不得大于20位)</span></td></tr>
				<tr id="thumbnail" style="display:none"><td>广告图片：<input type="text" class="text" name="thumb" readonly="readonly"/>　<span id="up"></span>
												<img name="pic" alt="广告图" style="display:none"/><span style="color:red;">(*必须是jpg,gif,png，并且200k内)<span style="color:red;">
				</td></tr>
				<tr><td>广告链接：<input type="text" class="text" name="link"/><span style="color:red;">(*不得为空站内站外皆可)<span style="color:red;"></td></tr>
				<tr><td>是否启用：<input type="radio" name="state" value="1"/>是<input type="radio" name="state" value="0"/>否</tr>
				<tr><td>描　　述：<textarea name="info"></textarea><span style="color:red;">(描述不得大于200位)</span></td></tr>
				<tr><td><input type="submit" value="添加广告" class="submit" name="send" onclick="return checkAddForm()"/>[ <a href="?action=show">返回列表</a> ]</td></tr>
		</table>
	</form>
	<?php }?>
	
	<?php if($this->_vars['update']){ ?>
		<?php if($this->_vars['oneAdver']){ ?>
			<form method="post" action=""  name="content">
				<input type="hidden" name="adv" value="0" />
				<input type="hidden" name="id" value="<?php echo $this->_vars['oneAdver']->id?>"/>
				<table class="table content">
						<tr><td>广告类型：<input type="radio" value="1" onclick="adver(1)" name="type" <?php echo $this->_vars['oneAdver']->type1?> />文字广告
										<input type="radio" value="2" onclick="adver(2)" name="type" <?php echo $this->_vars['oneAdver']->type2?> />头部广告(690*80)
										<input type="radio" value="3" onclick="adver(3)" name="type" <?php echo $this->_vars['oneAdver']->type3?> />侧栏广告(270*200)
						</td></tr>
						<tr><td>广告标题：<input type="text" name="title" class="text" value="<?php echo $this->_vars['oneAdver']->title?>" /><span style="color:red;">(*不得大于20位)</span></td></tr>
						<tr id="thumbnail" <?php echo $this->_vars['oneAdver']->picStyle?>><td>广告图片：<input type="text" class="text" name="thumb" value="<?php echo $this->_vars['oneAdver']->pic?>"readonly="readonly"/>　<span id="up"><?php echo $this->_vars['oneAdver']->up?></span></br>
														<img name="pic" alt="广告图"  src="<?php echo $this->_vars['oneAdver']->pic?>"/><span style="color:red;">(*必须是jpg,gif,png，并且200k内)<span style="color:red;">
						</td></tr>
						<tr><td>广告链接：<input type="text" class="text" name="link" value="<?php echo $this->_vars['oneAdver']->link?>"/><span style="color:red;">(*不得为空站内站外皆可)<span style="color:red;"></td></tr>
						<tr><td>是否启用：<?php echo $this->_vars['oneAdver']->state?></tr>
						<tr><td>描　　述：<textarea name="info"><?php echo $this->_vars['oneAdver']->info?></textarea><span style="color:red;">(描述不得大于200位)</span></td></tr>
						<tr><td><input type="submit" value="修改广告" class="submit" name="send" onclick="return checkAddForm()"/>[ <a href="?action=show">返回列表</a> ]</td></tr>
				</table>
			</form>
		<?php }else{?>
			<p>获得数据出错<p/>
		<?php }?>
	<?php }?>

</body>



</html>