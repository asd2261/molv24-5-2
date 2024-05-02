<?php
require_once('session.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加管理员</title>
<link rel="stylesheet" href="css/table.css" />
</head>
<body>
<form name="form_add" id="form_add" action="admin_add_pass.php" method="post" >
	<table cellspacing="0" cellpadding="0" align="center">
		<tr>
			<td class="tt" colspan="2">添加管理员</td>
		</tr>
		<tr>
			<td width="23%"><span style="color:#F30">*</span>账号</td>
			<td width="77%"><input name="admin_name" type="text" id="admin_name" size="30" /></td>
		</tr>
		<tr>
			<td><span style="color:#F30">*</span>密码</td>
			<td><input name="admin_pass" type="password" id="admin_pass" size="31" /></td>
		</tr>
		<tr>
			<td colspan="2" class="btn"><input class="btn" type="submit" name="button" id="button" value="添加" /></td>
		</tr>
	</table>
</form>
</body>
</html>