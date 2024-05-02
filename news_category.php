<div class="sidebar_common" >
  <div class="cattitle">新闻类别</div>
  <div class="catcontent">
    <?php 
	$sql_news_category="select * from news_category"; 
	$result_news_category=mysqli_query($conn,$sql_news_category);
	while($row_news_category=mysqli_fetch_array($result_news_category)){
	?>
    <div class="item">
      <div class="left"><img src="images/icon-bee.png" width="20" height="24" /></div>
      <a class="right" href="news.php?catid=<?php echo $row_news_category['id'];?>&cattitle=<?php echo $row_news_category['title'];?>"><?php echo $row_news_category['title'];?></a> </div>
    <?php
	}
	mysqli_free_result($result_news_category);
	?>
  </div>
</div>
