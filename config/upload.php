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
require dirname(__dir__).'/init.inc.php';
if(isset($_FILES['userfile']['tmp_name'])){
	switch($_POST['type']){
		case 'rotatain':
			$width=268;
			$height=193;
			$info='轮播图上传成功';
			break;
		case 'thumb':
			$width=150;
			$height=100;
			$info='缩略图上传成功';
			break;
		case 'adver':
			switch($_POST['size']){
				case '690*80':
					$width=690;
					$height=80;
					$info='头部广告图上传成功';
					break;
				case '270*200':
					$width=270;
					$height=200;
					$info="侧栏广告上传成功";
					break;
					default:
						Tool::alertBack('非法操作');
			}
			break;
		default :
				Tool::alertBack('非法操作');
	}
	$_upload= new UploadFile('userfile',$_POST['MAX_FILE_SIZE']);
	$_path=$_upload->getPath();

	$_thumb=new Image($_path);
	$_thumb->thumb($width, $height);
	$_thumb->outImage();
	Tool::alertThumbClose($info,$_path);
}else{
	Tool::alertBack('警告：未知错误');
}






?>