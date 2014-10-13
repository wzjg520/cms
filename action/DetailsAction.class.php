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
class DetailsAction extends Action{
	public function __construct($_tpl){
		parent::__construct($_tpl);
	}
	public function action(){
		$this->setCount();
		$this->getDetails();		
		$this->getCommend();
	}
	//支持和反对统计
	private function setCount(){
		if(isset($_GET['type']) && isset($_GET['id']) && isset($_GET['cid'])){
			parent::__construct ($this->_tpl , new CommendModel());
			$this->_model->id=$_GET['id'];
			if($_GET['type']=='support'){
				$this->_model->addSupport() ? Tool::alertLocation('支持成功',PREV_URL) :  Tool::alertLocation('支持失败', PREV_URL);
			}elseif($_GET['type']=='oppose'){
				$this->_model->addOppose() ? Tool::alertLocation('反对成功', PREV_URL) :  Tool::alertLocation('反对失败',PREV_URL);
			}
		}
	}
	public function getCommend(){
		parent::__construct ($this->_tpl , new CommendModel());
		$this->_model->cid=$_GET['id'];
		$totalCount=$this->_model->getCommendCount();
		$this->page($totalCount,NEW_COMMEND);
		$result=$this->_model->getAllLimitCommend();
		foreach($result as $value){
			if($value->username=='游客'){
				$value->face='00.gif';
			}
			switch($value->manner){
				case 0:
					$value->manner='中立';
					break;
				case 1:
					$value->manner='支持';
					break;
				case 2:
					$value->manner='反对';
					break;
			}
		}

		$this->_tpl->assign('totalCount',$totalCount);
		$this->_tpl->assign('commend',$result);
	}
	private function getDetails(){
		if(isset($_GET['id'])){
			$details=new ContentModel();
			$details->id=$_GET['id'];
			if(!$details->setContentCount())Tool::alertBack('警告：不存在此文档');
			$result=$details->getOneContent();
			$details->nav=$result->nav;
			if(IS_CACHE){
				$this->_tpl->assign('count','<script type="text/javascript">getCount();</script>');
			}else{
				$this->_tpl->assign('count',$result->count);
			}
			$arr=explode(',', $result->tag);
			if(is_array($arr)){
				foreach($arr as $value){
					$result->tag=str_replace($value, '<a href="search.php?searchtype=2&tag='.$value.'">'.$value.'</a>', $result->tag);
				}
			}

			$monthRec=$details->getMonthNavRec();
			$monthHot=$details->getMonthNavHot();
			$monthPic=$details->getMonthNavPic();
			Tool::subStrOfObj($monthRec, 'title', 'utf-8', 14);
			Tool::subStrOfObj($monthHot, 'title', 'utf-8', 14);
			Tool::subStrOfObj($monthPic, 'title', 'utf-8', 14);
			Tool::objToDate($monthRec,date);
			Tool::objToDate($monthHot,date);
			Tool::objToDate($monthPic,date);
			$this->_tpl->assign('monthRec',$monthRec);
			$this->_tpl->assign('monthHot',$monthHot);
			$this->_tpl->assign('monthPic',$monthPic);
			$this->_tpl->assign('id',$result->id);
			$this->_tpl->assign('titlec',$result->title);
			$this->_tpl->assign('date',$result->date);
			$this->_tpl->assign('info',$result->info);
			$this->_tpl->assign('source',$result->source);
			$this->_tpl->assign('author',$result->author);
			$this->_tpl->assign('nav',$result->nav_name);
			$this->_tpl->assign('content',Tool::html($result->content));
			$this->_tpl->assign('tag',$result->tag);
			$this->_tpl->assign('keyword',$result->keyword);

		}else{
			Tool::alertBack('非法登陆');
		}
	}


}




?>