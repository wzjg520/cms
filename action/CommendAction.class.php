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
//管理员控制器类
class CommendAction extends Action{
	public function __construct(&$_tpl){
		parent::__construct($_tpl,new CommendModel());
	}
	//业务流程控制器
	public function action(){
			switch ($_GET['action']){
				case 'show':
					$this->show();
					break;
				case 'state':
					$this->state();
					break;
				case 'states':
					$this->states();
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
		parent::page($this->_model->getTotalCommend());
		$this->_tpl->assign('current','评论列表');
		$this->_tpl->assign('show',true);
		$commend=$this->_model->getLimitCommendList();
		foreach($commend as $value){
			if(empty($value->state)){
				$value->state='[ <span class="red">未审核</span> ][ <a href="?action=state&id='.$value->id.'&type=ok">通过</a> ]';
			}else{
				$value->state='[ <span class="green">已通过</span> ][ <a href="?action=state&id='.$value->id.'&type=cancel">取消</a> ]';
			}
		}
		Tool::subStrOfObj($commend, content, 'utf-8', 20);
		$this->_tpl->assign('allCommend', $commend);
	}

	private function state(){
		if(isset($_GET['action']) && $_GET['action']=='state'){
			if($_GET['type']=='ok'){
				$this->_model->id=$_GET['id'];
				$this->_model->setCommendOk() ? Tool::alertLocation(null, PREV_URL) : Tool::alertBack('修改失败');
			}
			if($_GET['type']=='cancel'){
				$this->_model->id=$_GET['id'];
				$this->_model->setCommendCancel() ? Tool::alertLocation(null, PREV_URL) : Tool::alertBack('修改失败');
			}
		}else{
			Tool::alertBack('非法操作');
		}
	}
	//批量审核
	private function states(){
		if(isset($_POST['send'])){
			$this->_model->states=$_POST["states"];
			if($this->_model->setCommendStates()){
				Tool::alertLocation(null,PREV_URL);
			}else{
				Tool::alertBack('执行出错');
			};
		}

	}
	private function delete(){
		if(isset($_GET['id'])){
			$this->_model->id=$_GET['id'];
			$this->_model->deleteCommend() ? Tool::alertLocation('恭喜你，删除成功',PREV_URL) : Tool::alertBack('对不起删除失败');
		}else{
			Tool::alertBack('非法操作');
		}
	}

}




?>