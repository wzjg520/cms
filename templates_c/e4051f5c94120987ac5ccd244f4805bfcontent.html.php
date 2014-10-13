<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="../style/admin.css" type="text/css"/>
<script type="text/javascript" src="../js/admin_content.js"></script>
<script type="text/javascript" src="../ckeditor/ckeditor.js"></script>
<title><?php echo $this->_vars['webname']?></title>
</head>

<body id="main">
	<div class="map">
		内容管理&gt;&gt;查看文档列表&gt;&gt;<strong style="color:green;" id="title"><?php echo $this->_vars['current']?></strong>
	</div>
	<ol>
		<li><a href="content.php?action=show" class="selected">文档列表</a></li>
		<li><a href="content.php?action=add">新增文档</a></li>
		<?php if($this->_vars['update']){ ?>
			<li><a href="content.php?action=update">修改文档</a></li>
		<?php }?>
	</ol>
	<?php if($this->_vars['add']){ ?>
		<form name="content" method="post" action="?action=add">
				<table class="table content">
						<tr><th>发布一条新文档</th></tr>
						<tr><td>文档标题：<input type="text" class="text" name="title"/><span style="color:red;">[ 必填 ]</span> (* 2到50位)</td></tr>
						<tr><td>栏　　目：<select name="nav"><option value="">请选择这一个栏目类别</option><?php echo $this->_vars['navList']?></select><span style="color:red;">[ 必填 ]</span></td></tr>
						<tr><td>定义属性：<input type="checkbox" name="attr[]" value="头条"/>头条
													  <input type="checkbox" name="attr[]" value="推荐"/>推荐
													  <input type="checkbox" name="attr[]" value="加粗"/>加粗
													  <input type="checkbox" name="attr[]" value="跳转"/>跳转
						</td></tr>
						<tr><td>标　　签：<input type="text" class="text" name="tag"/> (* 必须以','隔开)</td></tr>
						<tr><td>关 键 字：<input type="text" class="text" name="keyword"/></td></tr>
						<tr><td>缩 略 图：<input type="text" class="text" name="thumb" readonly="readonly"/>　<input type="button" value="选择" onclick="centerWindow(500,200)"/>
																<img name="pic" alt="缩略图" style="display:none"/>
						</td></tr>
						<tr><td>文章来源：<input type="text" class="text" name="source"/></td></tr>
						<tr><td>作　　者：<input type="text" class="text" name="author" value="<?php echo $this->_vars['author']?>"/></td></tr>
						<tr><td><span style="vertical-align:40px">内容摘要：</span><textarea name="info"></textarea></td></tr>
						<tr class="ckeditor"><td><textarea class="ckeditor" id="TextArea1" name="content"></textarea></td></tr>
						<tr><td>评论选项：<input type="radio" name="commend" value="1"/>允许评论
													  <input type="radio" name="commend" value="1"/>禁止评论
													  浏览次数：<input type="text" name="count" class="text small" value="100"/>
						</td></tr>
						<tr><td>文档排序：<select name="sort">
															<option>默认排序</option>
															<option>置顶一天</option>
															<option>置顶一周</option>
															<option>置顶一月</option>
															<option>置顶一年</option>
													  </select>
													  消费金币：<input name="gold" type="text" value="0" class="text small"/>
						</td></tr>
						<tr><td>阅读权限：<select name="readlimit">
														<option>开放浏览</option>
														<option>初级会员</option>
														<option>中级会员</option>
														<option>高级会员</option>
														<option>VIP会员</option>
													  </select>
									 标题颜色：<select name="color">
									 					<option>默认颜色</option>
									 					<option style="red">红色</option>
									 					<option style="color:yellow">黄色</option>
									 					<option style="color:green">绿色</option>
									 				 </select>
						</td></tr>
						<tr><td>发布新文档：<input type="submit" value="发布文档" name="send" onclick="return checkContent()"/> 重置：<input type="reset" value="重置"/></td></tr>
						<tr><td></td></tr>

				</table>
		</form>
	<?php }?>
	<?php if($this->_vars['delete']){ ?>
	 '删除页面'
	<?php }?>
	<?php if($this->_vars['update']){ ?>
		<form name="content" method="post" action="?action=update">
		<input type="hidden" value="<?php echo $this->_vars['id']?>" name="id"/>
		<input type="hidden" value=<?php echo $this->_vars['prev_url']?> name="prev_url"/>
				<table class="table content">
						<tr><th>发布一条新文档</th></tr>
						<tr><td>文档标题：<input type="text" class="text" value="<?php echo $this->_vars['title']?>"name="title"/><span style="color:red;">[ 必填 ]</span> (* 2到50位)</td></tr>
						<tr><td>栏　　目：<select name="nav"><option value="">请选择这一个栏目类别</option><?php echo $this->_vars['navList']?></select><span style="color:red;">[ 必填 ]</span></td></tr>
						<tr><td>定义属性：<?php echo $this->_vars['attr']?>
						</td></tr>
						<tr><td>标　　签：<input type="text" class="text" name="tag" value="<?php echo $this->_vars['tag']?>"/> (* 必须以','隔开)</td></tr>
						<tr><td>关 键 字：<input type="text" class="text" name="keyword" value="<?php echo $this->_vars['keyword']?>"/></td></tr>
						<tr><td>缩 略 图：<input type="text" class="text" name="thumb" readonly="readonly" value="<?php echo $this->_vars['thumb']?>"/>　<input type="button" value="选择" onclick="centerWindow(500,200)"/>
																<img name="pic" alt="缩略图" style="display:none"/>
						</td></tr>
						<tr><td>文章来源：<input type="text" class="text" name="source" value="<?php echo $this->_vars['source']?>"/></td></tr>
						<tr><td>作　　者：<input type="text" class="text" name="author" value="<?php echo $this->_vars['author']?>"/></td></tr>
						<tr><td><span style="vertical-align:40px">内容摘要：</span><textarea name="info"><?php echo $this->_vars['info']?></textarea></td></tr>
						<tr class="ckeditor"><td><textarea class="ckeditor" id="TextArea1" name="content"><?php echo $this->_vars['content']?></textarea></td></tr>
						<tr><td>评论选项：<?php echo $this->_vars['commend']?>
													  浏览次数：<input type="text" name="count" class="text small" value="<?php echo $this->_vars['count']?>"/>
						</td></tr>
						<tr><td>文档排序：<select name="sort">
															<?php echo $this->_vars['sort']?>
													  </select>
													  消费金币：<input name="gold" type="text" value="<?php echo $this->_vars['gold']?>" class="text small"/>
						</td></tr>
						<tr><td>阅读权限：<select name="readlimit">
														<?php echo $this->_vars['readLimit']?>
													  </select>
									 标题颜色：<select name="color">
									 					<?php echo $this->_vars['color']?>
									 				 </select>
						</td></tr>
						<tr><td>修改文档：<input type="submit" value="修改文档" name="send" onclick="return checkContent()"/> 重置：<input type="reset" value="重置"/></td></tr>
						<tr><td></td></tr>

				</table>
		</form>
	<?php }?>

	<?php if($this->_vars['show']){ ?>
	<table cellspacing="0" class="table">
		<tr><th>编号</th><th>标题</th><th>属性</th><th>文档类别</th><th>浏览次数</th><th>发布时间</th><th>操作</th></tr>
		<?php if($this->_vars['allNav']){ ?>
		<?php foreach($this->_vars['allNav'] as $key=>$value){?>
			<tr>
					<td><script>document.write(<?php echo $key+1;?>+<?php echo $this->_vars['num']?>)</script></td>
					<td><a href="../details.php?id=<?php echo $value->id;?>" title=<?php echo $value->t;?> target="_bank"><?php echo $value->title;?></a></td>
					<td><?php echo $value->attr;?></td>
					<td><a href="?action=show&id=<?php echo $value->nav;?>" title=""><?php echo $value->nav_name;?></a></td>
					<td><?php echo $value->count;?></td>
					<td><?php echo $value->date;?></td>
					<td>[ <a href="?action=update&id=<?php echo $value->id;?>">修改</a> ][ <a href="?action=delete&id=<?php echo $value->id;?>" onclick="return confirm('你真的要删除吗')?true:false">删除</a> ]</td>
			</tr>
		<?php }?>
		<?php }else{?>
				<tr><td colspan="7">暂时没有数据</td></tr>
		<?php }?>
	</table>
	<div id="page">
			<?php echo $this->_vars['page']?>
			<form action="?" method="get">
			<input type="hidden" name="action" value="show"/>
				<select name="id">
					<option value="0" >默认全部</option><?php echo $this->_vars['navList']?>
				</select>
				<input type="submit" value="查询" name="send"/>

			</form>
	</div>
	<?php }?>

</body>



</html>