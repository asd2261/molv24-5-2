<?php
require_once('session.php');
require_once ('../public/conn.php');
header("Content-type:text/html;charset=utf-8");
//接收表单传递的值
$admin_name=$_POST['admin_name'];
$admin_pass=$_POST['admin_pass'];
//账号非空判断及可用性判断
if ($admin_name==""){
	echo "<script>alert('账号不能为空！');history.go(-1)</script>";
	exit;
}elseif(mysqli_fetch_array(mysqli_query($conn,"select * from admin where admin_name='".$_POST['admin_name']."'"))>0){
	echo "<script>alert('该账号已存在，请重新输入！');window.location.href='admin_add.php'</script>";
	exit;
	}
//密码非空判断
if ($admin_pass==""){
	echo "<script>alert('密码不能为空！');history.go(-1)</script>";
	exit;
}
$sql_add="insert into admin (admin_name,admin_pass) values ('".$admin_name."','".$admin_pass."')";
if(mysqli_query($conn,$sql_add)){
	echo "<script>alert('添加成功！');window.location.href='admin_list.php';</script>";
	exit;
}else{
	echo "<script>alert('添加失败！');window.location.href='admin_add.php';</script>";
	exit;
}
mysqli_close($conn);
?>
