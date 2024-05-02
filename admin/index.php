<?php
require_once('session.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/main.css" rel="stylesheet" type="text/css">
<title>鲸准未来管理后台</title>
</head>
<frameset rows="118,*,30" cols="*" frameborder="No" border="0" framespacing="0">
  <frame src="top.php" name="top" scrolling="No" noresize="noresize" id="top" title="topFrame" />
  <frameset rows="*" cols="190,*" framespacing="0" frameborder="no" border="0">
    <frame src="left.php" name="left" scrolling="auto" noresize="noresize" id="left" title="leftFrame" />
    <frame src="right.php" name="right" scrolling="yes" noresize="noresize" id="right" title="rightFrame" />
  </frameset>
  <frame src="bottom.php" name="bottom" scrolling="No" noresize="noresize" id="bottom" title="bottomFrame" />
</frameset>
<noframes>
<body>
</body>
</noframes>
</html>
