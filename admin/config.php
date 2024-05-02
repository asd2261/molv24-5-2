<?php
require_once('session.php');
require_once('../public/conn.php');
$sql="select * from config";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>网站基本配置</title>
<link href="css/table.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
<script charset="utf-8" src="kindeditor/kindeditor-min.js"></script>
<script charset="utf-8" src="kindeditor/lang/zh_CN.js"></script>
<script>
	var editor;
	KindEditor.ready(function(K) 
	{
	var editor = K.editor({
					allowFileManager : true
				});
	//上传logo
	K('#image3').click(function() {
					editor.loadPlugin('image', function() {
						editor.plugin.imageDialog({
							showRemote : true,
							imageUrl : K('#site_logo').val(),
							clickFn : function(url, title, width, height, border, align) {
								K('#site_logo').val(url);
								editor.hideDialog();
							}
						});
					});
				});
	//上传公司二维码			
	K('#image4').click(function() {
					editor.loadPlugin('image', function() {
						editor.plugin.imageDialog({
							showRemote : true,
							imageUrl : K('#company_ewm').val(),
							clickFn : function(url, title, width, height, border, align) {
								K('#company_ewm').val(url);
								editor.hideDialog();
							}
						});
					});
				});			
			});
</script>
</head>
<body>
<form id="form1" name="form1" method="post" action="?act=save">
	<table cellpadding="0" cellspacing="0" align="center">
		<tr>
			<td class="tt" colspan="2">设置网站信息</td>
		</tr>
		<tr>
			<td width="20%">网站标题</td>
			<td width="80%"><input name="site_title" type="text" id="site_title" value="<?=$row['site_title']?>" size="40" /></td>
		</tr>
		<tr>
			<td>网站logo</td>
			<td><input name="site_logo" type="text" id="site_logo" size="40" value="<?=$row['site_logo']?>" />
				<input type="button" class="btn" id="image3" value="上传" /></td>
		</tr>
		<tr>
			<td>公司的二维码</td>
			<td><input name="company_ewm" type="text" id="company_ewm" value="<?=$row['company_ewm']?>" size="40" />
				<input type="button" class="btn" id="image4" value="上传" /></td>
		</tr>
		<tr>
			<td>网站地址</td>
			<td><input name="site_url" type="text" id="site_url" value="<?=$row['site_url']?>" size="40" /></td>
		</tr>
		<tr>
			<td>网站关键字</td>
			<td><textarea name="site_keywords" id="site_keywords" cols="60" rows="5" ><?=$row['site_keywords']?>
</textarea></td>
		</tr>
		<tr>
			<td>网站描述</td>
			<td><textarea name="site_description" id="site_description" cols="60" rows="5"><?=$row['site_description']?>
</textarea></td>
		</tr>
		<tr>
			<td>底部版权信息</td>
			<td><textarea name="site_copyright" id="site_copyright" cols="60" rows="5"><?=$row['site_copyright']?>
</textarea></td>
		</tr>
		<tr>
			<td>公司名称</td>
			<td><input name="company_name" type="text" id="company_name" value="<?=$row['company_name']?>" size="40" /></td>
		</tr>
		<tr>
			<td>联系电话</td>
			<td><input name="company_phone" type="text" id="company_phone" value="<?=$row['company_phone']?>" size="40" /></td>
		</tr>
		<tr>
			<td>QQ客服</td>
			<td><input name="company_qq" type="text" id="company_qq" value="<?=$row['company_qq']?>" size="40" /></td>
		</tr>
		<tr>
			<td>电子邮箱 </td>
			<td><input name="company_email" type="text" id="company_email" value="<?=$row['company_email']?>" size="40" /></td>
		</tr>
		<tr>
			<td>微信</td>
			<td><input name="company_weixin" type="text" id="company_weixin" value="<?=$row['company_weixin']?>" size="40" /></td>
		</tr>
		<tr>
			<td>公司地址</td>
			<td><input name="company_address" type="text" id="company_address" size="60" value="<?=$row['company_address']?>" /></td>
		</tr>
		<tr>
			<td colspan="2"><input name="button" type="submit" class="btn" id="button" value="保存" /></td>
		</tr>
	</table>
</form>
</body>
</html>
<?php
if($_GET['act']=='save'){
	$sql="update config set site_title='".$_POST['site_title']."',site_logo='".$_POST['site_logo']."',company_ewm='".$_POST['company_ewm']."',site_url='".$_POST['site_url']."',site_keywords='".$_POST['site_keywords']."',site_description='".$_POST['site_description']."',site_copyright='".$_POST['site_copyright']."',company_name='".$_POST['company_name']."',company_phone='".$_POST['company_phone']."',company_qq='".$_POST['company_qq']."',company_email='".$_POST['company_email']."',company_weixin='".$_POST['company_weixin']."',company_address='".$_POST['company_address']."'";
	if(mysqli_query($conn,$sql)){
		echo"<script>alert('保存成功！');window.location.href='config.php'</script>";
		exit;
	}else{
		echo"<script>alert('保存失败！');window.locaiton.href='config.php'</script>";
		exit;
	}
}
mysqli_free_result($result);
mysqli_close($conn);
?>