-- phpMyAdmin SQL Dump
-- version phpStudy 2014
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2019 年 12 月 21 日 14:03
-- 服务器版本: 5.5.53
-- PHP 版本: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `honey`
--

-- --------------------------------------------------------

--
-- 表的结构 `about`
--

CREATE TABLE IF NOT EXISTS `about` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL COMMENT '标题',
  `comefrom` varchar(20) DEFAULT NULL COMMENT '来源',
  `pubdate` varchar(20) DEFAULT NULL COMMENT '发布日期',
  `keywords` text COMMENT '关键字',
  `description` text COMMENT '描述',
  `content` text COMMENT '内容',
  `firstpage` varchar(5) DEFAULT NULL COMMENT '栏目起始页',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- 转存表中的数据 `about`
--

INSERT INTO `about` (`id`, `title`, `comefrom`, `pubdate`, `keywords`, `description`, `content`, `firstpage`) VALUES
(11, '公司概况', '本站', '2018-2-7', '蜂蜜', '花公子蜂业科技有限公司成立于2011年，公司注册资金50万元，现已发展成为集科研、生产、经营于一体的蜂产品高新技术企业，公司拥有百花蜜、野蜂蜜、蜂花粉、蜂王浆、蜂胶等系列30多个品种的主营产品。其销售网络遍布全国各地，每年向上百万的消费者提供优质的天然蜂产品和保健食品', '<span style="font-family:宋体;"><span style="font-size:14px;">花公子蜂业科技有限公司成立于</span></span><span style="font-size:14px;">2011</span><span style="font-family:宋体;font-size:14px;">年，公司注册资金</span><span style="font-size:14px;">50</span><span style="font-family:宋体;font-size:14px;">万元，现已发展成为集科研、生产、经营于一体的蜂产品高新技术企业，公司拥有百花蜜、野蜂蜜、蜂花粉、蜂王浆、蜂胶等系列</span><span style="font-size:14px;">30</span><span style="font-family:宋体;font-size:14px;">多个品种的主营产品。其销售网络遍布全国各地，每年向上百万的消费者提供优质的天然蜂产品和保健食品，为消费者的身体健康提供了值得信赖的服务。公司一直以来贯彻</span><span style="font-size:14px;">“</span><span style="font-family:宋体;font-size:14px;">自然、创新、优质</span><span style="font-size:14px;">”</span><span style="font-family:宋体;font-size:14px;">的产品创造原则，并以此原则来指导科研和生产过程中的所有行为。</span><span></span> \r\n<p class="MsoNormal">\r\n	<span style="font-family:宋体;font-size:14px;">公司拥有按照</span><span style="font-family:''Tahoma'',''sans-serif'';font-size:14px;">GMP</span><span style="font-family:宋体;font-size:14px;">标准建设的现代化大型蜂产品加工基地：拥有先进的检测仪器、理化实验室、生产加工设备和配套冷藏设施，保证了检测手段齐备、加工能力强、产品品质起点高，实现了与国家标准以及国际标准对接。拥有高科技的现代化的蜂蜜浓缩生产线、蜂蜜灌装生产线、全自动果冻王浆生产线、硬胶囊生产线、颗粒花粉及破壁花粉生产线等多条蜂产品生产线。产品能够满足国家标准、日本标准、美国标准、欧盟标准等要求。</span><span></span> \r\n</p>\r\n<p>\r\n	<span style="font-family:宋体;font-size:14px;">目前致力于峰产品在保健、美食和峰疗等多方面的研究和应用。</span> \r\n</p>\r\n<p>\r\n	<span style="font-family:宋体;font-size:14px;">公司的网址</span><span style="font-family:''Calibri'',''sans-serif'';font-size:14px;"><a href="http://www.bee.com">http://www.bee.com</a></span><span style="font-family:宋体;font-size:14px;">，免费咨询热线：</span><span style="font-family:''Calibri'',''sans-serif'';font-size:14px;">400—xxxxxxx</span><span style="font-family:宋体;font-size:14px;">。</span> \r\n</p>\r\n<p>\r\n	<span style="font-family:''font-size:15px;background-color:#FFFFFF;"></span>&nbsp;\r\n</p>', '是'),
(12, '组织机构', '本站', '2018-2-7', '111', '111', '111', ''),
(13, '企业荣誉', '本站', '2018-2-11', '111', '111', '111', ''),
(14, '企业场景', '本站', '2018-2-7', '111', '111', '111', '');

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员id',
  `admin_name` varchar(50) DEFAULT NULL COMMENT '管理员帐号',
  `admin_pass` varchar(50) DEFAULT NULL COMMENT '管理员密码',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_pass`) VALUES
(13, 'admin', 'admin'),
(14, 'abc', '222');

-- --------------------------------------------------------

--
-- 表的结构 `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_title` varchar(50) DEFAULT NULL COMMENT '网站标题rn',
  `site_url` varchar(50) DEFAULT NULL COMMENT '网站地址',
  `site_logo` varchar(100) DEFAULT NULL COMMENT '网站logo',
  `site_keywords` text COMMENT '网站关键字',
  `site_description` text COMMENT '网站描述',
  `site_copyright` text COMMENT '权版信息',
  `company_name` varchar(50) DEFAULT NULL COMMENT '公司名称',
  `company_phone` varchar(20) DEFAULT NULL COMMENT '公司联系电话',
  `company_qq` varchar(20) DEFAULT NULL COMMENT '公司传真号码',
  `company_email` varchar(30) DEFAULT NULL COMMENT '公司电子邮箱',
  `company_weixin` varchar(30) DEFAULT NULL COMMENT '微信',
  `company_ewm` varchar(100) DEFAULT NULL COMMENT '公司二维码',
  `company_address` varchar(50) DEFAULT NULL COMMENT '公司地址',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `config`
--

INSERT INTO `config` (`id`, `site_title`, `site_url`, `site_logo`, `site_keywords`, `site_description`, `site_copyright`, `company_name`, `company_phone`, `company_qq`, `company_email`, `company_weixin`, `company_ewm`, `company_address`) VALUES
(1, '花公子蜂蜜', 'http://www.bee.com', '/web/admin/kindeditor/attached/image/20180207/20180207150256_83031.png', '蜂蜜，野蜂蜜，百花密', '花公子蜂蜜有限公司是一家从事。。。', '公司地址：广东省惠州市惠城区惠州经济职业技术学院大学生创业园<br />Copyright ©2017 花公子蜂业科技有限公司 All rights reserved.<br />联系电话：400-xxxxxxx E-mail:flowerbee@qq.com<br />\r\n备案号:粤ICP备000000号', '花公子蜂蜜科技有限公司', '400-xxxxxxx', '382526903', 'flowerbee@qq.com', 'xiaomifengwx', '/web/admin/kindeditor/attached/image/20180207/20180207150309_81518.jpg', '惠经职院大学生创业园');

-- --------------------------------------------------------

--
-- 表的结构 `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL COMMENT '标题',
  `comefrom` varchar(20) DEFAULT NULL COMMENT '来源',
  `pubdate` varchar(20) DEFAULT NULL COMMENT '发布日期',
  `keywords` text COMMENT '关键字',
  `description` text COMMENT '描述',
  `content` text COMMENT '内容',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- 转存表中的数据 `contact`
