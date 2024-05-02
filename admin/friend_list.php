<?php
require_once('session.php');
require_once('../public/conn.php');
//记录的总条数
$total_num=mysqli_num_rows(mysqli_query($conn,"select id from friend"));
//每页记录数
$pagesize=10;
//总页数
$page_num=ceil($total_num/$pagesize);
//设置页数
$page=$_GET['page'];
if($page<1 || $page==''){
	$page=1;
	}
if($page>$page_num){
	$page=$page_num;
	}
//计算机记录的偏移量
$offset=$pagesize*($page-1);
//上一页、下一页
$prepage=($page<>1)?$page-1:$page;
$nextpage=($page<>$page_num)?$page+1:$page;
$result=mysqli_query($conn,"select * from friend order by id desc limit $offset,$pagesize");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>友情链接列表</title>
<link href="css/table.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table align="center" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="3" class="tt">友情链接列表</td>
  </tr>
  <tr>
    <td>标题</td>
    <td width="40%">链接</td>
    <td width="22%">操作</td>
  </tr>
  <tr>
    <?php
	if($total_num>0){
	while($row=mysqli_fetch_array($result)){
	?>
    <td width="38%"><?php echo $row['title']?></td>
    <td><?php echo $row['url']?></td>
    <td>
      <input name="button" type="submit" class="btn" id="button" onclick="window.location.href='friend_modify.php?id=<?=$row['id']?>'" value="修改" />
      &nbsp;&nbsp;
      <input name="button2" type="button" class="btn" id="button2" onclick="window.location.href='friend_delete.php?id=<?=$row['id']?>'" value="删除" />
    </td>
  </tr>
  <?php
		}
		mysqli_free_result($result); 
	}else{
	  echo "<tr><td colspan='5' height='31' style='color:red;font-size:13px'>暂无记录</td></tr>";
	  }
	?>
  <tr>
    <td colspan="3" align="center">
      <?=$page?>/<?=$page_num?>&nbsp;&nbsp; 
      <a href="?page=1">首页</a>&nbsp;&nbsp; 
      <a href="?page=<?=$prepage?>">上一页</a>&nbsp;&nbsp; 
      <a href="?page=<?=$nextpage?>">下一页</a>&nbsp;&nbsp; 
      <a href="?page=<?=$page_num?>"> 尾页</a></td>
  </tr>
</table>
</body>
</html>
<?php
mysqli_close($conn);
?>