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
//投票控制器类
class VoteAction extends Action{
	public function __construct(&$_tpl){
		parent::__construct($_tpl,new VoteModel());

	}
	//业务流程控制器
	public function action(){
			switch ($_GET['action']){
				case 'show':
					$this->show();
					break;
				case 'showChild':
					$this->showChild();
					break;
				case 'add':
					$this->add();
					break;
				case 'addChild':
					$this->addChild();
					break;
				case 'update':
					$this->update();
					break;
				case 'state':
					$this->state();
					break;
				case 'delete':
					$this->delete();
					break;
				default:
					exit('非法操作');
			}
	}
	//show
	private function show(){
		parent::page($this->_model->getVoteCount());
		$vote=$this->_model->getAllLimitVote();
		foreach($vote as $value){
			if(empty($value->state)){
				$value->state='[ <span class="red">否</span> ][ <a href="?action=state&id='.$value->id.'&type=ok">确定</a> ]';
			}else{
				$value->state='[ <span class="green">是</span> ]';
			}
			if(empty($value->pcount)){
				$value->pcount=0;
			}
		}
		$this->_tpl->assign('current','主题列表');
		$this->_tpl->assign('show',true);
		$this->_tpl->assign('allVote', $vote);
	}
	//showChild
	private function showChild(){
		$this->_model->id=$_GET['id'];
		parent::page($this->_model->getChildVoteCount());
		$this->_tpl->assign('current','投票项目');
		$this->_tpl->assign('showChild',true);
		$vote=$this->_model->getAllLimitChildVote();
		$this->_tpl->assign('allChildVote', $vote);
		$this->_tpl->assign('id',$_GET['id']);
		$this->_tpl->assign('prev_url',PREV_URL);
	}
	private function add(){
		if(isset($_POST['send'])){
			$this->Upad();
			if($this->_model->getOneVote())Tool::alertBack('当前主题已存在');
			$this->_model->addVote()?Tool::alertLocation('恭喜你，添加主题成功','vote.php?action=show'):Tool::alertBack('对不起，添加失败');
		}

		$this->_tpl->assign('prev_url',PREV_URL);
		$this->_tpl->assign('current','添加主题');
		$this->_tpl->assign('add',true);
	}
	private function addChild(){
		if(isset($_POST['send'])){
			$this->Upad();
			$this->_model->vid=$_POST['id'];
			if($this->_model->getOneVote())Tool::alertBack('当前投票项目已存在');
			$this->_model->addVote()?Tool::alertLocation('恭喜你，添加投票项目成功','vote.php?action=show'):Tool::alertBack('对不起，添加失败');
		}
		$this->_model->id=$_GET['id'];
		$vote=$this->_model->getOneVote();
		$this->_tpl->assign('prev_url',PREV_URL);
		$this->_tpl->assign('vote',$vote);
		$this->_tpl->assign('current','添加主题');
		$this->_tpl->assign('addChild',true);
	}
	private function update(){
		if(isset($_POST['send'])){
			$this->Upad();
			$this->_model->id=$_POST['id'];
			$this->_model->updateVote()?Tool::alertLocation('恭喜你，修改成功',$_POST['prev_url']):Tool::alertBack('对不起修改失败');
		}
		if(isset($_GET['id'])){
			$this->_model->id=$_GET['id'];
			is_object($this->_model->getOneVote())?true:Tool::alertBack('获得关联id出错');
			$this->_tpl->assign('oneVote',$this->_model->getOneVote());
		}else{
			Tool::alertBack('非法操作');
		}
		$this->_tpl->assign('current','修改主题');
		$this->_tpl->assign('update',true);
		$this->_tpl->assign('prev_url',PREV_URL);
	}
	private function delete(){
		if(isset($_GET['id'])){
			$this->_model->id=$_GET['id'];
			$this->_model->deleteVote() ? Tool::alertLocation('恭喜你，删除成功',PREV_URL) : Tool::alertBack('对不起，删除失败');
		}

	}
	private function state(){
		if(isset($_GET['action']) && $_GET['action']=='state'){
			if($_GET['type']=='ok'){
				$this->_model->id=$_GET['id'];
				$this->_model->setVoteCancel();
				$this->_model->setVoteOk() ? Tool::alertLocation(null, PREV_URL) : Tool::alertBack('修改失败');
			}
		}else{
			Tool::alertBack('非法操作');
		}
	}
	private function Upad(){
		if(Validate::checkNull($_POST['title']))Tool::alertBack('标题不能为空');
		if(Validate::checkLength($_POST['title'],20,'max'))Tool::alertBack('标题不能大于20位');
		if(Validate::checkLength($_POST['info'],200,'max'))Tool::alertBack('描述不能大于200位');
		$this->_model->title=$_POST['title'];
		$this->_model->info=$_POST['info'];
	}

}




?>