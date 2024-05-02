<?php
require_once('session.php');
require_once("../public/conn.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加产品</title>
<link href="css/table.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
<script charset="utf-8" src="kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="kindeditor/lang/zh_CN.js"></script>
<script type="text/javascript">
var editor;
KindEditor.ready(function(K) 
{
	editor = K.create('textarea[name="content"]', {
		allowFileManager : true
	});
	K('#image3').click(function() {
		editor.loadPlugin('image', function() {
			editor.plugin.imageDialog({
				showRemote : true,
				imageUrl : K('#url3').val(),
				clickFn : function(url, title, width, height, border, align) {
					K('#url3').val(url);
					editor.hideDialog();
				}
			});
		});
	});
});
</script>
</head>
<body>
<form id="form1" name="form1" method="post" action="product_add_pass.php">
  <table align="center" cellspacing="0" cellpadding="0">
    <tr>
      <td class="tt" colspan="2">添加媒体</td>
    </tr>
    <tr>
      <td width="20%"><span style="color:#F30">*</span>标题：</td>
      <td width="80%">
        <input name="title" type="text" id="title" size="50" />
      </td>
    </tr>
    <tr>
      <td>来源：</td>
      <td>
        <input name="comefrom" type="text" id="comefrom" value="本站" />
      </td>
    </tr>
    <tr>
      <td>发布日期：</td>
      <td>
        <input name="pubdate" type="text" id="pubdate" value="<?php 
	  date_default_timezone_set('UTC');
	  echo date("Y-m-d");
	  ?>" />
      </td>
    </tr>
    <tr>
      <td>媒体编号：</td>
      <td>
        <input name="numeration" type="text" id="numeration" />
      </td>
    </tr>
    <tr>
      <td>投稿价格：</td>
      <td>
        <input name="price" type="text" id="price" />
      </td>
    </tr>
    <tr>
      <td><span style="color:#F30">*</span>媒体类别：</td>
      <td>
        <select name="catid" size="1">
          <option value="">--请选择--</option>
          <?php
          $result_category=mysqli_query($conn,"select * from product_category");
		  while($row_category=mysqli_fetch_array($result_category)){
		  ?>
          <option value="<?php echo $row_category['id'];?>"><?php echo $row_category['title'];?></option>
          <?php
		  }
		  mysqli_free_result($result_category);
		  ?>
        </select>
      </td>
    </tr>
    <tr>
      <td>缩略图：</td>
      <td>
        <input name="thumbnail" type="text" id="url3" value="" />
        <input type="button" id="image3" value="选择图片" />
        (建议大小为：162*177)</td>
    </tr>
    <tr>
      <td>关键词：</td>
      <td>
        <label for="keywords"></label>
        <textarea name="keywords" cols="60" rows="3" id="keywords"></textarea>
      </td>
    </tr>
    <tr>
      <td>描述：</td>
      <td>
        <label for="description"></label>
        <textarea name="description" id="description" cols="60" rows="3"></textarea>
      </td>
    </tr>
    <tr>
      <td><span style="color:#F30">*</span>内容：</td>
      <td>
        <textarea name="content" style="width:500px;height:300px;visibility:hidden;"></textarea>
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <input name="Submit" type="submit" class="btn" value="添加" />
      </td>
    </tr>
  </table>
</form>
</body>
</html>
