<?php
require_once('session.php');
require_once("../public/conn.php");
$sql="select * from about where id='".$_GET['id']."'";
$result=mysqli_query($conn,$sql);
$rs=mysqli_fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改关于花公子信息</title>
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
<form id="form1" name="form1" method="post" action="about_modify_pass.php?id=<?=$rs['id']?>">
	<table width="100%" cellspacing="0" cellpadding="0">
		<tr>
			<td class="tt" colspan="2">修改关于花公子文章</td>
		</tr>
		<tr>
			<td width="20%"><span style="color:#F30">*</span>标题：</td>
			<td width="80%"><input name="title" type="text" id="title" size="50" value="<?=$rs['title']?>" /></td>
		</tr>
		<tr>
			<td>来源：</td>
			<td><input name="comefrom" type="text" id="comefrom" value="<?=$rs['comefrom']?>" /></td>
		</tr>
		<tr>
			<td>发布日期：</td>
			<td><input name="pubdate" type="text" id="pubdate" value="<?=$rs['pubdate']?>"  /></td>
		</tr>
		<tr>
			<td>关键词：</td>
			<td><label for="keywords"></label>
				<textarea name="keywords" cols="60" rows="3" id="keywords"><?=$rs['keywords']?>
</textarea></td>
		</tr>
		<tr>
			<td>描述：</td>
			<td><label for="description"></label>
				<textarea name="description" id="description" cols="60" rows="3"><?=$rs['description']?>
</textarea></td>
		</tr>
		<tr>
			<td><span style="color:#F30">*</span>内容：</td>
			<td><textarea name="content" style="width:500px;height:300px;visibility:hidden;"><?=htmlspecialchars($rs['content'])?>
</textarea></td>
		</tr>
		<tr>
			<td>栏目起始页：</td>
			<td><input name="firstpage" type="radio" id="firstpage" value="是" <?php if($rs['firstpage']=="是"){echo "checked='checked'";}?> />
				是&nbsp;&nbsp;&nbsp;&nbsp;
				<input name="firstpage" type="radio" id="firstpage" value="" <?php if(empty($rs['firstpage'])){echo "checked='checked'";}?> />
				否 </td>
		</tr>
		<tr>
			<td colspan="2"><input class="btn" type="submit" name="Submit" value="修改" /></td>
		</tr>
	</table>
</form>
</body>
</html>
<?php
mysqli_free_result($result);
mysqli_close($conn);
?>
