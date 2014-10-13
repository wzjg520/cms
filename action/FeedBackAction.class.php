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
//评论控制器类
class FeedBackAction extends Action{
	public function __construct(&$_tpl){
		parent::__construct($_tpl);

	}
	//业务流程控制器
	public function action(){
		$this->addCommend();
		$this->setCount();
		$this->getCommend();
	}
	//获得本月最热文章排行
	private function getTwentyContent(){
		if(isset($_GET['id'])){
			$content=new ContentModel();
			$content->id=$_GET['id'];
		}
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

	private function getCommend(){
		parent::__construct ($this->_tpl , new CommendModel());
		if(isset($_GET['id'])){
				$this->_model->cid=$_GET['id'];
				$totalCount=$this->_model->getCommendCount();
				$this->page($totalCount,NAV_SIZE);
				if(!$result=$this->_model->getAllLimitCommend())Tool::alertBack('对不起，该文档没有评论');
				$this->_model->hotLimit='LIMIT 3';
				$hot=$this->_model->getLimitHotCommend();
				$content=new ContentModel();
				$twentyContent=$content->getTwentyContent();
				$this->setValue($result);
				$this->setValue($hot);
				$content=new ContentModel();
				$content->id=$_GET['id'];
				$info=$content->getOneContentInfo();
				$this->_tpl->assign('info',$info->info);
				$this->_tpl->assign('title',$info->title);
				$this->_tpl->assign('cid',$_GET['id']);
				$this->_tpl->assign('count',$totalCount);
				$this->_tpl->assign('commend',$result);
				$this->_tpl->assign('hot',$hot);
				$this->_tpl->assign('twentyContent',$twentyContent);
		}
	}
	private function setValue($result){
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
			if($value->oppose >0){
				$value->oppose=-$value->oppose;
			}
		}

	}
	private function addCommend(){
		if(isset($_POST['send'])){
			parent::__construct($this->_tpl,new CommendModel());
			if(isset($_GET['id'])){
				if(PREV_URL!=CURRENT_URL){
					if(Validate::checkNull($_POST['content']))Tool::alertClose('评论不能为空');
					if(Validate::checkLength($_POST['content'],255,'max'))Tool::alertClose('评论不得大于255位');
					if(Validate::checkEquals($_POST['code'], $_SESSION['code']))Tool::alertClose('验证码必须一致');
				}else{
					if(Validate::checkNull($_POST['content']))Tool::alertBack('评论不能为空');
					if(Validate::checkLength($_POST['content'],255,'max'))Tool::alertBack('评论不得大于255位');
					if(Validate::checkEquals($_POST['code'], $_SESSION['code']))Tool::alertBack('验证码必须一致');
				}

				$this->_model->cid=$_GET['id'];
				$cookie=new Cookie('username');
				if(!!$username=$cookie->getCookie()){
					$this->_model->username=$username;
				}else{
					$this->_model->username='游客';
				};
				$this->_model->content=$_POST['content'];
				$this->_model->manner=$_POST['manner'] ? $_POST['manner'] : 0;
				$this->_model->addCommend() ? Tool::alertClose('评论成功,正等待管理员审核') : Tool::alertClose('评论失败');

			}else{
				Tool::alertBack('获得文档Id出错');
			}

		}
	}


}




?>