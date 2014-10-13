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
//轮播器实体类
class AdverModel extends Model{
	private $id;
	private $title;
	private $link;
	private $info;
	private $state;
	private $pic;
	private $type;
	private $_limit;
	private $kind;
	//拦截器
	public function __set($_key,$_value){
		$this->$_key=$_value;
	}
	public function __get($_key){
		return $this->$_key;
	}
	public function getAdverCount(){
		$_sql="SELECT COUNT(1) FROM cms_adver";
		return $this->total($_sql);
	}
	//设置轮播
	public function setAdverOk(){
		$_sql="UPDATE cms_adver SET state=1 WHERE id='$this->id'";
		return parent::adu($_sql);
	}
	//设置取消轮播
	public function setAdverCancel(){
		$_sql="UPDATE cms_adver SET state=0 WHERE id='$this->id'";
		return parent::adu($_sql);
	}
	//获得所有数据用于分页
	public function getAllLimitAdver(){
		$_sql="SELECT
									id,
									title,
									pic,
									link,
									date,
									info,
									state,
									type
							FROM
									cms_adver
							WHERE
									type
								IN
									({$this->kind})
							ORDER BY
									state
						DESC,
									date
						DESC
			$this->_limit";
		return parent::all($_sql);
	}

	//获得最新的5条文字广告
	public function getNewTextAdver(){
		$_sql="SELECT
									title,
									link
				FROM
									cms_adver
				WHERE
									state=1
				AND
									type=1
				ORDER BY
									date
				DESC
					LIMIT
									0,".ADVER_NUM;
		return $this->all($_sql);
	}
	//获得最新的5条侧栏广告
	public function getNewSidebarAdver(){
		$_sql="SELECT
									title,
									link,
									pic,
									info
				FROM
									cms_adver
				WHERE
									state=1
				AND
									type=3
				ORDER BY
									date
				DESC
					LIMIT
									0,".ADVER_NUM;
		return $this->all($_sql);
	}
	//获得最新的5条头部广告
	public function getNewHeaderAdver(){
		$_sql="SELECT
									title,
									link,
									pic,
									info
				FROM
									cms_adver
				WHERE
									state=1
				AND
									type=2
				ORDER BY
									date
				DESC
					LIMIT
									0,".ADVER_NUM;
		return $this->all($_sql);
	}
	//获得一条数据
	public function getOneAdver(){
		$_sql="SELECT
								id,
								title,
								pic,
								link,
								date,
								info,
								type,
								state
					FROM
								cms_adver
				WHERE
								id='$this->id'";
		return $this->one($_sql);
	}
	//新增等级
	public function addAdver(){
		$_sql="INSERT INTO cms_adver (
																	title,
																	pic,
																	link,
																	date,
																	state,
																	info,
																	type
																	)
													VALUES
																(
																	'$this->title',
																	'$this->pic',
																	'$this->link',
																	NOW(),
																	'$this->state',
																	'$this->info',
																	'$this->type'
																)";
		return parent::adu($_sql);
	}
	//修改等级
	public function updateAdver(){
		$_sql="UPDATE
								cms_adver
						SET
								title='$this->title',
								pic='$this->pic',
								link='$this->link',
								info='$this->info',
								state='$this->state',
								type='$this->type'
					WHERE
								id='$this->id'";
		return $this->adu($_sql);
	}
	//删除等级
	public function deleteAdver(){
		$_sql="DELETE FROM
												cms_adver
								WHERE
												id='$this->id'
										LIMIT 1
		";
		return $this->adu($_sql);
	}


}




?>