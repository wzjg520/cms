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
class AdverAction extends Action{
	public function __construct(&$_tpl){
		parent::__construct($_tpl,new AdverModel());

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
				case 'text':
					$this->text();
					break;
				case 'sidebar':
					$this->sidebar();
					break;
				case 'header':
					$this->header();
					break;
				default:
					exit('非法操作');
			}
	}
	//show
	private function show(){
		parent::page($this->_model->getAdverCount());
		$this->_tpl->assign('current','广告列表');
		$this->_tpl->assign('show',true);
		if(isset($_POST['kind'])){
			if(empty($_POST['kind'])){
				$this->_model->kind='1,2,3';
			}else{
				$this->_model->kind=$_POST['kind'];

			}
		}else{
			$this->_model->kind='1,2,3';
		}
		$adver=$this->_model->getAllLimitAdver();
		foreach($adver as $value){
			if(empty($value->state)){
				$value->state='[ <span class="red">否</span> ][ <a href="?action=state&id='.$value->id.'&type=ok">确定</a> ]';
			}else{
				$value->state='[ <span class="green">是</span> ][ <a href="?action=state&id='.$value->id.'&type=cancel">取消</a> ]';
			}
			switch ($value->type){
				case '1':
					$value->type='文字广告';
					break;
				case '2':
					$value->type='头部广告';
					break;
				case '3':
					$value->type='侧栏广告';
					break;
					default:
						Tool::alertBack('非法操作');
			}
		}
		Tool::subStrOfObj($adver, 'title', 'utf-8', 20);
		Tool::subStrOfObj($adver, 'link', 'utf-8', 30);
		$this->_tpl->assign('adver',$adver );
	}
	private function add(){
		if(isset($_POST['send'])){
			if(Validate::checkNull($_POST['link']))Tool::alertBack('链接不能为空');
			if(Validate::checkLength($_POST['title'],20,'max'))Tool::alertBack('标题不能大于20位');
			if(Validate::checkLength($_POST['info'],200,'max'))Tool::alertBack('描述不能大于200位');
			$this->_model->title=$_POST['title'];
			$this->_model->pic=$_POST['thumb'];
			$this->_model->type=$_POST['type'];
			$this->_model->info=$_POST['info'];
			$this->_model->link=$_POST['link'];
			$this->_model->state=$_POST['state'] ? $_POST['state'] : 0;
			$this->_model->addAdver()?Tool::alertLocation('恭喜你，添加广告成功','?action=show'):Tool::alertBack('对不起，添加广告失败');
		}
		$this->_tpl->assign('current','新增广告');
		$this->_tpl->assign('add',true);
	}
	private function update(){
		if(isset($_POST['send'])){
			if(Validate::checkNull($_POST['link']))Tool::alertBack('链接不能为空');
			if(Validate::checkLength($_POST['title'],20,'max'))Tool::alertBack('标题不能大于20位');
			if(Validate::checkLength($_POST['info'],200,'max'))Tool::alertBack('描述不能大于200位');
			$this->_model->title=$_POST['title'];
			$this->_model->pic=$_POST['thumb'];
			$this->_model->type=$_POST['type'];
			$this->_model->info=$_POST['info'];
			$this->_model->link=$_POST['link'];
			$this->_model->id=$_POST['id'];
			print_r($_POST);
			$this->_model->state=$_POST['state'] ? $_POST['state'] : 0;
			$this->_model->updateAdver() ? Tool::alertLocation('恭喜你，修改成功',$_POST['prev_url']):Tool::alertBack('对不起修改失败');
		}
		if(isset($_GET['id'])){
			$this->_model->id=$_GET['id'];
			is_object($this->_model->getOneAdver())?true:Tool::alertBack('获得关联id出错');
			$oneAdver=$this->_model->getOneAdver();
			if(empty($oneAdver->state)){
				$oneAdver->state='<input type="radio" name="state" value="1"/>是<input type="radio" checked="checked" name="state" value="0"/>否';
			}else{
				$oneAdver->state='<input type="radio"  checked="checked" name="state" value="1"/>是<input type="radio" name="state" value="0"/>否';
			}
				switch($oneAdver->type){
					case '1':
						$oneAdver->type1='checked="checked"';
						$oneAdver->picStyle='style="display:none"';
						break;
					case '2':
						$oneAdver->type2='checked="checked"';
						$oneAdver->picStyle='style="display:block"';
						$oneAdver->up="<input type=\"button\" value=\"选择\" onclick=\"centerWindow('../config/upfile.php?type=adver&size=690*80','上传',500,200)\"/>";
						break;
					case '3':
						$oneAdver->type3='checked="checked"';
						$oneAdver->picStyle='style="display:block"';
						$oneAdver->up="<input type=\"button\" value=\"选择\" onclick=\"centerWindow('../config/upfile.php?type=adver&size=270*200','上传',500,200)\"/>";
						break;

				}
				if(empty($oneAdver->state)){
					$oneAdver->state='<input type="radio" name="state" value="1"/>是<input type="radio" checked="checked" name="state" value="0"/>否';
				}else{
					$oneAdver->state='<input type="radio"  checked="checked" name="state" value="1"/>是<input type="radio" name="state" value="0"/>否';
				}
				//var_dump($oneAdver);
			$this->_tpl->assign('oneAdver',$oneAdver);
			$this->_tpl->assign('id',$_GET['id']);
			$this->_tpl->assign('prev_url',PREV_URL);
		}else{
			Tool::alertBack('非法操作');
		}
		$this->_tpl->assign('current','广告修改');
		$this->_tpl->assign('update',true);
		$this->_tpl->assign('prev_url',PREV_URL);
	}
	private function state(){
		if(isset($_GET['action']) && $_GET['action']=='state'){
			if($_GET['type']=='ok'){
				$this->_model->id=$_GET['id'];
				$this->_model->setAdverOk() ? Tool::alertLocation(null, PREV_URL) : Tool::alertBack('修改失败');
			}
			if($_GET['type']=='cancel'){
				$this->_model->id=$_GET['id'];
				$this->_model->setAdverCancel() ? Tool::alertLocation(null, PREV_URL) : Tool::alertBack('修改失败');
			}
		}else{
			Tool::alertBack('非法操作');
		}
	}
	//用于生成文字广告js
	private function text(){
		$adver=$this->_model->getNewTextAdver();
		$text="var text=[]\r\n";
		$i=1;
		foreach($adver as $value){
			$text .="text[$i]={\r\n";
			$text .="\ttitle : '$value->title',\r\n";
			$text .="\tlink : '$value->link'\r\n";
			$text .="}\r\n";
			$i++;
		}
		$text .="var i=Math.ceil(Math.random()*5)\r\n";
		$text .="var j=Math.ceil(Math.random()*5)\r\n";
		$text .="if(i==j & i<".(ADVER_NUM-1)."){\r\n";
		$text .="\tj++\r\n";
		$text .="}else if(i==".ADVER_NUM."){\r\n";
		$text .="\tj--\r\n";
		$text .="}\r\n";
		$text .="document.write('<a class=\"adv\" title=\"'+text[i].title+'\" href=\"'+text[i].link+'\">'+text[i].title+'</a><a class=\"adv\" title=\"'+text[j].title+'\" href=\"'+text[j].link+'\">'+text[j].title+'</a>')\r\n";
		if(file_put_contents('../js/text_adver.js', $text))Tool::alertLocation('恭喜生成轮播器成功', '?action=show');
	}
	//生成侧栏广告
	private function sidebar(){
		$adver=$this->_model->getNewSidebarAdver();
		$sidebar="var sidebar=[]\r\n";
		$i=1;
		foreach($adver as $value){
			$sidebar .="sidebar[$i]={\r\n";
			$sidebar .="\ttitle : '$value->title',\r\n";
			$sidebar .="\tlink : '$value->link',\r\n";
			$sidebar .="\tsrc : '$value->pic',\r\n";
			$sidebar .="\tinfo : '$value->info'\r\n";
			$sidebar .="}\r\n";
			$i++;
		}
		$sidebar .="var i=Math.ceil(Math.random()*5)\r\n";
		$sidebar .="var j=Math.ceil(Math.random()*5)\r\n";
		$sidebar .="if(i==j & i<".(ADVER_NUM-1)."){\r\n";
		$sidebar .="\tj++\r\n";
		$sidebar .="}else if(i==".ADVER_NUM."){\r\n";
		$sidebar .="\tj--\r\n";
		$sidebar .="}\r\n";
		$sidebar .="document.write('<a title=\"'+sidebar[i].info+'\" href=\"'+sidebar[i].link+'\"><img src=\"'+sidebar[i].src+'\" alt=\"'+sidebar[i].title+'\"/></a>')\r\n";
		if(file_put_contents('../js/sidebar_adver.js', $sidebar))Tool::alertLocation('恭喜生成轮播器成功', '?action=show');
	}
	//生成头部广告
	private function header(){
		$adver=$this->_model->getNewHeaderAdver();
		var_dump($adver);
		$header="var header=[]\r\n";
		$i=1;
		foreach($adver as $value){
			$header .="header[$i]={\r\n";
			$header .="\ttitle : '$value->title',\r\n";
			$header .="\tlink : '$value->link',\r\n";
			$header .="\tsrc : '$value->pic',\r\n";
			$header .="\tinfo : '$value->info'\r\n";
			$header .="}\r\n";
			$i++;
		}
		$header .="var i=Math.ceil(Math.random()*5)\r\n";
		$header .="var j=Math.ceil(Math.random()*5)\r\n";
		$header .="if(i==j & i<".(ADVER_NUM-1)."){\r\n";
		$header .="\tj++\r\n";
		$header .="}else if(i==".ADVER_NUM."){\r\n";
		$header .="\tj--\r\n";
		$header .="}\r\n";
		$header .="document.write('<a title=\"'+header[i].info+'\" href=\"'+header[i].link+'\"><img src=\"'+header[i].src+'\" alt=\"'+header[i].title+'\"/></a>')\r\n";
		if(file_put_contents('../js/header_adver.js', $header))Tool::alertLocation('恭喜生成轮播器成功', '?action=show');
	}
	private function delete(){
		if(isset($_GET['id'])){
			$this->_model->id=$_GET['id'];
			if(!$this->_model->getOneAdver())Tool::alertBack('该广告图不存在');
			$this->_model->deleteAdver() ? Tool::alertLocation('恭喜你，删除成功','?action=show') : Tool::alertBack('对不起，删除失败');
		}
	}

}




?>