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
//等级实体类
class ContentModel extends Model{
	private $title;
	private $nav;
	private $attr;
	private $tag;
	private $keyword;
	private $thumb;
	private $source;
	private $author;
	private $info;
	private $content;
	private $commend;
	private $count;
	private $gold;
	private $sort;
	private $readlimt;
	private $color;
	private $date;
	private $_limit;
	private $id;
	//拦截器
	public function __set($_key,$_value){
		$this->$_key=$_value;
	}
	public function __get($_key){
		return $this->$_key;
	}
	//点击刷新量
	public function setContentCount(){
		$_sql="UPDATE cms_content SET count=count+1 WHERE id='{$this->id}'";
		return parent::adu($_sql);
	}
	public function getOneContentInfo(){
		$_sql="SELECT title,info FROM cms_content WHERE id='{$this->id}'";
		return parent::one($_sql);
	}

	//获得评论最多的前20条文档
	public function getTwentyContent(){
		$_sql="SELECT
									c.title,
									c.id
					FROM
									cms_content c

				ORDER BY
									(SELECT COUNT(*) FROM cms_commend d WHERE d.cid=c.id)
					DESC
						LIMIT 20";
		return parent::all($_sql);
	}
	//获得本月热点
	public function getMonthHot(){
		$_sql="SELECT
									title,
									id,
									date,
									count
						FROM
									cms_content
					WHERE
									MONTH(NOW())=DATE_FORMAT(date,'%c')
				ORDER BY
									count
						DESC
							LIMIT 7";
		return parent::all($_sql);
	}
	//获得本月最高评论的文档
	public function getMonthHotCommend(){
		$_sql="SELECT
								c.title,
								c.id,
								c.date
						FROM
								cms_content c
				WHERE
								MONTH(NOW())=DATE_FORMAT(c.date,'%c')
				ORDER BY
								(SELECT COUNT(*) FROM cms_commend d WHERE d.cid=c.id)
						DESC
					LIMIT 7";
		return parent::all($_sql);
	}
	//获得本月最高点击量图文并茂文章
	public function getMonthHotPic(){
		$_sql="SELECT
									title,
									id,
									date,
									thumb
						FROM
									cms_content
					WHERE
									MONTH(NOW())=DATE_FORMAT(date,'%c')
					AND
									thumb<>''
				ORDER BY
									count
						DESC
							LIMIT 4";
		return parent::all($_sql);
	}
	//特别推荐
	public function getMonthRec(){
		$_sql="SELECT
									title,
									id,
									date
					FROM
									cms_content
					WHERE
									attr
						LIKE
									'%推荐%'
						AND
									MONTH(NOW())=DATE_FORMAT(date,'%c')
						LIMIT
									7";
		return parent::all($_sql);
	}
	//获得1条头条
	public function getNewTop(){
		$_sql="SELECT
									title,
									id,
									info
					FROM
									cms_content
					WHERE
									attr
						LIKE
									'%头条%'
						LIMIT 1";
		return parent::one($_sql);
	}
	//获得4条头条
	public function getTopList(){
		$_sql="SELECT
									title,
									id
					FROM
									cms_content
					WHERE
									attr
						LIKE
									'%头条%'
						LIMIT 1,4";
		return parent::all($_sql);
	}
	//获得4条主导航
	public function getMainList(){
		$_sql="SELECT nav_name,id FROM cms_nav WHERE pid=0 ORDER BY sort ASC LIMIT 4";
		return parent::all($_sql);
	}
	//获取最新的10条数据
	public function getNewList(){
		$_sql="SELECT title,id,date FROM cms_content ORDER BY date DESC LIMIT 10";
		return parent::all($_sql);
	}
	//获得本月本类推荐排行榜
	public function getMonthNavRec(){
		$_sql="SELECT
								title,
								id,
								date
					FROM
								cms_content
				WHERE
								attr
					LIKE
								'%推荐%'
					AND
								MONTH(NOW())=DATE_FORMAT(date,'%c')
					AND
								nav
					IN
								($this->nav)
				ORDER BY
								date
						DESC
						LIMIT 10
				";
		return parent::all($_sql);
	}
	//获取本月本类热点排行榜
	public function getMonthNavHot(){
		$_sql="SELECT
									c.title,
									c.id,
									c.date
					FROM
									cms_content c
				WHERE
									MONTH(NOW())=DATE_FORMAT(c.date,'%c')
				AND
									c.nav
				IN
									($this->nav)

				ORDER BY
									(SELECT COUNT(*) FROM cms_commend d WHERE d.cid=c.id)
					DESC
						LIMIT 10";
		return parent::all($_sql);
	}
	//获取本月本类热点图文排行榜
	public function getMonthNavPic(){
		$_sql="SELECT
								title,
								date,
								id
					FROM
								cms_content
				WHERE
								MONTH(NOW())=DATE_FORMAT(date,'%c')
					AND
								thumb<>''
					AND
								nav
					IN
								($this->nav)

			ORDER BY
								date
					DESC
				LIMIT 10";
		return parent::all($_sql);
	}
	//获取本类最最新文章
	public function getNewChildList(){
		$_sql="SELECT
								title,
								date,
								id
				FROM
								cms_content
				WHERE
								nav
						IN
								(SELECT id FROM cms_nav WHERE pid=$this->nav)

		ORDER BY
								date
					DESC
					LIMIT 11";
		return parent::all($_sql);
	}
	//获得一条数据
	public function getOneContent(){
		$_sql="SELECT
										c.title,
										c.id,
										c.info,
										c.date,
										c.content,
										c.nav,
										c.thumb,
										c.source,
										c.author,
										c.attr,
										c.tag,
										c.gold,
										c.info,
										c.count,
										c.commend,
										c.sort,
										c.readLimit,
										c.color,
										c.keyword,
										n.nav_name
					FROM
										cms_content c
				LEFT JOIN
										cms_nav n
						ON
										c.nav=n.id
				WHERE
										c.id='$this->id'
						LIMIT 1";
		return parent::one($_sql);

	}

