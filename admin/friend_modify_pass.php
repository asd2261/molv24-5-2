<?php
require_once('session.php');
require_once('../public/conn.php');
header("Content-type:text/html;charset=utf-8");
if ($_POST['title']==""){
	echo "<script>alert('标题不能为空！');history.go(-1)</script>";
	exit;
}
if ($_POST['url']==""){
	echo "<script>alert('链接地址不能为空！');history.go(-1)</script>";
	exit;
}
$sql="update friend set title='".$_POST['title']."',url='".$_POST['url']."' where id='".$_GET['id']."'";
if(mysqli_query($conn,$sql)){
	echo "<script>alert('修改成功！');window.location.href='friend_list.php';</script>";
	exit;
}else{
	echo "<script>alert('修改失败！');window.location.href='friend_list.php';</script>";
	exit;
}
mysqli_close($conn);
?>
