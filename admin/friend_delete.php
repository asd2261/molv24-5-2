﻿<?php 
require_once('session.php');
require_once('../public/conn.php');
header("Content-type:text/html;charset=utf-8");
$sql="delete from friend where id='".$_GET['id']."'";
if(mysqli_query($conn,$sql)){
	echo "<script>alert('删除成功');window.location.href='friend_list.php'</script>";
	exit;
}else{
	echo "<script>alert('删除失败');window.location.href='friend_list.php'</script>";
	exit;
}
mysqli_close($conn);
?>