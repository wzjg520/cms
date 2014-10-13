<?php
/*
* CMS VERSION 1.0
* ----------------------------------------
* COPY	2012-1013
* WEB :HTTP://jiajun.com
* =======================
* AUTHOR:WANG
* DATE:2014.3.11
* */
class Cache{
	private $flag;
	public function __construct($_noCache){
		$this->flag = in_array(Tool::fileName(),$_noCache);
	}
	public function action($type){
		switch($type){
			case  'details':
				$this->getDetailsCount();
				break;
			case 'header':
				$this->getHeader();
				break;
			case 'member':
				$this->getMember();
				break;
		}
	}
	public function noCache(){
		return $this->flag;
	}
	private function getMember(){
		$cookie=new Cookie('username');
		$username=$cookie->getCookie();
		$cookie=new Cookie('face');
		$face=$cookie->getCookie();
		if($username){
					$html .='<h2>会员信息</h2>';
					$html .='<div class="login">您好！<span style="color:blue">'.$username.'</span> 欢迎光临</div>';
					$html .='<div class="member">';
					$html .='<img src="images/'.$face.'" alt="头像"/>';
					$html .='<a href="#" class="member_a">个人中心</a>';
					$html .='<a href="#" class="member_a">我的评论</a>';
					$html .='<a href="register.php?action=logout" class="member_a">退出登录</a>';
					$html .='</div>';
					echo "
								function getMember(){
									document.write('$html');
								}
							";

		}else{

						$html .='<h2>会员登陆</h2>';
						$html .='<form method="post" action="register.php?action=login" name="login">';
						$html .='<label>用户名：<input type="text" name="username" class="text"/></label>';
						$html .='<label>密　码：<input type="password" name="password"class="text"/></label>';
						$html .='<label>验证码：<input type="text" name="code"class="text code"/></label>';
						$html .='<span><img class="code" src="config/code.php" alt="验证码" onclick=this.src="config/code.php?jiajun="+Math.random() /></span>';
						$html .='<p>';
						$html .='<input type="submit" name="send" onclick="return checkLogin()"value="登录" class="sub" />';
						$html .='<a href="register.php?action=reg">注册会员</a> <a href="#">忘记密码？</a>';
						$html .='</p>';
						$html .='</form>';
						echo "function getMember(){
										document.write('$html');
									}";

		}
	}
	private function getHeader(){
		$cookie=new Cookie('username');
		if($cookie->getCookie()){
			echo "
			function getHeader(){
			document.write('<a href=\"#\">您好！{$cookie->getCookie()}</a><a href=\"register.php?action=logout\">退出</a>');
			}
			";
		}else{
			echo "
			function getHeader(){
			document.write('<a href=\"register.php?action=login\">登陆</a><a href=\"register.php?action=reg\">注册</a>');
			}
			";
		}
	}
	private function getDetailsCount(){
		$content=new ContentModel();
		$content->id=$_GET['id'];
		$this->setCount($content);
		$this->getCount($content);
	}
	private function setCount(&$content){
		$content->setContentCount();
	}
	private function getCount(&$content){
		$count=$content->getOneContent()->count;
		echo "
		function getCount(){
		document.write('$count');
		}
		";
	}

}




?>