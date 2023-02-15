<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<?php  
				    $getlastestApple = $product->getlastestApple();
					if($getlastestApple){
						while($resultapple = $getlastestApple->fetch_assoc()){
				?>
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a> <img src="admin/uploads/<?php echo $resultapple['image']?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Apple</h2>
						<p><?php echo $resultapple['productName']?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resultapple['productId']?>">Add to cart</a></span></div>
				   </div>
			   </div>
			   <?php
					}
				}
			   ?>
			   <?php  
				    $getlastestSamsung = $product->getlastestSamsung();
					if($getlastestSamsung){
						while($resultsamsung = $getlastestSamsung->fetch_assoc()){
				?>			
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a><img src="admin/uploads/<?php echo $resultsamsung['image']?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Samsung</h2>
						  <p><?php echo $resultsamsung['productName']?></p>
						  <div class="button"><span><a href="details.php?proid=<?php echo $resultsamsung['productId']?>">Add to cart</a></span></div>
					</div>
				</div>
				<?php
						}
					}
				?>
			</div>
			<?php  
				$getlastestToshiba = $product->getlastestToshiba();
				if($getlastestToshiba){
					while($resulttoshiba = $getlastestToshiba->fetch_assoc()){
			?>	
			<div class="section group">
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a> <img src="admin/uploads/<?php echo $resulttoshiba['image']?>" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Toshiba</h2>
						<p><?php echo $resulttoshiba['productName']?></p>
						<div class="button"><span><a href="details.php?proid=<?php echo $resulttoshiba['productId']?>">Add to cart</a></span></div>
				   </div>
			   </div>
			   <?php
					}
				}
			   ?>
			   <?php  
				    $getlastestLG = $product->getlastestLG();
				    if($getlastestLG){
					    while($resultLG = $getlastestLG->fetch_assoc()){
			    ?>			
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a><img src="admin/uploads/<?php echo $resultLG['image']?>" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>LG</h2>
						  <p><?php echo $resultLG['productName']?></p>
						  <div class="button"><span><a href="details.php?proid=<?php echo $resultLG['productId']?>">Add to cart</a></span></div>
					</div>
				</div>
				<?php
						}
					}
				?>
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<li><img src="images/Images/laptop/Laptop Asus ROG Zephyrus G14 Alan Walker.jpg" height ="50px" alt=""/></li>
						<li><img src="images/Images/laptop/Asus TUF Gaming FX516PM i7.jpg" height ="50px" alt=""/></li>
						<li><img src="images/Images/TV/Sony Bravia smart TV 2K 32 inch.jpg" height ="50px" alt=""/></li>
						<li><img src="images/Images/refrigerators/Toshiba Inverter 511L refrigerator 4 Doors GR-RF610WE-PMV(SG).jpg" height ="50px" alt=""/></li>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>