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
//导航实体类
class NavModel extends Model{
	private $_tpl;
	private $_id;
	private $_nav_name;
	private $_nav_info;
	private $_limit;
	private $_pid;
	private $_sort;
	//拦截器
	public function __set($_key,$_value){
		$this->$_key=$_value;
	}
	public function __get($_key){
		return $this->$_key;
	}
	//前台导航排序
	public function setNavSort(){
		foreach($this->_sort  as$_key=>$_value){
			if(!is_numeric($_value))continue;
			$_sql .= "UPDATE cms_nav SET sort='$_value' WHERE id='$_key';";
		}
		return $this->mul($_sql);
	}
	public function getNavCount(){
		$_sql="SELECT COUNT(1) FROM cms_nav WHERE pid=0";
		return $this->total($_sql);
	}
	public function getNavChildrenCount(){
		$_sql="SELECT COUNT(1) FROM cms_nav WHERE pid='{$this->_pid}'";
		return $this->total($_sql);
	}
	//获得所有数据用于分页
	public function getAllLimitNav(){
		$_sql="SELECT id,nav_name,nav_info,pid,sort FROM cms_nav WHERE pid=0 ORDER BY sort ASC $this->_limit ";
		return parent::all($_sql);
	}
	//显示前台导航
	public function getFrontNav(){
		$_sql="SELECT id,nav_name,sort FROM cms_nav WHERE pid=0 ORDER BY sort ASC LIMIT 0,".NAV_SIZE;
		return parent::all($_sql);
	}
	//子数据带limit
	public function getAllChildrenLimitNav(){
		$_sql="SELECT id,nav_name,nav_info,pid,sort FROM cms_nav WHERE pid='$this->_pid' ORDER BY sort ASC $this->_limit ";
		return parent::all($_sql);
	}
	//子数据不带带limit
	public function getAllChildrenNav(){
		$_sql="SELECT id,nav_name,nav_info,pid,sort FROM cms_nav WHERE pid='$this->_pid' ORDER BY sort ASC";
		return parent::all($_sql);
	}
	//获得一条数据
	public function getOneNav(){
		$_sql="SELECT
								l.id,
								l.nav_name,
								l.nav_info,
								l.pid,
								l.sort,
								r.id as pid,
								r.nav_name as pnav_name
					FROM
								cms_nav as l
				LEFT JOIN
								cms_nav as r
						ON
								l.pid=r.id
				WHERE
								l.nav_name='$this->_nav_name'
					OR
								l.id='$this->_id'";
		return $this->one($_sql);
	}
	//新增等级
	public function addNav(){
		$_sql="INSERT INTO cms_nav (
																	nav_name,
																	nav_info,
																	pid,
																	sort
																	)
													VALUES
																(
																	'$this->_nav_name',
																	'$this->_nav_info',
																	'$this->_pid',
																	".parent::nextId('cms_nav')."
																)";
		return parent::adu($_sql);
	}
	//修改导航
	public function updateNav(){
		$_sql="UPDATE
								cms_nav
						SET
								nav_name='$this->_nav_name',
								nav_info='$this->_nav_info'
					WHERE
								id='$this->_id'";
		return $this->adu($_sql);
	}
	//删除导航
	public function deleteNav(){
		$_sql="DELETE FROM
												cms_nav
								WHERE
												id='$this->_id'
										OR
												pid='$this->_id'
		";
		return $this->adu($_sql);
	}
	//获得栏目下的所有子栏目id
	public function getChildId(){
		$_sql="SELECT id FROM cms_nav WHERE pid='$this->id'";
		return parent::all($_sql);
	}
	//获得所有栏目Id
	public function getAllNavId(){
		$_sql="SELECT id FROM cms_nav WHERE pid<>0";
		return parent::all($_sql);
	}
}




?>