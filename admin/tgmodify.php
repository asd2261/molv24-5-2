<?php
session_start();
require_once('session.php');
require_once("../public/conn.php");
$sql="select * from tgmessage where id='".$_GET['id']."'";
$result=mysqli_query($conn,$sql);
$rs=mysqli_fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改新闻动态文章</title>
<link href="css/table.css" rel="stylesheet" type="text/css" />
<!--引入kindeditor编辑器开始-->
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
<!--引入kindeditor编辑器结束-->
</head>
<body>
<form id="form1" name="form1" method="post" action="tgmodify_pass.php?id=<?=$rs['id']?>">
	<table cellspacing="0" cellpadding="0">
		<tr>
			<td class="tt" colspan="2">修改投稿新闻动态文章</td>
		</tr>
		<tr>
			<td width="20%"><span style="color:#F30">*</span>标题：</td>
			<td width="80%"><input name="title" type="text" id="title" size="50" value="<?=$rs['title']?>" /></td>
		</tr>
		<tr>
			<td>称呼：</td>
			<td><input name="comefrom" type="text" id="comefrom" value="<?=$rs['name']?>" /></td>
		</tr>
		<tr>
			<td>发布日期：</td>
			<td><input name="pubdate" type="text" id="pubdate" value="<?=$rs['pubdate']?>" /></td>
		</tr>
		<tr>
			<td><span style="color:#F30">*</span>媒体类别</td>
			<td><select name="mtlb" size="1">
    <option value="">--请选择--</option>
    <?php
        $result_category = mysqli_query($conn, "select * from product_category");
        $second_value = explode(',', $_GET['id'])[1];
        while ($row_category = mysqli_fetch_array($result_category)) {
            echo "<option value=" . $row_category['id'] . " ";
            if ($second_value == $row_category['title']) {
                echo "selected='selected'";
            }
            echo ">";
            echo $row_category['title'];
            echo "</option>";
        }
        mysqli_free_result($result_category);
    ?>
</select>
</td>
		</tr>
		<tr>
			<td><span style="color:#F30">*</span>文章类别</td>
			<td><select name="wzlb" size="1">
    <option value="">--请选择--</option>
    <?php
        $result_category = mysqli_query($conn, "select * from news_category");
        $second_value = explode(',', $_GET['id'])[2];
        while ($row_category = mysqli_fetch_array($result_category)) {
            echo "<option value=" . $row_category['id'] . " ";
            if ($second_value == $row_category['title']) {
                echo "selected='selected'";
            }
            echo ">";
            echo $row_category['title'];
            echo "</option>";
        }
        mysqli_free_result($result_category);
    ?>
</select></td>
		</tr>
		<tr>
			<td>邮箱：</td>
			<td><input name="comefrom" type="text" id="comefrom" value="<?=$rs['email']?>" /></td>
		</tr>
		<tr>
			<td><span style="color:#F30">*</span>内容：</td>
			<td><textarea name="content" style="width:500px;height:300px;visibility:hidden;">
			<?=htmlspecialchars($rs['content'])?></textarea></td>
		</tr>
		<tr>
			<td colspan="2"><input class="btn" name="Submit" type="submit"  value="修改" /></td>
		</tr>
	</table>
</form>
</body>
</html>
<?php
mysqli_free_result($result);
mysqli_close($conn);
?>