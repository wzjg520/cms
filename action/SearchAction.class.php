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
class SearchAction extends Action{
	public function __construct($_tpl){
		parent::__construct($_tpl,new ContentModel());
	}
	//设置前台显示
	public function action(){
		$this->titleSearchList();
		$this->keywordSearchList();
		$this->tagSearchList();
	}

	//获取前台标题搜索显示
	private function titleSearchList(){
		if($_GET['searchtype']=='1'){
			if(!empty($_GET['searchkeyword'])){
				$this->_model->title=$_GET['searchkeyword'];
				parent::page($this->_model->getTitleContentCount(),CONTENT_SIZE);
				$_content=$this->_model->getAllLimitTitleContent();
				foreach ($_content as $value){
					if(empty($value->thumb)){
						$value->thumb='images/none.jpg';
					}
					$value->title=str_replace($this->_model->title, '<span class="red">'.$this->_model->title.'</span>', $value->title);
				}
				$this->rightlist($_content);

			}else{
				Tool::alertBack('搜索内容不得为空');
			}
		}
	}
	//获取前台关键字显示
	private function keywordSearchList(){
		if($_GET['searchtype']=='0'){
			if(!empty($_GET['searchkeyword'])){
					$this->_model->keyword=$_GET['searchkeyword'];
					parent::page($this->_model->getKeywordContentCount(),CONTENT_SIZE);
					$_content=$this->_model->getAllLimitKeywordContent();

					foreach ($_content as $value){
						if(empty($value->thumb)){
							$value->thumb='images/none.jpg';
						}
						$value->keyword=str_replace($this->_model->keyword, '<span class="red">'.$this->_model->keyword.'</span>', $value->keyword);
					}
					$this->rightlist($_content);
			}else{
					Tool::alertBack('搜索内容不得为空');
			}
		}
	}
	//获取前台TAG标签显示
	private function tagSearchList(){
		if($_GET['searchtype']=='2'){
			if(!empty($_GET['tag'])){
				$this->_model->tag=$_GET['tag'];
				parent::page($this->_model->getTagContentCount(),CONTENT_SIZE);
				$_content=$this->_model->getAllLimitTagContent();
				foreach ($_content as $value){
					if(empty($value->thumb)){
						$value->thumb='images/none.jpg';
					}
				}
				$this->rightlist($_content);
				$tagModel=new TagModel();
				$tagModel->tag=$_GET['tag'];
				$tagModel->getOneTag() ? $tagModel->setCount() :$tagModel->setTag();

			}else{
					Tool::alertBack('搜索内容不得为空');
			}
		}
	}

	public function rightlist($_content){
		$nav=new NavModel();
		$nav->_id=$_content[rand(0,count($_content)-1)]->nav;
		$onenav=$nav->getOneNav();
		$nav->id=$onenav->pid;
		$_navId=$nav->getChildId();
		if($_navId){
			$this->_model->nav=Tool::objArrOfStr($_navId,'id');
		}else{
			$this->_model->nav=$_GET['id'];
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
	}
}




?>