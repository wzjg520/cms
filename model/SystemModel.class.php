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
//系统配置实体类
class SystemModel extends Model{
	private $webname;
	private $page_size;
	private $upload_dir;
	private $content_size;
	private $nav_size;
	private $new_commend;
	private $ro_time;
	private $ro_num;
	private $adver_num;
	//拦截器
	public function __set($_key,$_value){
		$this->$_key=$_value;
	}
	public function __get($_key){
		return $this->$_key;
	}
	public function getSystem(){
		$_sql="SELECT 
						webname,
						page_size,
						upload_dir,
						content_size,
						nav_size,
						new_commend,
						ro_time,
						ro_num,
						adver_num
				FROM 
						cms_system 
				WHERE 
						id=1";
		return parent::one($_sql);
	}
	public function updateSystem(){
		$_sql="UPDATE cms_system SET
									webname='{$this->webname}',
									page_size='{$this->page_size}',
									upload_dir='{$this->upload_dir}',
									content_size='{$this->content_size}',
									nav_size='{$this->nav_size}',
									new_commend='{$this->new_commend}',
									ro_time='{$this->ro_time}',
									ro_num='{$this->ro_num}',
									adver_num='{$this->adver_num}'
							WHERE
									id=1";
		return parent::adu($_sql);
	}
	

}




?>