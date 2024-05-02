<?php
require_once('session.php');
require_once('../public/conn.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>关于内容营销文章列表</title>
<link href="css/table.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table cellspacing="0" cellpadding="0" align="center">
	<tr>
		<td class="tt" colspan="6">关于内容营销文章列表</td>
	</tr>
	<tr>
		<td width="10%" height="35">文章ID</td>
		<td width="20%">标题</td>
		<td width="18%">发布日期</td>
		<td width="10%">起始页</td>
		<td colspan="2">操作</td>
	</tr>
	<?php
	//记录的总条数
	$total_num=mysqli_num_rows(mysqli_query($conn,"select * from about"));
	//每页记录数
	$pagesize=10;
	//总页数
	$page_num=ceil($total_num/$pagesize);
	//设置页数
	$page=$_GET['page'];
	if($page<1 || $page==''){
		$page=1;
	}
	if($page>$page_num){
		$page=$page_num;
	}
	//计算机记录的偏移量
	$offset=$pagesize*($page-1);
	//上一页、下一页
	$prepage=($page<>1)?$page-1:$page;
	$nextpage=($page<>$page_num)?$page+1:$page;
	$result=mysqli_query($conn,"select * from about order by id desc limit $offset,$pagesize");
	if($total_num>0){
		while($row=mysqli_fetch_array($result)){
	?>
	<tr>
		<td><?php echo $row['id']?></td>
		<td><?php echo $row['title']?></td>
		<td><?php echo $row['pubdate']?></td>
		<td><?php if($row['firstpage']=="是"){echo "<img src='images/ok.png'>";}?>
			&nbsp;</td>
		<td width="21%"><input class="btn" type="submit" name="button" id="button" value="修改" onclick="window.location.href='about_modify.php?id=<?php echo $row['id']?>'" /></td>
		<td width="21%"><input class="btn" type="submit" name="button2" id="button2" value="删除" onclick="window.location.href='about_delete.php?id=<?php echo $row['id']?>'" /></td>
	</tr>
	<?php
		}
		mysqli_free_result($result);
	}else{
		echo "<tr><td colspan='6' style='color:red;font-size:13px'>暂无记录</td></tr>";
	}
	mysqli_close($conn);
	?>
	<tr>
		<td colspan="6" align="center">
		<?=$page?>/<?=$page_num?>&nbsp;&nbsp; 
		<a href="?page=1">首页</a>&nbsp;&nbsp; 
		<a href="?page=<?=$prepage?>">上一页</a>&nbsp;&nbsp; 
		<a href="?page=<?=$nextpage?>">下一页</a>&nbsp;&nbsp; 
		<a href="?page=<?=$page_num?>"> 尾页</a></td>
	</tr>
</table>
</body>
</html>