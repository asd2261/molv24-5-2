<?php
require_once('session.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加友情链接</title>
<link href="css/table.css" rel="stylesheet" type="text/css" />
</head>
<body>
<form name="form1" id="form1" action="friend_add_pass.php" method="post" >
  <table align="center" cellspacing="0" cellpadding="0">
    <tr>
      <td colspan="2" class="tt">添加友情链接</td>
    </tr>
    <tr>
      <td width="16%"><span style="color:#F60">*</span>标题：</td>
      <td width="84%">
        <input name="title" type="text" id="title" size="40" />
      </td>
    </tr>
    <tr>
      <td><span style="color:#F60">*</span>链接地址：</td>
      <td>
        <input name="url" type="text" id="url" size="40" />
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <input name="button" type="submit" class="btn" id="button" value="添加" />
      </td>
    </tr>
  </table>
</form>
</body>
</html>
