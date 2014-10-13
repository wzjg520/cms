<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style/basic.css"/>
<link rel="stylesheet" type="text/css" href="style/details.css"/>
<script type="text/javascript" src="config/static.php?id=<?php echo $this->_vars['id']?>&type=details"></script>
<script type="text/javascript" src="js/details.js"></script>

<title><?php echo $this->_vars['webname']?></title>
</head>
<body>
<?php $_tpl->create('header.html')?>
<div id="left">
	<h2>当前位置&gt;<?php echo $this->_vars['nav']?></h2>
	<h3><?php echo $this->_vars['titlec']?></h3>
	<div class="date">时间：<?php echo $this->_vars['date']?> 来源：<?php echo $this->_vars['source']?> 作者：<?php echo $this->_vars['author']?> 点击量：<?php echo $this->_vars['count']?></div>
	<div class="info"><?php echo $this->_vars['info']?></div>
	<div class="content"><?php echo $this->_vars['content']?></div>
	<div class="tag">TAG标签：<?php echo $this->_vars['tag']?></div>
	<div class="new_commend">
		<h2><span>已有<a href="feedback.php?id=<?php echo $this->_vars['id']?>" target="_bank"><?php echo $this->_vars['totalCount']?></a>人参与评论</span>最新评论</h2>
		<?php if($this->_vars['commend']){ ?>
			<?php foreach($this->_vars['commend'] as $key=>$value){?>
						<dl>
						<dt><img src ="images/<?php echo $value->face;?>"/></dt>
						<dd><em><?php echo $value->date;?> 发表</em><span>[<?php echo $value->username;?>]</span></dd>
						<dd class="info">[<b style="color:red"><?php echo $value->manner;?></b>]<?php echo $value->content;?></dd>
						<dd class="bottom"><a href="?type=support&id=<?php echo $value->id;?>&cid=<?php echo $this->_vars['id']?>">[<?php echo $value->support;?>]支持</a> <a href="?type=oppose&id=<?php echo $value->id;?>&cid=<?php echo $this->_vars['id']?>">[<?php echo $value->oppose;?>]反对</a></dd>
					</dl>

			<?php }?>
				<div id="page"><?php echo $this->_vars['page']?></div>

		<?php }else{?>
			<p>暂时没有评论</p>
		<?php }?>

	</div>
	<div class="commend">
		<form action="feedback.php?id=<?php echo $this->_vars['id']?>" target="_bank" method="post" name="commend">
			<p>您对本文的态度：<input type="radio" name=""manner"  checked="checked" value="0"/>中立<input type="radio" name="manner" value="1"/>支持<input name=""manner"" type="radio" value="2"/>反对</p>
			<p class="notice">请互联网规则，不要发表关于政治、反动、色情之类的评论。</p>
			<p><textarea name="content"></textarea></p>
			<p >验证码：<input type="text" name="code" class="text"/> <img class="code"src="config/code.php" alt="验证码" onclick=" this.src='config/code.php?jiajun='+Math.random();"/> <input type="submit" name="send" value="提交评论" class="sub" onclick="return checkCommend()"/></p>
		</form>
	</div>
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