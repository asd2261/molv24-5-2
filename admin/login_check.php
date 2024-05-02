<?php
session_start();
//引入数据库连接文件
require_once('../public/conn.php');
//设置该页面的编码为utf-8
header("Content-Type:text/html;charset=utf-8");
//接收表单传递过来的值并赋给相应的变量
$admin_name=$_POST['admin_name'];
$admin_pass=$_POST['admin_pass'];
$authcode=$_POST['authcode'];
//判断输入的验证码是否正确
if(strtolower($_POST["authcode"]!=$_SESSION["authcode"])) {
	echo"<script>alert('验证码不正确，请重新输入！');history.back()</script>";
	exit;
}
//将查询语句赋给变量$sql
$sql="select * from admin where admin_name='".$admin_name."' and admin_pass='".$admin_pass."'";
//执行sql语句，并将结果返回给变量$result,实际上，返回的结果是一个数组
$result=mysqli_query($conn,$sql);
if($result){
//获取$result数组中记录的行数
$row=mysqli_num_rows($result);
//判断是否找到相应的数据记录
if ($row>0) {
	$_SESSION['ischecked']="ok";
	$_SESSION['admin_name']=$_POST['admin_name'];
    echo "<script>alert('登陆成功!');window.location.href='index.php'</script>";
	exit;
}else{	
	echo "<script>alert('你的帐号或密码不正确!');window.location.href='login.php'</script>";
	exit;
	}
}
//关闭数据库连接
mysqli_close($conn);
?>
