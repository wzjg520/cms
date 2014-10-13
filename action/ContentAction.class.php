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
class ContentAction extends Action{
	public function __construct(&$_tpl){
		parent::__construct($_tpl,new ContentModel());

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
		$this->_tpl->assign('current','文档列表');
		$this->_tpl->assign('show',true);
		if($_GET['action']=='show'){
			//用于显示是默认全部导航还是子栏目
			if(isset($_GET['id']) && $_GET['id'] != '0'){
				$this->_model->nav=$_GET['id'];
			}else{
				$nav=new NavModel();
				$this->_model->nav=Tool::objArrOfStr($nav->getAllNavId(),'id');
			}
			$this->page($this->_model->getContentCount(),CONTENT_SIZE);
			$result=$this->_model->getAllLimitContent();
			foreach($result as $value){
				$value->title=Tool::subStr($value->title, 'utf-8', 15);
			}
			$this->_tpl->assign('allNav',$result);
			$this->_tpl->assign('navList',$this->shownav());
		}
	}
	private function add(){
		$this->_tpl->assign('add',true);
		$this->_tpl->assign('current','新增文档');
		if(!empty($_POST['send'])){
			$this->validateAdd();
			$this->_model->addContent() ? Tool::alertLocation('新增成功','?action=add') : Tool::alertBack('新增失败');
		}
		$this->_tpl->assign('navList',$this->shownav());
		$this->_tpl->assign('author',$_SESSION['admin']['admin_user']);

	}

