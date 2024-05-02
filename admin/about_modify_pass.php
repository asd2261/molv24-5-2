<?php
require_once('session.php');
require_once('../public/conn.php');
header("Content-type:text/html;charset=utf-8");
if(empty($_POST['title'])){
	echo"<script>alert('标题不能为空！');history.back();</script>";
	exit;
	}
if(empty($_POST['content'])){
	echo"<script>alert('内容不能为空！');history.back();</script>";
	exit;
	}
//处理栏目起始页
$result_firstpage=mysqli_query($conn,"select id from about where firstpage='是'");
$row_firstpage=mysqli_fetch_array($result_firstpage);
$firstpage_num=mysqli_num_rows($result_firstpage);
if($firstpage_num>0 && $row_firstpage['id']!=$_GET['id']){
	mysqli_query($conn,"update about set firstpage=''");
}
mysqli_free_result($result_firstpage);
$sql="update about set title='".$_POST['title']."',comefrom='".$_POST['comefrom']."',pubdate='".$_POST['pubdate']."',keywords='".$_POST['keywords']."',description='".$_POST['description']."',content='".$_POST['content']."',firstpage='".$_POST['firstpage']."' where id='".$_GET['id']."'";
if(mysqli_query($conn,$sql)){
    echo "<script>alert('修改成功！');window.location.href='about_list.php';</script>";
    exit;
}else{
	echo "<script>alert('修改失败！');window.location.href='about_list.php';</script>";
    exit;
	}
mysql_close($conn);
?>