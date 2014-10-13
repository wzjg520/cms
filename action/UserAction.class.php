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
class UserAction extends Action{
	public function __construct(&$_tpl){
		parent::__construct($_tpl,new UserModel());

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
		parent::page($this->_model->getUserCount());
		$this->_tpl->assign('current','会员列表');
		$this->_tpl->assign('show',true);
		$result=$this->_model->getAllLimitUser();
		if($result){
			foreach($result as $value){
				switch($value->state){
					case 0:
						$value->state='被封杀的会员';
						break;
					case 1:
						$value->state='刚注册的会员';
						break;
					case 2:
						$value->state='初级会员';
						break;
					case 3:
						$value->state='中级会员';
						break;
					case 4:
						$value->state='高级会员';
						break;
					case 5:
						$value->state='VIP会员';
						break;
				}
			}
		}
		$this->_tpl->assign('allUser', $result);
	}
	private function add(){
		if(isset($_POST['send'])){
			if(Validate::checkNull($_POST['username']))Tool::alertBack('用户名不能为空');
			if(Validate::checkLength($_POST['username'],20,'max'))Tool::alertBack('用户名不得大于20位');
			if(Validate::checkLength($_POST['username'],2,'min'))Tool::alertBack('用户名不得小于2位');
			if(Validate::checkNull($_POST['password']))Tool::alertBack('密码不能为空');
			if(Validate::checkLength($_POST['password'],6,'min'))Tool::alertBack('密码不得小于6位');
			if(Validate::checkEquals($_POST['password'],$_POST['notpass']))Tool::alertBack('密码和确认密码必须相同');
			if(Validate::checkNull($_POST['email']))Tool::alertBack('电子邮箱不能为空');
			if(Validate::checkEmail($_POST['email']))Tool::alertBack('邮箱格式不正确');
			if(Validate::checkNull($_POST['question']) || Validate::checkNull($_POST['answer'])){
				$this->_model->question='';
				$this->_model->answer='';
			}else{
				$this->_model->question=$_POST['question'];
				$this->_model->answer=$_POST['answer'];
			}
			$this->_model->username=$_POST['username'];
			$this->_model->email=$_POST['email'];
			if($this->_model->checkUser())Tool::alertBack('对不起，当前用户已存在');
			if($this->_model->checkEmail())Tool::alertBack('对不起，该邮箱已被注册');
			$this->_model->password=sha1($_POST['password']);
			$this->_model->notpass=sha1($_POST['notpass']);
			$this->_model->face=$_POST['face'];
			$this->_model->state=$_POST['state'];
			$this->_model->addUser()?Tool::alertLocation('恭喜你，添加会员成功','user.php?action=show'):Tool::alertBack('对不起，添加会员失败');
		}
		$this->_tpl->assign('option1',range(1,9));
		$this->_tpl->assign('option2',range(10,24));
		$this->_tpl->assign('current','添加会员');
		$this->_tpl->assign('add',true);
	}
	private function update(){
		if(isset($_POST['send'])){
			if(Validate::checkNull($_POST['email']))Tool::alertBack('电子邮箱不能为空');
			if(Validate::checkEmail($_POST['email']))Tool::alertBack('邮箱格式不正确');
			//检测安全问题
			if($_POST['question']=='默认不填' || Validate::checkNull($_POST['answer'])){
				$this->_model->question='';
				$this->_model->answer='';
			}else{
				$this->_model->question=$_POST['question'];
				$this->_model->answer=$_POST['answer'];
			}
			$this->_model->username=$_POST['username'];
			//检测密码留空则不修改
			if(empty($_POST['password'])){
				$this->_model->password=$_POST['old_password'];
			}else{
				if(Validate::checkLength($_POST['password'],6,'min'))Tool::alertBack('密码不得小于6位');
				$this->_model->password=$_POST['password'];
			}
			//头像处理

			$this->_model->face=$_POST['face'];
			$this->_model->id=$_POST['id'];
			$this->_model->email=$_POST['email'];
			$this->_model->state=$_POST['state'];
			$this->_model->updateUser()?Tool::alertLocation('恭喜你，等级修改成功',$_POST['prev_url']):Tool::alertBack('对不起修改失败');
		}
		if(isset($_GET['id'])){
			$this->_model->id=$_GET['id'];
			is_object($this->_model->getOneUser())?true:Tool::alertBack('获得关联id出错');
			$oneUser=$this->_model->getOneUser();
			$this->_tpl->assign('oneUser',$oneUser);
			$this->_tpl->assign('current','修改会员');
			$this->_tpl->assign('showState',$this->showState($oneUser->state));
			$this->_tpl->assign('showFace1',$this->showFace1($oneUser->face));
			$this->_tpl->assign('showFace2',$this->showFace2($oneUser->face));
			$this->_tpl->assign('facesrc',$oneUser->face);
			if(isset($oneUser->question)){
				$this->_tpl->assign('showQuestion',$this->showQuestion($oneUser->question));
				$this->_tpl->assign('answer',$oneUser->answer);
			}

			$this->_tpl->assign('update',true);
			$this->_tpl->assign('prev_url',PREV_URL);
		}else{
			Tool::alertBack('非法操作');
		}

	}
	private function delete(){
		if(isset($_GET['id'])){
			$this->_model->id=$_GET['id'];
			$this->_model->deleteUser()>0 ? Tool::alertLocation('恭喜你，删除成功','?action=show') : Tool::alertBack('对不起，删除失败');
		}
		$this->_tpl->assign('current','删除等级');
		$this->_tpl->assign('delete',true);

	}
	private function showState($str){
		$temp=array('被封杀的会员','刚注册的会员','初级会员','中级会员','高级会员','VIP会员');
		foreach($temp as $key=>$value){
			if($str==$key){
				$selected='selected="selected"';
			}else{
				$selected='';
			}
			$html .='<option value="'.$key.'" '.$selected.'>'.$value.'</option>';
		}
		return $html;
	}
	private function showQuestion($str){
		$temp=array('默认不填','您父亲的姓名是','您母亲的年龄是','您配偶的名字是','您配偶的生日是');
		foreach($temp as $value){
			if($str==$value){
				$selected='selected="selected"';
			}else{
				$selected='';
			}
			$html .='<option value="'.$value.'" '.$selected.'>'.$value.'</option>';
		}
		return $html;
	}
	private function showFace1($str){
		$temp=range(1,9);
		foreach ($temp as $key=>$value){
			$temp[$key]='0'.$value.'.gif';
		}
		foreach($temp as $value){
			if($str==$value){
				$selected='selected="selected"';
			}else{
				$selected='';
			}
			$html .='<option value="'.$value.'" '.$selected.'>'.$value.'</option>';
		}
		return $html;
	}
	private function showFace2($str){
		$temp=range(10,24);
		foreach ($temp as $key=>$value){
			$temp[$key]=$value.'.gif';
		}
		foreach($temp as $value){
			if($str==$value){
				$selected='selected="selected"';
			}else{
				$selected='';
			}
			$html .='<option value="'.$value.'" '.$selected.'>'.$value.'</option>';
		}
		return $html;
	}

}




?>