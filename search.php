<?php
    include 'inc/header.php';
	//include 'inc/slider.php';
?>
<?php
    // if(!isset($_GET['catid']) || $_GET['catid']==NULL)
    // {
    //     echo "<script>window.location('404.php')</script>";
    // }
    // else{
    //     $id = $_GET['catid'];
    // }

    // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// 	$keyword = $_POST['keyword'];
	// 	$search_product = $product->search_product($keyword);
	// }
?>
 <div class="main">
    <div class="content">

	   <?php
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $keyword = $_POST['keyword'];
                $search_product = $product->search_product($keyword);
            }
		?>
    	<div class="content_top">
    		<div class="heading">
    		<h3>Your Keyword: <?php echo $keyword ?></h3>
    		</div>
    		<div class="clear"></div>
    	</div>
	      <div class="section group">
			  <?php
			      
				  if($search_product){
					  while($result = $search_product->fetch_assoc()){
			  ?>
				<div class="grid_1_of_4 images_1_of_4">
					 <a><img src="admin/uploads/<?php echo $result['image']?>" width="200px" height="150px" alt="" /></a>
					 <h2><?php echo $fm->textShorten($result['productName'],20)?></h2>
					 <p><?php echo $fm->textShorten($result['product_desc'],50)?></p>
					 <p><span class="price"><?php echo '$'.' '.$result['price']?></span></p>
				     <div class="button"><span><a href="details.php?proid=<?php echo $result['productId']?>" class="details">Details</a></span></div>
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