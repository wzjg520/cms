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
//等级实体类
class CommendModel extends Model{
	private $username;
	private $cid;
	private $state;
	private $content;
	private $date;
	private $manner;
	private $id;
	private $_limit;
	private $hotLimit;
	private $states;

	//拦截器
	public function __set($_key,$_value){
		$this->$_key=$_value;
	}
	public function __get($_key){
		return $this->$_key;
	}


	//增加支持
	public function addSupport(){
		$_sql="UPDATE cms_commend SET support=support+1 WHERE id='$this->id'";
		return parent::adu($_sql);
	}
	//增加反对
	public function addOppose(){
		$_sql="UPDATE cms_commend SET oppose=oppose+1 WHERE id='$this->id'";
		return parent::adu($_sql);
	}
	//获得数据总量用于分页
	public function getCommendCount(){
		$_sql="SELECT
								COUNT(*)
					FROM
								cms_commend
					WHERE
								cid='{$this->cid}'
						AND
								state=1;
		";
		return parent::total($_sql);
	}
	//获得文档评论集合（后台）
	public function getLimitCommendList(){
		$_sql="SELECT
									cd.id,
									cd.content,
									cd.content ct,
									cd.state,
									cd.state num,
									cd.username,
									ct.title pct,
									cd.cid
					FROM
									cms_commend cd,
									cms_content ct
					WHERE
									cd.cid=ct.id
									$this->_limit";
		return parent::all($_sql);
	}
	//获得评论总数(后台)
	public function getTotalCommend(){
		$_sql="SELECT COUNT(1) FROM cms_commend";
		return parent::total($_sql);
	}
	//设置评论通过(后台)
	public function setCommendOk(){
		$_sql="UPDATE cms_commend SET state=1 WHERE id='$this->id'";
		return parent::adu($_sql);
	}
	//设置取消评论通过(后台)
	public function setCommendCancel(){
		$_sql="UPDATE cms_commend SET state=0 WHERE id='$this->id'";
		return parent::adu($_sql);
	}
	//设置批量评论审核
	public function setCommendStates(){
		foreach($this->states as $key=>$value){
			if(!is_numeric($value))continue;
			if($value>0)$value=1;
			if($value<0)$value=0;
			$_sql .="UPDATE cms_commend SET state='$value' WHERE id='$key';";
		}
		return parent::mul($_sql);
	}
	//删除评论
	public function deleteCommend(){
		$_sql="DELETE FROM cms_commend WHERE id='{$this->id}'";
		return parent::adu($_sql);
	}
	//获得文档评论集合（前台）
	public function getAllLimitCommend(){
		$_sql="SELECT
								c.id,
								c.username,
								c.content,
								c.manner,
								c.state,
								c.support,
								c.oppose,
								c.date,
								c.manner,
								n.face
				FROM
								cms_commend c
			LEFT JOIN
								cms_user n
				ON
								c.username=n.username
			WHERE
								c.cid='{$this->cid}'
				AND
								c.state=1
			ORDER BY
								c.date
					DESC
			$this->_limit";
		return parent::all($_sql);
	}
	//后的文档评论集合
	public function getLimitHotCommend(){
		$_sql="SELECT
									c.id,
									c.username,
									c.content,
									c.manner,
									c.state,
									c.support,
									c.oppose,
									c.date,
									c.manner,
									n.face
				FROM
									cms_commend c
			LEFT JOIN
									cms_user n
					ON
									c.username=n.username
					WHERE
									c.cid='{$this->cid}'
						AND
									c.state=1
			ORDER BY
									c.oppose+c.support
					DESC
									$this->hotLimit";
		return parent::all($_sql);
	}

	//新增文档评论
	public function addCommend(){
		$_sql="INSERT INTO
											cms_commend(
																	username,
																	cid,
																	content,
																	state,
																	date
																)
												VALUES(
																	'$this->username',
																	'$this->cid',
																	'$this->content',
																	'$this->state',
																	NOW()
																)";
		return parent::adu($_sql);
	}



}




?>