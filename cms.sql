-- phpMyAdmin SQL Dump
-- version 4.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2014-11-06 19:46:18
-- 服务器版本： 5.5.37-log
-- PHP Version: 5.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- 表的结构 `cms_adver`
--

CREATE TABLE IF NOT EXISTS `cms_adver` (
`id` smallint(5) unsigned NOT NULL COMMENT '//id',
  `title` varchar(20) NOT NULL COMMENT '//广告名称',
  `pic` varchar(100) NOT NULL COMMENT '//图片地址',
  `info` varchar(200) NOT NULL COMMENT '//广告描述',
  `link` varchar(40) NOT NULL COMMENT '//链接地址',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '//添加时间',
  `type` tinyint(1) NOT NULL COMMENT '//广告类型',
  `state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '//是否展示'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- 转存表中的数据 `cms_adver`
--

INSERT INTO `cms_adver` (`id`, `title`, `pic`, `info`, `link`, `date`, `type`, `state`) VALUES
(5, '测试广告', 'uploads/20140423/20140423132700647.jpg', '', 'www.baidu.com', '2014-05-04 09:33:10', 3, 1),
(2, '中国人民', 'uploads/20140422/20140422174653755.jpg', '是否启用', 'www.taobao.com', '2014-05-04 09:34:36', 3, 1),
(4, '快好了累死我了', 'uploads/20140422/20140422174805822.jpg', 'justdoit', 'www.yushi528.com', '2014-05-04 09:34:36', 2, 1),
(6, 'happytime工作室成立了', '', '这是我的个人网站', 'www.happytime.com', '2014-04-23 05:42:52', 1, 1),
(7, '新浪开始进军微博大战', '', '新浪开始进军微博大战', 'http://www.weibo.com', '2014-04-23 05:44:05', 1, 1),
(8, '腾讯开始团购系统', '', '腾讯开始团购系统', 'http://www.qq.com', '2014-04-23 05:44:36', 1, 1),
(9, '百度开始进军文学', '', '百度开始进军文学', 'http://www.baidu.com', '2014-04-23 05:45:05', 1, 1),
(10, '淘宝开始做云手机了', '', '淘宝开始做云手机了', 'http://www.taobao.com', '2014-04-23 05:45:35', 1, 1),
(11, '奇虎360开始发威了', '', '奇虎360开始发威了', 'http://www.360.cn', '2014-04-23 06:01:41', 1, 0),
(12, '媳妇', 'uploads/20140423/20140423142727528.jpg', '媳妇带人', 'http://happytime.com', '2014-05-04 09:34:36', 3, 1),
(13, '努力加油', 'uploads/20140423/20140423142852991.jpg', '努力加油', 'http://happytime.com', '2014-05-04 09:34:36', 3, 1),
(14, '我们的梦想', 'uploads/20140423/20140423142930513.jpg', '我们的梦想', 'http://www.360.cn', '2014-05-04 09:34:36', 3, 1),
(15, '侧栏广告', 'uploads/20140423/20140423143017297.jpg', '侧栏广告', 'http://happytime.com', '2014-05-04 09:34:36', 3, 1),
(16, '这期间很重要', 'uploads/20140423/20140423145417317.jpg', '年轻人心高气傲', 'www.taobao.com', '2014-05-05 04:27:04', 2, 1),
(17, '人们的梦想', 'uploads/20140423/20140423150455797.jpg', '差距', 'http://happytime.com', '2014-05-04 09:34:36', 2, 1),
(18, '火大', 'uploads/20140423/20140423150534252.jpg', '士大夫', 'www.taobao.com', '2014-05-04 09:34:36', 2, 1),
(19, '发生的氛围', 'uploads/20140423/20140423150614634.jpg', '士大夫', 'http://happytime.com', '2014-05-04 09:34:36', 2, 1),
(20, '阿斯蒂芬', 'uploads/20140423/20140423150650707.jpg', '士大夫是', 'http://www.360.cn', '2014-05-04 09:34:36', 2, 1);

-- --------------------------------------------------------

--
-- 表的结构 `cms_commend`
--

CREATE TABLE IF NOT EXISTS `cms_commend` (
`id` mediumint(8) unsigned NOT NULL COMMENT '//id',
  `username` varchar(20) NOT NULL COMMENT '//评论者',
  `content` varchar(255) NOT NULL COMMENT '//内容',
  `state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '//状态',
  `manner` tinyint(1) NOT NULL COMMENT '//态度',
  `cid` mediumint(8) unsigned NOT NULL COMMENT '//文档id',
  `support` smallint(6) unsigned NOT NULL COMMENT '//支持率',
  `oppose` smallint(6) unsigned NOT NULL COMMENT '//反对率',
  `date` datetime NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=42 ;

--
-- 转存表中的数据 `cms_commend`
--

INSERT INTO `cms_commend` (`id`, `username`, `content`, `state`, `manner`, `cid`, `support`, `oppose`, `date`) VALUES
(21, '游客', '我一个女性朋友，刚参加工作不久，为了买个苹果手机，现在弄的房租都交不起了，上海房租便宜的都是每人1000多一月，她找我来借钱，我就晕了，我跟她说了现在收入远跟不上支出，她依然盲目消费，典型的月光族，还要负债消费，值得这样吗？', 1, 0, 23, 14, 12, '2011-08-05 20:43:40'),
(22, '蜡笔小新', '不要四五千，不要两三千，只要999元！！！如果你在30分钟内打进电话的话，还可以免费获赠价值50万元的手机套一个！你还在犹豫什么！马上拿起电话吧！对不起，稍等一下，喂，杨总啊，什么！只剩下30部了！您听见了吧！订购异常火爆，买到等于赚到，抓紧时间订购吧！', 1, 1, 23, 11, 14, '2011-08-05 20:44:22'),
(23, '黑崎一护', '宝马奔驰只是税高而已，还有一点苹果手机全是国产组装，就在家门口做出来的手机却要花最贵去买这手机。', 1, 1, 23, 13, 11, '2011-08-05 20:44:56'),
(24, '黑崎一护', '早应该退出了，推出时间太慢了，我98年有各人电脑，用金山10年后开始用360，因为360免费，方便。其实最好是别捆绑，但是给用户方便是最佳的，捆绑产品给我感觉不舒服，360现在捆绑了很多东西，不舒服。我要用什么产品，我要能自己做主，还要方便使用，我就用。', 1, 0, 23, 16, 12, '2011-08-05 20:45:25'),
(26, '游客', '我是做电脑IT的 客观来说360对于维护系统安全方面确实比别的软件做的很好 而且很贴切 非常多的功能 而且使用 （当然只是我的观点，因为很多人不懂的系统维护 但是360提供了免费而且安全的服务 我是表示欢迎的） 当然我也希望其他软件能借鉴360的模式 能够做得更好 我会试用看看的，希望良性竞争！', 1, 0, 23, 40, 15, '2011-08-05 20:47:45'),
(29, '游客', '我来评论一下', 1, 0, 35, 13, 13, '2014-04-13 13:16:55'),
(30, '路飞', '我来了少年', 1, 0, 26, 12, 11, '2014-04-13 14:43:30'),
(31, '路飞', '我来了少年', 1, 0, 23, 12, 10, '2014-04-13 14:44:25'),
(32, '路飞', '我来了少年', 1, 0, 23, 12, 12, '2014-04-13 14:44:36'),
(34, '路飞', '追求技术而又不局限与技术', 1, 0, 23, 11, 12, '2014-04-13 15:14:06'),
(35, '游客', '我一个女性朋友，刚参加工作不久，为了买个苹果手机，现在弄的房租都交不起了，上海房租便宜的都是每人1000多一月，她找我来借钱，我就晕了，我跟她说了现在收入远跟不上支出，她依然盲目消费，典型的月光族，还要负债消费，值得这样吗？', 1, 0, 23, 20, 11, '2014-04-29 17:39:51'),
(36, '游客', '这就是一个纯傻逼 哈哈', 1, 0, 38, 0, 0, '2014-05-02 13:45:23'),
(37, '游客', 'Android平板阵营也正在不断的积攒实力，并不断缩小与 苹果之间的差距。', 0, 0, 38, 0, 0, '2014-05-02 13:48:30'),
(38, '游客', '我来看看哈', 1, 0, 23, 14, 10, '2014-05-06 15:59:39'),
(39, '游客', 'wolaopinglun', 1, 0, 40, 9, 10, '2014-05-11 20:21:32'),
(40, '游客', '我来给个评论', 1, 0, 39, 12, 10, '2014-05-11 20:46:11'),
(41, '游客', 'suwuwwu', 0, 0, 41, 0, 0, '2014-06-15 21:21:01');

-- --------------------------------------------------------

--
-- 表的结构 `cms_content`
--

CREATE TABLE IF NOT EXISTS `cms_content` (
`id` mediumint(8) unsigned NOT NULL COMMENT '//编号',
  `title` varchar(50) NOT NULL COMMENT '//标题',
  `nav` mediumint(8) unsigned NOT NULL COMMENT '//栏目号',
  `attr` varchar(20) NOT NULL COMMENT '//属性',
  `tag` varchar(30) NOT NULL COMMENT '//标签',
  `keyword` varchar(30) NOT NULL COMMENT '//关键字',
  `thumb` varchar(100) NOT NULL COMMENT '//缩略图',
  `source` varchar(20) NOT NULL COMMENT '//文章来源',
  `author` varchar(10) NOT NULL COMMENT '//作者',
  `info` varchar(200) NOT NULL COMMENT '//简介',
  `content` text NOT NULL COMMENT '//详细内容',
  `commend` tinyint(1) NOT NULL DEFAULT '1' COMMENT '//是否允许评论',
  `count` smallint(6) NOT NULL DEFAULT '0' COMMENT '//浏览次数',
  `gold` smallint(6) NOT NULL DEFAULT '0' COMMENT '//消费金币',
  `sort` tinyint(1) NOT NULL DEFAULT '0' COMMENT '//排序',
  `readLimit` tinyint(1) NOT NULL DEFAULT '0' COMMENT '//阅读权限',
  `color` varchar(20) NOT NULL COMMENT '//颜色',
  `date` datetime NOT NULL COMMENT '//发布时间'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- 转存表中的数据 `cms_content`
--

INSERT INTO `cms_content` (`id`, `title`, `nav`, `attr`, `tag`, `keyword`, `thumb`, `source`, `author`, `info`, `content`, `commend`, `count`, `gold`, `sort`, `readLimit`, `color`, `date`) VALUES
(23, '苹果或增1家iPad生产商 确保年内推出iPad3', 27, '头条,推荐,加粗', 'ipad3,平板电脑,苹果', '推出ipad3,增加生产商,苹果', 'uploads/20110719/20110719212422412.jpg', '太平洋电脑网', 'admin', '据国外媒体报道，某台湾业内人士透露，苹果可能会在今年秋季新增一家iPad生产商，现在它的iPad生产商只有富士康一家。据说苹果这么做是为了确保生产出足够数量的第三代iPad，以保证在年内推出第三代iPad。富士康的工厂在5月份发生了爆炸事故，造成了3死15伤的悲剧。为了将生产风险降到最低程度，苹果很可能会再找一家iPad代工厂商。', '<p><span style="font-size:16px"><strong>　　【PConline 新闻】</strong>据国外媒体报道，某台湾业内人士透露，苹果可能会在今年秋季新增一家iPad生产商， 现在它的iPad生产商只有富士康一家。据说苹果这么做是为了确保生产出足够数量的第三代iPad，以保证在年内推出第三代iPad。富士康的工厂在5月 份发生了爆炸事故，造成了3死15伤的悲剧。为了将生产风险降到最低程度，苹果很可能会再找一家iPad代工厂商。</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:center"><span style="font-size:16px"><img alt="" src="/demo/cms/uploads/20110719/20110719212355737.jpg" style="height:375px; width:500px" /></span></p>\r\n\r\n<p><span style="font-size:16px">　　据知情人士透露，最有可能拿到iPad3订单的是广达电脑和和硕联合，而且和硕联合的中标率可能更高一些，因为有消息称它已经接到了苹果iPhone 5的订单。</span></p>\r\n\r\n<p><span style="font-size:16px">　　虽然苹果即将推出的新款iPad很可能是iPad3，但有消息称新款平板电脑并不会替代iPad2，而是扩大苹果的产品库。上周有消息称，新款iPad的显示屏分辨率将达到2048*1536，因此也有人将这款产品称作是&ldquo;iPad HD&rdquo;。</span></p>\r\n\r\n<p><span style="font-size:16px">　　另外，上周也有报道将新款平板电脑称作是&ldquo;iPad 2+&rdquo;，据说有些海外组件厂商已经接到了苹果发出的高端iPad的询价单。</span></p>\r\n\r\n<p><span style="font-size:16px">　　台湾业内人士称，新款iPad将在今年第三季度末或第四季度初的时候发布。预计第三季度所有版本的iPad的总销量将达1300万台。</span></p>\r\n', 0, 1177, 0, 1, 0, 'red', '2014-05-05 11:37:04'),
(24, '摩托XOOM2曝光 新XOOM将支持更高分辨率 ', 29, '头条,推荐', '平板电脑,XOOM', '摩托XOOM2,高分辨率', 'uploads/20110719/20110719212521748.jpg', '太平洋电脑网', 'admin', '今年年初，摩托罗拉推出的第一款搭载蜂巢系统的平板电脑XOOM在平板市场投放了一枚重磅炸弹，但可惜的是这款XOOM并不能算作出色的平板电脑。好在摩托并没有作罢，XOOM还没坐热市场，关于它的继任者XOOM 2的传闻已经风生水起了。上周在FCC上，摩托罗拉再次展现了一款配备LTE技术的平板电脑，关于XOOM 2的更多传闻浮出水面。', '<p>　　<strong>【PConline 资讯】</strong>今年年初，摩托罗拉推出的第一款搭载蜂巢系统的平板电脑XOOM在平板市场投放了一枚 重磅炸弹，但可惜的是这款XOOM并不能算作出色的平板电脑。好在摩托并没有作罢，XOOM还没坐热市场，关于它的继任者XOOM 2的传闻已经风生水起了。上周在FCC上，摩托罗拉再次展现了一款配备LTE技术的平板电脑，关于XOOM 2的更多传闻浮出水面。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:center"><img alt="" src="/demo/cms/uploads/20110719/20110719212552606.jpg" style="height:375px; width:500px" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>　　根据Fudzilla.com的报道，摩托罗拉目前已经开始研发新一代的平板电脑，而且可能已经生产出了数位板的原型。据了解，这款新品将采用拥有 2048x1536分辨率的4：3比例的显示屏，另外，消息显示这款平板电脑明显比XOOM更薄，并会搭载安卓 Ice Cream Sandwich 系统，配备最新的英伟达Kal-El Tegra 3处理器。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:center"><img alt="" src="/demo/cms/uploads/20110719/20110719212611564.jpg" style="height:333px; width:500px" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>　　摩托罗拉的第一款平板电脑的抢先上市并没有使XOOM击败iPad2，反而为后来居上的其他竞争对手铺平了道路。心急的摩托这次不知道会不会重蹈XOOM的覆辙，但唯一肯定的是今年年底摩托罗拉的新品将会露出庐山真面目。</p>\r\n', 1, 202, 0, 0, 0, '', '2014-05-05 11:36:37'),
(25, '宏碁10寸平板销量跃居第二 权威调研机构DisplaySearch的报告显示 仅次于苹果 ', 26, '无', '平板电脑', '宏基,10寸,平板电脑', 'uploads/20110719/20110719212740635.jpg', '太平洋电脑网', 'admin', '近日，权威调研机构DisplaySearch的报告显示，宏碁推出的10.1英寸平板电脑ICONIA TAB A500在全球的出货量已达80万台，居全球10英寸平板电脑市场第二位，仅次于苹果旗下的iPad。', '<p><span style="font-size:16px">　　<strong>【PConline 资讯】</strong>近日，权威调研机构DisplaySearch的报告显示，宏碁推出的10.1英寸平板电脑ICONIA TAB A500在全球的出货量已达80万台，居全球10英寸平板电脑市场第二位，仅次于苹果旗下的iPad。</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:center"><span style="font-size:16px"><img alt="" src="/demo/cms/uploads/20110719/20110719212802847.jpg" style="height:333px; width:500px" /></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:16px">　　对于宏碁在10英寸平板市场上的表现，华尔街日报曾撰文称，宏碁推出的ICONIA TAB A500是消费者寻找iPad替代品的最佳选择。&ldquo;2011年安卓软件商将会推出更多应用软件，使用者不妨购入一台。&rdquo;而本次调查公司Display Search还在报告中指出，&ldquo;由于配备了HDMI和USB接口以及闪存卡插槽，宏碁ICONIA TAB A500平板电脑在易用度上提升很多。&rdquo;</span></p>\r\n\r\n<p><span style="font-size:16px">　 　A500采用了目前Android平板的主流配置，即Android 3.0+NVIDIA Tegra 2 处理器。这样的配置能够将Android在显示分辨率方面的提升良好的展现出来，也能让多任务处理等功能运行更加流畅，在网页浏览和娱乐游戏方面的体验可 谓不俗。而最新升级成Android 3.1之后，USB连结性得到进一步提高，与家庭其它IT产品的互联易用实现了更大拓展，这也是一个系统逐步走向成熟的体现。</span></p>\r\n\r\n<p><span style="font-size:16px">　　此 前，Acer宏碁并没有推出任何Android2.X系统的产品，而是一步到位地推出10英寸的Android3.0平板电脑(目前已升级到 Andoid3.1)。得益于可靠的产品质量、积极的价格策略以及高效的渠道管理，A500能够快速得到消费者认可也是情理之中。这种情况与宏碁在上网本 市场上的表现如出一辙。虽然就目前行业发展态势来看，苹果的优势依然稳固，但以Acer为首的Android平板阵营也正在不断的积攒实力，并不断缩小与 苹果之间的差距。</span></p>\r\n', 1, 267, 0, 0, 0, '', '2014-05-05 12:34:10'),
(26, '设计时尚高效处理 欧恩N5双核平板电脑', 26, '头条,加粗', '平板电脑,双核', '平板电脑,欧恩N5,双核', 'uploads/20110719/20110719212914256.jpg', '太平洋电脑网', 'admin', '欧恩N5是一款任务处理速度极快的A9双核平板电脑，其影像读取速度是普通平板电脑的1倍左右，并可通过内置的“欧翔引擎”，达到普通设备1.5-2倍的读取播放速度。', '<p>　　欧恩N5是一款任务处理速度极快的A9双核<a class="cmsLink" href="http://product.pconline.com.cn/tabletpc/" target="_blank">平板电脑</a>，其影像读取速度是普通平板电脑的1倍左右，并可通过内置的&ldquo;欧翔引擎&rdquo;，达到普通设备1.5-2倍的读取播放速度。此外，该产品内置WIFI和蓝牙两种无线信号传输模式，并支持外接<a class="cmsLink" href="http://tele.pconline.com.cn/td/card/" target="_blank">3G上网卡</a>，获取最佳信号接收，亦可通过所处环境选择上网模式，便于携带，更有利于节省用户上网<a class="cmsLink" href="http://tele.pconline.com.cn/3gcost/" target="_blank">资费</a>。其内置TD800语音视频通话技术和200W像素前置摄像头，支持多种形式的网络视频通话。近日小编了解到这款平板电脑上市价为1980元，性价比十足，有兴趣的朋友不妨多关注一下。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:center"><img alt="" src="/demo/cms/uploads/20110719/20110719213005943.jpg" style="height:283px; width:500px" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>　　欧恩N5是一款任务处理速度极快的平板电脑，外观设计时尚，适用于企业精英白领及节日送礼用户。其采用欧恩独有的&ldquo;欧翔引擎&rdquo;技术，内置高速 Flash，使其具备了超越普通平板电脑的超快程序处理速度。同时，采用TD800视频通话技术，可以享受稳定流畅的视频通话，使朋友、同事间的交流更加 畅通。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:center"><img alt="" src="/demo/cms/uploads/20110719/20110719213014750.jpg" style="height:247px; width:500px" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>　　视频、<a class="cmsLink" href="http://www.pcgames.com.cn/" target="_blank">游戏</a>、 显示预览是欧恩N5最突出的特点。在音视频解码播放方面，欧恩N5可以支持全格式1080p高清视频音频的解码播放。对高清画面的还原效果十分真实，电影 场景的层次感也得到了释放，使平板电脑播放的影片更加富有张力，无限接近影院效果。而且欧恩N5还能通过对屏幕光线的自动调节，减轻使用过程中屏幕对用户 眼睛的刺激，从而缓解长时间使用平板电脑出现的用眼疲劳现象。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>　　在显示预览方面，采用Android 2.2系统的欧恩N5已经能够支持Flash 10.1动态画面播放。动态画面的显示更加流畅，残影、卡帧等现象在测试过程中已经达到了&ldquo;0&rdquo;出现率。并且，在浏览在线视频时，欧恩N5可通过对机器软 硬件的自动微调节，来达到使在线视频加载加速的目的，播放在线视频更加流畅。</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:center"><img alt="" src="/demo/cms/uploads/20110719/20110719213038226.jpg" style="height:322px; width:500px" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>　　在3D游戏效果方面，欧恩N5拥有超灵敏的G重力感应能力，对竞速类游戏的方向操控更加准确灵敏；还集成了为解决传统图像处理过程中进行浮点运 算和多媒体应用程序的瓶颈问题而研究开发的一套全新的指令集，使N5的三维游戏图像生成速度更快、性能更高、视觉效果更逼真、更富娱乐性。</p>\r\n\r\n<p>　　编辑点评：欧恩N5内置&ldquo;欧翔引擎&rdquo;，采用高速Flash，出色的性能表现受到业界众多专业人士的称赞，作为市面上颇受消费者关注的产品之一，现在官方上市价定为1980元，性价比很高，感兴趣的朋友不妨和欧恩的代理商家进行联系。</p>\r\n', 1, 215, 0, 0, 0, '', '2014-05-05 12:33:23'),
(35, 'ThinkPad平板电脑 配“小红帽”传统键盘', 26, '头条,推荐', 'ThinkPad,平板电脑', 'IBM,商务', 'uploads/20110724/20110724144123945.jpg', '太平洋电脑网', 'admin', '等了这么久，终于等来ThinkPad的平板电脑了，这使得最早拥有“Pad”名号的ThinkPad有种实至名归的感觉。目前这款平板在国内还没有发布，我们只能先根据图像先来感性的看一下ThinkPad平板的真面目了。', '<p><span style="font-size:14px">　　<strong>【PConline 资讯】</strong>等了这么久，终于等来ThinkPad的平板电脑了，这使得最早拥有&ldquo;Pad&rdquo;名号的ThinkPad有种实至名归的感觉。目前这款平板在国内还没有发布，我们只能先根据图像先来感性的看一下ThinkPad平板的真面目了。</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p style="text-align:center"><span style="font-size:14px"><img alt="" src="/demo/cms/uploads/20110724/20110724144147683.jpg" style="height:559px; width:500px" /></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style="font-size:14px">经典的黑色设计，商务感浓厚</span></p>\r\n\r\n<p><span style="font-size:14px">　　这款ThinkPad平板电脑依旧符合 Think的商务传统，背面依旧是ABS工程塑料材质，周身以经典的黑色打造，&ldquo;ThinkPad&rdquo;标记在机身一角十分显眼。这款平板采用10.1英寸的 显示屏，支持多点触控，屏幕下方左右两角分别印有lenovo和ThinkPad标志，屏幕正下方是四个导航键。</span></p>\r\n', 1, 1148, 0, 2, 2, 'orange', '2014-05-05 12:34:51'),
(39, '经过一番艰苦的调试本人的Cms终于在自己架设的云服务器上成功了', 27, '头条,推荐,加粗,跳转', '自信,成功,喜悦', '自信,成功,喜悦', '/demo/cms/uploads/20140505/20140505120648637.jpg', '本人亲自撰写', '路飞', '在有限的生命里，能多一些慢下来的时光，日子就会少些羁绊和框约，多些润泽和散淡。然而，在这千帆竞发的时光里，谁又能舍得如此的本钱，放缓寸金寸光阴，悠哉游哉呢。', '<div style="padding: 0px; margin: 0px; font-family: Verdana, Arial, Tahoma; font-size: 14px; line-height: 25px;">&nbsp;在有限的生命里，能多一些慢下来的时光，日子就会少些羁绊和框约，多些润泽和散淡。然而，在这千帆竞发的时光里，谁又能舍得如此的本钱，放缓寸金寸光阴，悠哉游哉呢。</div>\r\n\r\n<div style="padding: 0px; margin: 0px; font-family: Verdana, Arial, Tahoma; font-size: 14px; line-height: 25px;">　　这个时代，人们宛若步入快车道，慢下来不行，稍稍停息更不行。因为人们固守着&ldquo;时间就是金钱，效率就是生命&rdquo;的理念不肯放弃，要争做走在时代最前面的人，无暇停顿，也不敢停顿。</div>\r\n\r\n<div style="padding: 0px; margin: 0px; font-family: Verdana, Arial, Tahoma; font-size: 14px; line-height: 25px;">　　三岁的婴儿，天刚蒙蒙亮，就被母亲从睡梦中唤醒，急匆匆地送往幼儿园，开始了咿咿呀呀学语的一天；上了小学，就郑重其事地踏上了蜕变于龙的路程。一位位天真幼小的生命，走出满堂灌，便要匆匆赶往才艺，书法，数理，写作，健美辅导班。就这样，一个个天使的快乐时光，被无情的剥夺了。打工者，披星戴月超负荷劳作，养家糊口；明星们，南来北往的赶场子，挣银子。还有，一些人终抵不住名与利之诱惑，为了位子，车子，房子，孩子，盘子，甚至裙子。呕心沥血，疲于奔波，苦其心志，劳其筋骨。</div>\r\n\r\n<div style="padding: 0px; margin: 0px; font-family: Verdana, Arial, Tahoma; font-size: 14px; line-height: 25px; text-align: center;"><img alt="" src="/demo/cms/uploads/20140505/20140505120801915.jpg" /></div>\r\n\r\n<div style="padding: 0px; margin: 0px; font-family: Verdana, Arial, Tahoma; font-size: 14px; line-height: 25px;">　　世俗人生，匆匆步履，人们有太多心灵的疲惫，太多的踉跄。可悲的是：我们往往不明了自己脚下所处的方位，不明了自身所承重的极限，不明了自身视线的短浅，只看到了山脉的巍峨，忘记了山径的陡峭与曲折；只看到了丽日春花，忘记了漫漫长夜对一位种子的熬煎；只看到了错落无致的摩天大厦，而忘记了一砖一沙皆辛苦。背负着自以为是的形形色色的行囊，强作一路潇洒的蹒珊，追逐着缥缈无根的梦幻。</div>\r\n\r\n<div style="padding: 0px; margin: 0px; font-family: Verdana, Arial, Tahoma; font-size: 14px; line-height: 25px;">　　在慢不下来的时光里，我们并没有经意，岁月已匆匆远去，悲喜已默默沉淀。关于七情六欲，纵有千言万语，终弄不清是非曲直。阡陌里游走的人们阅尽沧桑萧条后，还能一如既往地绽开笑颜？还能远离惆怅，淡看秋月暮色？还能秉持&ldquo;古今多少事，都付笑谈中&rdquo;的情怀么？</div>\r\n\r\n<div style="padding: 0px; margin: 0px; font-family: Verdana, Arial, Tahoma; font-size: 14px; line-height: 25px;">　　人生，有时很像北极狼一样经不起诱惑，竟不惜付出生命的代价。不懂得，拥有了丽日春花的艳丽，就要失去银装素裹的圣洁。拥有了阑珊夜色的美妙，就要失去阳光绚烂的丽日。为了接踵而来的欲念，人们总是步履匆匆，一往无前。终在一个无限寂寥的夜晚，莅临生命的终点时，蓦然回首，才发现一生太过匆忙，早已忘记了当初为何出发，又为何上路。</div>\r\n\r\n<div style="padding: 0px; margin: 0px; font-family: Verdana, Arial, Tahoma; font-size: 14px; line-height: 25px;">　　在这个步履匆匆的时代，也许，很多人和我一样，铭心的怀恋那没有网络，没有手机，没有轿车，没有霓虹的时代。人们日出而作，日落而息，固守着自己的家园，不去为网络浪潮的澎湃而惊心，不去为未接电话的耽搁而惊恐，也不去为夜色的喧嚣而烦恼。走着自己的道路，想着自己的心事，做着自己的事情，在湛蓝的天空下，每一天都是那样的从容，从容的让人看淡了花开花落，得失更迭，生死枯荣。</div>\r\n\r\n<div style="padding: 0px; margin: 0px; font-family: Verdana, Arial, Tahoma; font-size: 14px; line-height: 25px;">　　春种秋收，颗粒归仓，步入岁月深处，人们迎来了一段闲暇的时光。长者三五成伙，沐浴着温暖的阳光，吸着自产的烟叶，谈论着庄子里的陈年旧事，筹划着盖一座新房，娶一房媳妇，憧憬着未来的旖旎。孩童们秋假刚结束不久又迎来了寒假，在空旷的打谷场游戏着过家家，汗流浃背地打陀螺，把快乐写在脸上，也写在日子上。</div>\r\n\r\n<div style="padding: 0px; margin: 0px; font-family: Verdana, Arial, Tahoma; font-size: 14px; line-height: 25px;">　　良田万顷，日食一升；豪宅万间，夜眠五尺。人生不满百，所需物质区区可数。生命之舟难以承载太多的功名利禄，所有的繁华与荣耀，也只不过是过眼烟云。既然如此，我们为什么不去放慢脚步，还人生一抹</div>\r\n', 0, 156, 0, 0, 0, '绿色', '2014-05-05 12:08:45'),
(40, '夏季女人穿衣', 35, '头条,推荐', '美丽,自信,端庄', '美丽,自信,端庄', '/demo/cms/uploads/20140505/20140505121410130.jpg', '网上采集', '路飞', '春夜望月，那月似莲花，带着清寒的韵致，将清寂铺满大地。此刻，心生一缕愁绪，想问头上春月，为何往事已如烟而去，却有一种惆怅，总是在这午夜梦回时分无法抑制的纠缠？是这轻风如酒的暮色苍穹里，无法掩盖此去经年的离殇，还是忘川河没有从心头流过？', '<p style="text-align: center;"><span style="background-color:rgb(249, 255, 255); font-family:verdana,arial,tahoma; font-size:14px"><img alt="" src="/demo/cms/uploads/20140505/20140505121535169.jpg" /></span><br />\r\n<span style="background-color:rgb(249, 255, 255); font-family:verdana,arial,tahoma; font-size:14px">　　城市万家灯火，往事从每个窗口如蝶飞过，漫无目标的游离，像极了今夜你在天涯的音讯。我想你已经走得很远很远了，远到誓言成空，远到容颜模糊。只是当这春月又上枝头的时候，你的心中还固守着那座温暖的城池吗？而我却继续着那暖色的琉璃梦，飘飘渺渺游离的虚幻中，一次都未曾与你交集。</span><br />\r\n<span style="background-color:rgb(249, 255, 255); font-family:verdana,arial,tahoma; font-size:14px">　　记否，一纸墨香曾经惊动了谁关注的双眸？记否，一场忧伤烟雨，打湿了谁转身离去的背影？</span><br />\r\n<span style="background-color:rgb(249, 255, 255); font-family:verdana,arial,tahoma; font-size:14px">　　也许你不曾知道，当初的绝离并非是我狠心的辜负，奈何那世事的无常，竟无法料到与你的转身便已此去经年。其实，你知与否都已不再重要，念想或者牵挂，都只是今晚春月铺成的青霜。曾因冬天的来临，爱情的中央，没有了原本的春暖花开，一袭清冷禁锢了姻缘在续，那可能也是种宿命。谁会是谁今生的注定，头上的春月终会把一切的美好团圆成清冷的追忆。</span><br />\r\n<span style="background-color:rgb(249, 255, 255); font-family:verdana,arial,tahoma; font-size:14px">　　那些驿站断桥边，那些梧桐更兼细雨的黄昏，那些当初相遇和最后作别的地方，现在想来，不过都是装饰爱情的风景，沿着一些伤感的旧迹，无声的破败。如还能听见我的呼唤，请告诉我，如何才能回到我之初，如何才能让你再一次春心荡漾？空灵的夜里，无助的叩问，回荡在冷冷的长街，唯有风在幽幽回答。</span><br />\r\n<span style="background-color:rgb(249, 255, 255); font-family:verdana,arial,tahoma; font-size:14px">　　冬业已远去，冬云把大半的空白留给了红尘彼岸，我虽还在此，却已改变了仰望的姿态，透过地上斑斑驳驳的树影，在欲盖弥彰的伤歌声中识别你此去经年的天涯。然后默立，然后无语，然后慢慢地如春花凋零。当初不曾想到人生苦短，幸福很浅，因此没有在寒潮来临前画好自己的领地，用一些淡定的颜色来适应转瞬即到的忧伤，以及在厚重冬云里那一份高深莫测的爱情。</span><br />\r\n<span style="background-color:rgb(249, 255, 255); font-family:verdana,arial,tahoma; font-size:14px">　　春月温柔的眼神散布在静静的晚空，像是一幅精致美妙的画卷。而我，穷尽一生也画不成自己的天堂，但我痴想在其中，下笔每处皆是你的容颜。固守或者放弃，不再困扰我的决定，爱情也就只有两个出口，当固守成了一种疾病，需要用放弃来救愈。只是我心已被重新注入的幸福再度填满，又该怎样把完好如初的你藏于此去经年的何处？你盛放也罢，你破败也罢，我都将无助。</span><br />\r\n<span style="background-color:rgb(249, 255, 255); font-family:verdana,arial,tahoma; font-size:14px">　　今夜，春月当空，风拂过你不知何处飘来的一声叹息，我还感微寒，像哪年哪月的一场冬雨，淋湿的一阕无从寄处的伤词。卿本非梅，与冬冷遇，注定是一个无以弥合的错误。冬非春月，给不了你寒冷时需要的一抹暖阳，在季节深处，更是将严寒相逼，哪怕你枯萎，哪怕你在落败中芳消影迹。</span><br />\r\n<span style="background-color:rgb(249, 255, 255); font-family:verdana,arial,tahoma; font-size:14px">　　我无法再将你一如当初的捂暖，只能拜寄头上春月，拱破这冬天的壁垒，把你原本娇弱的身躯，毫无不差的还给春天。此后，山高水长，在你音信全无的岁月里，垒一个独属于我的香丘，感悟浮生，黯然掩埋这场风花雪月之后繁华落尽的经年情事，独坐一隅，彻悟你的菩提。也不知你疼痛之后是否随春又放新颜，更不知你春深之时花落谁家，但我会在春夜望月，遥寄给你一份葱绿的祝福。</span></p>\r\n', 1, 157, 0, 0, 0, '默认颜色', '2014-05-05 12:15:58'),
(41, '向往青春', 36, '加粗', '自由飞翔,美丽花花', '青春的美好', '/demo/cms/uploads/20140508/20140508210551326.jpg', 'goole来源', '花花', '向往美丽和幸福的生活，追求自由', '<p><strong>青春的向往歌词</strong><br />\r\n青春的向往<br />\r\n词曲：晏雨冰<br />\r\n编曲：晏雨冰 林华勇<br />\r\n演唱：许浩<br />\r\n监制：晏雨冰<br />\r\n出品：雨冰工作室（香港）</p>\r\n\r\n<p><img alt="" src="/demo/cms/uploads/20140508/20140508211003826.png" style="height:170px; width:180px" /><br />\r\n<br />\r\n风中的白云倾诉着梦想<br />\r\n繁华的都市有青春在流浪<br />\r\n微凉的清风吹起了我衣裳<br />\r\n怎能够抚平我昨天的沧桑<br />\r\n明媚的春天 花开又树长<br />\r\n纷扰的生活将变得怎样<br />\r\n迷茫的路啊还有多长<br />\r\n付出青春向往七彩的阳光<br />\r\n远方的你是否依然为我朝思暮想<br />\r\n远方的你是否依然为我默默期望<br />\r\n远方的我为了梦想伴着青春流浪<br />\r\n远方的我在街头 找不到自己的行囊<br />\r\n孤单的长夜他还守在身旁<br />\r\n梦中的月亮还挂在心头上<br />\r\n未知的路还要一个人去闯<br />\r\n为了梦想只有让青春流浪<br />\r\n<br />\r\n明媚的春天 花开又树长<br />\r\n纷扰的生活将变得怎样<br />\r\n迷茫的路啊还有多长<br />\r\n付出青春向往七彩的阳光<br />\r\n远方的你是否依然为我朝思暮想<br />\r\n远方的你是否依然为我默默期望<br />\r\n远方的我为了梦想伴着青春流浪<br />\r\n远方的我在街头 找不到自己的行囊<br />\r\n远方的你是否依然为我朝思暮想<br />\r\n远方的你是否依然为我默默期望<br />\r\n远方的我为了梦想伴着青春流浪<br />\r\n远方的我在街头 找不到自己的行囊</p>\r\n', 0, 132, 0, 0, 0, '绿色', '2014-05-08 21:10:36'),
(42, '在水里', 36, '头条,推荐,加粗,跳转', '|成功|喜悦', '商城', '/demo/cms/uploads/20140623/20140623133627557.jpg', '佳君撰写', '路飞', '最近写完了商城项目', '<p><span style="background-color:rgb(249, 255, 255); font-family:verdana,arial,tahoma; font-size:14px">在水里 水，是生命之源。 我懂得饮水思源的道理，这些传统都是老一辈遗传的，我奶奶教会了我很多。 可有些人却敬而远之。从中国传统五行说来讲，每个人从体质、属相，甚至是现在的星座都可以分为金、木、水、火、土。而我，就是属火的，天生得敬水而远之。这些也是她教会的 。 从出生开始成长，漫长而短促的岁月让我时刻都不曾离开水。 我出生在接近腊月的射手座，几近寒冷而并非冰冷的深秋冬初。小孩自然需要保暖，在每个人手里都得裹得严实。从内到外，从外到内，既保暖，也保险。 每户人家的第一个小孩都会格外新鲜和宝贝，何况是独生子女这一类。很幸运，我被宝贝了，却无意地被我爹抱丢了。人呢？这么小却是这么大的一个人呢，怎么会不见了？ 在水里，最后在水里找到我的。实在记不清我是掉到水沟的哪个位置被打捞起来的，我后来看到沟底的淤泥都会不禁意地被呛两下。是水吞噬了我，却也是水放生了我，我活了下来。我爹受到的是无情的数落&hellip;&hellip; 但幸运非人人有之，悲伤却是每个活在这个世界的人都会共享的，因为要离别&hellip;&hellip;羡慕活在精灵国的人，他们是快乐的。 当很多年前那首深情的、动听的《为了谁》每每唱起的时候，我忍不住回望&hellip;&hellip; 整个世界变成了水的世界，是雨水、洪水，是狂野猛兽，这是我眼中的世界。房屋倒塌，有人坠井，有人被洪水泛滥后漂走。以前是家园，以前是稻田，以前是伙伴。此刻在我眼中是空墙废墟，是一片汪洋，是一锅绿豆汤里被稀释后的绿豆，四处漂游和不停张望&hellip;&hellip; 昨天晚上，我们团簇在一块，像是活在小说形容的世界里。风雨交加的夜晚，发生着夜黑风高时该发生的噩梦&hellip;&hellip; 断电不知道多长时间，暴雨不知沥沥下了多少，还要夹杂无情的狂风&hellip;&hellip;电断与不断没有意义，因为它不及闪电的光耀眼和速度。我还幼小，吓得发抖。眼中不远处的景象有可能来到我旁边，万一我们来不及奔走，万一洪水再次汹涌，我们都会死于浩瀚。我们不是去天上浩瀚的星海当神仙，而是被洪水漂白后还无颜地被嫌弃得下地狱&hellip;&hellip;我的印象中，天堂和地狱都是浩瀚的。 所以，我们又成了不幸的、悲伤的、离别的。小时候记忆太模糊，想不起了，写到98年的这里。还有一座和我们一起遭遇灾害的旧桥（我很想叫它&ldquo;古桥&rdquo;，但它并不古老，只是很旧。） 很开心，我们又活了下来。因为我们放不下精彩的人生，放不下美好的年华。所以学会了享受&hellip;&hellip; 12年以后的三甲港，这时初秋的冷胜似常年的深秋。我们一行人不约而同地希望能观望到东海的海上日出。于是在也算半夜的凌晨，我们骑车飞驰华夏路的高架桥下，不时高歌一曲&hellip;&hellip;&ldquo;你知道我在等你吗&hellip;&rdquo; 天还是黑夜的，它用睡眠来迎接太阳眼睛的余光所照耀的朝霞。海浪不是击打海岸线下的石块，就像拍打在我们脸上。还未来得及被海风迅速风干，我们已经是再无困意，清醒地不能再清醒，就连之前的酒气都不见了。我感觉，它还能吹走所有忧愁，在这个时候，还有那对水的微恐惧感也不见了&hellip;&hellip; 搞不清是潮张还是潮退了，天的那边已经有一圈极小的光晕，他们说那就是日出了。 天亮了以后，我们来到一片沙滩，所谓地&ldquo;日光浴&rdquo;也变得高档起来，不能用低俗来形容。还有那鱼池的泡脚，忘了名字的那种鱼酷爱亲吻，会让你的脚爽透了，在拿出水池的那一刻，才会解散掉。 我不爱水，所以也不会游泳。被他们丢下水的前一刻，我紧张地以为不会游泳的人丢在水里是会沉入水底的，可我又惊喜的浮了起来。很爽！我那阴影似乎也消化掉了很多。这一次在海水里玩了很久&hellip;&hellip; 也许，雨水只能带给我厄运，海水才能带给我快乐&hellip;&hellip; 同样也是一个雨水天，我妈摔断了腰骨，许久后康复。 同样也是一个雨水天，我奶奶摔断手骨，接骨后顽强的活跃。 同样也是一个雨水天，我奶奶安详离世，在我最悲伤的那一年。 同样也是一个雨水天，我爹出了车祸祸害了耳朵，至今还有后遗症。 水本来很美，却因为雨水的不祥祸害而不祥。也许是真的，我属火。<img alt="" src="/demo/cms/uploads/20140623/20140623133846742.jpg" style="height:1004px; width:650px" /></span></p>\r\n', 1, 123, 0, 0, 0, '默认颜色', '2014-06-23 13:39:04');

-- --------------------------------------------------------

--
-- 表的结构 `cms_lever`
--

CREATE TABLE IF NOT EXISTS `cms_lever` (
`id` mediumint(8) unsigned NOT NULL COMMENT '//编号',
  `lever_name` varchar(20) NOT NULL COMMENT '//等级名称',
  `lever_info` varchar(200) NOT NULL COMMENT '//等级说明',
  `premission` varchar(50) NOT NULL COMMENT '//权限标示'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- 转存表中的数据 `cms_lever`
--

INSERT INTO `cms_lever` (`id`, `lever_name`, `lever_info`, `premission`) VALUES
(1, '普通管理员', '除了不能操作别的管理员，其他任何后台功能都可以操作。', '2,3,4'),
(2, '超级管理员', '最大的权限，如果只有一个超级管理员的时候，不能删除自己。', '1,2,3,4,5,6,7,8,9,10,11,12,13,14'),
(3, '发帖专员', '可以发表文章及修改和删除文章的权限。', '2,3,4'),
(4, '评论专员', '可以对文章的评论进行回复及删除。', ''),
(5, '会员专员', '只有管理会员的权限，包括新增、删除、修改和查询。', '2,3,4,5'),
(13, '后台游客', '只能访问后台的权限！', '1');

-- --------------------------------------------------------

--
-- 表的结构 `cms_link`
--

CREATE TABLE IF NOT EXISTS `cms_link` (
`id` tinyint(3) unsigned NOT NULL,
  `webname` varchar(20) NOT NULL,
  `weburl` varchar(50) NOT NULL,
  `logourl` varchar(50) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `email` varchar(40) NOT NULL,
  `user` varchar(10) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- 转存表中的数据 `cms_link`
--

INSERT INTO `cms_link` (`id`, `webname`, `weburl`, `logourl`, `state`, `email`, `user`, `type`, `date`) VALUES
(2, '百度', 'http://baidu.com', 'images/baidu.png', 1, 'liyanhong@sina.com', '李彦宏sb', 2, '2014-05-04 09:37:58'),
(3, '百度', 'http://baidu.com', '', 1, 'liyanhong@sina.com', '李彦宏', 1, '2014-04-27 09:11:10'),
(4, '优酷', 'http://www.youku.com', 'images/youku.png', 1, 'liyanhong@sina.com', '王佳君啊', 2, '2014-05-04 09:37:58'),
(5, '腾讯', 'http://www.qq.com', '', 1, 'liyanhong@sina.com', '马化腾', 1, '2014-04-27 09:12:14'),
(6, '淘宝', 'http://www.taobao.com', '', 1, '3492374@qq.com', '马云', 1, '2014-04-27 09:25:19'),
(7, '爱奇艺', 'http://www.aiqiyi.com', '', 1, '23904890@qq.com', '海贼王', 1, '2014-04-27 09:26:23');

-- --------------------------------------------------------

--
-- 表的结构 `cms_manage`
--

CREATE TABLE IF NOT EXISTS `cms_manage` (
`id` mediumint(8) unsigned NOT NULL COMMENT '//编号',
  `admin_user` varchar(20) NOT NULL COMMENT '//管理员账号',
  `admin_pass` char(40) NOT NULL COMMENT '//管理员密码',
  `lever` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '//管理员等级',
  `login_count` smallint(5) NOT NULL DEFAULT '0' COMMENT '//登录次数',
  `last_ip` varchar(20) NOT NULL DEFAULT '000.000.000.000' COMMENT '//最后一次IP',
  `last_time` datetime NOT NULL COMMENT '//最后一次登录时间',
  `reg_time` datetime NOT NULL COMMENT '//注册时间'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=58 ;

--
-- 转存表中的数据 `cms_manage`
--

INSERT INTO `cms_manage` (`id`, `admin_user`, `admin_pass`, `lever`, `login_count`, `last_ip`, `last_time`, `reg_time`) VALUES
(2, '路飞', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, 50, '210.22.137.98', '2014-07-03 11:00:50', '2011-05-18 19:09:52'),
(3, '我叫MT', '7c4a8d09ca3762af61e59520943dc26494f8941b', 1, 0, '000.000.000.000', '0000-00-00 00:00:00', '2011-05-18 19:10:07'),
(4, '樱木花道', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, 0, '000.000.000.000', '0000-00-00 00:00:00', '2011-05-19 17:04:41'),
(5, '赤木晴子', '7c4a8d09ca3762af61e59520943dc26494f8941b', 13, 1, '::1', '2014-05-02 13:29:10', '2011-05-19 17:04:57'),
(6, '樱桃小丸子', '7c4a8d09ca3762af61e59520943dc26494f8941b', 5, 0, '000.000.000.000', '0000-00-00 00:00:00', '2011-05-20 15:50:08'),
(56, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 2, 92, '127.0.0.1', '2011-08-05 11:55:11', '2011-06-20 11:17:03'),
(8, '流川枫', '7c4a8d09ca3762af61e59520943dc26494f8941b', 4, 0, '000.000.000.000', '0000-00-00 00:00:00', '2011-05-20 15:52:06'),
(53, '蜡笔小新', '7c4a8d09ca3762af61e59520943dc26494f8941b', 3, 0, '000.000.000.000', '0000-00-00 00:00:00', '2011-06-18 21:12:42');

-- --------------------------------------------------------

--
-- 表的结构 `cms_nav`
--

CREATE TABLE IF NOT EXISTS `cms_nav` (
`id` mediumint(8) unsigned NOT NULL COMMENT '//编号',
  `nav_name` varchar(20) NOT NULL COMMENT '//导航名',
  `nav_info` varchar(200) NOT NULL COMMENT '//导航说明',
  `pid` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '//子分类',
  `sort` mediumint(8) unsigned NOT NULL COMMENT '//排序'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- 转存表中的数据 `cms_nav`
--

INSERT INTO `cms_nav` (`id`, `nav_name`, `nav_info`, `pid`, `sort`) VALUES
(1, '军事动态', '军事动态', 0, 1),
(2, '八卦娱乐', '娱乐界的狗仔新闻集。', 0, 2),
(3, '时尚女人', '关于时尚和女人方面的信息。', 0, 3),
(4, '科技频道', '关于科技方面的资讯。', 0, 4),
(5, '智能手机', '关于智能手机方面的推荐。', 0, 5),
(7, '美容护肤', '关于美容方面的信息。', 0, 7),
(8, '热门汽车', '关于汽车方面的信息。', 0, 8),
(9, '房产家居', '关于房产家居的信息。', 0, 9),
(10, '读书教育', '关于教育方面的信息。', 0, 10),
(11, '股票基金', '关于股票基金的信息。', 0, 11),
(26, '中国军事', '关于中国军事的信息。', 1, 3),
(27, '美国军事', '关于美国军事的信息。', 1, 1),
(29, '日本军事', '关于日本军事方面的信息。', 1, 2),
(30, '韩国军事', '关于韩国军事的信息。', 1, 4),
(32, '朝鲜军事', '关于朝鲜军事的信息。', 1, 5),
(33, '越南军事', '关于越南军事的信息。', 1, 6),
(35, '女人时尚', '风尚潮流', 2, 35),
(36, '青春向往', '向往青春，追求美好的生活', 3, 36);

-- --------------------------------------------------------

--
-- 表的结构 `cms_premission`
--

CREATE TABLE IF NOT EXISTS `cms_premission` (
`id` tinyint(3) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `info` varchar(200) NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- 转存表中的数据 `cms_premission`
--

INSERT INTO `cms_premission` (`id`, `name`, `info`) VALUES
(1, '后台登录', '后台登录'),
(2, '清理缓存', '清理缓存'),
(3, '管理员管理', '管理员管理'),
(4, '等级管理', '等级管理'),
(5, '权限设定', '权限设定'),
(6, '网站导航', '网站导航'),
(7, '文档操作', '文档操作'),
(8, '评论审核', '评论审核'),
(9, '轮播器管理', '轮播器管理'),
(10, '广告管理', '广告管理'),
(11, '投票管理', '投票管理'),
(12, '审核友情链接', '审核友情链接'),
(13, '会员管理', '会员管理'),
(14, '系统配置管理', '系统配置管理');

-- --------------------------------------------------------

--
-- 表的结构 `cms_rotatain`
--

CREATE TABLE IF NOT EXISTS `cms_rotatain` (
`id` mediumint(8) unsigned NOT NULL COMMENT '//id',
  `title` varchar(30) NOT NULL COMMENT '//图片名称',
  `pic` varchar(100) NOT NULL COMMENT '//图片地址',
  `link` varchar(40) NOT NULL COMMENT '//链接地址',
  `date` datetime NOT NULL COMMENT '//上传时间',
  `info` varchar(200) NOT NULL COMMENT '//图片信息',
  `state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '//是否轮播'
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- 转存表中的数据 `cms_rotatain`
--

INSERT INTO `cms_rotatain` (`id`, `title`, `pic`, `link`, `date`, `info`, `state`) VALUES
(4, '媳妇', '/demo/cms/uploads/20140416/20140416174005622.jpg', 'www.baidu.com', '2014-04-16 17:40:26', '要加有', 1),
(5, '高中学校', '/demo/cms/uploads/20140416/20140416183819931.jpg', 'www.qq.com', '2014-04-16 18:38:51', '我爱高中生活', 1),
(6, '淘宝无敌', '/demo/cms/uploads/20140505/20140505120025869.jpg', 'www.taobao.com', '2014-04-16 19:05:46', '热爱购物', 1);

-- --------------------------------------------------------

--
-- 表的结构 `cms_system`
--

CREATE TABLE IF NOT EXISTS `cms_system` (
`id` tinyint(1) unsigned NOT NULL COMMENT '//id',
  `upload_dir` varchar(10) NOT NULL COMMENT '//上传目录',
  `page_size` tinyint(2) NOT NULL COMMENT '//翻页size',
  `content_size` tinyint(2) NOT NULL COMMENT '//文档翻页',
  `new_commend` tinyint(2) NOT NULL COMMENT '//新评论翻页',
  `nav_size` tinyint(2) NOT NULL COMMENT '//前台显示导航条数',
  `ro_time` tinyint(2) NOT NULL COMMENT '//轮播器循环时间',
  `ro_num` tinyint(2) NOT NULL COMMENT '//轮播器显示条数',
  `adver_num` tinyint(2) NOT NULL COMMENT '//广告切换条数',
  `webname` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT '//网站名'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `cms_system`
--

INSERT INTO `cms_system` (`id`, `upload_dir`, `page_size`, `content_size`, `new_commend`, `nav_size`, `ro_time`, `ro_num`, `adver_num`, `webname`) VALUES
(1, '/uploads/', 10, 5, 10, 10, 3, 3, 5, 'cms后台管理系统');

-- --------------------------------------------------------

--
-- 表的结构 `cms_tag`
--

CREATE TABLE IF NOT EXISTS `cms_tag` (
`id` mediumint(8) unsigned NOT NULL,
  `tag` varchar(10) NOT NULL,
  `count` mediumint(8) NOT NULL DEFAULT '0'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `cms_tag`
--

INSERT INTO `cms_tag` (`id`, `tag`, `count`) VALUES
(1, '平板电脑', 45),
(2, 'XOOM', 82),
(3, '文章，姚笛，马伊琍', 33),
(4, '双核', 39),
(5, 'ipad3', 38),
(6, '喜悦', 21),
(7, '成功', 19),
(8, '美丽花花', 19),
(9, '端庄', 19),
(10, '美丽', 17),
(11, '自信', 19),
(12, '苹果', 17),
(13, 'ThinkPad', 12),
(14, '自由飞翔', 13),
(15, '|成功|喜悦', 5);

-- --------------------------------------------------------

--
-- 表的结构 `cms_user`
--

CREATE TABLE IF NOT EXISTS `cms_user` (
`id` mediumint(8) unsigned NOT NULL COMMENT '//id',
  `username` varchar(20) NOT NULL COMMENT '//用户名',
  `password` char(40) NOT NULL COMMENT '//密码',
  `email` varchar(30) NOT NULL COMMENT '//电子邮件',
  `face` varchar(10) NOT NULL COMMENT '//头像',
  `question` varchar(20) NOT NULL COMMENT '//提问',
  `answer` varchar(20) NOT NULL COMMENT '//回答',
  `state` tinyint(1) NOT NULL DEFAULT '1' COMMENT '//会员状态',
  `time` char(10) NOT NULL COMMENT '//最近登录的时间戳',
  `date` datetime NOT NULL COMMENT '//注册时间'
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- 转存表中的数据 `cms_user`
--

INSERT INTO `cms_user` (`id`, `username`, `password`, `email`, `face`, `question`, `answer`, `state`, `time`, `date`) VALUES
(3, '蜡笔小新', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'labixiaoxin@sina.com.cn', '17.gif', '您父亲的姓名是', '家庭主妇', 1, '1312548248', '2011-07-28 18:02:43'),
(11, '黑崎一护', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'heiqiyihu@sina.com.cn', '08.gif', '您父亲的姓名是', '同行', 1, '1312548280', '2011-07-29 11:14:39'),
(10, '樱桃小丸子', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'xiaowanzi@sina.com.cn', '22.gif', '您父亲的姓名是', '没有啦', 1, '1312544198', '2011-07-29 10:28:20'),
(19, '葫芦娃', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'huluwa@sina.com.cn', '11.gif', '您父亲的姓名是', '密码', 1, '1312522684', '2011-07-29 18:37:23'),
(20, '变形金刚', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'bxjg@sina.com.cn', '09.gif', '您父亲的姓名是', '同行', 1, '1312522576', '2011-07-29 18:39:06'),
(21, '路飞', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'lufei@sina.com.cn', '03.gif', '您父亲的姓名是', '路飞飞', 1, '1401502814', '2011-07-30 20:03:07'),
(22, '奈美', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'namei@sina.com.cn', '13.gif', '您父亲的姓名是', '同行', 1, '1312521114', '2011-07-31 13:30:52'),
(24, '圣斗士星矢', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'shengdoushixingshi@sina.com.cn', '14.gif', '您父亲的姓名是', '不知打', 1, '', '2011-08-02 14:45:29'),
(27, '小叮当', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'xiaodingdang@sina.com', '20.gif', '您父亲的姓名是', '大叮当', 1, '1312520726', '2011-08-03 11:16:33'),
(28, '紫龙', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'zilong@sina.com.cn', '23.gif', '您父亲的姓名是', '女', 4, '', '2011-08-04 11:46:35'),
(29, '冰河', 'dd5fef9c1c1da1394d6d34b248c51be2ad740840', '111@sina.com.cn', '03.gif', '您父亲的姓名是', '难', 5, '1312429682', '2011-08-04 11:48:02');

-- --------------------------------------------------------

--
-- 表的结构 `cms_vote`
--

CREATE TABLE IF NOT EXISTS `cms_vote` (
`id` smallint(5) unsigned NOT NULL COMMENT '//id',
  `title` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT '//投票主题',
  `info` varchar(200) CHARACTER SET utf8 NOT NULL COMMENT '//投票简介',
  `vid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '//是否主题',
  `state` tinyint(1) NOT NULL DEFAULT '0' COMMENT '//是否显示',
  `count` mediumint(8) NOT NULL DEFAULT '0' COMMENT '//投票数',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '//时间'
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `cms_vote`
--

INSERT INTO `cms_vote` (`id`, `title`, `info`, `vid`, `state`, `count`, `date`) VALUES
(1, '您对本站的看法', '您对本站的看法', 0, 0, 0, '2014-04-24 11:12:06'),
(2, '您爱吃的食物', '您爱吃的食物', 0, 0, 0, '2014-04-24 11:12:08'),
(3, '您最喜爱的明星是谁', '您最喜爱的明星是谁', 0, 1, 0, '2014-04-25 08:15:43'),
(4, '您最想达成的愿望是什么', '您最想达成的愿望是什么', 0, 0, 0, '2014-04-24 11:12:03'),
(5, '您最喜爱的运动是什么', '您最喜爱的运动是什么士大夫', 0, 0, 0, '2014-04-25 08:15:43'),
(6, '刘德华', '刘德华', 3, 0, 104, '2014-06-22 12:40:40'),
(12, '黄家驹', '黄家局', 3, 0, 80, '2014-04-25 06:58:20'),
(8, '张学友', '我爱听他的歌', 3, 0, 11, '2014-04-25 06:58:25'),
(13, '无限制格斗', '对吗', 5, 0, 0, '2014-04-25 07:30:33'),
(11, '李小龙', '我爱李小龙', 3, 0, 0, '2014-04-25 05:43:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms_adver`
--
ALTER TABLE `cms_adver`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_commend`
--
ALTER TABLE `cms_commend`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_content`
--
ALTER TABLE `cms_content`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_lever`
--
ALTER TABLE `cms_lever`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_link`
--
ALTER TABLE `cms_link`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_manage`
--
ALTER TABLE `cms_manage`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_nav`
--
ALTER TABLE `cms_nav`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_premission`
--
ALTER TABLE `cms_premission`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_rotatain`
--
ALTER TABLE `cms_rotatain`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_system`
--
ALTER TABLE `cms_system`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_tag`
--
ALTER TABLE `cms_tag`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_user`
--
ALTER TABLE `cms_user`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cms_vote`
--
ALTER TABLE `cms_vote`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cms_adver`
--
ALTER TABLE `cms_adver`
MODIFY `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '//id',AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `cms_commend`
--
ALTER TABLE `cms_commend`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '//id',AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `cms_content`
--
ALTER TABLE `cms_content`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '//编号',AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `cms_lever`
--
ALTER TABLE `cms_lever`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '//编号',AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `cms_link`
--
ALTER TABLE `cms_link`
MODIFY `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `cms_manage`
--
ALTER TABLE `cms_manage`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '//编号',AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `cms_nav`
--
ALTER TABLE `cms_nav`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '//编号',AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `cms_premission`
--
ALTER TABLE `cms_premission`
MODIFY `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `cms_rotatain`
--
ALTER TABLE `cms_rotatain`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '//id',AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cms_system`
--
ALTER TABLE `cms_system`
MODIFY `id` tinyint(1) unsigned NOT NULL AUTO_INCREMENT COMMENT '//id',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cms_tag`
--
ALTER TABLE `cms_tag`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `cms_user`
--
ALTER TABLE `cms_user`
MODIFY `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '//id',AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `cms_vote`
--
ALTER TABLE `cms_vote`
MODIFY `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '//id',AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
