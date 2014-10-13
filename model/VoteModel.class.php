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
//投票实体类
class VoteModel extends Model{
	private $vid;
	private $id;
	private $title;
	private $info;
	private $_limit;
	//拦截器
	public function __set($_key,$_value){
		$this->$_key=$_value;
	}
	public function __get($_key){
		return $this->$_key;
	}



	public function getVoteSum(){
		$_sql="SELECT SUM(count) c FROM cms_vote WHERE vid=(SELECT id FROM cms_vote WHERE state=1)";
		return parent::one($_sql);
	}
	public function getVoteItem(){
		$_sql="SELECT id,title,date FROM cms_vote WHERE state=1 LIMIT 1";
		return parent::one($_sql);
	}
	public function getVote(){
		$_sql="SELECT id,title,count FROM cms_vote WHERE vid=(SELECT id FROM cms_vote WHERE state=1)";
		return parent::all($_sql);
	}
	public function setVoteCount(){
		$_sql="UPDATE cms_vote SET count=count+1 WHERE id='{$this->id}'";
		return parent::adu($_sql);
	}





	public function setVoteOk(){
		$_sql="UPDATE cms_vote SET state=1 WHERE id='$this->id'";
		return parent::adu($_sql);
	}
	public function setVoteCancel(){
		$_sql="UPDATE cms_vote SET state=0 WHERE state=1";
		return parent::adu($_sql);
	}

	public function getVoteCount(){
		$_sql="SELECT COUNT(1) FROM cms_vote WHERE vid=0";
		return $this->total($_sql);
	}
	public function getChildVoteCount(){
		$_sql="SELECT COUNT(1) FROM cms_vote WHERE vid='{$this->id}'";
		return $this->total($_sql);
	}
	//获得所有数据用于分页
	public function getAllLimitVote(){
		$_sql="SELECT
						c.id,
						c.title,
						c.state,
						c.date,
						(SELECT SUM(count) FROM cms_vote WHERE vid=c.id) pcount
				FROM
						cms_vote c
				WHERE
						c.vid=0
				ORDER BY
						c.state DESC,
						c.date DESC

						$this->_limit ";
		return parent::all($_sql);
	}
	//获得所有数据用于分页
	public function getAllLimitChildVote(){
		$_sql="SELECT id,title,state,date FROM cms_vote WHERE vid='{$this->id}' ORDER BY date $this->_limit ";
		return parent::all($_sql);
	}
	//获得一条数据
	public function getOneVote(){
		$_sql="SELECT
								id,
								title,
								info,
								vid
					FROM
								cms_vote
				WHERE
								id='$this->id'
						OR
								title='$this->title'";

		return $this->one($_sql);
	}
	//新增等级
	public function addVote(){
		$_sql="INSERT INTO cms_vote (
																	title,
																	info,
																	date,
																	vid
																	)
													VALUES
																(
																	'$this->title',
																	'$this->info',
																	NOW(),
																	'$this->vid'
																)";
		return parent::adu($_sql);
	}
	//修改
	public function updateVote(){
		$_sql="UPDATE
								cms_vote
						SET
								title='$this->title',
								info='$this->info'
					WHERE
								id='$this->id'";
		return $this->adu($_sql);
	}
	//删除
	public function deleteVote(){
		$_sql="DELETE FROM
												cms_vote
								WHERE
												id='$this->id'
									OR
												vid='$this->id'
		";
		return $this->adu($_sql);
	}


}




?>