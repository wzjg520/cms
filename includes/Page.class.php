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
class Page{
	private $_total;
	private $_pagesize;
	private $_limit;
	private $_page;
	private $_pageNum;
	private $_url;
	private $_bothPage;
	function __construct($_total,$_pagesize=PAGE_SIZE,$_bothPage=3){
		$this->_total=$_total ? $_total : 1;
		$this->_pagesize=$_pagesize;
		$this->_bothPage=$_bothPage;
		$this->_pageNum=ceil($this->_total/$this->_pagesize);
		$this->_page=$this->setPage();
		$this->_url=$this->setUrl();

		$this->_limit=" LIMIT  ".$this->_pagesize*($this->_page-1). ", $this->_pagesize ";
	}
	public function __get($_key){
		return $this->$_key;
	}
	public function setPage(){
		if(isset($_GET['page'])){
			$_page=$_GET['page'];
		}else{
			$_page=1;
		}
		if(!empty($_page)){
			if($_page>0&&$_page<$this->_pageNum){
				return $this->_page=$_page;
			}else{
				return $this->_page=$this->_pageNum;
			}
		}else{
			return $this->_page=1;
		}
	}
	public function setUrl(){
		$_url=$_SERVER['REQUEST_URI'];
		$_par=parse_url($_url);
		if(isset($_par['query'])){
			parse_str($_par['query'],$_query);
			unset($_query['page']);
			$_url=$_par['path'].'?'.http_build_query($_query);
		}
		return $_url;
	}

	public function pageList(){
		$_pageList='';
		for($i=$this->_bothPage;$i>=1;$i--){
			$_page=$this->_page-$i;
			if($_page<1)continue;
			$_pageList .='<a href="'.$this->_url.'&page='.$_page.'">'.$_page.'</a>';
		}

		$_pageList .='<a href="'.$this->_url.'&page='.$this->_page.'" class="index">'.$this->_page.'</a>';
		for($i=1;$i<=$this->_bothPage;$i++){
			$_page=$this->_page+$i;
			if($_page>$this->_pageNum)break;
			$_pageList .='<a href="'.$this->_url.'&page='.$_page.'">'.$_page.'</a>';
		}

		return $_pageList;
	}
	public function indexPage(){
		if($this->_page>$this->_bothPage){
			return '<a href="'.$this->_url.'&page=1">1</a>...';
		}
	}
	public function endPage(){
		if($this->_page<$this->_pageNum-$this->_bothPage){
			return '...<a href="'.$this->_url.'&page='.$this->_pageNum.'">'.$this->_pageNum.'</a>';
		}
	}
	public function prevPage(){
		if($this->_page==1){
			return '<span class="disable">上一页</span>';
		}
			return '<a href="'.$this->_url.'&page='.($this->_page-1).'">上一页</a>';
	}
	public function nextPage(){
		if($this->_page==$this->_pageNum){
			return '<span class="disable">下一页</span>';
		}
		return '<a href="'.$this->_url.'&page='.($this->_page+1).'">下一页</a>';
	}
	public function pageShow(){
		$_page ='';
		$_page .=$this->indexPage();
		$_page .=$this->pageList();
		$_page .=$this->endPage();
		$_page .=$this->prevPage();
		$_page .=$this->nextPage();

		return $_page;
	}
}





?>