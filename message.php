<?php
require_once'public/conn.php';
require_once'config.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo $row_config['site_keywords'];?>" />
<meta name="description" content="<?php echo $row_config['site_description'];?>" />
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
<!--"给我留言"主体main-message-->
<div class="main-message">
	<div class="left">
      <?php require_once'product_category.php';?>
      <?php require_once'sidebar_contact.php';?>
    </div>
    <div class="right">
    	<div class="subnav">您现在的位置：<a href="index.php">首页</a>><a href="message.php">给我留言</a></div>
        <div class="message">
        	<form name="form1" id="form1" action="?act=add" method="post">
        	<ul>
            	<li class="title"><span class="must">*</span>标题：</li>
                <li><input name="title" type="text" id="title"></li>
            </ul>
            <ul>
            	<li class="title"><span class="must">*</span>称呼：</li>
                <li><input name="name" type="text" id="name"></li>
            </ul>
            <ul>
            	<li class="title">手机：</li>
                <li><input name="tel" type="text" id="tel"></li>
            </ul>
            <ul>
            	<li class="title">QQ：</li>
                <li><input name="qq" type="text" id="qq"></li>
            </ul>
            <ul>
            	<li class="title"><span class="must">*</span>邮箱：</li>
                <li><input name="email" type="text" id="email"></li>
            </ul>
            
            <ul class="ct">
            	<li class="title"><span class="must">*</span>内容：</li>
                <li>
                  <textarea name="content" cols="70" rows="5" id="content"></textarea>
                </li>
            </ul>
            <div>
            	<input type="image" src="admin/images/loginbtn.png">
            </div>
            </form>
        </div>
	</div>
</div>
<!--"友情链接"版位-->
<?php require_once'friend.php';?>
<!--"页脚"版位-->
<?php require_once'footer.php';?>
<?php
if($_GET['act']=="add"){
	$title=$_POST['title'];
	$pubdate=date("Y-m-d");
	$name=$_POST['name'];
	$tel=$_POST['tel'];
	$qq=$_POST['qq'];
	$email=$_POST['email'];
	$content=$_POST['content'];
	$deal="否";
	if(empty($title)){
		echo"<script>alert('留言标题不能为空！');history.back();</script>";
		exit;
	}
	if(empty($name)){
		echo"<script>alert('称呼不能为空！');history.back();</script>";
		exit;
	}
	if(empty($email)){
		echo"<script>alert('电子邮箱不能为空！');history.back();</script>";
		exit;
	}
	if(empty($content)){
		echo"<script>alert('留言内容不能为空！');history.back();</script>";
		exit;
	}
    $sql_message="insert into message(title,pubdate,name,tel,qq,email,content,deal)values('".$title."','".$pubdate."','".$name."','".$tel."','".$qq."','".$email."','".$content."','".$deal."')";	
    if(mysqli_query($conn,$sql_message)){
		echo"<script>alert('留言成功，我们会尽快联系您！');window.location.href='message.php';</script>";
		exit;
	}else{
		echo"<script>alert('留言成功，我们会尽快联系您！');history.back();</script>";
		exit;
	}
}
mysqli_close($conn);
?>
</body>
</html>
