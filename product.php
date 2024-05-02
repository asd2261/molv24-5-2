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
<!--"产品中心列表页"主体main-product-->
<div class="main-product">
  <div class="left">
    <?php require_once'product_category.php';?>
    <?php require_once'sidebar_contact.php';?>
  </div>
  <div class="right">
    <div class="subnav">您现在的位置：<a href="index.php">首页</a>>媒体类型><a href="product.php?catid=<?php echo $_GET['catid'];?>&cattitle=<?php echo $_GET['cattitle'];?>"><?php echo $_GET['cattitle'];?></a></div>
    <div class="content">
      <?php
	  //记录的总条数
	  $total_num=mysqli_num_rows(mysqli_query($conn,"select id from product"));
	  //设置每页显示的记录数 
	  $pagesize=9; 
	  //计算总页数
	  $page_num=ceil($total_num/$pagesize);  
	  //设置页数
	  $page=$_GET['page'];
	  if($page<1 || $page==''){
		$page=1;
	  }
	  if($page>$page_num){
		$page=$page_num;
	  }
	  //记录的编移量
	  $offset=$pagesize*($page-1);
	  //上一页、下一页
	  $prepage=($page<>1)?$page-1:$page;
	  $nextpage=($page<>$page_num)?$page+1:$page;
	  //判断是否选择了新闻动态分类
	  if(empty($_GET['catid'])){
	  	$sql_product="select * from product limit $offset,$pagesize";
	  }else{
		$sql_product="select * from product where catid='".$_GET['catid']."' limit $offset,$pagesize";
	  }
	  $result_product=mysqli_query($conn,$sql_product);
	  //判断是否有记录
	  if($total_num>0){
	  while($row_product=mysqli_fetch_array($result_product)){
	  ?>
      <div class="probox"> 
      	<a  class="thumbnail" href="product_show.php?id=<?php echo $row_product['id'];?>"><img src="<?php echo $row_product['thumbnail'];?>" width="162" height="177"></a> 
      	<a class="title"  href="product_show.php?id=<?php echo $row_product['id'];?>"><?php echo $row_product['title'];?></a> 
      </div>
      <?php
      }
	  mysqli_free_result($result_product);
	  }
	  ?>
      <div class="page">
      	<?php
		//如果选择了类别，则分页应为该类别的分页
		$catid=(empty($_GET['catid']))?"":"&catid=".$_GET['catid'];
		?>
      	<a href="?page=<?=$page_num?><?=$catid?>">尾页</a> 
        <a href="?page=<?=$nextpage?><?=$catid?>">下一页</a> 
        <?php
        for($i=1;$i<=$page_num;$i++){
		?>
        <a href="?page=<?=$i?><?=$catid?>"><?=$i?></a> 
        <?php }?>
        <a href="?page=<?=$prepage?><?=$catid?>">上一页</a> 
        <a href="?page=1<?=$catid?>">首页</a> 
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
