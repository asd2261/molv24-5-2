<?php
require_once('session.php');
require_once ('../public/conn.php');
//查询所要修改的记录
$sql="select * from admin where id='".$_GET['id']."'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改管理员信息</title>
<link href="css/table.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!--说明：表单标签的action属性中，属性值为表单提交地址，并传递所修改记录id; 对账号，通常设置为不可修改，但可以修改密码-->
<form name="form_add" id="form_add" action="admin_modify_pass.php?id=<?=$row['id']?>" method="post" >
	<table align="center" cellspacing="0" cellpadding="0">
		<tr>
			<td class="tt" colspan="2">修改管理员</td>
		</tr>
		<tr>
			<td width="23%"><span style="color:#F30">*</span>账号</td>
			<td width="77%"><input name="admin_name" type="text" id="admin_name" size="30" value="<?=$row['admin_name']?>" disabled='disabled' /></td>
		</tr>
		<tr>
			<td><span style="color:#F30">*</span>密码</td>
			<td><input name="admin_pass" type="password" id="admin_pass" size="31"  />
				&nbsp;(请输入新密码！)</td>
		</tr>
		<tr>
			<td colspan="2" class="btn"><input class="btn" type="submit" name="button" id="button" value="修改" /></td>
		</tr>
	</table>
</form>
</body>
</html>