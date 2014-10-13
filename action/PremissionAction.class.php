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
//控制器类
class PremissionAction extends Action{
	public function __construct(&$_tpl){
		parent::__construct($_tpl,new PremissionModel());

	}
	//业务流程控制器
	public function action(){
			switch ($_GET['action']){
				case 'show':
					$this->show();
					break;
				case 'add':
					$this->add();
					break;
				case 'update':
					$this->update();
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
		parent::page($this->_model->getPremissionCount());
		$this->_tpl->assign('current','权限列表');
		$this->_tpl->assign('show',true);
		$this->_tpl->assign('allPremission', $this->_model->getAllLimitPremission());
	}
	private function add(){
		if(isset($_POST['send'])){
			if(Validate::checkNull($_POST['name']))Tool::alertBack('权限名称不能为空');
			if(Validate::checkLength($_POST['name'],20,'max'))Tool::alertBack('权限名称不能大于20位');
			if(Validate::checkLength($_POST['info'],200,'max'))Tool::alertBack('权限描述不能大于200位');
			$this->_model->name=$_POST['name'];
			if($this->_model->getOnePremission())Tool::alertBack('当前权限已存在');
			$this->_model->info=$_POST['info'];
			$this->_model->addPremission()?Tool::alertLocation('恭喜你，添加权限成功',PREV_URL):Tool::alertBack('对不起，添加失败');
		}
		$this->_tpl->assign('current','添加权限');
		$this->_tpl->assign('add',true);
	}
	private function update(){
		if(isset($_POST['send'])){
			if(Validate::checkNull($_POST['name']))Tool::alertBack('权限名称不能为空');
			if(Validate::checkLength($_POST['name'],20,'max'))Tool::alertBack('权限名称不能大于20位');
			if(Validate::checkLength($_POST['info'],200,'max'))Tool::alertBack('权限描述不能大于200位');
			$this->_model->name=$_POST['name'];
			$this->_model->info=$_POST['info'];
			$this->_model->id=$_POST['id'];
			$this->_model->updatePremission()?Tool::alertLocation('恭喜你，权限修改成功',$_POST['prev_url']):Tool::alertBack('对不起修改失败');
		}
		if(isset($_GET['id'])){
			$this->_model->id=$_GET['id'];
			is_object($this->_model->getOnePremission())?true:Tool::alertBack('获得关联id出错');
			$this->_tpl->assign('onePremission',$this->_model->getOnePremission());
		}else{
			Tool::alertBack('非法操作');
		}
		$this->_tpl->assign('current','修改权限');
		$this->_tpl->assign('update',true);
		$this->_tpl->assign('prev_url',PREV_URL);
	}
	private function delete(){
		if(isset($_GET['id'])){
			$this->_model->id=$_GET['id'];
			$this->_model->deletePremission()? Tool::alertLocation('恭喜你，删除成功',PREV_URL) : Tool::alertBack('对不起，删除失败');
		}
		$this->_tpl->assign('current','删除权限');
		$this->_tpl->assign('delete',true);

	}

}




?>