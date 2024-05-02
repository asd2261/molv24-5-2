<?php
require_once('session.php');
require_once('../public/conn.php');
//根据是否选择产品分类统计总记录数
if($_GET['catid']==""){
$total_num=mysqli_num_rows(mysqli_query($conn,"select news.id,news_category.id from news,news_category where news.catid=news_category.id"));
}else{
$total_num=mysqli_num_rows(mysqli_query($conn,"select news.id,news_category.id from news,news_category where news.catid=news_category.id and news.catid='".$_GET['catid']."'"));
}
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
//根据是否选择产品类别，使用不同的语句
if($_GET['catid']==""){
	$sql="select news.*,news_category.title as cattitle from news,news_category where news.catid=news_category.id limit $offset,$pagesize";
}else{
	$sql="select news.*,news_category.title as cattitle from news,news_category where news.catid=news_category.id and news.catid='".$_GET['catid']."' limit $offset,$pagesize";
}
//查询数据
$result=mysqli_query($conn,$sql);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新闻动态文章列表</title>
<link href="css/table.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table border="1" cellpadding="0" cellspacing="0" align="center">
	<tr>
		<td class="tt" colspan="7">新闻动态文章列表</td>
	</tr>
	<tr>
		<td height="39" colspan="7"> 按类别检索：
			<select size="1" name="catid" onChange="location.replace(this.value)">
				<option value="" selected>--请选择--</option>
				<option value="?catid=""">全部</option>
				<?php
				$result_news_category=mysqli_query($conn,"select * from news_category");
				while($v2=mysqli_fetch_array($result_news_category)){
				?>
				<option value="?catid=<?=$v2['id']?>" <?php if($v2['id']==$_GET['catid']){echo 'selected';}?>>
				<?=$v2['title']?>
				</option>
				<?php
				}
				?>
			</select></td>
	</tr>
	<tr>
		<td width="9%" height="35">文章ID</td>
		<td width="48%">标题</td>
		<td width="11%">类别</td>
		<td width="9%">来源</td>
		<td width="9%">发布日期</td>
		<td colspan="2">操作</td>
	</tr>
	<?php
	if($result){
	   while($rs=mysqli_fetch_array($result)){
	?>
		<tr>
			<td height="31"><?php echo $rs['id']?></td>
			<td><?php echo $rs['title']?></td>
			<td><?php echo $rs['cattitle']?></td>
			<td><?php echo $rs['comefrom']?></td>
			<td><?php echo $rs['pubdate']?></td>
			<td width="7%"><input name="button" type="submit" class="btn" id="button" onclick="window.location.href='news_modify.php?id=<?php echo $rs['id']?>'" value="修改" /></td>
			<td width="7%"><input name="button2" type="submit" class="btn" id="button2" onclick="window.location.href='news_delete.php?id=<?php echo $rs['id']?>'" value="删除" /></td>
		</tr>
	<?php
		}
	mysqli_free_result($result);
	}else{
	?>
	<tr>
		<td height="35" colspan="7">暂无记录!</td>
	</tr>
	<?php
	}
	mysqli_close($conn);
	?>
	<tr>
		<td height="43" colspan="7" align="center">
			<?=$page?>/<?=$page_num?>&nbsp;&nbsp;
			<a href="?page=1&catid=<?php echo $_GET['catid'];?>">首页</a>&nbsp;&nbsp; 
			<a href="?page=<?=$prepage?>&catid=<?php echo $_GET['catid'];?>">上一页</a>&nbsp;&nbsp;
			<a href="?page=<?=$nextpage?>&catid=<?php echo $_GET['catid'];?>">下一页</a>&nbsp;&nbsp;
			<a href="?page=<?=$page_num?>&catid=<?php echo $_GET['catid'];?>"> 尾页</a></td>
	</tr>
</table>
</body>
</html>
