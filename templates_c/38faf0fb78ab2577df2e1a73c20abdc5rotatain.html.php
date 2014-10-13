<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="../style/admin.css" type="text/css"/>
<script type="text/javascript" src="../js/rotatain.js"></script>
<title>main</title>
</head>

<body id="main">
	<div class="map">
		管理首页&gt;&gt;轮播器&gt;&gt;<strong style="color:green;" id="title"><?php echo $this->_vars['current']?></strong>
	</div>
	<ol>
		<li><a href="rotatain.php?action=show">轮播器列表</a></li>
		<li><a href="rotatain.php?action=add">新增轮播器</a></li>
		<?php if($this->_vars['update']){ ?>
			<li><a href="rotatain.php?action=update">轮播器修改</a></li>
		<?php }?>
	</ol>
	<?php if($this->_vars['delete']){ ?>
	 '删除页面'
	<?php }?>
	<?php if($this->_vars['show']){ ?>
	<form method="post">
		<table cellspacing="0" class="table">
			<tr><th>编号</th><th>标题</th><th>链接</th><th>是否首页轮播</th><th>操作</th></tr>
			<?php if($this->_vars['allRotatain']){ ?>
			<?php foreach($this->_vars['allRotatain'] as $key=>$value){?>
				<tr>
						<td><script>document.write(<?php echo $key+1;?>+<?php echo $this->_vars['num']?>)</script></td>
						<td><?php echo $value->title;?></td>
						<td><?php echo $value->link;?></td>
						<td><?php echo $value->state;?></td>
						<td><a href="?action=update&id=<?php echo $value->id;?>">查看并修改轮播器</a> |[ <a href="?action=delete&id=<?php echo $value->id;?>" onclick="return confirm('你真的要删除吗')?true:false">删除</a> ]</td>
				</tr>
			<?php }?>
			<?php }else{?>
					<tr><td colspan="5">暂时没有数据</td></tr>
			<?php }?>
			<tr><td colspan="5"><input type="button" value="刷新首页显示" onclick="javascript:location.href='?action=xml'" />(*每次更新轮播器请点击刷新)</td></td></tr>
			<tr><td colspan="5">[ <a href="rotatain.php?action=add">新增轮播器</a> ]</td></tr>
		</table>
	</form>
	<div id="page"><?php echo $this->_vars['page']?></div>
	<?php }?>
	
	
	<?php if($this->_vars['add']){ ?>
	<form method="post" action=""  name="content">
		<table class="table content">
				<tr><td>轮 播 图：<input type="text" class="text" name="thumb" readonly="readonly"/>　<input type="button" value="选择" onclick="centerWindow('../config/upfile.php?type=rotatain','上传',500,200)"/>
												<img name="pic" alt="轮播图" style="display:none"/><span style="color:red;">(* 最佳大小是268X193或以上，必须是jpg,gif,png，并且200k内)<span style="color:red;">
				</td></tr>
				<tr><td>链　　接：<input type="text" class="text" name="link"/><span style="color:red;">(*不得为空站内站外皆可)<span style="color:red;"></td></tr>
				<tr><td>标　　题：<input type="text" class="text" name="title"/><span style="color:red;">(*不得大于20位)</span></tr>
				<tr><td>是否轮播：<input type="radio" name="state" value="1"/>是<input type="radio" name="state" value="0"/>否</tr>
				<tr><td>描　　述：<textarea name="info"></textarea><span style="color:red;">(描述不得大于200位)</span></td></tr>
				<tr><td><input type="submit" value="添加轮播图" class="submit" name="send" onclick="return checkAddForm()"/>[ <a href="?action=show">返回列表</a> ]</td></tr>
		</table>
	</form>
	<?php }?>
	
	<?php if($this->_vars['update']){ ?>
	<form method="post" action=""  name="content">
		<input type="hidden" name="id" value="<?php echo $this->_vars['id']?>"/>
		<input type="hidden" name="prev_url" value="<?php echo $this->_vars['prev_url']?>"/>
		<table class="table content">
				<tr><td>轮 播 图：<input type="text" class="text" name="thumb" readonly="readonly" value="<?php echo $this->_vars['oneRotatain']->pic?>"/>　<input type="button" value="选择" onclick="centerWindow('../config/upfile.php?type=rotatain','上传',500,200)"/><br/>
												<img name="pic" alt="轮播图" src="<?php echo $this->_vars['oneRotatain']->pic?>"/><span style="color:red;">(* 最佳大小是268X193或以上，必须是jpg,gif,png，并且200k内)<span style="color:red;">
				</td></tr>
				<tr><td>链　　接：<input type="text" class="text" name="link" value="<?php echo $this->_vars['oneRotatain']->link?>"/><span style="color:red;">(*不得为空站内站外皆可)<span style="color:red;"></td></tr>
				<tr><td>标　　题：<input type="text" class="text" name="title" value="<?php echo $this->_vars['oneRotatain']->title?>"/><span style="color:red;">(*不得大于20位)</span></tr>
				<tr><td>是否轮播： <?php echo $this->_vars['oneRotatain']->state?></tr>
				<tr><td>描　　述：<textarea name="info"><?php echo $this->_vars['oneRotatain']->info?></textarea><span style="color:red;">(描述不得大于200位)</span></td></tr>
				<tr><td><input type="submit" value="修改轮播图" class="submit" name="send" onclick="return checkAddForm()"/>[ <a href="?action=show">返回列表</a> ]</td></tr>
		</table>
	</form>
	<?php }?>

</body>



</html>