	private function update(){
		//提交修改
		if(isset($_POST['send'])){
			$this->validateAdd();
			$this->_model->id=$_POST[id];
			$this->_model->updateContent() ? Tool::alertLocation('修改成功',$_POST['prev_url']) : Tool::alertBack('修改失败');
			exit;
		}

		//用于显示
		if(isset($_GET['id'])){
			$this->_tpl->assign('update',true);
			$this->_tpl->assign('current','修改文档');
			$this->_model->id=$_GET['id'];
			$content=$this->_model->getOneContent();
			if(empty($content))Tool::alertBack('执行出错');
			$this->_tpl->assign('navList',$this->shownav($content->nav));
			$this->_tpl->assign('id',$content->id);
			$this->_tpl->assign('title',$content->title);
			$this->_tpl->assign('attr',$this->showAttr($content->attr));
			$this->_tpl->assign('tag',$content->tag);
			$this->_tpl->assign('keyword',$content->keyword);
			$this->_tpl->assign('thumb',$content->thumb);
			$this->_tpl->assign('source',$content->source);
			$this->_tpl->assign('author',$content->author);
			$this->_tpl->assign('info',$content->info);
			$this->_tpl->assign('content',$content->content);
			$this->_tpl->assign('count',$content->count);
			$this->_tpl->assign('gold',$content->gold);
			$this->_tpl->assign('commend',$this->showCommend($content->commend));
			$this->_tpl->assign('sort',$this->showSort($content->sort));
			$this->_tpl->assign('readLimit',$this->showReadLimit($content->readLimit));
			$this->_tpl->assign('color',$this->showColor($content->color));
			$this->_tpl->assign('prev_url',PREV_URL);
		}else{
			Tool::alertBack('非法操作');
		}
	}
	private function delete(){
		if($_GET['id']){
			$this->_model->id=$_GET['id'];
		}else{
			Tool::alertBack('获得Id出错');
		};
		$this->_model->deleteContent() ? Tool::alertLocation('删除文档成功', PREV_URL) :Tool::alertBack('删除文档失败 ');
	}
	private function showColor($str){
		$temp=array('默认颜色'=>'','红色'=>'red','蓝色'=>'blue','绿色'=>'green','橘色'=>'orange');
		foreach($temp as $key=>$value){
			if($str==$value){
				$selected='selected="selected"';
			}else{
				$selected='';
			}
			$html .='<option style="color:'.$value.'"value="'.$value.'" '.$selected.'>'.$key.'</option>';
		}
		return $html;
	}
	private function showReadLimit($str){
		$temp=array('开放浏览'=>0,'初级会员'=>1,'中级会员'=>2,'高级会员'=>3,'VIP会员'=>4);
		foreach($temp as $key=>$value){
			if($str==$value){
				$selected='selected="selected"';
			}else{
				$selected='';
			}
			$html .='<option value="'.$value.'" '.$selected.'>'.$key.'</option>';
		}
		return $html;
	}
	private function showSort($str){
		$temp=array('默认排序'=>0,'置顶一天'=>1,'置顶一周'=>2,'置顶一月'=>3,'置顶一年'=>4);
		foreach($temp as $key=>$value){
			if($str==$value){
				$selected='selected="selected"';
			}else{
				$selected='';
			}
			$html .='<option value="'.$value.'" '.$selected.'>'.$key.'</option>';
		}
		return $html;
	}
	//用于下拉菜单的nav列表
	private function shownav($navId=0){
		$nav=new NavModel();
		$all_nav=$nav->getFrontNav();
		foreach($all_nav as $result){
			$html .="<optgroup label=\"$result->nav_name\">\r\n";
			$nav->_pid=$result->id;
			if(!!$all_child_nav=$nav->getAllChildrenNav()){
				foreach($all_child_nav as $result){
					if($navId==$result->id){
						$select='selected="selected" ';
					}else{
						$select='';
					}
					$html .="<option ".$select."value=".$result->id.">$result->nav_name</option>\r\n";
				}
			}
			$html .= "</optgroup>";
		}
		return $html;
	}
	private function showCommend($str){
		$temp=array('允许评论'=>1,'禁止评论'=>0);
		foreach($temp as $key=>$value){
			if($str==$value){
				$checked='checked="checked"';
			}else{
				$checked='';
			}
			$html .='<input type="radio" '.$checked.' name="commend" value="'.$value.'"/>'.$key;
		}
		return $html;
	}
	private function showAttr($attr){
		$temp=array('头条','推荐','加粗','跳转');
		$attrPost=explode(',', $attr);
		foreach($temp as $value){
			if(in_array($value, $attrPost)){
				$checked='checked="checked"';
			}else{
				$checked='';
			}
			$html .='<input type="checkbox" '.$checked.' name="attr[]" value="'.$value.'"/>'.$value;
		}
		return $html;
	}
	private function validateAdd(){
		if(Validate::checkNull($_POST['title']))Tool::alertBack('标题不得为空');
		if(Validate::checkLength($_POST['title'], 50, max))Tool::alertBack('标题长度不得大于50位');
		if(Validate::checkNull($_POST['nav']))Tool::alertBack('请选择一个栏目');
		if(Validate::checkLength($_POST['tag'], 30, max))Tool::alertBack('标签长度不得大于30位');
		if(Validate::checkLength($_POST['keyword'], 30, max))Tool::alertBack('关键字长度不得大于30位');
		if(Validate::checkLength($_POST['source'], 20, max))Tool::alertBack('文章来源长度不得大于20位');
		if(Validate::checkLength($_POST['info'], 200, max))Tool::alertBack('简介长度不得大于200位');
		if(Validate::checkNull($_POST['keyword']))Tool::alertBack('详细内容不得大于为空');
		if(Validate::checkNum($_POST['count']))Tool::alertBack('浏览量必须是数字');
		if(Validate::checkNum($_POST['gold']))Tool::alertBack('金币数必须是数字');

		if(!empty($_POST['attr'])){
			$this->_model->attr=implode(',',$_POST['attr']);
		}else{
			$this->_model->attr='无';
		}
		$this->_model->title=$_POST['title'];
		$this->_model->nav=$_POST['nav'];
		$this->_model->tag=$_POST['tag'];
		$this->_model->keyword=$_POST['keyword'];
		$this->_model->thumb=$_POST['thumb'];
		$this->_model->source=$_POST['source'];
		$this->_model->author=$_POST['author'];
		$this->_model->info=$_POST['info'];
		$this->_model->content=$_POST['content'];
		$this->_model->commend=$_POST['commend'];
		$this->_model->count=$_POST['count'];
		$this->_model->sort=$_POST['sort'];
		$this->_model->readlimit=$_POST['readlimit'];
		$this->_model->color=$_POST['color'];
	}
}




?>