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
//管理员实体类
class ManageModel extends Model{
	private $_tpl;
	private $_admin_user;
	private $_admin_pass;
	private $_lever;
	private $_id;
	private $_limit;
	private $_ip;
	//拦截器
	public function __set($_key,$_value){
		$this->$_key=$_value;
	}
	public function __get($_key){
		return $this->$_key;
	}
	//设置管理员登陆次数，ip，登录时间
	public function setLoginInfo(){
		$_sql="UPDATE
								cms_manage
						SET
								login_count=login_count+1,
								last_ip='$this->_ip',
								last_time=NOW()
						WHERE
								admin_user='$this->_admin_user'";
		return $this->adu($_sql);

	}
	//获得获得管理员数目
	public function getManageCount(){
		$_sql="SELECT COUNT(1) FROM cms_manage";
		return $this->total($_sql);
	}
	//获得所有管理员
	public function getManage(){
		$_sql="SELECT
								cms_manage.id,
								cms_manage.admin_user,
								cms_manage.login_count,
								cms_manage.last_ip,
								cms_manage.last_time,
								cms_manage.reg_time,
								cms_lever.lever_name
				FROM
								cms_manage
			LEFT JOIN
								cms_lever
				ON
								cms_lever.id=cms_manage.lever
			ORDER BY
								cms_manage.id
			DESC
								$this->_limit";
		return parent::all($_sql);
	}
	//获得登陆会员
	public function getLoginManage(){
		$_sql="SELECT
									l.admin_user,
									r.lever_name,
									r.premission
					FROM
									cms_manage AS l
					LEFT JOIN
									cms_lever AS r
					ON
									l.lever=r.id
					WHERE
									l.admin_user='$this->_admin_user'
					AND
									l.admin_pass='$this->_admin_pass'

					LIMIT 1";
		return parent::one($_sql);
	}
	//获得一个会员
	public function getOneManage(){
		$_sql="SELECT
								id,
								admin_user,
								admin_pass,
								lever
					FROM
								cms_manage
				WHERE
								id='$this->_id'
					OR
								admin_user='$this->_admin_user'
					OR
						      	lever='$this->_lever'";

		return $this->one($_sql);
	}
	//新增管理员
	public function addManage(){
		$_sql="INSERT INTO cms_manage (
																	admin_user,
																	admin_pass,
																	lever,
																	reg_time
																	)
													VALUES
																(
																	'$this->_admin_user',
																	'$this->_admin_pass',
																	'$this->_lever',
																	NOW()
																)";
		return parent::adu($_sql);
	}
	//修改管理员
	public function updateManage(){
		$_sql="UPDATE
								cms_manage
						SET
								admin_pass='$this->_admin_pass',
								lever='$this->_lever'
					WHERE
								id='$this->_id'";
		return $this->adu($_sql);
	}
	//删除管理员
	public function deleteManage(){
		$_sql="DELETE FROM
												cms_manage
								WHERE
												id='$this->_id'
										LIMIT 1
		";
		return $this->adu($_sql);
	}




}




?>