<?php
require_once('session.php');
require_once('../public/conn.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新闻动态类别管理</title>
<link href="css/table.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!--添加新闻动态类别-添加-->
<form name="form_add" id="form_add" action="?act=add" method="post" >
	<table align="center" cellspacing="0" cellpadding="0">
		<tr>
			<td class="tt" colspan="6">添加新闻动态类别</td>
		</tr>
		<tr>
			<td width="6%">标题</td>
			<td width="30%"><input type="text" name="title" id="title" /></td>
			<td width="13%">排序</td>
			<td width="28%"><input name="sort" type="text" id="sort" size="10" /></td>
			<td width="23%" colspan="2"><input class="btn" type="submit" name="button" id="button" value="提交" /></td>
		</tr>
	</table>
</form>
<br />
<!--新闻动态类别-列表及修改显示-->
<table align="center" cellspacing="0" cellpadding="0">
	<tr>
		<td class="tt" colspan="5">新闻动态类别列表</td>
	</tr>
	<tr>
		<td>id</td>
		<td>标题</td>
		<td>排序</td>
		<td colspan="2">操作</td>
	</tr>
	<?php
	$sql="select * from news_category order by id desc";
    $result=mysqli_query($conn,$sql);
	$row=mysqli_num_rows($result);
	if($row>0){
	while($row=mysqli_fetch_array($result)){
	?>
	<!--说明：因为新闻类别列表及修改显示页整合在一起，因此每一条记录需有一个表单，并且
	每个表单的name属性不能相同，否则提交表的数据将会不准确，为了使表单name不同，解决
	方法是：表单name属性值含记录的id(主键)，这样就能保证循环输出的表单名不一样了。-->
	<form name="form<?php echo $row['id']?>" id="form<?php echo $row['id']?>" action="?act=modify&id=<?php echo $row['id']?>" method="post">
		<tr>
			<td><?=$row['id']?></td>
			<td height="35"><input name="title" type="text" id="title" value="<?php echo $row['title']?>" /></td>
			<td><input name="sort" type="text" id="sort" value="<?php echo $row['sort']?>" size="10" /></td>
			<td width="23%" colspan="2"><input class="btn" type="submit" name="button" id="button" value="修改" />
				&nbsp;&nbsp;
				<input class="btn" type="button" name="button2" id="button2" value="删除" onclick="window.location.href='?act=del&id=<?php echo $row['id']?>'" /></td>
		</tr>
	</form>
	<?php
	}
	mysqli_free_result($result);
	}else{
	?>
	<tr>
		<td colspan="5">暂无记录！</td>
	</tr>
	<?php
	}
	?>
</table>
</body>
</html>
<?php
//添加新闻类别据库
if ($_GET['act']=="add"){
	if ($_POST['title']==""){
		echo "<script>alert('标题不能为空！');history.go(-1)</script>";
		exit;
		}
	if (!is_numeric(intval($_POST['sort']))){
		echo "<script>alert('排序必须为数字！');history.go(-1)</script>";
		exit;
		}
	$sql_add="insert into news_category (title,sort) values ('".$_POST['title']."','".$_POST['sort']."')";
	if(mysqli_query($conn,$sql_add)){
		echo "<script>alert('添加成功！');window.location.href='news_category.php';</script>";
		exit;
	}else{
		echo "<script>alert('添加失败！');window.location.href='news_category.php';</script>";
		exit;
	}
}
//修改新闻类别
if ($_GET['act']=="modify"){
	if ($_POST['title']==""){
		echo "<script>alert('标题不能为空！');history.go(-1)</script>";
		exit;
	}
	if (!is_numeric(intval($_POST['sort']))){
		echo "<script>alert('排序必须为数字！');history.go(-1)</script>";
		exit;
	}
	$sql_modify="update news_category set title='".$_POST['title']."',sort='".$_POST['sort']."' where id='".$_GET['id']."'";
	if(mysqli_query($conn,$sql_modify)){
		echo "<script>alert('修改成功！');window.location.href='news_category.php';</script>";
		exit;
	}else{
		echo "<script>alert('修改失败！');window.location.href='news_category.php';</script>";
		exit;
	}
}
//删除新闻类别
if ($_GET['act']=="del"){
	$sql_delete="delete from news_category where id='".$_GET['id']."'";
	if(mysqli_query($conn,$sql_delete)){
		echo "<script>alert('删除成功！');window.location.href='news_category.php';</script>";
		exit;
	}else{
		echo "<script>alert('删除失败！');window.location.href='news_category.php';</script>";
		exit;
	}
}
mysqli_close($conn);
?>