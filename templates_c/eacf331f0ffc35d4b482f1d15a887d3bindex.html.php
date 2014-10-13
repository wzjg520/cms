<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style/basic.css"/>
<link rel="stylesheet" type="text/css" href="style/index.css"/>
<script type="text/javascript" src="js/user_reg.js"></script>
<script type="text/javascript" src="config/static.php?type=member"></script>
<title><?php echo $this->_vars['webname']?></title>
</head>
<body>
<?php $_tpl->create('header.html')?>
<div id="user">
	<?php if($this->_vars['cache']){ ?>
		<?php echo $this->_vars['memberInfo']?>
	<?php }else{?>
		<?php if($this->_vars['login']){ ?>
			<h2>会员信息</h2>
				<div class="login">您好！<span style="color:blue"><?php echo $this->_vars['member']?></span> 欢迎光临</div>
				<div class="member">
						<img src="images/<?php echo $this->_vars['face']?>" alt="头像"/>
						<a href="#" class="member_a">个人中心</a>
						<a href="#" class="member_a">我的评论</a>
						<a href="register.php?action=logout" class="member_a">退出登录</a>
				</div>
		<?php }else{?>
			<h2>会员登陆</h2>
			<form method="post" action="register.php?action=login" name="login">
				<label>用户名：<input type="text" name="username" class="text"/></label>
				<label>密　码：<input type="password" name="password"class="text"/></label>
				<label>验证码：<input type="text" name="code"class="text code"/></label>
				<span><img class="code"src="config/code.php" alt="验证码" onclick=" this.src='config/code.php?jiajun='+Math.random();"/></span>
				<p>
					<input type="submit" name="send" onclick="return checkLogin()"value="登录" class="sub" />
					<a href="register.php?action=reg">注册会员</a> <a href="#">忘记密码？</a>
				</p>
			</form>
		<?php }?>
	<?php }?>

	<h3>最近登录会员 <em>─────────────</em></h3>
	<?php if($this->_vars['laterUser']){ ?>
		<?php foreach($this->_vars['laterUser'] as $key=>$value){?>
		<dl>
		<dt><img src="images/<?php echo $value->face;?>"/></dt>
		<dd><?php echo $value->username;?></dd>
	</dl>
	<?php }?>
	<?php }?>

</div>
<div id="news">
	<h3><?php echo $this->_vars['newTop']->title?></h3>
	<p><?php echo $this->_vars['newTop']->info?>[<a href="details.php?id=<?php echo $this->_vars['newTop']->id?>">查看全文</a>]</p>
	<p class="link">
		<?php if($this->_vars['topList']){ ?>
			<?php foreach($this->_vars['topList'] as $key=>$value){?>
				<a href="details.php?id=<?php echo $value->id;?>"><?php echo $value->title;?></a><?php echo $value->line;?>
		 <?php }?>
		 <?php }?>
	</p>
	<ul>
		<?php if($this->_vars['newList']){ ?>
			<?php foreach($this->_vars['newList'] as $key=>$value){?>
			<li><em><?php echo $value->date;?></em><a href="details.php?id=<?php echo $value->id;?>"><?php echo $value->title;?></a></li>
		 	<?php }?>
		 <?php }?>
	</ul>
</div>
<div id="pic">
	<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" id="scriptmain" name="scriptmain" codebase="http://download.macromedia.com/pub/shockwave/cabs/
	flash/swflash.cab#version=6,0,29,0" width="268" height="193">
	      <param name="movie" value="images/lbxml.swf">
	      <param name="quality" value="high">
	      <param name="scale" value="noscale">
	      <param name="LOOP" value="false">
	      <param name="menu" value="false">
	      <param name="wmode" value="transparent">
	      <embed src="images/lbxml.swf" width="268" height="193" loop="false" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" salign="T" name="scriptmain" menu="false" wmode="transparent">
	</object>
</div>
<div id="rec">
	<h2>特别推荐</h2>
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
<div id="sidebar_right">
	<div class="adver"><script type="text/javascript" src="js/sidebar_adver.js"></script></div>
	<div class="hot">
		<h2>本月热点</h2>
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
	<div class="common">
		<h2>本月评论排行榜</h2>
		<ul>
			<?php if($this->_vars['monthHotCommend']){ ?>	
					<?php foreach($this->_vars['monthHotCommend'] as $key=>$value){?>
						<li><em><?php echo $value->date;?></em><a href="details.php?id=<?php echo $value->id;?>"><?php echo $value->title;?>.</a></li>
					<?php }?>
			<?php }else{?>
		<p>网站暂无数据</p>
			<?php }?>
		</ul>
	</div>
	<div class="vote">
		<h2>调查投票</h2>
		<h3><?php echo $this->_vars['title']?></h3>
		<form method="post" action="cast.php" target="_blank">
			<?php if($this->_vars['option']){ ?>
				<?php foreach($this->_vars['option'] as $key=>$value){?>
				<label><input type="radio" name="vote" value="<?php echo $value->id;?>"/><?php echo $value->title;?></label>
				<?php }?>
			<?php }?>	
				<p><input type="submit" name="send" value="投票"/> <input type="button"value="查看" onclick="javascript:window.open('cast.php')"/></p>
		</form>
	</div>

</div>
<div id="picnews">
	<h2>图文资讯</h2>
		<?php if($this->_vars['monthHotPic']){ ?>	
					<?php foreach($this->_vars['monthHotPic'] as $key=>$value){?>
						<dl>
							<dt><a href="details.php?id=<?php echo $value->id;?>"><img src="<?php echo $value->thumb;?>" alt="<?php echo $value->title;?>"/></a></dt>
							<dd><a href="details.php?id=<?php echo $value->id;?>"><?php echo $value->title;?></a></dd>
						</dl>
					<?php }?>
			<?php }else{?>
		<p>网站暂无数据</p>
			<?php }?>
	
	
</div>
<div id="newslist">
	<?php if($this->_vars['mainList']){ ?>	
					<?php foreach($this->_vars['mainList'] as $key=>$value){?>
			<div class="<?php echo $value->class;?>">
				<h2><a href="list.php?id=<?php echo $value->id;?>">更多...</a><?php echo $value->nav_name;?></h2>
				<ul>
						<?php if($value->childList){ ?>	
							<?php foreach($value->childList as $key=>$value){?>
							<li><em><?php echo $value->date;?></em><a href="details.php?id=<?php echo $value->id;?>"><?php echo $value->title;?></a></li>
							<?php }?>
						<?php }?>
				</ul>
			</div>
		<?php }?>
	<?php }?>
</div>


<?php $_tpl->create('footer.html')?>




</body>
</html>