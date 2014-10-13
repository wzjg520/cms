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
class LeverAction extends Action {
	public function __construct(&$_tpl) {
		parent::__construct($_tpl,new LeverModel());
	}
	//业务流程控制器
	public function action() {
		switch ($_GET ['action']) {
			case 'show' :
				$this->show();
				break;
			case 'add' :
				$this->add();
				break;
			case 'update' :
				$this->update();
				break;
			case 'delete' :
				$this->delete();
				break;
			default :
				exit('非法操作');
		}
	}
	//show
	private function show() {
		parent::page($this->_model->getLeverCount());
		
		$this->_tpl->assign('current','等级列表');
		$this->_tpl->assign('show',true);
		$this->_tpl->assign('allLever',$this->_model->getAllLimitlever());
	}
	private function add() {
		if (isset($_POST ['send'])) {
			if (Validate::checkNull($_POST ['lever_name'])) Tool::alertBack('等级名称不能为空');
			if (Validate::checkLength($_POST ['lever_name'],20,'max')) Tool::alertBack('等级名称不能大于20位');
			if (Validate::checkLength($_POST ['lever_info'],200,'max')) Tool::alertBack('等级描述不能大于200位');
			$this->_model->_lever_name = $_POST ['lever_name'];
			if ($this->_model->getOneLever()) Tool::alertBack('当前等级已存在');
			$this->_model->_lever_info = $_POST ['lever_info'];
			$this->_model->addLever() ? Tool::alertLocation('恭喜你，添加等级成功','lever.php?action=show') : Tool::alertBack('对不起，添加失败');
		}
		$this->_tpl->assign('getAllLever',$this->_model->getAlllever());
		$this->_tpl->assign('current','添加等级');
		$this->_tpl->assign('add',true);
	}
	private function update() {
		if (isset($_POST ['send'])) {
			if (Validate::checkNull($_POST ['lever_name'])) Tool::alertBack('等级名称不能为空');
			if (Validate::checkLength($_POST ['lever_name'],20,'max')) Tool::alertBack('等级名称不能大于20位');
			if (Validate::checkLength($_POST ['lever_info'],200,'max')) Tool::alertBack('等级描述不能大于200位');
			$this->_model->_lever_name = $_POST ['lever_name'];
			$this->_model->_lever_info = $_POST ['lever_info'];
			$this->_model->_id = $_POST ['id'];
			if(@!$this->_model->premission=implode(',', $_POST['premission']))Tool::alertBack('请设定权限');
			$this->_model->updateLever() ? Tool::alertLocation('恭喜你，等级修改成功',$_POST ['prev_url']) : Tool::alertBack('对不起修改失败');
		}
		if (isset($_GET ['id'])) {
			$this->_model->_id = $_GET ['id'];
			$premission = new PremissionModel();			
			is_object($this->_model->getOneLever()) ? true : Tool::alertBack('获得关联id出错');
			$oneLever=$this->_model->getOneLever();	
			$allPremission=$premission->getAllPremission();
			
			foreach($allPremission as $value){
				if(in_array($value->id, explode(',', $oneLever->premission))){
					$value->checked='checked="checked"';
				}else{
					$value->checked='';
				}
			}
			
			$this->_tpl->assign('premission',$allPremission);
			$this->_tpl->assign('oneLever',$oneLever);
			$this->_tpl->assign('id',$this->_model->_id);
		} else {
			Tool::alertBack('非法操作');
		}
		$this->_tpl->assign('current','修改等级');
		$this->_tpl->assign('update',true);
		$this->_tpl->assign('prev_url',PREV_URL);
	}
	private function delete() {
		if (isset($_GET ['id'])) {
			$this->_model->_id = $_GET ['id'];
			$_manage = new ManageModel();
			$_manage->_lever = $this->_model->_id;
			if ($_manage->getOneManage()) Tool::alertBack('警告：该等级已有用户占用，请先删除相关用户');
			$this->_model->deleteLever() > 0 ? Tool::alertLocation('恭喜你，删除成功','lever.php?action=show') : Tool::alertBack('对不起，删除失败');
		}
		$this->_tpl->assign('current','删除等级');
		$this->_tpl->assign('delete',true);
	}
}

?>