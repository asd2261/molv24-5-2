<div class="sidebar_common" >
  <div class="cattitle">媒体类型</div>
  <div class="catcontent">
    <?php 
	$sql_product_category="select * from product_category"; 
	$result_product_category=mysqli_query($conn,$sql_product_category);
	while($row_product_category=mysqli_fetch_array($result_product_category)){
	?>
    <div class="item">
      <div class="left"><img src="images/icon-bee.png" width="20" height="24" /></div>
      <a class="right" href="product.php?catid=<?php echo $row_product_category['id'];?>&cattitle=<?php echo $row_product_category['title'];?>"><?php echo $row_product_category['title'];?></a> </div>
    <?php
	}
	mysqli_free_result($result_product_category);
	?>
  </div>
</div>
