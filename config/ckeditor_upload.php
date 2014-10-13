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
if(isset($_FILES['upload']['tmp_name'])){
	$_upload= new UploadFile('upload',$_POST['MAX_FILE_SIZE']);
	$_ckefn = $_GET['CKEditorFuncNum'];
	$_path = $_upload->getPath();
	$_thumb=new Image($_path);
	$_thumb->thumbCkeditor(650,0);
	$_thumb->outImage();
	echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($_ckefn,\"$_path\",'图片上传成功！');</script>";
	exit();
}else{
	Tool::alertBack('警告：未知错误');
}






?>
