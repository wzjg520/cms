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
class Templates{
	//接收变量
	private $_vars=array();
	//保存系统变量
	private $_config=array();
	//保存缓存类
	private $_cache;
	//判断各目录是否存在
	function __construct($_cache){
		if(!is_dir(TPL_DIR) || !is_dir(TPL_C_DIR) || !is_dir(CACHE_DIR)){
			exit('error:模板目录或者编译目录或者缓存目录不存在请手工设置');
		}
		//保存系统变量
		$_sxe=simplexml_load_file(ROOT_PATH.'/config/profile.xml');
		$_tagLab=$_sxe->xpath('/root/taglib');
		foreach ($_tagLab as $_tag){
			$this->_config["$_tag->name"]=$_tag->value;
		}
		$this->_cache=$_cache;
	}
	
	//用于注入模板参数
	public function assign($_var,$_value){
		if(isset($_var)&&!empty($_var)){
			$this->_vars["$_var"]=$_value;
		}else{
			exit('error:请设置模板变量');
		}
	}
	//加载缓存并阻断
	public function cache($_file){
		$_tpl=$this;
		$_tplFile=TPL_DIR.$_file;
		if(!empty($_SERVER['QUERY_STRING']))$_file_query=$_file.$_SERVER['QUERY_STRING'];
		//编译文件
		$_parFile=TPL_C_DIR.md5($_file).$_file.'.php';
		//缓存文件
		$_cacheFile=CACHE_DIR.md5($_file_query).$_file_query.'.php';
		//当第二次载入相同的文件时直接载入之前的缓存文件
		if(IS_CACHE && !$this->_cache->noCache()){
			if(file_exists($_cacheFile)&&file_exists($_parFile)){
				if(filemtime($_parFile)>=filemtime($_tplFile)&&filemtime($_cacheFile)>=filemtime($_parFile)){
					include $_cacheFile;
					exit;
				}
			}
		}
	}
	//显示方法
	public function display($_file){
		$_tpl=$this;
		$_tplFile=TPL_DIR.$_file;
		//判断模板文件是否存在
		if(!file_exists($_tplFile)){
			exit('error:'.$_file.'模板文件不存在');
		}
		if(!empty($_SERVER['QUERY_STRING']))$_file_query=$_file.$_SERVER['QUERY_STRING'];
			//编译文件
			$_parFile=TPL_C_DIR.md5($_file).$_file.'.php';
			//缓存文件
			$_cacheFile=CACHE_DIR.md5($_file_query).$_file_query.'.html';

		//当第二次载入相同的文件时直接载入之前的缓存文件
		if(IS_CACHE && !$this->_cache->noCache()){
			if(file_exists($_cacheFile)&&file_exists($_parFile)){
				if(filemtime($_parFile)>=filemtime($_tplFile)&&filemtime($_cacheFile)>=filemtime($_parFile)){
					include $_cacheFile;
					return;
				}
			}
		}
		//当编译文件不存在，或模板文件被修改过时执行生成编译文件
		if(!file_exists($_parFile) || filemtime($_parFile)<filemtime($_tplFile)){
			//引入模板解析类
			include ROOT_PATH.'/includes/Parser.class.php';
			//传入模板文件
			$_parser=new Parser($_tplFile);
			//生成编译文件
			$_parser->compile($_parFile);
		}
		//载入编译文件
		include $_parFile;
		if(IS_CACHE){
			//获取缓冲区内的文件并且创建缓存文件
			file_put_contents($_cacheFile, ob_get_contents());
			//清楚缓冲区
			ob_end_clean();
			//载入缓存文件
			include $_cacheFile;
		}
	}
	//不生成缓存的显示方法用于插入模板
	public function create($_file){
		$_tplFile=TPL_DIR.$_file;
		//判断模板文件是否存在
		if(!file_exists($_tplFile)){
			exit('error:模块模板文件不存在');
		}
		//编译文件
		$_parFile=TPL_C_DIR.md5($_file).$_file.'.php';
		//当编译文件不存在，或模板文件被修改过时执行生成编译文件
		if(!file_exists($_parFile) || filemtime($_parFile)<filemtime($_tplFile)){
			//引入模板解析类
			require_once  ROOT_PATH.'/includes/Parser.class.php';
			//传入模板文件
			$_parser=new Parser($_tplFile);
			//生成编译文件
			$_parser->compile($_parFile);
		}
		//载入编译文件
		include $_parFile;
	}

}




?>