<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>智能内容营销管理入口</title>
<script type="text/javascript">
function check(){
	var admin_name=document.getElementById("admin_name").value;
	var admin_pass=document.getElementById("admin_pass").value;
	var authcode=document.getElementById("authcode").value;
	if(admin_name==""){
		alert("请输入账号！");
		document.getElementById("admin_name").focus();
		return false;
	}else if(admin_pass==""){
		alert("请输入密码！");
		document.getElementById("admin_pass").focus();
		return false;
	}else if(authcode==""){
		alert("请输入验证码！");
		document.getElementById("authcode").focus();
		return false;
	}else{
		document.getElementById("form1").submit();
		return true;
	}
}
</script>
<style type="text/css">
body{background:url(images/loginbg.jpg) left top;}
#form1{width:659px;height:317px;background:url(images/loginbox.png) center center no-repeat;padding-top:100px; position:absolute;top:50%;left:50%;margin-left:-330px;margin-top:-160px;}
#form1 .item{height:50px;}
#form1 .item .text{width:100px;height:50px;line-height:50px;float:left;text-align:right;font-size:14px;margin-left:200px;}
#form1 .item .inputbox{height:50px;float:left;margin-left:10px;float:left;}
#form1 .item .inputbox input{height:30px;line-height:30px;width:227px;margin-top:10px;}
#form1 .item .inputbox input.authcode{width:100px;}
#form1 .submit{margin-top:30px;padding-left:350px;}
</style>
</head>

<body>
<form name="form1" id="form1" action="login_check.php" method="post" onsubmit="return check()">
	<div class="item">
    	<div class="text">账&nbsp;&nbsp;号</div>
        <div class="inputbox">
        	<input type="text" name="admin_name" id="admin_name" />
        </div>
    </div>
    <div class="item">
    	<div class="text">密&nbsp;&nbsp;码</div>
        <div class="inputbox">
        	<input type="password" name="admin_pass" id="admin_pass" />
        </div>
    </div>
     <div class="item">
    	<div class="text">验证码</div>
        <div class="inputbox">
        	<input class="authcode" type="text" name="authcode" id="authcode" />
        </div>
        <div class="inputbox">
        	<a href="javascript:void(0)"
            onClick="document.getElementById('code').src='authcode.php?id='+Math.random()" style="display:block;float:left;height:35px;" title="点击更换验证码！"><img  id="code" src="authcode.php" border="0" width="107" height="41" style="margin-top:6px;margin-left:5px;" /></a>
        </div>
    </div>
    <div class="submit">
    	<input type="image" src="images/loginbtn.png" />
    </div>
</form>
</body>
</html>
