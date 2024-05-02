<link rel="shortcut icon" href="images/1.ico" type="image/x-icon" />
<table width="1400" border="0" align="center" cellpadding="0" cellspacing="0">
  <tbody>
    <tr>
      <td><table width="1200" border="0" align="center" cellpadding="0" cellspacing="0">
        <tbody>
          <tr>
            <td width="400" height="100"><img src="images/logo.png" width="365" height="100" alt=""/></td>
            <td align="right"><table width="25%" border="0" cellspacing="0" cellpadding="0">
              <tbody>
                <tr>
                  <td width="45" height="22"><img src="images/phone.fw.png" width="33" height="22" alt=""/></td>
                  <td class="dhua">0311-1234567</td>
                </tr>
              </tbody>
            </table></td>
          </tr>
        </tbody>
      </table>
        <table width="1400" border="0" cellspacing="0" cellpadding="0">
          <tbody>
            <tr>
              <td height="10">
              </td>
            </tr>
          </tbody>
        </table>
        <table width="1400" border="0" cellspacing="0" cellpadding="0">
          <tbody>
            <tr>
              <td height="45" bgcolor="#78d52e" id="nav">
              	<ul>
              	    <li><a href="index.php">首页</a></li>
              	<?php 
					$result=mysqli_query($conn,"select * from class where uid=0");
					while($arr=mysqli_fetch_array($result)){
				?>
              		<li><a href="#"><?php echo $arr["classname"];?></a></li>
              		<?php }?>
              	</ul>
              </td>
            </tr>
          </tbody>
      </table>
        <table width="1400" border="0" align="center" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td height="6"></td>
            </tr>
          </tbody>
        </table>
        <table width="1400" border="0" align="center" cellpadding="0" cellspacing="0">
          <tbody>
            <tr>
              <td height="474">
				<div id="divout">
        <div class="imgdiv" style="display: block">
            <img src="images/banner/1.png" alt="">
            <div class="title">202101130412</div>
        </div>
        <div class="imgdiv">
            <img src="images/banner/2.jpg" alt="">
            <div class="title">202101130412</div>
        </div>
        <div class="imgdiv">
            <img src="images/banner/3.jpg" alt="">
            <div class="title">202101130412</div>
        </div>
        <div class="imgdiv">
            <img src="images/banner/4.jpg" alt="">
            <div class="title">202101130412</div>
        </div>
		<div class="imgdiv">
            <img src="images/banner/5.png" alt="">
            <div class="title">202101130412</div>
        </div>
		<div class="imgdiv">
            <img src="images/banner/6.jpg" alt="">
            <div class="title">202101130412</div>
        </div>
		<div class="imgdiv">
            <img src="images/banner/7.jpg" alt="">
            <div class="title">202101130412</div>
        </div>
        <div class="dotdiv">
            <span class="dot active"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
			<span class="dot"></span>
			<span class="dot"></span>
			<span class="dot"></span>
        </div>
        <div id="arrow">
            <img src="images/zjt.fw.png" alt="" width="35" onClick="picplay(false)">
            <img src="images/yjt.fw.png" width="35" alt="" align="right" onClick="picplay(true)">
        </div>
    </div>
				</td>
            </tr>
          </tbody>
      </table>
