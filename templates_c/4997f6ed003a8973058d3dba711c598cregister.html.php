<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="style/basic.css"/>
<link rel="stylesheet" type="text/css" href="style/register.css"/>
<script type="text/javascript" src="js/user_reg.js"></script>

<title><?php echo $this->_vars['webname']?></title>
</head>
<body>
<?php $_tpl->create('header.html')?>
<?php if($this->_vars['login']){ ?>
<div id="register">
	<h2>会员登陆</h2>
	<form action="?action=login" method="post" name="login">
		<dl>
			<dd>用 户 名：<input type="text" name="username" class="text"/></dd>
			<dd>密　　码：<input type="password" name="password" class="text"/></dd>
			<dd>保存登陆：<input type="radio" name="cookie" value="86400"/> 一天<input type="radio" name="cookie" value="604800"/> 一周<input type="radio" name="cookie" value="2592000"/> 一月</dd>
			<dd>验 证 码：<input type="text" name="code" class="text code"/></dd>
			<dd class="des">输入下图中的字符，不区分大小写</dd>
			<dd><img class="code"src="config/code.php" alt="验证码" onclick=" this.src='config/code.php?jiajun='+Math.random();"/></dd>
			<dd>提　　交：<input type="submit" name="send" class="sub" onclick="return checkLogin()" value="登陆"/></dd>
		</dl>
	</form>
</div>
<?php }?>
<?php if($this->_vars['reg']){ ?>
<div id="register">
	<h2>会员注册</h2>
	<form action="?action=reg" method="post" name="reg">
		<dl>
			<dd>用 户 名：<input type="text" name="username" class="text"/><span> [必填]</span>(*用户名长度2到20位)</dd>
			<dd>密　　码：<input type="password" name="password" class="text"/><span> [必填]</span>(*密码长度必须大于6位)</dd>
			<dd>头　　像：<select onchange="setFace()" name="face" class="text">
										<?php foreach($this->_vars['option0'] as $key=>$value){?>
											<option>0<?php echo $value;?>.gif</option>
										<?php }?>
										<?php foreach($this->_vars['option1'] as $key=>$value){?>
											<option><?php echo $value;?>.gif</option>
										<?php }?>
									</select>
			</dd>
			<dd><img class="faceimg" name="faceimg" src="images/02.gif" alt="头像" /></dd>
			<dd>确认密码：<input type="password" name="notpass" class="text"/><span> [必填]</span>(*确认密码必须和密码一致)</dd>
			<dd>安全问题：<select name="question" class="text">
										<option value="默认不填">默认不填</option>
										<option value="您父亲的名字是">您父亲的姓名是</option>
										<option value="您母亲的年龄是">您母亲的年龄是</option>
										<option value="您配偶的名字是">您配偶的名字是</option>
										<option value="您配偶的生日是">您配偶的生日是</option>
									</select>
			</dd>
			<dd>安全答案：<input type="text" name="answer" class="text"/></dd>
			<dd>邮　　件：<input type="text" name="email" class="text"/><span></span></dd>
			<dd>验 证 码：<input type="text" name="code" class="text code"/></dd>
			<dd class="des">输入下图中的字符，不区分大小写</dd>
			<dd><img class="code"src="config/code.php" alt="验证码" onclick=" this.src='config/code.php?jiajun='+Math.random();"/></dd>
			<dd>提　　交：<input type="submit" name="send" class="sub" onclick="return checkReg()" value="注册会员"/></dd>
		</dl>
	</form>
</div>
<?php }?>

<?php $_tpl->create('footer.html')?>




</body>
</html>