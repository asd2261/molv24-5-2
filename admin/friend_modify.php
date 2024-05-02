<?php
require_once('session.php');
require_once('../public/conn.php');
$sql="select * from friend where id='".$_GET['id']."'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改友情链接</title>
<link href="css/table.css" rel="stylesheet" type="text/css" />
</head>
<body>
<form name="form1" id="form1" action="friend_modify_pass.php?id=<?=$row['id']?>" method="post" >
  <table align="center" cellspacing="0" cellpadding="0">
    <tr>
      <td colspan="2" class="tt">修改友情链接</td>
    </tr>
    <tr>
      <td width="13%"><span style="color:#F60">*</span>标题：</td>
      <td width="87%">
        <input name="title" type="text" id="title" value="<?=$row['title']?>" size="40" />
      </td>
    </tr>
    <tr>
      <td><span style="color:#F60">*</span>链接地址：</td>
      <td>
        <input name="url" type="text" id="url" value="<?=$row['url']?>" size="40" />
      </td>
    </tr>
    <tr>
      <td colspan="2">
        <input name="button" type="submit" class="btn" id="button" value="修改" />
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