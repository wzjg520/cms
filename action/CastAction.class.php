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
class CastAction extends Action{
	public function __construct(&$_tpl) {
		parent::__construct($_tpl,new VoteModel());
	}
	public function action(){

		$this->setVoteCount();
		$this->getVote();

	}
	private function getVote(){
		$caption=$this->_model->getVoteItem()->title;
		$option=$this->_model->getVote();
		$VoteSum=$this->_model->getVoteSum()->c;
		$width=400;
		if($option){
			$i=1;
			foreach($option as $value){
				$value->percent=@round($value->count/$VoteSum * 100,2).'%';
				$value->picnum=$i;
				$value->picwidth=@round(($value->count/$VoteSum) * $width, 2);
				$i++;
			}
		}

		$this->_tpl->assign('caption',$caption);
		$this->_tpl->assign('option',$option);
		$this->_tpl->assign('width',$width);

	}
	private function setVoteCount(){
		if(isset($_POST['send'])){
			if($_COOKIE['ip']==$_SERVER['REMOTE_ADDR']){
				if(time()-$_COOKIE['time']<86400)Tool::alertClose('请勿重复投票');
			}
			if(empty($_POST['vote']))Tool::alertClose('请选择一个项目');
			$this->_model->id=$_POST['vote'];
			$this->_model->setVoteCount();
			setcookie('ip',$_SERVER['REMOTE_ADDR']);
			setcookie('time',time());
			Tool::alertLocation('投票成功', 'cast.php');
		}
	}
}




?>