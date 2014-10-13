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
class LinkAction extends Action{
	public function __construct(&$_tpl){
		parent::__construct($_tpl,new LinkModel());

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
				case 'state':
					$this->state();
					break;
				default:
					exit('非法操作');
			}
	}
	//show
	private function show(){
		parent::page($this->_model->getLinkCount());
		$allLink=$this->_model->getAllLimitLink();
		Tool::subStrOfObj($allLink, 'webname', 'UTF-8', 14);
		Tool::subStrOfObj($allLink, 'weburl', 'UTF-8', 20);
		Tool::subStrOfObj($allLink, 'logourl', 'UTF-8', 20);
		if($allLink){
			foreach ($allLink as $value){
				switch($value->type){
					case '1':
						$value->type='文字链接';
						break;
					case '2':
						$value->type='图片链接';
						break;
					default:
						Tool::alertBack('错误类型');
				}
			}

			foreach($allLink as $value){
				if(empty($value->state)){
					$value->state='[ <span class="red">未审核</span> ][ <a href="?action=state&id='.$value->id.'&type=ok">通过</a> ]';
				}else{
					$value->state='[ <span class="green">已通过</span> ][ <a href="?action=state&id='.$value->id.'&type=cancel">取消</a> ]';
				}
			}
		}
		$this->_tpl->assign('current','友情链接列表');
		$this->_tpl->assign('show',true);
		$this->_tpl->assign('allLink',$allLink);
	}
	private function add(){
	if(isset($_POST['send'])){
			if(Validate::checkNull($_POST['webname']))Tool::alertBack('网站名称不能为空');
			if(Validate::checkLength($_POST['webname'],20,'max'))Tool::alertBack('等级名称不能大于20位');
			if(Validate::checkNull($_POST['weburl']))Tool::alertBack('网站地址不能为空');
			if(Validate::checkLength($_POST['weburl'],50,'max'))Tool::alertBack('网站地址不能大于50位');
			if(Validate::checkNull($_POST['email']))Tool::alertBack('邮箱地址不能为空');
			if(Validate::checkLength($_POST['email'],40,'max'))Tool::alertBack('邮箱地址不能大于40位');
			if($_POST['type']=='2'){
				if(Validate::checkLength($_POST['logourl'],50,'max'))Tool::alertBack('logo地址不能大于50位');
				if(Validate::checkNull($_POST['logourl']))Tool::alertBack('logo地址不能为空');
			}
			if(Validate::checkNull($_POST['user']))Tool::alertBack('站长姓名不能为空');
			 $this->_model->webname=$_POST['webname'];
			 $this->_model->weburl=$_POST['weburl'];
			 $this->_model->type=$_POST['type'];
			 $this->_model->logourl=$_POST['logourl'];
			 $this->_model->state='1';
			 $this->_model->user=$_POST['user'];
			 $this->_model->email=$_POST['email'];
			 $this->_model->id=$_POST['id'];

			$this->_model->addLink()?Tool::alertLocation('恭喜你，新增友情链接修改成功',$_POST['prev_url']):Tool::alertBack('对不起，修改失败');
		}
		$this->_tpl->assign('current','新增友情链接');
		$this->_tpl->assign('prev_url',PREV_URL);
		$this->_tpl->assign('add',true);
	}
	private function update(){
	if(isset($_POST['send'])){
			if(Validate::checkNull($_POST['webname']))Tool::alertBack('网站名称不能为空');
			if(Validate::checkLength($_POST['webname'],20,'max'))Tool::alertBack('等级名称不能大于20位');
			if(Validate::checkNull($_POST['weburl']))Tool::alertBack('网站地址不能为空');
			if(Validate::checkLength($_POST['weburl'],50,'max'))Tool::alertBack('网站地址不能大于50位');
			if(Validate::checkNull($_POST['email']))Tool::alertBack('邮箱地址不能为空');
			if(Validate::checkLength($_POST['email'],40,'max'))Tool::alertBack('邮箱地址不能大于40位');
			if($_POST['type']=='2'){
				if(Validate::checkLength($_POST['logourl'],50,'max'))Tool::alertBack('logo地址不能大于50位');
				if(Validate::checkNull($_POST['logourl']))Tool::alertBack('logo地址不能为空');
			}
			if(Validate::checkNull($_POST['user']))Tool::alertBack('站长姓名不能为空');
			 $this->_model->webname=$_POST['webname'];
			 $this->_model->weburl=$_POST['weburl'];
			 $this->_model->type=$_POST['type'];
			 $this->_model->logourl=$_POST['logourl'];
			 $this->_model->user=$_POST['user'];
			 $this->_model->email=$_POST['email'];
			 $this->_model->id=$_POST['id'];

			$this->_model->updateLink()?Tool::alertLocation('恭喜你，友情链接修改成功',$_POST['prev_url']):Tool::alertBack('对不起，修改失败');
		}
		if(isset($_GET['id'])){
			$this->_model->id=$_GET['id'];
			if(!$this->_model->getOneLink())Tool::alertBack('获得关联id出错');
			$OneLink=$this->_model->getOneLink();
			if($OneLink->type=='2'){
				$this->_tpl->assign('checkedLogo','checked="checked"');
				$this->_tpl->assign('logoStyle','style="display:block;"');
			}else{
				$this->_tpl->assign('checkedText','checked="checked"');
				$this->_tpl->assign('logoStyle','style="display:none;"');
			}
			$this->_tpl->assign('oneLink',$this->_model->getOneLink());
		}else{
			Tool::alertBack('非法操作');
		}
		$this->_tpl->assign('current','修改友情链接');
		$this->_tpl->assign('update',true);
		$this->_tpl->assign('prev_url',PREV_URL);
	}
	private function delete(){
		if(isset($_GET['id'])){
			$this->_model->_id=$_GET['id'];
			$_manage=new ManageModel();
			$_manage->_lever=$this->_model->_id;
			if($_manage->getOneManage())Tool::alertBack('警告：该等级已有用户占用，请先删除相关用户');
			$this->_model->deleteLever()>0 ? Tool::alertLocation('恭喜你，删除成功','lever.php?action=show') : Tool::alertBack('对不起，删除失败');
		}
		$this->_tpl->assign('current','删除等级');
		$this->_tpl->assign('delete',true);

	}
	private function state(){
		if(isset($_GET['action']) && $_GET['action']=='state'){
			if($_GET['type']=='ok'){
				$this->_model->id=$_GET['id'];
				$this->_model->setLinkOk() ? Tool::alertLocation(null, PREV_URL) : Tool::alertBack('修改失败');
			}
			if($_GET['type']=='cancel'){
				$this->_model->id=$_GET['id'];
				$this->_model->setLinkCancel() ? Tool::alertLocation(null, PREV_URL) : Tool::alertBack('修改失败');
			}
		}else{
			Tool::alertBack('非法操作');
		}
	}

}




?>