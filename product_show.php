<?php
require_once'public/conn.php';
require_once'config.php';
//查询产品内容
$sql_content="select product.*,product_category.title as cattitle from product,product_category where product.catid=product_category.id and product.id='".$_GET['id']."'";
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
<!--"产品中心内容页"主体main-produceshow-->
<div class="main-productshow">
	<div class="left">
      <?php require_once'product_category.php';?>
      <?php require_once'sidebar_contact.php';?> 
    </div>
    <div class="right">
    	<div class="subnav">您现在的位置：<a href="index.php">首页</a>>媒体类型><a href="product.php?catid=<?php echo $row_content['catid'];?>&cattitle=<?php echo $row_content['cattitle'];?>"><?php echo $row_content['cattitle'];?></a></div>
        <div class="up">
  			<div class="left">
            	<img src="<?php echo $row_content['thumbnail'];?>" width="162" height="177 ">
            </div>
            <div class="right">
            	<span class="title">媒体名称：<?php echo $row_content['title'];?></span><br />
                媒体类别：<?php echo $row_content['cattitle'];?><br />
				媒体编号：<?php echo $row_content['numeration'];?><br />
				投稿价格：￥<?php echo $row_content['price'];?>
            </div>
    	</div>
        <div class="center">
        	<div class="splite">
            	<div>媒体详情</div>
            </div>
            <div class="detail">
            	<?php echo $row_content['content'];?>
            </div>
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
