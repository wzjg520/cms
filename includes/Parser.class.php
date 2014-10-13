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
//模板解析类
class Parser{
	//用于保存模板内容
	private $_tpl;
	//获取模板文件里面的内容
	public function __construct($_tplFile){
		if(!$this->_tpl=file_get_contents($_tplFile)){
			exit('error:读取模板文件出错');
		}
	}
	//解析普通变量
	private function parVer(){
		$_patten='/\{\$([\w]+)([\w\-\>\+]*)\}/';
		if(preg_match($_patten,$this->_tpl)){
			$this->_tpl=preg_replace($_patten, "<?php echo \$this->_vars['$1']$2?>",$this->_tpl);
		}
	}
	//解析if语句
	private function parIf(){
		$_pattenIf='/\{if\s+\$([\w]+)\}/';
		$_pattenElse='/\{else\}/';
		$_pattenEndIf='/\{\/if\}/';;
		if(preg_match($_pattenIf, $this->_tpl)){
			if(preg_match($_pattenEndIf, $this->_tpl)){
				$this->_tpl=preg_replace($_pattenIf, "<?php if(\$this->_vars['$1']){ ?>", $this->_tpl);
				if(preg_match($_pattenElse, $this->_tpl)){
					$this->_tpl=preg_replace($_pattenElse, "<?php }else{?>", $this->_tpl);
				}
				$this->_tpl=preg_replace($_pattenEndIf, "<?php }?>", $this->_tpl);
			}else{
				echo 'error:if标签没有封闭';
			}
		}
	}
	//解析iff语句 用于内层循环
	private function parIff(){
		$_pattenIf='/\{iff\s+\@([\w\-\>]+)\}/';
		$_pattenElse='/\{else\}/';
		$_pattenEndIf='/\{\/iff\}/';;
		if(preg_match($_pattenIf, $this->_tpl)){
			if(preg_match($_pattenEndIf, $this->_tpl)){
				$this->_tpl=preg_replace($_pattenIf, "<?php if(\$$1){ ?>", $this->_tpl);
				if(preg_match($_pattenElse, $this->_tpl)){
					$this->_tpl=preg_replace($_pattenElse, "<?php }else{?>", $this->_tpl);
				}
				$this->_tpl=preg_replace($_pattenEndIf, "<?php }?>", $this->_tpl);
			}else{
				echo 'error:if标签没有封闭';
			}
		}
	}
	//解析foreach语句
	private function parForeach(){
		$_pattenForeach='/\{foreach\s+\$([\w]+)\(([\w]+),([\w]+)\)\}/';
		$_pattenEndForeach='/\{\/foreach\}/';
		$_pattenVar='/\{@([\w]+)([\w\-\>\+]*)\}/';
		if(preg_match($_pattenForeach, $this->_tpl)){
			if(preg_match($_pattenEndForeach, $this->_tpl)){
				$this->_tpl=preg_replace($_pattenForeach,"<?php foreach(\$this->_vars['$1'] as \$$2=>\$$3){?>", $this->_tpl);
				$this->_tpl=preg_replace($_pattenEndForeach,"<?php }?>", $this->_tpl);
				if(preg_match($_pattenVar, $this->_tpl)){
					$this->_tpl=preg_replace($_pattenVar,"<?php echo \$$1$2;?>", $this->_tpl);
				}
			}else {
				exit('error:foreach标签未封闭');
			}
		}

	}
	//解析foreach语句用于内层循环
	private function parFor(){
		$_pattenForeach='/\{for\s+\@([\w\-\>]+)\(([\w]+),([\w]+)\)\}/';
		$_pattenEndForeach='/\{\/for\}/';
		$_pattenVar='/\{@([\w]+)([\w\-\>\+]*)\}/';
		if(preg_match($_pattenForeach, $this->_tpl)){
			if(preg_match($_pattenEndForeach, $this->_tpl)){
				$this->_tpl=preg_replace($_pattenForeach,"<?php foreach(\$$1 as \$$2=>\$$3){?>", $this->_tpl);
				$this->_tpl=preg_replace($_pattenEndForeach,"<?php }?>", $this->_tpl);
				if(preg_match($_pattenVar, $this->_tpl)){
					$this->_tpl=preg_replace($_pattenVar,"<?php echo \$$1$2;?>", $this->_tpl);
				}
			}else {
				exit('error:foreach标签未封闭');
			}
		}

	}
	//解析include语句
	private function parInclude(){
		$_pattenInclude='/\{include\s+file=(\"|\')([\w\-\.\/]+)(\"|\')\}/';
		if(preg_match_all($_pattenInclude, $this->_tpl,$_file)){
			foreach($_file[2] as $_value){
				if(!file_exists('templates/'.$_value)){
					exit('error:包含文件出错'.$_value);
				}
			}
			$this->_tpl=preg_replace($_pattenInclude,"<?php \$_tpl->create('$2')?>", $this->_tpl);
		}

	}
	//php代码注释
	private function parCommon(){
		$_patten='/\{#\}(.*)\{#\}/';
		if(preg_match($_patten, $this->_tpl)){
			$this->_tpl=preg_replace($_patten, "<?php /*$1*/?>", $this->_tpl);
		}
	}
	//解析系统变量
	private function parConfig(){
		$_patten='/<!--\{([\w\-\.]+)\}-->/';
		if(preg_match($_patten, $this->_tpl)){
			$this->_tpl=preg_replace($_patten, "<?php echo \$this->_config['$1'];?>", $this->_tpl);
		}
	}

	//生成编译文件
	public function compile($_parFile){
		$this->parVer();
		$this->parIf();
		$this->parIff();
		$this->parFor();
		$this->parForeach();
		$this->parInclude();
		$this->parCommon();
		$this->parConfig();


		if(!file_put_contents($_parFile,$this->_tpl)){
			exit('error:生成编译文件出错');
		}
	}

}




?>