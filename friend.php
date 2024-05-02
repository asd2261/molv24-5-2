<div class="friend">
  <div class="left">友<br />
    情<br />
    链<br />
    接</div>
  <div class="right">
    <?php
	$result_friend=mysqli_query($conn,"select * from friend order by id desc limit 10");
	while($row_friend=mysqli_fetch_array($result_friend)){
	?>
    <a href="<?php echo $row_friend['url'];?>"><?php echo mb_substr($row_friend['title'],0,13,'utf-8');?></a>
    <?php
	}
	mysqli_free_result($result_friend);
	?>
  </div>
</div>