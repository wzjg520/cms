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
class NavAction extends Action{
	public function __construct(&$_tpl){
		parent::__construct($_tpl,new NavModel());
	}
	//业务流程控制器
	public function action(){
			switch ($_GET['action']){
				case 'show':
					$this->show();
					break;
				case 'showChildren':
					$this->showChildren();
					break;
				case 'add':
					$this->add();
					break;
				case 'addChildren':
					$this->addChildren();
					break;
				case 'update':
					$this->update();
					break;
				case 'delete':
					$this->delete();
					break;
				case 'sort':
					$this->sort();
					break;
				default:
					exit('非法操作');
			}
	}

	//导航排序
	private function sort(){
		$this->_model->_sort=$_POST["sort"];
		if($this->_model->setNavSort()){
			Tool::alertLocation(null,PREV_URL);
		}else{
			Tool::alertBack('执行出错');
		};
	}

	//show
	private function show(){
		parent::page($this->_model->getNavCount());
		$this->_tpl->assign('current','导航列表');
		$this->_tpl->assign('show',true);
		$_allNav=Tool::htmlString($this->_model->getAllLimitNav());
		$this->_tpl->assign('allNav',$_allNav);
	}
	//显示前台导航
	public function showFront(){
		$this->_tpl->assign('frontNav',$this->_model->getFrontNav());
	}

	private function showChildren(){
		$this->_model->_pid=$_GET['id'];
		parent::page($this->_model->getNavChildrenCount());
		$this->_tpl->assign('current','子导航列表');
		$this->_tpl->assign('showChildren',true);
		$this->_tpl->assign('id',$this->_model->_pid);
		$this->_tpl->assign('nav_name',$_GET['nav_name']);
		$this->_tpl->assign('parentNav',$_GET['nav_name']);
		$this->_tpl->assign('prev_url',PREV_URL);
		$_allNav=Tool::htmlString($this->_model->getAllChildrenLimitNav());
		$this->_tpl->assign('allNav',$_allNav);
	}


	private function add(){
		if(isset($_POST['send'])){
			$_nav_name=$_POST['nav_name'];
			$_nav_info=$_POST['nav_info'];
			if(Validate::checkNull($_nav_name))Tool::alertBack('导航名称不能为空');
			if(Validate::checkLength($_nav_name,20,'max'))Tool::alertBack('导航名称不能大于20位');
			if(Validate::checkLength($_nav_info,200,'max'))Tool::alertBack('导航描述不能大于200位');
			$this->_model->_nav_name=$_nav_name;
			if($this->_model->getOneNav())Tool::alertBack('当前导航已存在');
			$this->_model->_pid=$_POST['pid'];
			$returnUrl=$this->_model->_pid ? "nav.php?action=showChildren&id=".$this->_model->_pid : "nav.php?action=show";
			$this->_model->_nav_info=$_nav_info;

			$this->_model->addNav()?Tool::alertLocation('恭喜你，添加导航成功',$returnUrl):Tool::alertBack('对不起，添加失败');
		}
		$this->_tpl->assign('current','添加导航');
		$this->_tpl->assign('add',true);
	}
	private function addChildren(){
		if(isset($_POST['send'])){
			$this->add();
		}
		$this->_tpl->assign('prev_nav',$_GET['nav_name']);
		$this->_tpl->assign('current','新增子导航');
		$this->_tpl->assign('addChildren',true);
		$this->_tpl->assign('pid',$_GET['id']);
	}
	private function update(){
		if(isset($_POST['send'])){
			if(Validate::checkNull($_POST['nav_name']))Tool::alertBack('导航名称不能为空');
			if(Validate::checkLength($_POST['nav_name'],20,'max'))Tool::alertBack('导航名称不能大于20位');
			if(Validate::checkLength($_POST['nav_info'],200,'max'))Tool::alertBack('导航描述不能大于200位');
			$this->_model->_nav_name=$_POST['nav_name'];
			$this->_model->_nav_info=$_POST['nav_info'];
			$this->_model->_id=$_POST['id'];
			$this->_model->updateNav()?Tool::alertLocation('恭喜你，导航修改成功',$_POST['prev_url']):Tool::alertBack('对不起修改失败');
		}
		if(isset($_GET['id'])){
			$this->_model->_id=$_GET['id'];
			is_object($this->_model->getOneNav())?true:Tool::alertBack('获得关联id出错');
			$this->_tpl->assign('oneNav',$this->_model->getOneNav());
		}else{
			Tool::alertBack('非法操作');
		}
		$this->_tpl->assign('current','修改导航');
		$this->_tpl->assign('update',true);
		$this->_tpl->assign('prev_url',PREV_URL);
	}
	private function delete(){
		if(isset($_GET['id'])){
			$this->_model->_id=$_GET['id'];
			$this->_model->deleteNav()>0 ? Tool::alertLocation('恭喜你，删除成功',PREV_URL) : Tool::alertBack('对不起，删除失败');
		}
		$this->_tpl->assign('current','删除导航');
		$this->_tpl->assign('delete',true);

	}

}




?>