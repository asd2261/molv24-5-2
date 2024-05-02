<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<script type="text/javascript" src="js/dtree.js"></script>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	background-color: #ecf4ff;
}
a.ttitle{font-size:12px;text-decoration:none;color:#000;}
.dtree {
	font-family: Verdana, Geneva, Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #0000ff;
	white-space: nowrap;
}
.dtree img {
	border: 0px;
	vertical-align: middle;
}
.dtree a {
	color: #333;
	text-decoration: none;
}
.dtree a.node, .dtree a.nodeSel {
	white-space: nowrap;
	padding: 1px 2px 1px 2px;
}
.dtree a.node:hover, .dtree a.nodeSel:hover {
	color: #0000ff;
}
.dtree a.nodeSel {
	background-color: #AED0F4;
}
.dtree .clip {
	overflow: hidden;
}
-->
</style>
</head>
<body>
<table width="96%"  border="0" cellpadding="10" cellspacing="0" align=center >
  <tr>
   <td valign="top" >
   <div class="menu">
    <table width="100%"  border="0" cellpadding="0" cellspacing="0">
     <tr >
      <td height="25" class="tttitle"><a href="javascript: d.openAll();"><img src="images/view_detailed.gif" width="15" height="15" border="0" align="absmiddle" alt="展开列表"></a> <a href="javascript: d.closeAll();"><img src="images/view_tree.gif" width="15" height="15" border="0" align="absmiddle" alt="收缩列表"></a><a href="right.php" target="right" class="ttitle">系统首页</a>|<a href="../index.php" target="_blank" class="ttitle">网站首页</a></td>
     </tr>
     <tr>
      <td>
	 <script type="text/javascript">
	  <!--
	  d = new dTree('d');
	  d.config.target="right";
	  d.add(0,-1,'系统内容管理');  
	  d.add(1, 0, '网站基本配置', '');
      d.add(11, 1, '设置网站信息', 'config.php');
	  d.add(2, 0, '管理员管理', '');
	  d.add(21, 2, '添加管理员', 'admin_add.php');
	  d.add(22, 2, '管理员列表', 'admin_list.php');
	  d.add(3, 0, '关于内容营销管理', '');
	  d.add(31, 3, '添加内容营销文章', 'about_add.php');
	  d.add(32, 3, '内容营销文章列表', 'about_list.php');
	  d.add(4, 0, '新闻动态管理', '');
	  d.add(41, 4, '添加新闻动态文章', 'news_add.php');
	  d.add(42, 4, '新闻动态文章列表', 'news_list.php');
	  d.add(43, 4, '文章类别', 'news_category.php');
	  d.add(5, 0, '媒体类型管理', '');
	  d.add(51, 5, '添加媒体', 'product_add.php');
	  d.add(52, 5, '媒体列表', 'product_list.php'); 
	  d.add(53, 5, '媒体类别', 'product_category.php');
		
		d.add(6, 0, '投稿管理', '');
	  d.add(61, 6, '投稿列表', 'tgmessage.php'); 
		 
	  d.add(7, 0, '留言管理', '');
	  d.add(71, 7, '留言列表', 'message.php');
      d.add(8, 0, '友情链接管理', '');
	  d.add(81, 8, '添加友情链接', 'friend_add.php');
	  d.add(82, 8, '友情链接列表', 'friend_list.php');
	  d.add(9, 0, '联系我们', '');
	  d.add(91, 9, '编辑联系我们', 'contact_modify.php');
	  d.add(10, 0, '退出后台', '');
	  d.add(101, 10, '退出', 'logout.php'); 		
	  document.write(d);
	  //-->
	  </script>
	  </td>
     </tr>
    </table>
   </div>
   </td>
  </tr>
</table>
</body>
</html>