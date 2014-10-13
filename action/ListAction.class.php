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
class ListAction extends Action{
	public function __construct($_tpl){
		parent::__construct($_tpl);
	}
	//设置前台显示
	public function setFrontShow(){
		$this->navList();
		$this->contentList();
	}
	//获取前台内容显示
	private function contentList(){
		if($_GET['id']){
			parent::__construct($this->_tpl,new ContentModel());
			$nav=new NavModel();
			$nav->id=$_GET['id'];
			$_navId=$nav->getChildId();
			if($_navId){
				$this->_model->nav=Tool::objArrOfStr($_navId,'id');
			}else{
				$this->_model->nav=$_GET['id'];
			}
			parent::page($this->_model->getContentCount(),CONTENT_SIZE);
			$_content=$this->_model->getAllLimitContent();
			foreach ($_content as $value){
				if(empty($value->thumb)){
					$value->thumb='images/none.jpg';
				}
			}
			$monthRec=$this->_model->getMonthNavRec();
			$monthHot=$this->_model->getMonthNavHot();
			$monthPic=$this->_model->getMonthNavPic();
			Tool::subStrOfObj($_content, 'info', 'utf-8', 120);
			Tool::subStrOfObj($_content, 'title', 'utf-8', 35);
			Tool::subStrOfObj($monthRec, 'title', 'utf-8', 14);
			Tool::subStrOfObj($monthHot, 'title', 'utf-8', 14);
			Tool::subStrOfObj($monthPic, 'title', 'utf-8', 14);
			Tool::objToDate($monthRec,date);
			Tool::objToDate($monthHot,date);
			Tool::objToDate($monthPic,date);
			$this->_tpl->assign('content',$_content);
			$this->_tpl->assign('monthRec',$monthRec);
			$this->_tpl->assign('monthHot',$monthHot);
			$this->_tpl->assign('monthPic',$monthPic);
		}else{
			Tool::alertBack('警告：非法操作');
		}

	}
	//获取钱台导航显示
	private function navList(){
		$_navModel=new NavModel();
		$_navModel->_id=$_GET['id'];
		$_navModel->_pid=$_GET['id'];
		$_navList=$_navModel->getOneNav();
		$_childList=$_navModel->getAllChildrenLimitNav();
		if($_navList){
			if($_navList->pnav_name){
				$_list='<a href="list.php?id='.$_navList->pid.'">'.$_navList->pnav_name.'</a>&gt;<a href="list.php?id='.$_navList->id.'">'.$_navList->nav_name.'</a>';
			}else{
				$_list='<a href="list.php?id='.$_navList->id.'">'.$_navList->nav_name.'</a>';
			}
			$this->_tpl->assign('navList',$_list);
		}
		if($_childList){
			$this->_tpl->assign('childList',$_childList);
		}
	}
}




?>