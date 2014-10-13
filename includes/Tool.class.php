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
class Tool{
	static public function alertLocation($_info,$_rul){
		if(empty($_info)){
			echo  "<script type='text/javascript'>location.href='$_rul';</script>";
		}
		echo "<script type='text/javascript'>alert('$_info');location.href='$_rul';</script>";
		exit();
	}
	//返回关闭
	static public function alertClose($_info){
		echo "<script type='text/javascript'>alert('$_info');close();</script>";
		exit();
	}
	//权限控制
	static public function premission($str,$info){
		if(!stristr($_SESSION['admin']['premission'], $str))exit('<p style="color:red;text-align:center;">'.$info.'</p>');
	}
	
	//解析数据库信息到html
	static public function html($string){
		return htmlspecialchars_decode($string);
	}
	//当前执行文件名
	static public function fileName(){
		$arr=explode('/', $_SERVER['SCRIPT_NAME']);
		$arr=explode('.', $arr[count($arr)-1]);
		return $arr[0];
	}
	//上传专用
	static public function alertThumbClose($_info,$_path){
		echo "<script>alert('$_info')</script>";
		echo "<script>opener.document.content.thumb.value='$_path'</script>";
		echo "<script>opener.document.content.pic.style.display='block'</script>";
		echo "<script>opener.document.content.pic.src='$_path'</script>";
		echo  "<script>window.close();</script>";
	}
	static public function alertBack($_info){
		echo "<script type='text/javascript'>alert('$_info');history.back();</script>";
		exit();
	}
	static public function unSession(){
		if(session_start()){
			session_destroy();
		}
	}
	//对象数组转字符串专用
	static public function objArrOfStr($obj,$name){
		foreach($obj as $value){
			$_string .=$value->$name.',';
		}
		return mb_substr($_string, 0,mb_strlen($_string,'utf-8')-1,'utf-8');
	}
	//截取固定长度的字符串
	static public function subStr(&$string,$encoding,$end){
		if(mb_strlen($string,$encoding)>$end){
			return $_string=mb_substr($string,0,$end,$encoding).'...';
		}else{
			return $string;
		}
	}
	static public function subStrOfObj(&$arr,$name,$encoding,$end){
		if(is_array($arr)){
			foreach($arr as $value){
				$value->$name=Tool::subStr($value->$name, 'utf-8', $end);
			}
		}
		if(is_object($arr)){
			$arr->$name=Tool::subStr($arr->$name, 'utf-8', $end);
		}
	}

	//将对象中的日期数据转换
	static public function objToDate(&$obj,$name){
		foreach($obj as $value){
			$value->date=date('m-d',strtotime($value->$name));
		}
	}


	static public function mysqlString($_date){

	}
	static public function htmlString($_date){

		if(is_array($_date)){
			$_string=array();
			foreach ($_date as $_key=>$_value){
				$_string[$_key]=Tool::htmlString($_value);
			}
		}elseif(is_object($_date)){
			$_string=(object)null;
			foreach ($_date as $_key=>$_value){
				$_string->$_key=Tool::htmlString($_value);
			}
		}else{
			$_string=htmlspecialchars($_date);
		}
		return $_string;
	}
}




?>