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
class ValidateCode{
	private $charset='ABCDEFGHJKMNPQRSTUVWXYZabcdefghjkmnpqrstuvwxyz23456789';
	private $code;
	private $codeLen=4;
	private $img;
	private $width=130;
	private $height=50;
	private $fontColor;
	private $fontSize=25;
	private $fontFile;

	public function __construct(){
		$this->fontFile= ROOT_PATH.'/font/COMICI.TTF';
	}
	//生成随机码
	public function createCode(){
		$_code= $this->charset;
		$_len=strlen($_code)-1;
		for($i=0;$i<4;$i++){
			$this->code .=$_code[mt_rand(0,$_len)];
		}
	}
	//生成图像背景
	public function createBg(){
		$this->img=imagecreatetruecolor($this->width, $this->height);
		$_color=imagecolorallocate($this->img, mt_rand(156, 255), mt_rand(156, 255), mt_rand(156, 255));
		imagefilledrectangle($this->img, 0, $this->height, $this->width, 0, $_color);
	}
	//生成文字图形
	public function createFont(){
		$_x=$this->width/$this->codeLen;
		for($i=0;$i<$this->codeLen;$i++){
			$this->fontColor=imagecolorallocate($this->img, mt_rand(0, 155), mt_rand(0, 155), mt_rand(0, 155));
			imagefttext($this->img, $this->fontSize, mt_rand(-30, +30), $_x*$i+mt_rand(3, 8), 35, $this->fontColor, $this->fontFile, $this->code[$i]);
		}
	}
	//生成线条雪花
	public function createLine(){
		for($i=0;$i<100;$i++){
			$_color=imagecolorallocate($this->img, mt_rand(200, 255), mt_rand(200, 255), mt_rand(200, 255));
			imagestring($this->img, mt_rand(1,5), mt_rand(0, $this->width), mt_rand(0, $this->height), '*', $_color);
		}
		for($i=0;$i<6;$i++){
			$_color=imagecolorallocate($this->img, mt_rand(0, 200), mt_rand(0, 200), mt_rand(0, 200));
			imageline($this->img, mt_rand(0, $this->width), mt_rand(0, $this->height), mt_rand(0, $this->width), mt_rand(0, $this->height), $_color);
		}
	}
	//输出图片
	public function outPut(){
		header('Content-type:image/png');
		imagepng($this->img);
		imagedestroy($this->img);
	}
	//生成session
	public function getCode(){
		return $this->code;
	}
	//对外输出接口
	public function showimg(){
		$this->createCode();
		$this->createBg();
		$this->createLine();
		$this->createFont();
		return $this->outPut();
	}


}














?>