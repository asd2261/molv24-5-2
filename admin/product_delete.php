<?php 
require_once('session.php');
header("Content-type:text/html;charset=utf-8");
require_once('../public/conn.php');
$sql="delete from product where id='".$_GET['id']."'";
if(mysqli_query($conn,$sql)){
    echo "<script>alert('删除成功');window.location.href='product_list.php'</script>";
    exit;
}else{
	echo "<script>alert('删除失败');window.location.href='product_list.php'</script>";
    exit;
}
mysqli_close($conn);
?>
