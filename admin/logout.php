<?php 
require_once'session.php';
header("Content-type:text/html;charset=utf-8");
session_unset();
session_destroy(); 
echo "<script>alert('退出成功!');window.parent.location.href='../index.php'</script>"
?>