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
class RotatainAction extends Action{
	public function __construct(&$_tpl){
		parent::__construct($_tpl,new RotatainModel());

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
				case 'xml':
					$this->xml();
					break;
				default:
					exit('非法操作');
			}
	}
	//show
	private function show(){
		parent::page($this->_model->getRotatainCount());
		$this->_tpl->assign('current','轮播器列表');
		$this->_tpl->assign('show',true);
		$rotatain=$this->_model->getAllLimitRotatain();
		foreach($rotatain as $value){
			if(empty($value->state)){
				$value->state='[ <span class="red">否</span> ][ <a href="?action=state&id='.$value->id.'&type=ok">确定</a> ]';
			}else{
				$value->state='[ <span class="green">是</span> ][ <a href="?action=state&id='.$value->id.'&type=cancel">取消</a> ]';
			}
		}
		Tool::subStrOfObj($rotatain, 'title', 'utf-8', 20);
		$this->_tpl->assign('allRotatain',$rotatain );
	}
	private function add(){
		if(isset($_POST['send'])){
			if(Validate::checkNull($_POST['link']))Tool::alertBack('链接不能为空');
			if(Validate::checkLength($_POST['title'],20,'max'))Tool::alertBack('标题不能大于20位');
			if(Validate::checkLength($_POST['info'],200,'max'))Tool::alertBack('描述不能大于200位');
			$this->_model->title=$_POST['title'];
			$this->_model->pic=$_POST['thumb'];
			$this->_model->info=$_POST['info'];
			$this->_model->link=$_POST['link'];
			$this->_model->state=$_POST['state'] ? $_POST['state'] : 0;
			$this->_model->addRotatain()?Tool::alertLocation('恭喜你，添加轮播图成功','?action=show'):Tool::alertBack('对不起，添加轮播图失败');
		}
		$this->_tpl->assign('current','新增轮播器');
		$this->_tpl->assign('add',true);
	}
	private function update(){
		if(isset($_POST['send'])){
			if(Validate::checkNull($_POST['link']))Tool::alertBack('链接不能为空');
			if(Validate::checkLength($_POST['title'],20,'max'))Tool::alertBack('标题不能大于20位');
			if(Validate::checkLength($_POST['info'],200,'max'))Tool::alertBack('描述不能大于200位');
			$this->_model->title=$_POST['title'];
			$this->_model->pic=$_POST['thumb'];
			$this->_model->info=$_POST['info'];
			$this->_model->link=$_POST['link'];
			$this->_model->id=$_POST['id'];
			$this->_model->state=$_POST['state'] ? $_POST['state'] : 0;
			$this->_model->updateRotatain() ? Tool::alertLocation('恭喜你，修改成功',$_POST['prev_url']):Tool::alertBack('对不起修改失败');
		}
		if(isset($_GET['id'])){
			$this->_model->id=$_GET['id'];
			is_object($this->_model->getOneRotatain())?true:Tool::alertBack('获得关联id出错');
			$oneRotatain=$this->_model->getOneRotatain();
			if(empty($oneRotatain->state)){
				$oneRotatain->state='<input type="radio" name="state" value="1"/>是<input type="radio" checked="checked" name="state" value="0"/>否';
			}else{
				$oneRotatain->state='<input type="radio"  checked="checked" name="state" value="1"/>是<input type="radio" name="state" value="0"/>否';
			}
			$this->_tpl->assign('oneRotatain',$oneRotatain);
			$this->_tpl->assign('id',$_GET['id']);
			$this->_tpl->assign('prev_url',PREV_URL);
		}else{
			Tool::alertBack('非法操作');
		}
		$this->_tpl->assign('current','轮播器修改');
		$this->_tpl->assign('update',true);
		$this->_tpl->assign('prev_url',PREV_URL);
	}
	private function state(){
		if(isset($_GET['action']) && $_GET['action']=='state'){
			if($_GET['type']=='ok'){
				$this->_model->id=$_GET['id'];
				$this->_model->setRotatainOk() ? Tool::alertLocation(null, PREV_URL) : Tool::alertBack('修改失败');
			}
			if($_GET['type']=='cancel'){
				$this->_model->id=$_GET['id'];
				$this->_model->setRotatainCancel() ? Tool::alertLocation(null, PREV_URL) : Tool::alertBack('修改失败');
			}
		}else{
			Tool::alertBack('非法操作');
		}
	}
	//用于生成前台轮播器配置xml
	private function xml(){
		$newRotatain=$this->_model->getNewRotatain();
		$xml .='<?xml version="1.0" encoding="utf-8"?>';
		$xml .='<bcaster autoPlayTime="'.RO_TIME.'">';
		if($newRotatain){
			foreach($newRotatain as $value){
				$xml .='<item item_url="'.$value->pic.'"  link="'.$value->link.'"  itemtitle=""></item>'."\r\n";
			};
		}
		$xml .='</bcaster>'."\r\n";
		$sxe=new SimpleXMLElement($xml);
		$sxe->asXML('../bcastr.xml');
		Tool::alertLocation('恭喜生成轮播器成功', '?action=show');

	}
	private function delete(){
		if(isset($_GET['id'])){
			$this->_model->id=$_GET['id'];
			if(!$this->_model->getOneRotatain())Tool::alertBack('该轮播图不存在');
			$this->_model->deleteRotatain() ? Tool::alertLocation('恭喜你，删除成功','?action=show') : Tool::alertBack('对不起，删除失败');
		}
	}

}




?>