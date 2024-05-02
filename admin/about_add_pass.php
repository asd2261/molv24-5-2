<?php
require_once'session.php';
require_once'../public/conn.php';
header("Content-type:text/html;charset=utf-8");
//对标题进行非空判断
if(empty($_POST['title'])){
	echo"<script>alert('标题不能为空！');history.back();</script>";
	exit;
	}
//对内容进行非空判断
if(empty($_POST['content'])){
	echo"<script>alert('内容不能为空！');history.back();</script>";
	exit;
	}
//处理栏目起始页
$result_firstpage=mysqli_query($conn,"select id from about where firstpage='是'");
$firstpage_num=mysqli_num_rows($result_firstpage);
if(!empty($_POST['firstpage']) && $firstpage_num>0){
		mysql_query("update about set firstpage=''");
}
mysqli_free_result($result_firstpage);
$sql="insert into about (title,comefrom,pubdate,keywords,description,content,firstpage) values ('".$_POST['title']."','".$_POST['comefrom']."','".$_POST['pubdate']."','".$_POST['keywords']."','".$_POST['description']."','".$_POST['content']."','".$_POST['firstpage']."')";
if(mysqli_query($conn,$sql)){
    echo "<script>alert('添加成功！');window.location.href='about_list.php';</script>";
	exit;
}else{
	echo "<script>alert('添加失败！');window.location.href='about_list.php';</script>";
	exit;
}
mysqli_close($conn);
?>
