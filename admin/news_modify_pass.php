<?php
require_once('session.php');
require_once('../public/conn.php');
header("Content-type:text/html;charset=utf-8");
if(empty($_POST['title'])){
	echo "<script>alert('标题不能为空！');history.back();</script>";
	exit;
	}
if(empty($_POST['catid'])){
	echo "<script>alert('类别不能为空！');history.back();</script>";
	exit;
	}
if(empty($_POST['content'])){
	echo "<script>alert('内容不能为空！');history.back();</script>";
	exit;
	}
$sql="update news set title='".$_POST['title']."',comefrom='".$_POST['comefrom']."',pubdate='".$_POST['pubdate']."',catid='".$_POST['catid']."',keywords='".$_POST['keywords']."',description='".$_POST['description']."',content='".$_POST['content']."' where id='".$_GET['id']."'";
if(mysqli_query($conn,$sql)){
    echo "<script>alert('修改成功！');window.location.href='news_list.php';</script>";
    exit;
}else{
	echo "<script>alert('修改失败！');window.location.href='news_list.php';</script>";
    exit;
	}
mysqli_close($conn);
?>