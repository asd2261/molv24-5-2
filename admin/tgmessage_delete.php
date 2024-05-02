<?php
require_once('session.php');
require_once('../public/conn.php');
header("Content-type:text/html;charset=utf-8");
$sql="delete from tgmessage where id='".$_GET['id']."'";
mysqli_query($conn,$sql);
echo "<script>alert('删除成功！');window.location.href='tgmessage.php';</script>";
mysqli_close($conn);
?>