<div id="top">
	<script type="text/javascript" src="config/static.php?type=header"></script>
	<?php echo $this->_vars['header']?>
	<script src="js/text_adver.js"></script>
</div>
<div id="header">
	<a href="#"><h1>mycms系统</h1></a>
	<div class="adver"><script type="text/javascript" src="js/header_adver.js"></script></div>
</div>
<div id="nav">
	<ul>
	<li><a href="index.php">首页</a></li>
	<?php if($this->_vars['frontNav']){ ?>
		<?php foreach($this->_vars['frontNav'] as $key=>$value){?>
			<li><a href="list.php?id=<?php echo $value->id;?>"><?php echo $value->nav_name;?></a></li>
		<?php }?>
	<?php }?>
	</ul>
</div>
<div id="search">
	<form method="get" action="search.php">
				<select name="searchtype">
					<option value="0">按关键字</option>
					<option value="1">按文章标题</option>
				</select>
				<input type="text" name="searchkeyword" class="text"/>
				<input type="submit" name="sent" class="sub" value="查找"/>
	</form>
	<strong>TAG标签：</strong>
	<ul>
		<?php if($this->_vars['fiveTag']){ ?>
			<?php foreach($this->_vars['fiveTag'] as $key=>$value){?>
				<li><a href="search.php?searchtype=2&tag=<?php echo $value->tag;?>"><?php echo $value->tag;?></a>(<?php echo $value->count;?>)</li>
			<?php }?>
		<?php }?>
	</ul>

</div>