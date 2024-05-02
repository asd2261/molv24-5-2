<?php
require_once('session.php');
require_once('../public/conn.php');
header("Content-type:text/html;charset=utf-8");


$sql="update tgmessage set title='".$_POST['title']."',name='".$_POST['comefrom']."',pubdate='".$_POST['pubdate'].",',content='".$_POST['content']."',mtlb='".$_POST['mtlb']."' ,wzlb='".$_POST['wzlb']."' where id='".$_GET['id']."'";
if(mysqli_query($conn,$sql)){
    echo "<script>alert('修改成功！');window.location.href='tgmessage.php';</script>";
    exit;
}else{
	echo "<script>alert('修改失败！');window.location.href='tgmessage.php';</script>";
    exit;
	}



mysqli_close($conn);
?>