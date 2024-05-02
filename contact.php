<?php
require_once'public/conn.php';
require_once'config.php';
//查询联系我们内容
$sql_content="select * from contact";
$result_content=mysqli_query($conn,$sql_content);
$row_content=mysqli_fetch_array($result_content);
//判断关键词和描述使用全局的还是当前页面的
$keywords=(empty($row_content['keywords']))?$row_config['keywords']:$row_content['keywords'];
$description=(empty($row_content['description']))?$row_config['description']:$row_content['description'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo $keywords;?>" />
<meta name="description" content="<?php echo $description;?>" />
<title><?php echo $row_config['site_title'];?></title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!--“页头”版位-->
<?php require_once'top.php';?>
<!--"导航"版位-->
<?php require_once'nav.php';?>
<!--"banner"版位-->
<?php require_once'banner.php';?>
<!--"联系我们"主体main-contact-->
<div class="main-contact">
	<div class="left">
    	<?php require_once'sidebar_about.php';?>
        <div class="mg-t"></div>
        <?php require_once'product_category.php';?>
    </div>
    <div class="right">
    	<div class="subnav">您现在的位置：<a href="index.php">首页</a>><a href="contact.php">联系我们</a></div>
        <div class="contact_banner">
        	<img src="images/lxw.png"width="600px" height="230px">
        </div>
        <div class="content">
        	<?php echo $row_content['content'];?>
        </div>
    </div>
</div>
<!--"友情链接"版位-->
<?php require_once'friend.php';?>
<!--"页脚"版位-->
<?php require_once'footer.php';?>
<?php mysqli_close($conn);?>
</body>
</html>
