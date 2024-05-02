<?php
require_once'public/conn.php';
require_once'config.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="images/1.ico" type="image/x-icon" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo $row_config['site_keywords'];?>" />
<meta name="description" content="<?php echo $row_config['site_description'];?>" />
<title><?php echo $row_config['site_title'];?></title>
<link href="css/style.css" rel="stylesheet" type="text/css" />

</head>
<body>
<!--后台动画-->
<?php require_once'dh.php';?>
<!--“页头”版位-->
<?php require_once'top.php';?>
<!--"导航"版位-->
<?php require_once'nav.php';?>
<!--"banner"版位-->
<?php require_once'banner.php';?>
<!--“关于花公子、新闻动态、联系信息”形成的横向版位-->
<div class="main"> 
  <!--关于花公子-->
  <div class="left">
    <div class="up">
      <div class="left"> <span class="cattitle">关于我们</span>| <span class="cattitle_en">ABOUT US</span> </div>
      <div class="right"><a href="about.php">详细</a></div>
    </div>
    <div class="down">
      <div class="left"><img src="images/bee.jpg" width="121" height="121" /></div>
      <div class="right">
        <?php
			$result_about=mysqli_query($conn,"select description from about where firstpage='是'");
			$row_about=mysqli_fetch_array($result_about);
			echo mb_substr($row_about['description'],0,126,'utf-8');
			mysqli_free_result($result_about);
			?>
        ...</div>
    </div>
  </div>
  <!--新闻动态-->
  <div class="center">
    <div class="up">
      <div class="left"> <span class="cattitle">新闻动态</span>| <span class="cattitle_en">ABOUT US</span> </div>
      <div class="right"><a href="news.php">更多</a></div>
    </div>
    <div class="down">
    <?php
	$result_news=mysqli_query($conn,"select * from news order by id desc limit 8");
	while($row_news=mysqli_fetch_array($result_news)){
	?>
      <a href="news_show.php?id=<?php echo $row_news['id']?>"><?php echo mb_substr($row_news['title'],0,25,'utf-8');?></a>
	<?php
	}
	mysqli_free_result($result_news);
	?>
    </div>
  </div>
  <!--联系信息-->
  <div class="right">
    <div class="tel"><?php echo $row_config['company_phone'];?></div>
    <div class="weixin"><?php echo $row_config['company_weixin'];?></div>
    <div class="messagelink"><a href="message.php">访客留言</a></div>
    <div class="qq"> <?php echo $row_config['company_qq'];?></div>
  </div>
</div>
<!--"最新蜂蜜"版位-->
<div class="product">
  <div class="up">
    <div class="left"> <span class="cattitle">媒体列表</span>| <span class="cattitle_en">LATEST PRODUCT</span> </div>
    <div class="right"><a href="product.php">更多</a></div>
  </div>
  <div class="down">
    <?php
	$result_product=mysqli_query($conn,"select * from product order by id asc limit 5");
	while($row_product=mysqli_fetch_array($result_product)){
	?>
   
    <a href="product_show.php?id=<?php echo $row_product['id'];?>"><img src="<?php echo $row_product['thumbnail'];?>" width="162" height="177"></a>
    <?php
	}
	mysqli_free_result($result_product);
	?>
  </div>
</div>




<!--"友情链接"版位-->
<?php require_once'friend.php';?>
<!--"页脚"版位-->
<?php require_once'footer.php';?>
<?php mysqli_close($conn);?>
</body>
</html>
