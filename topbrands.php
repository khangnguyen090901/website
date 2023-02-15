<?php
    include 'inc/header.php';
	include 'inc/slider.php';
?>

 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Samsung</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
		        <?php  
				    $getproductbySamsung = $product->getproductbySamsung();
					if($getproductbySamsung){
						while($resultSamsung = $getproductbySamsung->fetch_assoc()){
				?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a><img src="admin/uploads/<?php echo $resultSamsung['image']?>" width ="200px" height ="150px" alt="" /></a>
					 <h2><?php echo $resultSamsung['productName']?></h2>
					 <p><?php echo $fm->textShorten($resultSamsung['product_desc'],50)?></p>
					 <p><span class="price"><?php echo '$'.' '.$resultSamsung['price']?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $resultSamsung['productId']?>" class="details">Details</a></span></div>
				</div>
				<?php
					}
				}
			   ?>
			</div>
		<div class="content_bottom">
    		<div class="heading">
    		<h3>Apple</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
			    <?php  
				    $getproductbyApple = $product->getproductbyApple();
					if($getproductbyApple){
						while($resultApple = $getproductbyApple->fetch_assoc()){
				?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a><img src="admin/uploads/<?php echo $resultApple['image']?>" width ="200px" height ="150px" alt="" /></a>
					 <h2><?php echo $resultApple['productName']?></h2>
					 <p><?php echo $fm->textShorten($resultApple['product_desc'],50)?></p>
					 <p><span class="price"><?php echo '$'.' '.$resultApple['price']?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $resultApple['productId']?>" class="details">Details</a></span></div>
				</div>
				<?php
					}
				}
			   ?>
			</div>
	<div class="content_bottom">
    		<div class="heading">
    		<h3>Toshiba</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
			<?php  
				    $getproductbyToshiba = $product->getproductbyToshiba();
					if($getproductbyToshiba){
						while($resultToshiba = $getproductbyToshiba->fetch_assoc()){
				?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a><img src="admin/uploads/<?php echo $resultToshiba['image']?>" width ="200px" height ="150px" alt="" /></a>
					 <h2><?php echo $resultToshiba['productName']?></h2>
					 <p><?php echo $fm->textShorten($resultToshiba['product_desc'],50)?></p>
					 <p><span class="price"><?php echo '$'.' '.$resultToshiba['price']?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $resultToshiba['productId']?>" class="details">Details</a></span></div>
				</div>
				<?php
					}
				}
			   ?>
			</div>
    </div>
 </div>
<?php
    include 'inc/footer.php';
?>	
