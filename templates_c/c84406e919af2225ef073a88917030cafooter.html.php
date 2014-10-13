<div id="link">
	<h2><span><a href="friendlink.php?action=show">所有链接</a> | <a href="friendlink.php?action=add">申请加入</a></span>友情链接</h2>
	<?php if($this->_vars['textlink']){ ?>
				<ul>
				<?php foreach($this->_vars['textlink'] as $key=>$value){?>
					<li><a href="<?php echo $value->weburl;?>" target="_blank"><?php echo $value->webname;?></a></li>
				<?php }?>
				</ul>
			<?php }else{?>
			<p>暂时没有数据</p>
	<?php }?>
	
	<?php if($this->_vars['logolink']){ ?>
			
		<?php foreach($this->_vars['logolink'] as $key=>$value){?>
		<dl>
			<dd><a href="<?php echo $value->weburl;?>" target="_blank" ><img src="<?php echo $value->logourl;?>" alt="<?php echo $webname;?>" title="<?php echo $webname;?>"/></a></dd>
		</dl>
		<?php }?>
			
	<?php }else{?>
		<p>暂时没有数据</p>
	<?php }?>


</div>
<div id="footer">
	<p>Powered by <a href="#" target="_bank"> YC60.COM</a> (C) 2004-2011 DesDev Inc.</p>
	<p>Copyright (C) 2004-2011 YC60CMS. <a href="#" target="_bank">瓢城Web俱乐部</a> 版权所有</p>
</div>