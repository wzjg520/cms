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
//会员员控制器类
class RegisterAction extends Action{
	public function __construct(&$_tpl){
		parent::__construct($_tpl,new UserModel());
	}
	//业务流程控制器
	public function action(){
			switch ($_GET['action']){
				case 'reg':
					$this->reg();
					break;
				case 'login':
					$this->login();
					break;
				case 'logout':
					$this->logout();
					break;
				default:
					exit('非法操作');
			}
	}
	private function logout(){
		$cookie=new Cookie('username');
		$cookie->unCookie();
		Tool::alertLocation('', 'register.php?action=login');
	}
	private function login(){
		$this->_tpl->assign('login',true);
		if(isset($_POST['send'])){
			if(Validate::checkNull($_POST['username']))Tool::alertBack('用户名不能为空');
			if(Validate::checkLength($_POST['username'],20,'max'))Tool::alertBack('用户名不得大于20位');
			if(Validate::checkLength($_POST['username'],2,'min'))Tool::alertBack('用户名不得小于2位');
			if(Validate::checkNull($_POST['password']))Tool::alertBack('密码不能为空');
			if(Validate::checkLength($_POST['password'],6,'min'))Tool::alertBack('密码不得小于6位');
			if(Validate::checkLength($_POST['code'],4,'equals'))Tool::alertBack('验证码必须为4位');
			if(Validate::checkEquals($_POST['code'],$_SESSION['code']))Tool::alertBack('验证码不正确');
			$this->_model->username=$_POST['username'];
			$this->_model->password=sha1($_POST['password']);
			$time=$_POST['cookie'];
			if(!!$result=$this->_model->checkUser()){
				$this->_model->time=time();
				$this->_model->id=$result->id;
				$this->_model->setLatertime();
				$cookie=new Cookie('username',$result->username,$time);
				$cookie->setCookie();
				$cookie=new Cookie('face',$result->face,$time);
				$cookie->setCookie();
				Tool::alertLocation(null, 'index.php');
			}else{
				Tool::alertBack('用户名或密码错误');
			}
		}
	}
	private function reg(){
		$this->_tpl->assign('reg',true);
		$this->_tpl->assign('option0',range(1, 9));
		$this->_tpl->assign('option1',range(10, 24));
		if(isset($_POST['send'])){
			if(Validate::checkNull($_POST['username']))Tool::alertBack('用户名不能为空');
			if(Validate::checkLength($_POST['username'],20,'max'))Tool::alertBack('用户名不得大于20位');
			if(Validate::checkLength($_POST['username'],2,'min'))Tool::alertBack('用户名不得小于2位');
			if(Validate::checkNull($_POST['password']))Tool::alertBack('密码不能为空');
			if(Validate::checkLength($_POST['password'],6,'min'))Tool::alertBack('密码不得小于6位');
			if(Validate::checkEquals($_POST['password'],$_POST['notpass']))Tool::alertBack('密码和确认密码必须相同');
			if(Validate::checkNull($_POST['email']))Tool::alertBack('电子邮箱不能为空');
			if(Validate::checkEmail($_POST['email']))Tool::alertBack('邮箱格式不正确');
			if(Validate::checkLength($_POST['code'],4,'equals'))Tool::alertBack('验证码必须为4位');
			if(Validate::checkEquals($_POST['code'],$_SESSION['code']))Tool::alertBack('验证码不正确');
			if(Validate::checkNull($_POST['question']) || Validate::checkNull($_POST['answer'])){
				$this->_model->question='';
				$this->_model->answer='';
			}else{
				$this->_model->question=$_POST['question'];
				$this->_model->answer=$_POST['answer'];
			}
			$this->_model->username=$_POST['username'];
			$this->_model->email=$_POST['email'];
			if($this->_model->checkUser())Tool::alertBack('对不起，当前用户已存在');
			if($this->_model->checkEmail())Tool::alertBack('对不起，该邮箱已被注册');
			$this->_model->password=sha1($_POST['password']);
			$this->_model->face=$_POST['face'];
			$this->_model->state=1;
			$this->_model->addUser() ? Tool::alertLocation('恭喜你，注册成功','?action=login'):Tool::alertBack('对不起，注册失败');
		}
	}

}




?>