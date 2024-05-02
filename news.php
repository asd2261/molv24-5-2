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
<!--"新闻动态"主体main-news-->
<div class="main-news">
  <div class="left">
    <?php require_once'news_category.php';?>
    <?php require_once'sidebar_contact.php';?>
  </div>
  <div class="right">
    <div class="subnav">您现在的位置：<a href="index.php">首页</a>><a href="news.php">新闻动态</a>><a href="news.php?catid=<?php echo $_GET['catid'];?>&cattitle=<?php echo $_GET['cattitle'];?>"><?php echo $_GET['cattitle'];?></a></div>
    <div class="content">
      <?php
	  //记录的总条数
	  $total_num=mysqli_num_rows(mysqli_query($conn,"select id from news"));
	  //设置每页显示的记录数 
	  $pagesize=10; 
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
	  	$sql_news="select * from news limit $offset,$pagesize";
	  }else{
		  $sql_news="select * from news where catid='".$_GET['catid']."' limit $offset,$pagesize";
	  }
	  $result_news=mysqli_query($conn,$sql_news);
	  //判断是否有记录
	  if($total_num>0){
	  while($row_news=mysqli_fetch_array($result_news)){
	  ?>
      <div class="row">
      	<a href="news_show.php?id=<?php echo $row_news['id'];?>"><?php echo $row_news['title'];?></a>
        <div class="pubdate"><?php echo $row_news['pubdate'];?></div>
      </div>
      <?php
	  }
	  mysqli_free_result($result_news);
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
