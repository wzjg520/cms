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
class UploadFile{
	private $tmp;
	private $error;
	private $date;
	private $maxSize;
	private $typeArr=array('image/jpeg','image/pjpeg','image/png','image/x-png','image/gif');
	private $type;
	private $path;
	private $today;
	private $linkToday;
	private $linkpath;
	private $fileName;
	private $linkPath;
	public function __construct($_file,$_maxSize){
		$this->error=$_FILES[$_file]['error'];
		$this->type=$_FILES[$_file]['type'];
		$this->tmp=$_FILES[$_file]['tmp_name'];
		$this->path=ROOT_PATH.UPLOAD_DIR;
		$this->linkToday=date('Ymd').'/';
		$this->today=$this->path.$this->linkToday;  		//同一天上传的文件存放的目录
		$this->maxSize=$_maxSize/1024;
		$this->fileName=$_FILES[$_file]['name'];
		$this->checkError();
		$this->checkType();
		$this->checkDir();
		$this->moveFile();
	}
	//移动上传文件到指定目录
	public function moveFile(){
		if(is_uploaded_file($this->tmp)){
			if(!move_uploaded_file($this->tmp, $this->setNewName())){
				Tool::alertBack('上传失败');
			}
		}else{
			Tool::alertBack('临时文件不存在');
		}
	}
	//返回上传文件路径
	public function getPath(){
		$path=$_SERVER['SCRIPT_NAME'];
		$dir=dirname(dirname($path));
		if($dir=='\\')$dir='/';
		$this->linkpath=$dir.$this->linkpath;
		return $this->linkpath;
	}
	//重命名上传文件
	public function setNewName(){
		$nameArr=explode('.', $this->fileName);
		$type=$nameArr[count($nameArr)-1];
		$newFileName=date('YmdHis').mt_rand(100, 1000).'.'.$type;
		$this->linkpath=UPLOAD_DIR.$this->linkToday.$newFileName;
		return $this->today.$newFileName;
	}

	//检测上传目录
	public function checkDir(){
		if(!is_dir($this->path) || !is_writeable($this->path)){
			if(!mkdir($this->path)){
				Tool::alertBack('主目录创建失败');
			}
		}
	if(!is_dir($this->today) || !is_writeable($this->today)){
			if(!mkdir($this->today)){
				Tool::alertBack('子目录创建失败');
			}
		}
	}
	public function checkError(){
		if(!empty($this->error)){
			switch($this->error){
				case 1:
					Tool::alertBack('警告：上传超过了约定最大值');
					break;
				case 2:
					Tool::alertBack('警告：上传超过了'.$this->maxSize.'KB');
					break;
				case 3:
					Tool::alertBack('警告：文件只有部分被上传');
					break;
				case 4:
					Tool::alertBack('警告：文件没有被上传');
					break;
				default:
					Tool::alertBack('未知错误');
			}
		}
	}
	public function checkType(){
		if(!in_array($this->type,$this->typeArr)){
			Tool::alertBack('对不起，该文件不属于规定的上传文件格式');
		}
	}

}




?>