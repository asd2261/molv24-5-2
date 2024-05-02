<?php
require_once'public/conn.php';
require_once'config.php';
//查询当前输出的关于花公子页面内容
if(empty($_GET['id'])){
	$sql_content="select * from about where firstpage='是'";
}else{
	$sql_content="select * from about where id='".$_GET['id']."'";
}
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
<!--"关于花公子"主体main-about-->
<div class="main-about">
	<div class="left">
    	<?php require_once'sidebar_about.php';?>
        <?php require_once'sidebar_contact.php';?>
    </div>
    <div class="right">
    	<div class="subnav">您现在的位置：<a href="index.php">首页</a>><a href="about.php?id=<?php echo $row_content['id'];?>"><?php echo $row_content['title'];?></a></div>
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
