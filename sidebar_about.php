<div class="sidebar_common">
  <div class="cattitle">关于我们</div>
  <div class="catcontent">
    <?php 
	$sql_about="select * from about"; 
	$result_about=mysqli_query($conn,$sql_about);
	while($row_about=mysqli_fetch_array($result_about)){
	?>
    <div class="item">
      <div class="left"><img src="images/icon-bee.png" width="20" height="24" /></div>
      <a class="right" href="about.php?id=<?php echo $row_about['id'];?>"><?php echo $row_about['title'];?></a> </div>
    <?php
	}
	mysqli_free_result($result_about);
	?>
  </div>
</div>
