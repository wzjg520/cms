<?php
/*
 * CMS VERSION 1.0 
 * -------------------
 * -------------------
 * COPY. 2012-1013. 
 * WEB :HTTP://jiajun.com 
 * ======================= 
 * AUTHOR:WANG 
 * DATE:2014.3.11
 */
class MainAction extends Action {
	public function __construct(&$_tpl) {
		parent::__construct($_tpl,new VoteModel());
	}
	public function action() {
		$this->getFileCount();
		$this->delCache();
	}
	public function getFileCount() {
		$dirPath = ROOT_PATH . '/cache/';
		$this->_tpl->assign(cacheNum,count(scandir($dirPath))-2);
	}
	public function delCache() {
		if ($_GET ['action'] == 'delCache') {
			$dirPath = ROOT_PATH . '/cache/';
			if (! ! $dh = opendir($dirPath)) {
				while ( ($file = readdir($dh)) !== false ) {
					if (file_exists($dirPath . $file)) @unlink($dirPath . $file);
				}
				closedir($dh);
				Tool::alertLocation('恭喜你，删除成功', 'main.php');
			}
		}
	}
}

?>