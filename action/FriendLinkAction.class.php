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
//友情链接时控制器类
class FriendLinkAction extends Action{
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
				default:
					exit('非法操作');
			}
	}
	//show
	private function show(){
		$textLink=$this->_model->getAllTextLink();
		$logoLink=$this->_model->getAllLogoLink();
		if(!empty($textLink)){
			$this->_tpl->assign('textlink',$textLink);
		}
		if(!empty($logoLink)){
			$this->_tpl->assign('logolink',$logoLink);
		}
		$this->_tpl->assign('show',true);
	}
	public function index(){
		$this->text();
		$this->logo();
	}
	public function text(){
		$textLink=$this->_model->getAllTextLink();
		if(!empty($textLink)){
			$this->_tpl->assign('textlink',$textLink);
		}
	}
	public function logo(){
		$logoLink=$this->_model->getAllLogoLink();
		if(!empty($logoLink)){
			$this->_tpl->assign('logolink',$logoLink);
		}
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
			echo $this->_model->webname=$_POST['webname'];
			echo $this->_model->weburl=$_POST['weburl'];
			echo $this->_model->type=$_POST['type'];
			echo $this->_model->state='0';
			echo $this->_model->logourl=$_POST['logourl'];
			echo $this->_model->user=$_POST['user'];
			echo $this->_model->email=$_POST['email'];

			$this->_model->addLink()?Tool::alertLocation('恭喜你，申请成功请等待管理员审核','?action=add'):Tool::alertBack('对不起，申请失败');
		}
		$this->_tpl->assign('add',true);
	}

}




?>