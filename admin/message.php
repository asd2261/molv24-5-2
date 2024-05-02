<?php
require_once('session.php');
require_once('../public/conn.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>留言列表</title>
<link href="css/table.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table align="center" cellspacing="0" cellpadding="0">
  <tr>
    <td class="tt" colspan="8">留言列表</td>
  </tr>
  <tr>
    <td width="13%" height="29"><strong>标题</strong></td>
    <td width="11%"><strong>称呼</strong></td>
    <td width="11%"><strong>手机</strong></td>
    <td width="8%"><strong>QQ</strong></td>
    <td width="8%">邮箱</td>
    <td width="30%"><strong>内容</strong></td>
    <td width="15%"><strong>是否处理</strong></td>
    <td width="12%"><strong>操作</strong></td>
  </tr>
  <?php
	//记录的总条数
	$total_num=mysqli_num_rows(mysqli_query($conn,"select id from message"));
	//每页记录数
	$pagesize=5;
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
	//记录的偏移量
	$offset=$pagesize*($page-1);
	//上一页、下一页
	$prepage=($page<>1)?$page-1:$page;
	$nextpage=($page<>$page_num)?$page+1:$page;
	$result=mysqli_query($conn,"select * from message  order by id desc limit $offset,$pagesize");
	if($total_num>0){
   		while($row=mysqli_fetch_array($result)){
  ?>
  <tr>
    <td><?php echo $row['title']?></td>
    <td><?php echo $row['name']?></td>
    <td><?php echo $row['tel']?></td>
    <td><?php echo $row['qq']?></td>
    <td><?php echo $row['email']?></td>
    <td><?php echo $row['content']?></td>
    <td>
    <?php if($row['deal']=='否'){?>
    <a href="message_deal.php?deal=yes&id=<?=$row['id']?>" title="点击设置为已处理">
    	<img border="0" src="images/no.png"></a>
    <?php }else{?>
    <a href="message_deal.php?deal=no&id=<?=$row['id']?>" title="点击设置为未处理">
    	<img border="0" src="images/ok.png"></a>
    <?php }?>
    </td>
    <td>
      <input name="button2" type="submit" class="btn" id="button2" onclick="window.location.href='message_delete.php?id=<?php echo $row['id']?>'" value="删除" />
    </td>
  </tr>
  <?php
	}
  }else{
	 echo "<tr><td colspan='5' height='31' style='color:red;font-size:13px'>暂无记录</td></tr>";
  }
 ?>
  <tr>
    <td height="43" colspan="8" align="center">
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
mysqli_free_result($result);
mysqli_close($conn);
?>