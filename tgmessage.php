<?php
require_once'public/conn.php';
require_once'config.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="keywords" content="<?php echo $row_config['site_keywords']; ?>" />
  <meta name="description" content="<?php echo $row_config['site_description']; ?>" />
  <title><?php echo $row_config['site_title']; ?></title>
  <link href="css/style.css" rel="stylesheet" type="text/css" />
 
 <!--引入kindeditor编辑器-->
<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
<script charset="utf-8" src="kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="kindeditor/lang/zh_CN.js"></script>
<script>
	var editor;
	KindEditor.ready(function(K) 
	{
		editor = K.create('textarea[name="content"]', {
			allowFileManager : true
		});
	});
</script>
  
</head>
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
    	<div class="subnav">您现在的位置：<a href="index.php">首页</a>><a href="tgmessage.php">我要投稿</a></div>
        <div class="message">
        	<form name="form1" id="form1" action="?act=add" method="post" >
        	<ul>
            	<li class="title"><span class="must">*</span>文章标题：</li>
                <li><input name="title" type="text" id="title"></li>
            </ul>
            <ul>
            	<li class="title"><span class="must">*</span>您的称呼：</li>
                <li><input name="name" type="text" id="name"></li>
            </ul>
           
            <ul>
            	<li class="title"><span class="must">*</span>媒体类别：</li>
                <li><select name="mtlb">
  <?php
  $sql="select id,title from product_category";
$result=mysqli_query($conn,$sql);
	  while($rows=mysqli_fetch_array($result)){
		?>
	<option value="<?php echo $rows["id"]?>"><?php echo $rows["title"]; ?></option>
<?php
	  }
 ?>
  </select></li>
            </ul>
            <ul>
            	<li class="title"><span class="must">*</span>文章类别：</li>
                <li><select name="wzlb">
  <?php
  $sql="select id,title from news_category";
$result=mysqli_query($conn,$sql);
	  while($rows=mysqli_fetch_array($result)){
		?>
	<option value="<?php echo $rows["id"]?>"><?php echo $rows["title"]; ?></option>
<?php
	  }
 ?>
  </select></li>
            </ul>
            <ul>
            	<li class="title"><span class="must">*</span>企业邮箱：</li>
                <li><input name="email" type="text" id="email"></li>
            </ul>
            
            <ul class="ct">
            	<li class="title"><span class="must">*</span>文章内容：</li>
                <li>
                 
                  <textarea name="content" style="width:500px;height:100px;visibility:hidden;"></textarea>
              </li>
            </ul>
              <div style="height: 180px"></div>
              <div style="height: 50px">
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
	
	$mtlb=$_POST['mtlb'];
	$wzlb=$_POST['wzlb'];
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
    $sql_tgmessage="insert into tgmessage(title,pubdate,name,mtlb,wzlb,email,content,deal)values('".$title."','".$pubdate."','".$name."','".$mtlb."','".$wzlb."','".$email."','".$content."','".$deal."')";	
    if(mysqli_query($conn,$sql_tgmessage)){
		echo"<script>alert('留言成功，我们会尽快联系您！');window.location.href='tgmessage.php';</script>";
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
