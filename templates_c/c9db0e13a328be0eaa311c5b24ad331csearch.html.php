<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style/basic.css"/>
<link rel="stylesheet" type="text/css" href="style/list.css"/>
<title><?php echo $this->_vars['webname']?></title>
</head>
<body>
<?php $_tpl->create('header.html')?>
<div id="left">
	<h2>当前位置&gt;<?php echo $this->_vars['navList']?></h2>
	<?php if($this->_vars['content']){ ?>
		<?php foreach($this->_vars['content'] as $key=>$value){?>
			<dl>
				<dt><img src="<?php echo $value->thumb;?>"/></dt>
				<dd>[<strong><?php echo $value->nav_name;?></strong>]<a href="details.php?id=<?php echo $value->id;?>" class="title"><?php echo $value->title;?></a></dd>
				<dd>日期：<?php echo $value->date;?> 点击率：<?php echo $value->count;?> 关键字：<?php echo $value->keyword;?></dd>
				<dd><?php echo $value->info;?></dd>
			</dl>
		<?php }?>
	<?php }else{?>
		<p>当前栏目没有信息</p>
	<?php }?>

	<div id="page"><?php echo $this->_vars['page']?></div>
</div>
<div id="right">
	
	<div class="list">
	<h2>本月本类推荐</h2>
	<ul>
		<?php if($this->_vars['monthRec']){ ?>	
			<?php foreach($this->_vars['monthRec'] as $key=>$value){?>
				<li><em><?php echo $value->date;?></em><a href="details.php?id=<?php echo $value->id;?>"><?php echo $value->title;?>.</a></li>
			<?php }?>
		<?php }else{?>
		<p>网站暂无数据</p>
		<?php }?>
	</ul>
</div>
<div class="list">
	<h2>本月热点推荐</h2>
	<ul>
		<?php if($this->_vars['monthHot']){ ?>	
			<?php foreach($this->_vars['monthHot'] as $key=>$value){?>
				<li><em><?php echo $value->date;?></em><a href="details.php?id=<?php echo $value->id;?>"><?php echo $value->title;?>.</a></li>
			<?php }?>
		<?php }else{?>
		<p>网站暂无数据</p>
		<?php }?>
	</ul>
</div>
<div class="list">
	<h2>本月图文推荐</h2>
	<ul>
		<?php if($this->_vars['monthHot']){ ?>	
			<?php foreach($this->_vars['monthHot'] as $key=>$value){?>
				<li><em><?php echo $value->date;?></em><a href="details.php?id=<?php echo $value->id;?>"><?php echo $value->title;?></a></li>
			<?php }?>
		<?php }else{?>
		<p>网站暂无数据</p>
		<?php }?>
	</ul>
</div>
</div>

<?php $_tpl->create('footer.html')?>
</body>
</html>