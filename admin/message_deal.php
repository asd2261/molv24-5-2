<?php
require_once('session.php');
require_once('../public/conn.php');
header("Content-type:text/html;charset=utf-8");
if($_GET['deal']=="yes"){
	mysqli_query($conn,"update message set deal='是' where id='".$_GET['id']."'");
	echo "<script>alert('已设置为\"已处理\"！');window.location.href='message.php';</script>";
}
if($_GET['deal']=="no"){
	mysqli_query($conn,"update message set deal='否' where id='".$_GET['id']."'");
	echo "<script>alert('已设置为\"未处理\"！');window.location.href='message.php';</script>";
}
mysqli_close($conn);
?>