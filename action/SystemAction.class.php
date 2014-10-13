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
//系统控制器类
class SystemAction extends Action{
	public function __construct(&$_tpl){
		parent::__construct($_tpl,new SystemModel());

	}
	//业务流程控制器
	public function action(){
		$this->show();
		$this->updateSystem();
	}
	//show
	private function show(){
		$system=$this->_model->getSystem();
		$this->_tpl->assign('system',$system);
	}
	private function updateSystem(){
		if($_POST['send']){
			$this->_model->webname=$_POST['webname'];
			$this->_model->page_size=$_POST['page_size'];;
			$this->_model->upload_dir=$_POST['upload_dir'];;
			$this->_model->content_size=$_POST['content_size'];;
			$this->_model->nav_size=$_POST['nav_size'];;
			$this->_model->new_commend=$_POST['new_commend'];;
			$this->_model->ro_time=$_POST['ro_time'];;
			$this->_model->ro_num=$_POST['ro_num'];;
			$this->_model->adver_num=$_POST['adver_num'];;
			if($this->_model->updateSystem()){
				$br = "\r\n";
				$tab = "\t";
				$system='<?php'.$br;
				$system .='//网站目录'.$br;
				$system .="define('ROOT_PATH', substr(__DIR__,0,-7));".$br;
				$system .="//模板目录".$br;
				$system .="define('TPL_DIR',ROOT_PATH.'/templates/');".$br;
				$system .="//编译文件目录".$br;
				$system .="define('TPL_C_DIR', ROOT_PATH.'/templates_c/');".$br;
				$system .="//缓存文件目录".$br;
				$system .="define('CACHE_DIR', ROOT_PATH.'/cache/');".$br;
				$system .="define('WEBNAME','{$this->_model->webname}');".$br;
				$system .="//定义水印目录".$br;
				$system .="define('WATER_DIR',ROOT_PATH.'/images/water.png');".$br;
				$system .="//上传文件目录".$br;
				$system .="define('UPLOAD_DIR','{$this->_model->upload_dir}');".$br;
				$system .="//定义翻页size".$br;
				$system .="define('PAGE_SIZE',{$this->_model->page_size});".$br;
				$system .="define('CONTENT_SIZE',{$this->_model->content_size});".$br;
				$system .="define('NEW_COMMEND',{$this->_model->new_commend});".$br;
				$system .="//动态开启错误提示".$br;
				$system .="ini_set('display_errors','on');".$br;
				$system .="error_reporting(E_ALL ^ E_NOTICE);".$br.$br;
				
				$system .="//数据库配置信息".$br;
				$system .="define('DB_HOST','localhost');".$br;
				$system .="define('DB_USER', 'root');".$br;
				$system .="define('DB_PASS', '201314');".$br;
				$system .="define('DB_NAME', 'cms');".$br.$br;
				
				$system .="//上一个url".$br;
				$system .="define('PREV_URL',\$_SERVER['HTTP_REFERER']);".$br;
				$system .="//当前url".$br;
				$system .="define('CURRENT_URL','http://'.\$_SERVER['HTTP_HOST'].\$_SERVER['REQUEST_URI']);".$br;
				$system .="//前台显示导航数量".$br;
				$system .="define('NAV_SIZE', {$this->_model->nav_size});".$br;
				$system .="//定义轮播器刷新时间".$br;
				$system .="define('RO_TIME',{$this->_model->ro_time});".$br;
				$system .="//定义轮播器个数".$br;
				$system .="define('RO_NUM', {$this->_model->ro_num});".$br;
				$system .="//定义广告循环条数".$br;
				$system .="define('ADVER_NUM',{$this->_model->adver_num});".$br;
				$system .='?>'.$br;
				if(@!file_put_contents('../config/profile.inc.php', $system)){
					Tool::alertBack('警告生成配置文件出错');
				}
				
				Tool::alertLocation('系统配置成功', 'system.php');
			}else{
				Tool::alertBack('没有数据被修改');
			};
			
		}
	}
	

}




?>