	//获得数据总量用于分页
	public function getContentCount(){
		$_sql="SELECT
									COUNT(*)
						FROM
									cms_content
						WHERE
									nav
								IN
									($this->nav)";
		return parent::total($_sql);
	}
	//获得内容集合
	public function getAllLimitContent(){
		$_sql="SELECT
										c.title,
										c.title t,
										c.id,
										c.info,
										c.date,
										c.nav,
										c.count,
										c.attr,
										c.keyword,
										c.content,
										c.thumb,
										n.nav_name
					FROM
										cms_content c
						LEFT JOIN
										cms_nav n
								ON
										c.nav=n.id
					WHERE
										c.nav
						IN
										($this->nav)
					ORDER BY
										c.date
						DESC
										$this->_limit";
		return parent::all($_sql);
	}
	//获得标题搜索总条数
	public function getTitleContentCount(){
		$_sql="SELECT COUNT(1) FROM cms_content WHERE title LIKE '%{$this->title}%'";
		return parent::total($_sql);
	}
	//获得关键字搜索总条数
	public function getKeywordContentCount(){
		$_sql="SELECT COUNT(1) FROM cms_content WHERE keyword LIKE '%{$this->keyword}%'";
		return parent::total($_sql);
	}
	//获得TAG搜索总条数
	public function getTagContentCount(){
		$_sql="SELECT COUNT(1) FROM cms_content WHERE tag LIKE '%{$this->tag}%'";
		return parent::total($_sql);
	}
	//获得标题搜索内容集合
	public function getAllLimitTitleContent(){
		$_sql="SELECT
						c.title,
						c.title t,
						c.id,
						c.info,
						c.date,
						c.nav,
						c.count,
						c.attr,
						c.keyword,
						c.content,
						c.thumb,
						n.nav_name
				FROM
						cms_content c
			LEFT JOIN
						cms_nav n
					ON
						c.nav=n.id
				WHERE
						c.title LIKE'%{$this->title}%'
			ORDER BY
						c.date
				DESC
						$this->_limit";
		return parent::all($_sql);
	}
	//获得关键字搜索内容集合
	public function getAllLimitKeywordContent(){
		$_sql="SELECT
					c.title,
					c.title t,
					c.id,
					c.info,
					c.date,
					c.nav,
					c.count,
					c.attr,
					c.keyword,
					c.content,
					c.thumb,
					n.nav_name
			FROM
					cms_content c
		LEFT JOIN
					cms_nav n
			ON
					c.nav=n.id
			WHERE
					c.keyword LIKE '%{$this->keyword}%'
		ORDER BY
					c.date
			DESC
					$this->_limit";
		return parent::all($_sql);
	}
	//获得TAG搜索内容集合
	public function getAllLimitTagContent(){
		$_sql="SELECT
						c.title,
						c.title t,
						c.id,
						c.info,
						c.date,
						c.nav,
						c.count,
						c.attr,
						c.keyword,
						c.content,
						c.thumb,
						n.nav_name
				FROM
						cms_content c
			LEFT JOIN
						cms_nav n
				ON
						c.nav=n.id
				WHERE
						c.tag LIKE '%{$this->tag}%'
			ORDER BY
						c.date
				DESC
						$this->_limit";
		return parent::all($_sql);
	}
	//删除文档
	public function deleteContent(){
		$_sql="DELETE FROM cms_content WHERE id='$this->id'";
		return parent::adu($_sql);
	}
	//修改文档
	public function updateContent(){
		$_sql="UPDATE
								cms_content
						SET
											title='$this->title',
											nav='$this->nav',
											attr='$this->attr',
											tag='$this->tag',
											keyword='$this->keyword',
											thumb='$this->thumb',
											source='$this->source',
											author='$this->author',
											info='$this->info',
											content='$this->content',
											commend='$this->commend',
											count='$this->count',
											gold='$this->gold',
											sort='$this->sort',
											readlimit='$this->readlimit',
											color='$this->color',
											date=NOW()
								WHERE
											id='$this->id'

				";
		return parent::adu($_sql);
	}
	//新增文档
	public function addContent(){
		$_sql="INSERT INTO
											cms_content(
																	title,
																	nav,
																	attr,
																	tag,
																	keyword,
																	thumb,
																	source,
																	author,
																	info,
																	content,
																	commend,
																	count,
																	gold,
																	sort,
																	readlimit,
																	color,
																	date
																)
												VALUES(
																	'$this->title',
																	'$this->nav',
																	'$this->attr',
																	'$this->tag',
																	'$this->keyword',
																	'$this->thumb',
																	'$this->source',
																	'$this->author',
																	'$this->info',
																	'$this->content',
																	'$this->commend',
																	'$this->count',
																	'$this->gold',
																	'$this->sort',
																	'$this->readlimit',
																	'$this->color',
																	NOW()

																)";
		return parent::adu($_sql);
	}



}




?>