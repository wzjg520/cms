<?php
/*
 * CMS VERSION 1.0 ---------------------------------------- COPY	2012-1013 WEB :HTTP://jiajun.com ======================= AUTHOR:WANG DATE:2014.3.11
 */
// 获取目录中的最大文件
// $all_file=array();
// function get_max_file($dir){
// $list=scandir($dir); //后的当前目录文件列表
// foreach($list as $file){
// $file_localtion=$dir.'/'.$file;
// if(is_dir($file_localtion) && $file !='.' && $file!='..'){
// get_max_file($file_localtion);
// }elseif($file_localtion){
// if($file !='.' && $file !='..'){
// $GLOBALS['all_file'][$file_localtion]=filesize($file_localtion);
// }
// }
// }
// }
// get_max_file('./');
// arsort($all_file);
// $max_file=array_slice($all_file, 0,10); //返回值为截取 的一小段
// var_dump($max_file);
function parstr($str) {
	$search = array ("'<script[^>]*?>.*?</script>'si", "'<[\/\!]*?[^<>]*?>'si", "'([\r\n])[\s]+'", "'&(quot|#34);'i", "'&(amp|#38);'i", "'&(lt|#60);'i", "'&(gt|#62);'i", "'&(nbsp|#160);'i", "'&(iexcl|#161);'i", "'&(cent|#162);'i", "'&(pound|#163);'i", "'&(copy|#169);'i", "'&#(\d+);'e","'\n'" );

	$replace = array ("", "", "\\1", "\"", "&", "<", ">", " ", chr ( 161 ), chr ( 162 ), chr ( 163 ), chr ( 169 ), "chr(\\1)","" );

	return $text = preg_replace ( $search, $replace, $str );
}

?>
