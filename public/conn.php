﻿
<?php
//创建数据库连接对象
$conn=mysqli_connect("localhost","root","root");
//如果数据库连接对象创建失败，抛出错误信息
if(!$conn)
{
	die('数据库连接失败:' .mysqli_error());
}
//选择要操作的数据库对象
$dbselect=mysqli_select_db($conn,"honey");
//如果数据库选择失败，抛出错误信息
if(!$dbselect)
{
	die('数据库不可用:' .mysql_error());
}
//设置编码为utf8
mysqli_query($conn,"set names utf8");
?>


<script src="https://cdn.bootcss.com/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
        /* 鼠标点击特效 - 7Core.CN */
        var a_idx = 0;jQuery(document).ready(function($) {$("body").click(function(e) {var a = new Array("富强", "民主", "文明", "和谐", "自由", "平等", "公正" ,"法治", "爱国", "敬业", "诚信", "友善");var $i = $("<span/>").text(a[a_idx]);
        a_idx = (a_idx + 1) % a.length;var x = e.pageX,y = e.pageY;$i.css({"z-index": 100000000,"top": y - 20,"left": x,"position": "absolute","font-weight": "bold","color": "#ff6651"});$("body").append($i);$i.animate({"top": y - 180,"opacity": 0},1500,function() {$i.remove();});});});
</script>



