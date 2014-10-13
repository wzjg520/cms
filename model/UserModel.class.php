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
//会员员实体类
class UserModel extends Model{
	private $username;
	private $password;
	private $question;
	private $answer;
	private $email;
	private $state;
	private $face;
	private $id;
	private $time;
	private $_limie;
	//拦截器
	public function __set($_key,$_value){
		$this->$_key=$_value;
	}
	public function __get($_key){
		return $this->$_key;
	}
	public function getUserCount(){
		$_sql="SELECT COUNT(1) FROM cms_user";
		return $this->total($_sql);
	}
	//获得所有数据用于分页
	public function getAllLimitUser(){
		$_sql="SELECT id,username,date,email,state FROM cms_user ORDER BY state DESC $this->_limit ";
		return parent::all($_sql);
	}
	//设置登录时间
	public function setLatertime(){
		$_sql="UPDATE cms_user SET time='$this->time' WHERE id='$this->id'";
		return parent::adu($_sql);
	}
	//获得最近前六位登陆的会员
	public function getLateruser(){
		$_sql="SELECT username,face FROM cms_user ORDER BY time DESC LIMIT 0,6";
		return parent::all($_sql);
	}
	//删除会员
	public function deleteUser(){
		$_sql="DELETE FROM cms_user WHERE id='$this->id' LIMIT 1";
		return parent::adu($_sql);
	}
	//修改会员
	public function updateUser(){
		$_sql="UPDATE cms_user SET
															password='{$this->password}',
															face='{$this->face}',
															notpass='{$this->notpass}',
															email='{$this->email}',
															question='{$this->question}',
															answer='{$this->answer}',
															state='{$this->state}'
										WHERE
															id='$this->id'";
		return parent::adu($_sql);
	}
	//新增会员
	public function addUser(){
		$_sql="INSERT INTO cms_user (
																	username,
																	password,
																	face,
																	email,
																	question,
																	answer,
																	date,
																	state
																	)
													VALUES
																(
																	'$this->username',
																	'$this->password',
																	'$this->face',
																	'$this->email',
																	'$this->question',
																	'$this->answer',
																	NOW(),
																	'$this->state'
																)";
		return parent::adu($_sql);
	}
	//检查会员
	public function checkUser(){
		$_sql="SELECT
									username,
									face,
									id
					FROM
									cms_user
					WHERE
									username='$this->username'
						LIMIT 1";
		return parent::one($_sql);
	}
	//获得一个会员的详细信息
	public function getOneUser(){
		$_sql="SELECT
									username,
									face,
									id,
									email,
									state,
									question,
									answer
					FROM
									cms_user
				WHERE
									id='$this->id'
					LIMIT 1";
		return parent::one($_sql);
	}
	//检查邮件
	public function checkEmail(){
		$_sql="SELECT
									id
					FROM
									cms_user
					WHERE
									email='$this->email'
						LIMIT 1";
		return parent::one($_sql);
	}

}




?>