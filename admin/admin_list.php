<?php
require_once('session.php');
require_once('../public/conn.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理员列表</title>
<link href="css/table.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table align="center" cellspacing="0" cellpadding="0">
	<tr>
		<td class="tt" colspan="2">管理员列表</td>
	</tr>
	<tr>
		<td width="20%">账号</td>
		<td width="80%">操作</td>
	</tr>
	<?php
	 //记录的总条数
	$total_num=mysqli_num_rows(mysqli_query($conn,"select id from admin"));
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
	//读取指定记录数
	$sql="select * from admin limit $offset,$pagesize";
	$result=mysqli_query($conn,$sql);
	if($total_num>0){
	while($row=mysqli_fetch_array($result)){
	?>
	<tr>
		<td><?=$row['admin_name']?></td>
		<td>
		<!--说明:以下给修改和删除按钮均添加了点击事情，当单击按钮时，当会记转到相应的页面文件，并通过变量id传递相应记录的id值-->
		<input class="btn" type="button" name="button" id="button" value="修改" onclick="window.location.href='admin_modify.php?id=<?=$row['id']?>'" />
			&nbsp;&nbsp;
			<!--注意：在“删除”按钮标签中，添加PHP代码判断该账号是否为超级管理员，
			如果是，则该账号不能被删除，此行记录的按钮将会变成不可用状态-->
			<input class="btn" type="button" name="button2" id="button2" value="删除" onclick="window.location.href='admin_delete.php?id=<?=$row['id']?>'" <?php if($row['admin_name']=='admin'){echo"disabled='disabled'";}?> /></td>
	</tr>
	<?
    	}
		mysqli_free_result($result);
	}else{
	  echo "<tr><td colspan='5' height='31' style='color:red;font-size:13px'>暂无记录</td></tr>";
	}
	mysqli_close($conn);
	?>
	<tr>
		<td colspan="2" align="center">
			<?=$page?>/<?=$page_num?>&nbsp;&nbsp;
			<a href="?page=1">首页</a>&nbsp;&nbsp; 
			<a href="?page=<?=$prepage?>">上一页</a>&nbsp;&nbsp;
			<a href="?page=<?=$nextpage?>">下一页</a>&nbsp;&nbsp;
			<a href="?page=<?=$page_num?>"> 尾页</a></td>
	</tr>
</table>
<body>
</html>