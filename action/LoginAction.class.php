A<?php
/*
 * CMS VERSION 1.0 ---------------------------------------- COPY	2012-1013 WEB :HTTP://jiajun.com ======================= AUTHOR:WANG DATE:2014.3.11
 */
class LoginAction extends Action {
	function __construct(&$_tpl) {
		parent::__construct ( $_tpl, new ManageModel () );
	}
	public function action() {
		switch ($_GET ['action']) {
			case 'login' :
				$this->login ();
				break;
			case 'loginout' :
				$this->loginOut ();
				break;
		}
	}
	private function login() {
		if (Validate::checkNull ( $_POST ['admin_user'] ))
			Tool::alertBack ( '用户名不能为空' );
		if (Validate::checkLength ( $_POST ['admin_user'], 20, 'max' ))
			Tool::alertBack ( '用户名不得大于20位' );
		if (Validate::checkLength ( $_POST ['admin_user'], 2, 'min' ))
			Tool::alertBack ( '用户名不得小于2位' );
		if (Validate::checkNull ( $_POST ['admin_pass'] ))
			Tool::alertBack ( '密码不能为空' );
		if (Validate::checkLength ( $_POST ['code'], 4, 'equals' ))
			Tool::alertBack ( '验证码不足4位' );
		if (Validate::checkEquals ( $_SESSION ['code'], strtolower ( $_POST ['code'] ) ))
			Tool::alertBack ( '验证码错误' );
		$this->_model->_admin_user = $_POST ['admin_user'];
		$this->_model->_admin_pass = sha1 ( $_POST ['admin_pass'] );
		$this->_model->_ip = $_SERVER ['REMOTE_ADDR'];
		$_login = $this->_model->getLoginManage ();
		if ($_login) {
			if(!stristr($_login->premission, '1'))exit('您没有权限登陆');			
			$this->_model->setLoginInfo ();
			$_SESSION ['admin'] ['admin_user'] = $_login->admin_user;
			$_SESSION ['admin'] ['admin_lever'] = $_login->lever_name;
			$_SESSION ['admin'] ['premission'] = $_login->premission;
			Tool::alertLocation ( null, 'admin.php' );
		} else {
			Tool::alertBack ( '警告：用户名或密码错误' );
		}
	}
	// 退出登录
	private function loginOut() {
		Tool::unSession ();
		Tool::alertLocation ( null, 'admin_login.php' );
	}
}

?>