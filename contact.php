<?php
    include 'inc/header.php';
	// include 'inc/slider.php';
?>
<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

		$insertContact = $cu->insert_contact($_POST);
	}
?>
 <div class="main">
    <div class="content">
    	<div class="support">
  			<div class="support_desc">
  				<!-- <h3>Live Support</h3>
  				<p><span>24 hours | 7 days a week | 365 days a year &nbsp;&nbsp; Live Technical Support</span></p> -->
  				<p style="font-size: 18px">*Note: Please make sure your email and phone are still available so we can easily respond to your comments.</p>
  			</div>
  				<img src="web/images/contact.png" alt="" />
  			<div class="clear"></div>
  		</div>
    	<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h2>Contact Us</h2>
					<?php
			            if(isset($insertContact)){
					        echo $insertContact;
				        }
			        ?>
					    <form action="" method="POST">
					    	<div>
						    	<span><label>Name :</label></span>
						    	<span><input type="text" name="name" placeholder = "Enter name..."></span>
						    </div>
						    <div>
						    	<span><label>Email :</label></span>
						    	<span><input type="text" name="email" placeholder = "Enter Email..."></span>
						    </div>
						    <div>
						     	<span><label>Phone :</label></span>
						    	<span><input type="text" name="phone" placeholder = "Enter Phone..."></span>
						    </div>
						    <div>
						    	<span><label>Contents :</label></span>
						    	<span><textarea name="content"> </textarea></span>
						    </div>
						   <div>
						   		<span><input type="submit" name ="submit" value="Submit"></span>
						  </div>
					    </form>
				  </div>
  				</div>
				<div class="col span_1_of_3">
      			<div class="company_address">
				     	<h2>Company Information :</h2>
				   		<p>Phone: 0935417852</p>
				 	 	<p>Email: <span>K2PSHOP@gmail.com</span></p>
				   		<p>Facebook: <span>facebook.com/k2pshop</span></p>
						<p>Youtube: <span>youtube.com/k2pshop</span></p>
				   </div>
				 </div>
			  </div>    	
    </div>
 </div>
<?php
    include 'inc/footer.php';
?>