--

INSERT INTO `contact` (`id`, `title`, `comefrom`, `pubdate`, `keywords`, `description`, `content`) VALUES
(1, '联系我们', '本站', '2018-2-8', '蜂蜜,野蜂蜜', '', '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;主办单位：花公子蜂业科技有限公司公司<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;地址：广东省惠州市惠城区<span style="font-family:''font-size:13px;background-color:#FFFFFF;">惠经职院大学生创业园</span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;免费热线：400-xxxxxxx<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;网址：<span style="font-family:''font-size:13px;background-color:#FFFFFF;"><a href="http://www.flobee.com">http://www.flobee.com</a></span><br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;电子邮箱：huagongzi@163.com<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;QQ:382526903<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;微信：<span style="font-family:''font-size:13px;background-color:#FFFFFF;">xiaomifengwx</span>');

-- --------------------------------------------------------

--
-- 表的结构 `friend`
--

CREATE TABLE IF NOT EXISTS `friend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(20) DEFAULT NULL COMMENT '标题',
  `url` varchar(50) DEFAULT NULL COMMENT '链接地址',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- 转存表中的数据 `friend`
--

INSERT INTO `friend` (`id`, `title`, `url`) VALUES
(4, '惠州市知网网络科技有限公司', 'http://www.it0752.net'),
(5, '惠州经济职业技术学院', 'http://www.hzcollege.com'),
(6, '花公子天猫旗舰店', 'http://'),
(7, '花公子科技有限公司', 'http://'),
(8, '淘小蜜科技', 'http://'),
(9, '知网网络科技有限公司', 'http://'),
(10, '中国蜂蜜网', 'http://'),
(11, '花公子淘宝店', 'http://'),
(12, '惠州经济职业技术学院', 'http://www.hzcollge.com'),
(13, '惠经职院网络技术专业', 'http://');

-- --------------------------------------------------------

--
-- 表的结构 `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL COMMENT '留言标题',
  `pubdate` varchar(50) DEFAULT NULL COMMENT '留言时间',
  `name` varchar(30) DEFAULT NULL COMMENT '称呼',
  `tel` varchar(20) DEFAULT NULL COMMENT '手机号码',
  `qq` varchar(15) DEFAULT NULL COMMENT 'qq',
  `email` varchar(30) DEFAULT NULL COMMENT '邮箱',
  `content` text COMMENT '留言内容',
  `deal` varchar(5) DEFAULT '否' COMMENT '是否处理',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `message`
