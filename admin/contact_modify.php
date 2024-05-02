<?php
require_once('session.php');
require_once("../public/conn.php");
$sql="select * from contact";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>编辑联系我们</title>
<link href="css/table.css" rel="stylesheet" type="text/css" />
<!--引入kindeditor编辑器-->
<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
<script charset="utf-8" src="kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="kindeditor/lang/zh_CN.js"></script>
<script type="text/javascript">
var editor;
KindEditor.ready(function(K) {
	editor = K.create('textarea[name="content"]', {
	allowFileManager : true
	});
});
</script>
</head>
<body>
<form id="form1" name="form1" method="post" action="contact_modify_pass.php">
  <table cellspacing="0" cellpadding="0">
    <tr>
      <td class="tt" colspan="2">编辑联系我们</td>
    </tr>
    <tr>
      <td width="20%"><span style="color:#F30">*</span>标题：</td>
      <td width="80%">
        <input name="title" type="text" id="title" size="50" value="<?=$row['title']?>" />
      </td>
    </tr>
    <tr>
      <td>来源：</td>
      <td>
        <input name="comefrom" type="text" id="comefrom" value="<?=$row['comefrom']?>" />
      </td>
    </tr>
    <tr>
      <td>发布日期：</td>
      <td>
        <input name="pubdate" type="text" id="pubdate" value="<?=$row['pubdate']?>"  />
      </td>
    </tr>
    <tr>
      <td>关键词：</td>
      <td>
        <label for="keywords"></label>
        <textarea name="keywords" cols="60" rows="3" id="keywords"><?=$row['keywords']?>
</textarea>
      </td>
    </tr>
    <tr>
      <td>描述：</td>
      <td>
        <label for="description"></label>
        <textarea name="description" id="description" cols="60" rows="3"><?=$row['description']?>
</textarea>
      </td>
    </tr>
    <tr>
      <td><span style="color:#F30">*</span>内容：</td>
      <td>
        <textarea name="content" style="width:500px;height:300px;visibility:hidden;"><?=htmlspecialchars($row['content'])?>
</textarea>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <input class="btn" type="submit" name="Submit" value="保存" />
      </td>
    </tr>
  </table>
</form>
</body>
</html>
<?php
mysqli_free_result($result);
mysqli_close($conn);
?>
