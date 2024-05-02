<?php
require_once('session.php');
require_once("../public/conn.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加新闻动态文章</title>
<link href="css/table.css" rel="stylesheet" type="text/css" />
<!--引入kindeditor编辑器-->
<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
<script charset="utf-8" src="kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="kindeditor/lang/zh_CN.js"></script>
<script>
	var editor;
	KindEditor.ready(function(K) 
	{
		editor = K.create('textarea[name="content"]', {
		allowFileManager : true
		});
	});
</script>
</head>
<body>
<form id="form1" name="form1" method="post" action="news_add_pass.php">
	<table cellspacing="0" cellpadding="0" align="center">
		<tr>
			<td class="tt" colspan="2">添加新闻动态文章</td>
		</tr>
		<tr>
			<td width="20%"><span style="color:#F30">*</span>标题：</td>
			<td width="80%"><input name="title" type="text" id="title" size="50" /></td>
		</tr>
		<tr>
			<td>来源：</td>
			<td><input name="comefrom" type="text" id="comefrom" value="本站" /></td>
		</tr>
		<tr>
			<td>发布日期：</td>
			<td>
				<input name="pubdate" type="text" id="pubdate" 
				value="<?php date_default_timezone_set('UTC');echo date("Y-m-d");?>" /></td>
		</tr>
		<tr>
			<td><span style="color:#F30">*</span>类别</td>
			<td><select name="catid" size="1"><!--输出新闻动态类别-->
					<option value="">--请选择--</option>
					<?php
          			$result_category=mysqli_query($conn,"select * from news_category");
		  			while($row_category=mysqli_fetch_array($result_category)){
						echo "<option value=".$row_category['id'].">";
						echo $row_category['title'];
						echo "</option>";
		  			}
		  			mysqli_free_result($result_category);
		  			?>
				</select></td>
		</tr>
		<tr>
			<td>关键词：</td>
			<td>
				<textarea name="keywords" cols="60" rows="3" id="keywords"></textarea></td>
		</tr>
		<tr>
			<td>描述：</td>
			<td>
				<textarea name="description" id="description" cols="60" rows="3"></textarea></td>
		</tr>
		<tr>
			<td><span style="color:#F30">*</span>内容：</td>
			<td><textarea name="content" style="width:500px;height:300px;visibility:hidden;"></textarea></td>
		</tr>
		<tr>
			<td colspan="2"><input class="btn" name="Submit" type="submit" value="添加" /></td>
		</tr>
	</table>
</form>
</body>
</html>