--

INSERT INTO `message` (`id`, `title`, `pubdate`, `name`, `tel`, `qq`, `email`, `content`, `deal`) VALUES
(1, '百花蜜', '2018-2-7', '李小姐', '12343234323', '4243242', '2422424@qq.com', '如果一次性买20箱，有没有优惠？', '是'),
(3, 'test', '2018-02-09', 'test', 'test', 'test', 'test', 'test', '是');

-- --------------------------------------------------------

--
-- 表的结构 `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文章id',
  `title` varchar(50) DEFAULT NULL COMMENT '文章标题',
  `comefrom` varchar(20) DEFAULT NULL COMMENT '来源',
  `pubdate` varchar(20) DEFAULT NULL COMMENT '发布日期',
  `catid` int(11) DEFAULT NULL COMMENT '新闻动态类别',
  `keywords` text COMMENT '关键字',
  `description` text COMMENT '描述',
  `content` text COMMENT '内容',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=63 ;

--
-- 转存表中的数据 `news`
--

INSERT INTO `news` (`id`, `title`, `comefrom`, `pubdate`, `catid`, `keywords`, `description`, `content`) VALUES
(56, '第三届丝调之路国际食品展', '本站', '2018-02-08', 2, '								', '								', '第三届丝调之路国际食品展第三届丝调之路国际食品展第三届丝调之路国际食品展第三届丝调之路国际食品展第三届丝调之路国际食品展第三届丝调之路国际食品展第三届丝调之路国际食品展第三届丝调之路国际食品展第三届丝调之路国际食品展第三届丝调之路国际食品展第三届丝调之路国际食品展第三届丝调之路国际食品展第三届丝调之路国际食品展'),
(55, '花公子参加第九届广东新春年货会', '本站', '2018-02-08', 1, '', '', '花公子参加第九届广东新春年货会'),
(57, '花公子蜂业喜获老字号优秀企业奖', '本站', '2018-02-24', 1, '', '', '花公子蜂业喜获老字号优秀企业奖'),
(58, '公司派出人员参加广东惠州“互联网+农业”研讨会', '本站', '2018-02-24', 1, '', '', '公司派出人员参加广东惠州“互联网+农业”研讨会'),
(59, '惠州展会倍受青睐', '本站', '2018-02-24', 2, '', '', '惠州展会倍受青睐'),
(60, '花公子蜂蜜即日起推出买三送一活动', '本站', '2018-02-24', 1, '', '', '花公子蜂蜜即日起推出买三送一活动'),
(61, '花公子蜂业参与e农计划对广东惠东县实施精准扶贫', '本站', '2018-02-24', 1, '', '', '花公子蜂业参与e农计划对广东惠东县实施精准扶贫'),
(62, '广东会员昆明一日游', '本站', '2018-02-24', 1, '', '', '广东会员昆明一日游');

-- --------------------------------------------------------

--
-- 表的结构 `news_category`
--

CREATE TABLE IF NOT EXISTS `news_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '记录id',
  `title` varchar(50) DEFAULT NULL COMMENT '类别名称',
  `sort` int(11) DEFAULT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `news_category`
