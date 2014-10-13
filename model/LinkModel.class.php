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
class LinkModel extends Model{
	private $id;
	private $webname;
	private $weburl;
	private $logourl;
	private $user;
	private $type;
	private $state;
	private $email;
	private $_link;


	//拦截器
	public function __get($key){
		return $this->$key;
	}
	public function __set($key,$value){
		$this->$key=$value;
	}
	public function setLinkOk(){
		$_sql="UPDATE cms_link set state=1 WHERE id='{$this->id}'";
		return parent::adu($_sql);
	}
	public function setLinkCancel(){
		$_sql="UPDATE cms_link set state=0 WHERE id='{$this->id}'";
		return parent::adu($_sql);
	}
	public function getLinkCount(){
		$_sql="SELECT COUNT(1) FROM cms_link";
		return parent::total($_sql);
	}
	public function getAllLimitLink(){
		$_sql="SELECT
						webname,
						weburl,
						logourl,
						state,
						type,
						user,
						id
				FROM
						cms_link
			ORDER BY
						date
				DESC
						$this->_limit";
		return parent::all($_sql);
	}
	public function getAllTextLink(){
		$_sql="SELECT
						webname,
						weburl,
						logourl,
						user,
						date,
						type,
						state,
						email
				FROM
						cms_link
				WHERE
						type=1
				AND
						state=1
				ORDER BY
						date
				DESC";
		return parent::all($_sql);
	}
	public function getAllLogoLink(){
		$_sql="SELECT
						webname,
						weburl,
						logourl,
						user,
						date,
						type,
						state,
						email
				FROM
						cms_link
				WHERE
						type=2
				AND
						state=1
				ORDER BY
						date
				DESC";
		return parent::all($_sql);
	}
	public function getOneLink(){
		$_sql="SELECT
						webname,
						weburl,
						logourl,
						user,
						date,
						type,
						state,
						email,
						id
				FROM
						cms_link
				WHERE
						id='{$this->id}'";
		return parent::one($_sql);
	}
	public function addLink(){
		$_sql="INSERT INTO
							cms_link
						(
							webname,
							weburl,
							logourl,
							user,
							date,
							type,
							state,
							email
						)
				VALUES
						(
							'{$this->webname}',
							'{$this->weburl}',
							'{$this->logourl}',
							'{$this->user}',
							NOW(),
							'{$this->type}',
							'{$this->state}',
							'{$this->email}'
						)";
		return parent::adu($_sql);
	}
	public function updateLink(){
		$_sql="UPDATE cms_link SET
									webname='{$this->webname}',
									weburl='{$this->weburl}',
									logourl='{$this->logourl}',
									user='{$this->user}',
									type='{$this->type}',
									email='{$this->email}'

						WHERE
									id='{$this->id}'";


		return parent::adu($_sql);
	}


}




?>