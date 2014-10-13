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
class RotatainModel extends Model{
	private $id;
	private $title;
	private $link;
	private $info;
	private $state;
	private $pic;
	private $_limit;
	//拦截器
	public function __set($_key,$_value){
		$this->$_key=$_value;
	}
	public function __get($_key){
		return $this->$_key;
	}
	public function getRotatainCount(){
		$_sql="SELECT COUNT(1) FROM cms_rotatain";
		return $this->total($_sql);
	}
	//设置轮播
	public function setRotatainOk(){
		$_sql="UPDATE cms_rotatain SET state=1 WHERE id='$this->id'";
		return parent::adu($_sql);
	}
	//设置取消轮播
	public function setRotatainCancel(){
		$_sql="UPDATE cms_rotatain SET state=0 WHERE id='$this->id'";
		return parent::adu($_sql);
	}
	//获得所有数据用于分页
	public function getAllLimitRotatain(){
		$_sql="SELECT
									id,
									title,
									pic,
									link,
									date,
									info,
									state
				FROM
									cms_rotatain
				ORDER BY
									state
						DESC,
									date
						DESC
			$this->_limit";
		return parent::all($_sql);
	}

	//获得最新的3条数据
	public function getNewRotatain(){
		$_sql="SELECT
									title,
									pic,
									link
				FROM
									cms_rotatain
				WHERE
									state=1
				ORDER BY
									date
				DESC
					LIMIT
									0,".RO_NUM;
		return $this->all($_sql);
	}
	//获得一条数据
	public function getOneRotatain(){
		$_sql="SELECT
								id,
								title,
								pic,
								link,
								date,
								info,
								state
					FROM
								cms_rotatain
				WHERE
								id='$this->id'";
		return $this->one($_sql);
	}
	//新增等级
	public function addRotatain(){
		$_sql="INSERT INTO cms_rotatain (
																	title,
																	pic,
																	link,
																	date,
																	state,
																	info
																	)
													VALUES
																(
																	'$this->title',
																	'$this->pic',
																	'$this->link',
																	NOW(),
																	'$this->state',
																	'$this->info'
																)";
		return parent::adu($_sql);
	}
	//修改等级
	public function updateRotatain(){
		$_sql="UPDATE
								cms_rotatain
						SET
								title='$this->title',
								pic='$this->pic',
								link='$this->link',
								info='$this->info',
								state='$this->state'
					WHERE
								id='$this->id'";
		return $this->adu($_sql);
	}
	//删除等级
	public function deleteRotatain(){
		$_sql="DELETE FROM
												cms_rotatain
								WHERE
												id='$this->id'
										LIMIT 1
		";
		return $this->adu($_sql);
	}


}




?>