--

INSERT INTO `news_category` (`id`, `title`, `sort`) VALUES
(1, '公司新闻', 10),
(2, '行业新闻', 20);

-- --------------------------------------------------------

--
-- 表的结构 `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文章id',
  `title` varchar(50) DEFAULT NULL COMMENT '产品标题',
  `comefrom` varchar(20) DEFAULT NULL COMMENT '来源',
  `pubdate` varchar(20) DEFAULT NULL COMMENT '发布日期',
  `numeration` varchar(20) DEFAULT NULL COMMENT '产品编号',
  `price` float DEFAULT NULL COMMENT '价格',
  `catid` int(11) DEFAULT NULL COMMENT '产品类别',
  `thumbnail` varchar(100) DEFAULT NULL COMMENT '缩略图',
  `keywords` text COMMENT '关键字',
  `description` text COMMENT '描述',
  `content` text COMMENT '内容',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- 转存表中的数据 `product`
--

INSERT INTO `product` (`id`, `title`, `comefrom`, `pubdate`, `numeration`, `price`, `catid`, `thumbnail`, `keywords`, `description`, `content`) VALUES
(3, '百花蜜蜂浆60g', '本站', '2018-02-08', '201822001', 58, 1, '/web/admin/kindeditor/attached/image/20180208/20180208100559_64025.jpg', '百花蜜，野蜂蜜', '', '<img alt="" src="/web/admin/kindeditor/attached/image/20180208/20180208100720_32598.jpg" />'),
(4, '百花蜜蜂浆60g', '本站', '2018-02-24', '', 0, 1, '/web/admin/kindeditor/attached/image/20180224/20180224210614_21777.jpg', '', '', '<span style="font-family:''font-size:13px;background-color:#FDFDFD;">百花蜜蜂浆60g</span>'),
(5, '百花蜜蜂浆60g', '本站', '2018-02-24', '', 0, 1, '/web/admin/kindeditor/attached/image/20180224/20180224210642_67637.jpg', '', '', '<span style="font-family:''font-size:13px;background-color:#FDFDFD;">百花蜜蜂浆60g</span>'),
(7, '百花蜜蜂浆60g', '本站', '2018-02-24', '', 0, 3, '/web/admin/kindeditor/attached/image/20180224/20180224211602_95023.jpg', '', '', '<span style="font-family:''font-size:13px;background-color:#FDFDFD;">百花蜜蜂浆60g</span>'),
(8, '百花蜜蜂浆60g', '本站', '2018-02-24', '', 0, 1, '/web/admin/kindeditor/attached/image/20180224/20180224211709_24559.jpg', '', '', '<span style="font-family:''font-size:13px;background-color:#FDFDFD;">百花蜜蜂浆60g</span>'),
(9, '百花蜜蜂浆80g', '本站', '2018-02-24', '', 0, 1, '/web/admin/kindeditor/attached/image/20180224/20180224211709_24559.jpg', '', '', '<span style="font-family:''font-size:13px;background-color:#FDFDFD;">百花蜜蜂浆80g</span>');

-- --------------------------------------------------------

--
-- 表的结构 `product_category`
--

CREATE TABLE IF NOT EXISTS `product_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '记录id',
  `title` varchar(50) DEFAULT NULL COMMENT '类别名称',
  `sort` int(11) DEFAULT NULL COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `product_category`
--

INSERT INTO `product_category` (`id`, `title`, `sort`) VALUES
(1, '百花蜜', 10),
(3, '野蜂蜜', 20);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
