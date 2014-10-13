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
class IndexAction extends Action {
	public function __construct($_tpl){
		parent::__construct($_tpl);
	}
	public function action(){
		$this->login();
		$this->showLaterUser();
		$this->showContent();
		$this->getVoteItem();
	}
	private function getVoteItem(){
		parent::__construct($this->_tpl,new VoteModel());
		$title=$this->_model->getVoteItem();
		$option=$this->_model->getVote();
		$this->_tpl->assign('title',$title->title);
		$this->_tpl->assign('option',$option);
	}
	private function showContent(){
		parent::__construct($this->_tpl,new ContentModel());
		$monthHot=$this->_model->getMonthHot();
		$monthHotCommend=$this->_model->getMonthHotCommend();
		$monthHotPic=$this->_model->getMonthHotPic();
		$monthRec=$this->_model->getMonthRec();
		$newTop=$this->_model->getNewTop();
		$topList=$this->_model->getTopList();
		$newList=$this->_model->getNewList();
		$mainList=$this->_model->getMainList();
		if($topList){
			$i=1;
			foreach($topList as $value){
				if($i % 2 !=0){
					$value->line =' | ';
				}else{
					$value->line ='';
				}
				$i++;
			}
		}
		if($mainList){
			$i=1;
			foreach($mainList as $value){
				switch($i){
					case 1:
						$value->class='list left top';
						break;
					case 2:
						$value->class='list right top';
						break;
					case 3:
						$value->class='list left';
						break;
					case 4:
						$value->class='list right';
						break;
				}
				$i++;
				$this->_model->nav=$value->id;
				$value->childList=$this->_model->getNewChildList();
				Tool::objToDate($value->childList,date);
				Tool::subStrOfObj($value->childList, 'title', 'utf-8', 20);
			}
		}
		Tool::subStrOfObj($monthHot, 'title', 'utf-8', 14);
		Tool::subStrOfObj($monthHotCommend, 'title', 'utf-8', 14);
		Tool::subStrOfObj($monthHotPic, 'title', 'utf-8', 20);
		Tool::subStrOfObj($monthRec, 'title', 'utf-8', 14);
		Tool::subStrOfObj($newTop, 'title', 'utf-8', 25);
		Tool::subStrOfObj($newTop, 'info', 'utf-8', 80);
		Tool::subStrOfObj($topList, 'title', 'utf-8', 14);
		Tool::subStrOfObj($newList, 'title', 'utf-8', 25);
		Tool::objToDate($monthHot,date);
		Tool::objToDate($monthHotCommend,date);
		Tool::objToDate($monthRec,date);
		Tool::objToDate($newList,date);
		$this->_tpl->assign('monthHot',$monthHot);
		$this->_tpl->assign('monthHotCommend',$monthHotCommend);
		$this->_tpl->assign('monthHotPic',$monthHotPic);
		$this->_tpl->assign('monthRec',$monthRec);
		$this->_tpl->assign('newTop',$newTop);
		$this->_tpl->assign('topList',$topList);
		$this->_tpl->assign('mainList',$mainList);
		$this->_tpl->assign('newList',$newList);



	}
	private function showLaterUser(){
		$user=new UserModel();
		$result=$user->getLateruser();
		$this->_tpl->assign('laterUser',$result);
	}
	private function login(){
		if(IS_CACHE){
			$this->_tpl->assign('cache',true);
			$this->_tpl->assign('memberInfo','<script>getMember()</script>');
		}else{
			$cookie=new Cookie('username');
			$username=$cookie->getCookie();
			$cookie=new Cookie('face');
			$face=$cookie->getCookie();
			if($username){
				$this->_tpl->assign('login',true);
				$this->_tpl->assign('member',$username);
			}
			if($face){
				$this->_tpl->assign('face',$face);
			}
		}

	}
}




?>