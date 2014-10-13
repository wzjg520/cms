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
class ManageAction extends Action{
	public function __construct(&$_tpl){
		parent::__construct($_tpl,new ManageModel());
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
		parent::page($this->_model->getManageCount());
		$this->_tpl->assign('current','管理员列表');
		$this->_tpl->assign('show',true);
		$this->_tpl->assign('allManage', $this->_model->getManage());

	}

	private function add(){
		if(isset($_POST['send'])){
			if(Validate::checkNull($_POST['admin_user']))Tool::alertBack('用户名不能为空');
			if(Validate::checkLength($_POST['admin_user'],20,'max'))Tool::alertBack('用户名不得大于20位');
			if(Validate::checkLength($_POST['admin_user'],2,'min'))Tool::alertBack('用户名不得小于2位');
			if(Validate::checkNull($_POST['admin_pass']))Tool::alertBack('密码不能为空');
			if(Validate::checkEquals($_POST['admin_pass'],$_POST['admin_notepass']))Tool::alertBack('确认密码不正确');
			$this->_model->_admin_user=$_POST['admin_user'];
			if($this->_model->getOneManage())Tool::alertBack('对不起，当前用户已存在');
			$this->_model->_admin_pass=sha1($_POST['admin_pass']);
			$this->_model->_lever=$_POST['lever'];
			$this->_model->addManage()?Tool::alertLocation('恭喜你，添加管理员成功','manage.php?action=show'):Tool::alertBack('对不起，添加失败');
		}
		$_manage=new LeverModel();
		$this->_tpl->assign('getAllLever',$_manage->getAlllever());
		$this->_tpl->assign('current','添加管理员');
		$this->_tpl->assign('add',true);
	}
	private function update(){
		if(isset($_POST['send'])){
			if(trim($_POST['modify_pass']=='')){
				$this->_model->_admin_pass=$_POST['admin_pass'];
			}else{
				if(Validate::checkLength($_POST['modify_pass'],6,'min'))Tool::alertBack('密码不得小于6位');
				if(Validate::checkLength($_POST['modify_pass'],20,'max'))Tool::alertBack('密码不得大于20位');
				$this->_model->_admin_pass=sha1($_POST['modify_pass']);
			}
			$this->_model->_lever=$_POST['lever'];
			$this->_model->_id=$_POST['id'];
			$this->_model->updateManage()?Tool::alertLocation('恭喜你，管理员修改成功',$_POST['prev_url']):Tool::alertBack('对不起修改失败');
		}
		if(isset($_GET['id'])){
			$this->_model->_id=$_GET['id'];
			is_object($this->_model->getOneManage())?true:Tool::alertBack('获得关联id出错');
			$this->_tpl->assign('oneManage',$this->_model->getOneManage());
			$_manage=new LeverModel();
			$this->_tpl->assign('getAllLever',$_manage->getAlllever());
		}else{
			Tool::alertBack('非法操作');
		}
		$this->_tpl->assign('current','修改管理员');
		$this->_tpl->assign('update',true);
		$this->_tpl->assign('prev_url',PREV_URL);
	}
	private function delete(){
		if(isset($_GET['id'])){
			$this->_model->_id=$_GET['id'];
			$this->_model->deleteManage() ? Tool::alertLocation('恭喜你，删除成功','manage.php?action=show') : Tool::alertBack('对不起删除失败');
		}
		$this->_tpl->assign('current','删除管理员');
		$this->_tpl->assign('delete',true);
		$this->_tpl->assign('prev_url',PREV_URL);

	}

}




?>