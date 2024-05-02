<?php
require_once'../public/conn.php';
$sql_content="select * from news where id='".$_GET['id']."'";
$result_content=mysql_query($sql_content);
$row_content=mysql_fetch_array($result_content);
$path=date("Y-m-d")."-".$row_content['id'].'.html';
$fp=fopen("../template/news_template.html","r");
$str=fread($fp,filesize("../template/news_template.html"));
$str=str_replace("{-title-}",$row_content['title'],$str);
$str=str_replace("{-content-}",$row_content['content'],$str);
fclose($fp);
$handle=fopen("../html/".$path,"w"); 
fwrite($handle,$str);
echo "<font color='red'>正在生成</font><br>";
echo "$path";
fclose($handle);
echo "<script>alert('生成成功！');window.location.href='news_list.php';</script>";
mysql_close($conn);
?>
